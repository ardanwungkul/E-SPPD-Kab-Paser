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
                            href="{{ route('tingkat-perjalanan-dinas.index') }}">
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
