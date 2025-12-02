<x-app-layout>
    <x-slot name="header">
        Edit Golongan/Pangkat {{ $golongan->kode_golongan }} - {{ $golongan->uraian }}
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('golongan.update', $golongan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="kode_golongan">Kode Golongan</label>
                        <input type="text" id="kode_golongan" name="kode_golongan"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $golongan->kode_golongan }}" placeholder="Masukkan Kode Golongan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Nama Pangkat</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                        value="{{ $golongan->uraian }}" placeholder="Masukkan Nama Pangkat" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="jenis_pegawai_id">Jenis Pegawai</label>
                        <select name="jenis_pegawai_id" id="jenis_pegawai_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled> Pilih Jenis Pegawai</option>
                            @foreach ($jenis_pegawai as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $golongan->jenis_pegawai_id ? 'selected' : '' }}>{{ $item->uraian }}
                                </option>
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
