<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // use HasRoles;
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'user';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'username',
        'foto',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function getFormattedCreatedAtAttribute()
    {
        return $this->created_at ? \Carbon\Carbon::parse($this->created_at)->translatedFormat('d M Y h:i') : null;
    }
    public function getFormattedTerakhirLoginAttribute()
    {
        return $this->last_login ? \Carbon\Carbon::parse($this->last_login)->translatedFormat('d M Y h:i') : null;
    }
    public function getFormattedTerakhirLogoutAttribute()
    {
        return $this->last_logout ? \Carbon\Carbon::parse($this->last_logout)->translatedFormat('d M Y h:i') : null;
    }
}
