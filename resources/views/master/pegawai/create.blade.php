<x-app-layout>
    <x-slot name="header">
        Tambah Pegawai
    </x-slot>

    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf
        @method('POST')
        <x-container>
            <x-slot name="content">
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="jenis_pegawai_id">Jenis Pegawai</label>
                        <select name="jenis_pegawai_id" id="jenis_pegawai_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md select2" required>
                            <option value="" selected disabled>Pilih Jenis Pegawai</option>
                            @foreach ($jenis_pegawai as $item)
                                <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </x-slot>
        </x-container>
        <x-container>
            <x-slot name="content">
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Biodata
                    </legend>
                    <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                        <div class="flex flex-col gap-1">
                            <label id="nip_nik" for="nip">NIK/NIP</label>
                            <input type="text" id="nip" name="nip"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                value="{{ old('nip') }}" placeholder="Masukkan NIK/NIP Pegawai" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                value="{{ old('nama') }}" placeholder="Masukkan Nama Pegawai" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="bidang_id">{{ session('config')->judul }}</label>
                            <select name="bidang_id" id="bidang_id" class="text-sm rounded-lg select2" required>
                                <option value="" selected disabled>Pilih {{ session('config')->judul }}
                                </option>
                                @foreach ($bidang as $item)
                                    <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="sub_bidang_id">Sub. {{ session('config')->judul }}</label>
                            <select name="sub_bidang_id" id="sub_bidang_id" class="text-sm rounded-lg select2">
                                <option value="" selected disabled> Pilih Sub. {{ session('config')->judul }}
                                </option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="pangkat_id">Pangkat/Golongan</label>
                            <select name="pangkat_id" id="pangkat_id"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md select2" required>
                                <option value="" selected disabled>Pilih Pangkat/Golongan</option>
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="tingkat_id">Tingkat</label>
                            <select name="tingkat_id" id="tingkat_id"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md select2" required>
                                <option value="" selected disabled>Pilih Tingkat</option>
                                @foreach ($tingkat as $item)
                                    <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="no_hp">Nomor Hp</label>
                            <input type="text" id="no_hp" name="no_hp"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                value="{{ old('no_hp') }}" placeholder="Masukkan Nomor Handphone">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="jabatan_id">Jabatan</label>
                            <input type="text" id="jabatan" name="jabatan"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                value="{{ old('jabatan') }}" placeholder="Masukkan Jabatan" required>
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" class="text-xs md:text-sm h-10 rounded-lg border border-gray-300 shadow-md"
                                placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                        </div>
                        <div class="flex flex-col gap-1 col-span-2">
                            <label for="keterangan">Keterangan</label>
                            <textarea id="keterangan" name="keterangan" class="text-xs md:text-sm h-10 rounded-lg border border-gray-300 shadow-md"
                                placeholder="Masukkan Keterangan">{{ old('keterangan') }}</textarea>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p>Tanda Tangan Default</p>
                            <div class=" w-full flex justify-end">
                                <div class="toggler">
                                    <input id="ttd_default" name="ttd_default" type="checkbox">
                                    <label for="ttd_default">
                                        <svg class="toggler-on" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 130.2 130.2">
                                            <polyline class="path check" points="100.2,40.2 51.5,88.8 29.8,67.5">
                                            </polyline>
                                        </svg>
                                        <svg class="toggler-off" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 130.2 130.2">
                                            <line class="path line" x1="34.4" y1="34.4" x2="95.8"
                                                y2="95.8"></line>
                                            <line class="path line" x1="95.8" y1="34.4" x2="34.4"
                                                y2="95.8"></line>
                                        </svg>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-4 pt-4">
                            <x-button.save-button />
                            <x-button.back-button :route="route('pegawai.index')" />
                        </div>
                    </div>
                </fieldset>
            </x-slot>
        </x-container>
    </form>
</x-app-layout>
<script type="module">
    $('.select2').select2({
        dropdownCssClass: "text-xs",
        selectionCssClass: 'text-xs',
    });

    let currentMode = "NIK";

    function formatNIP(value) {
        // Hanya angka
        value = value.replace(/\D/g, "");

        // Format 8-6-1-3
        let part1 = value.substring(0, 8);
        let part2 = value.substring(8, 14);
        let part3 = value.substring(14, 15);
        let part4 = value.substring(15, 18);

        let formatted = part1;
        if (part2) formatted += " " + part2;
        if (part3) formatted += " " + part3;
        if (part4) formatted += " " + part4;

        return formatted;
    }

    $('#jenis_pegawai_id').on('change', function() {
        const jenisPegawaiId = $(this).val();

        let newMode = (jenisPegawaiId == 3 || jenisPegawaiId == 4 || jenisPegawaiId == 8) ?
            "NIP" :
            "NIK";

        if (newMode !== currentMode) {
            $('#nip').val('');
        }
        currentMode = newMode;
        if (newMode === "NIP") {
            $('#nip_nik').text('NIP');
            $('#nip').attr('placeholder', 'Masukkan NIP Pegawai');

            $('#nip').off('input').on('input', function() {
                $(this).val(formatNIP($(this).val()));
            });

        } else {
            $('#nip_nik').text('NIK');
            $('#nip').attr('placeholder', 'Masukkan NIK Pegawai');

            $('#nip').off('input');
        }

        if (jenisPegawaiId) {

            $('#pangkat_id').prop('disabled', true)
                        .html('<option selected disabled>Memuat...</option>');

            $.ajax({
                url: "{{ route('get.golongan.by.jenis-pegawai') }}",
                type: "GET",
                data: {
                    jenis_pegawai_id: jenisPegawaiId
                },
                success: function(response) {
                    $('#pangkat_id').empty();
                    $('#pangkat_id').append(
                        '<option value="" selected disabled>Pilih Pangkat/Golongan</option>'
                    );

                    if (response.length > 0) {
                        $.each(response, function(index, pangkat) {
                            $('#pangkat_id').append('<option value="' +
                                pangkat.id + '">' + pangkat.kdgol + ' - ' +pangkat.uraian +
                                '</option>');
                        });

                        $('#pangkat_id').prop('disabled', false);
                    } else {
                        $('#pangkat_id').append(
                            '<option value="" disabled>Tidak ada Pangkat/Golongan tersedia</option>'
                        );

                        $('#pangkat_id').prop('disabled', false);
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#pangkat_id').empty();
            $('#pangkat_id').append('<option value="" selected disabled>Pilih Pangkat/Golongan</option>');
        }
    });
    $('#bidang_id').on('change', function() {
        const bidangId = $(this).val();

        if (bidangId) {
            $('#sub_bidang_id').prop('disabled', true)
                        .html('<option selected disabled>Memuat...</option>');            

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

                        $('#sub_bidang_id').prop('disabled', false);
                    } else {
                        $('#sub_bidang_id').append(
                            '<option value="" disabled>Tidak ada Sub. {{ session('config')->judul }} tersedia</option>'
                        );

                        $('#sub_bidang_id').prop('disabled', false);
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
</script>
