<x-app-layout>
    <x-slot name="header">
        Detail Rincian Biaya
    </x-slot>
    <x-container>
        <x-slot name="content">
            <div class="divide-y">
                <div class="flex justify-between items-center pb-3">
                    <a href="{{ route('rincian-biaya.index') }}" data-tooltip-target="tooltip-kembali"
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
                        <a href="{{ route('rincian-biaya.print', $rincianBiaya->id) }}" data-tooltip-target="tooltip-print"
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
                        <a href="{{ route('rincian-biaya.edit', $rincianBiaya->id) }}" data-tooltip-target="tooltip-edit"
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
                    </div>
                </div>
            </div>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Umum
                </legend>
                <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                    <div class="flex items-center gap-3">
                        <label class=" flex-none basis-1/5 items-start" for="pegawai_id">Nama Pegawai</label>
                        <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->pegawai->nama }}
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class=" flex-none basis-1/5 items-start" for="jenis_sppd_id">Nomor SPT</label>
                        <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->sppd->spt->format_spt }}
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class=" flex-none basis-1/5 items-start" for="jenis_sppd_id">Nomor SPD</label>
                        <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->sppd->format_sppd }}
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class=" flex-none basis-1/5 items-start" for="jenis_sppd_id">Nomor Kwitansi</label>
                        <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->format_kwitansi }}
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class=" flex-none basis-1/5 items-start" for="jenis_sppd_id">Tujuan</label>
                        <table class=" flex-grow">
                            <thead>
                                <tr class=" text-left">
                                    <th>Provinsi</th>
                                    <th>Kabupaten/kota</th>
                                    <th>Kecamatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rincianBiaya->sppd->tujuan as $item)
                                    <tr>
                                        <td class=" pt-3">{{ $item['provinsi_name'] ?? '-' }}</td>
                                        <td class=" pt-3">{{ $item['kabkota_name'] ?? '-' }}</td>
                                        <td class=" pt-3">{{ $item['kecamatan_name'] ?? '-' }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Kegiatan
                </legend>
                <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                    <div class="flex items-start gap-3">
                        <label class=" flex-none basis-1/5 items-start">Nomor Kegiatan</label>
                        <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->sppd->spt->kdgiat_sub }}
                            -
                            {{ $rincianBiaya->sppd->spt->sub_kegiatan->uraian }}</div>
                    </div>
                    <div class="flex items-start gap-3">
                        <label class=" flex-none basis-1/5 items-start">Kode Rekening</label>
                        <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->sppd->kd_rek }}</div>
                    </div>
                    <div class="flex items-start gap-3">
                        <label class=" flex-none basis-1/5 items-start">Kegiatan</label>
                        <div class=" flex"><span class=" w-4">:</span> Perjalanan Dinas
                            {{ $rincianBiaya->sppd->spt->jenis_sppd->uraian }}</div>
                    </div>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Rincian
                </legend>
                <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                    @foreach ($rincianBiaya->daftar as $item)
                        <div class="flex items-center gap-3">
                            <label class=" flex-none basis-1/5 items-start"
                                for="pegawai_id">{{ $item->uraian }}</label>
                            <div class=" w-3/5 flex justify-between">
                                <p class="flex">
                                    <span class=" w-4">:</span>
                                    <span class=" mr-3">{{ $item->jml_satuan }}</span>
                                    <span>{{ $item->jns_satuan }}</span>
                                </p>
                                <p class="flex gap-3">
                                    <span>x</span>
                                    <span>Rp. {{ number_format($item->harga, 0, ',', '.') }}</span>
                                    <span>=</span>
                                    <span>Rp. {{ number_format($item->jml_harga, 0, ',', '.') }}</span>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </fieldset>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Penanda Tangan
                </legend>
                <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                    <div class="flex items-center gap-3">
                        <label class=" flex-none basis-1/5 items-start" for="pelaksana_id">Pejabat
                            Pelaksana</label>
                        <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->pelaksana->nama }}
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class=" flex-none basis-1/5 items-start" for="bendahara_id">Bendahara
                            Pengeluaran</label>
                        <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->bendahara->nama }}
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <label class=" flex-none basis-1/5 items-start" for="pembuat_id">Pembuat Rincian</label>
                        <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->pembuat->nama }}
                        </div>
                    </div>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Bukti Pembayaran
                </legend>
                <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                    <div class="flex items-start gap-3">
                        <input type="file" name="bukti[]" id="bukti" class=" hidden"
                            accept="application/pdf,.jpg,.jpeg,.png" multiple>
                        <input type="hidden" name="deleted_files" id="deleted-files">
                        <label class=" flex-none basis-1/5 items-start pt-3" for="bukti">Bukti
                            Pembayaran</label>
                        <div class="  w-3/5 flex flex-col gap-3" id="bukti-item">
                            @foreach ($rincianBiaya->file as $item)
                                <a href="{{ asset($item->path_rincian) }}" class="truncate" target="_blank">
                                    <div
                                        class="flex items-center justify-between border rounded px-3 py-2 text-sm old-item">
                                        {{ basename($item->path_rincian) }}
                                        <button type="button" class=" w-4 h-4 font-bold ml-3 remove-old-file"
                                            data-id="{{ $item->idx }}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 640 640">
                                                <path
                                                    d="M384 64C366.3 64 352 78.3 352 96C352 113.7 366.3 128 384 128L466.7 128L265.3 329.4C252.8 341.9 252.8 362.2 265.3 374.7C277.8 387.2 298.1 387.2 310.6 374.7L512 173.3L512 256C512 273.7 526.3 288 544 288C561.7 288 576 273.7 576 256L576 96C576 78.3 561.7 64 544 64L384 64zM144 160C99.8 160 64 195.8 64 240L64 496C64 540.2 99.8 576 144 576L400 576C444.2 576 480 540.2 480 496L480 416C480 398.3 465.7 384 448 384C430.3 384 416 398.3 416 416L416 496C416 504.8 408.8 512 400 512L144 512C135.2 512 128 504.8 128 496L128 240C128 231.2 135.2 224 144 224L224 224C241.7 224 256 209.7 256 192C256 174.3 241.7 160 224 160L144 160z" />
                                            </svg>
                                        </button>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
</x-app-layout>
