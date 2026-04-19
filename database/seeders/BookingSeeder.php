<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Car;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            return;
        }

        $customers = [
            ['name' => 'Budi Santoso', 'whatsapp' => '081234567890'],
            ['name' => 'Siti Aminah', 'whatsapp' => '089988776655'],
            ['name' => 'Andi Pratama', 'whatsapp' => '081355778899'],
            ['name' => 'Dewi Lestari', 'whatsapp' => '082133445566'],
            ['name' => 'Rizky Firmansyah', 'whatsapp' => '087811223344'],
            ['name' => 'Putri Aulia', 'whatsapp' => '085677889900'],
            ['name' => 'Hendra Wijaya', 'whatsapp' => '081922334455'],
            ['name' => 'Rina Sari', 'whatsapp' => '083866778899'],
        ];

        $statuses = ['pending', 'active', 'completed', 'cancelled'];

        foreach ($customers as $index => $customer) {
            $car = $cars->random();
            $duration = rand(12, 72);
            $startDate = Carbon::now()->addDays(rand(-7, 30));
            $endDate = $startDate->copy()->addHours($duration);

            $price = $duration >= 24 ? $car->price_24h * ceil($duration / 24) : $car->price_12h;
            $dpAmount = $price * 0.3;

            try {
                Booking::create([
                    'car_id' => $car->id,
                    'user_id' => 1,
                    'booking_code' => 'RENT-' . date('ymd') . '-' . strtoupper(Str::random(4)),
                    'customer_name' => $customer['name'],
                    'whatsapp_number' => $customer['whatsapp'],
                    'start_date' => $startDate,
                    'duration_hours' => $duration,
                    'end_date' => $endDate,
                    'total_price' => $price,
                    'dp_amount' => (int) $dpAmount,
                    'remains_payment' => (int) ($price - $dpAmount),
                    'status' => $statuses[$index % count($statuses)],
                    'notes' => 'Pemesanan otomatis dari seeder',
                ]);
            } catch (\Exception $e) {
                $this->command->error("Gagal insert booking: " . $e->getMessage());
            }
        }
    }
}