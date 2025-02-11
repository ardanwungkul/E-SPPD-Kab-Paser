<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\Provinsi;

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


        $provinsi = [
            [
                "nama" => "ACEH",
                "latitude" => 4.695135,
                "longitude" => 96.7493993
            ],
            [
                "nama" => "SUMATERA UTARA",
                "latitude" => 2.1153547,
                "longitude" => 99.5450974
            ],
            [
                "nama" => "SUMATERA BARAT",
                "latitude" => -0.7399397,
                "longitude" => 100.8000051
            ],
            [
                "nama" => "RIAU",
                "latitude" => 0.2933469,
                "longitude" => 101.7068294
            ],
            [
                "nama" => "JAMBI",
                "latitude" => -1.6101229,
                "longitude" => 103.6131203
            ],
            [
                "nama" => "SUMATERA SELATAN",
                "latitude" => -3.3194374,
                "longitude" => 103.914399
            ],
            [
                "nama" => "BENGKULU",
                "latitude" => -3.5778471,
                "longitude" => 102.3463875
            ],
            [
                "nama" => "LAMPUNG",
                "latitude" => -4.5585849,
                "longitude" => 105.4068079
            ],
            [
                "nama" => "KEPULAUAN BANGKA BELITUNG",
                "latitude" => -2.7410513,
                "longitude" => 106.4405872
            ],
            [
                "nama" => "KEPULAUAN RIAU",
                "latitude" => 3.9456514,
                "longitude" => 108.1428669
            ],
            [
                "nama" => "DKI JAKARTA",
                "latitude" => -6.17511,
                "longitude" => 106.8650395
            ],
            [
                "nama" => "JAWA BARAT",
                "latitude" => -7.090911,
                "longitude" => 107.668887
            ],
            [
                "nama" => "JAWA TENGAH",
                "latitude" => -7.150975,
                "longitude" => 110.1402594
            ],
            [
                "nama" => "DI YOGYAKARTA",
                "latitude" => -7.8753849,
                "longitude" => 110.4262088
            ],
            [
                "nama" => "JAWA TIMUR",
                "latitude" => -7.5360639,
                "longitude" => 112.2384017
            ],
            [
                "nama" => "BANTEN",
                "latitude" => -6.4058172,
                "longitude" => 106.0640179
            ],
            [
                "nama" => "BALI",
                "latitude" => -8.4095178,
                "longitude" => 115.188916
            ],
            [
                "nama" => "NUSA TENGGARA BARAT",
                "latitude" => -8.6529334,
                "longitude" => 117.3616476
            ],
            [
                "nama" => "NUSA TENGGARA TIMUR",
                "latitude" => -8.6573819,
                "longitude" => 121.0793705
            ],
            [
                "nama" => "KALIMANTAN BARAT",
                "latitude" => -0.2787808,
                "longitude" => 111.4752851
            ],
            [
                "nama" => "KALIMANTAN TENGAH",
                "latitude" => -1.6814878,
                "longitude" => 113.3823545
            ],
            [
                "nama" => "KALIMANTAN SELATAN",
                "latitude" => -3.0926415,
                "longitude" => 115.2837585
            ],
            [
                "nama" => "KALIMANTAN TIMUR",
                "latitude" => 0.5386586,
                "longitude" => 116.419389
            ],
            [
                "nama" => "KALIMANTAN UTARA",
                "latitude" => 3.0730929,
                "longitude" => 116.0413889
            ],
            [
                "nama" => "SULAWESI UTARA",
                "latitude" => 0.6246932,
                "longitude" => 123.9750018
            ],
            [
                "nama" => "SULAWESI TENGAH",
                "latitude" => -1.4300254,
                "longitude" => 121.4456179
            ],
            [
                "nama" => "SULAWESI SELATAN",
                "latitude" => -3.6687994,
                "longitude" => 119.9740534
            ],
            [
                "nama" => "SULAWESI TENGGARA",
                "latitude" => -4.14491,
                "longitude" => 122.174605
            ],
            [
                "nama" => "GORONTALO",
                "latitude" => 0.6999372,
                "longitude" => 122.4467238
            ],
            [
                "nama" => "SULAWESI BARAT",
                "latitude" => -2.8441371,
                "longitude" => 119.2320784
            ],
            [
                "nama" => "MALUKU",
                "latitude" => -3.2384616,
                "longitude" => 130.1452734
            ],
            [
                "nama" => "MALUKU UTARA",
                "latitude" => 1.5709993,
                "longitude" => 127.8087693
            ],
            [
                "nama" => "PAPUA BARAT",
                "latitude" => -1.3361154,
                "longitude" => 133.1747162
            ],
            [
                "nama" => "PAPUA",
                "latitude" => -4.269928,
                "longitude" => 138.0803529
            ]
        ];

        Provinsi::insert($provinsi);
    }
}
