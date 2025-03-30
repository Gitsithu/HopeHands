<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'division_id',
        'city_id',
        'category_id',
        'title',
        'content',
        'status',
        'password',
        'is_admin',
        'is_donator'
    ];

    protected $casts = [
        'image_url' => 'array',
    ];
}
