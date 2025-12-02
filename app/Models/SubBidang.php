<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubBidang extends Model
{
    protected $table = 'ref_bidang_sub';
    use HasFactory;
    // use SoftDeletes;

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function anggaran()
    {
        return $this->hasMany(Anggaran::class, 'bidang_sub_id');
    }
}
