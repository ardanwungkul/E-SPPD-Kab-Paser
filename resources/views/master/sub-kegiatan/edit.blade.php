<x-app-layout>
    <x-slot name="header">
        Edit Sub. Kegiatan
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('sub-kegiatan.update', $sub_kegiatan->kdsub) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="program_id">Program</label>
                        <select name="program_id" id="program_id" class="text-xs md:text-sm rounded-lg select2" required>
                            <option value="" selected disabled> Pilih Program</option>
                            @foreach ($program as $item)
                                <option value="{{ $item->kdprog }}"
                                    {{ old('program_id', $sub_kegiatan->kdprog) == $item->kdprog ? 'selected' : '' }}>
                                    {{ $item->kdprog }} - {{ $item->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="kegiatan_id">Kegiatan</label>
                        <select name="kegiatan_id" id="kegiatan_id" class="text-xs md:text-sm rounded-lg select2"
                            required>
                            <option value="" selected disabled> Pilih Kegiatan</option>
                            @foreach ($sub_kegiatan->kegiatan->program->kegiatan as $item)
                                <option value="{{ $item->kdgiat }}"
                                    {{ $sub_kegiatan->kdgiat == $item->kdgiat ? 'selected' : '' }}>{{ $item->kdgiat }} - {{ $item->uraian }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="kode">Kode Sub. Kegiatan</label>
                        <input type="text" id="kode" name="kode"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('kode', $sub_kegiatan->kdsub) }}" placeholder="Masukkan Kode Sub. Kegiatan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Nama Sub. Kegiatan</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('uraian', $sub_kegiatan->uraian) }}" placeholder="Masukkan Nama Sub. Kegiatan " required>
                    </div>

                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button/>
                        <x-button.back-button :route="route('sub-kegiatan.index')"/>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
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

                        if (response.length > 0) {
                            $.each(response, function(index, kegiatan) {
                                $('#kegiatan_id').append('<option value="' +
                                    kegiatan.kdgiat + '">' + kegiatan.kdgiat + ' - ' + kegiatan.uraian +
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
