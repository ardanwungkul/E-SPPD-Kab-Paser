<x-app-layout>
    <x-slot name="header">
        Edit Sub. {{ session('config')->judul }}
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('sub-bidang.update', $sub_bidang->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="bidang_id">{{ session('config')->judul }}</label>
                        <select id="bidang_id" name="bidang_id"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md" required>
                            <option value="" selected disabled>Pilih {{ session('config')->judul }}</option>
                            @foreach ($bidang as $item)
                                <option value="{{ $item->id }}"
                                    {{ $sub_bidang->bidang_id == $item->id ? 'selected' : '' }}>{{ $item->uraian }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Nama Sub. Bidang</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $sub_bidang->uraian }}" placeholder="Masukkan Sub. {{ session('config')->judul }}" required>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button/>
                        <x-button.back-button :route="route('sub-bidang.index')"/>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
