<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        $startDate = $this->faker->dateTimeBetween('-1 day', '+1 week');
        $duration = $this->faker->randomElement([12, 24, 36, 48]);

        return [
            'car_id' => Car::factory(),
            'booking_code' => 'RENT-' . date('ymd') . '-' . strtoupper($this->faker->bothify('????')),
            'customer_name' => $this->faker->name(),
            'whatsapp_number' => '08' . $this->faker->numerify('##########'),
            'start_date' => $startDate,
            'end_date' => date('Y-m-d H:i:s', strtotime("+{$duration} hours", $startDate->getTimestamp())),
            'duration_hours' => $duration,
            'total_price' => $this->faker->numberBetween(300000, 1500000),
            'remains_payment' => $this->faker->numberBetween(0, 1500000),
            'status' => $this->faker->randomElement(['pending', 'active', 'completed', 'cancelled']),
        ];
    }

    public function pending()
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'pending',
        ]);
    }

    public function active()
    {
        return $this->state(fn(array $attributes) => [
            'status' => 'active',
        ]);
    }
}