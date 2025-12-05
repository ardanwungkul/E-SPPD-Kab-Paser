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
                                            <td colspan="5"
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
                                                <td colspan="5"
                                                    class="text-start px-3 py-2 border border-secondary-4 font-semibold">
                                                    {{ $sub_bidang->uraian }}
                                                </td>
                                            </tr>
                                            <tr class="bg-secondary-3">
                                                <td class="px-3 py-2 border border-secondary-4 font-semibold">Kode Rekening
                                                </td>
                                                <td class="px-3 py-2 border border-secondary-4 font-semibold">Program /
                                                    Kegiatan / Sub. Kegiatan
                                                </td>
                                                <td
                                                    class="text-center px-3 py-2 border border-secondary-4 font-semibold">
                                                    Dalam Daerah</td>
                                                <td
                                                    class="text-center px-3 py-2 border border-secondary-4 font-semibold">
                                                    Luar Daerah Dalam Provinsi</td>
                                                <td
                                                    class="text-center px-3 py-2 border border-secondary-4 font-semibold">
                                                    Luar Daerah Luar Provinsi</td>
                                                <td class="border"></td>
                                            </tr>
                                            {{-- Program --}}
                                            @foreach ($sub_bidang->anggaran->groupBy('sub_kegiatan.kegiatan.program.kdprog') as $anggaranByProgram)
                                                <tr>
                                                    <td class="text-start px-3 py-2 border font-semibold">
                                                        {{ $anggaranByProgram->first()->sub_kegiatan->kegiatan->program->kdprog }}
                                                    </td>
                                                    <td class="text-start px-3 py-2 border font-semibold">
                                                        {{ $anggaranByProgram->first()->sub_kegiatan->kegiatan->program->uraian }}
                                                    </td>
                                                    <td class="text-center px-3 py-2 border font-semibold"
                                                        colspan="3">
                                                        @php
                                                            $totalProgPagu =
                                                                $anggaranByProgram->sum('rp_pagu1') +
                                                                $anggaranByProgram->sum('rp_pagu2') +
                                                                $anggaranByProgram->sum('rp_pagu3');
                                                        @endphp
                                                        <div class=" w-full flex items-center justify-between">
                                                            <p>Rp.</p>
                                                            <p>{{ number_format($totalProgPagu, 0, ',', '.') }}
                                                            </p>
                                                        </div>
                                                    </td>
                                                    @if ($anggaranByProgram->groupBy('sub_kegiatan.kegiatan.kdgiat')->count(0))
                                                        <td class="border" rowspan="2"></td>
                                                    @endif
                                                </tr>
                                                {{-- Kegiatan --}}
                                                @foreach ($anggaranByProgram->groupBy('sub_kegiatan.kegiatan.kdgiat') as $anggaranByKegiatan)
                                                    <tr>
                                                        <td class="text-start px-3 py-2 border font-medium">
                                                            {{ $anggaranByKegiatan->first()->sub_kegiatan->kegiatan->kdgiat }}
                                                        </td>
                                                        <td class="text-start px-3 py-2 border font-medium">
                                                            {{ $anggaranByKegiatan->first()->sub_kegiatan->kegiatan->uraian }}
                                                        </td>
                                                        <td class="text-center px-3 py-2 border font-semibold"
                                                            colspan="3">
                                                            @php
                                                                $totalGiatPagu =
                                                                    $anggaranByKegiatan->sum('rp_pagu1') +
                                                                    $anggaranByKegiatan->sum('rp_pagu2') +
                                                                    $anggaranByKegiatan->sum('rp_pagu3');
                                                            @endphp

                                                            <div class=" w-full flex items-center justify-between">
                                                                <p>Rp.</p>
                                                                <p>{{ number_format($totalGiatPagu, 0, ',', '.') }}</p>
                                                            </div>
                                                        </td>
                                                        @if (!$loop->first)
                                                            <td class="border"></td>
                                                        @endif
                                                    </tr>
                                                    {{-- Sub Kegiatan --}}
                                                    @foreach ($anggaranByKegiatan->groupBy('sub_kegiatan.kdsub') as $anggaranBySubKegiatan)
                                                        <tr>
                                                            <td class="text-start px-3 py-2 border font-normal">
                                                                {{ $anggaranBySubKegiatan->first()->sub_kegiatan->kdsub }}
                                                            </td>
                                                            <td class="px-3 py-2 border font-normal">
                                                                {{ $anggaranBySubKegiatan->first()->sub_kegiatan->uraian }}
                                                            </td>

                                                            {{-- Anggaran --}}
                                                            <td class="text-center px-3 py-2 border font-normal">
                                                                <div class=" w-full flex items-center justify-between">
                                                                    <p>Rp.</p>
                                                                    <p>{{ number_format($anggaranBySubKegiatan->first()->rp_pagu1, 0, ',', '.') }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                            <td class="text-center px-3 py-2 border font-normal">
                                                                <div class=" w-full flex items-center justify-between">
                                                                    <p>Rp.</p>
                                                                    <p>{{ number_format($anggaranBySubKegiatan->first()->rp_pagu2, 0, ',', '.') }}
                                                                    </p>
                                                                </div>
                                                            </td>
                                                            <td class="text-center px-3 py-2 border font-normal">
                                                                <div class=" w-full flex items-center justify-between">
                                                                    <p>Rp.</p>
                                                                    <p>{{ number_format($anggaranBySubKegiatan->first()->rp_pagu3, 0, ',', '.') }}
                                                                    </p>
                                                                </div>
                                                            </td>

                                                            {{-- Option --}}
                                                            <td class=" border">
                                                                <div
                                                                    class="flex justify-center items-center gap-3 px-2">
                                                                    <div>
                                                                        <div>
                                                                            <a href="{{ route('anggaran.edit', $anggaranBySubKegiatan->first()->id) }}"
                                                                                class="flex items-center gap-1 bg-secondary-3 px-3 py-1 rounded-lg text-secondary-2 hover:bg-opacity-90 border border-secondary-4 shadow-lg">
                                                                                <svg class="w-4 h-4" aria-hidden="true"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="24" height="24"
                                                                                    fill="none" viewBox="0 0 24 24">
                                                                                    <path stroke="currentColor"
                                                                                        stroke-linecap="round"
                                                                                        stroke-linejoin="round"
                                                                                        stroke-width="2"
                                                                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                                                </svg>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                        <tr>
                                            <td colspan="{{ 5 }}">
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
