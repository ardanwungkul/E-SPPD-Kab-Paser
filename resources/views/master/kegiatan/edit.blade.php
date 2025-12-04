<x-app-layout>
    <x-slot name="header">
        Edit Kegiatan
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('kegiatan.update', $kegiatan->kdgiat) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="program_id">Program</label>
                        <select name="program_id" id="program_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled> Pilih Program</option>
                            @foreach ($program as $item)
                                <option value="{{ $item->kdprog }}"
                                    {{ old('program_id', $kegiatan->kdprog) == $item->kdprog ? 'selected' : '' }}>{{ $item->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="kode">Kode Kegiatan</label>
                        <input type="text" id="kode" name="kode"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('kode', $kegiatan->kdgiat) }}" placeholder="Masukkan Kode Kegiatan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Nama Kegiatan</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('uraian', $kegiatan->uraian) }}" placeholder="Masukkan Nama Kegiatan" required>
                    </div>

                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button/>
                        <x-button.back-button :route="route('kegiatan.index')"/>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
