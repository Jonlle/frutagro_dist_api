<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    protected $primaryKey = 'username';
    protected $keyType = 'string';

    protected $fillable = [
        'username', 'doct_type_id', 'rol_id', 'status_id', 'first_name', 'last_name', 'document', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];
}
