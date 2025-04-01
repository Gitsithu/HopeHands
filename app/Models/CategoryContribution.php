<?php
namespace App\Models;

use App\Models\Category;
use App\Models\Donator;
use App\Models\HelpSeeker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryContribution extends Model
{
    //
    use SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name_mm as name');
    }

    public function donator()
    {
        return $this->belongsTo(Donator::class, 'donator_id');
    }

    public function helpSeeker()
    {
        return $this->belongsTo(HelpSeeker::class, 'help_seeker_id');
    }
}
