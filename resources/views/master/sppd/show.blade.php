<x-app-layout>
    <x-slot name="header">
        Detail Surat Perjalanan Dinsa
    </x-slot>

    <x-container>
        <x-slot name="content">
            <div class="divide-y">
                <div class="flex justify-between items-center pb-3">
                    <a href="{{ route('sppd.index') }}" data-tooltip-target="tooltip-kembali"
                        class="text-secondary-2 p-2 rounded-lg bg-secondary-3 hover:bg-opacity-80 border border-secondary-4">
                        <div class="flex items-center overflow-hidden">
                            <svg class="w-5 h-5 bg-secondary-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4" />
                            </svg>
                        </div>
                    </a>
                    <div id="tooltip-kembali" role="tooltip"
                        class="absolute z-30 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                        Kembali
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('sppd.print', $sppd->id) }}" data-tooltip-target="tooltip-print"
                            class="text-secondary-2 p-2 rounded-lg bg-secondary-3 hover:bg-opacity-80 border border-secondary-4">
                            <div class="flex items-center overflow-hidden">
                                <svg class="w-5 h-5 bg-secondary-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M8 3a2 2 0 0 0-2 2v3h12V5a2 2 0 0 0-2-2H8Zm-3 7a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h1v-4a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4h1a2 2 0 0 0 2-2v-5a2 2 0 0 0-2-2H5Zm4 11a1 1 0 0 1-1-1v-4h8v4a1 1 0 0 1-1 1H9Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>
                        <div id="tooltip-print" role="tooltip"
                            class="absolute z-30 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                            Cetak
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        @if (!$sppd->dokumen)
                            <a href="{{ route('sppd.edit', $sppd->id) }}" data-tooltip-target="tooltip-edit"
                                class="text-secondary-2 p-2 rounded-lg bg-secondary-3 hover:bg-opacity-80 border border-secondary-4">
                                <div class="flex items-center overflow-hidden">
                                    <svg class="w-5 h-5 bg-secondary-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M14 4.182A4.136 4.136 0 0 1 16.9 3c1.087 0 2.13.425 2.899 1.182A4.01 4.01 0 0 1 21 7.037c0 1.068-.43 2.092-1.194 2.849L18.5 11.214l-5.8-5.71 1.287-1.31.012-.012Zm-2.717 2.763L6.186 12.13l2.175 2.141 5.063-5.218-2.141-2.108Zm-6.25 6.886-1.98 5.849a.992.992 0 0 0 .245 1.026 1.03 1.03 0 0 0 1.043.242L10.282 19l-5.25-5.168Zm6.954 4.01 5.096-5.186-2.218-2.183-5.063 5.218 2.185 2.15Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </a>
                            <div id="tooltip-edit" role="tooltip"
                                class="absolute z-30 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Edit
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-slot>
    </x-container>

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
                                {{ in_array($sppd->spt->pegawai->first()->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }}:
                                {{ $sppd->spt->pegawai->first()->nip }}
                            </div>
                        </div>
                    </li>
    
                    <li class=" pl-2">
                        <div class="space-y-3">
                            <div class="flex items-start gap-4">
                                <label class=" flex-none basis-1/5">a. Pangkat dan Golongan</label>
                                <div class="flex"><span class=" w-4">:</span>
                                    {{ $sppd->spt->pegawai->first()->pangkat->uraian }} -
                                    {{ $sppd->spt->pegawai->first()->pangkat->kdgol }}</div>
                            </div>
                            <div class="flex items-start gap-4">
                                <label class=" flex-none basis-1/5">b. Jabatan/Instansi</label>
                                <div class="flex"><span class=" w-4">:</span>
                                    {{ $sppd->spt->pegawai->first()->jabatan }}</div>
                            </div>
                            <div class="flex items-start gap-4">
                                <label class=" flex-none basis-1/5">c. Tingkat Biaya Perjalanan Dinas</label>
                                <div class="flex"><span class=" w-4">:</span>
                                    {{ $sppd->spt->pegawai->first()->tingkat->uraian ?? '-' }}</div>
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
                                        <p class=" w-4">
                                            {{ $sppd->spt->untuk->count() > 1 ? $loop->iteration . '.' : ':' }}
                                        </p>
                                        <p>{{ $item->untuk_ket }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
    
                    <li class=" pl-2">
                        <div class="flex items-start gap-4">
                            <label class=" flex-none basis-1/5" for="angkutan">Alat angkut yang dipergunakan</label>
                            <div class="flex"><span class=" w-4">:</span> {{ $sppd->angkutan }}</div>
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
                                <p class=" flex"><span class=" w-4">:</span> {{ $sppd->spt->jmlhari }}
                                    ({{ $sppd->spt->jmlbahasa }}) hari</p>
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
                                            <td class=" pt-3 align-top">{{ $item->pegawai_idx + 1 }}</td>
                                            <td class=" pt-3 align-top">{{ $item->nama }}</td>
                                            <td class=" pt-3 align-top">
                                                {{ in_array($item->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }} :
                                                {{ $item->nip }}</td>
                                            <td class=" pt-3 align-top">
                                                {{ $item->keterangan == '' ? '-' : $item->keterangan }}</td>
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
                                <div class="flex"><span class=" w-4">:</span>{{ $sppd->kd_rek == '' ? '-' : $sppd->kd_rek }}</div>
    
                            </div>
                        </div>
                    </li>
    
                    <li class=" pl-2">
                        <div class=" flex items-start gap-4">
                            <label class=" flex-none basis-1/5">Keterangan Lain-lain</label>
                            <div class="flex"><span class=" w-4">:</span> {{ $sppd->keterangan == '' ? '-' :$sppd->keterangan }}</div>
                        </div>
                    </li>
    
                </ul>
            </fieldset>
        </x-slot>
    </x-container>

    <x-container>
        <x-slot name="content">
            <fieldset class=" text-sm border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Penandatangan
                </legend>
                <div class="py-3 space-y-3">
                    <div class=" flex items-start gap-4">
                        <label class=" flex-none basis-1/5 mr-6">Nama</label>
                        <div class="flex"><span class=" w-4">:</span>{{ $sppd->spt->ub->nama }}</div>
                    </div>
                    <div class=" flex items-start gap-4">
                        <label class=" flex-none basis-1/5 mr-6">{{ in_array($sppd->spt->ub->first()->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }}</label>
                        <div class="flex"><span class=" w-4">:</span>{{ $sppd->spt->ub->first()->nip }}</div>
                    </div>
                    <div class=" flex items-start gap-4">
                        <label class=" flex-none basis-1/5 mr-6">Pangkat/Gol.</label>
                        <div class="flex"><span class=" w-4">:</span>{{ $sppd->spt->ub->pangkat ? $sppd->spt->ub->pangkat->uraian : '' }} - {{ $sppd->spt->ub->pangkat ? $sppd->spt->ub->pangkat->kdgol . ' - ' : '' }}</div>
                    </div>
                    <div class=" flex items-start gap-4">
                        <label class=" flex-none basis-1/5 mr-6">Tanggal di Tandatangani</label>
                        <div class="flex"><span class=" w-4">:</span>{{ $sppd->spt->tglspt }}</div>
                    </div>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
</x-app-layout>
