<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKegiatan2 extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'ref_kegiatan_sub2';

    protected $primaryKey = 'kdsub';
    public $incrementing = false;
    protected $keyType = 'string';

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan2::class, 'kdgiat');
    }
    public function getFormattedKodeAttribute()
    {
        return $this->kegiatan->formatted_kode . '.' . $this->kode;
    }
}
