<x-app-layout>
    <x-slot name="header">
        Edit Pegawai {{ $pegawai->nama }}
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-sm space-y-3">
                    <div class="flex flex-col gap-1">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip"
                            class="text-sm rounded-lg border border-gray-300" value="{{ $pegawai->nip }}"
                            placeholder="Masukkan NIP Pegawai" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="text-sm rounded-lg border border-gray-300" value="{{ $pegawai->nama }}"
                            placeholder="Masukkan Nama Pegawai" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="golongan_id">Pangkat/Golongan</label>
                        <select name="golongan_id" id="golongan_id" class="text-sm rounded-lg border border-gray-300"
                            required>
                            <option value="" selected disabled>Pilih Pangkat/Golongan</option>
                            @foreach ($golongan as $item)
                                <option value="{{ $item->id }}"
                                    {{ $pegawai->golongan_id == $item->id ? 'selected' : '' }}>{{ $item->pangkat }} -
                                    {{ $item->golongan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="tingkat_id">Tingkat</label>
                        <select name="tingkat_id" id="tingkat_id" class="text-sm rounded-lg border border-gray-300"
                            required>
                            <option value="" selected disabled>Pilih Tingkat</option>
                            @foreach ($tingkat as $item)
                                <option value="{{ $item->id }}"
                                    {{ $pegawai->tingkat_id == $item->id ? 'selected' : '' }}>{{ $item->tingkat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan"
                            class="text-sm rounded-lg border border-gray-300" value="{{ $pegawai->jabatan }}"
                            placeholder="Masukkan Jabatan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="jenis_pegawai">Jenis Pegawai</label>
                        <select name="jenis_pegawai" id="jenis_pegawai"
                            class="text-sm rounded-lg border border-gray-300" required>
                            <option value="" selected disabled>Pilih Jenis Pegawai</option>
                            <option {{ $pegawai->jenis_pegawai == 'ASN' ? 'selected' : '' }} value="ASN">ASN
                            </option>
                            <option {{ $pegawai->jenis_pegawai == 'PPPK' ? 'selected' : '' }} value="PPPK">PPPK
                            </option>
                            <option {{ $pegawai->jenis_pegawai == 'PTT' ? 'selected' : '' }} value="PTT">PTT
                            </option>
                            <option {{ $pegawai->jenis_pegawai == 'Lainnya' ? 'selected' : '' }} value="Lainnya">
                                Lainnya
                            </option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="no_hp">No. Hp</label>
                        <input type="text" id="no_hp" name="no_hp"
                            class="text-sm rounded-lg border border-gray-300" value="{{ $pegawai->no_hp }}"
                            placeholder="Masukkan Nomor Handphone" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="text-sm rounded-lg border border-gray-300" placeholder="Masukkan Alamat"
                            required>{{ $pegawai->alamat }}</textarea>
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
                            href="{{ route('pegawai.index') }}">
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
