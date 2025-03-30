<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donator extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'division_id',
        'city_id',
        'category_id',
        'township_id',
        'user_id',
        'phone',
        'contact',
        'remark',
        'status',
    ];

    protected $casts = [
        'contact' => 'array',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function township()
    {
        return $this->belongsTo(Township::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}