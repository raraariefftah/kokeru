<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama', 'email', 'password', 'no_hp'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tugas()
    {
        return $this->hasMany(Tugas::class);
    }
}
