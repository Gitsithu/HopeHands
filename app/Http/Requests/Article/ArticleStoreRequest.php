<?php

namespace App\Http\Requests\Article;

use App\Traits\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;

class ArticleStoreRequest extends FormRequest
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
            'city_id' => 'required|exists:cities,id',
            'township_id' => 'required|exists:townships,id',
            'title' => 'required',
            'content' => 'required',
            'image_url' => 'nullable',
            'link' => 'nullable',
            'image_1' => 'nullable',
            'image_2' => 'nullable',
            'thumbnail' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'city_id.required' => 'မြို့ရွေးချယ်ရန်လိုအပ်ပါသည်။',
            'city_id.exists' => 'ရွေးချယ်ထားသော မြို့သည် မရှိပါ။',
            'township_id.required' => 'မြို့နယ်ရွေးချယ်ရန်လိုအပ်ပါသည်။',
            'township_id.exists' => 'ရွေးချယ်ထားသော မြို့နယ်သည် မရှိပါ။',
            'title.required' => ' သတင်းခေါင်းစဉ် လိုအပ်ပါသည်။',
            'content.required' => 'သတင်းအကြောင်းအရာ လိုအပ်ပါသည်။',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        $response = $this->errorResponse('Validation Error', 422, $errors);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
