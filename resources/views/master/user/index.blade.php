<x-app-layout>
    <x-slot name="header">
        Manajemen User
    </x-slot>

    <x-container>
        <x-slot name="content">
            <div>
                @if (Auth::user()->level >= 3)
                    <x-button.add-button :route="route('users.create')" />
                @endif
                <div class="relative pb-20">
                    <div class="rounded-lg overflow-hidden shadow-lg border border-secondary-4">
                        <table id="datatable" class="text-sm hover stripe row-border">
                            <thead class="bg-secondary-3 text-secondary-2 font-medium">
                                <tr class="text-xs">
                                    <td></td>
                                    <td class="!font-medium !text-xs ">Nama Pengguna</td>
                                    <td class="!font-medium !text-xs ">Username</td>
                                    <td class="!font-medium !text-xs ">Role</td>
                                    {{-- <td class="!font-medium !text-xs ">Email/Username</td> --}}
                                    <td class="!font-medium !text-xs ">Status</td>
                                    <td class="!font-medium !text-xs ">Terakhir Login</td>
                                    <td class="!font-medium !text-xs ">Terakhir Logout</td>
                                    <td class="!font-medium !text-xs ">Tanggal Daftar</td>
                                    <td class="!font-medium !text-xs w-32"></td>
                                </tr>
                            </thead>
                            <tbody class="text-secondary-2">
                                @foreach ($data as $item)
                                    <tr class="text-xs">
                                        <td>
                                            <img class=" w-14 min-w-14 h-14 rounded-lg" src="{{ $item->photo ? asset('storage/' . $item->photo) : asset('assets/images/placeholder-image.jpg') }}" alt="">
                                        </td>
                                        <td>
                                            <p>{{ $item->name }}</p>
                                        </td>
                                        {{-- <td>
                                            @if ($item->roles)
                                                @foreach ($item->roles as $role)
                                                    <p>{{ $role->name }}</p>
                                                @endforeach
                                            @endif
                                        </td> --}}
                                        <td>
                                            <p>{{ $item->username }}</p>
                                        </td>
                                        <td>{{ $item->level == 1 ? 'User Bidang' : ($item->level == 2 ? 'Admin Bidang' : ($item->level == 3 ? 'Admin' : 'Superadmin')) }}</td>
                                        <td>
                                            <div>
                                                @if ($item->aktif == 'Y')
                                                    <p
                                                        class="text-white bg-green-400 rounded-lg shadow px-3 py-1 text-center">
                                                        Aktif
                                                    </p>
                                                @else
                                                    <p
                                                        class="text-white bg-red-400 rounded-lg shadow px-3 py-1 text-center">
                                                        Tidak Aktif
                                                    </p>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <p>{{ $item->formattedTerakhirLogin ?? '-' }}
                                            </p>
                                        </td>
                                        <td>
                                            <p>{{ $item->formattedTerakhirLogout ?? '-' }}
                                            </p>
                                        </td>
                                        <td>
                                            <p>{{ $item->formattedCreatedAt ?? '-' }}</p>
                                        </td>
                                        <td>
                                            <div class="flex justify-center items-center gap-3">
                                                @if (Auth::user()->level >= 3 && (Auth::user()->level > $item->level || Auth::user()->level == $item->level))
                                                    <div>
                                                        <div>
                                                            <a href="{{ route('users.edit', $item->id) }}"
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
                                                @endif
                                                @if (Auth::user()->level >= 3 && Auth::user()->level > $item->level)
                                                    <div>
                                                        <button type="button" data-modal-id="{{ $item->id }}"
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
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <x-modal.confirm-delete :id="$item->id" :name="'Data'" :action="route('users.destroy', $item->id)" />
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
            paging: true,
            pageLength: 20,
            language: {
                search: '',
                emptyTable: "Tidak ada data tersedia",
                searchPlaceholder: 'Cari...'
            },
            ordering: false,
            // responsive: true,
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
            // columnDefs: [{
            //     orderable: false,
            //     targets: [3, 4, 5]
            // }, {
            //     className: 'dt-head-center',
            //     targets: [1, 2, 3, 4, 5]
            // }]
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
