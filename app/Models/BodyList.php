<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyList extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'injure',
        'lost',
        'dead',
        'status',
    ];
}
