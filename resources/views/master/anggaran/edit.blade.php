<x-app-layout>
    <x-slot name="header">
        Edit Anggaran
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('anggaran.update', $anggaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-sm space-y-3 divide-y">
                    <div class="text-sm grid grid-cols-2 gap-y-3 gap-x-7">
                        <div class="flex flex-col gap-1">
                            <label for="bidang_id">{{ session('config')->judul }}</label>
                            <select name="bidang_id" id="bidang_id" class="text-sm rounded-lg select2" required disabled>
                                <option value="" selected disabled>Pilih {{ session('config')->judul }}
                                </option>
                                @foreach ($bidang as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $anggaran->sub_bidang->bidang_id ? 'selected' : '' }}>
                                        {{ $item->uraian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="sub_bidang_id">Sub {{ session('config')->judul }}</label>
                            <select name="sub_bidang_id" id="sub_bidang_id" class="text-sm rounded-lg select2" required
                                disabled>
                                <option value="" selected disabled> Pilih Sub {{ session('config')->judul }}
                                </option>
                                @foreach ($anggaran->sub_bidang->bidang->sub_bidang as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $anggaran->bidang_sub_id ? 'selected' : '' }}>
                                        {{ $item->uraian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="program_id">Program</label>
                            <select name="program_id" id="program_id" class="text-sm rounded-lg select2" required
                                disabled>
                                <option value="" selected disabled> Pilih Program</option>
                                @foreach ($program as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $anggaran->sub_kegiatan->kegiatan->program_id ? 'selected' : '' }}>
                                        {{ $item->uraian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="kegiatan_id">Kegiatan</label>
                            <select name="kegiatan_id" id="kegiatan_id" class="text-sm rounded-lg select2" required
                                disabled>
                                <option value="" selected disabled> Pilih Kegiatan</option>
                                @foreach ($anggaran->sub_kegiatan->kegiatan->program->kegiatan as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $anggaran->sub_kegiatan->kegiatan_id ? 'selected' : '' }}>
                                        {{ $item->uraian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="sub_kegiatan_id">Sub Kegiatan</label>
                            <select name="sub_kegiatan_id" id="sub_kegiatan_id" class="text-sm rounded-lg select2"
                                required disabled>
                                <option value="" selected disabled> Pilih Sub Kegiatan</option>
                                @foreach ($anggaran->sub_kegiatan->kegiatan->sub_kegiatan as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $anggaran->sub_kegiatan_id ? 'selected' : '' }}>
                                        {{ $item->uraian }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="pt-3 space-y-1">
                        <label for="rp_pagu" class="block mb-1">{{ $anggaran->jenis_sppd->uraian }}</label>
                        <input type="text" id="rp_pagu" name="rp_pagu"
                            class="rounded-lg border border-gray-400 w-full text-sm" placeholder="0"
                            value="{{ $anggaran->rp_pagu }}" autofocus required
                            onfocus="this.value = formatRupiah(this.value, 'Rp. ')"
                            oninput="this.value = formatRupiah(this.value, 'Rp. ')">
                    </div>
                </div>
                <div class="flex justify-end items-center gap-4 pt-3">
                    <button
                        class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                        type="submit">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                d="M5 11.917 9.724 16.5 19 7.5" />
                        </svg>

                        <p>Simpan</p>
                    </button>
                    <a class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                        href="{{ route('anggaran.index') }}">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                d="M6 18 17.94 6M18 18 6.06 6" />
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
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
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
