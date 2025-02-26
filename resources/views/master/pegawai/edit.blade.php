<x-app-layout>
    <x-slot name="header">
        Edit Pegawai {{ $pegawai->nama }}
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm grid grid-cols-2 gap-3">
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <label for="jenis_pegawai_id">Jenis Pegawai</label>
                        <select name="jenis_pegawai_id" id="jenis_pegawai_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 select2" required>
                            <option value="" selected disabled>Pilih Jenis Pegawai</option>
                            @foreach ($jenis_pegawai as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $pegawai->pangkat->jenis_pegawai_id ? 'selected' : '' }}>
                                    {{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <label for="pangkat_id">Pangkat/Golongan</label>
                        <select name="pangkat_id" id="pangkat_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 select2" required>
                            <option value="" selected disabled>Pilih Pangkat/Golongan</option>
                            @foreach ($pegawai->pangkat->jenis_pegawai->pangkat as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $pegawai->pangkat_id ? 'selected' : '' }}>{{ $item->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2 md:col-span-1">
                        <label for="tingkat_id">Tingkat</label>
                        <select name="tingkat_id" id="tingkat_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 select2" required>
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
                            class="text-xs md:text-sm rounded-lg border border-gray-300"
                            value="{{ $pegawai->jabatan }}" placeholder="Masukkan Jabatan" required>
                    </div>
                    <div class="border-b pt-2 col-span-2">
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip"
                            class="text-xs md:text-sm rounded-lg border border-gray-300" value="{{ $pegawai->nip }}"
                            placeholder="Masukkan NIP Pegawai" required>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="text-xs md:text-sm rounded-lg border border-gray-300" value="{{ $pegawai->nama }}"
                            placeholder="Masukkan Nama Pegawai" required>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="no_hp">No. Hp</label>
                        <input type="text" id="no_hp" name="no_hp"
                            class="text-xs md:text-sm rounded-lg border border-gray-300" value="{{ $pegawai->no_hp }}"
                            placeholder="Masukkan Nomor Handphone">
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" class="text-xs md:text-sm rounded-lg border border-gray-300"
                            placeholder="Masukkan Keterangan">{{ $pegawai->keterangan }}</textarea>
                    </div>
                    <div class="flex flex-col gap-1 col-span-2">
                        <label for="alamat">Alamat</label>
                        <textarea id="alamat" name="alamat" class="text-xs md:text-sm rounded-lg border border-gray-300"
                            placeholder="Masukkan Alamat">{{ $pegawai->alamat }}</textarea>
                    </div>
                    <div class="flex justify-end items-center gap-4 col-span-2">
                        <button
                            class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                            type="submit">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>

                            <p>Simpan</p>
                        </button>
                        <a class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                            href="{{ route('pegawai.index') }}">
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
</script>
