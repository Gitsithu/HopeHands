<?php
namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthUserLoginRequest;
use App\Http\Requests\Auth\AuthUserRegisterRequest;
use App\Models\CategoryContribution;
use App\Models\Donator;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthUserController extends Controller
{
    use ApiResponseTrait;
    use ImageUploadTrait;

    public function register(AuthUserRegisterRequest $request)
    {

        // Handle user registration logic
        DB::beginTransaction();
        try {
            $postData               = $request->validated();
            $postData['is_donator'] = 1;
            $postData['name']       = $postData['username'];
            $user                   = User::create($postData);

            $donator = [
                'city_id'     => $postData['city_id'],
                'township_id' => $postData['township_id'],
                'phone'       => $postData['phone'],
                'link'        => $postData['link'] ?? null,
                'contact'     => [
                    'viber'            => $postData['viber'] ?? null,
                    'telegram'         => $postData['telegram'] ?? null,
                    'telegram_usename' => $postData['telegram_usename'] ?? null,
                ],
                'remark'      => $postData['remark'] ?? null,
                'user_id'     => $user->id,
            ];
            $data            = Donator::create($donator);
            $categoryDonator = [
                'donator_id' => $data['id'],
            ];
            foreach ($postData['category_ids'] as $category) {
                $categoryDonator['category_id'] = $category;
                CategoryContribution::create($categoryDonator);
            }
            DB::commit();
            return $this->successResponse($user, 'User registered successfully', 201);
        } catch (\Exception $e) {
            Log::info('Error :' . $e);
            DB::rollBack();
            return $this->errorResponse('User registration failed', 500, ['error' => $e->getMessage()]);
        }
    }

    public function login(AuthUserLoginRequest $request)
    {
        // Handle user login logic
        DB::beginTransaction();
        try {
            $credentials = $request->only('username', 'password');

            if (! Auth::attempt($credentials)) {
                return $this->errorResponse('Invalid credentials', 401);
            }

            $user  = Auth::user();
            $token = $user->createToken('User Token')->plainTextToken;

            DB::commit();
            $user['token'] = $token;
            return $this->successResponse($user, 'Login successful', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Login failed',
                'error'   => $e->getMessage(),
            ], 500);
        }

    }

    public function logout(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = auth()->guard('api')->user();

            if (! $user) {
                return $this->errorResponse('Fail', 500);
            }

            // Delete all tokens for the user (Logging out)
            $user->tokens()->delete();

            DB::commit();

            return $this->successResponse([], 'Logout successful', 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse('Logout failed', 500, ['error' => $e->getMessage()]);
        }
    }

    public function lists()
    {
        try {
            $user = auth()->guard('api')->user();

            $query = Donator::with(['user', 'division', 'city', 'township', 'category', 'categoryContributions.category'])->orderByDesc('created_at');

            if ($user) {
                $query->where('user_id', '!=', $user->id);
            }

            $donators = $query->paginate(9);

            if ($donators->isEmpty()) {
                return $this->errorResponse('Donator not found', 500, ['error' => 'not data found']);
            }
            return $this->successResponse($donators);
        } catch (\Exception $e) {
            return $this->errorResponse('Donator Fetched fail', 500, ['error' => 'not data found']);
        }
    }

    public function remark(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'remark' => 'required|string|max:500',
            ]);
            $user = auth()->guard('api')->user();

            $donator         = Donator::where('user_id', $user->id)->first();
            $donator->remark = $request->remark;
            $donator->save();

            DB::commit();
            return $this->successResponse([]);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse('Remark Fetch Fail', 500, ['error' => $e->getMessage()]);
        }

    }
}