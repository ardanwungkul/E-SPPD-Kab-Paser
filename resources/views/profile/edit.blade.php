<x-app-layout>
    <x-slot name="header">
        Profil Pengguna
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')
                <div class="space-y-5 max-w-xl mx-auto">
                    <p class=" text-lg font-semibold text-secondary-1">Informasi Akun</p>
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
            </form>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <div class="space-y-5 max-w-xl mx-auto">
                    <p class=" text-lg font-semibold text-secondary-1">Ganti Password</p>
                    <div class="flex flex-col gap-1">
                        <label for="update_password_current_password">Password Lama</label>
                        <input type="password" id="update_password_current_password" name="current_password"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" placeholder="Masukkan Password Lama" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="update_password_password">Password Baru</label>
                        <input type="password" id="update_password_password" name="password"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" placeholder="Masukkan Password Baru" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="update_password_password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password" id="update_password_password_confirmation" name="password_confirmation"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" placeholder="Konfirmasi Password Baru" required>
                    </div>
    
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button />
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
    {{-- <x-container>
        <x-slot name="content">
            @include('profile.partials.delete-user-form')
        </x-slot>
    </x-container> --}}
</x-app-layout>
