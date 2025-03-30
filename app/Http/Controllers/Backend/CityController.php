<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Models\City;
use App\Util\Message;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\City\CityStoreRequest;
use App\Http\Requests\City\CityUpdateRequest;

class CityController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = City::orderBy('updated_at')->with('division')->get();
        return $this->successResponse($data);
    }

    public function store(CityStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            City::create($postData);
            DB::commit();
            return $this->successResponse(Message::createdSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating division: ' . $e->getMessage());
            return $this->successResponse(Message::createdFail);

        }
    }

    public function update(CityUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            $division = City::findOrFail($id);
            $division->update($postData);
            DB::commit();
            return $this->successResponse(Message::updatedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating division: ' . $e->getMessage());
            return $this->errorResponse(Message::updatedFail);
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $division = City::findOrFail($id);
            $division->delete();
            DB::commit();
            return $this->successResponse(Message::deletedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error deleting division: ' . $e->getMessage());
            return $this->errorResponse(Message::deletedFail);
        }
    }
}

