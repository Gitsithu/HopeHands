<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'division_id',
        'city_id',
        'township_id',
        'title',
        'content',
        'link',
        'status',
        'image_url',
        'thumbnail',
    ];

    protected $casts = [
        'image_url' => 'array',
    ];

    public function city()
    {
        return $this->belongsTo(City::class)->select('id', 'name_mm as name');
    }

    public function township()
    {
        return $this->belongsTo(Township::class)->select('id', 'name_mm as name');
    }
}
