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
                'name' => 'ငွေကြေး',
            ],
            [
                'name' => 'ကရိန်း',
            ],
            [
                'name' => 'ကယ်ဆယ်ရေးလူအင်အား',
            ],
            [
                'name' => 'အစားအသောက် + ရေ',
            ],
            [
                'name' => 'Dead Body အိတ်',
            ],
            [
                'name' => 'ဖုန်းဘေလ်',
            ],
            [
                'name' => 'အဝတ်အထည်',
            ],
            [
                'name' => 'အသုံးအဆောင်',
            ],
            [
                'name' => 'ဆေးဝါး',
            ],
            [
                'name' => 'အောက်ဆီဂျင်',
            ],
            [
                'name' => 'အထွေထွေ',
            ],
        ];

        foreach ($datas as $data) {
            Category::create($data);
        }
    }
}
