<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donator extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'phone',
        'division_id',
        'city_id',
        'category_id',
        'status',
    ];

    protected $casts = [
        'contact' => 'array',
    ];
}
