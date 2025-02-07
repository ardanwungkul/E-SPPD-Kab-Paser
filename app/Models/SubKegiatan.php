<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKegiatan extends Model
{
    use HasFactory;
    protected $table = 'ref_kegiatan_sub';
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }
    public function getFormattedKodeAttribute()
    {
        return $this->kegiatan->formatted_kode . '.' . $this->kode;
    }
}
