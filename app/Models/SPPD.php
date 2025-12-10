<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SPPD extends Model
{
    use HasFactory;
    protected $table = 'sppd_main';

    public function spt() {
        return $this->belongsTo(SPT::class, 'spt_id');
    }
}
