<x-app-layout>
    <x-slot name="header">
        Edit User
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="md:text-sm text-xs space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="name">Nama Pengguna</label>
                        <input type="text" id="name" name="name"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            value="{{ $user->name }}" placeholder="Masukkan Nama User" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-username" value="{{ old('username', $user->username) }}"
                            placeholder="Masukkan Username" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-password" value="" placeholder="Password">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="bidang_id">{{ session('config')->judul }}</label>
                        <select id="bidang_id" name="bidang_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled>Pilih {{ session('config')->judul }}</option>
                            @foreach ($bidang as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == old('bidang_id', $user->bidang_id) ? 'selected' : '' }}>
                                    {{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="level">Role</label>
                        <select id="level" name="level"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled>Pilih Role</option>
                            @for ($i = 1; $i < Auth::user()->level; $i++)
                                <option value="{{ $i }}"
                                    {{ $i == old('level', $user->level) ? 'selected' : '' }}>
                                    {{ $i == 1 ? 'User Bidang' : ($i == 2 ? 'Admin Bidang' : 'Admin') }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <p>Aktif</p>
                        <div class=" w-full flex justify-end">
                            <div class="toggler">
                                <input id="aktif" name="aktif" {{ $user->aktif == 'Y' ? 'checked' : '' }}
                                    type="checkbox">
                                <label for="aktif">
                                    <svg class="toggler-on" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 130.2 130.2">
                                        <polyline class="path check" points="100.2,40.2 51.5,88.8 29.8,67.5">
                                        </polyline>
                                    </svg>
                                    <svg class="toggler-off" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 130.2 130.2">
                                        <line class="path line" x1="34.4" y1="34.4" x2="95.8"
                                            y2="95.8"></line>
                                        <line class="path line" x1="95.8" y1="34.4" x2="34.4"
                                            y2="95.8"></line>
                                    </svg>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button />
                        <x-button.back-button :route="route('users.index')" />
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
