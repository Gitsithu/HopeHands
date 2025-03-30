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
        $data = [
            ['name' => 'Ayeyarwady'],
            ['name' => 'Bago'],
            ['name' => 'Chin'],
            ['name' => 'Kachin'],
            ['name' => 'Kayah'],
            ['name' => 'Kayin'],
            ['name' => 'Magway'],
            ['name' => 'Mandalay'],
            ['name' => 'Mon'],
            ['name' => 'Rakhine'],
            ['name' => 'Sagaing'],
            ['name' => 'Shan'],
            ['name' => 'Tanintharyi'],
            ['name' => 'Yangon'],
            ['name' => 'Naypyidaw'],
        ];
        
        $translations = [
            'Ayeyarwady' => 'ဧရာဝတီ',
            'Bago' => 'ပဲခူး',
            'Chin' => 'ချင်း',
            'Kachin' => 'ကချင်',
            'Kayah' => 'ကယား',
            'Kayin' => 'ကရင်',
            'Magway' => 'မကွေး',
            'Mandalay' => 'မန္တလေး',
            'Mon' => 'မွန်',
            'Rakhine' => 'ရခိုင်',
            'Sagaing' => 'စစ်ကိုင်း',
            'Shan' => 'ရှမ်း',
            'Tanintharyi' => 'တနင်္သာရီ',
            'Yangon' => 'ရန်ကုန်',
            'Naypyidaw' => 'နေပြည်တော်',
        ];
        
        foreach ($data as &$d) {
            $d['name_mm'] = $translations[$d['name']] ?? ''; // Provide a default value if translation is not found
            Division::create($d);
        }
    }
}
