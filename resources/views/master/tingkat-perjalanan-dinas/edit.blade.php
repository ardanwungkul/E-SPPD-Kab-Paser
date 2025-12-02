<x-app-layout>
    <x-slot name="header">
        Edit Tingkat Perjalanan Dinas {{ $tingkat_perjalanan_dinas->tingkat }}
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('tingkat-perjalanan-dinas.update', $tingkat_perjalanan_dinas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="tingkat_sppd">Tingkat SPPD</label>
                        <input type="number" id="tingkat_sppd" name="tingkat_sppd"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $tingkat_perjalanan_dinas->tingkat_sppd }}" placeholder="Masukkan Tingkat SPPD"
                            required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Uraian</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $tingkat_perjalanan_dinas->uraian }}" placeholder="Masukkan Uraian" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="keterangan">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="4"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" placeholder="Masukkan Keterangan" required>{{ $tingkat_perjalanan_dinas->keterangan }}</textarea>
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
