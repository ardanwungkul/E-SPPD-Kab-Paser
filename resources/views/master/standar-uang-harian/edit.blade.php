<x-app-layout>
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
    <x-slot name="header">
        Tambah Standar Uang Harian
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('suh.update', $suh->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="jenis_sppd_id">Edit Perjalanan Dinas</label>
                        <select id="jenis_sppd_id" name="jenis_sppd_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled> Pilih Jenis Perjalanan Dinas</option>
                            @foreach ($jenis as $item)
                                <option value="{{ $item->id }}" data-wilayah="{{ $item->wilayah }}"
                                    {{ $item->id == $suh->jenis_sppd_id ? 'selected' : '' }}>
                                    {{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <fieldset class="border-y py-3">
                            <legend class="ml-3 px-3">
                                Lokasi Tujuan
                            </legend>
                            <div class="space-y-3">
                                <div class="flex flex-col md:flex-row md:items-center justify-between gap-3 w-full">
                                    <label for="provinsi_id" class="w-32 flex-none">Provinsi</label>
                                    <select id="provinsi_id" name="provinsi_id"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md w-full select2"
                                        style="width: 100%" required>
                                        <option value="" selected disabled>Pilih Provinsi </option>
                                        @foreach ($provinsi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $suh->provinsi_id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col md:flex-row md:items-center justify-between gap-3 w-full">
                                    <label for="kabupaten_id" class="w-32 flex-none">Kabupaten/Kota</label>
                                    <select id="kabupaten_id" name="kabupaten_id"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md w-full select2"
                                        style="width: 100%">
                                        <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                        @foreach ($suh->provinsi->kabupaten_kota as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $suh->kabupaten_id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col md:flex-row md:items-center justify-between gap-3 w-full">
                                    <label for="kecamatan_id" class="w-32 flex-none">Kecamatan</label>
                                    <select id="kecamatan_id" name="kecamatan_id"
                                        class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md w-full select2"
                                        style="width: 100%">
                                        <option value="" selected disabled>Pilih Kecamatan </option>
                                        @if ($suh->kabupaten_id)
                                            @foreach ($suh->kabupaten->kecamatan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $suh->kecamatan_id ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="tingkat_sppd_id">Tingkat Perjalanan Dinas</label>
                        <select id="tingkat_sppd_id" name="tingkat_sppd_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled> Pilih Tingkat Perjalanan Dinas</option>
                            @foreach ($tingkat as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $suh->tingkat_sppd_id ? 'selected' : '' }}>{{ $item->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uang_harian">Jumlah Uang Harian</label>
                        <input type="text" id="uang_harian" name="uang_harian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $suh->uang_harian }}" oninput="this.value = formatRupiah(this.value, 'Rp. ')"
                            placeholder="Rp. 0" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="batas_biaya_penginapan">Batas Biaya Penginapan per Hari</label>
                        <input type="text" id="batas_biaya_penginapan" name="batas_biaya_penginapan"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            oninput="this.value = formatRupiah(this.value, 'Rp. ')" value="{{ $suh->uang_harian }}"
                            placeholder="Rp. 0" required>
                    </div>
                    <div class="flex justify-end items-center gap-4">
                        <button
                            class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1 shadow-md"
                            type="submit">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>

                            <p>Simpan</p>
                        </button>
                        <a class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1 shadow-md"
                            href="{{ route('suh.index') }}">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
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
    $('.select2').select2({
        dropdownCssClass: "text-xs md:text-sm",
        selectionCssClass: 'text-xs md:text-sm',
    });

    $('#provinsi_id').on('change', function() {
        const provinsiId = $(this).val();

        if (provinsiId) {
            $.ajax({
                url: "{{ route('get.kabupaten-kota-by-provinsi') }}",
                type: "GET",
                data: {
                    provinsi_id: provinsiId
                },
                success: function(response) {
                    $('#kabupaten_id').empty();
                    $('#kabupaten_id').append(
                        '<option value="" selected disabled>Pilih Kabupaten/Kota</option>'
                    );

                    $('#kecamatan_id').empty();
                    $('#kecamatan_id').append(
                        '<option value="" selected disabled>Pilih Kecamatan</option>'
                    );


                    if (response.length > 0) {
                        $.each(response, function(index, Kabupaten) {
                            $('#kabupaten_id').append('<option value="' +
                                Kabupaten.id + '">' + Kabupaten.nama +
                                '</option>');
                        });
                    } else {
                        $('#kabupaten_id').append(
                            '<option value="" disabled>Tidak ada Kabupaten/Kota tersedia</option>'
                        );
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#kabupaten_id').empty();
            $('#kabupaten_id').append('<option value="" selected disabled>Pilih Kabupaten/Kota</option>');
            $('#kecamatan_id').empty();
            $('#kecamatan_id').append(
                '<option value="" selected disabled>Pilih Kecamatan</option>'
            );
        }
    });
    $('#kabupaten_id').on('change', function() {
        const kabupatenId = $(this).val();

        if (kabupatenId) {
            $.ajax({
                url: "{{ route('get.kecamatan-by-kabupaten-kota') }}",
                type: "GET",
                data: {
                    kabupaten_kota_id: kabupatenId
                },
                success: function(response) {

                    $('#kecamatan_id').empty();
                    $('#kecamatan_id').append(
                        '<option value="" selected disabled>Pilih Kecamatan</option>'
                    );


                    if (response.length > 0) {
                        $.each(response, function(index, Kecamatan) {
                            $('#kecamatan_id').append('<option value="' +
                                Kecamatan.id + '">' + Kecamatan.nama +
                                '</option>');
                        });
                    } else {
                        $('#kecamatan_id').append(
                            '<option value="" disabled>Tidak ada Kecamatan tersedia</option>'
                        );
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#kecamatan_id').empty();
            $('#kecamatan_id').append(
                '<option value="" selected disabled>Pilih Kecamatan</option>'
            );
        }
    });
</script>
