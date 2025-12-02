<x-app-layout>
    <x-slot name="header">
        Tambah Kabupaten/Kota
    </x-slot>
    <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
        <div class="w-full min-h-80">
            <div id="map" class="w-full h-full rounded-lg border border-secondary-3 shadow-lg z-10"></div>
        </div>
        <x-container>
            <x-slot name="content">
                <form action="{{ route('kabupaten-kota.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="md:text-sm text-xs space-y-3 max-w-xl mx-auto">
                        <div class="flex flex-col gap-1">
                            <label for="provinsi_id">Provinsi</label>
                            <select name="provinsi_id" id="provinsi_id"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md" required>
                                <option value="" selected disabled>Pilih Provinsi</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama Kabupaten/Kota</label>
                            <input type="text" id="nama" name="nama"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                                value="{{ old('nama') }}" placeholder="Masukkan Nama Kabupaten/Kota" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="latitude">Latitude</label>
                            <input type="text" id="latitude" name="latitude"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                                placeholder="Pilih Lokasi Di Map" required readonly>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="longitude">Longitude</label>
                            <input type="text" id="longitude" name="longitude"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                                placeholder="Pilih Lokasi Di Map" required readonly>
                        </div>
                        <div class="flex justify-end items-center gap-4 pt-4">
                            <x-button.save-button />
                            <x-button.back-button :route="route('kabupaten-kota.index')" />
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
