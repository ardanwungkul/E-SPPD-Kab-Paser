<x-app-layout>
    <x-slot name="header">
        Unggah Berkas Disposisi
    </x-slot>
    <x-container>
        <x-slot name="content">
            <div>
                <div id="accordion-collapse-disposisi" data-accordion="collapse">
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
                                            <td class="p-2 font-medium" colspan="4">{{ $nota_dinas->program->kode }}
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
                                            <td class="p-2 font-medium" colspan="2">{{ $nota_dinas->bidang->uraian }}
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
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('nota-dinas.disposisi.store', $nota_dinas->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="divide-y space-y-5">
                    <div class="text-sm grid gap-y-3 gap-x-7 pt-3">
                        <div>
                            <label for="lampiran">
                                <p class="mb-1">Berkas Disposisi</p>
                                <div class="flex rounded-lg overflow-hidden text-xs h-[37.33px] border cursor-pointer">
                                    <div class="bg-secondary-3 text-secondary-1 flex-none flex items-center px-2">
                                        <p>Unggah Berkas</p>
                                    </div>
                                    <div class="w-full flex items-center px-3 line-clamp-1">
                                        <p id="nama_file" class="text-secondary-1"></p>
                                    </div>
                                </div>
                            </label>
                            <input type="file" name="lampiran" id="lampiran"
                                onchange="document.getElementById('nama_file').textContent = this.files[0].name"
                                class="hidden" required>
                        </div>
                        <div>
                            <label for="keterangan" class="block mb-1">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="text-sm rounded-lg w-full border-gray-300" rows="4"
                                required></textarea>
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-4 col-span-2 text-sm pt-5">
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
                            href="{{ route('nota-dinas.index') }}">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
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
<script type="module">
    $(document).ready(function() {
        $('.select2').select2({
            dropdownCssClass: "text-sm",
            selectionCssClass: 'text-sm',
        });

        $('#program_id').on('change', function() {
            const programKode = $(this).val();

            if (programKode) {
                $.ajax({
                    url: "{{ route('get.kegiatan.by.program') }}",
                    type: "GET",
                    data: {
                        program_id: programKode
                    },
                    success: function(response) {
                        $('#kegiatan_id').empty();
                        $('#kegiatan_id').append(
                            '<option value="" selected disabled>Pilih Kegiatan</option>'
                        );
                        $('#sub_kegiatan_id').empty();
                        $('#sub_kegiatan_id').append(
                            '<option value="" selected disabled>Pilih Sub Kegiatan</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, kegiatan) {
                                $('#kegiatan_id').append('<option value="' +
                                    kegiatan.id + '">' + kegiatan.uraian +
                                    '</option>');
                            });
                        } else {
                            $('#kegiatan_id').append(
                                '<option value="" disabled>Tidak ada kegiatan tersedia</option>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#kegiatan_id').empty();
                $('#kegiatan_id').append('<option value="" selected disabled>Pilih Kegiatan</option>');
                $('#sub_kegiatan_id').empty();
                $('#sub_kegiatan_id').append(
                    '<option value="" selected disabled>Pilih Sub Kegiatan</option>'
                );
            }
        });
        $('#kegiatan_id').on('change', function() {
            const kegiatanId = $(this).val();

            if (kegiatanId) {
                $.ajax({
                    url: "{{ route('get.sub-kegiatan.by.kegiatan') }}",
                    type: "GET",
                    data: {
                        kegiatan_id: kegiatanId
                    },
                    success: function(response) {
                        $('#sub_kegiatan_id').empty();
                        $('#sub_kegiatan_id').append(
                            '<option value="" selected disabled>Pilih Sub Kegiatan</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, subkegiatan) {
                                $('#sub_kegiatan_id').append('<option value="' +
                                    subkegiatan.id + '">' + subkegiatan.uraian +
                                    '</option>');
                            });
                        } else {
                            $('#sub_kegiatan_id').append(
                                '<option value="" disabled>Tidak ada Sub kegiatan tersedia</option>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#sub_kegiatan_id').empty();
                $('#sub_kegiatan_id').append(
                    '<option value="" selected disabled>Pilih Sub Kegiatan</option>');
            }
        });
        $('#bidang_id').on('change', function() {
            const bidangId = $(this).val();

            if (bidangId) {
                $.ajax({
                    url: "{{ route('get.sub-bidang.by.bidang') }}",
                    type: "GET",
                    data: {
                        bidang_id: bidangId
                    },
                    success: function(response) {
                        $('#sub_bidang_id').empty();
                        $('#sub_bidang_id').append(
                            '<option value="" selected disabled>Pilih Sub {{ session('config')->judul }}</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, subbidang) {
                                $('#sub_bidang_id').append('<option value="' +
                                    subbidang.id + '">' + subbidang.uraian +
                                    '</option>');
                            });
                        } else {
                            $('#sub_bidang_id').append(
                                '<option value="" disabled>Tidak ada Sub {{ session('config')->judul }} tersedia</option>'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#sub_bidang_id').empty();
                $('#sub_bidang_id').append(
                    '<option value="" selected disabled>Pilih Sub {{ session('config')->judul }}</option>'
                );
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
        $('.datatable tbody').on('click', '.button-pegawai-dari-check', function() {
            const pegawai_id = $(this).data('id');
            const pegawai_keterangan = $(this).data('keterangan');
            if (pegawai_id) {
                $('#pegawai_id_dari').val(pegawai_id);
                $('#pegawai_keterangan_dari').val(pegawai_keterangan)
            }
            $('#close-button-pilih-pegawai-dari').click()
        });
        $('.datatable tbody').on('click', '.button-pegawai-kepada-check', function() {
            const pegawai_id = $(this).data('id');
            const pegawai_keterangan = $(this).data('keterangan');
            if (pegawai_id) {
                $('#pegawai_id_kepada').val(pegawai_id);
                $('#pegawai_keterangan_kepada').val(pegawai_keterangan)
            }
            $('#close-button-pilih-pegawai-kepada').click()
        });
    });
</script>
