<x-app-layout>
    <x-slot name="header">
        Edit Kecamatan {{ $kecamatan->kecamatan }}
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
            <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="md:text-sm text-xs space-y-3 max-w-xl mx-auto">
                    <div class=" w-full flex flex-col gap-1">
                        <label for="provinsi_id">Provinsi</label>
                        <select name="provinsi_id" id="provinsi_id"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2" required
                            disabled>
                            <option value="" selected disabled>Pilih Provinsi</option>
                            @foreach ($provinsi as $item)
                                <option value="{{ $item->id }}"
                                    {{ $kecamatan->provinsi_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="kabupaten_kota_id">Kabupaten/Kota</label>
                        <select name="kabupaten_kota_id" id="kabupaten_kota_id"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2" required
                            disabled>
                            <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                            @foreach ($kabupaten_kota as $item)
                                <option value="{{ $item->id }}"
                                    {{ $kecamatan->kabupaten_kota_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="nama">Nama Kecamatan</label>
                        <input type="text" id="nama" name="nama"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            value="{{ $kecamatan->nama }}" placeholder="Masukkan Nama Kecamatan" required>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="latitude">Latitude</label>
                        <input type="text" id="latitude" name="latitude"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            value="{{ $kecamatan->latitude }}" placeholder="Pilih Lokasi Di Map" required readonly>
                    </div>
                    <div class="flex flex-col gap-1">
                        <label for="longitude">Longitude</label>
                        <input type="text" id="longitude" name="longitude"
                            class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                            value="{{ $kecamatan->longitude }}" placeholder="Pilih Lokasi Di Map" required readonly>
                    </div>
                    <div class="flex justify-end items-center gap-4 pt-4">
                        <x-button.save-button />
                        <x-button.back-button :route="route('kecamatan.index')" />
                    </div>
                </div>
            </form>
        </x-slot>
    </x-container>
</x-app-layout>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.select2').select2({
            dropdownCssClass: "text-xs md:text-sm",
            selectionCssClass: 'text-xs md:text-sm',
        });

        var map = L.map('map').setView([{{ $kecamatan->latitude }}, {{ $kecamatan->longitude }}], 3.4);
        let marker;
        let geoJsonLayer;

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
            foo: 'bar',
        }).addTo(map);


        marker = L.marker([{{ $kecamatan->latitude }}, {{ $kecamatan->longitude }}]).addTo(map)
            .bindPopup('Latitude: ' + {{ $kecamatan->latitude }} + '<br>Longitude: ' +
                {{ $kecamatan->longitude }})
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
