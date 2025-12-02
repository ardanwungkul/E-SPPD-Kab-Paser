<x-app-layout>
    <x-slot name="header">
        Tambah Golongan/Pangkat
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('golongan.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="md:text-sm text-xs space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="kode_golongan">Kode Golongan</label>
                        <input type="text" id="kode_golongan" name="kode_golongan"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('golongan') }}" placeholder="Masukkan Kode Golongan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Nama Pangkat</label>
                        <input type="text" id="uraian" name="uraian"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('uraian') }}" placeholder="Masukkan Nama Pangkat" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="jenis_pegawai_id">Jenis Pegawai</label>
                        <select name="jenis_pegawai_id" id="jenis_pegawai_id"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled> Pilih Jenis Pegawai</option>
                            @foreach ($jenis_pegawai as $item)
                                <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button/>
                        <x-button.back-button :route="route('golongan.index')"/>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
