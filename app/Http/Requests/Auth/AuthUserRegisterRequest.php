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
            // 'password'         => 'required|min:6',
            // 'confirm_password' => 'same:password',
            // 'front_view'       => 'required|image|mimes:png,jpg,jpeg',
            // 'back_view'        => 'required|image|mimes:png,jpg,jpeg',
            'city_id'          => 'required|exists:cities,id',
            'township_id'      => 'required|exists:townships,id',
            'category_id'      => 'required|exists:categories,id',
            'phone'            => 'required|unique:users,phone',
            'viber'            => 'required_without:telegram|string|regex:/^\+[1-9]\d{7,12}$/',
            'telegram'         => 'required_without:viber|string|regex:/^\+[1-9]\d{7,12}$/',
            'telegram_usename' => 'required_without_all:viber,telegram',
            'remark'           => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required'                     => 'သင့်၏ အသုံးပြုသူအမည် ဖြည့်ရန်လိုအပ်ပါသည်။',
            'username.unique'                       => 'ဤ အသုံးပြုသူအမည်သည် ရှိပြီးသား ဖြစ်ပါသည်။',
            // 'password.required'                     => 'စကားဝှက် ဖြည့်ရန်လိုအပ်ပါသည်။',
            // 'password.min'                          => 'စကားဝှက်တွင် အနည်းဆုံး ၆ လုံး ပါဝင်ရမည်။',
            // 'confirm_password.same'                 => 'စကားဝှက် နှင့် ကိုက်ညီမှုမရှိပါ။',
            // 'front_view.required'                   => 'ရှေ့ပုံကို တင်သွင်းရန်လိုအပ်ပါသည်။',
            // 'front_view.image'                      => 'ရှေ့ပုံသည် ဓာတ်ပုံဖိုင် ဖြစ်ရမည်။',
            // 'front_view.mimes'                      => 'ရှေ့ပုံသည် PNG, JPG, JPEG အမျိုးအစားဖြစ်ရမည်။',
            // 'back_view.required'                    => 'နောက်ပုံကို တင်သွင်းရန်လိုအပ်ပါသည်။',
            // 'back_view.image'                       => 'နောက်ပုံသည် ဓာတ်ပုံဖိုင် ဖြစ်ရမည်။',
            // 'back_view.mimes'                       => 'နောက်ပုံသည် PNG, JPG, JPEG အမျိုးအစားဖြစ်ရမည်။',
            'city_id.required'                      => 'မြို့ရွေးချယ်ရန်လိုအပ်ပါသည်။',
            'city_id.exists'                        => 'ရွေးချယ်ထားသော မြို့သည် မရှိပါ။',
            'township_id.required'                  => 'မြို့နယ်ရွေးချယ်ရန်လိုအပ်ပါသည်။',
            'township_id.exists'                    => 'ရွေးချယ်ထားသော မြို့နယ်သည် မရှိပါ။',
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

        $response = $this->errorResponse('Validation Error', 422, $errors);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}