<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Township extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'division_id',
        'name',
        'name_mm',
        'status',
    ];
}
