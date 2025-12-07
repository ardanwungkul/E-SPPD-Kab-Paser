<x-app-layout>
    <x-slot name="header">
        Edit Kabupaten/Kota {{ $kabupaten_kota->nama }}
    </x-slot>
    <x-container class=" max-w-3xl mx-auto">
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Titik Koordinat
                </legend>
                <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                    <div class="w-full">
                        <div id="map" class="w-full h-80 rounded-lg border border-secondary-3 shadow-lg z-10">
                        </div>
                    </div>
                </div>
            </fieldset>
        </x-slot>
    </x-container>

    <x-container class=" max-w-3xl mx-auto">
        <x-slot name="content">
            <fieldset class="border-t border-secondary-4 pt-4">
                <legend align="center" class="px-5 text-secondary-1 bg-white text-lg font-semibold">
                    Wilayah
                </legend>
                <form action="{{ route('kabupaten-kota.update', $kabupaten_kota->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                        <div class="flex flex-col gap-1">
                            <label for="provinsi_id">Nama Provinsi</label>
                            <select name="provinsi_id" id="provinsi_id"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2" required
                                disabled>
                                <option value="" selected disabled>Pilih Provinsi</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $kabupaten_kota->provinsi_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama Kabupaten/Kota</label>
                            <input type="text" id="nama" name="nama"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                                value="{{ $kabupaten_kota->nama }}" placeholder="Masukkan Nama Kabupaten/Kota" required>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="latitude">Latitude</label>
                            <input type="text" id="latitude" name="latitude"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                                value="{{ $kabupaten_kota->latitude }}" placeholder="Pilih Lokasi Di Map" required
                                readonly>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="longitude">Longitude</label>
                            <input type="text" id="longitude" name="longitude"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                                value="{{ $kabupaten_kota->longitude }}" placeholder="Pilih Lokasi Di Map" required
                                readonly>
                        </div>
                        <div class="flex justify-end items-center gap-4 pt-4">
                            <x-button.save-button />
                            <x-button.back-button :route="route('kabupaten-kota.index')" />
                        </div>
                    </div>
                </form>
            </fieldset>
        </x-slot>
    </x-container>
</x-app-layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.select2').select2({
            dropdownCssClass: "text-xs md:text-sm",
            selectionCssClass: 'text-xs md:text-sm',
        });

        var map = L.map('map').setView([{{ $kabupaten_kota->latitude }}, {{ $kabupaten_kota->longitude }}],
            3.4);
        let marker;
        let geoJsonLayer;

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
            foo: 'bar',
        }).addTo(map);
        marker = L.marker([{{ $kabupaten_kota->latitude }}, {{ $kabupaten_kota->longitude }}]).addTo(map)
            .bindPopup('Latitude: ' + {{ $kabupaten_kota->latitude }} + '<br>Longitude: ' +
                {{ $kabupaten_kota->longitude }})
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
