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
        $types = ['Avanza', 'Civic', 'Xpander', 'Ertiga', 'Innova', 'Brio'];
        $colors = ['Hitam', 'Putih', 'Silver', 'Abu-abu'];

        for ($i = 0; $i < 20; $i++) {
            $brand = $brands[array_rand($brands)];
            $type = $types[array_rand($types)];
            $basePrice = rand(25, 80) * 10000;

            Car::create([
                'name' => $brand . ' ' . $type . ' ' . Str::random(2),
                'plate_code' => strtoupper(Str::random(1)) . '-' . rand(1000, 9999) . '-' . strtoupper(Str::random(3)),
                'color' => $colors[array_rand($colors)],
                'transmission' => $i % 2 == 0 ? 'AT' : 'MT',
                'price_12h' => $basePrice,
                'price_24h' => $basePrice * 1.5,
                'is_available' => rand(0, 1), // Ini pengganti 'status', pakai 0 atau 1
                'image' => null, // Biarin kosong dulu buat sekarang
            ]);
        }
    }
}
