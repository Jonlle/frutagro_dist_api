<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // protected $primaryKey = 'rol_id';
    // protected $keyType = 'string';

    protected $fillable = [
        'id', 'status_id', 'description'
    ];
}
