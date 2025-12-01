<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @if (env('APP_DEPLOY') == true)
        <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
        <link rel="stylesheet" href="{{ asset('build/assets/app2.css') }}">
    @else
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="h-screen w-full md:p-20 bg-jar-auth flex items-center justify-center relative">
        @if (count($errors) > 0)
            <div class="fixed bottom-5 right-5 z-40">
                @foreach ($errors->all() as $error)
                    <div id="toast-error-{{ $loop->index }}"
                        class="flex items-center gap-2 w-min p-4 text-gray-500 bg-white rounded-lg shadow border border-red-500"
                        role="alert">
                        <div
                            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 bg-red-300 rounded-lg">
                            <svg class="w-4 h-4 fill-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                viewBox="-3.5 0 19 19">

                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                </g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M11.383 13.644A1.03 1.03 0 0 1 9.928 15.1L6 11.172 2.072 15.1a1.03 1.03 0 1 1-1.455-1.456l3.928-3.928L.617 5.79a1.03 1.03 0 1 1 1.455-1.456L6 8.261l3.928-3.928a1.03 1.03 0 0 1 1.455 1.456L7.455 9.716z">
                                    </path>
                                </g>
                            </svg>
                            <span class="sr-only">Fire icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal whitespace-nowrap">{{ $error }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                            data-dismiss-target="#toast-error-{{ $loop->index }}" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="absolute bg-color-1-100 w-full h-full top-0 opacity-10"></div>
        <div
            class="grid grid-cols-1 md:grid-cols-3 rounded-3xl overflow-hidden md:min-w-[671px] max-w-2xl shadow-lg border border-white z-10 md:h-full max-h-[460px] md:min-h-[420px] mx-3 md:mx-0 p-3 bg-white">
            <div
                class="col-span-1 md:block group bg-gradient-to-b from-color-1-500 via-color-1-400 to-color-1-600 rounded-3xl">
                <div class="flex items-center justify-center w-full h-full p-5">
                    <img src="{{ asset('assets/images/logo-ppu.png') }}"
                        class="group-hover:scale-125 transition-transform duration-300 md:w-full w-1/3" alt="">
                </div>
            </div>
            <div class="col-span-2 bg-white overflow-hidden px-10 py-5 flex items-center md:h-full">
                <div class="w-full">
                    <div class="flex-col flex space-y-4 justify-center items-center pb-3 border-b border-gray-300">
                        <p class="text-gray-600 font-extrabold text-center text-xl leading-none">Sistem Informasi
                            Perjalanan Dinas <span class=" text-nowrap">(E-SPPD)</span>
                        </p>
                        <div class=" flex flex-col">
                            <p class="text-gray-400 font-medium text-center leading-5">Badan Keuangan dan Aset
                                Daerah
                            </p>
                            <p class="text-gray-400 font-medium text-base text-center leading-5">Kab. Penajam Paser Utara
                            </p>
                        </div>
                    </div>
                    <div class="py-3">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (env('APP_DEPLOY') == true)
        <script src="{{ asset('build/assets/app.js') }}"></script>
    @endif
</body>

</html>
