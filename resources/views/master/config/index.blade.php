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
                <div class="space-y-5 max-w-xl mx-auto">
                    <fieldset class="border rounded-lg p-4 bg-white md:bg-gray-50 border-secondary-4 shadow-md">
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
                    {{-- <fieldset class="border rounded-lg p-4 bg-white md:bg-gray-50 border-secondary-4 shadow-md">
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
                    </fieldset> --}}
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button />
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
    <x-container
        class="!p-0 !bg-transparent !shadow-none !border-none md:!bg-white md:!shadow-lg md:!p-5 md:!border md:!border-gray-200">
        <x-slot name="content">
            <form action="{{ route('kop-surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="space-y-5 max-w-6xl mx-auto">
                    <fieldset class="border-t rounded-lg p-4 border-secondary-4">
                        <legend align="center"
                            class="px-5 text-secondary-1 bg-white rounded-lg border md:text-sm text-xs">Kop Surat
                        </legend>
                        <div class="pt-3">

                            <div class="mb-4 border-b border-gray-200">
                                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="kop-surat-tab"
                                    data-tabs-toggle="#kop-surat-tab-content" role="tablist">
                                    <li class="me-2" role="presentation">
                                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="dprd-tab"
                                            data-tabs-target="#kop-dprd" type="button" role="tab"
                                            aria-controls="kop-dprd" aria-selected="false">DPRD</button>
                                    </li>
                                    <li class="me-2" role="presentation">
                                        <button
                                            class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                                            id="setwan-tab" data-tabs-target="#kop-setwan" type="button"
                                            role="tab" aria-controls="kop-setwan"
                                            aria-selected="false">Sekretariat Dewan</button>
                                    </li>
                                </ul>
                            </div>
                            <div id="kop-surat-tab-content">
                                <div class="hidden p-4 rounded-lg bg-gray-50 shadow-lg" id="kop-dprd"
                                    role="tabpanel" aria-labelledby="dprd-tab">
                                    <div class="flex w-full items-center px-5 border-b pb-3 border-gray-500">
                                        <div class="flex-none">
                                            <div class="h-28 relative group">
                                                <label for="dprd_logo" class="cursor-pointer">
                                                    <img id="dprd_logo_preview"
                                                        src="{{ $kop_surat->dprd_logo && file_exists(public_path('storage/' . $kop_surat->dprd_logo)) ? asset('storage/' . $kop_surat->dprd_logo) : asset('assets/images/placeholder-potrait.png') }}"
                                                        alt="Preview Gambar" class="w-full h-28 object-cover" />
                                                    <div
                                                        class="absolute w-full h-full bg-black/20 top-0 rounded-lg hidden group-hover:block cursor-pointer">
                                                    </div>
                                                </label>
                                                <input type="file" id="dprd_logo" name="dprd_logo"
                                                    accept="image/*" class="hidden" />

                                            </div>

                                            <script>
                                                document.getElementById('dprd_logo').addEventListener('change', function(e) {
                                                    const file = e.target.files[0];
                                                    if (!file) return;

                                                    const reader = new FileReader();
                                                    reader.onload = function(event) {
                                                        document.getElementById('dprd_logo_preview').src = event.target.result;
                                                    };
                                                    reader.readAsDataURL(file);
                                                });
                                            </script>

                                        </div>
                                        <div class="w-full">
                                            <div class="flex flex-col items-center justify-center w-full">
                                                <input required name="dprd_header_1"
                                                    value="{{ $kop_surat->dprd_header_1 }}"
                                                    class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-bold text-lg">
                                                <input required name="dprd_header_2"
                                                    value="{{ $kop_surat->dprd_header_2 }}"
                                                    class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-semibold">
                                                <input required name="dprd_header_3"
                                                    value="{{ $kop_surat->dprd_header_3 }}"
                                                    class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 text-sm">
                                                <input required name="dprd_header_4"
                                                    value="{{ $kop_surat->dprd_header_4 }}"
                                                    class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-semibold">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="hidden p-4 rounded-lg bg-gray-50 shadow-lg" id="kop-setwan"
                                    role="tabpanel" aria-labelledby="setwan-tab">
                                    <div class="flex w-full items-center px-5 border-b pb-3 border-gray-500">
                                        <div class="flex-none">
                                            <div class="h-28 relative group">
                                                <label for="setwan_logo" class="cursor-pointer">
                                                    <img id="setwan_logo_preview"
                                                        src="{{ $kop_surat->setwan_logo && file_exists(public_path('storage/' . $kop_surat->setwan_logo)) ? asset('storage/' . $kop_surat->setwan_logo) : asset('assets/images/placeholder-potrait.png') }}"
                                                        alt="Preview Gambar" class="w-full h-28 object-cover" />
                                                    <div
                                                        class="absolute w-full h-full bg-black/20 top-0 rounded-lg hidden group-hover:block cursor-pointer">
                                                    </div>
                                                </label>
                                                <input type="file" id="setwan_logo" name="setwan_logo"
                                                    accept="image/*" class="hidden" />

                                            </div>

                                            <script>
                                                document.getElementById('setwan_logo').addEventListener('change', function(e) {
                                                    const file = e.target.files[0];
                                                    if (!file) return;

                                                    const reader = new FileReader();
                                                    reader.onload = function(event) {
                                                        document.getElementById('setwan_logo_preview').src = event.target.result;
                                                    };
                                                    reader.readAsDataURL(file);
                                                });
                                            </script>

                                        </div>
                                        <div class="w-full">
                                            <div class="flex flex-col items-center justify-center w-full">
                                                <input required name="setwan_header_1"
                                                    value="{{ $kop_surat->setwan_header_1 }}"
                                                    class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-bold text-lg">
                                                <input required name="setwan_header_2"
                                                    value="{{ $kop_surat->setwan_header_2 }}"
                                                    class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-semibold">
                                                <input required name="setwan_header_3"
                                                    value="{{ $kop_surat->setwan_header_3 }}"
                                                    class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 text-sm">
                                                <input required name="setwan_header_4"
                                                    value="{{ $kop_surat->setwan_header_4 }}"
                                                    class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-semibold">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </fieldset>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button />
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


        const placeholderNoSPT = ['{nomor_urut}', '{lembaga}', '{bulan}', '{tahun}'];
        const inputSPT = $('#no_spt');

        function updateInputColor() {
            const val = input.val();
            const containsPlaceholder = placeholders.some(ph => val.includes(ph));
            if (containsPlaceholder) {
                input.css('color', '#2563eb');
            } else {
                input.css('color', '');
            }
        }

        $(inputSPT).on('input', function() {
            const inputVal = $(this).val();
            console.log(inputVal);

            const $suggestions = $('#suggestions');
            $suggestions.empty();

            const missing = placeholderNoSPT.filter(ph => !inputVal.includes(ph));

            if (missing.length > 0) {
                $suggestions.append('<p>Placeholder yang harus ditambahkan:</p>');
                missing.forEach(function(ph) {
                    const $btn = $('<button type="button">')
                        .text(ph.replace(/[{}]/g, '')
                            .replace(/_/g, ' ')
                            .replace(/\b\w/g, c => c.toUpperCase()))
                        .css({
                            margin: '4px',
                            padding: '4px 8px',
                            cursor: 'pointer',
                            borderRadius: '6px',
                            border: '1px solid #ccc',
                            backgroundColor: '#f0f0f0'
                        })
                        .on('click', function() {
                            const input = document.getElementById('no_spt');
                            const start = input.selectionStart;
                            const end = input.selectionEnd;
                            const before = input.value.substring(0, start);
                            const after = input.value.substring(end);
                            input.value = before + ph + after;

                            input.focus();
                            input.setSelectionRange(start + ph.length, start + ph.length);
                            $('#no_spt').trigger('input');
                        });

                    $suggestions.append($btn);
                });
            }
        });
    });
</script>
