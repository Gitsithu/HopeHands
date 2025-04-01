<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Donator;
use App\Models\HelpSeeker;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FetchController extends Controller
{
    use ApiResponseTrait;

    public function filter(Request $request)
    {
        Log::info('Request', [$request->all()]);
        $type = $request->type;
        if ($type == 'donators') {
            $query = Donator::with('city', 'township', 'category', 'user', 'categoryContributions.category');
        } elseif ($type == 'receivers') {
            $query = HelpSeeker::with('city', 'township', 'category');
        } else {
            $data = Donator::with('city', 'township', 'category', 'user', 'categoryContributions.category')->orderBy('updated_at')->paginate(9);
            return $this->successResponse($data);
        }

        if ($request->division) {
            $query->where('city_id', (int) $request->division);
            Log::info('Division work');
        }
        if ($request->township) {
            $query->where('township_id', (int) $request->township);
            Log::info('Township work');
        }
        if ($request->category) {
            $categoryId = (int) $request->category;
            $query->whereHas('categoryContributions', function ($q) use ($categoryId, $type) {
                $q->where('category_id', $categoryId);
                if ($type == 'donators') {
                    $q->whereNull('help_seeker_id');
                } elseif ($type == 'receivers') {
                    $q->whereNull('donator_id');
                }
            });
            Log::info('category work');
        }
        $data = $query->orderBy('updated_at', 'desc')->paginate(9);

        return $this->successResponse($data);
    }

    public function fetchFilter(Request $request)
    {
        $type = $request->type;
        if ($type == 'donators') {
            $query = Donator::with('city', 'township', 'category', 'user');
        } elseif ($type == 'receivers') {
            $query = HelpSeeker::with('city', 'township', 'category');
        } else {
            $data = HelpSeeker::with('city', 'township', 'category')->orderBy('updated_at')->paginate(9);
            return $this->successResponse($data);
        }

        if ($request->division) {
            $query->where('city_id', (int) $request->division);
            Log::info('Division work');
        }
        if ($request->township) {
            $query->where('township_id', (int) $request->township);
            Log::info('Township work');
        }
        if ($request->category) {
            $categoryId = (int) $request->category;
            $query->whereHas('categoryContributions', function ($q) use ($categoryId, $type) {
                $q->where('category_id', $categoryId);
                if ($type == 'donators') {
                    $q->whereNull('help_seeker_id');
                } elseif ($type == 'receivers') {
                    $q->whereNull('donator_id');
                }
            });
            Log::info('category work');
        }

        // $filters = [
        //     'city_id'     => $request->division ? (int) $request->division : null,
        //     'township_id' => ($request->division && $request->township) ? (int) $request->township : null,
        //     'category_id' => $request->category ? (int) $request->category : null,
        // ];

        // foreach (array_filter($filters) as $column => $value) {
        //     $query->where($column, $value);
        // }

        $data = $query->orderBy('updated_at')->paginate(9);
        return $this->successResponse($data);
    }
}
