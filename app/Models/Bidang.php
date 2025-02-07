<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;
    protected $table = 'ref_bidang';
    public function sub_bidang()
    {
        return $this->hasMany(SubBidang::class, 'bidang_id');
    }
}
