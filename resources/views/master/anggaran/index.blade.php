<x-app-layout>
    <x-slot name="header">
        Data Anggaran Tahunan
    </x-slot>

    <x-container>
        <x-slot name="content">

            <div>
                <div class="flex justify-between items-center mb-12 md:mb-4">
                    <a href="{{ route('anggaran.create') }}"
                        class="bg-secondary-3 text-secondary-2 rounded-lg px-3 py-2 text-xs border border-secondary-4 shadow-lg flex gap-1 items-center justify-center whitespace-nowrap w-min font-medium">
                        <svg viewBox="0 0 24 24" fill="none" class="w-3 h-3 stroke-secondary-2"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 12H20M12 4V20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                        </svg>
                        <p>
                            Tambah
                        </p>
                    </a>
                    <form action="{{ route('anggaran.index') }}" method="GET">
                        <input type="search" class="rounded-lg p-2 text-xs" name="q" value="{{ request()->q }}"
                            placeholder="Cari...">
                    </form>
                </div>
                <div class="relative">
                    <div class="overflow-hidden">
                        <table class="text-sm hover stripe row-border w-full">
                            <tbody class="text-secondary-2 text-xs">
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
                                                Sub {{ session('config')->judul }}
                                            </td>
                                            <td colspan="{{ 1 + $jenis_sppd->count() }}"
                                                class="text-start px-3 py-2 border border-secondary-4 font-semibold">
                                                {{ $sub_bidang->uraian }}
                                            </td>
                                        </tr>
                                        <tr class="bg-secondary-3">
                                            <td class="px-3 py-2 border border-secondary-4 font-semibold">Rekening</td>
                                            <td class="px-3 py-2 border border-secondary-4 font-semibold">Program /
                                                Kegiatan
                                            </td>
                                            @foreach ($jenis_sppd as $jenis)
                                                <td
                                                    class="text-center px-3 py-2 border border-secondary-4 font-semibold">
                                                    {{ $jenis->uraian }}</td>
                                            @endforeach
                                        </tr>
                                        {{-- Program --}}
                                        @foreach ($sub_bidang->anggaran->groupBy('sub_kegiatan.kegiatan.program.id') as $anggaranByProgram)
                                            <tr>
                                                <td class="text-start px-3 py-2 border font-semibold">
                                                    {{ $anggaranByProgram->first()->sub_kegiatan->kegiatan->program->kode }}
                                                </td>
                                                <td class="text-start px-3 py-2 border font-semibold">
                                                    {{ $anggaranByProgram->first()->sub_kegiatan->kegiatan->program->uraian }}
                                                </td>
                                                <td class="text-center px-3 py-2 border font-semibold"
                                                    colspan="{{ $jenis_sppd->count() }}">
                                                    Rp.
                                                    {{ number_format($anggaranByProgram->where('sub_kegiatan.kegiatan.program.id', $anggaranByProgram->first()->sub_kegiatan->kegiatan->program->id)->sum('rp_pagu'), 0, ',', '.') }}
                                                </td>
                                            </tr>
                                            {{-- Kegiatan --}}
                                            @foreach ($anggaranByProgram->groupBy('sub_kegiatan.kegiatan.id') as $anggaranByKegiatan)
                                                <tr>
                                                    <td class="text-start px-3 py-2 border font-medium">
                                                        {{ $anggaranByKegiatan->first()->sub_kegiatan->kegiatan->formattedKode }}
                                                    </td>
                                                    <td class="text-start px-3 py-2 border font-medium">
                                                        {{ $anggaranByKegiatan->first()->sub_kegiatan->kegiatan->uraian }}
                                                    </td>
                                                    <td class="text-center px-3 py-2 border font-semibold"
                                                        colspan="{{ $jenis_sppd->count() }}">
                                                        Rp.
                                                        {{ number_format($anggaranByKegiatan->where('sub_kegiatan.kegiatan.id', $anggaranByKegiatan->first()->sub_kegiatan->kegiatan->id)->sum('rp_pagu'), 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                                {{-- Sub Kegiatan --}}
                                                @foreach ($anggaranByKegiatan->groupBy('sub_kegiatan.id') as $anggaranBySubKegiatan)
                                                    <tr>
                                                        <td class="text-start px-3 py-2 border font-normal">
                                                            {{ $anggaranBySubKegiatan->first()->sub_kegiatan->formattedKode }}
                                                        </td>
                                                        <td class="px-3 py-2 border font-normal">
                                                            {{ $anggaranBySubKegiatan->first()->sub_kegiatan->uraian }}
                                                        </td>
                                                        {{-- Anggaran --}}
                                                        @foreach ($jenis_sppd as $jenis)
                                                            <td class="text-center px-3 py-2 border font-normal">
                                                                @if ($anggaranBySubKegiatan->where('jenis_sppd_id', $jenis->id)->count() > 0)
                                                                    <a class="hover:text-blue-500 hover:underline"
                                                                        href="{{ route('anggaran.edit', $anggaranBySubKegiatan->where('jenis_sppd_id', $jenis->id)->first()->id) }}">
                                                                        Rp.
                                                                        {{ number_format($anggaranBySubKegiatan->where('jenis_sppd_id', $jenis->id)->sum('rp_pagu'), 0, ',', '.') }}
                                                                    </a>
                                                                @else
                                                                    <p>Rp. 0</p>
                                                                @endif
                                                            </td>
                                                        @endforeach
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-slot>
    </x-container>
</x-app-layout>
