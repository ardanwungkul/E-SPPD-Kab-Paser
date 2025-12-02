<x-app-layout>
    <x-slot name="header">
        Tambah Tingkat Perjalanan Dinas
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('tingkat-perjalanan-dinas.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="tingkat_sppd">Tingkat SPPD</label>
                        <input type="number" id="tingkat_sppd" name="tingkat_sppd"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('tingkat') }}" placeholder="Masukkan Tingkat SPPD" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Uraian</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('uraian') }}" placeholder="Masukkan Uraian" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="4"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" placeholder="Masukkan Keterangan" required></textarea>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button/>
                        <x-button.back-button :route="route('tingkat-perjalanan-dinas.index')"/>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
