<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Util\Message;
use App\Models\Donate;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Donation\DonationStoreRequest;
use App\Http\Requests\Donation\DonationUpdateRequest;

class DonationController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Donate::orderBy('updated_at')->get();
        return $this->successResponse($data);
    }

    public function store(DonationStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            Donate::create($postData);
            DB::commit();
            return $this->successResponse(Message::createdSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating donation: ' . $e->getMessage());
            return $this->successResponse(Message::createdFail);

        }
    }

    public function update(DonationUpdateRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            $donation = Donate::findOrFail($id);
            $donation->update($postData);
            DB::commit();
            return $this->successResponse(Message::updatedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating Donation: ' . $e->getMessage());
            return $this->errorResponse(Message::updatedFail);
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try {
            $donation = Donate::findOrFail($id);
            $donation->delete();
            DB::commit();
            return $this->successResponse(Message::deletedSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error deleting Donation: ' . $e->getMessage());
            return $this->errorResponse(Message::deletedFail);
        }
    }
}
