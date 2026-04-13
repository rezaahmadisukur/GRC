<?php
declare(strict_types=1);

namespace App\DTOs;

class CarDTO
{
  public function __construct(
    public string $name,
    public string $plate_code,
    public string $color,
    public string $transmission,
    public int $price_12h,
    public int $price_24h
  ) {
  }

  // Static method to convert request to DTO
  public static function fromRequest(array $validated): self
  {
    return new self(
      name: $validated['name'],
      plate_code: $validated['plate_code'],
      color: $validated['color'],
      transmission: $validated['transmission'],
      price_12h: (int) $validated['price_12h'],
      price_24h: (int) $validated['price_24h']
    );
  }
}