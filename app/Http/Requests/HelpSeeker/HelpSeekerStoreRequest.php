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
            'name' => [
                'required',
            ],
            'phone' => 'required',
            'city_id' => 'required',
            'division_id' => 'required',
            'category_id' => 'required',
            'location' => 'required',
            'contact' => "nullable",
            'content' => 'required',
            'urgent_level' => 'required',
            // 'viber' => 'required_without:telegram|phone:international',
            // 'telegram' => 'required_without:viber|phone:international',
            'viber' => 'required_without:telegram',
            'telegram' => 'required_without:viber',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        $response = $this->errorResponse('Validate Error', 422, $errors);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
