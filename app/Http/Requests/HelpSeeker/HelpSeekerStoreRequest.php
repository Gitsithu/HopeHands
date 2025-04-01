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
            // 'division_id' => 'required',
            'category_id' => 'required',
            'township_id' => 'nullable',
            'location' => 'required',
            'contact' => "nullable",
            'content' => 'required',
            'urgent_level' => 'required',
            'viber' => 'required_without:telegram|string|regex:/^\+[1-9]\d{7,10}$/',
            'telegram' => 'required_without:viber|string|regex:/^\+[1-9]\d{7,10}$/',
            'telegram_usename' => 'required_without_all:viber,telegram',
        ];
    }
    public function messages()
    {
        return [
            'name.required'                     => 'အကူအညီတောင်းခံသူဧ။် အမည် ဖြည့်ရန်လိုအပ်ပါသည်။',
            'city_id.required'                      => 'မြို့ရွေးချယ်ရန်လိုအပ်ပါသည်။',
            'city_id.exists'                        => 'ရွေးချယ်ထားသော မြို့သည် မရှိပါ။',
            'township_id.required'                  => 'မြို့နယ်ရွေးချယ်ရန်လိုအပ်ပါသည်။',
            'township_id.exists'                    => 'ရွေးချယ်ထားသော မြို့နယ်သည် မရှိပါ။',
            'location.required'                     => 'တည်နေရာရွေးချယ်ရန်လိုအပ်ပါသည်။',
            'content.required'                      => 'အကြောင်းအရာဖြည့်စွက်ရန်လိုအပ်ပါသည်။',
            'urgent_level.required'                 => 'အရေးအပေါ်အခြေအနသတ်မှန်ရန် လိူအပ်ပါသည်။',
            'category_id.required'                  => 'အမျိုးအစားရွေးချယ်ရန်လိုအပ်ပါသည်။',
            'category_id.exists'                    => 'ရွေးချယ်ထားသော အမျိုးအစားသည် မရှိပါ။',
            'phone.required'                        => 'ဖုန်းနံပါတ် ဖြည့်ရန်လိုအပ်ပါသည်။',
            'phone.unique'                          => 'ဤ ဖုန်းနံပါတ်သည် ရှိပြီးသား ဖြစ်ပါသည်။',
            'viber.required_without'                => 'Viber သို့မဟုတ် Telegram မှာ တစ်ခုခု ဖြည့်ရန်လိုအပ်ပါသည်။',
            'viber.string'                          => 'Viber ID သည် စာသားဖြစ်ရမည်။',
            'viber.regex'                           => 'Viber နံပါတ်သည် + သင်္ကေတဖြင့် စပြီး မှန်ကန်သော နံပါတ် ဖြစ်ရမည်။',
            'telegram.required_without'             => 'Telegram သို့မဟုတ် Viber မှာ တစ်ခုခု ဖြည့်ရန်လိုအပ်ပါသည်။',
            'telegram.string'                       => 'Telegram ID သည် စာသားဖြစ်ရမည်။',
            'telegram.regex'                        => 'Telegram နံပါတ်သည် + သင်္ကေတဖြင့် စပြီး မှန်ကန်သော နံပါတ် ဖြစ်ရမည်။',
            'telegram_usename.required_without_all' => 'Viber, Telegram တစ်ခုခုမရှိလျှင် Telegram အသုံးပြုသူအမည် ဖြည့်ရန်လိုအပ်ပါသည်။',
            'remark.required'                       => 'မှတ်ချက် ဖြည့်ရန်လိုအပ်ပါသည်။',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = $validator->errors()->toArray();

        $response = $this->errorResponse('Validate Error', 422, $errors);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
