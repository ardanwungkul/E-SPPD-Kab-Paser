<x-app-layout>
    <x-slot name="header">
        Detail Nota Dinas
    </x-slot>
    <div class="mb-4 shadow-lg rounded-lg border border-gray-300">
        <ol class="overflow-hidden rounded-lg text-gray-600 w-full grid grid-cols-4">
            <li class="flex items-center w-full text-white">
                <p
                    class="flex h-10 items-center gap-1.5 bg-gradient-to-r from-color-1-400 to-color-1-200 px-4 transition w-full">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span class="ms-1.5 text-sm font-medium"> Nota Dinas </span>
            </li>

            <li class="flex items-center w-full relative text-white">
                <span
                    class="absolute inset-y-0 h-10 w-4 bg-color-1-200 [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">
                </span>
                <p
                    class="flex h-10 items-center gap-1.5 bg-gradient-to-r from-color-1-400 to-color-1-200 px-4 transition w-full pl-10">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        @if ($nota_dinas->disposisi)
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        @else
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 5v9m-5 0H5a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-2M8 9l4-5 4 5m1 8h.01" />
                        @endif
                    </svg>

                    <span class="ms-1.5 text-sm font-medium">Berkas Disposisi</span>
            </li>
            <li class="flex items-center w-full relative {{ $nota_dinas->spt ? 'text-white' : '' }}">
                <span
                    class="absolute inset-y-0 h-10 w-4 bg-color-1-200 [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">
                </span>
                <p
                    class="flex h-10 items-center gap-1.5 {{ $nota_dinas->spt ? 'from-color-1-400 to-color-1-200' : 'bg-gradient-to-r from-gray-200 to-gray-100' }} bg-gradient-to-r  px-4 transition w-full pl-10">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        @if ($nota_dinas->spt)
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        @else
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                        @endif
                    </svg>
                    <span class="ms-1.5 text-sm font-medium"> SPT </span>
            </li>
            <li class="flex items-center w-full relative">
                <span
                    class="absolute inset-y-0 -start-px h-10 w-4 {{ $nota_dinas->spt ? 'bg-color-1-200' : 'bg-gray-100' }} [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">
                </span>
                <p
                    class="flex h-10 items-center gap-1.5 bg-gradient-to-r from-gray-200 to-gray-100 px-4 transition w-full pl-10">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                    </svg>
                    <span class="ms-1.5 text-sm font-medium"> SPPD </span>
            </li>
        </ol>
    </div>
    <x-container>
        <x-slot name="content">
            <div class="divide-y">
                <div class="flex justify-between items-center pb-3">
                    <a href="{{ route('nota-dinas.index') }}" data-tooltip-target="tooltip-kembali"
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
                        <a href="{{ route('nota-dinas.print', $nota_dinas->id) }}" data-tooltip-target="tooltip-print"
                            class="text-secondary-2 p-2 rounded-lg bg-secondary-3 hover:bg-opacity-80 border border-secondary-4">
                            <div class="flex items-center overflow-hidden">
                                <svg class="w-5 h-5 bg-secondary-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
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
                        @if (!$nota_dinas->disposisi)
                            <a href="{{ route('nota-dinas.edit', $nota_dinas->id) }}"
                                data-tooltip-target="tooltip-edit"
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
                        @if (!$nota_dinas->disposisi)
                            <a href="{{ route('nota-dinas.disposisi.create', $nota_dinas->id) }}"
                                data-tooltip-target="tooltip-disposisi"
                                class="text-secondary-2 p-2 rounded-lg bg-secondary-3 hover:bg-opacity-80 border border-secondary-4">
                                <div class="flex items-center overflow-hidden">
                                    <svg class="w-5 h-5 bg-secondary-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 3a1 1 0 0 1 .78.375l4 5a1 1 0 1 1-1.56 1.25L13 6.85V14a1 1 0 1 1-2 0V6.85L8.78 9.626a1 1 0 1 1-1.56-1.25l4-5A1 1 0 0 1 12 3ZM9 14v-1H5a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2h-4v1a3 3 0 1 1-6 0Zm8 2a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H17Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </a>
                            <div id="tooltip-disposisi" role="tooltip"
                                class="absolute z-30 invisible inline-block px-3 py-2 text-xs font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                Unggah Berkas Disposisi
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="py-3">
                    <table class="w-full table-striped text-sm text-secondary-2">
                        <tbody>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Program</td>
                                <td class="p-2 font-medium" colspan="4">{{ $nota_dinas->program->kode }} -
                                    {{ $nota_dinas->program->uraian }}
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Kegiatan</td>
                                <td class="p-2 font-medium" colspan="4">{{ $nota_dinas->kegiatan->formatted_kode }}
                                    -
                                    {{ $nota_dinas->kegiatan->uraian }}</td>
                            </tr>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Sub Kegiatan</td>
                                <td class="p-2 font-medium" colspan="4">
                                    {{ $nota_dinas->sub_kegiatan->formatted_kode }}
                                    - {{ $nota_dinas->sub_kegiatan->uraian }}</td>
                            </tr>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">{{ session('config')->judul }}</td>
                                <td class="p-2 font-medium" colspan="2">{{ $nota_dinas->bidang->uraian }}</td>
                                <td class="p-2 font-light w-40">Sub {{ session('config')->judul }}</td>
                                <td class="p-2 font-medium" colspan="2">{{ $nota_dinas->sub_bidang->uraian }}</td>
                            </tr>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Jenis Perjalanan</td>
                                <td class="p-2 font-medium" colspan="2">
                                    {{ $nota_dinas->jenis_perjalanan->uraian }}</td>
                                <td class="p-2 font-light w-40">Tahun</td>
                                <td class="p-2 font-medium" colspan="2">{{ $nota_dinas->tahun }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="py-3">
                    <table class="w-full table-striped text-sm text-secondary-2">
                        <tbody>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Nomor</td>
                                <td class="p-2 font-medium" colspan="4">{{ $nota_dinas->nomor }}
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Tanggal</td>
                                <td class="p-2 font-medium" colspan="4">
                                    {{ \Carbon\Carbon::parse($nota_dinas->tanggal)->format('d M Y') }}</td>
                            </tr>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Dari</td>
                                <td class="p-2 font-medium" colspan="4">
                                    {{ $nota_dinas->dari->jabatan }} -
                                    {{ $nota_dinas->dari->nama }} /
                                    {{ $nota_dinas->dari->nip }}
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Kepada</td>
                                <td class="p-2 font-medium" colspan="4">
                                    {{ $nota_dinas->kepada->jabatan }} -
                                    {{ $nota_dinas->kepada->nama }} /
                                    {{ $nota_dinas->kepada->nip }}
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Perihal</td>
                                <td class="p-2 font-medium" colspan="4">
                                    {{ $nota_dinas->perihal }}
                                </td>
                            </tr>
                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                <td class="p-2 font-light w-40">Isi</td>
                                <td class="p-2 font-medium" colspan="4">
                                    {!! $nota_dinas->isi !!}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($nota_dinas->lampiran->count() > 0)
                    <div class="py-3">
                        <table class="w-full table-striped text-sm text-secondary-2">
                            <tbody>
                                <tr class="odd:bg-white even:bg-secondary-3/60">
                                    <td class="p-2 font-medium w-40">Lampiran</td>
                                    <td class="p-2 font-medium" colspan="4"></td>
                                </tr>
                                @foreach ($nota_dinas->lampiran as $lampiran)
                                    <tr class="odd:bg-white even:bg-secondary-3/60">
                                        <td class="p-2 font-medium" colspan="5">
                                            <a href="{{ asset('storage/' . $lampiran->lampiran) }}"
                                                class="hover:text-blue-500 hover:underline" target="_blank">
                                                <div class="flex items-center gap-1">
                                                    <svg class="w-6 h-6" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="currentColor" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    <p>
                                                        Lihat Berkas
                                                    </p>
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                @if ($nota_dinas->disposisi)
                    <div class="py-3">
                        <table class="w-full table-striped text-sm text-secondary-2">
                            <tbody>
                                <tr class="odd:bg-white even:bg-secondary-3/60">
                                    <td class="p-2 font-medium w-40">Bukti Disposisi</td>
                                    <td class="p-2 font-medium" colspan="4"></td>
                                </tr>
                                <tr class="odd:bg-white even:bg-secondary-3/60">
                                    <td class="p-2 font-light w-40">Berkas</td>
                                    <td class="p-2 font-medium" colspan="4">
                                        <a href="{{ asset('storage/' . $nota_dinas->disposisi->lampiran) }}"
                                            class="hover:text-blue-500 hover:underline" target="_blank">
                                            <div class="flex items-center gap-1">
                                                <svg class="w-6 h-6" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                <p>
                                                    Lihat Berkas
                                                </p>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="odd:bg-white even:bg-secondary-3/60">
                                    <td class="p-2 font-light w-40">Keterangan</td>
                                    <td class="p-2 font-medium" colspan="4">
                                        {{ $nota_dinas->disposisi->keterangan }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>

        </x-slot>
    </x-container>
</x-app-layout>
