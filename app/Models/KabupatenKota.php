<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    use HasFactory;
    protected $table = 'wilayah_kabkota';

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }
    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'kabupaten_kota_id');
    }
}
