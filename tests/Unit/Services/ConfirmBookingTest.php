<?php

namespace Tests\Unit\Services;

use App\Models\Booking;
use App\Models\Car;
use App\Models\User;
use App\Services\BookingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ConfirmBookingTest extends TestCase
{
    use RefreshDatabase;

    private BookingService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new BookingService();
    }

    #[Test]
    public function dapat_mengkonfirmasi_booking_yang_status_pending(): void
    {
        // ✅ SEKARANG CUMA 3 BARIS SAJA!
        $booking = Booking::factory()->pending()->create([
            'total_price' => 300000
        ]);
        // Kita tidak butuh user beneran, cukup masukkan id angka langsung
        $adminId = 1;

        $result = $this->service->confirmBooking($booking, 150000, $adminId);

        $this->assertEquals('active', $result->status);
        $this->assertEquals(150000, $result->dp_amount);
        $this->assertEquals(150000, $result->remains_payment);
        $this->assertEquals(0, $booking->car->fresh()->is_available);
    }

    #[Test]
    public function tidak_bisa_mengkonfirmasi_booking_yang_bukan_status_pending(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $booking = Booking::factory()->active()->create();

        $this->service->confirmBooking($booking);
    }

    #[Test]
    public function tidak_bisa_mengkonfirmasi_jika_mobil_sudah_tidak_tersedia(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $booking = Booking::factory()->pending()->create();
        $booking->car->update(['is_available' => false]);

        $this->service->confirmBooking($booking);
    }
}