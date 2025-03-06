<x-app-layout>
    <x-slot name="header">
        Buat Surat Perintah Tugas
    </x-slot>

    <div id="alert-2" class="fixed right-3 bottom-3 z-50 hidden">
        <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 border border-red-400" role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium mr-3">
                Minimal harus memilih 1 pegawai!
            </div>
            <button type="button" id="button-alert-2"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>

    @if (isset($nota_dinas))
        <div class="mb-4 shadow-lg rounded-lg border border-gray-300">
            <ol class="overflow-hidden rounded-lg text-gray-600 w-full grid grid-cols-4">
                <li class="flex items-center w-full text-white">
                    <p
                        class="flex h-10 items-center gap-1.5 bg-gradient-to-r from-color-1-400 to-color-1-200 px-4 transition w-full">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <span class="ms-1.5 text-sm font-medium"> Nota Dinas </span>
                </li>
                <li class="flex items-center w-full text-white relative">
                    <span
                        class="absolute inset-y-0 h-10 w-4 bg-color-1-200 [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">
                    </span>
                    <p
                        class="flex h-10 items-center gap-1.5 bg-gradient-to-r from-color-1-400 to-color-1-200 px-4 transition w-full pl-10">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <span class="ms-1.5 text-sm font-medium">Berkas Disposisi</span>
                </li>
                <li class="flex items-center w-full text-white relative">
                    <span
                        class="absolute inset-y-0 h-10 w-4 bg-color-1-200 [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">

                    </span>
                    <p
                        class="flex h-10 items-center gap-1.5 bg-gradient-to-r from-color-1-400 to-color-1-200 px-4 transition w-full pl-10">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                        </svg>

                        <span class="ms-1.5 text-sm font-medium"> SPT </span>
                </li>
                <li class="flex items-center w-full relative">
                    <span
                        class="absolute inset-y-0 h-10 w-4 bg-color-1-200 [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">
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
    @endif
    @if (isset($nota_dinas))
        <x-container>
            <x-slot name="content">
                <div>
                    <div id="accordion-collapse-spt" data-accordion="collapse">
                        <h2 id="accordion-collapse-nota-dinas-heading-1">
                            <button type="button"
                                class="flex items-center justify-between w-full px-3 py-1 font-medium rtl:text-right text-gray-500 border border-gray-200 rounded-lg focus:ring-0 focus:ring-gray-200 hover:bg-gray-100"
                                data-accordion-target="#accordion-collapse-nota-dinas-body-1" aria-expanded="false"
                                aria-controls="accordion-collapse-nota-dinas-body-1">
                                <span class="text-sm">Nota Dinas</span>
                                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M9 5 5 1 1 5" />
                                </svg>
                            </button>
                        </h2>
                        <div id="accordion-collapse-nota-dinas-body-1" class="hidden"
                            aria-labelledby="accordion-collapse-nota-dinas-heading-1">
                            <div class="p-5 border border-gray-200 rounded-lg mt-1 divide-y">
                                <div class="py-3">
                                    <table class="w-full table-striped text-sm text-secondary-2">
                                        <tbody>
                                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                                <td class="p-2 font-light w-40">Program</td>
                                                <td class="p-2 font-medium" colspan="4">
                                                    {{ $nota_dinas->program->kode }}
                                                    -
                                                    {{ $nota_dinas->program->uraian }}
                                                </td>
                                            </tr>
                                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                                <td class="p-2 font-light w-40">Kegiatan</td>
                                                <td class="p-2 font-medium" colspan="4">
                                                    {{ $nota_dinas->kegiatan->formatted_kode }}
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
                                                <td class="p-2 font-medium" colspan="2">
                                                    {{ $nota_dinas->bidang->uraian }}
                                                </td>
                                                <td class="p-2 font-light w-40">Sub {{ session('config')->judul }}</td>
                                                <td class="p-2 font-medium" colspan="2">
                                                    {{ $nota_dinas->sub_bidang->uraian }}</td>
                                            </tr>
                                            <tr class="odd:bg-white even:bg-secondary-3/60">
                                                <td class="p-2 font-light w-40">Jenis Perjalanan</td>
                                                <td class="p-2 font-medium" colspan="2">
                                                    {{ $nota_dinas->jenis_perjalanan->uraian }}</td>
                                                <td class="p-2 font-light w-40">Tahun</td>
                                                <td class="p-2 font-medium" colspan="2">{{ $nota_dinas->tahun }}
                                                </td>
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
                                                    {{ \Carbon\Carbon::parse($nota_dinas->tanggal)->format('d M Y') }}
                                                </td>
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
                                                                class="hover:text-blue-500 hover:underline"
                                                                target="_blank">
                                                                <div class="flex items-center gap-1">
                                                                    <svg class="w-6 h-6" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24"
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
                                                            class="hover:text-blue-500 hover:underline"
                                                            target="_blank">
                                                            <div class="flex items-center gap-1">
                                                                <svg class="w-6 h-6" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="currentColor"
                                                                    viewBox="0 0 24 24">
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
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-container>
    @endif


    <div>
        <form action="{{ route('spt.store', isset($nota_dinas) ? ['nota_dinas' => $nota_dinas->id] : '') }}"
            class="text-sm" method="POST" id="form">
            @csrf
            @method('POST')
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t">
                        <legend align="center" class="px-3 text-secondary-1">Dasar</legend>
                        <div class="pt-3">
                            <table class="table table-bordered w-full" id="dynamicTableDasar">
                                <tr>
                                    <td class="flex items-start px-2">
                                        <label for="dasar[0][uraian]" class="align-top whitespace-nowrap">Dasar
                                            Ke
                                            1</label>
                                    </td>
                                    <td class="w-full px-2">
                                        <div class="space-y-1">
                                            <textarea name="dasar[0][uraian]" id="dasar[0][uraian]" rows="3"
                                                class="w-full text-sm rounded-lg border border-secondary-4" placeholder="Dasar Ke-1" required></textarea>
                                        </div>
                                    </td>
                                    <td class="px-2 flex items-start">
                                        <button type="button" name="add" id="addDasar"
                                            class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</button>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </fieldset>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t">
                        <legend align="center" class="px-3 text-secondary-1">Pegawai</legend>
                        <button type="button" name="add" id="addPegawai" data-modal-target="pilih-pegawai-spt"
                            data-modal-toggle="pilih-pegawai-spt"
                            class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center whitespace-nowrap">
                            Pilih Pegawai
                        </button>
                        <x-modal.pilih-pegawai-spt :pegawai="$pegawai" />
                        <div class="pt-3">
                            <table class="table table-bordered w-full" id="dynamicTablePegawai">
                                <tbody></tbody>
                            </table>
                        </div>
                    </fieldset>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t">
                        <legend align="center" class="px-3 text-secondary-1">Untuk</legend>
                        <div class="pt-3">
                            <table class="table table-bordered w-full" id="dynamicTableUntuk">
                                <tr>
                                    <td class="flex items-start px-2">
                                        <label for="untuk[0][uraian]" class="align-top whitespace-nowrap">Untuk
                                            Ke
                                            1</label>
                                    </td>
                                    <td class="w-full px-2">
                                        <div class="space-y-1">
                                            <textarea name="untuk[0][uraian]" id="untuk[0][uraian]" rows="3"
                                                class="w-full text-sm rounded-lg border border-secondary-4" placeholder="Untuk Ke-1" required></textarea>
                                        </div>
                                    </td>
                                    <td class="px-2 flex items-start">
                                        <button type="button" name="add" id="addUntuk"
                                            class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</button>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </fieldset>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t">
                        <legend align="center" class="px-3 text-secondary-1">Penanda Tangan</legend>
                        <div class="pt-3">
                            <div class="grid grid-cols-2 gap-5">
                                <div class="col-span-2">
                                    <div class="flex items-center gap-5">
                                        <div class="flex items-center gap-1">
                                            <input type="checkbox" class="rounded-full" name="ub_status"
                                                id="ub_status">
                                            <label for="ub_status">UB</label>
                                        </div>
                                        <input type="text" id="penandatangan_keterangan"
                                            name="penandatangan_keterangan"
                                            class="rounded-lg text-sm border border-secondary-4 w-full cursor-pointer"
                                            data-modal-target="pilih-pegawai-dari"
                                            data-modal-toggle="pilih-pegawai-dari"
                                            placeholder="Ketuk untuk memilih Pegawai" readonly required>
                                        <input type="text" id="penandatangan_id" name="penandatangan_id"
                                            class="hidden">
                                        <x-modal.pilih-pegawai-dari :pegawai="$pegawai" />
                                    </div>
                                </div>
                                <div>
                                    <label for="penandatangan_tanggal" class="block mb-1">Tanggal Di Tanda
                                        Tangani</label>
                                    <input type="date" id="penandatangan_tanggal" name="penandatangan_tanggal"
                                        value="{{ now()->toDateString() }}"
                                        class="rounded-lg text-sm border border-secondary-4 w-full" required>
                                </div>
                                <div>
                                    <label for="penandatangan_lokasi" class="block mb-1">Lokasi/Wilayah Di Tanda
                                        Tangani</label>
                                    <input type="text" id="penandatangan_lokasi" name="penandatangan_lokasi"
                                        placeholder="Masukkan Lokasi Penanda Tangan"
                                        class="rounded-lg text-sm border border-secondary-4 w-full" required>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <div class="flex justify-end items-center gap-4 col-span-2 text-sm">
                        <button
                            class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1 shadow-md"
                            type="submit">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>
                            <p>Simpan</p>
                        </button>
                        <a class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1 shadow-md"
                            href="{{ route('spt.index') }}">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                            <p>Kembali</p>
                        </a>
                    </div>
                </x-slot>
            </x-container>
        </form>
    </div>
</x-app-layout>
<script type="module">
    $(document).ready(function() {

        $('#form').on('submit', function(event) {
            if ($('#dynamicTablePegawai tr').length === 0) {
                event.preventDefault();
                $('#alert-2').show();
                $('#addPegawai').focus();
                return;
            }
            if ($('#penandatangan_keterangan').val().trim() === '') {
                event.preventDefault();
                $('#alert-2').show();
                $('#penandatangan_keterangan').focus();
                return;
            }

        });
        $('#button-alert-2').on('click', function() {
            $('#alert-2').hide();
        })
        $('.datatable tbody').on('click', '.button-pegawai-dari-check', function() {
            const pegawai_id = $(this).data('id');
            const pegawai_keterangan = $(this).data('keterangan');
            if (pegawai_id) {
                $('#penandatangan_id').val(pegawai_id);
                $('#penandatangan_keterangan').val(pegawai_keterangan)
            }
            $('#close-button-pilih-pegawai-dari').click()
        });
    });
</script>
<script type="module">
    var iDasar = 1;
    var iUntuk = 1;


    $(document).ready(function() {
        function updateDasarNumbers() {
            $("#dynamicTableDasar tr").each(function(index, tr) {
                const newIndex = index + 1;
                $(tr).find("label").attr("for", `dasar[${newIndex}][uraian]`).text("Dasar Ke " +
                    newIndex);
                $(tr).find("textarea").attr({
                    id: `dasar[${newIndex}][uraian]`,
                    name: `dasar[${newIndex}][uraian]`,
                    placeholder: `Dasar Ke-${newIndex}`
                });
            });
        }

        function updateUntukNumbers() {
            $("#dynamicTableUntuk tr").each(function(index, tr) {
                const newIndex = index + 1;
                $(tr).find("label").attr("for", `untuk[${newIndex}][uraian]`).text("Untuk Ke " +
                    newIndex);
                $(tr).find("textarea").attr({
                    id: `untuk[${newIndex}][uraian]`,
                    name: `untuk[${newIndex}][uraian]`,
                    placeholder: `Untuk Ke-${newIndex}`
                });
            });
        }

        $("#addDasar").click(function() {
            ++iDasar;
            $("#dynamicTableDasar").append(
                `<tr>
                    <td class="flex items-start px-2">
                        <label for="dasar[${iDasar}][uraian]" class="align-top whitespace-nowrap">Dasar Ke ${iDasar}</label>
                    </td>
                    <td class="w-full px-2">
                        <div class="space-y-1">
                            <textarea name="dasar[${iDasar}][uraian]" id="dasar[${iDasar}][uraian]" rows="3" class="w-full text-sm rounded-lg border border-secondary-4" placeholder="Dasar Ke-${iDasar}"></textarea>
                        </div>
                    </td>
                    <td class="px-2 flex items-start">
                        <button type="button" class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center remove-tr" data-id="dasar">
                            -
                        </button>
                    </td>
                </tr>`
            );
            updateDasarNumbers();
        });

        $("#addUntuk").click(function() {
            ++iUntuk;
            $("#dynamicTableUntuk").append(
                `<tr>
                    <td class="flex items-start px-2">
                        <label for="untuk[${iUntuk}][uraian]" class="align-top whitespace-nowrap">Untuk Ke ${iUntuk}</label>
                    </td>
                    <td class="w-full px-2">
                        <div class="space-y-1">
                            <textarea name="untuk[${iUntuk}][uraian]" id="untuk[${iUntuk}][uraian]" rows="3" class="w-full text-sm rounded-lg border border-secondary-4" placeholder="Untuk Ke-${iUntuk}"></textarea>
                        </div>
                    </td>
                    <td class="px-2 flex items-start">
                        <button type="button" class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center remove-tr" data-id="untuk">
                            -
                        </button>
                    </td>
                </tr>`
            );
            updateUntukNumbers();
        });

        $(document).on('click', '.remove-tr', function() {
            const data = $(this).data('id');
            if (data == 'dasar') {
                --iDasar;
                $(this).parents('tr').remove();
                updateDasarNumbers();
            }
            if (data == 'untuk') {
                --iUntuk;
                $(this).parents('tr').remove();
                updateUntukNumbers();
            }
        });
    });
</script>
<script type="module">
    $(document).ready(function() {
        let table = $('.datatable').DataTable({
            info: false,
            lengthChange: false,
            deferRender: true,
            paging: true,
            language: {
                search: '',
                emptyTable: "Tidak ada data tersedia",
                searchPlaceholder: 'Cari...'
            },
            ordering: false,
            responsive: true,
            columnDefs: [{
                targets: '_all',
                className: 'dt-head-left',
            }]
        });

        var iPegawai = 1;

        function updatePegawaiNumbers() {
            $("#dynamicTablePegawai tr").each(function(index, tr) {
                const newIndexPegawai = index + 1;
                $(tr).find("label").attr("for", `pegawai[${newIndexPegawai}][keterangan]`).text(
                    "Pegawai Ke " +
                    newIndexPegawai);
            });
        }
        $('.datatable tbody').on('click', '.button-pegawai-spt-check', function() {
            const pegawai_id = $(this).data('id');
            const pegawai_keterangan = $(this).data('keterangan');

            const isChecked = $(this).attr('data-check') === 'true';
            $(this).attr('data-check', isChecked ? 'false' : 'true');
            if (isChecked) {
                $(this).html(`
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                    </svg>
                `);
                $(`#dynamicTablePegawai .pegawai-item[data-id="${pegawai_id}"]`).remove();
            } else {
                $(this).html('X');
                const newRow = `
                <tr class="pegawai-item" data-id="${pegawai_id}">
                    <td class="flex items-start px-2 py-2">
                        <label for="pegawai[${pegawai_id}][keterangan]" class="align-top whitespace-nowrap">Pegawai Ke 1</label>    
                    </td>
                    <td class="w-full px-2 py-2">
                        <div class="space-y-1">
                            <input name="pegawai[${pegawai_id}][keterangan]" id="pegawai[${pegawai_id}][keterangan]" value="${pegawai_keterangan}"
                                    class="w-full text-sm rounded-lg border border-secondary-4 cursor-pointer" readonly />
                            <input name="pegawai[${pegawai_id}][id]" id="pegawai[${pegawai_id}][id]" type="text" value="${pegawai_id}"
                                    class="hidden" readonly required>    
                        </div>
                    </td>
                </tr>
            `;
                $('#dynamicTablePegawai tBody').append(newRow);
            }
            updatePegawaiNumbers()
        });
    });
</script>
