<?php

namespace App\Http\Requests\Donation;

use Illuminate\Validation\Rule;
use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class DonationStoreRequest extends FormRequest
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
            'name' => [
                'required',
                Rule::unique('donates')->whereNull('deleted_at'),
            ],
            'link' => 'required',
            'status' => [
                'nullable',
            ],
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        $response = $this->errorResponse('Validate Error', 422, $errors);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
