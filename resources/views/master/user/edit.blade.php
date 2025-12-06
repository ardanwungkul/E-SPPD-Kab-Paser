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
                            autocomplete="new-username" value="{{ old('username', $user->username) }}" placeholder="Masukkan Username"
                            required>
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
                                <option value="{{ $item->id }}" {{$item->id == old('bidang_id', $user->bidang_id) ? 'selected' : ''}}>{{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="level">Role</label>
                        <select id="level" name="level"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled>Pilih Role</option>
                            @for ($i = 1; $i < Auth::user()->level; $i++)
                                <option value="{{ $i }}" {{$i == old('level', $user->level) ? 'selected' : ''}}>{{ $i == 1 ? 'User Bidang' : ($i == 2 ? 'Admin Bidang' : 'Admin') }}</option>
                            @endfor
                        </select>
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
