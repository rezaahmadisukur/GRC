<?php

namespace Tests\Unit\Services;

use App\Models\Car;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class BookingServiceTest extends TestCase
{
    use RefreshDatabase;

    private BookingService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new BookingService();
    }

    #[Test]
    public function menghitung_harga_booking_12_jam_dengan_benar(): void
    {
        // ✅ SEKARANG CUMA 1 BARIS SAJA!
        $car = Car::factory()->create([
            'price_12h' => 300000,
            'price_24h' => 500000
        ]);

        $result = $this->service->calculateBooking($car->id, '2026-05-01 08:00:00', 12);

        $this->assertEquals(300000, $result['total_price']);
        $this->assertEquals(Carbon::parse('2026-05-01 20:00:00'), $result['end_date']);
    }

    #[Test]
    public function menghitung_harga_booking_24_jam_dengan_benar(): void
    {
        $car = Car::factory()->create([
            'price_12h' => 300000,
            'price_24h' => 500000
        ]);

        $result = $this->service->calculateBooking($car->id, '2026-05-01 08:00:00', 24);

        $this->assertEquals(500000, $result['total_price']);
    }

    #[Test]
    public function menghitung_harga_booking_dengan_extra_jam(): void
    {
        $car = Car::factory()->create([
            'price_12h' => 300000,
            'price_24h' => 500000
        ]);

        // 15 jam = 12 jam dasar + 3 jam extra
        $result = $this->service->calculateBooking($car->id, '2026-05-01 08:00:00', 15);

        $this->assertEquals(375000, $result['total_price']);
    }
}