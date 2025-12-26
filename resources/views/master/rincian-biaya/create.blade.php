<x-app-layout>
    <x-slot name="header">
        Tambah Rincian Biaya
    </x-slot>
    <form action="{{route('rincian-biaya.store')}}">
        <x-container>
            <x-slot name="content">
                <fieldset class="border-t border-secondary-4 pt-4">
                    <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                        Umum
                    </legend>
                    <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start" for="pegawai_id">Nama Pegawai</label>
                            <select name="pegawai_id" id="pegawai_id" class="text-sm rounded-lg select2"
                                required>
                                <option value="" selected disabled>Pilih Pegawai</option>
                                @foreach ($sppd->spt->pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start" for="jenis_sppd_id">Nomor SPD</label>
                            <div class=" flex"><span class=" w-4">:</span> {{$sppd->format_sppd}}</div>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start" for="jenis_sppd_id">Tujuan</label>
                            <table class=" flex-grow">
                                <thead>
                                    <tr class=" text-left">
                                        <th>Provinsi</th>
                                        <th>Kabupaten/kota</th>
                                        <th>Kecamatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sppd->tujuan as $item)
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
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start">Nomor Kegiatan</label>
                            <div class=" flex"><span class=" w-4">:</span> {{$sppd->spt->kdgiat_sub}} - {{$sppd->spt->sub_kegiatan->uraian}}</div>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start">Kode Rekening</label>
                            <div class=" flex"><span class=" w-4">:</span> {{$sppd->kd_rek}}</div>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start">Kegiatan</label>
                            <div class=" flex"><span class=" w-4">:</span> Perjalanan Dinas {{$sppd->spt->jenis_sppd->uraian}}</div>
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
                        <div id="listTujuan" class=" flex flex-col gap-3">
                            <div class="flex items-start gap-3">
                                <label class=" flex basis-1/5 items-start pt-3" for="nosurat">Rincian Ke 1</label>
                                <div class="  w-3/5 flex flex-col gap-3 tujuan-item">
                                    <input type="text" name="uraian" id="uraian"
                                        class=" w-full text-sm rounded-lg border border-secondary-4 text-secondary-1"
                                        placeholder="Uraian" required>
                                    <div class=" grid grid-cols-3 gap-3">
                                        <input type="text" name="jml_satuan" id="jml_satuan"
                                            class=" w-full text-sm rounded-lg border border-secondary-4 text-secondary-1"
                                            placeholder="Jumlah Satuan" required>
                                        <input type="text" name="jns_satuan" id="jml_satuan"
                                            class=" col-span-2 w-full text-sm rounded-lg border border-secondary-4 text-secondary-1"
                                            placeholder="Jenis Satuan" required>
                                    </div>
                                    <input type="text" name="harga" id="harga"
                                        class=" w-full text-sm rounded-lg border border-secondary-4 text-secondary-1"
                                        placeholder="Harga Satuan" required>
                                    <input type="text" name="jml_biaya" id="jml_biaya"
                                        class=" w-full text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                        placeholder="Jumlah Biaya" disabled>
                                </div>
                                <button type="button" name="add" id="addTujuan" disabled
                                    class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</button>
                            </div>
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
                            <label class=" flex basis-1/5 items-start" for="pelaksana_id">Pejabat Pelaksana</label>
                            <select name="pelaksana_id" id="pelaksana_id" class="text-sm rounded-lg select2"
                                required>
                                <option value="" selected disabled>Pilih Pejabat Pelaksana</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start" for="bendahara_id">Bendahara Pengeluaran</label>
                            <select name="bendahara_id" id="bendahara_id" class="text-sm rounded-lg select2"
                                required>
                                <option value="" selected disabled>Pilih Bendahara Pengeluaran</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start" for="pembuat_id">Pembuat Rincian</label>
                            <select name="pembuat_id" id="pembuat_id" class="text-sm rounded-lg select2"
                                required>
                                <option value="" selected disabled>Pilih Pembuat Rincian</option>
                                @foreach ($pegawai as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
            </x-slot>
        </x-container>
    </form>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        let isAutoChanging = false;

        $('.select2').select2({
            width: '60%',
            dropdownCssClass: "text-sm",
            selectionCssClass: 'text-sm',
        });
    });
</script>
