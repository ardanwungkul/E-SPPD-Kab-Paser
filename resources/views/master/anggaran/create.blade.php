<x-app-layout>
    <x-slot name="header">
        Tambah Anggaran
    </x-slot>
    <form action="{{ route('anggaran.store') }}" method="POST">
        @csrf
        @method('POST')
        <x-container>
            <x-slot name="content">
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="text-xs md:text-sm flex flex-col gap-3">
                        <div class="flex flex-col gap-1">
                            <label for="bidang_id">{{ session('config')->judul }}</label>
                            <select name="bidang_id" id="bidang_id" class="text-xs md:text-sm rounded-lg select2">
                                <option value="" selected disabled>Pilih {{ session('config')->judul }}
                                </option>
                                @foreach ($bidang as $item)
                                    <option value="{{ $item->id }}" {{Auth::user()->level < 3 ? ($item->id == Auth::user()->bidang_id ? 'selected' : '') : ''}}
                                        {{ $sub_bidang && $sub_bidang->bidang->id == $item->id ? 'selected' : '' }}>
                                        {{ $item->uraian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="sub_bidang_id">Sub. {{ session('config')->judul }}</label>
                            <select name="sub_bidang_id" id="sub_bidang_id"
                                class="text-xs md:text-sm rounded-lg select2" required>
                                <option value="" selected disabled> Pilih Sub. {{ session('config')->judul }}
                                </option>
                                @if ($sub_bidang)
                                    @foreach ($sub_bidang->bidang->sub_bidang as $s)
                                        <option value="{{ $s->id }}"
                                            {{ $s->id == $sub_bidang->id ? 'selected' : '' }}>
                                            {{ $s->uraian }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-container>
        <x-container>
            <x-slot name="content">
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="text-xs md:text-sm flex flex-col gap-y-3">
                        <div class="flex flex-col gap-1">
                            <label for="program_id">Program</label>
                            <select name="program_id" id="program_id" class="text-xs md:text-sm rounded-lg select2"
                                required>
                                <option value="" selected disabled> Pilih Program</option>
                                @foreach ($program as $item)
                                    <option value="{{ $item->kdprog }}"
                                        {{ $sub_kegiatan && $sub_kegiatan->kdprog == $item->kdprog ? 'selected' : '' }}>
                                        {{ $item->kdprog }} - {{ $item->uraian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="kegiatan_id">Kegiatan</label>
                            <select name="kegiatan_id" id="kegiatan_id" class="text-xs md:text-sm rounded-lg select2"
                                required>
                                <option value="" selected disabled> Pilih Kegiatan</option>
                                @if ($sub_kegiatan)
                                    @foreach ($sub_kegiatan->kegiatan->program->kegiatan as $k)
                                        <option value="{{ $k->kdgiat }}"
                                            {{ $k->kdgiat == $sub_kegiatan->kegiatan->kdgiat ? 'selected' : '' }}>
                                            {{ $k->kdgiat}} - {{ $k->uraian }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="sub_kegiatan_id">Sub. Kegiatan</label>
                            <select name="sub_kegiatan_id" id="sub_kegiatan_id"
                                class="text-xs md:text-sm rounded-lg select2" required>
                                <option value="" selected disabled> Pilih Sub. Kegiatan</option>
                                @if ($sub_kegiatan)
                                    @foreach ($sub_kegiatan->kegiatan->sub_kegiatan as $s)
                                        <option value="{{ $s->kdsub }}"
                                            {{ $s->kdsub == $sub_kegiatan->kdsub ? 'selected' : '' }}>
                                            {{ $s->kdsub }} - {{ $s->uraian }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-container>
        <x-container>
            <x-slot name="content">
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="text-xs md:text-sm flex flex-col gap-y-3">
                        <div class="pt-3 space-y-3">
                            <div class="pt-3 space-y-3">
                                <div>
                                    <label for="rp_pagu1" class="block mb-1">Dalam Daerah</label>
                                    <input type="text" id="rp_pagu1" name="rp_pagu1"
                                        class="rounded-lg border border-gray-400 w-full text-xs md:text-sm shadow-md"
                                        placeholder="0" oninput="this.value = formatRupiah(this.value, 'Rp. ')">
                                </div>
                                <div>
                                    <label for="rp_pagu2" class="block mb-1">Luar Daerah Dalam Provinsi</label>
                                    <input type="text" id="rp_pagu2" name="rp_pagu2"
                                        class="rounded-lg border border-gray-400 w-full text-xs md:text-sm shadow-md"
                                        placeholder="0" oninput="this.value = formatRupiah(this.value, 'Rp. ')">
                                </div>
                                <div>
                                    <label for="rp_pagu3" class="block mb-1">Luar Daerah Luar Provinsi</label>
                                    <input type="text" id="rp_pagu3" name="rp_pagu3"
                                        class="rounded-lg border border-gray-400 w-full text-xs md:text-sm shadow-md"
                                        placeholder="0" oninput="this.value = formatRupiah(this.value, 'Rp. ')">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-4 pt-4">
                            <x-button.save-button />
                            <x-button.back-button :route="route('anggaran.index')" />
                        </div>
                    </div>
                </div>
            </x-slot>
        </x-container>
    </form>
</x-app-layout>
<script>
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
            dropdownCssClass: "text-xs md:text-sm",
            selectionCssClass: 'text-xs md:text-sm',
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
                            '<option value="" selected disabled>Pilih Sub. Kegiatan</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, kegiatan) {
                                $('#kegiatan_id').append('<option value="' +
                                    kegiatan.kdgiat + '">' + kegiatan.kdgiat +
                                    ' - ' + kegiatan.uraian +
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
                    '<option value="" selected disabled>Pilih Sub. Kegiatan</option>'
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
                            '<option value="" selected disabled>Pilih Sub. Kegiatan</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, subkegiatan) {
                                $('#sub_kegiatan_id').append('<option value="' +
                                    subkegiatan.kdsub + '">' + subkegiatan
                                    .kdsub + ' - ' + subkegiatan.uraian +
                                    '</option>');
                            });
                        } else {
                            $('#sub_kegiatan_id').append(
                                '<option value="" disabled>Tidak ada Sub. kegiatan tersedia</option>'
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
                    '<option value="" selected disabled>Pilih Sub. Kegiatan</option>');
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
                            '<option value="" selected disabled>Pilih Sub. {{ session('config')->judul }}</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, subbidang) {
                                $('#sub_bidang_id').append('<option value="' +
                                    subbidang.id + '">' + subbidang.uraian +
                                    '</option>');
                            });
                        } else {
                            $('#sub_bidang_id').append(
                                '<option value="" disabled>Tidak ada Sub. {{ session('config')->judul }} tersedia</option>'
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
                    '<option value="" selected disabled>Pilih Sub. {{ session('config')->judul }}</option>'
                );
            }
        });

        $('#bidang_id').trigger('change');
    });
</script>
