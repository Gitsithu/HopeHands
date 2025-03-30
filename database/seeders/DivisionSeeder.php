<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                'name' => 'ဧရာဝတီ',
            ],
            [
                'name' => 'ပဲခူး',
            ],
            [
                'name' => 'ချင်း',
            ],
            [
                'name' => 'ကချင်',
            ],
            [
                'name' => 'ကယား',
            ],
            [
                'name' => 'ကရင်',
            ],
            [
                'name' => 'မကွေး',
            ],
            [
                'name' => 'မန္တလေး',
            ],
            [
                'name' => 'မွန်',
            ],
            [
                'name' => 'ရခိုင်',
            ],
            [
                'name' => 'စစ်ကိုင်း',
            ],
            [
                'name' => 'ရှမ်း',
            ],
            [
                'name' => 'တနင်္သာရီ',
            ],
            [
                'name' => 'ရန်ကုန်',
            ],
            [
                'name' => 'နေပြည်တော်',
            ]
        ];

        foreach ($datas as $data) {
            Division::create($data);
        }
    }
}
