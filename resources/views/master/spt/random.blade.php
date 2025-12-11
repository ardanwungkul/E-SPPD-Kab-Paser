<div class=" flex flex-col gap-1">
    <label for="provinsi_id">Provinsi Tujuan</label>
    <select name="provinsi_id" id="provinsi_id"
        class=" flex-grow md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2" required>
        <option value="" selected disabled>Pilih Provinsi</option>
        @foreach ($provinsi as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </select>
</div>
<div class=" flex flex-col gap-1">
    <label for="kabupaten_kota_id">Kabupaten/Kota Tujuan</label>
    <select name="kabupaten_kota_id" id="kabupaten_kota_id"
        class=" flex-grow md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2" required>
        <option value="" selected disabled>Pilih Kabupaten/Kota</option>
        @foreach ($kabkota as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </select>
</div>
<div class=" flex flex-col gap-1">
    <label for="kecamatan_id">Kecamatan Tujuan</label>
    <select name="kecamatan_id" id="kecamatan_id"
        class=" flex-grow md:text-sm text-xs rounded-lg border border-gray-300 shadow-md select2" required>
        <option value="" selected disabled>Pilih Kecamatan</option>
        @foreach ($kecamatan as $item)
            <option value="{{ $item->id }}">{{ $item->nama }}</option>
        @endforeach
    </select>
</div>
