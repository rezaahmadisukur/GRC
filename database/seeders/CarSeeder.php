<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Toyota', 'Honda', 'Mitsubishi', 'Suzuki'];

        $carTypes = [
            'Avanza' => ['category' => 'MPV', 'seats' => 7, 'fuel' => ['Bensin']],
            'Civic' => ['category' => 'Sedan', 'seats' => 5, 'fuel' => ['Bensin']],
            'Xpander' => ['category' => 'MPV', 'seats' => 7, 'fuel' => ['Bensin']],
            'Ertiga' => ['category' => 'MPV', 'seats' => 7, 'fuel' => ['Bensin', 'Hybrid']],
            'Innova' => ['category' => 'SUV', 'seats' => 7, 'fuel' => ['Bensin', 'Diesel']],
            'Brio' => ['category' => 'Hatchback', 'seats' => 5, 'fuel' => ['Bensin']],
            'Jazz' => ['category' => 'Hatchback', 'seats' => 5, 'fuel' => ['Bensin']],
            'CR-V' => ['category' => 'SUV', 'seats' => 5, 'fuel' => ['Bensin', 'Hybrid']],
            'Pajero' => ['category' => 'SUV', 'seats' => 7, 'fuel' => ['Diesel']],
            'Fortuner' => ['category' => 'SUV', 'seats' => 7, 'fuel' => ['Bensin', 'Diesel']],
        ];

        $colors = ['Hitam', 'Putih', 'Silver', 'Abu-abu', 'Merah', 'Biru'];
        $typeKeys = array_keys($carTypes);

        for ($i = 0; $i < 100; $i++) {
            $brand = $brands[array_rand($brands)];
            $typeKey = $typeKeys[array_rand($typeKeys)];
            $carData = $carTypes[$typeKey];
            $basePrice = rand(25, 80) * 10000;

            Car::create([
                'name' => $brand . ' ' . $typeKey . ' ' . Str::random(2),
                'category' => $carData['category'],
                'plate_code' => strtoupper(Str::random(3)),
                'color' => $colors[array_rand($colors)],
                'seats' => $carData['seats'],
                'transmission' => $i % 2 == 0 ? 'AT' : 'MT',
                'fuel_type' => $carData['fuel'][array_rand($carData['fuel'])],
                'price_12h' => $basePrice,
                'price_24h' => (int) ($basePrice * 1.5),
                'is_available' => 1,
                'image' => null,
            ]);
        }
    }
}
