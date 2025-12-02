<x-app-layout>
    <x-slot name="header">
        Tambah Provinsi
    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="w-full min-h-80">
            <div id="map" class="w-full h-full rounded-lg border border-secondary-3 shadow-lg z-10"></div>

        </div>
        <x-container>
            <x-slot name="content">
                <form action="{{ route('provinsi.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama Provinsi</label>
                            <input type="text" id="nama" name="nama"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                value="{{ old('nama') }}" placeholder="Masukkan Nama Provinsi" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="latitude">Latitude</label>
                            <input type="text" id="latitude" name="latitude"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                placeholder="Pilih Lokasi Di Map" required readonly>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="longitude">Longitude</label>
                            <input type="text" id="longitude" name="longitude"
                                class="text-xs md:text-sm rounded-lg border border-gray-300 shadow-md"
                                placeholder="Pilih Lokasi Di Map" required readonly>
                        </div>
                        <div class="flex justify-end items-center gap-4 pt-4">
                            <x-button.save-button />
                            <x-button.back-button :route="route('provinsi.index')" />
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
