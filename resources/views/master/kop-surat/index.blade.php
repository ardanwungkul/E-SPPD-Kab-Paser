<x-app-layout>
    <x-slot name="header">
        Kop Surat
    </x-slot>
    <x-container
        class="!p-0 !bg-transparent !shadow-none !border-none md:!bg-white md:!shadow-lg md:!p-5 md:!border md:!border-gray-200">
        <x-slot name="content">
            <form action="{{ route('kop-surat.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="space-y-5 max-w-6xl mx-auto">
                <div class="space-y-10">
                        <fieldset class="border-t border-secondary-4 pt-4">
                            <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                                Kop Surat SPT
                            </legend>
                            <div class="p-4 rounded-lg bg-gray-50 shadow-lg">
                                <div class="flex w-full items-center px-5 border-b pb-3 border-gray-500">
                                    <div class="flex-none">
                                        <div class="h-28 relative group">
                                            <label for="dprd_logo" class="cursor-pointer">
                                                <img id="dprd_logo_preview"
                                                    src="{{ $kop_surat->dprd_logo && file_exists(public_path('storage/' . $kop_surat->dprd_logo)) ? asset('storage/' . $kop_surat->dprd_logo) : asset('assets/images/placeholder-potrait.png') }}"
                                                    alt="Preview Gambar" class="w-full h-28 object-cover" />
                                                <div
                                                    class="absolute w-full h-full bg-black/20 top-0 rounded-lg hidden group-hover:block cursor-pointer">
                                                </div>
                                            </label>
                                            <input type="file" id="dprd_logo" name="dprd_logo" accept="image/*"
                                                class="hidden" />

                                        </div>

                                        <script>
                                            document.getElementById('dprd_logo').addEventListener('change', function(e) {
                                                const file = e.target.files[0];
                                                if (!file) return;

                                                const reader = new FileReader();
                                                reader.onload = function(event) {
                                                    document.getElementById('dprd_logo_preview').src = event.target.result;
                                                };
                                                reader.readAsDataURL(file);
                                            });
                                        </script>

                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col items-center justify-center w-full">
                                            <input required name="dprd_header_1" value="{{ $kop_surat->dprd_header_1 }}"
                                                class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-bold text-lg">
                                            <input required name="dprd_header_2" value="{{ $kop_surat->dprd_header_2 }}"
                                                class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-semibold">
                                            <input required name="dprd_header_3" value="{{ $kop_surat->dprd_header_3 }}"
                                                class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 text-sm">
                                            <input required name="dprd_header_4" value="{{ $kop_surat->dprd_header_4 }}"
                                                class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-semibold">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </fieldset>
                        <fieldset class="border-t border-secondary-4 pt-4">
                            <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                                Kop Surat SPPD
                            </legend>
                            <div class="p-4 rounded-lg bg-gray-50 shadow-lg">
                                <div class="flex w-full items-center px-5 border-b pb-3 border-gray-500">
                                    <div class="flex-none">
                                        <div class="h-28 relative group">
                                            <label for="setwan_logo" class="cursor-pointer">
                                                <img id="setwan_logo_preview"
                                                    src="{{ $kop_surat->setwan_logo && file_exists(public_path('storage/' . $kop_surat->setwan_logo)) ? asset('storage/' . $kop_surat->setwan_logo) : asset('assets/images/placeholder-potrait.png') }}"
                                                    alt="Preview Gambar" class="w-full h-28 object-cover" />
                                                <div
                                                    class="absolute w-full h-full bg-black/20 top-0 rounded-lg hidden group-hover:block cursor-pointer">
                                                </div>
                                            </label>
                                            <input type="file" id="setwan_logo" name="setwan_logo" accept="image/*"
                                                class="hidden" />

                                        </div>

                                        <script>
                                            document.getElementById('setwan_logo').addEventListener('change', function(e) {
                                                const file = e.target.files[0];
                                                if (!file) return;

                                                const reader = new FileReader();
                                                reader.onload = function(event) {
                                                    document.getElementById('setwan_logo_preview').src = event.target.result;
                                                };
                                                reader.readAsDataURL(file);
                                            });
                                        </script>

                                    </div>
                                    <div class="w-full">
                                        <div class="flex flex-col items-center justify-center w-full">
                                            <input required name="setwan_header_1"
                                                value="{{ $kop_surat->setwan_header_1 }}"
                                                class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-bold text-lg">
                                            <input required name="setwan_header_2"
                                                value="{{ $kop_surat->setwan_header_2 }}"
                                                class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-semibold">
                                            <input required name="setwan_header_3"
                                                value="{{ $kop_surat->setwan_header_3 }}"
                                                class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 text-sm">
                                            <input required name="setwan_header_4"
                                                value="{{ $kop_surat->setwan_header_4 }}"
                                                class="!border-none !bg-transparent !w-full !text-center !p-0 focus:!ring-0 active:!ring-0 font-semibold">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button />
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>


</x-app-layout>
