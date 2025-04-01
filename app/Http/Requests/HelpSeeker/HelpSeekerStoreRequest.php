<?php
namespace App\Http\Requests\HelpSeeker;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class HelpSeekerStoreRequest extends FormRequest
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
            'name'             => [
                'required',
            ],
            'phone'            => 'required',
            'city_id'          => 'required',
            // 'division_id' => 'required',
            'category_id'      => 'required',
            'township_id'      => 'nullable',
            'location'         => 'required',
            'contact'          => "nullable",
            'content'          => 'required',
            'urgent_level'     => 'required',
            'viber'            => 'required_without:telegram|string|regex:/^\+[1-9]\d{7,15}$/',
            'telegram'         => 'required_without:viber|string|regex:/^\+[1-9]\d{7,15}$/',
            'telegram_usename' => 'required_without_all:viber,telegram',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        $response = $this->errorResponse('Validate Error', 422, $errors);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
