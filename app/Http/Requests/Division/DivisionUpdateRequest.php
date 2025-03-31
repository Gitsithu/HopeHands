<?php

namespace App\Http\Requests\Division;

use App\Traits\ApiResponseTrait;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class DivisionUpdateRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'name' => [
                'required',
                Rule::unique('divisions')->ignore($id)->whereNull('deleted_at'),
            ],
            'postal_code' => [
                'nullable',
            ],
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
