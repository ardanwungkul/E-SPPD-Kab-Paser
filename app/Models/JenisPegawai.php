<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPegawai extends Model
{
    use HasFactory;
    protected $table = 'ref_jenis_pegawai';

    public function pangkat()
    {
        return $this->hasMany(Golongan::class, 'jenis_pegawai_id');
    }
}
