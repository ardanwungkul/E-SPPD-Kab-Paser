<x-app-layout>
    <x-slot name="header">
        Profil Pengguna
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Informasi Pengguna
                    </legend>
                    <div class=" float-left flex justify-center items-center gap-2 flex-col pl-4 sm:pr-6 lg:pl-20">
                        <div class="relative rounded-lg">
                            <img id="fotoPegawai"
                                class="object-cover w-40 h-40 rounded-lg border border-gray-300 cursor-pointer"
                                src="{{ $user->photo ? asset('storage/user/' . $user->photo) : asset('assets/images/placeholder-image.jpg') }}"
                                alt="">
                            <div class="absolute z-10 top-0 rounded-lg opacity-0 hover:opacity-100 cursor-pointer">
                                <label for="fotoPegawaiInput" class="rounded-lg cursor-pointer">
                                    <div
                                        class="w-40 h-40 bg-black opacity-60 flex items-center justify-center rounded-lg">
                                        <div class="w-8 aspect-square text-white">
                                            <svg viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M0 14.2V18h3.8l11-11.1L11 3.1 0 14.2ZM17.7 4c.4-.4.4-1 0-1.4L15.4.3c-.4-.4-1-.4-1.4 0l-1.8 1.8L16 5.9 17.7 4Z"
                                                    fill="currentColor" fill-rule="evenodd" class="fill-000000">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <input accept=".jpg,.jpeg,.png" type="file" name="foto" class="hidden"
                                        id="fotoPegawaiInput" />
                                </label>
                            </div>

                            <script>
                                const defaultSrc = fotoPegawai.src;
                                fotoPegawaiInput.onchange = evt => {
                                    const [file] = fotoPegawaiInput.files
                                    const maxSize = 1 * 1024 * 1024;

                                    if (file) {
                                        if (file.size > maxSize) {
                                            document.getElementById("fotoError").textContent =
                                                "Ukuran file terlalu besar!";
                                            fotoPegawaiInput.value = "";
                                            fotoPegawai.src = defaultSrc
                                            return;
                                        }

                                        document.getElementById("fotoError").textContent = "";
                                        fotoPegawai.src = URL.createObjectURL(file);
                                    }
                                }
                            </script>
                        </div>
                        <div class="w-full max-w-40">
                            <p id="fotoError" class="text-red-500 text-[10px] my-1 text-center"></p>
                            <label for="fotoPegawaiInput"
                                class="block bg-[#249D06] hover:bg-opacity-80 text-white w-full text-center rounded-lg py-1 px-2 text-sm cursor-pointer">Pilih
                                File</label>
                            <p class="text-[10px] text-gray-700 mt-1 text-center">*Unggah gambar dengan
                                format <span class="font-bold">JPG</span>,
                                <span class="font-bold">JPEG</span>, atau
                                <span class="font-bold">PNG</span>.
                            </p>
                            <p class="text-[10px] text-gray-700 mt-1 text-center">*Ukuran file maksimal
                                <span class="font-bold">1 MB</span>
                            </p>

                        </div>
                    </div>
                    <div class=" pt-6 space-y-5 max-w-xl mx-auto h-full">
                        <div class="flex flex-col gap-1">
                            <label for="name">Nama Pengguna</label>
                            <input type="text" id="name" name="name"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                value="{{ old('name', $user->name) }}" placeholder="Masukkan Nama" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                value="{{ old('username', $user->username) }}" placeholder="Masukkan Username" required>
                        </div>

                        <div class="flex justify-end items-center gap-4 pt-4">
                            <x-button.save-button />
                        </div>
                    </div>
                </fieldset>
            </form>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Ganti Password
                    </legend>
                    <div class="space-y-5 max-w-xl mx-auto">
                        <div class="flex flex-col gap-1">
                            <label for="update_password_current_password">Password Lama</label>
                            <input type="password" id="update_password_current_password" name="current_password"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                placeholder="Masukkan Password Lama" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="update_password_password">Password Baru</label>
                            <input type="password" id="update_password_password" name="password"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                placeholder="Masukkan Password Baru" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="update_password_password_confirmation">Konfirmasi Password Baru</label>
                            <input type="password" id="update_password_password_confirmation"
                                name="password_confirmation"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                placeholder="Konfirmasi Password Baru" required>
                        </div>

                        <div class="flex justify-end items-center gap-4 pt-4">
                            <x-button.save-button />
                        </div>
                    </div>
                </fieldset>
            </form>
        </x-slot>
    </x-container>
    {{-- <x-container>
        <x-slot name="content">
            @include('profile.partials.delete-user-form')
        </x-slot>
    </x-container> --}}
</x-app-layout>
