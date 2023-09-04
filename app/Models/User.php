<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = ['id'];
    protected $with = ['userPermissions','position', 'division'];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'uid';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   

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

    public function userPermissions()
    {
        return $this->hasMany(UserPermission::class, 'user_uid', 'uid');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_uid', 'uid');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_uid', 'uid');
    }
}
