<x-app-layout>
    <x-slot name="header">
        Tambah Jenis Perjalanan
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('jenis-perjalanan.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Jenis Perjalanan</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('uraian') }}" placeholder="Masukkan Jenis Perjalanan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="wilayah">Wilayah</label>
                        <select name="wilayah" id="wilayah"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled>
                                Pilih Wilayah
                            </option>
                            <option value="Provinsi">Provinsi</option>
                            <option value="Kabupaten">Kabupaten</option>
                            <option value="Kecamatan">Kecamatan</option>
                        </select>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button/>
                        <x-button.back-button :route="route('jenis-perjalanan.index')"/>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
