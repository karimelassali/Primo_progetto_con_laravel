<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    //
    protected $fillable = [
        'title', 
        'preority',
        'publisher',
        'finished',
    ];
}
