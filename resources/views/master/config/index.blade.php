<x-app-layout>
    <x-slot name="header">
        Pengaturan Sistem
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
                                    value="{{ $preferensi->appname }}" placeholder="Nama Aplikasi" required>
                            </div>
                        </div>
                    </fieldset>
                <fieldset class="border rounded-lg p-4 bg-white md:bg-gray-50 border-secondary-4 shadow-md">
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
                                    value="{{ $preferensi->opdskpd }}" placeholder="Nama Instansi" required>
                            </div>

                            <div class="flex flex-col gap-1">
                                <label for="instansi_pemerintah">Instansi Pemerintah</label>
                                <input type="text" id="instansi_pemerintah" name="instansi_pemerintah"
                                    class="md:text-sm text-xs rounded-lg border border-gray-300"
                                    value="{{ $preferensi->provinsi }}" placeholder="instansi Pemerintah"
                                    required>
                            </div>

                            <div class="flex flex-col gap-1">
                                <label for="instansi_alamat">Alamat Instansi</label>
                                <input type="text" id="instansi_alamat" name="instansi_alamat"
                                    class="md:text-sm text-xs rounded-lg border border-gray-300"
                                    value="{{ $preferensi->alamat }}" placeholder="Alamat Instansi"
                                    required>
                            </div>

                            <div class="flex flex-col gap-1">
                                <label for="instansi_kontak_email">Alamat Email Instansi</label>
                                <input type="email" id="instansi_kontak_email" name="instansi_kontak_email"
                                    class="md:text-sm text-xs rounded-lg border border-gray-300"
                                    value="{{ $preferensi->email }}"
                                    placeholder="Alamat Email Instansi" required>
                            </div>

                            <div class="flex flex-col gap-1">
                                <label for="instansi_kontak_fax">Alamat Fax Instansi</label>
                                <input type="text" id="instansi_kontak_fax" name="instansi_kontak_fax"
                                    class="md:text-sm text-xs rounded-lg border border-gray-300"
                                    value="{{ $preferensi->fax }}" placeholder="Fax Instansi"
                                    required>
                            </div>

                            <div class="flex flex-col gap-1">
                                <label for="instansi_kontak_telp">Kontak Telpon Instansi</label>
                                <input type="text" id="instansi_kontak_telp" name="instansi_kontak_telp"
                                    class="md:text-sm text-xs rounded-lg border border-gray-300"
                                    value="{{ $preferensi->telp }}" placeholder="Telpon Instansi"
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
