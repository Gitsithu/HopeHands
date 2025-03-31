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
}
