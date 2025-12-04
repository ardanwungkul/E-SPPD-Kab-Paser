<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'ref_program2';

    protected $primaryKey = 'kdprog';
    public $incrementing = false;
    protected $keyType = 'string';

    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'program_id');
    }
}
