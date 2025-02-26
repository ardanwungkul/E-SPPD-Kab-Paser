<x-app-layout>
    <x-slot name="header">
        Edit User
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="md:text-sm text-xs space-y-3">
                    <div class="flex flex-col gap-1">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name"
                            class="md:text-sm text-xs rounded-lg border border-gray-300" value="{{ $user->name }}"
                            placeholder="Masukkan Nama User" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"
                            class="md:text-sm text-xs rounded-lg border border-gray-300" autocomplete="new-username"
                            value="{{ $user->username }}" placeholder="Masukkan Username" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"
                            class="md:text-sm text-xs rounded-lg border border-gray-300" autocomplete="new-email"
                            value="{{ $user->email }}" placeholder="Masukkan Email" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                            class="md:text-sm text-xs rounded-lg border border-gray-300" autocomplete="new-password"
                            value="" placeholder="Password">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="role_id">Role/Level</label>
                        <select name="role_id" id="role_id"
                            class="md:text-sm text-xs rounded-lg border border-gray-300">
                            <option value="" selected disabled> Pilih Role/Level</option>
                            @foreach ($role as $item)
                                <option value="{{ $item->id }}"
                                    {{ $user->roles && $user->roles[0]->id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex md:justify-end justify-between items-center md:gap-4 gap-1">
                        <button
                            class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-4 rounded-lg border border-secondary-4 flex items-center gap-1 text-xs md:text-sm"
                            type="submit">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>

                            <p>Simpan</p>
                        </button>
                        <a class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-4 rounded-lg border border-secondary-4 flex items-center gap-1 text-xs md:text-sm"
                            href="{{ route('users.index') }}">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>

                            <p>Kembali</p>
                        </a>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
