<?php

namespace App\Http\Controllers\Backend;

use App\Models\Donate;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HelpSeeker;

class FetchController extends Controller
{
    use ApiResponseTrait;

    public function filter(Request $request)
    {
        $type = $request->type;

        if ($type == 'donators') {
            $query = Donate::with('city', 'township', 'category');

            $filters = [
                'city_id' => $request->division,
                'category_id' => $request->category,
                'township_id' => $request->township,
            ];

            foreach (array_filter($filters) as $column => $value) {
                $query->where($column, $value);
            }

            $donator = $query->paginate(9);
            return $this->successResponse($donator);
        } else {
            $query = HelpSeeker::with('city', 'township', 'category');

            $filters = [
                'city_id' => $request->division,
                'category_id' => $request->category,
                'township_id' => $request->township,
            ];

            foreach (array_filter($filters) as $column => $value) {
                $query->where($column, $value);
            }

            $seeker = $query->paginate(9);
            return $this->successResponse($seeker);
        }
    }

    public function fetchFilter(Request $request)
    {
        $type = $request->type;

        if ($type == 'donators') {
            $query = Donate::with('city', 'township', 'category');

            $filters = [
                'city_id' => $request->division ? (int) $request->division : null,
                'township_id' => ($request->division && $request->township) ? (int) $request->township : null,
                'category_id' => $request->category ? (int) $request->category : null,
            ];

            foreach (array_filter($filters) as $column => $value) {
                $query->where($column, $value);
            }

            $donator = $query->paginate(9);
            return $this->successResponse($donator);
        } else {
            $query = HelpSeeker::with('city', 'township', 'category');

            $filters = [
                'city_id' => $request->division ? (int) $request->division : null,
                'township_id' => ($request->division && $request->township) ? (int) $request->township : null,
                'category_id' => $request->category ? (int) $request->category : null,
            ];

            foreach (array_filter($filters) as $column => $value) {
                $query->where($column, $value);
            }

            $seeker = $query->paginate(9);
            return $this->successResponse($seeker);
        }
    }
}
