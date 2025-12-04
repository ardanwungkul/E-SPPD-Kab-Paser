<x-app-layout>
    <x-slot name="header">
        Referensi Kegiatan
    </x-slot>

    <x-container>
        <x-slot name="content">
            <div>
                <x-button.add-button :route="route('kegiatan.create')" />
                
                <div class="relative">
                    <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                        <table id="datatable" class="text-sm hover stripe row-border">
                            <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                <tr>
                                    <td class="text-xs">Kode</td>
                                    <td class="text-xs">Program/Kegiatan</td>
                                    <td class="text-xs w-32"></td>
                                </tr>
                            </thead>
                            <tbody class="text-secondary-2">
                                @foreach ($data as $item)
                                    <tr class="text-xs text-black tracking-wide">
                                        <td>
                                            <p class="text-start font-medium">{{ $item->kdprog }}</p>
                                        </td>
                                        <td>
                                            <p class="text-start">{{ $item->uraian }}</p>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    @if ($item->kegiatan->count() > 0)
                                        @foreach ($item->kegiatan()->orderBy('kdgiat', 'asc')->get() as $kegiatan)
                                            <tr class="text-xs tracking-wide">
                                                <td>
                                                    <p class="text-start font-medium">{{ $kegiatan->kdgiat }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="text-start">{{ $kegiatan->uraian }}</p>
                                                </td>
                                                <td>
                                                    <div class="flex justify-center items-center gap-3">
                                                        <div>
                                                            <div>
                                                                <a href="{{ route('kegiatan.edit', $kegiatan->kdgiat) }}"
                                                                    class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                                    <svg class="w-4 h-4" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        width="24" height="24" fill="none"
                                                                        viewBox="0 0 24 24">
                                                                        <path stroke="currentColor"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                                    </svg>

                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <button type="button" data-modal-id="{{ $kegiatan->kdgiat }}"
                                                                data-modal-toggle="confirm-delete-{{ $kegiatan->kdgiat }}"
                                                                data-modal-target="confirm-delete-{{ $kegiatan->kdgiat }}"
                                                                class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                                <svg class="w-4 h-4" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <x-modal.confirm-delete :id="$kegiatan->kdgiat" :name="'Data'"
                                                :action="route('kegiatan.destroy', $kegiatan->kdgiat)" />
                                        @endforeach
                                    @endif
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
            responsive: {
                details: {
                    renderer: function(api, rowIdx, columns) {
                        let data = columns
                            .map((col, i) => {
                                return col.hidden ?
                                    `<div class="my-3">
                                        <p class="text-xs font-bold">${col.title}</p>
                                        <div class="text-xs">${col.data}</div>
                                    </div>` : '';
                            })
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
        $(document).on('click', '[data-modal-id]', function() {
            const modalId = $(this).data('modal-id');

            const $targetEl = $(`[id="confirm-delete-${modalId}"]`);

            const modal = new Modal($targetEl[0]);
            if (modal) {
                modal.toggle();
            }
        });
        $(document).on('click', '[data-modal-hide]', function() {
            const modalId = $(this).data('modal-hide');
            const $targetEl = $(`#${modalId}`);

            const modal = new Modal($targetEl[0]);
            if (modal) {
                modal.hide();
            }
        });
    });
</script>
