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
        'township_id',
        'category_id',
        'location',
        'content',
        'contact',
        'urgent_level',
        'status',
    ];

    protected $casts = [
        'contact' => 'json',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class)->select('id', 'name_mm as name');
    }

    public function city()
    {
        return $this->belongsTo(City::class)->select('id', 'name_mm as name');
    }

    public function township()
    {
        return $this->belongsTo(Township::class)->select('id', 'name_mm as name');
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name_mm as name');
    }
}
