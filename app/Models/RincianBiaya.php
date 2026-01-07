<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianBiaya extends Model
{
    protected $table = 'rincian';
    
    public $incrementing = false; 

    use HasFactory;

    public function sppd() {
        return $this->belongsTo(SPPD::class, 'sppd_id');
    }
    
    public function daftar() {
        return $this->hasMany(RincianDaftar::class, 'rincian_id');
    }
    
    public function file() {
        return $this->hasMany(RincianFile::class, 'rincian_id');
    }

    public function pegawai() {
        return $this->belongsTo(Pegawai::class, 'peg_id');
    }

    public function pelaksana() {
        return $this->belongsTo(Pegawai::class, 'pel_id');
    }

    public function bendahara() {
        return $this->belongsTo(Pegawai::class, 'bndhr_id');
    }

    public function pembuat() {
        return $this->belongsTo(Pegawai::class, 'buat_id');
    }
}

