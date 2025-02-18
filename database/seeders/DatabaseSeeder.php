<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        $this->call(RefSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(WilayahSeeder::class);
        $this->call(PreferensiSeeder::class);
    }
}
