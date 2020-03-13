<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'id', 'status_id', 'description'
    ];
}
