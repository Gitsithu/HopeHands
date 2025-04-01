<?php
namespace App\Models;

use App\Models\CategoryContribution;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_contribution_id',
    ];

    public function categoryContributions()
    {
        return $this->hasMany(CategoryContribution::class);
    }
}
