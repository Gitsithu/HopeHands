<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DonatorController extends Controller
{
    public function donators(Request $request)
    {
        $donators = [
            [
                'name' => 'ဦးအောင်မြင့်',
                'township' => 'လှိုင်သာယာ',
                'state' => 'ရန်ကုန်တိုင်း',
                'help_type' => 'ငွေကြေး',
                'image' => 'path/to/image.jpg',
                'phone' => '09 123 456 789',
                'notes' => 'ညနေ 4 နာရီမှ 6 နာရီအတွင်းဖုန်းဆက်နိုင်ပါသည်။'
            ],
            [
                'name' => 'ဒေါ်မြင့်မြင့်ခင်',
                'township' => 'မြင်းခြံ',
                'state' => 'မန္တလေးတိုင်း',
                'help_type' => 'ဆေးဝါး',
                'image' => 'path/to/image.jpg',
                'phone' => '09 987 654 321',
                'notes' => 'ဆေးအမျိုးအစားအတိအကျလိုအပ်ပါသည်။'
            ],
            [
                'name' => 'ဦးကျော်ဇော',
                'township' => 'ပုသိမ်',
                'state' => 'ဧရာဝတီတိုင်း',
                'help_type' => 'အစားအသောက်',
                'image' => 'path/to/image.jpg',
                'phone' => '09 111 222 333',
                'notes' => 'အစားအသောက်များကို မနက် 9 နာရီမှ ညနေ 3 နာရီအတွင်းပို့ပေးနိုင်ပါသည်။'
            ],
            [
                'name' => 'ဒေါ်ခင်စန္ဒာ',
                'township' => 'ကျောက်ဆည်',
                'state' => 'မန္တလေးတိုင်း',
                'help_type' => 'အောက်ဆီဂျင်',
                'image' => 'path/to/image.jpg',
                'phone' => '09 444 555 666',
                'notes' => 'အောက်ဆီဂျင်ဆလင်ဒါများလိုအပ်ပါသည်။'
            ],
            [
                'name' => 'ဦးဝင်းမြင့်',
                'township' => 'ဒက္ခိဏသီရိ',
                'state' => 'နေပြည်တော်',
                'help_type' => 'ကရိန်း',
                'image' => 'path/to/image.jpg',
                'phone' => '09 777 888 999',
                'notes' => 'ကရိန်းကားနှင့်မော်တော်ယာဉ်လိုအပ်ပါသည်။'
            ],
            [
                'name' => 'ဒေါ်နီနီလွင်',
                'township' => 'ဗန်းမော်',
                'state' => 'ကချင်ပြည်နယ်',
                'help_type' => 'အဝတ်အထည်',
                'image' => 'path/to/image.jpg',
                'phone' => '09 000 111 222',
                'notes' => 'ကလေးအဝတ်အစားများလိုအပ်ပါသည်။'
            ],
            [
                'name' => 'ဦးစိုးဝင်း',
                'township' => 'မော်လမြိုင်',
                'state' => 'မွန်ပြည်နယ်',
                'help_type' => 'ငွေကြေး',
                'image' => 'path/to/image.jpg',
                'phone' => '09 333 444 555',
                'notes' => 'ငွေကြေးလှူဒါန်းလိုသူများအတွက် KBZ ဘဏ်အကောင့်ဖွင့်ထားပါသည်။'
            ],
            [
                'name' => 'ဒေါ်သက်သက်အေး',
                'township' => 'စစ်တွေ',
                'state' => 'ရခိုင်ပြည်နယ်',
                'help_type' => 'ဆေးဝါး',
                'image' => 'path/to/image.jpg',
                'phone' => '09 666 777 888',
                'notes' => 'ဆေးဝါးများကို ကျန်းမာရေးဝန်ထမ်းများမှတစ်ဆင့်ပို့ပေးပါသည်။'
            ],
            [
                'name' => 'ဦးလှမြင့်',
                'township' => 'တောင်ကြီး',
                'state' => 'ရှမ်းပြည်နယ်',
                'help_type' => 'အစားအသောက်',
                'image' => 'path/to/image.jpg',
                'phone' => '09 999 000 111',
                'notes' => 'ဆန်နှင့်ဆီများလိုအပ်ပါသည်။'
            ],
            [
                'name' => 'ဒေါ်စန်းစန်းဝင်း',
                'township' => 'ဖာပွန်',
                'state' => 'ကရင်ပြည်နယ်',
                'help_type' => 'အောက်ဆီဂျင်',
                'image' => 'path/to/image.jpg',
                'phone' => '09 222 333 444',
                'notes' => 'အောက်ဆီဂျင်ကိုနေ့စဉ်နံနက် 8 နာရီတွင်ဖြန့်ဝေပါသည်။'
            ],
            [
                'name' => 'ဦးတင်အောင်',
                'township' => 'ဟားခါး',
                'state' => 'ချင်းပြည်နယ်',
                'help_type' => 'ကရိန်း',
                'image' => 'path/to/image.jpg',
                'phone' => '09 555 666 777',
                'notes' => 'အဆောက်အဦပြိုကျမှုအတွက်ကရိန်းလိုအပ်ပါသည်။'
            ],
            [
                'name' => 'ဒေါ်ခင်ခင်လေး',
                'township' => 'လောက်ကိုင်',
                'state' => 'ရှမ်းပြည်နယ်',
                'help_type' => 'အဝတ်အထည်',
                'image' => 'path/to/image.jpg',
                'phone' => '09 888 999 000',
                'notes' => 'အိမ်ထောင်စုအတွက်အဝတ်အစားများလိုအပ်ပါသည်။'
            ],
            [
                'name' => 'ဦးထွန်းရွှေ',
                'township' => 'ပြည်',
                'state' => 'ပဲခူးတိုင်း',
                'help_type' => 'ငွေကြေး',
                'image' => 'path/to/image.jpg',
                'phone' => '09 111 222 333',
                'notes' => 'ငွေကြေးလှူဒါန်းလိုသူများအတွက် AYA ဘဏ်အကောင့်ရှိပါသည်။'
            ],
            [
                'name' => 'ဒေါ်မြင့်မြင့်အေး',
                'township' => 'သရက်',
                'state' => 'မကွေးတိုင်း',
                'help_type' => 'ဆေးဝါး',
                'image' => 'path/to/image.jpg',
                'phone' => '09 444 555 666',
                'notes' => 'ဆီးချိုရောဂါအတွက်ဆေးဝါးများလိုအပ်ပါသည်။'
            ],
            [
                'name' => 'ဦးအောင်ကျော်',
                'township' => 'ကလော',
                'state' => 'ရှမ်းပြည်နယ်',
                'help_type' => 'အစားအသောက်',
                'image' => 'path/to/image.jpg',
                'phone' => '09 777 888 999',
                'notes' => 'ထမင်းနှင့်ဟင်းများကိုနေ့စဉ်နံနက် 10 နာရီတွင်ဖြန့်ဝေပါသည်။'
            ],
            [
                'name' => 'ဒေါ်စန်းရီ',
                'township' => 'ဘားအံ',
                'state' => 'ကရင်ပြည်နယ်',
                'help_type' => 'အောက်ဆီဂျင်',
                'image' => 'path/to/image.jpg',
                'phone' => '09 000 111 222',
                'notes' => 'အောက်ဆီဂျင်ကိုအရေးပေါ်အခြေအနေအတွက်သာအသုံးပြုပါသည်။'
            ],
            [
                'name' => 'ဦးမျိုးသူ',
                'township' => 'မြိတ်',
                'state' => 'တနင်္သာရီတိုင်း',
                'help_type' => 'ကရိန်း',
                'image' => 'path/to/image.jpg',
                'phone' => '09 333 444 555',
                'notes' => 'ကရိန်းကားကိုနေ့စဉ်နံနက် 7 နာရီမှညနေ 5 နာရီအထိငှားနိုင်ပါသည်။'
            ],
            [
                'name' => 'ဒေါ်သန်းသန်းဝင်း',
                'township' => 'ပုလဲ',
                'state' => 'ရှမ်းပြည်နယ်',
                'help_type' => 'အဝတ်အထည်',
                'image' => 'path/to/image.jpg',
                'phone' => '09 666 777 888',
                'notes' => 'မိုးရာသီအတွက်မိုးကာအဝတ်အစားများလိုအပ်ပါသည်။'
            ],
            [
                'name' => 'ဦးအောင်လင်း',
                'township' => 'ရွှေဘို',
                'state' => 'စစ်ကိုင်းတိုင်း',
                'help_type' => 'ငွေကြေး',
                'image' => 'path/to/image.jpg',
                'phone' => '09 999 000 111',
                'notes' => 'ငွေကြေးလှူဒါန်းလိုသူများအတွက် CB ဘဏ်အကောင့်ရှိပါသည်။'
            ],
            [
                'name' => 'ဒေါ်ခင်စိုး',
                'township' => 'ညောင်လေးပန်',
                'state' => 'မန္တလေးတိုင်း',
                'help_type' => 'ဆေးဝါး',
                'image' => 'path/to/image.jpg',
                'phone' => '09 222 333 444',
                'notes' => 'အအေးမိဖျားနာဆေးဝါးများလိုအပ်ပါသည်။'
            ]
        ];

        $donatorsCollection = collect($donators);
        $page = $request->input('page', 1);
        $perPage = 9;
        $paginatedDonators = new LengthAwarePaginator(
            $donatorsCollection->forPage($page, $perPage),
            $donatorsCollection->count(),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );


        return view('frontend.pages.main.donators', ['donators' => $paginatedDonators]);
    }
}
