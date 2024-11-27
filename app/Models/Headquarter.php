<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    protected $table = 'headquarters';
    protected $fillable = [
        'code',
        'name',
        'image',
    ];

    protected $hidden = [
        'updated_at',
    ];
}
