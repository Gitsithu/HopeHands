<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HelpSeeker extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'division_id',
        'city_id',
        'category_id',
        'location',
        'content',
        'contact',
        'urgent_level',
        'status',
    ];
}
