<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Util\Message;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Category::orderBy('updated_at')->get();
        return $this->successResponse($data);
    }

    public function store(CategoryStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            Category::create($postData);
            DB::commit();
            return $this->successResponse(Message::createdSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating category: ' . $e->getMessage());
            return $this->successResponse(Message::createdFail);

        }
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            $category = Category::findOrFail($id);
            $category->update($postData);
            DB::commit();
            return $this->successResponse(Message::updatedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating Category: ' . $e->getMessage());
            return $this->errorResponse(Message::updatedFail);
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            DB::commit();
            return $this->successResponse(Message::deletedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error deleting Category: ' . $e->getMessage());
            return $this->errorResponse(Message::deletedFail);
        }
    }
}
