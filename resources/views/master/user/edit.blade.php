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
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            value="{{ $user->name }}" placeholder="Masukkan Nama User" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-username" value="{{ $user->username }}" placeholder="Masukkan Username"
                            required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-email" value="{{ $user->email }}" placeholder="Masukkan Email" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            autocomplete="new-password" value="" placeholder="Password">
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="role_id">Role/Level</label>
                        <select name="role_id" id="role_id"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md">
                            <option value="" selected disabled> Pilih Role/Level</option>
                            @foreach ($role as $item)
                                <option value="{{ $item->id }}"
                                    {{ $user->roles && $user->roles[0]->id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
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
