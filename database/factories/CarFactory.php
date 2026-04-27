<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name() . ' Car',
            'plate_code' => 'B' . $this->faker->randomNumber(4, true) . 'XYZ',
            'category' => $this->faker->randomElement(['standard', 'premium', 'luxury']),
            'color' => $this->faker->colorName(),
            'seats' => $this->faker->randomElement([5, 6, 7]),
            'transmission' => $this->faker->randomElement(['AT', 'MT']),
            'fuel_type' => $this->faker->randomElement(['bensin', 'diesel', 'hybrid']),
            'price_12h' => $this->faker->numberBetween(200000, 500000),
            'price_24h' => $this->faker->numberBetween(350000, 800000),
            'is_available' => true,
        ];
    }
}