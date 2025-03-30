<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name_mm' => 'ငွေကြေး',
            ],
            [
                'name_mm' => 'ကရိန်း',
            ],
            [
                'name_mm' => 'ကယ်ဆယ်ရေးလူအင်အား',
            ],
            [
                'name_mm' => 'အစားအသောက် + ရေ',
            ],
            [
                'name_mm' => 'Dead Body အိတ်',
            ],
            [
                'name_mm' => 'ဖုန်းဘေလ်',
            ],
            [
                'name_mm' => 'အဝတ်အထည်',
            ],
            [
                'name_mm' => 'အသုံးအဆောင်',
            ],
            [
                'name_mm' => 'ဆေးဝါး',
            ],
            [
                'name_mm' => 'အောက်ဆီဂျင်',
            ],
            [
                'name_mm' => 'စက်ပစ္စည်း',
            ],
            [
                'name_mm' => 'အထွေထွေ',
            ],
        ];

        foreach ($datas as $data) {
            Category::create($data);
        }
    }
}
