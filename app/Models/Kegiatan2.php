<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan2 extends Model
{
    use HasFactory;
    protected $table = 'ref_kegiatan2';

    protected $primaryKey = 'kdgiat';
    public $incrementing = false;
    protected $keyType = 'string';

    public function program()
    {
        return $this->belongsTo(Program::class, 'kdprog');
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
