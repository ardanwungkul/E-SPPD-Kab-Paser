<x-app-layout>
    <x-slot name="header">
        Referensi {{ session('config')->judul }}
    </x-slot>

    <x-container>
        <x-slot name="content">
            <div>
                <a href="{{ route('bidang.create') }}"
                    class="bg-secondary-3 text-secondary-2 rounded-lg px-3 py-2 text-xs border border-secondary-4 shadow-lg flex gap-1 items-center justify-center mb-12 md:mb-4 whitespace-nowrap w-min font-medium">
                    <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-secondary-2"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 12H20M12 4V20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                    <p>
                        Tambah
                    </p>
                </a>
                <div class="relative">
                    <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                        <table id="datatable" class="text-sm hover stripe row-border">
                            <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                <tr>
                                    <td class="text-xs">Nama</td>
                                    <td class="text-xs w-32"></td>
                                </tr>
                            </thead>
                            <tbody class="text-secondary-2">
                                @foreach ($data as $item)
                                    <tr class="text-xs">
                                        <td>
                                            <p>{{ $item->uraian }}</p>
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center gap-3">
                                                <div>
                                                    <div>
                                                        <a href="{{ route('bidang.edit', $item->id) }}"
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
                                                        :action="route('bidang.destroy', $item->id)" />
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
        </x-slot>
    </x-container>
</x-app-layout>
<script type="module">
    $(document).ready(function() {
        $('#datatable').DataTable({
            info: false,
            lengthChange: false,
            deferRender: true,
            paging: false,
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
            // columnDefs: [{
            //     orderable: false,
            //     targets: [3, 4, 5]
            // }, {
            //     className: 'dt-head-center',
            //     targets: [1, 2, 3, 4, 5]
            // }]
        });
    });
</script>
