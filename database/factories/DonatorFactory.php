<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donator>
 */
class DonatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $divisionIds = $this->faker->numberBetween(1, 7);
        $city_id     = $this->faker->numberBetween(1, 7);
        $category_id = $this->faker->numberBetween(1, 7);
        $name        = $this->faker->name;
        $phone       = $this->faker->phoneNumber;
        return [
            'division_id' => Division::inRandomOrder()->value('id'),
            'city_id'     => City::inRandomOrder()->value('id'),
            'category_id' => Category::inRandomOrder()->value('id'),
            'name'        => $name,
            'phone'       => $phone,
            'contact'     => json_encode([
                'viber'            => $phone,
                'telegram'         => $phone,
                'telegram_usename' => $name,
            ]),
            'remark'      => $this->faker->sentence,
            'stauts'      => $this->faker->randomElement([0, 1]),
        ];
    }
}