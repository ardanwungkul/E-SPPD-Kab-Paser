<x-app-layout>
    <x-slot name="header">
        Detail Surat Perintah Tugas
    </x-slot>
    <x-container>
        <x-slot name="content">
            <div class="divide-y">
                <div class="flex justify-between items-center pb-3">
                    <a href="{{ route('spt.index') }}" data-tooltip-target="tooltip-kembali"
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
                        <a href="{{ route('spt.print', $spt->id) }}" data-tooltip-target="tooltip-print"
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
                        @if (!$spt->dokumen)
                            <a href="{{ route('spt.edit', $spt->id) }}" data-tooltip-target="tooltip-edit"
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
            <fieldset class=" text-sm text-secondary-2 border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Dasar
                </legend>
                <div class="py-3">
                    <table>
                        <tbody>
                            @foreach ($spt->dasar as $dasar)
                                <tr class="even:bg-white odd:bg-secondary-3/60">
                                    <td class="px-3 py-1">
                                        {{ $loop->index + 1 }}.
                                    </td>
                                    <td class="px-3 py-1 w-full">
                                        {{ $dasar->dasar_ket }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <fieldset class=" text-sm text-secondary-2 border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Pegawai
                </legend>
                <div class="py-3">
                    <table>
                        @foreach ($spt->pegawai as $pegawai)
                            <tbody class="even:bg-white odd:bg-secondary-3/60">
                                <tr>
                                    <td class="px-3 py-1 align-top" rowspan="5">
                                        {{ $loop->index + 1 }}.
                                    </td>
                                    <td class="px-3 py-1 !w-24">
                                        <div class="flex items-center justify-between gap-3">
                                            <p>
                                                Nama
                                            </p>
                                            <p>:</p>
                                        </div>
                                    </td>
                                    <td class="px-3 py-1 w-full">
                                        {{ $pegawai->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-1 !w-24">
                                        <div class="flex items-center justify-between gap-3">
                                            <p>
                                                NIP
                                            </p>
                                            <p>:</p>
                                        </div>
                                    </td>
                                    <td class="px-3 py-1 w-full">
                                        {{ $pegawai->nip }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-1 !w-24">
                                        <div class="flex items-center justify-between gap-3">
                                            <p>
                                                Golongan
                                            </p>
                                            <p>:</p>
                                        </div>
                                    </td>
                                    <td class="px-3 py-1 w-full">
                                        {{ $pegawai->pangkat ? $pegawai->pangkat->kdgol : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-1 !w-24">
                                        <div class="flex items-center justify-between gap-3">
                                            <p>
                                                Pangkat
                                            </p>
                                            <p>:</p>
                                        </div>
                                    </td>
                                    <td class="px-3 py-1 w-full">
                                        {{ $pegawai->pangkat ? $pegawai->pangkat->uraian : '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-3 py-1 !w-24">
                                        <div class="flex items-center justify-between gap-3">
                                            <p>
                                                Jabatan
                                            </p>
                                            <p>:</p>
                                        </div>
                                    </td>
                                    <td class="px-3 py-1 w-full">
                                        {{ $pegawai->jabatan }}
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <fieldset class=" text-sm text-secondary-2 border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Untuk
                </legend>
                <div class="py-3">
                    <table>
                        <tbody>
                            @foreach ($spt->untuk as $untuk)
                                <tr class="even:bg-white odd:bg-secondary-3/60">
                                    <td class="px-3 py-1">
                                        {{ $loop->index + 1 }}.
                                    </td>
                                    <td class="px-3 py-1 w-full">
                                        {{ $untuk->untuk_ket }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <fieldset class=" text-sm text-secondary-2 border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Penandatangan
                </legend>
                <div class="py-3">
                    <table>
                        <tbody>
                            <tr class="even:bg-white odd:bg-secondary-3/60">
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <div class="flex items-center justify-between gap-3">
                                        <p>
                                            Nama / NIP
                                        </p>
                                        <p>:</p>
                                    </div>
                                </td>
                                <td class="px-3 py-1 w-full">
                                    {{ $spt->ub->nama }} / {{ $spt->ub->nip }}
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-secondary-3/60">
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <div class="flex items-center justify-between gap-3">
                                        <p>
                                            Jabatan
                                        </p>
                                        <p>:</p>
                                    </div>
                                </td>
                                <td class="px-3 py-1 w-full">
                                    {{ $spt->ub->jabatan }}
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-secondary-3/60">
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <div class="flex items-center justify-between gap-3">
                                        <p>
                                            Golongan / Pangkat
                                        </p>
                                        <p>:</p>
                                    </div>
                                </td>
                                <td class="px-3 py-1 w-full">
                                    {{ $spt->ub->pangkat ? $spt->ub->pangkat->kdgol . ' - ' : '' }}
                                    {{ $spt->ub->pangkat ? $spt->ub->pangkat->uraian : '' }}
                                </td>
                            </tr>
                            <tr class="even:bg-white odd:bg-secondary-3/60">
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <div class="flex items-center justify-between gap-3">
                                        <p>
                                            Tanggal Di Tandatangani
                                        </p>
                                        <p>:</p>
                                    </div>
                                </td>
                                <td class="px-3 py-1 w-full">
                                    {{ \Carbon\Carbon::parse($spt->penandatangan_tanggal)->format('d M Y') }}
                                </td>
                            </tr>
                            {{-- <tr class="even:bg-white odd:bg-secondary-3/60">
                                <td class="px-3 py-1 whitespace-nowrap">
                                    <div class="flex items-center justify-between gap-3">
                                        <p>
                                            Lokasi
                                        </p>
                                        <p>:</p>
                                    </div>
                                </td>
                                <td class="px-3 py-1 w-full">
                                    {{ $spt->penandatangan_lokasi }}
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
</x-app-layout>
