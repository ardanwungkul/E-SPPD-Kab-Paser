<x-app-layout>
    <x-slot name="header">
        Konfigurasi
    </x-slot>
    <x-container
        class="!p-0 !bg-transparent !shadow-none !border-none md:!bg-white md:!shadow-lg md:!p-5 md:!border md:!border-gray-200">
        <x-slot name="content">
            <form action="{{ route('preferensi.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="space-y-5">
                    <fieldset class="border rounded-lg p-4 bg-white md:bg-gray-100 border-secondary-4 shadow-md">
                        <legend align="center"
                            class="px-5 text-secondary-1 bg-white rounded-lg border md:text-sm text-xs">Sistem
                        </legend>
                        <div class="md:text-sm text-xs space-y-3">
                            <div class="flex flex-col gap-1">
                                <label for="nama_aplikasi">Nama Aplikasi</label>
                                <input type="text" id="nama_aplikasi" name="nama_aplikasi"
                                    class="md:text-sm text-xs rounded-lg border border-gray-300"
                                    value="{{ $preferensi->nama_aplikasi }}" placeholder="Nama Aplikasi" required>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="border rounded-lg p-4 bg-white md:bg-gray-100 border-secondary-4 shadow-md">
                        <legend align="center"
                            class="px-5 text-secondary-1 bg-white rounded-lg border md:text-sm text-xs">Profil
                            Instansi
                        </legend>
                        <div class="pt-3">
                            <div class="md:text-sm text-xs space-y-3">

                                <div class="flex flex-col gap-1">
                                    <label for="instansi_nama">Nama Instansi</label>
                                    <input type="text" id="instansi_nama" name="instansi_nama"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300"
                                        value="{{ $preferensi->instansi_nama }}" placeholder="Nama Instansi" required>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="instansi_pemerintah">Instansi Pemerintah</label>
                                    <input type="text" id="instansi_pemerintah" name="instansi_pemerintah"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300"
                                        value="{{ $preferensi->instansi_pemerintah }}" placeholder="instansi Pemerintah"
                                        required>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="instansi_alamat">Alamat Instansi</label>
                                    <input type="text" id="instansi_alamat" name="instansi_alamat"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300"
                                        value="{{ $preferensi->instansi_alamat }}" placeholder="Alamat Instansi"
                                        required>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="instansi_kontak_email">Alamat Email Instansi</label>
                                    <input type="email" id="instansi_kontak_email" name="instansi_kontak_email"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300"
                                        value="{{ $preferensi->instansi_kontak_email }}"
                                        placeholder="Alamat Email Instansi" required>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="instansi_kontak_fax">Alamat Fax Instansi</label>
                                    <input type="text" id="instansi_kontak_fax" name="instansi_kontak_fax"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300"
                                        value="{{ $preferensi->instansi_kontak_fax }}" placeholder="Fax Instansi"
                                        required>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="instansi_kontak_telp">Kontak Telpon Instansi</label>
                                    <input type="text" id="instansi_kontak_telp" name="instansi_kontak_telp"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300"
                                        value="{{ $preferensi->instansi_kontak_telp }}" placeholder="Telpon Instansi"
                                        required>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="instansi_provinsi">Provinsi Instansi</label>
                                    <select id="instansi_provinsi" name="instansi_provinsi"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300 select2"
                                        style="width: 100%">
                                        <option value="" selected disabled>Pilih Provinsi</option>
                                        @foreach ($provinsi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $preferensi->instansi_provinsi ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="instansi_kabupaten_kota">Kabupaten/Kota Instansi</label>
                                    <select id="instansi_kabupaten_kota" name="instansi_kabupaten_kota"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300 select2"
                                        style="width: 100%">
                                        <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                        @if ($preferensi->instansi_provinsi)
                                            @foreach ($preferensi->provinsi->kabupaten_kota as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $preferensi->instansi_kabupaten_kota ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="flex justify-end items-center gap-4">
                        <button
                            class="bg-white md:bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1 md:text-sm text-xs"
                            type="submit">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>
                            <p>Simpan</p>
                        </button>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
    <x-container
        class="!p-0 !bg-transparent !shadow-none !border-none md:!bg-white md:!shadow-lg md:!p-5 md:!border md:!border-gray-200">
        <x-slot name="content">
            <form action="{{ route('config.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="space-y-5">
                    <fieldset class="border rounded-lg p-4 bg-white md:bg-gray-100 border-secondary-4 shadow-md">
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
                    <fieldset class="border rounded-lg p-4 bg-white md:bg-gray-100 border-secondary-4 shadow-md">
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
                    </fieldset>

                    <div class="flex justify-end items-center gap-4">
                        <button
                            class="bg-white md:bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1 md:text-sm text-xs"
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
        </x-slot>
    </x-container>


</x-app-layout>
<script type="module">
    $(document).ready(function() {
        $('.select2').select2({
            dropdownCssClass: "text-sm",
            selectionCssClass: 'text-sm',
        });
    });
</script>
