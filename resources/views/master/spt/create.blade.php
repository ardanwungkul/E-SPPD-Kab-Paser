<x-app-layout>
    <x-slot name="header">
        Buat Surat Perjalanan Dinas
    </x-slot>

    <div id="alert-2" class="fixed right-3 bottom-3 z-50 hidden">
        <div class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 border border-red-400" role="alert">
            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm font-medium mr-3">
                Minimal harus memilih 1 pegawai!
            </div>
            <button type="button" id="button-alert-2"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    </div>

    <div>
        <form action="{{ route('spt.store') }}" class="text-sm" method="POST" id="form"
            enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" name="sppd" value="{{ request('sppd') }}">
            <input type="hidden" name="is_dprd" value="{{ request()->lembaga == 'dprd' ? 'dprd' : null }}">
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t border-secondary-4 pt-4">
                        <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                            Umum
                        </legend>
                        <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="jenis_sppd_id">Jenis SPPD</label>
                                <select name="jenis_sppd_id" id="jenis_sppd_id" class="text-sm rounded-lg select2"
                                    required>
                                    <option value="" selected disabled> Pilih Jenis SPPD</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start"
                                    for="bidang_id">{{ session('config')->judul }}</label>
                                <input type="text" name="bidang_id" id="bidang_id"
                                    class=" w-3/5 text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Pilih Bidang" disabled>
                            </div>
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="sub_bidang_id">Sub.
                                    {{ session('config')->judul }}</label>
                                <select name="sub_bidang_id" id="sub_bidang_id" class="text-sm rounded-lg select2"
                                    required>
                                    <option value="" selected disabled> Pilih Sub.
                                        {{ session('config')->judul }}
                                    </option>
                                    @foreach ($subbidang as $item)
                                        <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="program_id">Program</label>
                                <input type="text" name="program_id" id="program_id"
                                    class=" w-3/5 text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Pilih Program" disabled>
                            </div>
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="kegiatan_id">Kegiatan</label>
                                <input type="text" name="kegiatan_id" id="kegiatan_id"
                                    class=" w-3/5 text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Pilih Kegiatan" disabled>
                            </div>
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="sub_kegiatan_id">Sub. Kegiatan</label>
                                <select name="sub_kegiatan_id" id="sub_kegiatan_id" class="text-sm rounded-lg select2"
                                    required>
                                    <option value="" selected disabled> Pilih Sub. Kegiatan</option>
                                    @foreach ($subkegiatan as $item)
                                        <option value="{{$item->kdsub}}">{{$item->kdsub}} - {{$item->uraian}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </fieldset>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                        {{-- Anggaran --}}
                        <div class=" w-full flex flex-col gap-3">
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="anggaran">Anggaran Pagu</label>
                                <input type="text" name="anggaran" id="anggaran" value="Rp. 0"
                                    class=" w-3/5 text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Jumlah Anggaran" disabled>
                            </div>
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="realisasi">Jumlah Realisasi</label>
                                <input type="text" name="realisasi" id="realisasi" value="Rp. 0"
                                    class=" w-3/5 text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Jumlah Realisasi">
                            </div>
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="sisa">Sisa Anggaran</label>
                                <input type="text" name="sisa" id="sisa" value="Rp. 0"
                                    class=" w-3/5 text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Sisa Anggaran" disabled>
                            </div>
                        </div>
                        <div class="w-full border-t pb-3 mt-3">
                        </div>
                        {{-- Berkas --}}
                        <div class="flex items-center gap-3">
                            <label class=" basis-1/5" for="berkas" class=" flex flex-col items-start">
                                <p>Berkas Bukti Disposisi</p>
                                <p class=" text-nowrap text-secondary-1 text-[0.6rem]">(PDF/Image Maksimal
                                    1MB)</p>
                            </label>
                            <label for="berkas"
                                class="  w-3/5 cursor-pointer flex items-center justify-between p-1 text-xs md:text-sm rounded-lg border border-gray-300 shadow-md">
                                <div class=" flex items-center gap-2">
                                    <div
                                        class=" text-nowrap px-2 py-1 text-secondary-1 border border-gray-300 bg-neutral-300 rounded-lg">
                                        Pilih Berkas
                                    </div>
                                    <div id="filename" class=" line-clamp-1"></div>
                                </div>
                                <input type="file" name="berkas" id="berkas"
                                    accept="application/pdf,.jpg,.jpeg,.png" class="opacity-0 w-0 h-0">
                                <div class=" w-5 h-5 text-secondary-1 mr-1">
                                    <svg class=" w-full h-full" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 640 640">
                                        <path fill="currentColor"
                                            d="M352 173.3L352 384C352 401.7 337.7 416 320 416C302.3 416 288 401.7 288 384L288 173.3L246.6 214.7C234.1 227.2 213.8 227.2 201.3 214.7C188.8 202.2 188.8 181.9 201.3 169.4L297.3 73.4C309.8 60.9 330.1 60.9 342.6 73.4L438.6 169.4C451.1 181.9 451.1 202.2 438.6 214.7C426.1 227.2 405.8 227.2 393.3 214.7L352 173.3zM320 464C364.2 464 400 428.2 400 384L480 384C515.3 384 544 412.7 544 448L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 448C96 412.7 124.7 384 160 384L240 384C240 428.2 275.8 464 320 464zM464 488C477.3 488 488 477.3 488 464C488 450.7 477.3 440 464 440C450.7 440 440 450.7 440 464C440 477.3 450.7 488 464 488z" />
                                    </svg>
                                </div>
                            </label>
                            <script>
                                document.getElementById('berkas').addEventListener('change', function(e) {
                                    const fileName = e.target.files[0]?.name || "Tidak ada file dipilih";
                                    document.getElementById('filename').textContent = fileName;
                                });
                            </script>
                        </div>
                    </div>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <div class="text-sm mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                        {{-- Nomor Surat --}}
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start" for="nospt">Nomor SPT</label>
                            <input type="text" name="nospt" id="nospt" value="{{$nospt}}"
                                class="  w-3/5 text-sm rounded-lg border border-secondary-4 text-secondary-1"
                                placeholder="Masukkan Nomor SPT" required>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class=" flex basis-1/5 items-start" for="nosurat">Nomor Surat</label>
                            <input type="text" name="nosurat" id="nosurat"
                                class="  w-3/5 text-sm rounded-lg border border-secondary-4 text-secondary-1"
                                placeholder="Masukkan Nomor Surat">
                        </div>
                        <div class="w-full border-t pb-3 mt-3">
                        </div>
                        {{-- Tanggal --}}
                        <div class=" w-full flex flex-col gap-3">
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="tanggal_berangkat">Tanggal
                                    Berangkat</label>
                                <input type="date" id="tanggal_berangkat" name="tanggal_berangkat"
                                    value="{{ now()->format('Y-m-d') }}"
                                    class="  w-3/5 text-sm rounded-lg border border-secondary-4">
                            </div>
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="tanggal_kembali">Tanggal
                                    Kembali</label>
                                <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                                    value="{{ now()->format('Y-m-d') }}"
                                    class="  w-3/5 text-sm rounded-lg border border-secondary-4">
                            </div>
                            <div class="flex items-center gap-3">
                                <label class=" flex basis-1/5 items-start" for="total_hari">Jumlah Hari</label>
                                <input type="number" id="total_hari" name="total_hari" placeholder="Jumlah Hari"
                                    value="1"
                                    class="  w-3/5 text-sm rounded-lg border border-secondary-4 bg-[#eee]" disabled>
                            </div>
                            <script>
                                function hitungTotalHari() {
                                    const berangkatInput = document.getElementById('tanggal_berangkat');
                                    const kembaliInput = document.getElementById('tanggal_kembali');
                                    const totalHariInput = document.getElementById('total_hari');

                                    const tglBerangkat = berangkatInput.value;
                                    const tglKembali = kembaliInput.value;

                                    if (tglBerangkat && tglKembali) {
                                        const start = new Date(tglBerangkat);
                                        const end = new Date(tglKembali);

                                        // Jika tanggal kembali < tanggal berangkat → sesuaikan tanggal berangkat
                                        if (end < start) {
                                            berangkatInput.value = tglKembali;
                                        }

                                        // Recalculate using updated value
                                        const newStart = new Date(berangkatInput.value);
                                        const selisihMs = end - newStart;

                                        if (selisihMs >= 0) {
                                            const totalHari = (selisihMs / (1000 * 60 * 60 * 24)) + 1;
                                            totalHariInput.value = totalHari;
                                        } else {
                                            totalHariInput.value = "";
                                        }
                                    }
                                }

                                document.getElementById('tanggal_berangkat').addEventListener('change', hitungTotalHari);
                                document.getElementById('tanggal_kembali').addEventListener('change', hitungTotalHari);
                            </script>

                        </div>
                        <div class="w-full border-t pb-3 mt-3">
                        </div>
                        <div id="listTujuan" class=" flex flex-col gap-3">
                            <div class="flex items-start gap-3">
                                <label class=" flex basis-1/5 items-start pt-3" for="nosurat">Tujuan ke 1</label>
                                <div class="  w-3/5 flex flex-col gap-3 tujuan-item">
                                    <select name="tujuan[0][provinsi_id]" id="tujuan_0_provinsi_id"
                                        class=" md:text-sm text-xs rounded-lg border border-gray-300 shadow-md provinsi daerah"
                                        required disabled>
                                        <option value="" selected disabled>Pilih Jenis SPPD Terlebih Dahulu</option>
                                    </select>
                                    <select name="tujuan[0][kabupaten_kota_id]" id="tujuan_0_kabupaten_kota_id"
                                        class=" md:text-sm text-xs rounded-lg border border-gray-300 shadow-md kabkota daerah"
                                        required disabled>
                                        <option value="" selected disabled>Pilih Jenis SPPD Terlebih Dahulu</option>
                                    </select>
                                    <select name="tujuan[0][kecamatan_id]" id="tujuan_0_kecamatan_id"
                                        class=" md:text-sm text-xs rounded-lg border border-gray-300 shadow-md kecamatan daerah"
                                        required disabled>
                                        <option value="" selected disabled>Pilih Jenis SPPD Terlebih Dahulu</option>
                                    </select>
                                </div>
                                <button type="button" name="add" id="addTujuan" disabled
                                    class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</button>
                            </div>
                        </div>
                    </div>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t border-secondary-4 pt-4">
                        <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                            Dasar
                        </legend>
                        <div class=" flex flex-col gap-3" id="dynamicTableDasar">
                            <div class="flex items-start gap-3 dasar-item">
                                <label for="dasar[0][uraian]" class=" flex basis-1/5 items-start pt-3">Dasar ke
                                    1</label>
                                <textarea name="dasar[0][uraian]" id="dasar[0][uraian]" rows="3"
                                    class=" w-3/5 text-sm rounded-lg border border-secondary-4" placeholder="Dasar Ke-1" required></textarea>
                                <button type="button" name="add" id="addDasar"
                                    class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</button>
                            </div>
                        </div>
                    </fieldset>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t border-secondary-4 pt-4">
                        <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                            Yang Melaksanakan
                        </legend>
                        <div class="mx-auto">
                            <button type="button" name="add" id="addPegawai"
                                data-modal-target="pilih-pegawai-spt" data-modal-toggle="pilih-pegawai-spt"
                                class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-xs font-medium text-center whitespace-nowrap focus:ring-1 focus:ring-blue-500">
                                Pilih Pegawai
                            </button>
                            <x-modal.pilih-pegawai-spt :pegawai="$pegawai" />
                            <div class="pt-3">
                                <div id="dynamicTablePegawai" class="flex flex-col gap-3"></div>
                            </div>
                        </div>
                    </fieldset>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t border-secondary-4 pt-4">
                        <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                            Untuk
                        </legend>
                        <div class=" flex flex-col gap-3" id="dynamicTableUntuk">
                            <div class="flex items-start gap-3 untuk-item">
                                <label for="untuk[0][uraian]" class=" flex basis-1/5 items-start pt-3">Untuk ke
                                    1</label>
                                <textarea name="untuk[0][uraian]" id="untuk[0][uraian]" rows="3"
                                    class="w-3/5 text-sm rounded-lg border border-secondary-4" placeholder="Untuk Ke-1" required></textarea>
                                <button type="button" name="add" id="addUntuk"
                                    class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</button>
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
                        <div class="pt-3 mx-auto">
                            <div class="grid grid-cols-1 gap-5">
                                <div class=" flex items-center gap-3">
                                    <label class=" flex basis-1/5 items-start" for="penandatangan_tanggal"
                                        class="block mb-1">Tanggal SPT</label>
                                    <input type="date" id="penandatangan_tanggal" name="penandatangan_tanggal"
                                        value="{{ now()->toDateString() }}"
                                        class=" w-3/5 rounded-lg text-sm border border-secondary-4" required>
                                </div>
                                <div class=" flex items-center gap-3">
                                    <label class=" flex basis-1/5 items-start" class="block mb-1">Ditanda Tangani
                                        Oleh</label>
                                    <input type="text" id="penandatangan_keterangan"
                                        name="penandatangan_keterangan"
                                        class=" w-3/5 rounded-lg text-sm border border-secondary-4 cursor-pointer"
                                        data-modal-target="pilih-pegawai-penandatangan"
                                        data-modal-toggle="pilih-pegawai-penandatangan"
                                        placeholder="Ketuk untuk memilih Pegawai" readonly required>
                                    <input type="text" id="penandatangan_id" name="penandatangan_id"
                                        class="hidden">
                                    <x-modal.pilih-pegawai-penandatangan :pegawai="$pegawai" />
                                </div>
                                {{-- <div>
                                    <label for="penandatangan_lokasi" class="block mb-1">Lokasi/Wilayah Di Tanda
                                        Tangani</label>
                                    <input type="text" id="penandatangan_lokasi" name="penandatangan_lokasi"
                                        placeholder="Masukkan Lokasi Penanda Tangan"
                                        class="rounded-lg text-sm border border-secondary-4 w-full" required>
                                </div> --}}
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
    </div>
</x-app-layout>
{{-- Form validation --}}
<script type="module">
    $(document).ready(function() {

        $('#form').on('submit', function(event) {
            if ($('#dynamicTablePegawai .pegawai-item').length === 0) {
                event.preventDefault();
                $('#alert-2').show();
                $('#addPegawai').focus();
                return;
            }
            if ($('#penandatangan_keterangan').val().trim() === '') {
                event.preventDefault();
                $('#alert-2').show();
                $('#penandatangan_keterangan').focus();
                return;
            }

        });
        $('#button-alert-2').on('click', function() {
            $('#alert-2').hide();
        })

    });
</script>

{{-- Dasar & Untuk & Tujuan --}}
<script type="module">
    var iDasar = 1;
    var iUntuk = 1;
    var iPegawai = 1;
    let maxTujuan = 3;
    let itujuan = 1;

    $(document).ready(function() {
        function updateDasarNumbers() {
            $("#dynamicTableDasar .dasar-item").each(function(index) {
                const newIndex = index + 1;

                $(this).find("label")
                    .attr("for", `dasar[${index}][uraian]`)
                    .text(`Dasar ke ${newIndex}`);

                $(this).find("textarea").attr({
                    id: `dasar[${index}][uraian]`,
                    name: `dasar[${index}][uraian]`,
                    placeholder: `Dasar Ke-${newIndex}`
                });
            });
        }

        function updateUntukNumbers() {
            $("#dynamicTableUntuk .untuk-item").each(function (index) {
                const newIndex = index + 1;

                $(this).find("label")
                    .attr("for", `untuk[${index}][uraian]`)
                    .text(`Untuk ke ${newIndex}`);

                $(this).find("textarea").attr({
                    id: `untuk[${index}][uraian]`,
                    name: `untuk[${index}][uraian]`,
                    placeholder: `Untuk Ke-${newIndex}`
                });
            });
        }

        function updatePegawaiNumbers() {
            $('#dynamicTablePegawai .pegawai-item').each(function(index) {
                $(this).find('label').text(`Pegawai ke ${index + 1}`);
            });
        }

        $("#addTujuan").on("click", function() {
            if (itujuan >= maxTujuan) return;

            $("#listTujuan .tujuan-item").each(function() {

                // Hilangkan class pada select provinsi
                $(this).find("select[name$='[provinsi_id]']")
                    .removeClass('provinsi');

                // Hilangkan class kabupaten/kota
                $(this).find("select[name$='[kabupaten_kota_id]']")
                    .removeClass('kabkota');

                // Hilangkan class kecamatan
                $(this).find("select[name$='[kecamatan_id]']")
                    .removeClass('kecamatan');
            });

            let newIndex = itujuan;

            let html = `
                <div class="flex items-start gap-3 tujuan-item">
                    <label class=" flex basis-1/5 items-start pt-3">Tujuan ke ${newIndex + 1}</label>

                    <div class="  w-3/5 flex flex-col gap-3">
                        <select name="tujuan[${newIndex}][provinsi_id]"
                                class=" md:text-sm text-xs rounded-lg border border-gray-300 shadow-md provinsi daerah"
                                required>
                            <option value="" selected disabled>Pilih Provinsi</option>
                        </select>

                        <select name="tujuan[${newIndex}][kabupaten_kota_id]"
                                class=" md:text-sm text-xs rounded-lg border border-gray-300 shadow-md kabkota daerah"
                                required>
                            <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                        </select>

                        <select name="tujuan[${newIndex}][kecamatan_id]"
                                class=" md:text-sm text-xs rounded-lg border border-gray-300 shadow-md kecamatan daerah"
                                required>
                            <option value="" selected disabled>Pilih Kecamatan</option>
                        </select>
                    </div>

                    <button type="button"
                            class="removeTujuan text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">
                        -
                    </button>
                </div>
            `;

            $("#listTujuan").append(html);

            itujuan++;

            // Disable tombol jika sudah mencapai maksimal
            if (itujuan >= maxTujuan) {
                $("#addTujuan").prop("disabled", true);
            }

            $('#jenis_sppd_id').trigger('change');

            $('.daerah').select2({
                width: '100%',
                dropdownCssClass: "text-sm",
                selectionCssClass: 'text-sm',
            });
        });

        // Hapus tujuan
        $(document).on("click", ".removeTujuan", function() {
            $(this).closest(".tujuan-item").remove();
            itujuan--;

            // enable tombol jika kurang dari maksimal
            $("#addTujuan").prop("disabled", false);

            // Re-index ulang label dan name[]
            $("#listTujuan .tujuan-item").each(function(i) {
                $(this).find("label").text(`Tujuan ke ${i + 2}`);
                $(this).find("select[name*='tujuan']").each(function() {
                    let old = $(this).attr("name");
                    let newName = old.replace(/tujuan\[\d+\]/, `tujuan[${i + 1}]`);
                    $(this).attr("name", newName);
                });
            });
        });

        $("#addDasar").on("click", function() {
            $("#dynamicTableDasar").append(`
                <div class="flex items-start gap-3 dasar-item">
                    <label class="flex basis-1/5 items-start pt-3">
                        Dasar ke ${iDasar + 1}
                    </label>

                    <textarea
                        rows="3"
                        class=" w-3/5 text-sm rounded-lg border border-secondary-4"
                        placeholder="Dasar Ke-${iDasar + 1}"
                    ></textarea>

                    <button type="button" class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center remove-tr" data-id="dasar">
                            -
                        </button>
                </div>
            `);

            iDasar++;
            updateDasarNumbers();
        });

        $("#addUntuk").click(function() {
            $("#dynamicTableUntuk").append(
                `
                <div class="flex items-start gap-3 untuk-item">
                    <label class="flex basis-1/5 items-start pt-3">
                        Untuk ke ${iUntuk + 1}
                    </label>

                    <textarea
                        rows="3"
                        class=" w-3/5 text-sm rounded-lg border border-secondary-4"
                        placeholder="Untuk Ke-${iUntuk + 1}"
                    ></textarea>

                    <button type="button" class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center remove-tr" data-id="untuk">
                            -
                        </button>
                </div>    
            `);

            ++iUntuk;
            updateUntukNumbers();
        });

        $('.datatable tbody').on('click', '.button-pegawai-spt-check', function() {
            const pegawai_id = $(this).data('id');
            const pegawai_keterangan = $(this).data('keterangan');

            const isChecked = $(this).attr('data-check') === 'true';
            $(this).attr('data-check', isChecked ? 'false' : 'true');

            if (isChecked) {
                // UNCHECK → hapus
                $(this).html(`
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            d="M5 11.917 9.724 16.5 19 7.5" />
                    </svg>
                `);

                $(`#dynamicTablePegawai .pegawai-item[data-id="${pegawai_id}"]`).remove();
            } else {
                // CHECK → tambah
                $(this).html('X');

                const newItem = `
                    <div class="flex items-start gap-3 pegawai-item" data-id="${pegawai_id}">
                        <label class="flex basis-1/5 items-start pt-2">
                            Pegawai ke
                        </label>

                        <div class=" w-3/5 space-y-1">
                            <input
                                name="pegawai[${pegawai_id}][keterangan]"
                                value="${pegawai_keterangan}"
                                class="w-full text-sm rounded-lg border border-secondary-4 cursor-pointer"
                                readonly
                            />
                            <input
                                name="pegawai[${pegawai_id}][id]"
                                type="hidden"
                                value="${pegawai_id}"
                                required
                            />
                        </div>
                    </div>
                `;

                $('#dynamicTablePegawai').append(newItem);
            }

            updatePegawaiNumbers();
        });

        $(document).on('click', '.remove-tr', function() {
            const data = $(this).data('id');
            if (data == 'dasar') {
                if (iDasar > 1) {
                    iDasar--;
                    $(this).closest('.dasar-item').remove();
                    updateDasarNumbers();
                }
            }
            if (data == 'untuk') {
                if (iUntuk > 1) {
                    iUntuk--;
                    $(this).closest('.untuk-item').remove();
                    updateUntukNumbers();
                }
            }
        });
    });
</script>

{{-- Data Table --}}
<script type="module">
    $(document).ready(function() {
        let tablePegawaiSpt = $('#tablePegawaiSpt').DataTable({
            info: false,
            lengthChange: false,
            deferRender: true,
            paging: true,
            language: {
                search: '',
                emptyTable: "Tidak ada data tersedia",
                searchPlaceholder: 'Cari...'
            },
            ordering: false,
            responsive: true,
            columnDefs: [{
                targets: '_all',
                className: 'dt-head-left',
            }]
        });
        let tablePegawaiPenandatangan = $('#tablePegawaiPenandatangan').DataTable({
            info: false,
            lengthChange: false,
            deferRender: true,
            paging: true,
            language: {
                search: '',
                emptyTable: "Tidak ada data tersedia",
                searchPlaceholder: 'Cari...'
            },
            ordering: false,
            responsive: true,
            columnDefs: [{
                    targets: 4,
                    visible: false,
                    searchable: true
                },
                {
                    targets: '_all',
                    className: 'dt-head-left'
                }
            ]
        });

        $('.datatable tbody').on('click', '.button-pegawai-penandatangan-check', function() {
            const pegawai_id = $(this).data('id');
            const pegawai_keterangan = $(this).data('keterangan');
            if (pegawai_id) {
                $('#penandatangan_id').val(pegawai_id);
                $('#penandatangan_keterangan').val(pegawai_keterangan)
            }
            $('#close-button-pilih-pegawai-penandatangan').click()
        });
        $('#ub_status').on('click', function() {
            $('#penandatangan_keterangan').val('')
            if ($(this).is(':checked')) {
                tablePegawaiPenandatangan.column(4).search('Y').draw();
            } else {
                tablePegawaiPenandatangan.column(4).search('').draw();
            }

        })
    });
</script>

{{-- Select 2 --}}
<script type="module">
    $(document).ready(function() {
        let isAutoChanging = false;

        $('.select2').select2({
            width: '60%',
            dropdownCssClass: "text-sm",
            selectionCssClass: 'text-sm',
        });

        $('.daerah').select2({
            width: '100%',
            dropdownCssClass: "text-sm",
            selectionCssClass: 'text-sm',
        });

        $(document).on('change', '.provinsi', function() {
            let provinsiSelect = $(this); // elemen provinsi yang berubah
            let wrapper = provinsiSelect.closest('.tujuan-item'); // container "Tujuan ke ..."

            let kabkotaSelect = wrapper.find('.kabkota');

            const provinsiID = provinsiSelect.val();

            if (provinsiID) {
                kabkotaSelect.prop('disabled', true)
                    .html('<option selected disabled>Memuat...</option>');

                $.ajax({
                    url: "{{ route('get.kabupaten-kota-by-provinsi') }}",
                    type: "GET",
                    data: {
                        provinsi_id: provinsiID
                    },
                    success: function(response) {
                        kabkotaSelect.empty().append(
                            '<option value="" selected disabled>Pilih Kabupaten/Kota</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(i, kab) {
                                kabkotaSelect.append(
                                    `<option value="${kab.id}">${kab.nama}</option>`
                                );
                            });
                        } else {
                            kabkotaSelect.append(
                                '<option value="" disabled>Tidak ada Kabupaten/Kota tersedia</option>'
                            );
                        }

                        kabkotaSelect.prop('disabled', false);
                    },
                    error: function(xhr) {
                        kabkotaSelect.prop('disabled', false);
                    }
                });
            }
        });


        $('#jenis_sppd_id').on('change', function() {
            const jenisSppdId = $(this).val();

            $("#addTujuan").prop("disabled", false);

            if (jenisSppdId) {
                $('.provinsi').prop('disabled', true).html(
                    '<option selected disabled>Memuat...</option>');
                $('.kabkota').prop('disabled', true).html(
                    '<option selected disabled>Memuat...</option>');
                $('.kecamatan').prop('disabled', true).html(
                    '<option selected disabled>Memuat...</option>');
                $.ajax({
                    url: "{{ route('get.wilayah.by.jenis-sppd') }}",
                    type: "GET",
                    data: {
                        jenis_sppd_id: jenisSppdId
                    },
                    success: function(response) {
                        $('.provinsi').empty();
                        $('.provinsi').append(
                            '<option value="" selected disabled>Pilih Provinsi</option>'
                        );
                        $('.kabkota').empty();
                        $('.kabkota').append(
                            '<option value="" selected disabled>Pilih Kabupaten/Kota</option>'
                        );
                        $('.kecamatan').empty();
                        $('.kecamatan').append(
                            '<option value="" selected disabled>Pilih Kecamatan</option>'
                        );

                        if (response && response.wilayah) {

                            if (response.wilayah == 'Provinsi') {
                                $('.provinsi').each(function() {
                                    $.each(response.provinsi, (i, prov) => {
                                        $(this).append(
                                            `<option value="${prov.id}">${prov.nama}</option>`
                                        );
                                    });
                                    $(this).prop('disabled', false);
                                });

                                $('.kabkota').prop('disabled', false).html(
                                    '<option selected disabled>Pilih Kabupaten/Kota</option>'
                                );
                                $('.kecamatan').prop('disabled', true).html(
                                    '<option selected disabled>Pilih Kecamatan</option>'
                                );

                            } else if (response.wilayah == 'Kabupaten') {
                                $('.provinsi').append(
                                    '<option value="' + response.provinsi.id +
                                    '" selected disabled>' + response.provinsi.nama +
                                    '</option>'
                                );

                                $.each(response.kabkota, function(index, kabkota) {
                                    $('.kabkota').append(
                                        '<option value="' +
                                        kabkota.id + '">' + kabkota.nama +
                                        '</option>');
                                });


                                $('.kabkota').prop('disabled', false);
                                // $('#kecamatan_id').prop('disabled', false);
                            } else if (response.wilayah == 'Kecamatan') {
                                $('.provinsi').append(
                                    '<option value="' + response.provinsi.id +
                                    '" selected disabled>' + response.provinsi.nama +
                                    '</option>'
                                );
                                $('.kabkota').append(
                                    '<option value="' + response.kabkota.id +
                                    '" selected disabled>' + response.kabkota.nama +
                                    '</option>'
                                );

                                $.each(response.kecamatan, function(index, kecamatan) {
                                    $('.kecamatan').append(
                                        '<option value="' +
                                        kecamatan.id + '">' + kecamatan.nama +
                                        '</option>');
                                });

                                $('.kecamatan').prop('disabled', false);
                            }
                        } else {
                            $('.provinsi').prop('disabled', false);
                            $('.kabkota').prop('disabled', false);
                            $('.kecamatan').prop('disabled', false);
                        }

                        $("#listTujuan .tujuan-item").each(function() {
                            $(this).find("select[name$='[provinsi_id]']")
                                .addClass('provinsi');

                            $(this).find("select[name$='[kabupaten_kota_id]']")
                                .addClass('kabkota');

                            $(this).find("select[name$='[kecamatan_id]']")
                                .addClass('kecamatan');
                        });
                    },
                    error: function(xhr) {
                        $('.provinsi').prop('disabled', false);
                        $('.kabkota').prop('disabled', false);
                        $('.kecamatan').prop('disabled', false);
                        console.error(xhr.responseText);
                    }
                });
            } else {}
        });

        $('#sub_bidang_id').on('change', function() {
            const subBidangId = $(this).val();

            if (subBidangId) {
                if (!isAutoChanging) {
                    $('#sub_kegiatan_id').prop('disabled', true)
                        .html('<option selected disabled>Memuat...</option>');
                }

                $.ajax({
                    url: "{{ route('get.bidang.by.sub-bidang') }}",
                    type: "GET",
                    data: {
                        sub_bidang_id: subBidangId
                    },
                    success: function(response) {
                        $('#bidang_id').val(response.uraian).trigger('change');
                    }
                });

                if (!isAutoChanging) {
                    $.ajax({
                        url: "{{ route('get.sub-kegiatan.by.sub-bidang') }}",
                        type: "GET",
                        data: {
                            sub_bidang_id: subBidangId
                        },
                        success: function(response) {
                            $('#sub_kegiatan_id').empty();
                            $('#sub_kegiatan_id').append(
                                '<option value="" selected disabled>Pilih Sub. Kegiatan</option>'
                            );
    
                            if (response.length > 0) {
                                $.each(response, function(index, subkegiatan) {
                                    $('#sub_kegiatan_id').append('<option value="' +
                                        subkegiatan.kdsub + '">' + subkegiatan
                                        .kdsub + ' - ' + subkegiatan.uraian +
                                        '</option>');
                                });
    
                                $('#sub_kegiatan_id').prop('disabled', false);
                            } else {
                                $('#sub_kegiatan_id').append(
                                    '<option value="" disabled>Tidak ada Sub. Kegiatan tersedia</option>'
                                );
    
                                $('#sub_kegiatan_id').prop('disabled', false);
                            }
                        },
                        error: function(xhr) {
                            $('#sub_kegiatan_id').prop('disabled', false);
                            console.error(xhr.responseText);
                        }
                    });
                }

            } else {
                $('#sub_kegiatan_id').empty();
                $('#sub_kegiatan_id').append(
                    '<option value="" selected disabled>Pilih Sub. Kegiatan</option>'
                );
            }
        });

        $('#sub_kegiatan_id').on('change', function() {
            const subKegiatanId = $(this).val();

            if (subKegiatanId) {

                $.ajax({
                    url: "{{ route('get.anggaran.by.sub-kegiatan') }}",
                    type: "GET",
                    data: {
                        sub_kegiatan_id: subKegiatanId
                    },
                    success: function(response) {
                        isAutoChanging = true;

                        $('#anggaran').val('Rp. ' + response.anggaran.total_anggaran)
                            .trigger('change');
                        $('#sisa').val('Rp. ' + response.anggaran.total_anggaran)
                            .trigger('change');
                        $('#sub_bidang_id').val(response.anggaran.bidang_sub_id)
                            .trigger('change');

                        isAutoChanging = false;
                    }
                });

                $.ajax({
                    url: "{{ route('get.kdprog-kdgiat.by.sub-kegiatan') }}",
                    type: "GET",
                    data: {
                        sub_kegiatan_id: subKegiatanId
                    },
                    success: function(response) {
                        $('#program_id').val(response.kdprog + ' - ' + response.program
                            .uraian).trigger('change');
                        $('#kegiatan_id').val(response.kdgiat + ' - ' + response.kegiatan
                            .uraian).trigger('change');
                    }
                });
            }
        });
    });
</script>
