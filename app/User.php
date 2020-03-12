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
        'username', 'doc_type_id', 'role_id', 'status_id', 'first_name', 'last_name', 'document', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function user_addresses()
    {
        return $this->hasMany('App\UserAddress');
    }

    public function user_phones()
    {
        return $this->hasMany('App\UserPhone');
    }

    public function user_emails()
    {
        return $this->hasMany('App\UserEmail');
    }

    public function orders()
    {
        return $this->hasMany('App\UserOrder');
    }

    public function car_shoppings()
    {
        return $this->hasMany('App\CarShopping');
    }

}
