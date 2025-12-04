<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPerjalanan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ref_jenis_sppd';
}
