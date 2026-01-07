<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'ref_program';

    protected $primaryKey = 'kdprog';
    public $incrementing = false;
    protected $keyType = 'string';

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'kdprog', $value)
            ->where('tahun', session('tahun'))
            ->firstOrFail();
    }

    protected function setKeysForSaveQuery($query)
    {
        return $query
            ->where('kdprog', $this->getOriginal('kdprog')) // ⬅️ id LAMA
            ->where('tahun', $this->getOriginal('tahun') ?? session('tahun'));
    }

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'kdprog')
            ->where('tahun', session('tahun'));
    }
}
