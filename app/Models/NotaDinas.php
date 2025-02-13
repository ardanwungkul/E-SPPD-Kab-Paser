<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaDinas extends Model
{
    use HasFactory;
    protected $table = 'transaksi_nota_dinas';
    public static function generateNomorUrut($tahun)
    {
        $lastRecord = self::where('tahun', $tahun)
            ->orderBy('nomor', 'desc')
            ->first();

        if (!$lastRecord) {
            return '001';
        }

        $lastNumber = (int) $lastRecord->nomor;
        $nextNumber = $lastNumber + 1;

        return str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

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
    public function sub_bidang()
    {
        return $this->belongsTo(SubBidang::class, 'sub_bidang_id');
    }
    public function getBidangAttribute()
    {
        return $this->sub_bidang->bidang;
    }
    public function jenis_perjalanan()
    {
        return $this->belongsTo(JenisPerjalanan::class, 'jenis_sppd_id');
    }
    public function kepada()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id_kepada');
    }
    public function dari()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id_dari');
    }
    public function disposisi()
    {
        return $this->hasOne(NotaDinasDisposisi::class, 'nota_dinas_id');
    }
    public function lampiran()
    {
        return $this->hasMany(NotaDinasLampiran::class, 'nota_dinas_id');
    }
    public function spt()
    {
        return $this->hasOne(SPT::class, 'nota_dinas_id');
    }
}
