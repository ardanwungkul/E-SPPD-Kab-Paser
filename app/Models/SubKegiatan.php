<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKegiatan extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'ref_kegiatan_sub';

    protected $primaryKey = 'kdsub';
    public $incrementing = false;
    protected $keyType = 'string';

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'kdsub', $value)
            ->where('tahun', session('tahun'))
            ->firstOrFail();
    }

    protected function setKeysForSaveQuery($query)
    {
        return $query
            ->where('kdsub', $this->getOriginal('kdsub')) // ⬅️ id LAMA
            ->where('tahun', $this->getOriginal('tahun') ?? session('tahun'));
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'kdprog')
            ->where('tahun', session('tahun'));
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kdgiat')
            ->where('tahun', session('tahun'));
    }
    public function anggaran() 
    {
        return $this->hasMany(Anggaran::class, 'kdsub')
            ->where('tahun', session('tahun'));
    }
    public function getFormattedKodeAttribute()
    {
        return $this->kegiatan->formatted_kode . '.' . $this->kode;
    }
}
