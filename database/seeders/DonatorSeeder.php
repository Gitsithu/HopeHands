<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DonatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Donator::factory()->count(10)->create();
    }
}