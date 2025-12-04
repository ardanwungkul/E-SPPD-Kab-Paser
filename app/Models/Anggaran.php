<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'anggaran';

    public function sub_bidang()
    {
        return $this->belongsTo(SubBidang::class, 'bidang_sub_id');
    }
    public function sub_kegiatan()
    {
        return $this->belongsTo(SubKegiatan::class, 'kdsub');
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
