<x-app-layout>
    <x-slot name="header">
        Tambah Role
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="md:text-sm text-xs space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="name">Nama Role</label>
                        <input type="text" id="name" name="name"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('name') }}" placeholder="Masukkan Nama Role" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <fieldset
                            class="grid grid-cols-2 gap-5 border-y md:border border-gray-300 md:rounded-lg py-3 md:px-3 bg-white shadow-md">
                            <legend align="center" class="px-3 md:text-sm text-xs">Daftar Akses</legend>
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
                                        <p class="md:text-sm text-xs font-semibold truncate"
                                            title="{{ $items[0]->category->nama }}">
                                            {{ $items[0]->category->nama }}</p>

                                    </div>
                                    <div id="kategori-{{ $items[0]->category->id }}" class="space-y-1">
                                        @foreach ($items as $item)
                                            <div class="flex items-center gap-1">
                                                <input type="checkbox" value="{{ $item->id }}"
                                                    name="permission_id[]" id="checkbox-permission-{{ $item->id }}"
                                                    class="rounded-full">
                                                <label class="md:text-sm text-xs truncate" title="{{ $item->name }}"
                                                    for="checkbox-permission-{{ $item->id }}">{{ $item->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </fieldset>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button />
                        <x-button.back-button :route="route('role.index')" />
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
