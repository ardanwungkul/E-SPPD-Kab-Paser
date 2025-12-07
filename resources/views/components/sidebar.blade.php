@php
    $routeName = request()->route()->getName();

    $route = [
        'transaksi' => ['spt.index', 'sppd.index'],
        'laporan' => [],
        'data-tahunan' => [
            'pegawai.index',
            'pegawai.create',
            'pegawai.edit',
            'anggaran.index',
            'anggaran.create',
            'anggaran.edit',
            'suh.index',
            'suh.create',
            'suh.edit',
            'program.index',
            'program.create',
            'program.edit',
            'kegiatan.index',
            'kegiatan.create',
            'kegiatan.edit',
            'sub-kegiatan.index',
            'sub-kegiatan.create',
            'sub-kegiatan.edit',
            'bidang.index',
            'bidang.create',
            'bidang.edit',
            'sub-bidang.index',
            'sub-bidang.create',
            'sub-bidang.edit',
        ],
        'master-data' => [
            'golongan.index',
            'golongan.create',
            'golongan.edit',
            'tingkat-perjalanan-dinas.index',
            'tingkat-perjalanan-dinas.create',
            'tingkat-perjalanan-dinas.edit',
            'jenis-perjalanan.index',
            'jenis-perjalanan.create',
            'jenis-perjalanan.edit',
            // 'desa.index',
            // 'desa.create',
            // 'desa.edit',
            'kecamatan.index',
            'kecamatan.create',
            'kecamatan.edit',
            'kabupaten-kota.index',
            'kabupaten-kota.create',
            'kabupaten-kota.edit',
            'provinsi.index',
            'provinsi.create',
            'provinsi.edit',
        ],
        'sistem' => ['users.index', 'users.create', 'users.edit', 'config.index', 'kop.surat.index', 'format.index'],
    ];

@endphp
<div class="flex flex-col top-0 left-0 w-60 bg-white border-r h-screen sticky transition-all duration-300 z-30"
    id="sidebar">
    <div class="h-[60px] border-b border-secondary-3 flex-none flex items-center justify-center bg-[#3C8CB4] px-5">
        <p class="font-medium text-lg text-white whitespace-nowrap expanded-sidebar w-full truncate">
            {{ session('preferensi') ? session('preferensi')->appname : '' }}</p>
        <button class="p-2 group" id="expand-button">
            <svg class="w-6 h-6 text-white group-hover:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
            </svg>
        </button>
    </div>
    <div class="overflow-y-auto flex-grow invisible-scrollbar">
        <ul class="flex flex-col py-4 expanded-sidebar">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                        </svg>

                    </span>
                    <span class="ml-2 text-xs tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <div id="accordion-collapse" data-accordion="collapse" data-active-classes="bg-secondary-3 font-medium"
                data-inactive-classes="font-light">
                {{-- Transaksi --}}
                <h2 id="accordion-collapse-heading-transaksi">
                    <button type="button" class="w-full hover:bg-gray-50"
                        data-accordion-target="#accordion-collapse-body-transaksi"
                        aria-expanded="{{ in_array($routeName, $route['transaksi']) ? 'true' : 'false' }}"
                        aria-controls="accordion-collapse-body-transaksi">
                        <li class="p-5 h-9 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 rotate-90 text-secondary-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                                </svg>
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs tracking-wide text-secondary-1">Transaksi</div>
                                </div>
                            </div>
                            <svg data-accordion-icon class="w-2 h-2 rotate-180 shrink-0 text-secondary-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </li>
                    </button>
                </h2>
                <div id="accordion-collapse-body-transaksi" class="hidden bg-secondary-3 border-y border-gray-300"
                    aria-labelledby="accordion-collapse-heading-transaksi">
                    <li>
                        <a href="{{ route('spt.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">SPT</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sppd.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">SPPD</span>
                        </a>
                    </li>
                </div>

                {{-- Laporan --}}
                <h2 id="accordion-collapse-heading-laporan">
                    <button type="button" class="w-full hover:bg-gray-50"
                        data-accordion-target="#accordion-collapse-body-laporan"
                        aria-expanded="{{ in_array($routeName, $route['laporan']) ? 'true' : 'false' }}"
                        aria-controls="accordion-collapse-body-laporan">
                        <li class="p-5 h-9 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-secondary-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 640 640">
                                    <path fill="currentColo"
                                        d="M304 112L192 112C183.2 112 176 119.2 176 128L176 512C176 520.8 183.2 528 192 528L448 528C456.8 528 464 520.8 464 512L464 272L376 272C336.2 272 304 239.8 304 200L304 112zM444.1 224L352 131.9L352 200C352 213.3 362.7 224 376 224L444.1 224zM128 128C128 92.7 156.7 64 192 64L325.5 64C342.5 64 358.8 70.7 370.8 82.7L493.3 205.3C505.3 217.3 512 233.6 512 250.6L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 128z" />
                                </svg>
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs tracking-wide text-secondary-1">Pelaporan</div>
                                </div>
                            </div>
                            <svg data-accordion-icon class="w-2 h-2 rotate-180 shrink-0 text-secondary-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </li>
                    </button>
                </h2>
                <div id="accordion-collapse-body-laporan" class="hidden bg-secondary-3 border-y border-gray-300"
                    aria-labelledby="accordion-collapse-heading-laporan">
                    {{-- <li>
                        <a href="{{ route('spt.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">SPT</span>
                        </a>
                    </li> --}}
                </div>

                {{-- Data Tahunan --}}
                <h2 id="accordion-collapse-heading-data-tahunan">
                    <button type="button" class="w-full hover:bg-gray-50"
                        data-accordion-target="#accordion-collapse-body-data-tahunan"
                        aria-expanded="{{ in_array($routeName, $route['data-tahunan']) ? 'true' : 'false' }}"
                        aria-controls="accordion-collapse-body-data-tahunan">
                        <li class="p-5 h-9 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-secondary-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                                </svg>
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs tracking-wide text-secondary-1">Data Tahunan</div>
                                </div>
                            </div>
                            <svg data-accordion-icon class="w-2 h-2 rotate-180 shrink-0 text-secondary-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </li>
                    </button>
                </h2>
                <div id="accordion-collapse-body-data-tahunan" class="hidden bg-secondary-3 border-y border-gray-300"
                    aria-labelledby="accordion-collapse-heading-data-tahunan">
                    {{-- Pegawai --}}
                    <li>
                        <a href="{{ route('pegawai.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Data Pegawai</span>
                        </a>
                    </li>
                    <div class=" mx-8 border-t border-gray-300"></div>
                    {{-- Bidang/Bagian --}}
                    <li>
                        <a href="{{ route('bidang.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 12v4m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 0v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V8m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                </svg>


                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Data
                                {{ session('config')->judul }}
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sub-bidang.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 12v4m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 0v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V8m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                </svg>

                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Data Sub.
                                {{ session('config')->judul }}</span>
                        </a>
                    </li>
                    <div class=" mx-8 border-t border-gray-300"></div>
                    {{-- Kegiatan --}}
                    <li>
                        <a href="{{ route('program.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 8v8m0-8h8M8 8H6a2 2 0 1 1 2-2v2Zm0 8h8m-8 0H6a2 2 0 1 0 2 2v-2Zm8 0V8m0 8h2a2 2 0 1 1-2 2v-2Zm0-8h2a2 2 0 1 0-2-2v2Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Data Program</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kegiatan.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Data Kegiatan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sub-kegiatan.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Data Sub. Kegiatan</span>
                        </a>
                    </li>
                    <div class=" mx-8 border-t border-gray-300"></div>
                    {{-- Anggaran --}}
                    <li>
                        <a href="{{ route('anggaran.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class=" w-4 h-4" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                    <g id="Outline">
                                        <g data-name="Outline" id="Outline-2">
                                            <path fill="currentColor"
                                                d="M22,41.192V33.885h4.027l5.7,7.893a1,1,0,0,0,1.621-1.171l-5.037-6.973a6.535,6.535,0,0,0-1.774-12.826H21a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0Zm9.077-13.846a4.544,4.544,0,0,1-4.539,4.539H22V22.808h4.538A4.544,4.544,0,0,1,31.077,27.346Z" />
                                            <path fill="currentColor"
                                                d="M37.615,26.346a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0V36.654h2.231a5.154,5.154,0,1,0,0-10.308ZM44,31.5a3.158,3.158,0,0,1-3.154,3.154H38.615V28.346h2.231A3.158,3.158,0,0,1,44,31.5Z" />
                                            <path fill="currentColor"
                                                d="M32,2A30,30,0,1,0,62,32,30.034,30.034,0,0,0,32,2Zm0,58A28,28,0,1,1,60,32,28.032,28.032,0,0,1,32,60Z" />
                                            <path fill="currentColor"
                                                d="M49.655,16.793a3.172,3.172,0,1,0-3.173,3.172,3.138,3.138,0,0,0,1.264-.266A19.994,19.994,0,0,1,22.691,49.707a1,1,0,1,0-.931,1.769A21.986,21.986,0,0,0,49.229,18.351,3.127,3.127,0,0,0,49.655,16.793Zm-4.344,0a1.172,1.172,0,1,1,1.171,1.172A1.172,1.172,0,0,1,45.311,16.793Z" />
                                            <path fill="currentColor"
                                                d="M16.793,44.035a3.157,3.157,0,0,0-.692.081A19.779,19.779,0,0,1,12,32,20.023,20.023,0,0,1,32,12a19.811,19.811,0,0,1,8.463,1.874,1,1,0,0,0,.848-1.812A21.989,21.989,0,0,0,14.39,45.16a3.141,3.141,0,0,0-.769,2.047,3.173,3.173,0,1,0,3.172-3.172Zm0,4.344a1.172,1.172,0,1,1,1.173-1.172A1.172,1.172,0,0,1,16.793,48.379Z" />
                                        </g>
                                    </g>
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Anggaran Tahunan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('suh.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Standar Uang Harian</span>
                        </a>
                    </li>
                </div>

                {{-- Referensi Data --}}
                <h2 id="accordion-collapse-heading-master-data">
                    <button type="button" class="w-full"
                        data-accordion-target="#accordion-collapse-body-master-data"
                        aria-expanded="{{ in_array($routeName, $route['master-data']) ? 'true' : 'false' }}"
                        aria-controls="accordion-collapse-body-master-data">
                        <li class="p-5 h-9 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-secondary-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 6c0 1.657-3.134 3-7 3S5 7.657 5 6m14 0c0-1.657-3.134-3-7-3S5 4.343 5 6m14 0v6M5 6v6m0 0c0 1.657 3.134 3 7 3s7-1.343 7-3M5 12v6c0 1.657 3.134 3 7 3s7-1.343 7-3v-6" />
                                </svg>

                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs tracking-wide text-secondary-1">Referensi Data</div>
                                </div>
                            </div>
                            <svg data-accordion-icon class="w-2 h-2 rotate-180 shrink-0 text-secondary-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </li>
                    </button>
                </h2>
                <div id="accordion-collapse-body-master-data" class="hidden bg-secondary-3 border-y border-gray-300"
                    aria-labelledby="accordion-collapse-heading-master-data">
                    <li>
                        <a href="{{ route('golongan.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                                </svg>


                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Pangkat/Golongan</span>
                        </a>
                    </li>
                    <div class=" mx-8 border-t border-gray-300"></div>

                    {{-- <li>
                        <a href="{{ route('tingkat-perjalanan-dinas.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                                </svg>

                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Tingkat Perjalanan Dinas</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('jenis-perjalanan.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M5 19h4m6 0h4m-6.9627-4.3843V8.63418L17 5.93918m-4.9298 2.66213L7.04175 5.93919M12 2.99719l5.033 2.90583v5.81168L12 14.6205l-5.03303-2.9058V5.90302L12 2.99719ZM14 19c0 1.1045-.8954 2-2 2s-2-.8955-2-2c0-1.1046.8954-2 2-2s2 .8954 2 2Z" />
                                </svg>

                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Referensi Jenis</span>
                        </a>
                    </li>
                    <div class=" mx-8 border-t border-gray-300"></div>

                    <li>
                        <a href="{{ route('provinsi.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Provinsi</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kabupaten-kota.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Kabupaten/Kota</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kecamatan.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Kecamatan</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="{{ route('desa.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Desa</span>
                        </a>
                    </li> --}}
                </div>

                {{-- Pengaturan --}}
                <h2 id="accordion-collapse-heading-sistem">
                    <button type="button" class="w-full hover:bg-gray-50"
                        data-accordion-target="#accordion-collapse-body-sistem"
                        aria-expanded="{{ in_array($routeName, $route['sistem']) ? 'true' : 'false' }}"
                        aria-controls="accordion-collapse-body-sistem">
                        <li class="p-5 h-9 flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </svg>
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs tracking-wide text-secondary-1">Pengaturan</div>
                                </div>
                            </div>
                            <svg data-accordion-icon class="w-2 h-2 rotate-180 shrink-0 text-secondary-1"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 5 5 1 1 5" />
                            </svg>
                        </li>
                    </button>
                </h2>
                <div id="accordion-collapse-body-sistem" class="hidden bg-secondary-3 border-y border-gray-300"
                    aria-labelledby="accordion-collapse-heading-sistem">
                    <li>
                        <a href="{{ route('users.index') }}"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z" />
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Otorisasi Pengguna</span>
                        </a>
                    </li>
                    @if (Auth::user()->level >= 3)
                        <li>
                            <a href="{{ route('config.index') }}"
                                class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-xs tracking-wide truncate">Pengaturan Sistem</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('format.index') }}"
                                class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-xs tracking-wide truncate">Format Nomor</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kop.surat.index') }}"
                                class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6 pl-3">
                                <span class="inline-flex justify-center items-center ml-4">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                    </svg>
                                </span>
                                <span class="ml-2 text-xs tracking-wide truncate">Kop Surat</span>
                            </a>
                        </li>
                    @endif
                </div>
            </div>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                this.closest('form').submit();"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                </path>
                            </svg>
                        </span>
                        <span class="ml-2 text-xs tracking-wide truncate">Keluar</span>
                    </a>
                </form>
            </li>
        </ul>
        <div class="collapse-sidebar hidden">
            <ul class="flex flex-col py-4">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 6.025A7.5 7.5 0 1 0 17.975 14H10V6.025Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13.5 3c-.169 0-.334.014-.5.025V11h7.975c.011-.166.025-.331.025-.5A7.5 7.5 0 0 0 13.5 3Z" />
                            </svg>
                        </span>
                    </a>
                </li>
                <li>
                    <button type="button" data-dropdown-placement="left-start"
                        data-dropdown-toggle="dropdownHoverTransaksi" data-dropdown-trigger="hover"
                        data-dropdown-delay="0" data-dropdown-offset-distance="0"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4 rotate-90 text-secondary-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M8 20V7m0 13-4-4m4 4 4-4m4-12v13m0-13 4 4m-4-4-4 4" />
                            </svg>
                        </span>
                    </button>
                    <div id="dropdownHoverTransaksi"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-r-lg shadow-sm w-60 border">
                        <ul class=" text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                            <li class="px-2">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs font-light tracking-wide text-gray-500">Transaksi</div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('spt.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                        </svg>


                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">SPT</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sppd.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                                d="M10 3v4a1 1 0 0 1-1 1H5m14-4v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                                        </svg>


                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">SPPD</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button type="button" data-dropdown-placement="left-start"
                        data-dropdown-toggle="dropdownHoverlaporan" data-dropdown-trigger="hover"
                        data-dropdown-delay="0" data-dropdown-offset-distance="0"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4 text-secondary-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 640 640">
                                <path fill="currentColo"
                                    d="M304 112L192 112C183.2 112 176 119.2 176 128L176 512C176 520.8 183.2 528 192 528L448 528C456.8 528 464 520.8 464 512L464 272L376 272C336.2 272 304 239.8 304 200L304 112zM444.1 224L352 131.9L352 200C352 213.3 362.7 224 376 224L444.1 224zM128 128C128 92.7 156.7 64 192 64L325.5 64C342.5 64 358.8 70.7 370.8 82.7L493.3 205.3C505.3 217.3 512 233.6 512 250.6L512 512C512 547.3 483.3 576 448 576L192 576C156.7 576 128 547.3 128 512L128 128z" />
                            </svg>
                        </span>
                    </button>
                    <div id="dropdownHoverlaporan"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-r-lg shadow-sm w-60 border">
                        <ul class=" text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                            <li class="px-2">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs font-light tracking-wide text-gray-500">Pelaporan</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button type="button" data-dropdown-placement="left-start"
                        data-dropdown-toggle="dropdownHoverDataTahunan" data-dropdown-trigger="hover"
                        data-dropdown-delay="0" data-dropdown-offset-distance="0"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4 text-secondary-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
                            </svg>
                        </span>
                    </button>
                    <div id="dropdownHoverDataTahunan"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-r-lg shadow-sm w-60 border">
                        <ul class=" text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                            <li class="px-2">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs font-light tracking-wide text-gray-500">Data Tahunan</div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('pegawai.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
                                                clip-rule="evenodd" />
                                        </svg>

                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Data Pegawai</span>
                                </a>
                            </li>
                            <div class=" mx-2 border-t border-gray-300"></div>
                            <li>
                                <a href="{{ route('bidang.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 12v4m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 0v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V8m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                        </svg>


                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Data
                                        {{ session('config')->judul }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sub-bidang.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 12v4m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4ZM8 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 0v2a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2V8m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Data Sub
                                        {{ session('config')->judul }}</span>
                                </a>
                            </li>
                            <div class=" mx-2 border-t border-gray-300"></div>
                            <li>
                                <a href="{{ route('program.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M8 8v8m0-8h8M8 8H6a2 2 0 1 1 2-2v2Zm0 8h8m-8 0H6a2 2 0 1 0 2 2v-2Zm8 0V8m0 8h2a2 2 0 1 1-2 2v-2Zm0-8h2a2 2 0 1 0-2-2v2Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Referensi Program</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kegiatan.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Referensi Kegiatan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('sub-kegiatan.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Referensi Sub. Kegiatan</span>
                                </a>
                            </li>
                            <div class=" mx-2 border-t border-gray-300"></div>
                            <li>
                                <a href="{{ route('anggaran.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class=" w-4 h-4" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                            <g id="Outline">
                                                <g data-name="Outline" id="Outline-2">
                                                    <path fill="currentColor"
                                                        d="M22,41.192V33.885h4.027l5.7,7.893a1,1,0,0,0,1.621-1.171l-5.037-6.973a6.535,6.535,0,0,0-1.774-12.826H21a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0Zm9.077-13.846a4.544,4.544,0,0,1-4.539,4.539H22V22.808h4.538A4.544,4.544,0,0,1,31.077,27.346Z" />
                                                    <path fill="currentColor"
                                                        d="M37.615,26.346a1,1,0,0,0-1,1V41.192a1,1,0,0,0,2,0V36.654h2.231a5.154,5.154,0,1,0,0-10.308ZM44,31.5a3.158,3.158,0,0,1-3.154,3.154H38.615V28.346h2.231A3.158,3.158,0,0,1,44,31.5Z" />
                                                    <path fill="currentColor"
                                                        d="M32,2A30,30,0,1,0,62,32,30.034,30.034,0,0,0,32,2Zm0,58A28,28,0,1,1,60,32,28.032,28.032,0,0,1,32,60Z" />
                                                    <path fill="currentColor"
                                                        d="M49.655,16.793a3.172,3.172,0,1,0-3.173,3.172,3.138,3.138,0,0,0,1.264-.266A19.994,19.994,0,0,1,22.691,49.707a1,1,0,1,0-.931,1.769A21.986,21.986,0,0,0,49.229,18.351,3.127,3.127,0,0,0,49.655,16.793Zm-4.344,0a1.172,1.172,0,1,1,1.171,1.172A1.172,1.172,0,0,1,45.311,16.793Z" />
                                                    <path fill="currentColor"
                                                        d="M16.793,44.035a3.157,3.157,0,0,0-.692.081A19.779,19.779,0,0,1,12,32,20.023,20.023,0,0,1,32,12a19.811,19.811,0,0,1,8.463,1.874,1,1,0,0,0,.848-1.812A21.989,21.989,0,0,0,14.39,45.16a3.141,3.141,0,0,0-.769,2.047,3.173,3.173,0,1,0,3.172-3.172Zm0,4.344a1.172,1.172,0,1,1,1.173-1.172A1.172,1.172,0,0,1,16.793,48.379Z" />
                                                </g>
                                            </g>
                                        </svg>

                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Anggaran Tahunan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('suh.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                                        </svg>

                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Standar Uang Harian</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <button type="button" data-dropdown-placement="left-start"
                        data-dropdown-toggle="dropdownHoverMasterData" data-dropdown-trigger="hover"
                        data-dropdown-delay="0" data-dropdown-offset-distance="0"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4 text-secondary-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 6c0 1.657-3.134 3-7 3S5 7.657 5 6m14 0c0-1.657-3.134-3-7-3S5 4.343 5 6m14 0v6M5 6v6m0 0c0 1.657 3.134 3 7 3s7-1.343 7-3M5 12v6c0 1.657 3.134 3 7 3s7-1.343 7-3v-6" />
                            </svg>
                        </span>
                    </button>
                    <div id="dropdownHoverMasterData"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-r-lg shadow-sm w-60 border">
                        <ul class=" text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                            <li class="px-2">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs font-light tracking-wide text-gray-500">Referensi Data</div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('golongan.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                                        </svg>


                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Pangkat/Golongan</span>
                                </a>
                            </li>
                            <div class=" mx-2 border-t border-gray-300"></div>
                            {{-- <li>
                                <a href="{{ route('tingkat-perjalanan-dinas.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                                        </svg>

                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Tingkat Perjalanan Dinas</span>
                                </a>
                            </li> --}}
                            <li>
                                <a href="{{ route('jenis-perjalanan.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M5 19h4m6 0h4m-6.9627-4.3843V8.63418L17 5.93918m-4.9298 2.66213L7.04175 5.93919M12 2.99719l5.033 2.90583v5.81168L12 14.6205l-5.03303-2.9058V5.90302L12 2.99719ZM14 19c0 1.1045-.8954 2-2 2s-2-.8955-2-2c0-1.1046.8954-2 2-2s2 .8954 2 2Z" />
                                        </svg>

                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Referensi Jenis</span>
                                </a>
                            </li>
                            <div class=" mx-2 border-t border-gray-300"></div>
                            <li>
                                <a href="{{ route('provinsi.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Provinsi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kabupaten-kota.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Kabupaten/Kota</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kecamatan.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Kecamatan</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('desa.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M4.37 7.657c2.063.528 2.396 2.806 3.202 3.87 1.07 1.413 2.075 1.228 3.192 2.644 1.805 2.289 1.312 5.705 1.312 6.705M20 15h-1a4 4 0 0 0-4 4v1M8.587 3.992c0 .822.112 1.886 1.515 2.58 1.402.693 2.918.351 2.918 2.334 0 .276 0 2.008 1.972 2.008 2.026.031 2.026-1.678 2.026-2.008 0-.65.527-.9 1.177-.9H20M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Desa</span>
                                </a>
                            </li> --}}
                        </ul>
                    </div>
                </li>
                <li>
                    <button type="button" data-dropdown-placement="left-start"
                        data-dropdown-toggle="dropdownHoverSistem" data-dropdown-trigger="hover"
                        data-dropdown-delay="0" data-dropdown-offset-distance="0"
                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-4 h-4 text-secondary-1" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </span>
                    </button>
                    <div id="dropdownHoverSistem"
                        class="z-30 hidden bg-white divide-y divide-gray-100 rounded-r-lg shadow-sm w-60 border">
                        <ul class=" text-sm text-gray-700" aria-labelledby="dropdownHoverButton">
                            <li class="px-2">
                                <div class="flex flex-row items-center h-8">
                                    <div class="text-xs font-light tracking-wide text-gray-500">Pengaturan</div>
                                </div>
                            </li>
                            <li>
                                <a href="{{ route('users.index') }}"
                                    class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                    <span class="inline-flex justify-center items-center ml-2">
                                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5.005 10.19a1 1 0 0 1 1 1v.233l5.998 3.464L18 11.423v-.232a1 1 0 1 1 2 0V12a1 1 0 0 1-.5.866l-6.997 4.042a1 1 0 0 1-1 0l-6.998-4.042a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1ZM5 15.15a1 1 0 0 1 1 1v.232l5.997 3.464 5.998-3.464v-.232a1 1 0 1 1 2 0v.81a1 1 0 0 1-.5.865l-6.998 4.042a1 1 0 0 1-1 0L4.5 17.824a1 1 0 0 1-.5-.866v-.81a1 1 0 0 1 1-1Z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M12.503 2.134a1 1 0 0 0-1 0L4.501 6.17A1 1 0 0 0 4.5 7.902l7.002 4.047a1 1 0 0 0 1 0l6.998-4.04a1 1 0 0 0 0-1.732l-6.997-4.042Z" />
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-xs tracking-wide truncate">Otorisasi Pengguna</span>
                                </a>
                            </li>
                            @if (Auth::user()->level >= 3)
                                <li>
                                    <a href="{{ route('config.index') }}"
                                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                        <span class="inline-flex justify-center items-center ml-2">
                                            <svg class="w-4 h-4" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            </svg>

                                        </span>
                                        <span class="ml-2 text-xs tracking-wide truncate">Pengaturan Sistem</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('format.index') }}"
                                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                        <span class="inline-flex justify-center items-center ml-2">
                                            <svg class="w-4 h-4" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            </svg>

                                        </span>
                                        <span class="ml-2 text-xs tracking-wide truncate">Format Nomor</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('kop.surat.index') }}"
                                        class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                                        <span class="inline-flex justify-center items-center ml-2">
                                            <svg class="w-4 h-4" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            </svg>

                                        </span>
                                        <span class="ml-2 text-xs tracking-wide truncate">Kop Surat</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    this.closest('form').submit();"
                            class="relative flex flex-row items-center h-9 focus:outline-none hover:bg-gray-50 text-secondary-1 hover:text-gray-800 border-l-4 border-transparent hover:border-secondary-1 pr-6">
                            <span class="inline-flex justify-center items-center ml-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                    </path>
                                </svg>
                            </span>
                            <span class="ml-2 text-xs tracking-wide truncate">Logout</span>
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    let expandedSidebar = true;
    const sidebar = document.getElementById('sidebar');
    document.getElementById('expand-button').addEventListener('click', function() {
        if (expandedSidebar) {
            expandSidebar()
        } else {
            collapseSidebar()
        }
    });

    function expandSidebar() {
        sidebar.style.width = '240px';
        document.querySelectorAll(".expanded-sidebar").forEach(element => {
            element.classList.remove("hidden-with-transition");
            setTimeout(function() {
                element.classList.remove("hidden");
            }, 100);
        });
        document.querySelectorAll(".collapse-sidebar").forEach(element => {
            element.classList.add("hidden-with-transition");
            setTimeout(function() {
                element.classList.add("hidden");
            }, 100);
        });

        expandedSidebar = false;
    }

    function collapseSidebar() {
        sidebar.style.width = '60px';
        document.querySelectorAll(".expanded-sidebar").forEach(element => {
            element.classList.add("hidden-with-transition");
            setTimeout(function() {
                element.classList.add("hidden");
            }, 100);
        });
        document.querySelectorAll(".collapse-sidebar").forEach(element => {
            element.classList.remove("hidden-with-transition");
            setTimeout(function() {
                element.classList.remove("hidden");
            }, 100);
        });
        expandedSidebar = true;
    }

    function checkScreenSize() {
        if (window.innerWidth >= 1080) {
            expandSidebar();
        } else {
            collapseSidebar();
        }
    }

    checkScreenSize();

    window.addEventListener("resize", checkScreenSize);
</script>
