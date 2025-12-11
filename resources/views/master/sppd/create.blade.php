<x-app-layout>
    <x-slot name="header">
        Surat Perintah Dinas
    </x-slot>

    <x-container>
        <x-slot name="content">
            <ul class="space-y-3 list-decimal pl-6 text-sm">
                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class="w-1/3 min-w-[33.333%]">Pejabat yang memberi perintah</label>
                        <div class="flex-1">: {{ $spt->ub->jabatan }}</div>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class="w-1/3 min-w-[33.333%]">Nama / NIP Pegawai yang diperintahkan</label>
                        <div class="flex-1">: {{ $spt->ub->nama }} /
                            {{ in_array($spt->ub->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }}: {{ $spt->ub->nip }}
                        </div>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <label class="w-1/3 min-w-[33.333%]">a. Pangkat dan Golongan</label>
                            <div class="flex-1">: {{ $spt->ub->pangkat->uraian }} - {{ $spt->ub->pangkat->kdgol }}</div>
                        </div>
                        <div class="flex items-start gap-4">
                            <label class="w-1/3 min-w-[33.333%]">b. Jabatan Instansi</label>
                            <div class="flex-1">: {{ $spt->ub->jabatan }}</div>
                        </div>
                        <div class="flex items-start gap-4">
                            <label class="w-1/3 min-w-[33.333%]">c. Tingkat Perjalanan Dinas</label>
                            <select name="tingkat_id" id="tingkat_id"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md select2" required>
                                <option value="" selected disabled>Pilih Tingkat</option>
                                @foreach ($tingkat as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $spt->ub->tingkat_id ? 'selected' : '' }}>{{ $item->uraian }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class="w-1/3 min-w-[33.333%]">Maksud Perjalanan Dinas</label>
                        <ul class=" pl-4 list-decimal space-y-3 flex-grow">
                            @foreach ($spt->untuk as $item)
                                <li>{{ $item->untuk_ket }}</li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class="w-1/3 min-w-[33.333%]" for="angkutan">Angkutan yang digunakan</label>
                        <input type="text" id="angkutan" name="angkutan"
                            class=" flex-grow text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('angkutan') }}" placeholder="Nama Angkutan" required>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="space-y-4">
                        <div class="flex items-start gap-4">
                            <label class="w-1/3 min-w-[33.333%]">a. Tempat Berangkat</label>
                            <select name="tmpt_brkt" id="tmpt_brkt"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2" required>
                                <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                @foreach ($kabkota as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-start gap-4">
                            <label class="w-1/3 min-w-[33.333%]">b. Tempat Tujuan</label>
                            <div class=" grid grid-cols-3 gap-3 flex-grow">

                                <div class="flex flex-col gap-1">
                                    <label for="provinsi_id">Provinsi Tujuan</label>
                                    <select name="provinsi_id" id="provinsi_id"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2"
                                        required disabled>
                                        <option value="" selected disabled>Pilih Provinsi</option>
                                        @foreach ($provinsi as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == $spt->provinsi_id ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="kabupaten_kota_id">Kabupaten/Kota Tujuan</label>
                                    <select name="kabupaten_kota_id" id="kabupaten_kota_id"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2"
                                        required disabled>
                                        <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                        @foreach ($kabkota as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == ($spt->kabkota_id ?? '') ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="kecamatan_id">Kecamatan Tujuan</label>
                                    <select name="kecamatan_id" id="kecamatan_id"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2"
                                        required disabled>
                                        <option value="" selected disabled>Pilih Kecamatan</option>
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }}"
                                                {{ $item->id == ($spt->kecamatan_id ?? '') ? 'selected' : '' }}>
                                                {{ $item->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class="w-1/3 min-w-[33.333%]">Tanggal Berangkat</label>
                        <input type="date" class="border p-2 rounded" value="2025-12-11" />
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class="w-1/3 min-w-[33.333%]">Tanggal Kembali</label>
                        <input type="date" class="border p-2 rounded" value="2025-12-11" />
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="space-y-2">
                        <div class="flex items-start gap-4">
                            <label class="w-1/3 min-w-[33.333%]">Instansi</label>
                            <span>INSPEKTORAT</span>
                        </div>
                        <div class="flex items-start gap-4">
                            <label class="w-1/3 min-w-[33.333%]">Mata Anggaran</label>
                            <span>5.0.5.0.1</span>
                        </div>
                    </div>
                </li>

                <li class=" pl-2">
                    <label class="block mb-2">Keterangan Lain-lain</label>
                    <textarea class="border p-2 rounded w-full h-32"></textarea>
                </li>

            </ul>
        </x-slot>
    </x-container>
</x-app-layout>

<script type="module">
    $('.select2').select2({
        dropdownCssClass: "text-xs",
        selectionCssClass: 'text-xs',
    });
</script>
