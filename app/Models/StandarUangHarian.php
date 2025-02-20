<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StandarUangHarian extends Model
{
    use HasFactory;
    protected $table = 'standar_uang_harian';

    public function jenis_sppd()
    {
        return $this->belongsTo(JenisPerjalanan::class, 'jenis_sppd_id');
    }
    public function tingkat_sppd()
    {
        return $this->belongsTo(TingkatPerjalananDinas::class, 'tingkat_sppd_id');
    }
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }
    public function kabupaten()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_id');
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id');
    }
}
