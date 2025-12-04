@props(['route' => null])
<a href="{{ $route }}"
    class=" bg-red-500 hover:bg-opacity-80 text-white rounded-lg w-24 py-2 text-xs shadow-lg flex gap-1 items-center justify-center duration-300 whitespace-nowrap font-medium">
    <svg class="w-3 h-3 stroke-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
        viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
            d="M6 18 17.94 6M18 18 6.06 6" />
    </svg>

    <p>
        Batal
    </p>
</a>
