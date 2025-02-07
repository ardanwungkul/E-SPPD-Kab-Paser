<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    protected $table = 'ref_pangkat';
    public function getJenisPegawaiFormattedAttribute()
    {
        $jenis = $this->jenis_pegawai;
        if ($jenis == 1) {
            return 'PNS';
        } else if ($jenis == 2) {

            return 'PPPK / P3K';
        } else if ($jenis == 3) {

            return 'Honorer / PPPK';
        } else if ($jenis == 4) {

            return 'Anggota DPRD';
        }
    }
}
