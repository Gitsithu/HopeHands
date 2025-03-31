<?php

namespace App\Http\Controllers\Backend;

use App\Models\Donator;
use App\Models\HelpSeeker;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class FetchController extends Controller
{
    use ApiResponseTrait;

    public function filter(Request $request)
    {
        $type = $request->type;
        if ($type == 'donators') {
            $query = Donator::with('city', 'township', 'category');
        } elseif ($type == 'receivers') {
            $query = HelpSeeker::with('city', 'township', 'category');
        } else {
            $data = Donator::with('city', 'township', 'category')->orderBy('updated_at')->paginate(9);
            return $this->successResponse($data);
        }

        $filters = [
            'city_id' => $request->division ? (int) $request->division : null,
            'township_id' => ($request->division && $request->township) ? (int) $request->township : null,
            'category_id' => $request->category ? (int) $request->category : null,
        ];

        foreach (array_filter($filters) as $column => $value) {
            $query->where($column, $value);
        }

        $data = $query->orderBy('updated_at')->paginate(9);

        return $this->successResponse($data);
    }

    public function fetchFilter(Request $request)
    {
        $type = $request->type;
        if ($type == 'donators') {
            $query = Donator::with('city', 'township', 'category');
        } elseif ($type == 'receivers') {
            $query = HelpSeeker::with('city', 'township', 'category');
        } else {
            $data = HelpSeeker::with('city', 'township', 'category')->orderBy('updated_at')->paginate(9);
            return $this->successResponse($data);
        }

        $filters = [
            'city_id' => $request->division ? (int) $request->division : null,
            'township_id' => ($request->division && $request->township) ? (int) $request->township : null,
            'category_id' => $request->category ? (int) $request->category : null,
        ];

        foreach (array_filter($filters) as $column => $value) {
            $query->where($column, $value);
        }

        $data = $query->orderBy('updated_at')->paginate(9);
        return $this->successResponse($data);
    }
}
