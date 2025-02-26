@props(['pegawai'])
<div id="pilih-pegawai-kepada" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between px-4 py-2 border-b rounded-t border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900">
                    Pilih Pegawai
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="pilih-pegawai-kepada">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-4 py-2 space-y-4 pt-16">
                <div class="relative pb-20">
                    <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                        <table class="text-sm hover stripe row-border datatable">
                            <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                <tr>
                                    <td class="text-xs">NIP</td>
                                    <td class="text-xs">Nama</td>
                                    <td class="text-xs">Jabatan</td>
                                    <td class="text-xs">Pangkat/Golongan</td>
                                    <td class="text-xs w-32"></td>
                                </tr>
                            </thead>
                            <tbody class="text-secondary-2">
                                @foreach ($pegawai as $item)
                                    <tr class="text-xs">
                                        <td>
                                            <p class="text-start">{{ $item->nip }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->nama }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->jabatan }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $item->pangkat->uraian }} - {{ $item->pangkat->kode_golongan }}</p>
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center gap-3">
                                                <div>
                                                    <button type="button" data-id="{{ $item->id }}"
                                                        data-keterangan="{{ $item->nama }} - {{ $item->jabatan }}"
                                                        class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg button-pegawai-kepada-check">
                                                        <svg class="w-4 h-4" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M5 11.917 9.724 16.5 19 7.5" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center justify-end px-4 py-2 border-t border-gray-200 rounded-b">
                <button data-modal-hide="pilih-pegawai-kepada" type="button" id="close-button-pilih-pegawai-kepada"
                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</button>
            </div>
        </div>
    </div>
</div>
