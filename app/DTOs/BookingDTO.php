<?php
declare(strict_types=1);

namespace App\DTOs;

use Carbon\Carbon;

class BookingDTO
{
  public function __construct(
    public readonly int $carId,
    public readonly string $customerName,
    public readonly string $whatsappNumber,
    public readonly Carbon $startDate,
    public readonly int $durationType, // 12 or 24
    public readonly int $extraHours = 0,
    public readonly ?string $notes = null,
  ) {
  }

  // Compuoted property - out calculate total hours
  public function getTotalHours(): int
  {
    return $this->durationType + $this->extraHours;
  }

  public function endDate()
  {
    return $this->startDate->copy()->addHours($this->getTotalHours());
  }

  public static function fromRequest(array $data): self
  {
    return new self(
      carId: (int) $data['car_id'],
      customerName: $data['customer_name'],
      whatsappNumber: $data['whatsapp_number'],
      startDate: Carbon::parse($data['start_date']),
      durationType: (int) $data['duration_type'],
      extraHours: (int) ($data['extra_hours'] ?? 0),
      notes: $data['notes'] ?? null,
    );
  }
}