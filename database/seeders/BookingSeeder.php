<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = Car::all(['id', 'price_12h', 'price_24h']);

        if ($cars->isEmpty()) {
            $this->command->error('Tidak ada data mobil, jalankan CarSeeder terlebih dahulu!');
            return;
        }

        $firstNames = ['Budi', 'Siti', 'Andi', 'Dewi', 'Rizky', 'Putri', 'Hendra', 'Rina', 'Agus', 'Sri', 'Ahmad', 'Yuli', 'Dedi', 'Lina', 'Fajar', 'Maya', 'Eko', 'Wati', 'Rudi', 'Dian', 'Joko', 'Susi', 'Tono', 'Mariam', 'Johan', 'Linda', 'Arif', 'Nur', 'Bayu', 'Indah'];
        $lastNames = ['Santoso', 'Aminah', 'Pratama', 'Lestari', 'Firmansyah', 'Aulia', 'Wijaya', 'Sari', 'Setiawan', 'Suharto', 'Permana', 'Hartati', 'Kusuma', 'Ningsih', 'Ramadhan', 'Putri', 'Saputra', 'Widodo', 'Susanto', 'Maulana', 'Sitorus', 'Sinaga', 'Hutagalung', 'Siregar', 'Kurniawan', 'Prasetyo', 'Wibowo'];
        $statuses = ['pending', 'active', 'completed', 'cancelled'];
        $total = 2500;

        $this->command->info("Generating {$total} booking data...");
        $progressBar = $this->command->getOutput()->createProgressBar($total);
        $progressBar->start();

        \DB::transaction(function () use ($cars, $firstNames, $lastNames, $statuses, $total, $progressBar) {
            $bookingBatch = [];
            $now = now();
            $successCount = 0;

            for ($i = 0; $i < $total; $i++) {
                $car = $cars->random();
                $duration = rand(12, 168); // 12 jam sampai 7 hari
                $startDate = Carbon::now()->addDays(rand(-30, 90));
                $endDate = $startDate->copy()->addHours($duration);

                $price = $duration >= 24 ? $car->price_24h * ceil($duration / 24) : $car->price_12h;
                $dpPercent = rand(0, 100) > 40 ? rand(20, 50) : 0;
                $dpAmount = (int) ($price * $dpPercent / 100);
                $remainsPayment = $price - $dpAmount;

                $status = $statuses[array_rand($statuses)];
                if ($status == 'completed' || $status == 'active') {
                    $dpAmount = $price;
                    $remainsPayment = 0;
                }

                $bookingBatch[] = [
                    'car_id' => $car->id,
                    'booking_code' => 'RENT-' . $startDate->format('ymd') . '-' . strtoupper(Str::random(4)),
                    'customer_name' => $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)],
                    'whatsapp_number' => '08' . rand(1, 9) . rand(100000000, 999999999),
                    'start_date' => $startDate,
                    'duration_hours' => $duration,
                    'end_date' => $endDate,
                    'total_price' => $price,
                    'dp_amount' => $dpAmount,
                    'remains_payment' => $remainsPayment,
                    'status' => $status,
                    'notes' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ];

                $successCount++;

                // Batch insert setiap 100 data untuk performance terbaik
                if (($i + 1) % 100 === 0) {
                    Booking::insert($bookingBatch);
                    $bookingBatch = [];
                }

                $progressBar->advance();
            }

            // Insert sisa data
            if (!empty($bookingBatch)) {
                Booking::insert($bookingBatch);
            }
        });

        $progressBar->finish();
        $this->command->line('');
        $this->command->info("✅ Selesai! Total {$total} data booking berhasil dibuat.");
    }
}