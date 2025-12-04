<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $table = 'ref_program';
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class, 'program_id');
    }
}
