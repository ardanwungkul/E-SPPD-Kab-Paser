<x-app-layout>
    <x-slot name="header">
        Konfigurasi
    </x-slot>
    <x-container>
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 ">
                <legend align="center" class="px-3">Format Penomoran</legend>
                <div class="pt-3">
                    <form action="{{ route('config.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="text-sm space-y-3">
                            <div class="flex flex-col gap-1">
                                <label for="no_spt">Nomor SPT</label>
                                <input type="text" id="no_spt" name="no_spt"
                                    class="text-sm rounded-lg border border-gray-300" value="{{ $config->no_spt }}"
                                    placeholder="Nomor SPT" required>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="no_sppd">Nomor SPPD</label>
                                <input type="text" id="no_sppd" name="no_sppd"
                                    class="text-sm rounded-lg border border-gray-300" value="{{ $config->no_sppd }}"
                                    placeholder="Nomor SPPD" required>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="no_spj">Nomor SPJ</label>
                                <input type="text" id="no_spj" name="no_spj"
                                    class="text-sm rounded-lg border border-gray-300" value="{{ $config->no_spj }}"
                                    placeholder="Nomor SPJ">
                            </div>
                            <div class="flex justify-end items-center gap-4">
                                <button
                                    class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                                    type="submit">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                                    </svg>
                                    <p>Simpan</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
    <x-container>
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 ">
                <legend align="center" class="px-3">Sistem</legend>
                <div class="pt-3">
                    <form action="{{ route('preferensi.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="text-sm space-y-3">
                            <div class="flex flex-col gap-1">
                                <label for="nama_aplikasi">Nama Aplikasi</label>
                                <input type="text" id="nama_aplikasi" name="nama_aplikasi"
                                    class="text-sm rounded-lg border border-gray-300"
                                    value="{{ $preferensi->nama_aplikasi }}" placeholder="Nama Aplikasi" required>
                            </div>
                            <div class="flex justify-end items-center gap-4">
                                <button
                                    class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                                    type="submit">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                                    </svg>
                                    <p>Simpan</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </fieldset>
        </x-slot>
    </x-container>
</x-app-layout>
