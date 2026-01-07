<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianFile extends Model
{
    protected $table = 'rincian_file';

    protected $primaryKey = 'idx';
    public $timestamps = false;

    use HasFactory;
}
