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
        return $this->belongsTo(SubKegiatan::class, 'kdgiat_sub', 'kdsub');
    }
    public function dasar()
    {
        return $this->hasMany(SPTDasar::class, 'spt_id')->orderBy('dasar_ke', 'asc');
    }
    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class, 'spt_pegawai', 'spt_id', 'pegawai_id')
            ->withPivot('pegawai_idx') // kolom pivot tambahan
            ->orderBy('pegawai_idx', 'asc');
    }
    public function untuk()
    {
        return $this->hasMany(SPTUntuk::class, 'spt_id')->orderBy('untuk_ke', 'asc');
    }
    public function sppd()
    {
        return $this->hasOne(SPPD::class, 'spt_id');
    }
    public function ub()
    {
        return $this->belongsTo(Pegawai::class, 'pejabat_ttd', 'id');
    }
}
