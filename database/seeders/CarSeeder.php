<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = ['Toyota', 'Honda', 'Mitsubishi', 'Suzuki', 'Daihatsu', 'Nissan', 'Mazda'];

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
            'Sigra' => ['category' => 'MPV', 'seats' => 7, 'fuel' => ['Bensin']],
            'Veloz' => ['category' => 'MPV', 'seats' => 7, 'fuel' => ['Bensin']],
            'Rush' => ['category' => 'SUV', 'seats' => 7, 'fuel' => ['Bensin']],
            'Terios' => ['category' => 'SUV', 'seats' => 7, 'fuel' => ['Bensin']],
            'Altis' => ['category' => 'Sedan', 'seats' => 5, 'fuel' => ['Bensin', 'Hybrid']],
            'Camry' => ['category' => 'Sedan', 'seats' => 5, 'fuel' => ['Bensin', 'Hybrid']],
        ];

        $colors = ['Hitam', 'Putih', 'Silver', 'Abu-abu', 'Merah', 'Biru', 'Coklat', 'Hijau'];
        $typeKeys = array_keys($carTypes);
        $total = 350;

        $this->command->info("Generating {$total} car data...");
        $progressBar = $this->command->getOutput()->createProgressBar($total);
        $progressBar->start();

        \DB::transaction(function () use ($brands, $carTypes, $colors, $typeKeys, $total, $progressBar) {
            $carsBatch = [];
            $now = now();

            for ($i = 0; $i < $total; $i++) {
                $brand = $brands[array_rand($brands)];
                $typeKey = $typeKeys[array_rand($typeKeys)];
                $carData = $carTypes[$typeKey];
                $basePrice = rand(25, 120) * 10000;

                $carsBatch[] = [
                    'name' => $brand . ' ' . $typeKey . ' ' . Str::random(2),
                    'category' => $carData['category'],
                    'plate_code' => strtoupper(Str::random(3)) . rand(1000, 9999),
                    'color' => $colors[array_rand($colors)],
                    'seats' => $carData['seats'],
                    'transmission' => $i % 2 == 0 ? 'AT' : 'MT',
                    'fuel_type' => $carData['fuel'][array_rand($carData['fuel'])],
                    'price_12h' => $basePrice,
                    'price_24h' => (int) ($basePrice * 1.5),
                    'is_available' => rand(0, 100) > 15 ? 1 : 0,
                    'image' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];

                // Batch insert setiap 50 data
                if (($i + 1) % 50 === 0) {
                    Car::insert($carsBatch);
                    $carsBatch = [];
                }

                $progressBar->advance();
            }

            // Insert sisa data
            if (!empty($carsBatch)) {
                Car::insert($carsBatch);
            }
        });

        $progressBar->finish();
        $this->command->line('');
        $this->command->info("✅ Selesai! Total {$total} data mobil berhasil dibuat.");
    }
}
