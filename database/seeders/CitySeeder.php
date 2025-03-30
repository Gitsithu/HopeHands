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
            ['name' => 'Pathein', 'name_mm' => 'ပုသိမ်', 'division' => 'Ayeyarwady'],
            ['name' => 'Bago', 'name_mm' => 'ပဲခူး', 'division' => 'Bago'],
            ['name' => 'Hakha', 'name_mm' => 'ဟားခါး', 'division' => 'Chin'],
            ['name' => 'Myitkyina', 'name_mm' => 'မြစ်ကြီးနား', 'division' => 'Kachin'],
            ['name' => 'Loikaw', 'name_mm' => 'လွိုင်ကော်', 'division' => 'Kayah'],
            ['name' => 'Hpa-An', 'name_mm' => 'ဘားအံ', 'division' => 'Kayin'],
            ['name' => 'Magway', 'name_mm' => 'မကွေး', 'division' => 'Magway'],
            ['name' => 'Mandalay', 'name_mm' => 'မန္တလေး', 'division' => 'Mandalay'],
            ['name' => 'Mawlamyine', 'name_mm' => 'မော်လမြိုင်', 'division' => 'Mon'],
            ['name' => 'Sittwe', 'name_mm' => 'စစ်တွေ', 'division' => 'Rakhine'],
            ['name' => 'Sagaing', 'name_mm' => 'စစ်ကိုင်း', 'division' => 'Sagaing'],
            ['name' => 'Taunggyi', 'name_mm' => 'တောင်ကြီး', 'division' => 'Shan'],
            ['name' => 'Dawei', 'name_mm' => 'ထားဝယ်', 'division' => 'Tanintharyi'],
            ['name' => 'Yangon', 'name_mm' => 'ရန်ကုန်', 'division' => 'Yangon'],
            ['name' => 'Naypyidaw', 'name_mm' => 'နေပြည်တော်', 'division' => 'Naypyidaw'],
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
