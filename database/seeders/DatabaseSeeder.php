<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Config;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $config = [
            ['tahun' => '2025', 'aktif' => 'Y', 'judul' => 'Bagian', 'no_spt' => '90/{nomor_urut}/SPT/{tahun}', 'no_sppd' => '90/{nomor_urut}/SPPD/{tahun}', 'no_spj' => ''],
            ['tahun' => '2026', 'aktif' => 'T', 'judul' => 'Bagian', 'no_spt' => '90/{nomor_urut}/SPT/{tahun}', 'no_sppd' => '90/{nomor_urut}/SPPD/{tahun}', 'no_spj' => ''],
            ['tahun' => '2027', 'aktif' => 'T', 'judul' => 'Bagian', 'no_spt' => '90/{nomor_urut}/SPT/{tahun}', 'no_sppd' => '90/{nomor_urut}/SPPD/{tahun}', 'no_spj' => '']
        ];
        Config::insert($config);
        $this->call(PermissionSeeder::class);
        $this->call(RefSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(WilayahSeeder::class);
        $this->call(PreferensiSeeder::class);
    }
}
