<x-app-layout>
    <x-slot name="header">
        Edit Rincian Biaya
    </x-slot>
    <form action="{{ route('rincian-biaya.update', ['rincian_biaya' => $rincianBiaya->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-container>
            <x-slot name="content">
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Umum
                    </legend>
                    <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                        <div class="flex items-center gap-3">
                            <label class=" flex-none basis-1/5 items-start" for="pegawai_id">Nama Pegawai</label>
                            <select name="pegawai_id" id="pegawai_id" class="text-sm rounded-lg select2" required disabled>
                                <option value="" selected disabled>Pilih Pegawai</option>
                                @foreach ($rincianBiaya->sppd->spt->pegawai as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $rincianBiaya->peg_id ? 'selected' : '' }}>{{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex-none basis-1/5 items-start" for="jenis_sppd_id">Nomor SPT</label>
                            <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->sppd->spt->format_spt }}
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex-none basis-1/5 items-start" for="jenis_sppd_id">Nomor SPD</label>
                            <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->sppd->format_sppd }}
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex-none basis-1/5 items-start" for="jenis_sppd_id">Tujuan</label>
                            <table class=" flex-grow">
                                <thead>
                                    <tr class=" text-left">
                                        <th>Provinsi</th>
                                        <th>Kabupaten/kota</th>
                                        <th>Kecamatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rincianBiaya->sppd->tujuan as $item)
                                        <tr>
                                            <td class=" pt-3">{{ $item['provinsi_name'] ?? '-' }}</td>
                                            <td class=" pt-3">{{ $item['kabkota_name'] ?? '-' }}</td>
                                            <td class=" pt-3">{{ $item['kecamatan_name'] ?? '-' }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </fieldset>
            </x-slot>
        </x-container>
        <x-container>
            <x-slot name="content">
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Kegiatan
                    </legend>
                    <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                        <div class="flex items-start gap-3">
                            <label class=" flex-none basis-1/5 items-start">Nomor Kegiatan</label>
                            <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->sppd->spt->kdgiat_sub }}
                                -
                                {{ $rincianBiaya->sppd->spt->sub_kegiatan->uraian }}</div>
                        </div>
                        <div class="flex items-start gap-3">
                            <label class=" flex-none basis-1/5 items-start">Kode Rekening</label>
                            <div class=" flex"><span class=" w-4">:</span> {{ $rincianBiaya->sppd->kd_rek }}</div>
                        </div>
                        <div class="flex items-start gap-3">
                            <label class=" flex-none basis-1/5 items-start">Kegiatan</label>
                            <div class=" flex"><span class=" w-4">:</span> Perjalanan Dinas
                                {{ $rincianBiaya->sppd->spt->jenis_sppd->uraian }}</div>
                        </div>
                    </div>
                </fieldset>
            </x-slot>
        </x-container>
        <x-container>
            <x-slot name="content">
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Rincian
                    </legend>
                    <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                        <div id="listRincian" class="flex flex-col gap-3">
                            @foreach ($rincianBiaya->daftar as $item)
                                <div class="rincian-item flex items-start gap-3">
                                    <label class="flex-none basis-1/5 pt-3">Rincian Ke {{ $loop->iteration }}</label>

                                    <div class="  w-3/5 flex flex-col gap-3">
                                        <input type="text" value="{{ $item->uraian }}"
                                            name="rincian[{{ $loop->iteration - 1 }}][uraian]"
                                            id="rincian[{{ $loop->iteration - 1 }}][uraian]"
                                            class=" w-full text-sm rounded-lg border border-secondary-4 text-secondary-1"
                                            placeholder="Uraian" required>
                                        <div class=" grid grid-cols-3 gap-3">
                                            <input type="number" value="{{ $item->jml_satuan }}"
                                                name="rincian[{{ $loop->iteration - 1 }}][jml_satuan]"
                                                id="rincian[{{ $loop->iteration - 1 }}][jml_satuan]"
                                                class=" w-full text-sm rounded-lg border border-secondary-4 text-secondary-1 jml_satuan"
                                                placeholder="Jumlah Satuan" required>
                                            <input type="text" value="{{ $item->jns_satuan }}"
                                                name="rincian[{{ $loop->iteration - 1 }}][jns_satuan]"
                                                id="rincian[{{ $loop->iteration - 1 }}][jml_satuan]"
                                                class=" col-span-2 w-full text-sm rounded-lg border border-secondary-4 text-secondary-1"
                                                placeholder="Jenis Satuan" required>
                                        </div>
                                        <input type="text" oninput="this.value = formatRupiah(this.value, 'Rp. ')"
                                            value="Rp. {{ number_format($item->harga, 0, ',', '.') }}"
                                            name="rincian[{{ $loop->iteration - 1 }}][harga]"
                                            id="rincian[{{ $loop->iteration - 1 }}][harga]"
                                            class=" w-full text-sm rounded-lg border border-secondary-4 text-secondary-1 harga"
                                            placeholder="Harga Satuan" required>
                                        <input type="text" oninput="this.value = formatRupiah(this.value, 'Rp. ')"
                                            value="Rp. {{ number_format($item->jml_harga, 0, ',', '.') }}"
                                            name="rincian[{{ $loop->iteration - 1 }}][jml_biaya]"
                                            id="rincian[{{ $loop->iteration - 1 }}][jml_biaya]" value="0"
                                            class=" w-full text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1 jml_biaya"
                                            placeholder="Jumlah Biaya" disabled>
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <button type="button"
                                            class="addRincian text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</button>
                                        <button type="button"
                                            class="removeRincian text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 {{$loop->iteration > 1 ? 'inline-flex' : 'hidden' }} inline-flex items-center px-3 py-2 text-sm font-medium text-center">-</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </fieldset>
            </x-slot>
        </x-container>
        <x-container>
            <x-slot name="content">
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Penanda Tangan
                    </legend>
                    <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                        <div class="flex items-center gap-3">
                            <label class=" flex-none basis-1/5 items-start" for="pelaksana_id">Pejabat
                                Pelaksana</label>
                            <select name="pelaksana_id" id="pelaksana_id" class="text-sm rounded-lg select2"
                                required>
                                <option value="" selected disabled>Pilih Pejabat Pelaksana</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $rincianBiaya->pel_id ? 'selected' : '' }}>{{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex-none basis-1/5 items-start" for="bendahara_id">Bendahara
                                Pengeluaran</label>
                            <select name="bendahara_id" id="bendahara_id" class="text-sm rounded-lg select2"
                                required>
                                <option value="" selected disabled>Pilih Bendahara Pengeluaran</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $rincianBiaya->bndhr_id ? 'selected' : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex-none basis-1/5 items-start" for="pembuat_id">Pembuat Rincian</label>
                            <select name="pembuat_id" id="pembuat_id" class="text-sm rounded-lg select2" required>
                                <option value="" selected disabled>Pilih Pembuat Rincian</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $rincianBiaya->buat_id ? 'selected' : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
            </x-slot>
        </x-container>
        <x-container>
            <x-slot name="content">
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Bukti Pembayaran
                    </legend>
                    <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                        <div class="flex items-start gap-3">
                            <input type="file" name="bukti[]" id="bukti" class=" hidden"
                                accept="application/pdf,.jpg,.jpeg,.png" multiple>
                            <input type="hidden" name="deleted_files" id="deleted-files">
                            <label class=" flex-none basis-1/5 items-start pt-3" for="bukti">Bukti
                                Pembayaran</label>
                            <div class="  w-3/5 flex flex-col gap-3" id="bukti-item">
                                @foreach ($rincianBiaya->file as $item)
                                    <div class="flex items-center justify-between border rounded px-3 py-2 text-sm old-item">
                                        <a href="{{ asset($item->path_rincian) }}" class="truncate" target="_blank">{{ basename($item->path_rincian) }}</a>
                                        <button
                                            type="button"
                                            class="text-red-500 font-bold ml-3 remove-old-file"
                                            data-id="{{ $item->idx }}"
                                        >
                                            ✕
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <label for="bukti"
                                class=" cursor-pointer text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</label>
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
    </form>
</x-app-layout>

<script>
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<script type="module">
    $(document).ready(function() {
        let fileList = [];
        let deletedFiles = [];

        $('#bukti').on('change', function(e) {
            let files = Array.from(e.target.files);

            $.each(files, function(i, file) {
                fileList.push(file);
            });

            renderPreview();
        });

        function renderPreview() {
            $('#bukti-item .item').remove();

            $.each(fileList, function(index, file) {
                let item = `
                    <div class="flex items-center justify-between border rounded px-3 py-2 text-sm item">
                        <span class="truncate">${file.name}</span>
                        <button
                            type="button"
                            class="text-red-500 font-bold ml-3 remove-file"
                            data-index="${index}"
                        >
                            ✕
                        </button>
                    </div>
                `;

                $('#bukti-item').append(item);
            });

            syncInputFiles();
        }

        // Event hapus (delegation)
        $(document).on('click', '.remove-file', function() {
            let index = $(this).data('index');
            fileList.splice(index, 1);
            renderPreview();
        });

        $(document).on('click', '.remove-old-file', function () {
            let id = $(this).data('id');

            if (!deletedFiles.includes(id)) {
                deletedFiles.push(id);
            }

            $('#deleted-files').val(JSON.stringify(deletedFiles));

            $(this).closest('.old-item').remove();
        });

        function syncInputFiles() {
            let dataTransfer = new DataTransfer();

            $.each(fileList, function(i, file) {
                dataTransfer.items.add(file);
            });

            $('#bukti')[0].files = dataTransfer.files;
        }

        let isAutoChanging = false;

        $('.select2').select2({
            width: '60%',
            dropdownCssClass: "text-sm",
            selectionCssClass: 'text-sm',
        });

        function updateIndex() {
            $('#listRincian .rincian-item').each(function(i) {
                const index = i + 1;

                $(this).find('label').text('Rincian Ke ' + index);

                $(this).find('input').each(function() {
                    const name = $(this).attr('name');
                    if (name) {
                        $(this).attr('name', name.replace(/\[\d+\]/, '[' + index + ']'));
                    }
                });

                // tombol hapus disembunyikan untuk item pertama
                $(this).find('.removeRincian').toggle(index !== 1);
            });
        }

        // tambah rincian
        $(document).on('click', '.addRincian', function() {
            const $clone = $('#listRincian .rincian-item:first').clone();

            $clone.find('input').val('');
            $clone.find('.jml_biaya').val(0);

            $('#listRincian').append($clone);
            updateIndex();
        });

        // hapus rincian
        $(document).on('click', '.removeRincian', function() {
            $(this).closest('.rincian-item').remove();
            updateIndex();
        });

        // auto hitung
        $(document).on('input', '.jml_satuan, .harga', function () {
            hitungJumlah($(this).closest('.rincian-item'));
        });

        function getNumberFromRupiah(value) {
            if (!value) return 0;
            return parseInt(value.replace(/[^0-9]/g, '')) || 0;
        }

        function hitungJumlah($item) {
            const jml = parseFloat($item.find('.jml_satuan').val()) || 0;
            const harga = getNumberFromRupiah($item.find('.harga').val());

            const total = jml * harga;

            $item.find('.jml_biaya').val(
                formatRupiah(total.toString(), 'Rp. ')
            );
        }
    });
</script>
