<x-app-layout>
    <x-slot name="header">
        Surat Perintah Dinas
    </x-slot>

    <form action="{{route('sppd.update', ['sppd' => $sppd->id])}}" method="post">
        @csrf
        @method('put')
        
        <x-container>
            <x-slot name="content">
                <fieldset class=" text-sm border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Umum
                    </legend>
                    <ul class="space-y-3 list-decimal pl-6 text-sm">
                        <li class=" pl-2">
                            <div class="flex items-start gap-4">
                                <label class=" flex-none basis-1/5">Pengguna Anggaran</label>
                                <div class="flex"><span class=" w-4">:</span> Kepala Badan Keuangan dan Aset Daerah</div>
                            </div>
                        </li>
        
                        <li class=" pl-2">
                            <div class="flex items-start gap-4">
                                <label class=" flex-none basis-1/5">Nama / NIP Pegawai yang melaksanakan perjalanan dinas</label>
                                <div class="flex"><span class=" w-4">:</span> {{ $sppd->spt->pegawai->first()->nama }} /
                                    {{ in_array($sppd->spt->pegawai->first()->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }}: {{ $sppd->spt->pegawai->first()->nip }}
                                </div>
                            </div>
                        </li>
        
                        <li class=" pl-2">
                            <div class="space-y-3">
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">a. Pangkat dan Golongan</label>
                                    <div class="flex"><span class=" w-4">:</span> {{ $sppd->spt->pegawai->first()->pangkat->uraian }} - {{ $sppd->spt->pegawai->first()->pangkat->kdgol }}</div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">b. Jabatan/Instansi</label>
                                    <div class="flex"><span class=" w-4">:</span> {{ $sppd->spt->pegawai->first()->jabatan }}</div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">c. Tingkat Biaya Perjalanan Dinas</label>
                                    <div class="flex"><span class=" w-4">:</span> {{ $sppd->spt->pegawai->first()->tingkat->uraian ?? '-' }}</div>
                                    {{-- <select name="tingkat_id" id="tingkat_id"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md select2" required>
                                        <option value="" selected disabled>Pilih Tingkat</option>
                                        @foreach ($tingkat as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $sppd->spt->pegawai->first()->tingkat_id ? 'selected' : '' }}>{{ $item->uraian }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                        </li>
        
                        <li class=" pl-2">
                            <div class="flex items-start gap-4">
                                <label class=" flex-none basis-1/5">Maksud Perjalanan Dinas</label>
                                <ul class=" space-y-3 flex-grow">
                                    @foreach ($sppd->spt->untuk as $item)
                                        <li class=" flex">
                                            <p class=" w-4">{{$sppd->spt->untuk->count() > 1 ? $loop->iteration.'.' : ':'}}</p>
                                            <p>{{ $item->untuk_ket }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
        
                        <li class=" pl-2">
                            <div class="flex items-start gap-4">
                                <label class=" flex-none basis-1/5" for="angkutan">Alat angkut yang dipergunakan</label>
                                <input type="text" id="angkutan" name="angkutan"
                                    class=" basis-3/5 text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                    value="{{ old('angkutan', $sppd->angkutan) }}" placeholder="Nama Angkutan" required>
                            </div>
                        </li>
        
                        <li class=" pl-2">
                            <div class="space-y-3">
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">a. Tempat Berangkat</label>
                                    <p class=" flex"><span class=" w-4">:</span> Kabupaten Penajam Paser Utara</p>
                                </div>
        
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">b. Tempat Tujuan</label>
                                    <table class=" flex-grow">
                                        <thead>
                                            <tr class=" text-left">
                                                <th>Provinsi</th>
                                                <th>Kabupaten/kota</th>
                                                <th>Kecamatan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sppd->spt->tujuan as $item)
                                                <tr>
                                                    <td class=" pt-3">{{ $item['provinsi_name'] ?? '-' }}</td>
                                                    <td class=" pt-3">{{ $item['kabkota_name'] ?? '-' }}</td>
                                                    <td class=" pt-3">{{ $item['kecamatan_name'] ?? '-' }}</td>
                                                </tr>
                                            @endforeach
        
                                        </tbody>
                                    </table>
                                </div>
                        </li>
        
                        <li class=" pl-2">
                            <div class="space-y-3">
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">a. Lamanya perjalanan dinas</label>
                                    <p class=" flex"><span class=" w-4">:</span> {{ $sppd->spt->jmlhari }} ({{$sppd->spt->jmlbahasa}}) hari</p>
                                </div>
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">a. Tanggal berangkat</label>
                                    <p class=" flex"><span class=" w-4">:</span> {{ $sppd->spt->tglbrkt }}</p>
                                </div>
        
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">b. Tanggal harus kembali</label>
                                    <p class=" flex"><span class=" w-4">:</span> {{ $sppd->spt->tglbalik }}</p>
                                </div>
                            </div>
                        </li>
                        <li class=" pl-2">
                            <div class="flex items-start gap-4">
                                <label class=" flex-none basis-1/5">Pegawai</label>
                                <table class=" flex-grow">
                                    <thead>
                                        <tr class=" text-left">
                                            <th>No.</th>
                                            <th>Nama Pegawai</th>
                                            <th>NIP/NIK</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sppd->spt->pegawai->skip(1) as $item)
                                            <tr>
                                                <td class=" pt-3 align-top">{{$item->pegawai_idx + 1}}</td>
                                                <td class=" pt-3 align-top">{{$item->nama}}</td>
                                                <td class=" pt-3 align-top">{{ in_array($item->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }} : {{$item->nip}}</td>
                                                <td class=" pt-3 align-top">{{ $item->keterangan == '' ? '-' : $item->keterangan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </li>
        
                        <li class=" pl-2">
                            <div class="space-y-3">
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">Pembebanan Anggaran</label>
                                    <p class=" flex"><span class=" w-4">:</span> DPA</p>
                                </div>
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">a. SKPD</label>
                                    <p class=" flex"><span class=" w-4">:</span> Badan Keuangan dan Aset Daerah</p>
                                </div>
        
                                <div class="flex items-start gap-4">
                                    <label class=" flex-none basis-1/5">b. Kode Rekening</label>
                                    <input type="text" id="kdrek" name="kdrek"
                                    class=" basis-3/5 text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                    value="{{ old('kdrek', $sppd->kd_rek) }}" placeholder="Kode Rekening">
                                </div>
                            </div>
                        </li>
        
                        <li class=" pl-2">
                            <div class=" flex items-start gap-4">
                                <label class=" flex-none basis-1/5">Keterangan Lain-lain</label>
                                <textarea name="ket_lain" id="ket_lain" rows="3" class=" basis-3/5 text-sm rounded-lg border border-secondary-4"
                                    placeholder="Keterangan Lain-lain">{{ old('keterangan', $sppd->keterangan)}}</textarea>
                            </div>
                        </li>
        
                    </ul>
                </fieldset>
            </x-slot>
        </x-container>
    
        <x-container>
            <x-slot name="content">
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Penanda Tangan
                    </legend>
                    <div class="pt-3 mx-auto text-sm">
                        <div class="grid grid-cols-1 gap-5">
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 mr-8" for="nosppd">Nomor SPPD</label>
                                <input type="text" name="nosppd" id="nosppd" value="{{ $sppd->nosppd }}" disabled
                                    class=" w-3/5 text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Masukkan Nomor SPPD" required>
                            </div>
                            <div class=" flex items-center gap-4">
                                <label class=" flex-none basis-1/5 mr-8" for="penandatangan_tanggal" class="block mb-1">Tanggal
                                    SPT
                                </label>
                                <p class=" flex"><span class=" w-4">:</span> {{$sppd->spt->tglspt}}</p>
                            </div>
                            <div class=" flex items-center gap-4">
                                <label class=" flex-none basis-1/5 mr-8" for="penandatangan_tanggal" class="block mb-1">Ditanda
                                    Tangani Oleh</label>
                                <p class=" flex"><span class=" w-4">:</span> {{ $sppd->spt->ub->nama }} - {{ $sppd->spt->ub->jabatan }}</p>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </x-slot>
        </x-container>
    
        <x-container>
            <x-slot name="content">
                <div class="flex justify-end items-center gap-4 col-span-2 text-sm mx-auto">
                    <x-button.save-button />
                    <x-button.back-button :route="route('sppd.index')" />
                </div>
            </x-slot>
        </x-container>
    </form>
</x-app-layout>
