<x-app-layout>
    <x-slot name="header">
        Tambah Golongan/Pangkat
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('golongan.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="text-sm space-y-3">
                    <div class="flex flex-col gap-1">
                        <label for="kode_golongan">Kode Golongan</label>
                        <input type="text" id="kode_golongan" name="kode_golongan" class="text-sm rounded-lg"
                            value="{{ old('golongan') }}" placeholder="Masukkan Kode Golongan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Uraian</label>
                        <input type="text" id="uraian" name="uraian" class="text-sm rounded-lg"
                            value="{{ old('uraian') }}" placeholder="Masukkan Uraian Pangkat" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="jenis_pegawai">Jenis Pegawai</label>
                        <select name="jenis_pegawai" id="jenis_pegawai" class="text-sm rounded-lg" required>
                            <option value="" selected disabled> Pilih Jenis Pegawai</option>
                            <option value="1">PNS</option>
                            <option value="2">PPPK / P3K</option>
                            <option value="3">Honorer / PPPK</option>
                            <option value="4">Anggota DPRD</option>
                        </select>
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
                            href="{{ route('golongan.index') }}">
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
