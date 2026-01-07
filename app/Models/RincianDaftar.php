<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianDaftar extends Model
{
    protected $table = 'rincian_daftar';

    protected $primaryKey = 'idx';
    public $timestamps = false;

    use HasFactory;
}
