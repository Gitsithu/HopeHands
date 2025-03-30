<?php

namespace App\Http\Requests\HelpSeeker;

use Illuminate\Foundation\Http\FormRequest;

class HelpSeekerStoreRequest extends FormRequest
{
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
            ],
            'phone' => 'nullable|min:8|regex:/^([0-9\s\-\+\(\)]*)$/|max:12',
            'city_id' => 'required',
            'division_id' => 'required',
            'category_id' => 'required',
            'location' => 'required',
            'contact' => 'required|json',
            'content' => 'required',
            'urgent_level' => 'required',
            'status' => 1
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        $response = $this->errorResponse('Validate Error', 422, $errors);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
