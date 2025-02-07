<x-app-layout>
    <x-slot name="header">
        Tambah Kabupaten/Kota
    </x-slot>
    <div class="grid grid-cols-2 gap-5">
        <div class="w-full">
            <div id="map" class="w-full h-full rounded-lg border border-secondary-3 shadow-lg"></div>

        </div>
        <x-container>
            <x-slot name="content">
                <form action="{{ route('kabupaten-kota.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="text-sm space-y-3">
                        <div class="flex flex-col gap-1">
                            <label for="provinsi_id">Provinsi</label>
                            <select name="provinsi_id" id="provinsi_id" class="text-sm rounded-lg" required>
                                <option value="" selected disabled>Pilih Provinsi</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="text-sm rounded-lg"
                                value="{{ old('nama') }}" placeholder="Masukkan Nama Provinsi" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="latitude">Latitude</label>
                            <input type="text" id="latitude" name="latitude" class="text-sm rounded-lg"
                                placeholder="Pilih Lokasi Di Map" required readonly>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="longitude">Longitude</label>
                            <input type="text" id="longitude" name="longitude" class="text-sm rounded-lg"
                                placeholder="Pilih Lokasi Di Map" required readonly>
                        </div>
                        <div class="flex justify-end items-center gap-4">
                            <button
                                class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                                type="submit">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="4" d="M5 11.917 9.724 16.5 19 7.5" />
                                </svg>

                                <p>Simpan</p>
                            </button>
                            <a class="bg-secondary-3 hover:bg-opacity-80 text-secondary-1 py-2 px-5 rounded-lg border border-secondary-4 flex items-center gap-1"
                                href="{{ route('kabupaten-kota.index') }}">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
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
    </div>
</x-app-layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([-5.0, 120.0], 3.4);
        let marker;
        let geoJsonLayer;

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
            foo: 'bar',
        }).addTo(map);

        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lon = e.latlng.lng;

            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lon;

            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker([lat, lon]).addTo(map)
                .bindPopup('Latitude: ' + lat + '<br>Longitude: ' + lon)
                .openPopup();
        });

    });
</script>
