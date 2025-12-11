<div class="text-sm max-w-xl mx-auto grid grid-cols-1 gap-y-3 gap-x-7">
    {{-- Jenis SPPD --}}
    <div class="flex items-center gap-3">
        <label class=" w-40 min-w-40" for="jenis_sppd_id">Jenis SPPD</label>
        <select name="jenis_sppd_id" id="jenis_sppd_id" class="text-sm rounded-lg select2" required disabled>
            <option value="" selected disabled> Pilih Jenis SPPD</option>
            @foreach ($jenis as $item)
                <option value="{{ $item->id }}" {{ $item->id == $spt->jenis_id ? 'selected' : '' }}>
                    {{ $item->uraian }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Bidang --}}
    <div class="flex items-center gap-3">
        <label class=" w-40 min-w-40" for="bidang_id">{{ session('config')->judul }}</label>
        <select name="bidang_id" id="bidang_id" class="text-sm rounded-lg select2" required disabled>
            <option value="" selected disabled>Pilih {{ session('config')->judul }}
            </option>
            @foreach ($bidang as $item)
                <option value="{{ $item->id }}" {{ $item->id == $spt->sub_bidang->bidang_id ? 'selected' : '' }}>
                    {{ $item->uraian }}</option>
            @endforeach
        </select>
    </div>
    <div class="flex items-center gap-3">
        <label class=" w-40 min-w-40" for="sub_bidang_id">Sub {{ session('config')->judul }}</label>
        <select name="sub_bidang_id" id="sub_bidang_id" class="text-sm rounded-lg select2" required disabled>
            <option value="" selected disabled> Pilih Sub
                {{ session('config')->judul }}
            </option>
            <option value="{{ $spt->bidang_sub_id }}" selected>{{ $spt->sub_bidang->uraian }}
            </option>
        </select>
    </div>

    {{-- Program/Kegiatan --}}
    <div class="flex items-center gap-3">
        <label class=" w-40 min-w-40" for="program_id">Program</label>
        <select name="program_id" id="program_id" class="text-sm rounded-lg select2" required disabled>
            <option value="" selected disabled> Pilih Program</option>
            @foreach ($program as $item)
                <option value="{{ $item->kdprog }}"
                    {{ $item->kdprog == $spt->sub_kegiatan->kdprog ? 'selected' : '' }}>
                    {{ $item->kdprog }} - {{ $item->uraian }}</option>
            @endforeach
        </select>
    </div>
    <div class="flex items-center gap-3">
        <label class=" w-40 min-w-40" for="kegiatan_id">Kegiatan</label>
        <select name="kegiatan_id" id="kegiatan_id" class="text-sm rounded-lg select2" required disabled>
            <option value="" selected disabled> Pilih Kegiatan</option>
            <option value="{{ $spt->sub_kegiatan->kdgiat }}" selected>
                {{ $spt->sub_kegiatan->kegiatan->kdgiat }} -
                {{ $spt->sub_kegiatan->kegiatan->uraian }}</option>
        </select>
    </div>
    <div class="flex items-center gap-3">
        <label class=" w-40 min-w-40" for="sub_kegiatan_id">Sub Kegiatan</label>
        <select name="sub_kegiatan_id" id="sub_kegiatan_id" class="text-sm rounded-lg select2" required disabled>
            <option value="{{ $spt->sub_kegiatan->kdsub }}" selected>
                {{ $spt->sub_kegiatan->kdsub }} -
                {{ $spt->sub_kegiatan->uraian }}</option>
        </select>
    </div>
</div>
