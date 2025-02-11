<x-app-layout>
    <x-slot name="header">
        Edit Role {{ $role->name }}
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-sm space-y-3">
                    <div class="flex flex-col gap-1">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name"
                            class="text-sm rounded-lg border border-gray-300" value="{{ $role->name }}"
                            placeholder="Masukkan Nama Role" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <fieldset class="grid grid-cols-2 gap-5 border border-gray-300 rounded-lg p-3 bg-white">
                            <legend align="center" class="px-3 text-sm">Daftar Akses</legend>
                            @foreach ($permission->groupBy('category_id') as $items)
                                <div>
                                    <div class="flex items-center">
                                        <button type="button"
                                            onclick="checkAll('kategori-{{ $items[0]->category->id }}')">
                                            <svg class="w-5 h-5 text-secondary-2" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 11.917 9.724 16.5 19 7.5" />
                                            </svg>
                                        </button>
                                        <p class="text-sm font-semibold">{{ $items[0]->category->nama }}</p>

                                    </div>
                                    <div id="kategori-{{ $items[0]->category->id }}" class="space-y-1">
                                        @foreach ($items as $item)
                                            <div class="flex items-center gap-1">
                                                <input type="checkbox" value="{{ $item->id }}"
                                                    name="permission_id[]" id="checkbox-permission-{{ $item->id }}"
                                                    class="rounded-full"
                                                    {{ in_array($item->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                <label class="text-sm"
                                                    for="checkbox-permission-{{ $item->id }}">{{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </fieldset>
                    </div>
                    <div class="flex justify-end items-center gap-4">
                        <button
                            class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                            type="submit">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>

                            <p>Simpan</p>
                        </button>
                        <a class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                            href="{{ route('role.index') }}">
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
<script>
    function checkAll(categoryId) {
        const container = document.getElementById(categoryId);
        const checkboxes = container.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = true;
        });
    }
</script>
