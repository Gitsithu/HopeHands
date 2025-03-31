<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'division_id',
        'name',
        'name_mm',
        'status',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class)->select('id', 'name');
    }
}
