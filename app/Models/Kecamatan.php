<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'master_kecamatan';
    public function kabupaten_kota()
    {
        return $this->belongsTo(KabupatenKota::class, 'kabupaten_kota_id');
    }
}
