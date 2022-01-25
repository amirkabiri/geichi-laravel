<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShopFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'lat' => $this->faker->latitude(35.57898851573611, 35.80567632345665),
            'lng' => $this->faker->longitude(51.22013549804688, 51.63318176269532),
        ];
    }
}
