<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarberFactory extends Factory
{
    public function definition()
    {
        return [
            'shop_id' => Shop::inRandomOrder()->first()->id ?? null,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
        ];
    }
}
