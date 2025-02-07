<x-app-layout>
    <x-slot name="header">
        Edit Sub Kegiatan
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('sub-kegiatan.update', $sub_kegiatan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-sm space-y-3">
                    <div class="flex flex-col gap-1">
                        <label for="program_kode">Program</label>
                        <select name="program_kode" id="program_kode" class="text-sm rounded-lg select2" required>
                            <option value="" selected disabled> Pilih Program</option>
                            @foreach ($program as $item)
                                <option value="{{ $item->kode }}"
                                    {{ $sub_kegiatan->kegiatan->program_kode == $item->kode ? 'selected' : '' }}>
                                    {{ $item->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="kegiatan_id">Kegiatan</label>
                        <select name="kegiatan_id" id="kegiatan_id" class="text-sm rounded-lg select2" required>
                            <option value="" selected disabled> Pilih Kegiatan</option>
                            @foreach ($sub_kegiatan->kegiatan->program->kegiatan as $item)
                                <option value="{{ $item->id }}"
                                    {{ $sub_kegiatan->kegiatan_id == $item->id ? 'selected' : '' }}>{{ $item->uraian }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="kode">Kode</label>
                        <input type="text" id="kode" name="kode" class="text-sm rounded-lg"
                            value="{{ $sub_kegiatan->kode }}" placeholder="Masukkan Kode " required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Uraian</label>
                        <input type="text" id="uraian" name="uraian" class="text-sm rounded-lg"
                            value="{{ $sub_kegiatan->uraian }}" placeholder="Masukkan Uraian " required>
                    </div>

                    <div class="flex justify-end items-center gap-4">
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
                            href="{{ route('sub-kegiatan.index') }}">
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
    $(document).ready(function() {
        $('.select2').select2({
            dropdownCssClass: "text-sm",
            selectionCssClass: 'text-sm',
        });

        $('#program_kode').on('change', function() {
            const programKode = $(this).val();

            if (programKode) {
                $.ajax({
                    url: "{{ route('get.kegiatan.by.program') }}",
                    type: "GET",
                    data: {
                        program_kode: programKode
                    },
                    success: function(response) {
                        $('#kegiatan_id').empty();
                        $('#kegiatan_id').append(
                            '<option value="" selected disabled>Pilih Kegiatan</option>'
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
            }
        });
    });
</script>
