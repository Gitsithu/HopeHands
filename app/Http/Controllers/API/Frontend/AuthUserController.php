<?php
namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthUserLoginRequest;
use App\Http\Requests\Auth\AuthUserRegisterRequest;
use App\Traits\ApiResponseTrait;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;

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
            $postData['password']   = Hash::make($postData['password']);
            $postData['is_donator'] = 1;

            if (isset($postData['front_view'])) {
                $postData['front_view'] = $this->uploadImage($postData['front_view'], 'KYC');
            }

            if (isset($postData['back_view'])) {
                $postData['back_view'] = $this->uploadImage($postData['back_view'], 'KYC');
            }
            dd($postData);
            // $user              = User::create($postData);
            // $token             = $user->createToken('User Token')->plainTextToken;
            $postData['token'] = $token;
            DB::commit();
            return $this->successResponse($postData, 'User registered successfully', 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->errorResponse('User registration failed', 500, ['error' => $e->getMessage()]);
        }
    }

    public function login(AuthUserLoginRequest $request)
    {
        // Handle user login logic
    }

    public function logout(Request $request)
    {
        // Handle user logout logic
    }
}