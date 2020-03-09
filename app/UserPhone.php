<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPhone extends Model
{
    protected $primaryKey = 'phone_number';
    protected $keyType = 'string';
}
