<?php
namespace App\Http\Requests\Auth;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class AuthUserRegisterRequest extends FormRequest
{
    use ApiResponseTrait;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username'         => 'required|unique:users,username',
            'password'         => 'required|min:6',
            'front_view'       => 'required|image|mimes:png,jpg,jpeg',
            'back_view'        => 'required|image|mimes:png,jpg,jpeg',
            'division_id'      => 'required|exists:divisions,id',
            'city_id'          => 'required|exists:cities,id',
            'township_id'      => 'required|exists:townships,id',
            'category_id'      => 'required|exists:categories,id',
            'phone'            => 'required|unique:users,phone',
            'viber'            => 'required_without:telegram|phone:international',
            'telegram'         => 'required_without:viber|phone:international',
            'telegram_usename' => 'required_without:telegram',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        $response = $this->errorResponse('Validation Error', 422, $errors);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}