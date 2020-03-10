<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'rol_id';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'role_id', 'status_id', 'description'
    ];
}
