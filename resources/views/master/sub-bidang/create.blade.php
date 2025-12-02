<x-app-layout>
    <x-slot name="header">
        Tambah Sub {{ session('config')->judul }}
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('sub-bidang.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="bidang_id">{{ session('config')->judul }}</label>
                        <select id="bidang_id" name="bidang_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled>Pilih {{ session('config')->judul }}</option>
                            @foreach ($bidang as $item)
                                <option value="{{ $item->id }}">{{ $item->uraian }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Uraian</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ old('uraian') }}" placeholder="Masukkan Uraian" required>
                    </div>
                    <div class="flex justify-end items-center gap-4">
                        <button
                            class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1 shadow-md"
                            type="submit">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                            </svg>

                            <p>Simpan</p>
                        </button>
                        <a class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1 shadow-md"
                            href="{{ route('sub-bidang.index') }}">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="4" d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>

                            <p>Kembali</p>
                        </a>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
