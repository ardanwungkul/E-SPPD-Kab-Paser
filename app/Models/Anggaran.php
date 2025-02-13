<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use HasFactory;
    protected $table = 'anggaran';

    public function sub_kegiatan()
    {
        return $this->belongsTo(SubKegiatan::class, 'sub_kegiatan_id');
    }
    public function getKegiatanAttribute()
    {
        return $this->sub_kegiatan->kegiatan;
    }
    public function getProgramAttribute()
    {
        return $this->kegiatan->program;
    }
}
