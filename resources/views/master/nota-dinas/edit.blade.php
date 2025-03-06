<x-app-layout>
    <x-slot name="header">
        Edit Nota Dinas {{ $nota_dinas->nomor }}
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
            <li class="flex items-center w-full relative">
                <span
                    class="absolute inset-y-0 -start-px h-10 w-4 bg-color-1-200 [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">
                </span>
                <p
                    class="flex h-10 items-center gap-1.5 bg-gradient-to-r from-gray-200 to-gray-100 px-4 transition w-full pl-10">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                            d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                    </svg>

                    <span class="ms-1.5 text-sm font-medium"> SPT </span>
            </li>
            <li class="flex items-center w-full relative">
                <span
                    class="absolute inset-y-0 -start-px h-10 w-4 bg-gray-100 [clip-path:_polygon(0_0,_0%_100%,_100%_50%)] rtl:rotate-180">
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
            <form action="{{ route('nota-dinas.update', $nota_dinas->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="divide-y space-y-5">
                    <div class="text-sm grid grid-cols-2 gap-y-3 gap-x-7">
                        <div class="space-y-3">
                            <div class="flex flex-col gap-1">
                                <label for="program_id">Program</label>
                                <select name="program_id" id="program_id" class="text-sm rounded-lg select2" required>
                                    <option value="" selected disabled> Pilih Program</option>
                                    @foreach ($program as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $nota_dinas->program->id == $item->id ? 'selected' : '' }}>
                                            {{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="kegiatan_id">Kegiatan</label>
                                <select name="kegiatan_id" id="kegiatan_id" class="text-sm rounded-lg select2" required>
                                    <option value="" selected disabled> Pilih Kegiatan</option>
                                    @foreach ($nota_dinas->program->kegiatan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $nota_dinas->kegiatan->id == $item->id ? 'selected' : '' }}>
                                            {{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="sub_kegiatan_id">Sub Kegiatan</label>
                                <select name="sub_kegiatan_id" id="sub_kegiatan_id" class="text-sm rounded-lg select2"
                                    required>
                                    <option value="" selected disabled> Pilih Sub Kegiatan</option>
                                    @foreach ($nota_dinas->kegiatan->sub_kegiatan as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $nota_dinas->sub_kegiatan_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex flex-col gap-1">
                                <label for="bidang_id">{{ session('config')->judul }}</label>
                                <select name="bidang_id" id="bidang_id" class="text-sm rounded-lg select2" required>
                                    <option value="" selected disabled>Pilih {{ session('config')->judul }}
                                    </option>
                                    @foreach ($bidang as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $nota_dinas->sub_bidang->bidang->id == $item->id ? 'selected' : '' }}>
                                            {{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="sub_bidang_id">Sub {{ session('config')->judul }}</label>
                                <select name="sub_bidang_id" id="sub_bidang_id" class="text-sm rounded-lg select2"
                                    required>
                                    <option value="" selected disabled> Pilih Sub {{ session('config')->judul }}
                                    </option>
                                    @foreach ($nota_dinas->sub_bidang->bidang->sub_bidang as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $nota_dinas->sub_bidang_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="jenis_sppd_id">Jenis SPPD</label>
                                <select name="jenis_sppd_id" id="jenis_sppd_id" class="text-sm rounded-lg select2"
                                    required>
                                    <option value="" selected disabled> Pilih Jenis SPPD</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $nota_dinas->jenis_sppd_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text-sm grid grid-cols-2 gap-y-3 gap-x-7 pt-3">
                        <div>
                            <label for="nomor" class="block mb-1">Nomor Registrasi</label>
                            <input name="nomor" id="nomor" type="text"
                                class="text-sm rounded-lg w-full border-gray-300"
                                placeholder="Masukkan Nomor Registrasi" value="{{ $nota_dinas->nomor }}" required>
                        </div>
                        <div>
                            <label for="tanggal" class="block mb-1">Tanggal</label>
                            <input name="tanggal" id="tanggal" type="date"
                                class="text-sm rounded-lg w-full border-gray-300"
                                value="{{ $nota_dinas->tanggal }}"required>
                        </div>
                        <div>
                            <label for="pegawai_keterangan_dari" class="block mb-1">Dari</label>
                            <input name="pegawai_id_dari" id="pegawai_id_dari" type="text" class="hidden"
                                value="{{ $nota_dinas->pegawai_id_dari }}" readonly required>
                            <input name="pegawai_keterangan_dari" id="pegawai_keterangan_dari" type="text"
                                data-modal-target="pilih-pegawai-dari" data-modal-toggle="pilih-pegawai-dari"
                                class="text-sm rounded-lg w-full border-gray-300 cursor-pointer"
                                placeholder="Ketuk untuk Pilih Pegawai"
                                value="{{ $nota_dinas->dari->nama }} - {{ $nota_dinas->dari->jabatan }}" readonly
                                required>
                            <x-modal.pilih-pegawai-dari :pegawai="$pegawai" />
                        </div>
                        <div>
                            <label for="pegawai_keterangan_kepada" class="block mb-1">Kepada</label>
                            <input name="pegawai_id_kepada" id="pegawai_id_kepada" type="text" class="hidden"
                                value="{{ $nota_dinas->pegawai_id_kepada }}" readonly required>
                            <input name="pegawai_keterangan_kepada" id="pegawai_keterangan_kepada" type="text"
                                data-modal-target="pilih-pegawai-kepada" data-modal-toggle="pilih-pegawai-kepada"
                                class="text-sm rounded-lg w-full border-gray-300 cursor-pointer"
                                placeholder="Ketuk untuk Pilih Pegawai" readonly required
                                value="{{ $nota_dinas->kepada->nama }} - {{ $nota_dinas->kepada->jabatan }}">
                            <x-modal.pilih-pegawai-kepada :pegawai="$pegawai" />
                        </div>
                        <div class="col-span-2">
                            <label for="perihal" class="block mb-1">Perihal</label>
                            <input type="text" name="perihal" id="perihal"
                                class="text-sm rounded-lg w-full border-gray-300"
                                placeholder="Masukkan Perihal Nota Dinas" value="{{ $nota_dinas->perihal }}"
                                required>
                        </div>
                        <div class="col-span-2">
                            <label for="isi" class="block mb-1">Isi</label>
                            <textarea name="isi" id="isi" class="text-sm rounded-lg w-full border-gray-300" rows="4" required>{{ $nota_dinas->isi }}</textarea>
                        </div>
                    </div>
                    <div class="flex justify-end items-center gap-4 col-span-2 pt-3 text-sm">
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
