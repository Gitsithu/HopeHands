<?php

namespace App\Http\Controllers\Backend;

use Exception;
use App\Util\Message;
use App\Models\HelpSeeker;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\HelpSeeker\HelpSeekerStoreRequest;

class HelpSeekerController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = HelpSeeker::orderBy('updated_at')->with('division', 'city', 'township', 'category')->paginate(9);
        return $this->successResponse($data);
    }

    public function store(HelpSeekerStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $postData = $request->validated();
            HelpSeeker::create([
                'name' => $postData['name'],
                'phone' => $postData['phone'],
                'city_id' => $postData['city_id'],
                // 'division_id' => $postData['division_id'],
                'category_id' => $postData['category_id'],
                'township_id' => $postData['township_id'],
                'location' => $postData['location'],
                'content' => $postData['content'],
                'urgent_level' => $postData['urgent_level'],
                'link' => $postData['link'],
                'contact' => [
                    'telegram' => $postData['telegram'] ?? null,
                    'telegram_usename' => $postData['telegram_usename'] ?? null,
                    'viber' => $postData['viber'] ?? null,
                ],
            ]);
            DB::commit();
            return $this->successResponse(Message::createdSuccess);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Error creating help seeker: ' . $e->getMessage());
            return $this->successResponse(Message::createdFail);
        }
    }

    // public function update(DonationUpdateRequest $request, $id)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $postData = $request->validated();
    //         $donation = HelpSeeker::findOrFail($id);
    //         $donation->update($postData);
    //         DB::commit();
    //         return $this->successResponse(Message::updatedSuccess);
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         Log::error('Error creating Donation: ' . $e->getMessage());
    //         return $this->errorResponse(Message::updatedFail);
    //     }
    // }

    // public function delete($id)
    // {
    //     DB::beginTransaction();
    //     try {
    //         $donation = HelpSeeker::findOrFail($id);
    //         $donation->delete();
    //         DB::commit();
    //         return $this->successResponse(Message::deletedSuccess);
    //     } catch (Exception $e) {
    //         DB::rollBack();
    //         Log::error('Error deleting Donation: ' . $e->getMessage());
    //         return $this->errorResponse(Message::deletedFail);
    //     }
    // }
}
