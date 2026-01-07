<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bidang extends Model
{
    use HasFactory;
    // use SoftDeletes;
    public $timestamps = false;
    protected $table = 'ref_bidang';

    public function sub_bidang()
    {
        return $this->hasMany(SubBidang::class, 'bidang_id', 'id');
    }
}
