<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    // protected $primaryKey = 'status_id';
    // protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id', 'description'
    ];
}
