<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Util\Message;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Division\DivisionStoreRequest;
use App\Http\Requests\Division\DivisionUpdateRequest;

class DivisionController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Division::orderBy('updated_at')->select('id', 'name_mm as name')->get();
        return $this->successResponse($data);
    }

    public function store(DivisionStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            Division::create($postData);
            DB::commit();
            return $this->successResponse(Message::createdSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating division: ' . $e->getMessage());
            return $this->successResponse(Message::createdFail);
        }
    }

    public function update(DivisionUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            $division = Division::findOrFail($id);
            $division->update($postData);
            DB::commit();
            return $this->successResponse(Message::updatedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating Contact Form: ' . $e->getMessage());
            return $this->errorResponse(Message::updatedFail);
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $division = Division::findOrFail($id);
            $division->delete();
            DB::commit();
            return $this->successResponse(Message::deletedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error deleting Contact Form: ' . $e->getMessage());
            return $this->errorResponse(Message::deletedFail);
        }
    }

    // public function find($id)
    // {
    //     $term = Term::find($id);
    //     if ($term) {
    //         return response()->json($term);
    //     }
    //     return response()->json(['error' => 'Term not found'], 404);
    // }
}
