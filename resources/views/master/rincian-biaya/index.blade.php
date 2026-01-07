<x-app-layout>
    <x-slot name="header">
        Rincian Biaya
    </x-slot>
    <x-container>
        <x-slot name="content">
            <div>
                <div class="flex flex-col md:flex-row justify-end items-center mb-4 gap-4">
                    <div class="flex items-center gap-3">
                        <input type="search" class="text-xs rounded-lg border-gray-400" placeholder="Cari...."
                            id="customSearch">
                    </div>
                </div>
                <div class="relative">
                    <table class=" text-xs md:text-sm hover stripe row-border w-full">
                        <colgroup>
                            <col class="w-fit">
                            <col class="w-full">
                        </colgroup>
                        <tbody>
                            @forelse ($data as $item)
                                <tr class=" bg-secondary-3 text-secondary-2">
                                    <th class="text-start px-3 py-2 border border-secondary-4 font-semibold text-nowrap">Nomor
                                        SPPD</th>
                                    <th colspan="2" class="text-left px-3 py-2 border">
                                        {{ $item->format_sppd }}</th>
                                </tr>
                                <tr class=" bg-secondary-3 text-secondary-2">
                                    <th class="text-start px-3 py-2 border border-secondary-4 font-semibold text-nowrap">Nomor
                                        SPT</th>
                                    <th colspan="2" class="text-left px-3 py-2 border">
                                        {{ $item->format_nomor }}
                                    </th>
                                </tr>
                                <tr class=" bg-secondary-3 text-secondary-2">
                                    <th class="text-start px-3 py-2 border border-secondary-4 font-semibold text-nowrap">Nama Pegawai</th>
                                    <th class="text-start px-3 py-2 border border-secondary-4 font-semibold">Nomor
                                        Kwitansi Dinas</th>
                                    <td class="text-center px-3 py-2 border w-32">
                                        <div class="flex items-center justify-end gap-3">
                                            <a href="{{ route('rincian-biaya.create', ['sppd' => $item->id]) }}"
                                                class="bg-[#249D06] hover:bg-opacity-80 text-white rounded-lg px-3 py-2 text-xs shadow-lg flex gap-1 items-center justify-center  whitespace-nowrap w-min font-medium">
                                                <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-white"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 12H20M12 4V20" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                                <p>
                                                    Buat Rincian Biaya
                                                </p>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                {{-- Rincian Biaya --}}
                                @foreach ($item->rincian_biaya as $rincian)
                                    <tr>
                                        <td class="text-left px-3 py-2 border text-sm text-nowrap">
                                            {{$rincian->pegawai->nama}}
                                        </td>
                                        <td class="text-left px-3 py-2 border text-sm">
                                            0022/BKAD-GU/PPU/1/202
                                        </td>
                                        <td class="text-center px-3 py-2 border">
                                            <div class="flex items-center justify-end gap-3">
                                                <div>
                                                    <div>
                                                        <a href="{{route('rincian-biaya.show', ['rincian_biaya' => $rincian->id])}}"
                                                            class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                            <svg class="w-4 h-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                                <path stroke="currentColor" stroke-width="2"
                                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="{{route('rincian-biaya.edit', ['rincian_biaya' => $rincian->id])}}"
                                                            class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                            <svg class="w-4 h-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <a href="{{ route('rincian-biaya.print', ['rincian_biaya' => $rincian->id])}}"
                                                            class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                            <svg class="w-4 h-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                <tr>
                                    <td colspan="{{ 5 }}">
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td td colspan="2" class="bg-secondary-3 text-secondary-2 px-3 py-2">
                                        <p class="text-sm text-center">
                                            Tidak Ada Data Tersedia
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </x-slot>
    </x-container>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        let table = $('#datatable').DataTable({
            info: false,
            processing: true,
            lengthChange: false,
            deferRender: true,
            paging: true,
            searching: false,
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
            }],
            serverSide: true,
            ajax: {
                url: `{{ route('rincian-biaya.index') }}`,
            },
            columns: [{
                    name: 'format_sppd',
                    data: 'format_sppd',
                    className: '!text-left'
                },
                {
                    name: 'format_nomor',
                    data: 'format_nomor',
                    className: '!text-left'
                },
                {
                    name: 'id',
                    data: 'id',
                    className: '!text-right',
                    render: function(data, type, row) {
                        const rincianUrl =
                            `{{ route('rincian-biaya.create', ['sppd' => 'replace']) }}`
                            .replace('replace', data)

                        let buttons = '';

                        // if (row.rincian_biaya) {
                        //     const showUrl = `{{ route('rincian-biaya.show', ':id') }}`.replace(':id', row.rincian_biaya.id);
                        //     const editUrl = `{{ route('rincian-biaya.edit', ':id') }}`.replace(':id', row.rincian_biaya.id);
                        //     const printUrl = `{{ route('sppd.print', ':id') }}`.replace(':id', row.rincian_biaya.id);


                        //     buttons = `<div class="flex items-center justify-end gap-3">
                        //             <div>
                        //                 <div>
                        //                     <a href="${showUrl}"
                        //                         class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                        //                             <svg class="w-4 h-4" aria-hidden="true"
                        //                                 xmlns="http://www.w3.org/2000/svg" width="24"
                        //                                 height="24" fill="none" viewBox="0 0 24 24">
                        //                                     <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                        //                                     <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        //                             </svg>
                        //                     </a>
                        //                 </div>
                        //             </div>
                        //             <div>
                        //                 <div>
                        //                     <a href="${editUrl}"
                        //                         class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                        //                             <svg class="w-4 h-4" aria-hidden="true"
                        //                                 xmlns="http://www.w3.org/2000/svg" width="24"
                        //                                 height="24" fill="none" viewBox="0 0 24 24">
                        //                                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                        //                             </svg>
                        //                     </a>
                        //                 </div>
                        //             </div>
                        //             <div>
                        //                 <div>
                        //                     <a href="${printUrl}"
                        //                         class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                        //                             <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        //                                 <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                        //                             </svg>
                        //                     </a>
                        //                 </div>
                        //             </div>
                        //         </div>
                        //     `;
                        // } else {
                        // };
                        buttons = `<div class="flex items-center justify-end gap-3">
                                <a href="${rincianUrl}" class="bg-[#249D06] hover:bg-opacity-80 text-white rounded-lg px-3 py-2 text-xs shadow-lg flex gap-1 items-center justify-center  whitespace-nowrap w-min font-medium">
                                    <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-white"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 12H20M12 4V20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                    <p>
                                        Buat Rincian Biaya
                                    </p>
                                </a>
                            </div>`;

                        return buttons;
                    }
                },
            ]

        });
        $('#customSearch').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
