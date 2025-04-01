<?php

namespace App\Http\Controllers\API\Frontend;

use App\Traits\ImageUploadTrait;
use Exception;
use App\Util\Message;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleStoreRequest;
use App\Http\Requests\Article\ArticleUpdateRequest;
use App\Models\Blog;

class ArticleController extends Controller
{
    use ApiResponseTrait;
    use ImageUploadTrait;

    public function index()
    {
        $data = Blog::orderBy('updated_at')->with('city', 'township')->get();
        return $this->successResponse($data);
    }

    public function store(ArticleStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();

            if (isset($postData['image_1'])) {
                $postData['image_1'] = $this->uploadImage($postData['image_1'], 'Article');
            }

            if (isset($postData['image_2'])) {
                $postData['image_2'] = $this->uploadImage($postData['image_2'], 'Article');
            }

            if (isset($postData['thumbnail'])) {
                $postData['thumbnail'] = $this->uploadImage($postData['thumbnail'], 'Article');
            }

            $postData['image_url'] = [
                'image_1' => $postData['image_1'] ?? null,
                'image_2'  => $postData['image_2'] ?? null,
            ];

            Blog::create($postData);
            DB::commit();
            return $this->successResponse(Message::createdSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating article: ' . $e->getMessage());
            return $this->successResponse(Message::createdFail);
        }
    }

    public function update(ArticleUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            $article = Blog::findOrFail($id);
            $article->update($postData);
            DB::commit();
            return $this->successResponse(Message::updatedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating Article: ' . $e->getMessage());
            return $this->errorResponse(Message::updatedFail);
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $article = Blog::findOrFail($id);
            $article->delete();
            DB::commit();
            return $this->successResponse(Message::deletedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error deleting Article: ' . $e->getMessage());
            return $this->errorResponse(Message::deletedFail);
        }
    }
}
