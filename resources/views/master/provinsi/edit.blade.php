<x-app-layout>
    <x-slot name="header">
        Edit Provinsi {{ $provinsi->nama }}
    </x-slot>
    <x-container class=" max-w-3xl mx-auto">
        <x-slot name="content">
            <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                <p class=" text-lg font-semibold text-secondary-1">Ilustrasi Titik Koordinat</p>

                <div class="w-full">
                    <div id="map" class="w-full h-80 rounded-lg border border-secondary-3 shadow-lg z-10">
                    </div>
                </div>
            </div>
        </x-slot>
    </x-container>

    <x-container class=" max-w-3xl mx-auto">
        <x-slot name="content">
            <form action="{{ route('provinsi.update', $provinsi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="flex flex-col gap-1">
                        <label for="nama">Nama Provinsi</label>
                        <input type="text" id="nama" name="nama"
                            class="text-sm rounded-lg border border-gray-300" value="{{ $provinsi->nama }}"
                            placeholder="Masukkan Nama Provinsi" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="latitude">Latitude</label>
                        <input type="text" id="latitude" name="latitude"
                            class="text-sm rounded-lg border border-gray-300" value="{{ $provinsi->latitude }}"
                            placeholder="Pilih Lokasi Di Map" required readonly>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="longitude">Longitude</label>
                        <input type="text" id="longitude" name="longitude"
                            class="text-sm rounded-lg border border-gray-300" value="{{ $provinsi->longitude }}"
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
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var map = L.map('map').setView([{{ $provinsi->latitude }}, {{ $provinsi->longitude }}], 5);

        let marker;
        let geoJsonLayer;

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
            foo: 'bar',
        }).addTo(map);
        marker = L.marker([{{ $provinsi->latitude }}, {{ $provinsi->longitude }}]).addTo(map)
            .bindPopup('Latitude: ' + {{ $provinsi->latitude }} + '<br>Longitude: ' +
                {{ $provinsi->longitude }})
            .openPopup();

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
