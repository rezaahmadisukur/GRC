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
        $cars = Car::all();

        if ($cars->isEmpty()) {
            $this->command->error('Tidak ada data mobil, jalankan CarSeeder terlebih dahulu!');
            return;
        }

        $firstNames = ['Budi', 'Siti', 'Andi', 'Dewi', 'Rizky', 'Putri', 'Hendra', 'Rina', 'Agus', 'Sri', 'Ahmad', 'Yuli', 'Dedi', 'Lina', 'Fajar', 'Maya', 'Eko', 'Wati', 'Rudi', 'Dian'];
        $lastNames = ['Santoso', 'Aminah', 'Pratama', 'Lestari', 'Firmansyah', 'Aulia', 'Wijaya', 'Sari', 'Setiawan', 'Suharto', 'Permana', 'Hartati', 'Kusuma', 'Ningsih', 'Ramadhan', 'Putri', 'Saputra', 'Widodo'];
        $statuses = ['pending', 'active', 'completed', 'cancelled'];

        $this->command->info('Generating 100 booking data...');

        for ($i = 0; $i < 100; $i++) {
            $car = $cars->random();
            $duration = rand(12, 120);
            $startDate = Carbon::now()->addDays(rand(-15, 60));
            $endDate = $startDate->copy()->addHours($duration);

            $price = $duration >= 24 ? $car->price_24h * ceil($duration / 24) : $car->price_12h;
            $dpPercent = rand(0, 100) > 50 ? rand(20, 50) : 0;
            $dpAmount = (int) ($price * $dpPercent / 100);
            $remainsPayment = $price - $dpAmount;

            $status = $statuses[array_rand($statuses)];
            if ($status == 'completed' || $status == 'active') {
                $dpAmount = $price;
                $remainsPayment = 0;
            }

            try {
                Booking::create([
                    'car_id' => $car->id,
                    'booking_code' => 'RENT-' . date('ymd') . '-' . strtoupper(Str::random(4)),
                    'customer_name' => $firstNames[array_rand($firstNames)] . ' ' . $lastNames[array_rand($lastNames)],
                    'whatsapp_number' => '08' . rand(1, 9) . rand(100000000, 999999999),
                    'start_date' => $startDate,
                    'duration_hours' => $duration,
                    'end_date' => $endDate,
                    'total_price' => $price,
                    'dp_amount' => $dpAmount,
                    'remains_payment' => $remainsPayment,
                    'status' => $status,
                    'notes' => 'Data dummy seeder #' . ($i + 1),
                ]);
            } catch (\Exception $e) {
                $this->command->warn("Booking ke " . ($i + 1) . " gagal: " . $e->getMessage());
                continue;
            }

            if (($i + 1) % 20 == 0) {
                $this->command->line(($i + 1) . " data booking berhasil dibuat");
            }
        }

        $this->command->info('✅ Selesai! Total 100 data booking berhasil dibuat.');
    }
}