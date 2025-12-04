<x-app-layout>
    <x-slot name="header">
        Tambah Kegiatan
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('kegiatan.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="program_id">Program</label>
                        <select name="program_id" id="program_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled> Pilih Program</option>
                            @foreach ($program as $item)
                                <option {{ old('program_id') == $item->kdprog ? 'selected' : '' }} value="{{ $item->kdprog }}">{{$item->kdprog}} - {{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="kode">Kode Kegiatan</label>
                        <input type="text" id="kode" name="kode"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('kode') }}" placeholder="Masukkan Kode Kegiatan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Nama Kegiatan</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('uraian') }}" placeholder="Masukkan Nama Kegiatan " required>
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
