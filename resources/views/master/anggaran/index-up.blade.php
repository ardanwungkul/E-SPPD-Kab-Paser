<x-app-layout>
    <x-slot name="header">
        Data Anggaran Tahunan
    </x-slot>

    <x-container>
        <x-slot name="content">

            <div>
                <div class="flex flex-col md:flex-row justify-between md:items-center mb-4 gap-4 md:gap-0">
                    <x-button.add-button :route="route('anggaran.create')" />

                    <form action="{{ route('anggaran.index') }}" method="GET" class="w-full md:w-auto">
                        <input type="search" class="rounded-lg p-2 text-xs w-full" name="q"
                            value="{{ request()->q }}" placeholder="Cari...">
                    </form>
                </div>
                <div class="relative">
                    <div class="md:overflow-hidden overflow-x-scroll md:overflow-x-hidden">
                        <table class=" text-xs md:text-sm hover stripe row-border w-full">
                            <tbody class="text-secondary-2 text-xs">
                                @if ($data->count() > 0)
                                    @foreach ($data as $item)
                                        {{-- Bidang --}}
                                        <tr class="bg-secondary-3">
                                            <td colspan="1"
                                                class="text-start px-3 py-2 border border-secondary-4 font-semibold">
                                                {{ session('config')->judul }}
                                            </td>
                                            <td colspan="{{ 1 + $jenis_sppd->count() }}"
                                                class="text-start px-3 py-2 border border-secondary-4 font-semibold">
                                                {{ $item->uraian }}
                                            </td>
                                        </tr>
                                        {{-- Sub Bidang --}}
                                        @foreach ($item->sub_bidang as $sub_bidang)
                                            <tr class="bg-secondary-3">
                                                <td colspan="1"
                                                    class="text-start px-3 py-2 border border-secondary-4 font-semibold">
                                                    Sub. {{ session('config')->judul }}
                                                </td>
                                                <td colspan="{{ 1 + $jenis_sppd->count() }}"
                                                    class="text-start px-3 py-2 border border-secondary-4 font-semibold">
                                                    {{ $sub_bidang->uraian }}
                                                </td>
                                            </tr>
                                            <tr class="bg-secondary-3">
                                                <td class="px-3 py-2 border border-secondary-4 font-semibold">Rekening
                                                </td>
                                                <td class="px-3 py-2 border border-secondary-4 font-semibold">Program /
                                                    Kegiatan
                                                </td>
                                                <td
                                                    class="text-center px-3 py-2 border border-secondary-4 font-semibold">
                                                    Dalam Daerah
                                                </td>
                                                <td
                                                    class="text-center px-3 py-2 border border-secondary-4 font-semibold">
                                                    Luar Daerah Dalam Provinsi
                                                </td>
                                                <td
                                                    class="text-center px-3 py-2 border border-secondary-4 font-semibold">
                                                    Luar Daerah Luar Provinsi
                                                </td>
                                            </tr>
                                            {{-- Program --}}
                                            @foreach ($sub_bidang->sub_kegiatan->groupBy('kegiatan.program.id') as $grouped)
                                                <tr>
                                                    <td class="text-start px-3 py-2 border font-semibold">
                                                        {{ $grouped->first()->kegiatan->program->kdprog }}
                                                    </td>

                                                    <td class="text-start px-3 py-2 border font-semibold">
                                                        {{ $grouped->first()->kegiatan->program->uraian }}
                                                    </td>

                                                    <td class="text-center px-3 py-2 border font-semibold"
                                                        colspan="3">
                                                        Rp.
                                                        {{ number_format(
                                                            $grouped->sum(function ($item) {
                                                                return ($item->rp_pagu1 ?? 0) + ($item->rp_pagu2 ?? 0) + ($item->rp_pagu3 ?? 0);
                                                            }),
                                                            0,
                                                            ',',
                                                            '.',
                                                        ) }}
                                                    </td>
                                                </tr>
                                                {{-- Kegiatan --}}
                                                @foreach ($grouped->groupBy('kegiatan.kdgiat') as $kegiatanGroup)
                                                    <tr>
                                                        <td class="text-start px-3 py-2 border font-medium">
                                                            {{ $kegiatanGroup->first()->kegiatan->kdgiat }}
                                                        </td>
                                                        <td class="text-start px-3 py-2 border font-medium">
                                                            {{ $kegiatanGroup->first()->kegiatan->uraian }}
                                                        </td>
                                                        <td class="text-center px-3 py-2 border font-semibold"
                                                            colspan="3">
                                                            Rp.
                                                            {{ number_format(
                                                                $kegiatanGroup->sum(function ($item) {
                                                                    return ($item->rp_pagu1 ?? 0) + ($item->rp_pagu2 ?? 0) + ($item->rp_pagu3 ?? 0);
                                                                }),
                                                                0,
                                                                ',',
                                                                '.',
                                                            ) }}

                                                        </td>
                                                    </tr>

                                                    {{-- Sub Kegiatan --}}
                                                    @foreach ($kegiatanGroup->groupBy('kdsub') as $subKegiatanGroup)
                                                        <tr>
                                                            <td class="text-start px-3 py-2 border font-normal">
                                                                {{ $subKegiatanGroup->first()->kdsub }}
                                                            </td>
                                                            <td class="px-3 py-2 border font-normal">
                                                                {{ $subKegiatanGroup->first()->uraian }}
                                                            </td>
                                                            <td class="text-center px-3 py-2 border font-normal">
                                                                Rp.
                                                                {{ number_format($subKegiatanGroup->first()->rp_pagu1, 0, ',', '.') }}
                                                            </td>
                                                            <td class="text-center px-3 py-2 border font-normal">
                                                                Rp.
                                                                {{ number_format($subKegiatanGroup->first()->rp_pagu2, 0, ',', '.') }}
                                                            </td>
                                                            <td class="text-center px-3 py-2 border font-normal">
                                                                Rp.
                                                                {{ number_format($subKegiatanGroup->first()->rp_pagu3, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                            <tr>
                                                <td colspan="{{ 2 + $jenis_sppd->count() }}">
                                                    <br>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="{{ 2 + $jenis_sppd->count() }}">
                                                <br>
                                                <br>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="bg-secondary-3">
                                        <td class="px-3 py-2">
                                            <p class="text-sm text-center">
                                                Tidak Ada Data Tersedia
                                            </p>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-container>
</x-app-layout>
