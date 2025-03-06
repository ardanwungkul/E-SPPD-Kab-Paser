<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pegawai';
    protected $dates = ['deleted_at'];

    public function pangkat()
    {
        return $this->belongsTo(Golongan::class, 'pangkat_id');
    }
    public function sub_bidang()
    {
        return $this->belongsTo(SubBidang::class, 'bidang_sub_id');
    }
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }
}
