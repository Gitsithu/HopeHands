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
        $type = $request->input('type');
        // $division = $request->input('division');
        $city = $request->input('division');
        $township = $request->input('township');
        $category = $request->input('category');

        if ($type == 'donators') {
            $query = Donate::query()->with('city', 'township', 'category');

            if ($category) {
                $query->where('category_id', $category);
            }

            // if ($division) {
            //     $query->where('division_id', $division);
            // }

            if ($city) {
                $query->where('city_id', $city);
            }

            if ($township) {
                $query->where('township_id', $township);
            }

            $donator = $query->paginate(9);
            return $this->successResponse($donator);
        } else {
            $query = HelpSeeker::query()->with('city', 'township', 'category');

            if ($category) {
                $query->where('category_id', $category);
            }

            // if ($division) {
            //     $query->where('division_id', $division);
            // }

            if ($city) {
                $query->where('city_id', $city);
            }

            if ($township) {
                $query->where('township_id', $township);
            }

            $seeker = $query->paginate(9);
            return $this->successResponse($seeker);
        }
    }

    public function fetchFilter(Request $request)
    {
        $type = $request->input('type');
        $city = $request->input('division');
        $township = $request->input('township');
        $category = $request->input('category');

        if ($type == 'donators') {
            $query = Donate::query()->with('city', 'township', 'category');

            if (!is_null($category)) {
                $query->where('category_id', $category);
            }

            if (!is_null($city)) {
                $query->where('city_id', $city);
            }

            if (!is_null($township)) {
                $query->where('township_id', $township);
            }

            $donator = $query->paginate(9);
            return $this->successResponse($donator);
        } else {
            $query = HelpSeeker::query()->with('city', 'township', 'category');

            $query->when($city, function ($q, $city) {
                $q->where('city_id', $city);
            });

            $query->when($township, function ($q, $township) {
                $q->where('township_id', $township);
            });

            $query->when($category, function ($q, $category) {
                $q->where('category_id', $category);
            });

            $seeker = $query->paginate(9);
            return $this->successResponse($seeker);
        }
    }
}
