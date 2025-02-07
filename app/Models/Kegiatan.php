<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'ref_kegiatan';
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_kode');
    }

    public function getFormattedKodeAttribute()
    {
        return $this->program->kode . '.' . $this->kode;
    }
    public function sub_kegiatan()
    {
        return $this->hasMany(SubKegiatan::class, 'kegiatan_id');
    }
}
