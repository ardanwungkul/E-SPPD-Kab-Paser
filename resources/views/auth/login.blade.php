<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login.store') }}" class="space-y-4">
        @csrf

        <div>
            {{-- <label for="username_or_email" class="text-sm">Pengguna</label> --}}
            <div class="flex shadow-md border border-gray-300 rounded-lg">
                <div class="bg-color-1-100 h-auto rounded-l-lg flex items-center justify-center w-10 flex-none">
                    <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="1.5"
                            d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
                <input type="text" id="username_or_email" name="username_or_email" autocomplete="username" required
                    value="{{ old('username_or_email') }}" placeholder="Masukkan Username atau Email" class="block w-full rounded-r-lg text-sm border-none">
            </div>
            {{-- <x-input-error :messages="$errors->get('username_or_email')" class="mt-2" /> --}}
        </div>

        <!-- Password -->
        <div>
            {{-- <label for="password" class="text-sm">Kata Sandi</label> --}}
            <div class="flex shadow-md border border-gray-300 rounded-lg">
                <div class="bg-color-1-100 h-auto rounded-l-lg flex items-center justify-center w-10 flex-none">
                    <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z" />
                    </svg>

                </div>
                <input type="password" id="password" name="password" autocomplete="password" required
                    value="{{ old('password') }}" placeholder="Masukkan Password" class="block w-full rounded-r-lg text-sm border-none">
            </div>
            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>

        <div>
            {{-- <label for="password" class="text-sm">Kata Sandi</label> --}}
            <div class="flex shadow-md border border-gray-300 rounded-lg">
                <div class="bg-color-1-100 h-auto rounded-l-lg flex items-center justify-center w-10 flex-none">
                    <svg class="w-6 h-6 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                    </svg>

                </div>
                <select name="tahun" id="tahun" class="block w-full rounded-r-lg text-sm border-none" required>
                    <option value="" selected disabled>Pilih Tahun</option>
                    @foreach ($config as $item)
                        <option value="{{ $item->tahun }}" {{ $item->tahun == now()->year ? 'selected' : '' }}>
                            {{ $item->tahun }}</option>
                    @endforeach
                </select>
            </div>
            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
        </div>



        <div class="pt-4">
            <button
                class="bg-color-1-500 hover:bg-opacity-80 transition-colors duration-300 px-10 py-1 text-white rounded-lg shadow-lg text-sm w-full h-[37.33px]">Login</button>
        </div>
    </form>
</x-guest-layout>
