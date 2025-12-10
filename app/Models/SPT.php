<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPT extends Model
{
    use HasFactory;
    protected $table = 'spt_main';

    public function sub_bidang()
    {
        return $this->belongsTo(SubBidang::class, 'bidang_sub_id');
    }
    public function sub_kegiatan()
    {
        return $this->belongsTo(SubKegiatan::class, 'kdsubgiat', 'kdsub');
    }
    public function dasar()
    {
        return $this->hasMany(SPTDasar::class, 'spt_id');
    }
    public function pegawai()
    {
        return $this->hasMany(SPTPegawai::class, 'spt_id');
    }
    public function untuk()
    {
        return $this->hasMany(SPTUntuk::class, 'spt_id');
    }
    public function sppd()
    {
        return $this->hasOne(SPPD::class, 'spt_id');
    }
    public function ub()
    {
        return $this->belongsTo(Pegawai::class, 'penandatangan_id');
    }
}
