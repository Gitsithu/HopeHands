<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Division;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            // ==================== AYEYARWADY DIVISION ====================
            ['division_id' => 1, 'name' => 'Pathein', 'name_mm' => 'ပုသိမ်မြို့', 'status' => 1], // Capital
            ['division_id' => 1, 'name' => 'Hinthada', 'name_mm' => 'ဟင်္သာတမြို့', 'status' => 1],
            ['division_id' => 1, 'name' => 'Maubin', 'name_mm' => 'မအူပင်', 'status' => 1],
            ['division_id' => 1, 'name' => 'Pyapon', 'name_mm' => 'ဖျာပုံမြို့', 'status' => 1],
            ['division_id' => 1, 'name' => 'Labutta', 'name_mm' => 'လပွတ္တာမြို့', 'status' => 1],
            ['division_id' => 1, 'name' => 'Myaungmya', 'name_mm' => 'မြောင်းမြမြို့', 'status' => 1],
            ['division_id' => 1, 'name' => 'Wakema', 'name_mm' => 'ဝါးခယ်မမြို့', 'status' => 1],
            ['division_id' => 1, 'name' => 'Danubyu', 'name_mm' => 'ဓနုဖြူမြို့', 'status' => 1],

            // ==================== BAGO DIVISION ====================
            ['division_id' => 2, 'name' => 'Bago', 'name_mm' => 'ပဲခူးမြို့', 'status' => 1], // Capital
            ['division_id' => 2, 'name' => 'Pyay', 'name_mm' => 'ပြည်မြို့', 'status' => 1],
            ['division_id' => 2, 'name' => 'Taungoo', 'name_mm' => 'တောင်ငူမြို့', 'status' => 1],
            ['division_id' => 2, 'name' => 'Nyaunglebin', 'name_mm' => 'ညောင်လေးပင်', 'status' => 1],
            ['division_id' => 2, 'name' => 'Thanatpin', 'name_mm' => 'သနပ်ပင်', 'status' => 1],
            ['division_id' => 2, 'name' => 'Daik-U', 'name_mm' => 'ဒိုက်ဦးမြို့', 'status' => 1],
            ['division_id' => 2, 'name' => 'Shwegyin', 'name_mm' => 'ရွှေကျင်မြို့', 'status' => 1],

            // ==================== CHIN STATE ====================
            ['division_id' => 3, 'name' => 'Hakha', 'name_mm' => 'ဟားခါးမြို့', 'status' => 1], // Capital
            ['division_id' => 3, 'name' => 'Falam', 'name_mm' => 'ဖလမ်းမြို့', 'status' => 1],
            ['division_id' => 3, 'name' => 'Mindat', 'name_mm' => 'မင်းတပ်မြို့', 'status' => 1],
            ['division_id' => 3, 'name' => 'Matupi', 'name_mm' => 'မတူပီမြို့', 'status' => 1],
            ['division_id' => 3, 'name' => 'Paletwa', 'name_mm' => 'ပလက်ဝမြို့', 'status' => 1],

            // ==================== KACHIN STATE ====================
            ['division_id' => 4, 'name' => 'Myitkyina', 'name_mm' => 'မြစ်ကြီးနားမြို့', 'status' => 1], // Capital
            ['division_id' => 4, 'name' => 'Bhamo', 'name_mm' => 'ဗန်းမော်မြို့', 'status' => 1],
            ['division_id' => 4, 'name' => 'Putao', 'name_mm' => 'ပူတာအိုမြို့', 'status' => 1],
            ['division_id' => 4, 'name' => 'Mohnyin', 'name_mm' => 'မိုးညှင်းမြို့', 'status' => 1],
            ['division_id' => 4, 'name' => 'Chipwi', 'name_mm' => 'ချီဖွေမြို့', 'status' => 1],

            // ==================== KAYAH STATE ====================
            ['division_id' => 5, 'name' => 'Loikaw', 'name_mm' => 'လွိုင်ကော်မြို့', 'status' => 1], // Capital
            ['division_id' => 5, 'name' => 'Demoso', 'name_mm' => 'ဒီမောဆိုမြို့', 'status' => 1],
            ['division_id' => 5, 'name' => 'Hpruso', 'name_mm' => 'ဖရူဆိုမြို့', 'status' => 1],
            ['division_id' => 5, 'name' => 'Bawlakhe', 'name_mm' => 'ဘော်လခဲမြို့', 'status' => 1],

            // ==================== KAYIN STATE ====================
            ['division_id' => 6, 'name' => 'Hpa-an', 'name_mm' => 'ဘားအံမြို့', 'status' => 1], // Capital
            ['division_id' => 6, 'name' => 'Myawaddy', 'name_mm' => 'မြဝတီမြို့', 'status' => 1],
            ['division_id' => 6, 'name' => 'Kawkareik', 'name_mm' => 'ကော့ကရိတ်မြို့', 'status' => 1],
            ['division_id' => 6, 'name' => 'Hlaingbwe', 'name_mm' => 'လှိုင်းဘွဲ့မြို့', 'status' => 1],

            // ==================== MAGWAY REGION ====================
            ['division_id' => 7, 'name' => 'Magway', 'name_mm' => 'မကွေးမြို့', 'status' => 1], // Capital
            ['division_id' => 7, 'name' => 'Pakokku', 'name_mm' => 'ပခုက္ကူမြို့', 'status' => 1],
            ['division_id' => 7, 'name' => 'Minbu', 'name_mm' => 'မင်းဘူးမြို့', 'status' => 1],
            ['division_id' => 7, 'name' => 'Thayet', 'name_mm' => 'သရက်မြို့', 'status' => 1],
            ['division_id' => 7, 'name' => 'Yenangyaung', 'name_mm' => 'ရေနံချောင်းမြို့', 'status' => 1],

            // ==================== MANDALAY REGION ====================
            ['division_id' => 8, 'name' => 'Mandalay', 'name_mm' => 'မန္တလေးမြို့', 'status' => 1], // Capital
            ['division_id' => 8, 'name' => 'Pyinoolwin', 'name_mm' => 'ပြင်ဦးလွင်မြို့', 'status' => 1],
            ['division_id' => 8, 'name' => 'Meiktila', 'name_mm' => 'မိတ္ထီလာမြို့', 'status' => 1],
            ['division_id' => 8, 'name' => 'Myingyan', 'name_mm' => 'မြင်းခြံမြို့', 'status' => 1],
            ['division_id' => 8, 'name' => 'Kyaukse', 'name_mm' => 'ကျောက်ဆည်မြို့', 'status' => 1],

            // ==================== MON STATE ====================
            ['division_id' => 9, 'name' => 'Mawlamyine', 'name_mm' => 'မော်လမြိုင်မြို့', 'status' => 1], // Capital
            ['division_id' => 9, 'name' => 'Thaton', 'name_mm' => 'သထုံမြို့', 'status' => 1],
            ['division_id' => 9, 'name' => 'Kyaikto', 'name_mm' => 'ကျိုက်ထိုမြို့', 'status' => 1],
            ['division_id' => 9, 'name' => 'Ye', 'name_mm' => 'ရေးမြို့', 'status' => 1],
            ['division_id' => 9, 'name' => 'Chaungzon', 'name_mm' => 'ချောင်းဆုံမြို့', 'status' => 1],

            // ==================== RAKHINE STATE ====================
            ['division_id' => 10, 'name' => 'Sittwe', 'name_mm' => 'စစ်တွေမြို့', 'status' => 1], // Capital
            ['division_id' => 10, 'name' => 'Mrauk-U', 'name_mm' => 'မြောက်ဦးမြို့', 'status' => 1],
            ['division_id' => 10, 'name' => 'Thandwe', 'name_mm' => 'သံတွဲမြို့', 'status' => 1],
            ['division_id' => 10, 'name' => 'Kyaukpyu', 'name_mm' => 'ကျောက်ဖြူမြို့', 'status' => 1],
            ['division_id' => 10, 'name' => 'Maungdaw', 'name_mm' => 'မောင်တောမြို့', 'status' => 1],

            // ==================== SAGAING REGION ====================
            ['division_id' => 11, 'name' => 'Sagaing', 'name_mm' => 'စစ်ကိုင်းမြို့', 'status' => 1], // Capital
            ['division_id' => 11, 'name' => 'Monywa', 'name_mm' => 'မုံရွာမြို့', 'status' => 1],
            ['division_id' => 11, 'name' => 'Shwebo', 'name_mm' => 'ရွှေဘိုမြို့', 'status' => 1],
            ['division_id' => 11, 'name' => 'Katha', 'name_mm' => 'ကသာမြို့', 'status' => 1],
            ['division_id' => 11, 'name' => 'Kalay', 'name_mm' => 'ကလေးမြို့', 'status' => 1],

            // ==================== SHAN STATE ====================
            ['division_id' => 12, 'name' => 'Taunggyi', 'name_mm' => 'တောင်ကြီးမြို့', 'status' => 1], // Capital
            ['division_id' => 12, 'name' => 'Lashio', 'name_mm' => 'လားရှိုးမြို့', 'status' => 1],
            ['division_id' => 12, 'name' => 'Kengtung', 'name_mm' => 'ကျိုင်းတုံမြို့', 'status' => 1],
            ['division_id' => 12, 'name' => 'Tachileik', 'name_mm' => 'တာချီလိတ်မြို့', 'status' => 1],
            ['division_id' => 12, 'name' => 'Muse', 'name_mm' => 'မူဆယ်မြို့', 'status' => 1],

            // ==================== TANINTHARYI REGION ====================
            ['division_id' => 13, 'name' => 'Dawei', 'name_mm' => 'ထားဝယ်မြို့', 'status' => 1], // Capital
            ['division_id' => 13, 'name' => 'Myeik', 'name_mm' => 'မြိတ်မြို့', 'status' => 1],
            ['division_id' => 13, 'name' => 'Kawthoung', 'name_mm' => 'ကော့သောင်းမြို့', 'status' => 1],
            ['division_id' => 13, 'name' => 'Thayetchaung', 'name_mm' => 'သရက်ချောင်းမြို့', 'status' => 1],

            // ==================== YANGON REGION ====================
            ['division_id' => 14, 'name' => 'Yangon', 'name_mm' => 'ရန်ကုန်မြို့', 'status' => 1], // Capital
            ['division_id' => 14, 'name' => 'Thanlyin', 'name_mm' => 'သန်လျင်မြို့', 'status' => 1],
            ['division_id' => 14, 'name' => 'Twante', 'name_mm' => 'တွံတေးမြို့', 'status' => 1],
            ['division_id' => 14, 'name' => 'Hlegu', 'name_mm' => 'လှည်းကူးမြို့', 'status' => 1],
            ['division_id' => 14, 'name' => 'Hmawbi', 'name_mm' => 'မှော်ဘီမြို့', 'status' => 1],

            // ==================== NAYPYIDAW UT ====================
            ['division_id' => 15, 'name' => 'Naypyidaw', 'name_mm' => 'နေပြည်တော်', 'status' => 1], // Capital
            ['division_id' => 15, 'name' => 'Lewe', 'name_mm' => 'လယ်ဝေးမြို့', 'status' => 1],
            ['division_id' => 15, 'name' => 'Pyinmana', 'name_mm' => 'ပျဉ်းမနားမြို့', 'status' => 1],
            ['division_id' => 15, 'name' => 'Tatkon', 'name_mm' => 'တပ်ကုန်းမြို့', 'status' => 1]
        ];

        foreach ($cities as $city) {
            $division = Division::where('name', $city['division'])->first();

            if ($division) {
                City::create([
                    'name' => $city['name'],
                    'name_mm' => $city['name_mm'],
                    'division_id' => $division->id,
                    'status' => 1,
                ]);
            }
        }
    }
}
