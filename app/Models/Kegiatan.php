<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'ref_kegiatan';

    protected $primaryKey = 'kdgiat';
    public $incrementing = false;
    protected $keyType = 'string';

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'kdgiat', $value)
            ->where('tahun', session('tahun'))
            ->firstOrFail();
    }

    protected function setKeysForSaveQuery($query)
    {
        return $query
            ->where('kdgiat', $this->getOriginal('kdgiat')) // ⬅️ id LAMA
            ->where('tahun', $this->getOriginal('tahun') ?? session('tahun'));
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'kdprog')
            ->where('tahun', session('tahun'));
    }

    public function getFormattedKodeAttribute()
    {
        return $this->program->kode . '.' . $this->kode;
    }
    public function sub_kegiatan()
    {
        return $this->hasMany(SubKegiatan::class, 'kdgiat')
            ->where('tahun', session('tahun'));
    }
}

