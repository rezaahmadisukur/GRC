<?php
declare(strict_types=1);

namespace App\Services;

use App\DTOs\CarDTO;
use App\Models\Car;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class CarService
{

  public function getAllCars($request, int $perPage = 10)
  {
    return Car::latest()->filter($request->only(['search', 'category', 'seats', 'transmission', 'fuel_type', 'status']))->paginate($perPage);
  }

  public function getCarByPlate(string $plate): Car
  {
    return Car::where('plate_code', $plate)->firstOrFail();
  }

  /**
   * Using DTO as a parameter to ensure the type of incoming data is guaranteed.
   */
  public function createCar(CarDTO $carDTO): Car
  {
    $data = [
      'name' => $carDTO->name,
      'plate_code' => $carDTO->plate_code,
      'color' => $carDTO->color,
      'category' => $carDTO->category,
      'seats' => $carDTO->seats,
      'fuel_type' => $carDTO->fuel_type,
      'transmission' => $carDTO->transmission,
      'price_12h' => $carDTO->price_12h,
      'price_24h' => $carDTO->price_24h,
      'is_available' => $carDTO->is_available
    ];

    if ($carDTO->image) {
      // Store to storage/app/public/cars
      $path = $carDTO->image->store('cars', 'public');
      $data['image'] = $path;
    }

    return Car::create($data);
  }

  public function updateCar(Car $car, CarDTO $carDTO): Car
  {
    $data = [
      'name' => $carDTO->name,
      'plate_code' => $carDTO->plate_code,
      'color' => $carDTO->color,
      'category' => $carDTO->category,
      'seats' => $carDTO->seats,
      'fuel_type' => $carDTO->fuel_type,
      'transmission' => $carDTO->transmission,
      'price_12h' => $carDTO->price_12h,
      'price_24h' => $carDTO->price_24h,
      'is_available' => $carDTO->is_available
    ];

    if ($carDTO->image) {
      // Delete old images if any
      if ($car->image) {
        Storage::disk('public')->delete($car->image);
      }
      // Save the new image
      $data['image'] = $carDTO->image->store('cars', 'public');
    }

    $car->update($data);
    return $car;
  }

  public function deleteCar(Car $car): bool
  {
    if ($car->image) {
      Storage::disk('public')->delete($car->image);
    }

    return $car->delete();
  }

}