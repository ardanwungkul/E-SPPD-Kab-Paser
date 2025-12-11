<x-app-layout>
    <x-slot name="header">
        Surat Perintah Dinas
    </x-slot>

    <x-container>
        <x-slot name="content">
            <ul class="space-y-3 list-decimal pl-6 text-sm">
                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class=" w-48 min-w-48">Pejabat yang memberi perintah</label>
                        <div class="flex-1">: {{ $spt->ub->jabatan }}</div>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class=" w-48 min-w-48">Nama / NIP Pegawai yang diperintahkan</label>
                        <div class="flex-1">: {{ $spt->ub->nama }} /
                            {{ in_array($spt->ub->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }}: {{ $spt->ub->nip }}
                        </div>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="space-y-3">
                        <div class="flex items-start gap-4">
                            <label class=" w-48 min-w-48">a. Pangkat dan Golongan</label>
                            <div class="flex-1">: {{ $spt->ub->pangkat->uraian }} - {{ $spt->ub->pangkat->kdgol }}</div>
                        </div>
                        <div class="flex items-start gap-4">
                            <label class=" w-48 min-w-48">b. Jabatan Instansi</label>
                            <div class="flex-1">: {{ $spt->ub->jabatan }}</div>
                        </div>
                        <div class="flex items-start gap-4">
                            <label class=" w-48 min-w-48">c. Tingkat Perjalanan Dinas</label>
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
                        <label class=" w-48 min-w-48">Maksud Perjalanan Dinas</label>
                        <ul class=" pl-4 list-decimal space-y-3 flex-grow">
                            @foreach ($spt->untuk as $item)
                                <li>{{ $item->untuk_ket }}</li>
                            @endforeach
                        </ul>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class=" w-48 min-w-48" for="angkutan">Angkutan yang digunakan</label>
                        <input type="text" id="angkutan" name="angkutan"
                            class=" flex-grow text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('angkutan') }}" placeholder="Nama Angkutan" required>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class="space-y-3">
                        <div class="flex items-start gap-4">
                            <label class=" w-48 min-w-48">a. Tempat Berangkat</label>
                            <select name="tmpt_brkt" id="tmpt_brkt"
                                class="md:text-sm text-xs sm:text-sm rounded-lg border border-gray-300 shadow-md select2"
                                required>
                                <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                @foreach ($kabkota as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-start gap-4">
                            <label class=" w-48 min-w-48">b. Tempat Tujuan</label>
                            <table class=" flex-grow">
                                <thead>
                                    <tr class=" text-left">
                                        <th>Provinsi</th>
                                        <th>Kabupaten/kota</th>
                                        <th>Kecamatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($spt->tujuan as $item)
                                        <tr>
                                            <td class=" pt-3">{{ $item['provinsi_name'] ?? '-' }}</td>
                                            <td class=" pt-3">{{ $item['kabkota_name'] ?? '-' }}</td>
                                            <td class=" pt-3">{{ $item['kecamatan_name'] ?? '-' }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                </li>

                <li class=" pl-2">
                    <div class="space-y-3">
                        <div class="flex items-start gap-4">
                            <label class=" w-48 min-w-48">a. Tanggal Berangkat</label>
                            <p>: {{ $spt->tanggal_berangkat }}</p>
                        </div>

                        <div class="flex items-start gap-4">
                            <label class=" w-48 min-w-48">b. Tanggal Kembali</label>
                            <p>: {{ $spt->tanggal_kembali }}</p>
                        </div>
                    </div>
                </li>
                <li class=" pl-2">
                    <div class="flex items-start gap-4">
                        <label class=" w-48 min-w-48">Pegawai</label>
                        <table class=" flex-grow">
                            <thead>
                                <tr class=" text-left">
                                    <th>No.</th>
                                    <th>Nama Pegawai/(NIP/NIK)</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($spt->pegawai as $item)
                                    <tr>
                                        <td class=" pt-3 align-top">{{$item->pegawai_idx + 1}}</td>
                                        <td class=" pt-3 align-top">{{$item->nama}} / {{ in_array($item->pangkat?->jnspeg, [3, 4, 8]) ? 'NIP' : 'NIK' }} : {{$item->nip}}</td>
                                        <td class=" pt-3">
                                            <textarea name="pegawai[{{$item->pegawai_idx + 1}}][uraian]" id="pegawai[{{$item->pegawai_idx + 1}}][uraian]" rows="2"
                                                class="w-full text-sm rounded-lg border border-secondary-4" placeholder="Keterangan" required></textarea>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class=" flex items-start gap-4">
                        <label class=" w-48 min-w-48">Pembebanan Anggaran</label>

                        <div class=" w-full space-y-3">
                            <div class="flex items-start gap-4">
                                <label class=" w-48 min-w-48">a. Bidang</label>
                                <span>{{ $spt->sub_bidang->bidang->uraian }}</span>
                            </div>
                            <div class="flex items-start gap-4">
                                <label class=" w-48 min-w-48">b. Sub Kegiatan</label>
                                <span>{{ $spt->kdgiat_sub }} - {{ $spt->sub_kegiatan->uraian }}</span>
                            </div>
                        </div>
                    </div>
                </li>

                <li class=" pl-2">
                    <div class=" flex items-start gap-4">
                        <label class=" w-48 min-w-48">Keterangan Lain-lain</label>
                        <textarea name="ket_lain" id="ket_lain" rows="3" class="w-full text-sm rounded-lg border border-secondary-4"
                            placeholder="Keterangan Lain-lain" required></textarea>
                    </div>
                </li>

            </ul>
        </x-slot>
    </x-container>

    <x-container>
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Penanda Tangan
                </legend>
                <div class="pt-3 mx-auto text-sm">
                    <div class="grid grid-cols-1 gap-5">
                        <div class=" flex items-center gap-4">
                            <label class=" w-48 min-w-48 mr-8" for="penandatangan_tanggal" class="block mb-1">Tanggal
                                SPT
                            </label>
                            <input type="date" id="penandatangan_tanggal" name="penandatangan_tanggal"
                                value="{{ $spt->tglspt }}"
                                class="rounded-lg text-sm border border-secondary-4 w-full bg-[#eee]" disabled
                                required>
                        </div>
                        <div class=" flex items-center gap-4">
                            <label class=" w-48 min-w-48 mr-8" for="penandatangan_tanggal" class="block mb-1">Ditanda
                                Tangani Oleh</label>
                            <input type="text" id="penandatangan_keterangan" name="penandatangan_keterangan"
                                class="rounded-lg text-sm border border-secondary-4 w-full bg-[#eee]"
                                placeholder="Ketuk untuk memilih Pegawai"
                                value="{{ $spt->ub->nama }} - {{ $spt->ub->jabatan }}" disabled required>
                        </div>
                    </div>
                </div>
            </fieldset>
        </x-slot>
    </x-container>

    <x-container>
        <x-slot name="content">
            <div class="flex justify-end items-center gap-4 col-span-2 text-sm mx-auto">
                <x-button.save-button />
                <x-button.back-button :route="route('spt.index')" />
            </div>
        </x-slot>
    </x-container>
</x-app-layout>

<script type="module">
    $('.select2').select2({
        width: "100%",
        dropdownCssClass: "text-xs sm:text-sm",
        selectionCssClass: 'text-xs sm:text-sm',
    });
</script>
