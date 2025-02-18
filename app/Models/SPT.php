<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPT extends Model
{
    use HasFactory;
    protected $table = 'transaksi_spt';

    public function nota_dinas()
    {
        return $this->belongsTo(NotaDinas::class, 'nota_dinas_id');
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
    public function ub()
    {
        return $this->belongsTo(Pegawai::class, 'penandatangan_id');
    }
}
