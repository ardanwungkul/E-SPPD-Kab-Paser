<x-app-layout>
    <x-slot name="header">
        Buat Surat Perintah Tugas
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
            <input type="hidden" name="is_dprd" value="{{ request()->lembaga == 'dprd' ? 'dprd' : null }}">
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t border-secondary-4 pt-4">
                        <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                            Umum
                        </legend>
                        <div class="text-sm max-w-xl mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
                            <div class="flex flex-col gap-1">
                                <label for="jenis_sppd_id">Jenis SPPD</label>
                                <select name="jenis_sppd_id" id="jenis_sppd_id" class="text-sm rounded-lg select2"
                                    required>
                                    <option value="" selected disabled> Pilih Jenis SPPD</option>
                                    @foreach ($jenis as $item)
                                        <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="bidang_id">{{ session('config')->judul }}</label>
                                <input type="text" name="bidang_id" id="bidang_id"
                                    class="w-full text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Pilih Bidang" disabled>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="sub_bidang_id">Sub {{ session('config')->judul }}</label>
                                <select name="sub_bidang_id" id="sub_bidang_id" class="text-sm rounded-lg select2"
                                    required>
                                    <option value="" selected disabled> Pilih Sub
                                        {{ session('config')->judul }}
                                    </option>
                                    @foreach ($subbidang as $item)
                                        <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="program_id">Program</label>
                                <input type="text" name="program_id" id="program_id"
                                    class="w-full text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Pilih Program" disabled>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="kegiatan_id">Kegiatan</label>
                                <input type="text" name="kegiatan_id" id="kegiatan_id"
                                    class="w-full text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Pilih Kegiatan" disabled>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="sub_kegiatan_id">Sub Kegiatan</label>
                                <select name="sub_kegiatan_id" id="sub_kegiatan_id" class="text-sm rounded-lg select2"
                                    required>
                                    <option value="" selected disabled> Pilih Sub Kegiatan</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="anggaran">Anggaran</label>
                                <input type="text" name="anggaran" id="anggaran"
                                    class="w-full text-sm rounded-lg border border-secondary-4 bg-[#eee] text-secondary-1"
                                    placeholder="Total Anggaran" disabled>
                            </div>
                            <div class="w-full border-t pb-3 mt-3">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label for="berkas">Berkas Bukti Disposisi (PDF, JPG, JPEG, PNG Maksimal 1MB)</label>
                                <label for="berkas"
                                    class=" cursor-pointer flex items-center justify-between p-1 text-xs md:text-sm rounded-lg border border-gray-300 shadow-md">
                                    <div class=" flex items-center gap-2">
                                        <div
                                            class=" text-nowrap px-2 py-1 text-secondary-1 border border-gray-300 bg-neutral-300 rounded-lg">
                                            Pilih Berkas
                                        </div>
                                        <div id="filename" class=" line-clamp-1"></div>
                                    </div>
                                    <div class=" w-5 h-5 text-secondary-1 mr-1">
                                        <svg class=" w-full h-full" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 640">
                                            <path fill="currentColor"
                                                d="M352 173.3L352 384C352 401.7 337.7 416 320 416C302.3 416 288 401.7 288 384L288 173.3L246.6 214.7C234.1 227.2 213.8 227.2 201.3 214.7C188.8 202.2 188.8 181.9 201.3 169.4L297.3 73.4C309.8 60.9 330.1 60.9 342.6 73.4L438.6 169.4C451.1 181.9 451.1 202.2 438.6 214.7C426.1 227.2 405.8 227.2 393.3 214.7L352 173.3zM320 464C364.2 464 400 428.2 400 384L480 384C515.3 384 544 412.7 544 448L544 480C544 515.3 515.3 544 480 544L160 544C124.7 544 96 515.3 96 480L96 448C96 412.7 124.7 384 160 384L240 384C240 428.2 275.8 464 320 464zM464 488C477.3 488 488 477.3 488 464C488 450.7 477.3 440 464 440C450.7 440 440 450.7 440 464C440 477.3 450.7 488 464 488z" />
                                        </svg>
                                    </div>
                                </label>
                                <input type="file" name="berkas" id="berkas"
                                    accept="application/pdf,.jpg,.jpeg,.png" class="hidden" required>
                                <script>
                                    document.getElementById('berkas').addEventListener('change', function(e) {
                                        const fileName = e.target.files[0]?.name || "Tidak ada file dipilih";
                                        document.getElementById('filename').textContent = fileName;
                                    });
                                </script>
                            </div>
                            <div class="w-full border-t pb-3 mt-3">
                            </div>
                            <div class=" w-full grid grid-cols-3 gap-3">
                                <div class="flex flex-col gap-1">
                                    <label for="tanggal_berangkat">Tanggal Berangkat</label>
                                    <input type="date" id="tanggal_berangkat" name="tanggal_berangkat"
                                        class="w-full text-sm rounded-lg border border-secondary-4">
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="tanggal_kembali">Tanggal Kembali</label>
                                    <input type="date" id="tanggal_kembali" name="tanggal_kembali"
                                        class="w-full text-sm rounded-lg border border-secondary-4">
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="total_hari">Total Hari</label>
                                    <input type="number" id="total_hari" name="total_hari" placeholder="Total Hari"
                                        class="w-full text-sm rounded-lg border border-secondary-4 bg-[#eee]" disabled>
                                </div>
                                <script>
                                    function hitungTotalHari() {
                                        const tglBerangkat = document.getElementById('tanggal_berangkat').value;
                                        const tglKembali = document.getElementById('tanggal_kembali').value;

                                        if (tglBerangkat && tglKembali) {
                                            const start = new Date(tglBerangkat);
                                            const end = new Date(tglKembali);

                                            // Hitung selisih waktu
                                            const selisihMs = end - start;

                                            if (selisihMs >= 0) {
                                                const totalHari = (selisihMs / (1000 * 60 * 60 * 24)) + 1; // termasuk hari berangkat
                                                document.getElementById('total_hari').value = totalHari;
                                            } else {
                                                document.getElementById('total_hari').value = "";
                                            }
                                        }
                                    }

                                    document.getElementById('tanggal_berangkat').addEventListener('change', hitungTotalHari);
                                    document.getElementById('tanggal_kembali').addEventListener('change', hitungTotalHari);
                                </script>
                                <div class=" w-full flex flex-col gap-1">
                                    <label for="provinsi_id">Provinsi Tujuan</label>
                                    <select name="provinsi_id" id="provinsi_id"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2"
                                        required>
                                        <option value="" selected disabled>Pilih Provinsi</option>
                                        @foreach ($provinsi as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="kabupaten_kota_id">Kabupaten/Kota Tujuan</label>
                                    <select name="kabupaten_kota_id" id="kabupaten_kota_id"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2"
                                        required>
                                        <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                        @foreach ($kabkota as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <label for="kecamatan_id">Kecamatan Tujuan</label>
                                    <select name="kecamatan_id" id="kecamatan_id"
                                        class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2"
                                        required>
                                        <option value="" selected disabled>Pilih Kecamatan</option>
                                        @foreach ($kecamatan as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
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
                            Dasar
                        </legend>
                        <div class="pt-3 max-w-xl mx-auto">
                            <table class="table table-bordered w-full" id="dynamicTableDasar">
                                <tr>
                                    <td class="flex items-start px-2">
                                        <label for="dasar[0][uraian]" class="align-top whitespace-nowrap">Dasar
                                            Ke
                                            1</label>
                                    </td>
                                    <td class="w-full px-2">
                                        <div class="space-y-1">
                                            <textarea name="dasar[0][uraian]" id="dasar[0][uraian]" rows="3"
                                                class="w-full text-sm rounded-lg border border-secondary-4" placeholder="Dasar Ke-1" required></textarea>
                                        </div>
                                    </td>
                                    <td class="px-2 flex items-start">
                                        <button type="button" name="add" id="addDasar"
                                            class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</button>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </fieldset>
                </x-slot>
            </x-container>
            <x-container>
                <x-slot name="content">
                    <fieldset class="border-t border-secondary-4 pt-4">
                        <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                            Pegawai
                        </legend>
                        <div class=" max-w-xl mx-auto">
                            <button type="button" name="add" id="addPegawai"
                                data-modal-target="pilih-pegawai-spt" data-modal-toggle="pilih-pegawai-spt"
                                class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-xs font-medium text-center whitespace-nowrap focus:ring-1 focus:ring-blue-500">
                                Pilih Pegawai
                            </button>
                            <x-modal.pilih-pegawai-spt :pegawai="$pegawai" />
                            <div class="pt-3">
                                <table class="table table-bordered w-full" id="dynamicTablePegawai">
                                    <tbody></tbody>
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
                            Untuk
                        </legend>
                        <div class="pt-3 max-w-xl mx-auto">
                            <table class="table table-bordered w-full" id="dynamicTableUntuk">
                                <tr>
                                    <td class="flex items-start px-2">
                                        <label for="untuk[0][uraian]" class="align-top whitespace-nowrap">Untuk
                                            Ke
                                            1</label>
                                    </td>
                                    <td class="w-full px-2">
                                        <div class="space-y-1">
                                            <textarea name="untuk[0][uraian]" id="untuk[0][uraian]" rows="3"
                                                class="w-full text-sm rounded-lg border border-secondary-4" placeholder="Untuk Ke-1" required></textarea>
                                        </div>
                                    </td>
                                    <td class="px-2 flex items-start">
                                        <button type="button" name="add" id="addUntuk"
                                            class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center">+</button>
                                    </td>
                                </tr>
                            </table>

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
                        <div class="pt-3 max-w-xl mx-auto">
                            <div class="grid grid-cols-1 gap-5">
                                <div>
                                    <div class="flex items-center gap-5">
                                        {{-- <div class="flex items-center gap-1">
                                            <input type="checkbox" class="rounded-full" name="ub_status"
                                                id="ub_status">
                                            <label for="ub_status">UB</label>
                                        </div> --}}
                                        <input type="text" id="penandatangan_keterangan"
                                            name="penandatangan_keterangan"
                                            class="rounded-lg text-sm border border-secondary-4 w-full cursor-pointer"
                                            data-modal-target="pilih-pegawai-penandatangan"
                                            data-modal-toggle="pilih-pegawai-penandatangan"
                                            placeholder="Ketuk untuk memilih Pegawai" readonly required>
                                        <input type="text" id="penandatangan_id" name="penandatangan_id"
                                            class="hidden">
                                        <x-modal.pilih-pegawai-penandatangan :pegawai="$pegawai" />
                                    </div>
                                </div>
                                <div>
                                    <label for="penandatangan_tanggal" class="block mb-1">Tanggal Di Tanda
                                        Tangani</label>
                                    <input type="date" id="penandatangan_tanggal" name="penandatangan_tanggal"
                                        value="{{ now()->toDateString() }}"
                                        class="rounded-lg text-sm border border-secondary-4 w-full" required>
                                </div>
                                <div>
                                    <label for="penandatangan_lokasi" class="block mb-1">Lokasi/Wilayah Di Tanda
                                        Tangani</label>
                                    <input type="text" id="penandatangan_lokasi" name="penandatangan_lokasi"
                                        placeholder="Masukkan Lokasi Penanda Tangan"
                                        class="rounded-lg text-sm border border-secondary-4 w-full" required>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </x-slot>
            </x-container>

            <x-container>
                <x-slot name="content">
                    <div class="flex justify-end items-center gap-4 col-span-2 text-sm max-w-xl mx-auto">
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
            if ($('#dynamicTablePegawai tr').length === 0) {
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
{{-- Dasar & Untuk --}}
<script type="module">
    var iDasar = 1;
    var iUntuk = 1;
    var iPegawai = 1;

    $(document).ready(function() {
        function updateDasarNumbers() {
            $("#dynamicTableDasar tr").each(function(index, tr) {
                const newIndex = index + 1;
                $(tr).find("label").attr("for", `dasar[${newIndex}][uraian]`).text("Dasar Ke " +
                    newIndex);
                $(tr).find("textarea").attr({
                    id: `dasar[${newIndex}][uraian]`,
                    name: `dasar[${newIndex}][uraian]`,
                    placeholder: `Dasar Ke-${newIndex}`
                });
            });
        }

        function updateUntukNumbers() {
            $("#dynamicTableUntuk tr").each(function(index, tr) {
                const newIndex = index + 1;
                $(tr).find("label").attr("for", `untuk[${newIndex}][uraian]`).text("Untuk Ke " +
                    newIndex);
                $(tr).find("textarea").attr({
                    id: `untuk[${newIndex}][uraian]`,
                    name: `untuk[${newIndex}][uraian]`,
                    placeholder: `Untuk Ke-${newIndex}`
                });
            });
        }

        function updatePegawaiNumbers() {
            $("#dynamicTablePegawai tr").each(function(index, tr) {
                const newIndexPegawai = index + 1;
                $(tr).find("label").attr("for", `pegawai[${newIndexPegawai}][keterangan]`).text(
                    "Pegawai Ke " +
                    newIndexPegawai);
            });
        }

        $("#addDasar").click(function() {
            ++iDasar;
            $("#dynamicTableDasar").append(
                `<tr>
                    <td class="flex items-start px-2">
                        <label for="dasar[${iDasar}][uraian]" class="align-top whitespace-nowrap">Dasar Ke ${iDasar}</label>
                    </td>
                    <td class="w-full px-2">
                        <div class="space-y-1">
                            <textarea name="dasar[${iDasar}][uraian]" id="dasar[${iDasar}][uraian]" rows="3" class="w-full text-sm rounded-lg border border-secondary-4" placeholder="Dasar Ke-${iDasar}"></textarea>
                        </div>
                    </td>
                    <td class="px-2 flex items-start">
                        <button type="button" class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center remove-tr" data-id="dasar">
                            -
                        </button>
                    </td>
                </tr>`
            );
            updateDasarNumbers();
        });

        $("#addUntuk").click(function() {
            ++iUntuk;
            $("#dynamicTableUntuk").append(
                `<tr>
                    <td class="flex items-start px-2">
                        <label for="untuk[${iUntuk}][uraian]" class="align-top whitespace-nowrap">Untuk Ke ${iUntuk}</label>
                    </td>
                    <td class="w-full px-2">
                        <div class="space-y-1">
                            <textarea name="untuk[${iUntuk}][uraian]" id="untuk[${iUntuk}][uraian]" rows="3" class="w-full text-sm rounded-lg border border-secondary-4" placeholder="Untuk Ke-${iUntuk}"></textarea>
                        </div>
                    </td>
                    <td class="px-2 flex items-start">
                        <button type="button" class="text-secondary-2 border border-secondary-4 rounded shadow-sm focus:outline-none bg-secondary-3 hover:bg-opacity-80 inline-flex items-center px-3 py-2 text-sm font-medium text-center remove-tr" data-id="untuk">
                            -
                        </button>
                    </td>
                </tr>`
            );
            updateUntukNumbers();
        });

        $('.datatable tbody').on('click', '.button-pegawai-spt-check', function() {
            const pegawai_id = $(this).data('id');
            const pegawai_keterangan = $(this).data('keterangan');

            const isChecked = $(this).attr('data-check') === 'true';
            $(this).attr('data-check', isChecked ? 'false' : 'true');
            if (isChecked) {
                $(this).html(`
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5" />
                    </svg>
                `);
                $(`#dynamicTablePegawai .pegawai-item[data-id="${pegawai_id}"]`).remove();
            } else {
                $(this).html('X');
                const newRow = `
                <tr class="pegawai-item" data-id="${pegawai_id}">
                    <td class="flex items-start px-2 py-2">
                        <label for="pegawai[${pegawai_id}][keterangan]" class="align-top whitespace-nowrap">Pegawai Ke 1</label>
                    </td>
                    <td class="w-full px-2 py-2">
                        <div class="space-y-1">
                            <input name="pegawai[${pegawai_id}][keterangan]" id="pegawai[${pegawai_id}][keterangan]" value="${pegawai_keterangan}"
                                    class="w-full text-sm rounded-lg border border-secondary-4 cursor-pointer" readonly />
                            <input name="pegawai[${pegawai_id}][id]" id="pegawai[${pegawai_id}][id]" type="text" value="${pegawai_id}"
                                    class="hidden" readonly required>
                        </div>
                    </td>
                </tr>
            `;
                $('#dynamicTablePegawai tBody').append(newRow);
            }
            updatePegawaiNumbers()
        });
        $(document).on('click', '.remove-tr', function() {
            const data = $(this).data('id');
            if (data == 'dasar') {
                --iDasar;
                $(this).parents('tr').remove();
                updateDasarNumbers();
            }
            if (data == 'untuk') {
                --iUntuk;
                $(this).parents('tr').remove();
                updateUntukNumbers();
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
        $('.select2').select2({
            dropdownCssClass: "text-sm",
            selectionCssClass: 'text-sm',
        });

        // $('#program_id').on('change', function() {
        //     const programKode = $(this).val();

        //     if (programKode) {
        //         $('#kegiatan_id').prop('disabled', true)
        //             .html('<option selected disabled>Memuat...</option>');

        //         $.ajax({
        //             url: "{{ route('get.kegiatan.by.program') }}",
        //             type: "GET",
        //             data: {
        //                 program_id: programKode
        //             },
        //             success: function(response) {
        //                 $('#kegiatan_id').empty();
        //                 $('#kegiatan_id').append(
        //                     '<option value="" selected disabled>Pilih Kegiatan</option>'
        //                 );
        //                 $('#sub_kegiatan_id').empty();
        //                 $('#sub_kegiatan_id').append(
        //                     '<option value="" selected disabled>Pilih Sub Kegiatan</option>'
        //                 );

        //                 if (response.length > 0) {
        //                     $.each(response, function(index, kegiatan) {
        //                         $('#kegiatan_id').append('<option value="' +
        //                             kegiatan.kdgiat + '">' + kegiatan.kdgiat + ' - ' + kegiatan.uraian +
        //                             '</option>');
        //                     });

        //                     $('#kegiatan_id').prop('disabled', false);
        //                 } else {
        //                     $('#kegiatan_id').append(
        //                         '<option value="" disabled>Tidak ada kegiatan tersedia</option>'
        //                     );

        //                     $('#kegiatan_id').prop('disabled', false);
        //                 }
        //             },
        //             error: function(xhr) {

        //                 $('#kegiatan_id').prop('disabled', false);
        //                 console.error(xhr.responseText);
        //             }
        //         });
        //     } else {
        //         $('#kegiatan_id').empty();
        //         $('#kegiatan_id').append('<option value="" selected disabled>Pilih Kegiatan</option>');
        //         $('#sub_kegiatan_id').empty();
        //         $('#sub_kegiatan_id').append(
        //             '<option value="" selected disabled>Pilih Sub Kegiatan</option>'
        //         );
        //     }
        // });
        $('#provinsi_id').on('change', function() {
            const ProvinsiKode = $(this).val();

            if (ProvinsiKode) {
                $('#kabupaten_kota_id').prop('disabled', true)
                    .html('<option selected disabled>Memuat...</option>');
                $.ajax({
                    url: "{{ route('get.kabupaten-kota-by-provinsi') }}",
                    type: "GET",
                    data: {
                        provinsi_id: ProvinsiKode
                    },
                    success: function(response) {

                        $('#kabupaten_kota_id').empty();
                        $('#kabupaten_kota_id').append(
                            '<option value="" selected disabled>Pilih Kabupaten/Kota</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, kabupaten) {
                                $('#kabupaten_kota_id').append('<option value="' +
                                    kabupaten.id + '">' + kabupaten.nama +
                                    '</option>');
                            });
                            $('#kabupaten_kota_id').prop('disabled', false);
                        } else {
                            $('#kabupaten_kota_id').append(
                                '<option value="" disabled>Tidak ada Kabupaten/Kota tersedia</option>'
                            );
                            $('#kabupaten_kota_id').prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        $('#kabupaten_kota_id').prop('disabled', false);
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#kabupaten_kota_id').empty();
                $('#kabupaten_kota_id').append(
                    '<option value="" selected disabled>Pilih Kabupaten/Kota</option>');
            }
        });

        $('#kabupaten_kota_id').on('change', function() {
            const KabkotaKode = $(this).val();

            if (KabkotaKode) {
                $('#kecamatan_id').prop('disabled', true)
                    .html('<option selected disabled>Memuat...</option>');
                $.ajax({
                    url: "{{ route('get.kecamatan-by-kabupaten-kota') }}",
                    type: "GET",
                    data: {
                        kabupaten_kota_id: KabkotaKode
                    },
                    success: function(response) {

                        $('#kecamatan_id').empty();
                        $('#kecamatan_id').append(
                            '<option value="" selected disabled>Pilih Kecamatan</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, kecamatan) {
                                $('#kecamatan_id').append('<option value="' +
                                    kecamatan.id + '">' + kecamatan.nama +
                                    '</option>');
                            });
                            $('#kecamatan_id').prop('disabled', false);
                        } else {
                            $('#kecamatan_id').append(
                                '<option value="" disabled>Tidak ada Kecamatan tersedia</option>'
                            );
                            $('#kecamatan_id').prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        $('#kecamatan_id').prop('disabled', false);
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#kabupaten_kota_id').empty();
                $('#kabupaten_kota_id').append(
                    '<option value="" selected disabled>Pilih Kabupaten/Kota</option>');
            }
        });

        $('#jenis_sppd_id').on('change', function() {
            const jenisSppdId = $(this).val();

            if (jenisSppdId) {
                $('#provinsi_id').prop('disabled', true)
                    .html('<option selected disabled>Memuat...</option>');
                $('#kabupaten_kota_id').prop('disabled', true)
                    .html('<option selected disabled>Memuat...</option>');
                $('#kecamatan_id').prop('disabled', true)
                    .html('<option selected disabled>Memuat...</option>');

                $.ajax({
                    url: "{{ route('get.wilayah.by.jenis-sppd') }}",
                    type: "GET",
                    data: {
                        jenis_sppd_id: jenisSppdId
                    },
                    success: function(response) {
                        $('#provinsi_id').empty();
                        $('#provinsi_id').append(
                            '<option value="" selected disabled>Pilih Provinsi</option>'
                        );
                        $('#kabupaten_kota_id').empty();
                        $('#kabupaten_kota_id').append(
                            '<option value="" selected disabled>Pilih Kabupaten/Kota</option>'
                        );
                        $('#kecamatan_id').empty();
                        $('#kecamatan_id').append(
                            '<option value="" selected disabled>Pilih Kecamatan</option>'
                        );

                        if (response && response.wilayah) {

                            if (response.wilayah == 'Provinsi') {
                                $.each(response.provinsi, function(index, provinsi) {
                                    $('#provinsi_id').append('<option value="' +
                                        provinsi.id + '">' + provinsi.nama +
                                        '</option>');
                                });

                                $('#provinsi_id').prop('disabled', false);
                                $('#kabupaten_kota_id').prop('disabled', false);
                                $('#kecamatan_id').prop('disabled', false);
                            } else if (response.wilayah == 'Kabupaten') {
                                $('#provinsi_id').append(
                                    '<option value="' + response.provinsi.id +
                                    '" selected disabled>' + response.provinsi.nama +
                                    '</option>'
                                );

                                $.each(response.kabkota, function(index, kabkota) {
                                    $('#kabupaten_kota_id').append(
                                        '<option value="' +
                                        kabkota.id + '">' + kabkota.nama +
                                        '</option>');
                                });


                                $('#kabupaten_kota_id').prop('disabled', false);
                                $('#kecamatan_id').prop('disabled', false);
                            } else if (response.wilayah == 'Kecamatan') {
                                $('#provinsi_id').append(
                                    '<option value="' + response.provinsi.id +
                                    '" selected disabled>' + response.provinsi.nama +
                                    '</option>'
                                );
                                $('#kabupaten_kota_id').append(
                                    '<option value="' + response.kabkota.id +
                                    '" selected disabled>' + response.kabkota.nama +
                                    '</option>'
                                );

                                $.each(response.kecamatan, function(index, kecamatan) {
                                    $('#kecamatan_id').append(
                                        '<option value="' +
                                        kecamatan.id + '">' + kecamatan.nama +
                                        '</option>');
                                });

                                $('#kecamatan_id').prop('disabled', false);
                            }
                        } else {
                            $('#provinsi_id').prop('disabled', false);
                            $('#kabupaten_kota_id').prop('disabled', false);
                            $('#kecamatan_id').prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        $('#provinsi_id').prop('disabled', false);
                        $('#kabupaten_kota_id').prop('disabled', false);
                        $('#kecamatan_id').prop('disabled', false);
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#sub_kegiatan_id').empty();
                $('#sub_kegiatan_id').append(
                    '<option value="" selected disabled>Pilih Sub Kegiatan</option>');
            }
        });

        $('#sub_bidang_id').on('change', function() {
            const subBidangId = $(this).val();

            if (subBidangId) {
                $('#sub_kegiatan_id').prop('disabled', true)
                    .html('<option selected disabled>Memuat...</option>');

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

                $.ajax({
                    url: "{{ route('get.sub-kegiatan.by.sub-bidang') }}",
                    type: "GET",
                    data: {
                        sub_bidang_id: subBidangId
                    },
                    success: function(response) {
                        $('#sub_kegiatan_id').empty();
                        $('#sub_kegiatan_id').append(
                            '<option value="" selected disabled>Pilih Sub Kegiatan</option>'
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
                                '<option value="" disabled>Tidak ada Sub Kegiatan tersedia</option>'
                            );

                            $('#sub_kegiatan_id').prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        $('#sub_kegiatan_id').prop('disabled', false);
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#sub_kegiatan_id').empty();
                $('#sub_kegiatan_id').append(
                    '<option value="" selected disabled>Pilih Sub Kegiatan</option>'
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
                        $('#anggaran').val('Rp. ' + response.anggaran.total_anggaran)
                            .trigger('change');
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
