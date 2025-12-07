<x-app-layout>
    <x-slot name="header">
        Referensi Jenis Perjalanan
    </x-slot>

    <x-container>
        <x-slot name="content">
            <div>
                <div class=" flex mb-4 border-b border-gray-200">
                    <ul class=" grid grid-cols-3 text-sm font-medium" id="jenis-tab"
                        data-tabs-toggle="#jenis-tab-content" role="tablist">
                        <li role="presentation">
                            <button 
                                class="inline-block py-4 px-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 " 
                                id="jenis-pegawai-tab" data-tabs-target="#jenis-pegawai" type="button" role="tab"
                                aria-controls="jenis-pegawai" aria-selected="false">Jenis Pegawai</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block py-4 px-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                                id="jenis-perjalanan-tab" data-tabs-target="#jenis-perjalanan" type="button"
                                role="tab" aria-controls="jenis-perjalanan" aria-selected="false">Jenis
                                Perjalanan</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block py-4 px-2 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 "
                                id="tingkat-perjalanan-tab" data-tabs-target="#tingkat-perjalanan" type="button"
                                role="tab" aria-controls="tingkat-perjalanan" aria-selected="false">Tingkat
                                Perjalanan</button>
                        </li>
                    </ul>
                </div>
                <div id="jenis-tab-content">
                    <div id="jenis-pegawai" role="tabpanel" aria-labelledby="jenis-pegawai-tab">
                        <div class="relative pb-20">
                            <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                                <table class="text-sm hover stripe row-border datatable">
                                    <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                        <tr>
                                            <td class="text-xs">Uraian</td>
                                        </tr>
                                    </thead>
                                    <tbody class="text-secondary-2">
                                        @foreach ($jenispeg as $item)
                                            <tr class="text-xs">
                                                <td>
                                                    <p class="text-start">{{ $item->uraian }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="jenis-perjalanan" role="tabpanel" aria-labelledby="jenis-perjalanan-tab">
                        <div class="relative pb-20">
                            <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                                <table class="text-sm hover stripe row-border datatable">
                                    <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                        <tr>
                                            <td class="text-xs">Jenis Perjalanan</td>
                                            <td class="text-xs">Wilayah</td>
                                        </tr>
                                    </thead>
                                    <tbody class="text-secondary-2">
                                        @foreach ($jenisper as $item)
                                            <tr class="text-xs">
                                                <td>
                                                    <p class="text-start">{{ $item->uraian }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-start">{{ $item->wilayah }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="tingkat-perjalanan" role="tabpanel" aria-labelledby="tingkat-perjalanan-tab">
                        <div class="relative pb-20">
                            <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                                <table class="text-sm hover stripe row-border datatable">
                                    <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                        <tr>
                                            <td class="text-xs">Tingkat</td>
                                            <td class="text-xs">Uraian</td>
                                            <td class="text-xs">Keterangan</td>
                                        </tr>
                                    </thead>
                                    <tbody class="text-secondary-2">
                                        @foreach ($tingper as $item)
                                            <tr class="text-xs">
                                                <td class="dt-head-left dtr-control" data-order="A001">
                                                    <p class="!text-start w-min inline-block">{{ $item->tingkat }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-start">{{ $item->uraian }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-start">{{ $item->keterangan }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </x-slot>
    </x-container>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        $('.datatable').each(function() {
            $(this).DataTable({
                info: false,
                lengthChange: false,
                deferRender: true,
                paging: true,
                pagingType: 'simple',
                language: {
                    search: '',
                    emptyTable: "Tidak ada data tersedia",
                    searchPlaceholder: 'Cari...'
                },
                ordering: false,
                responsive: {
                    details: {
                        renderer: function(api, rowIdx, columns) {
                            let data = columns
                                .map((col) =>
                                    col.hidden ?
                                    `<div class="my-3">
                                    <p class="text-xs font-bold">${col.title}</p>
                                    <div class="text-xs">${col.data}</div>
                                </div>` : ''
                                )
                                .join('');

                            let table = document.createElement('table');
                            table.innerHTML = data;
                            return data ? table : false;
                        }
                    }
                },
                columnDefs: [{
                    targets: '_all',
                    className: 'dt-head-left',
                }]
            });
        });
    });
</script>
