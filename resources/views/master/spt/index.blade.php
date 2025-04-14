<x-app-layout>
    <x-slot name="header">
        Surat Perintah Tugas
    </x-slot>

    <x-container>
        <x-slot name="content">
            <div>
                <div class="flex flex-col md:flex-row justify-between items-center mb-4 gap-4">
                    <button type="button" id="add-button"
                        onclick="window.location = `{{ route('spt.create', ['lembaga' => 'replace_this']) }}`.replace('replace_this',document.getElementById('filter-lembaga').value)"
                        class="bg-secondary-3 text-secondary-2 rounded-lg px-3 py-2 text-xs border border-secondary-4 shadow-lg flex gap-1 items-center justify-center  whitespace-nowrap w-min font-medium">
                        <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-secondary-2"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 12H20M12 4V20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        <p>
                            Buat Surat Perintah Tugas
                        </p>
                    </button>
                    <div class="flex items-center gap-3">
                        <select name="" id="filter-lembaga" class="text-xs rounded-lg border border-gray-400">
                            <option value="dprd">DPRD</option>
                            <option value="setwan">Sekretariat DPRD</option>
                        </select>
                        <input type="search" class="text-xs rounded-lg border-gray-400" placeholder="Cari...."
                            id="customSearch">
                    </div>
                </div>
                <div class="relative pb-20">
                    <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                        <table id="datatable" class="text-sm hover stripe row-border">
                            <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                <tr>
                                    <th class="text-xs">Nomor SPT</th>
                                    <th class="text-xs w-32"></th>
                                </tr>
                            </thead>
                            <tbody class="text-secondary-2">
                                {{-- @foreach ($data as $item)
                                    <tr class="text-xs">
                                        <td>
                                            <p class="text-start">
                                                {{ $item->nomor }}</p>
                                        </td>
                                        <td>
                                            <p class="text-start">{{ $item->spt ? $item->spt->nomor : '-' }}</p>
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center gap-3">
                                                @if ($item->spt)
                                                    <div>
                                                        <div>
                                                            <a href="{{ route('spt.show', $item->id) }}"
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
                                                            <a href="{{ route('spt.edit', $item->id) }}"
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
                                                            <a href="{{ route('spt.print', $item->id) }}"
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
                                                    <div>
                                                        <button type="button"
                                                            data-modal-toggle="confirm-delete-{{ $item->id }}"
                                                            data-modal-target="confirm-delete-{{ $item->id }}"
                                                            class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                            <svg class="w-4 h-4" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="2"
                                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                            </svg>

                                                        </button>
                                                        <x-modal.confirm-delete :id="$item->id" :name="'Data'"
                                                            :action="route('nota-dinas.destroy', $item->id)" />
                                                    </div>
                                                @else
                                                    <div>
                                                        <a href="{{ route('spt.create', ['nota_dinas' => $item->id]) }}"
                                                            class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                            <svg viewBox="0 0 24 24" fill="none"
                                                                class="w-3 h-3 stroke-secondary-2"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M4 12H20M12 4V20" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </svg>
                                                            <p>Buat SPT</p>
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach --}}
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
                url: `{{ route('spt.index', ['lembaga' => 'rplc']) }}`.replace('rplc',
                    document.getElementById('filter-lembaga').value),
            },
            columns: [{
                    name: 'nomor',
                    data: 'nomor'
                },
                {
                    name: 'id',
                    data: 'id',
                    render: function(data) {
                        const showUrl = `{{ route('spt.show', ':id') }}`.replace(':id', data);
                        const editUrl = `{{ route('spt.edit', ':id') }}`.replace(':id', data);
                        const printUrl = `{{ route('spt.print', ':id') }}`.replace(':id', data);
                        return `<div class="flex items-center justify-center gap-3">
                                    <div>
                                        <div>
                                            <a href="${showUrl}"
                                                class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                    <svg class="w-4 h-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                            <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <a href="${editUrl}"
                                                class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                    <svg class="w-4 h-4" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                    </svg>
                                            </a>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <a href="${printUrl}"
                                                class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M16.444 18H19a1 1 0 0 0 1-1v-5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h2.556M17 11V5a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v6h10ZM7 15h10v4a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-4Z" />
                                                    </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        `;
                    }
                },

            ]

        });
        $('#customSearch').on('keyup', function() {
            table.search(this.value).draw();
        });
        $('#filter-lembaga').on('change', function() {
            table.ajax.url(
                `{{ route('spt.index', ['lembaga' => 'rplc']) }}`.replace('rplc', this.value)
            ).load();
        });
    });
</script>
