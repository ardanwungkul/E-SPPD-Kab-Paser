<x-app-layout>
    <x-slot name="header">
        Tambah Kecamatan
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
                <form action="{{ route('kecamatan.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="text-xs md:text-sm space-y-3 max-w-xl mx-auto">
                        <div class=" w-full flex flex-col gap-1">
                            <label for="provinsi_id">Nama Provinsi</label>
                            <select name="provinsi_id" id="provinsi_id"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2" required>
                                <option value="" selected disabled>Pilih Provinsi</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="kabupaten_kota_id">Nama Kabupaten/Kota</label>
                            <select name="kabupaten_kota_id" id="kabupaten_kota_id"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2" required>
                                <option value="" selected disabled>Pilih Kabupaten/Kota</option>
                                @foreach ($kabupaten_kota as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label for="nama">Nama Kecamatan</label>
                            <input type="text" id="nama" name="nama"
                                class="md:text-sm text-xs rounded-lg border border-gray-300 shadow-md"
                                value="{{ old('nama') }}" placeholder="Masukkan Nama Kecamatan" required>
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
                            <x-button.back-button :route="route('kecamatan.index')" />
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

        $('#provinsi_id').on('change', function() {
            const ProvinsiKode = $(this).val();

            if (ProvinsiKode) {
                $('#kabupaten_kota_id').prop('disabled', true)
                    .html('<option selected disabled>Memuat...</option>');
                $.ajax({
                    url: "{{ route('get.kabupaten-kota-by-provinsi') }}",
                    type: "GET",
                    data: {
                        provinsi_id: ProvinsiKode
                    },
                    success: function(response) {

                        $('#kabupaten_kota_id').empty();
                        $('#kabupaten_kota_id').append(
                            '<option value="" selected disabled>Pilih Kabupaten/Kota</option>'
                        );

                        if (response.length > 0) {
                            $.each(response, function(index, kabupaten) {
                                $('#kabupaten_kota_id').append('<option value="' +
                                    kabupaten.id + '">' + kabupaten.nama +
                                    '</option>');
                            });
                            $('#kabupaten_kota_id').prop('disabled', false);
                        } else {
                            $('#kabupaten_kota_id').append(
                                '<option value="" disabled>Tidak ada Kabupaten/Kota tersedia</option>'
                            );
                            $('#kabupaten_kota_id').prop('disabled', false);
                        }
                    },
                    error: function(xhr) {
                        $('#kabupaten_kota_id').prop('disabled', false);
                        console.error(xhr.responseText);
                    }
                });
            } else {
                $('#kabupaten_kota_id').empty();
                $('#kabupaten_kota_id').append(
                    '<option value="" selected disabled>Pilih Kabupaten/Kota</option>');
            }
        });

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
