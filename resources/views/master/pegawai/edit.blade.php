<x-app-layout>
    <x-slot name="header">
        Edit Pegawai {{ $pegawai->nama }}
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm grid grid-cols-2 gap-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $pegawai->nip }}" placeholder="Masukkan NIP Pegawai" required>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $pegawai->nama }}" placeholder="Masukkan Nama Pegawai" required>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="no_hp">No. Hp</label>
                        <input type="text" id="no_hp" name="no_hp"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $pegawai->nomor_hp }}" placeholder="Masukkan Nomor Handphone">
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            placeholder="Masukkan Keterangan">{{ $pegawai->keterangan }}</textarea>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            placeholder="Masukkan Alamat">{{ $pegawai->alamat }}</textarea>
                    </div>

                    <div class="border-b pt-2 col-span-2">
                    </div>
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <label for="jenis_pegawai_id">Jenis Pegawai</label>
                        <select name="jenis_pegawai_id" id="jenis_pegawai_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md select2" required>
                            <option value="" selected disabled>Pilih Jenis Pegawai</option>
                            @foreach ($jenis_pegawai as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $pegawai->pangkat->jnspeg ? 'selected' : '' }}>
                                    {{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <label for="pangkat_id">Pangkat/Golongan</label>
                        <select name="pangkat_id" id="pangkat_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md select2" required>
                            <option value="" selected disabled>Pilih Pangkat/Golongan</option>
                            @foreach ($pegawai->pangkat->jenis_pegawai->pangkat as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $pegawai->pangkat_id ? 'selected' : '' }}>{{ $item->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="bidang_id">{{ session('config')->judul }}</label>
                        <select name="bidang_id" id="bidang_id" class="text-sm rounded-lg select2" required>
                            <option value="" selected disabled>Pilih {{ session('config')->judul }}
                            </option>
                            @foreach ($bidang as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $pegawai->bidang_id ? 'selected' : '' }}>
                                    {{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="sub_bidang_id">Sub. {{ session('config')->judul }}</label>
                        <select name="sub_bidang_id" id="sub_bidang_id" class="text-sm rounded-lg select2">
                            <option value="" selected disabled> Pilih Sub. {{ session('config')->judul }}
                            </option>
                            @if ($pegawai->bidang_sub_id)
                                @foreach ($pegawai->sub_bidang->bidang->sub_bidang as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $pegawai->bidang_sub_id ? 'selected' : '' }}>
                                        {{ $item->uraian }}
                                    </option>
                                @endforeach
                            @else
                                @foreach ($pegawai->bidang->sub_bidang as $item)
                                    <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <label for="tingkat_id">Tingkat</label>
                        <select name="tingkat_id" id="tingkat_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md select2" required>
                            <option value="" selected disabled>Pilih Tingkat</option>
                            @foreach ($tingkat as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $pegawai->tingkat_id ? 'selected' : '' }}>{{ $item->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <label for="jabatan_id">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $pegawai->jabatan }}" placeholder="Masukkan Jabatan" required>
                    </div>
                    <div class="border-b pt-2 col-span-2">
                    </div>
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <p>Tanda Tangan Default</p>
                        <div class="toggler">
                            <input id="ttd_default" name="ttd_default"
                                {{ $pegawai->ttd_default == 'Y' ? 'checked' : '' }} type="checkbox">
                            <label for="ttd_default">
                                <svg class="toggler-on" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 130.2 130.2">
                                    <polyline class="path check" points="100.2,40.2 51.5,88.8 29.8,67.5"></polyline>
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
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <p>Aktif</p>
                        <div class="toggler">
                            <input id="aktif" name="aktif" {{ $pegawai->aktif == 'Y' ? 'checked' : '' }}
                                type="checkbox">
                            <label for="aktif">
                                <svg class="toggler-on" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 130.2 130.2">
                                    <polyline class="path check" points="100.2,40.2 51.5,88.8 29.8,67.5"></polyline>
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
                    <div class="border-b pt-2 col-span-2">
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4 col-span-2">
                        <x-button.save-button/>
                        <x-button.back-button :route="route('pegawai.index')"/>
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

    $('#jenis_pegawai_id').on('change', function() {
        const jenisPegawaiId = $(this).val();

        if (jenisPegawaiId) {
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
                                pangkat.id + '">' + pangkat.uraian +
                                '</option>');
                        });
                    } else {
                        $('#pangkat_id').append(
                            '<option value="" disabled>Tidak ada Pangkat/Golongan tersedia</option>'
                        );
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
</script>
