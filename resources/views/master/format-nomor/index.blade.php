<x-app-layout>
    <x-slot name="header">
        Format Nomor
    </x-slot>
    <x-container
        class="!p-0 !bg-transparent !shadow-none !border-none md:!bg-white md:!shadow-lg md:!p-5 md:!border md:!border-gray-200">
        <x-slot name="content">
            <form action="{{ route('config.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="space-y-5 max-w-xl mx-auto">
                    <fieldset class="border rounded-lg p-4 bg-white md:bg-gray-50 border-secondary-4 shadow-md">
                        <legend align="center"
                            class="px-5 text-secondary-1 bg-white rounded-lg border md:text-sm text-xs">Format
                            Penomoran
                        </legend>
                        <div class="pt-3">

                            <div class="md:text-sm text-xs space-y-3">
                                <div class="flex flex-col gap-1">
                                    <label for="no_spt">Nomor SPT</label>
                                    <input type="text" id="no_spt" name="no_spt"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300"
                                        value="{{ $config->no_spt }}" placeholder="Nomor SPT" required>
                                    <div id="suggestions"></div>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="no_sppd">Nomor SPPD</label>
                                    <input type="text" id="no_sppd" name="no_sppd"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300"
                                        value="{{ $config->no_sppd }}" placeholder="Nomor SPPD" required>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="no_spj">Nomor SPJ</label>
                                    <input type="text" id="no_spj" name="no_spj"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300"
                                        value="{{ $config->no_spj }}" placeholder="Nomor SPJ">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    {{-- <fieldset class="border rounded-lg p-4 bg-white md:bg-gray-50 border-secondary-4 shadow-md">
                        <legend align="center"
                            class="px-5 text-secondary-1 bg-white rounded-lg border md:text-sm text-xs">Judul
                            Bagian/Bidang
                        </legend>
                        <div class="pt-3">
                            <div class="md:text-sm text-xs space-y-3">
                                <div class="flex flex-col gap-1">
                                    <label for="judul">Judul</label>
                                    <select name="judul" id="judul"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300">
                                        <option value="" selected disabled>Pilih Judul</option>
                                        <option value="Bidang" {{ $config->judul == 'Bidang' ? 'selected' : '' }}>
                                            Bidang
                                        </option>
                                        <option value="Bagian" {{ $config->judul == 'Bagian' ? 'selected' : '' }}>
                                            Bagian
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset> --}}
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button />
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>

</x-app-layout>
