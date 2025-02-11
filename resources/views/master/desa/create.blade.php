<x-app-layout>
    <x-slot name="header">
        Tambah Desa
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('desa.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="text-sm space-y-3">
                    <div class="flex flex-col gap-1">
                        <label for="kecamatan_id">Kecamatan</label>
                        <select name="kecamatan_id" id="kecamatan_id" class="text-sm rounded-lg border border-gray-300"
                            required>
                            <option value="" selected disabled>Pilih Kecamatan</option>
                            @foreach ($kecamatan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="text-sm rounded-lg border border-gray-300" value="{{ old('nama') }}"
                            placeholder="Masukkan Nama Provinsi" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="number" id="kode_pos" name="kode_pos"
                            class="text-sm rounded-lg border border-gray-300" value="{{ old('kode_pos') }}"
                            placeholder="Masukkan Kode Pos" required>
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
                            href="{{ route('desa.index') }}">
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
