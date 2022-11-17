<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function administrator()
    {
        return $this->hasOne(Administrator::class);
    }

     public function candidat()
    {
        return $this->hasOne(Candidat::class);
    }

    public function enterprise()
    {
        return $this->hasOne(Enterprise::class);
    }

         public function imprimeur()
    {
        return $this->hasOne(Imprimeur::class);
    }
}
