<x-app-layout>
    <x-slot name="header">
        Edit Program
    </x-slot>
    <x-container>
        <x-slot name="content">
            <form action="{{ route('program.update', $program->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="kode">Kode Program</label>
                        <input type="text" id="kode" name="kode"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $program->kode }}" placeholder="Masukkan Kode Program" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="uraian">Nama Program</label>
                        <input type="text" id="uraian" name="uraian"
                            class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                            value="{{ $program->uraian }}" placeholder="Masukkan Nama Program" required>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button/>
                        <x-button.back-button :route="route('program.index')"/>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>
