<?php

namespace Database\Seeders;

use App\Models\Preferensi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PreferensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Preferensi::create([
            'id' => 1,
            'nama_aplikasi' => 'eSPPD - PPU',
            'instansi_alamat' => 'Jl. Gersamata No. 5 Lakudo, Kode Pos 93763',
            // 'instansi_provinsi' => 23,
            // 'instansi_kabupaten_kota' => 361,
            'instansi_kontak_email' => 'instansi@gmail.com',
            'instansi_kontak_fax' => '022 1234567',
            'instansi_kontak_telp' => '022 213455',
            // 'instansi_logo' => 1,
            'instansi_nama' => 'SEKRETARIAT DAERAH',
            'instansi_pemerintah' => 'PROVINSI KALIMANTAN TIMUR',
        ]);
    }
}
