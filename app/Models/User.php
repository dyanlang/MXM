<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'middlename',
        'username',
        'email',
        'password',
        'uType',
        'uStat',
    ];

    protected $primaryKey = 'id';
    protected $table = 'users_tb';

    public $timestamps = true;

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function products()
    {
        return $this->hasOne(Product::class);
    }

    public function delivery()
    {
        return $this->hasOne(Delivery::class);
    }

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
        'update_email_verified_at' => 'datetime',
    ];
}
