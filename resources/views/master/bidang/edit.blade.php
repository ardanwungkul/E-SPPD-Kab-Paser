<x-app-layout>
    <x-slot name="header">
        Edit {{ session('config')->judul }}
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('bidang.update', $bidang->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Nama {{ session('config')->judul }}</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $bidang->uraian }}" placeholder="Masukkan Nama {{ session('config')->judul }}" required>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button/>
                        <x-button.back-button :route="route('bidang.index')"/>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
