<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\CarDTO;
use App\Http\Requests\StoreCarRequest;
use App\Service\CarService;

class CarController extends Controller
{
    public function __construct(
        protected CarService $carService
    ) {
    }

    public function store(StoreCarRequest $request)
    {
        // Change to dto
        $dto = CarDTO::fromRequest($request->validated());

        // Call Car Service
        $this->carService->createCar($dto);

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambah!');
    }
}
