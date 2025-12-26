<x-app-layout>
    <x-slot name="header">
        Rincian Biaya
    </x-slot>
    <x-container>
        <x-slot name="content">
            <div>
                <div class="flex flex-col md:flex-row justify-end items-center mb-4 gap-4">
                    {{-- <button type="button" id="add-button"
                        onclick="window.location = `{{ route('spt.create', ['sppd' => true]) }}`"
                        class="bg-[#249D06] hover:bg-opacity-80 text-white rounded-lg px-3 py-2 text-xs shadow-lg flex gap-1 items-center justify-center  whitespace-nowrap w-min font-medium">
                        <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-white"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 12H20M12 4V20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        <p>
                            Buat Rincian Biaya
                        </p>
                    </button> --}}
                    <div class="flex items-center gap-3">
                        <input type="search" class="text-xs rounded-lg border-gray-400" placeholder="Cari...."
                            id="customSearch">
                    </div>
                </div>
                <div class="relative pb-20">
                    <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                        <table id="datatable" class="text-sm hover stripe row-border">
                            <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                <tr>
                                    <th class="text-xs">Nomor SPPD</th>
                                    <th class="text-xs">Nomor SPT</th>
                                    <th class="text-xs w-32"></th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary-2">
                            </tbody>
                        </table>
                    </div>
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
                    render: function(data, type, row) {
                        const rincianUrl = `{{ route('rincian-biaya.create', ['sppd' => 'replace']) }}`.replace('replace',data)

                        let buttons = '';


                        buttons = `<a href="${rincianUrl}" class="bg-[#249D06] hover:bg-opacity-80 text-white rounded-lg px-3 py-2 text-xs shadow-lg flex gap-1 items-center justify-center  whitespace-nowrap w-min font-medium">
                                    <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-white"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4 12H20M12 4V20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg>
                                    <p>
                                        Buat Rincian Biaya
                                    </p>
                                </a>`;
                        
                        
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
