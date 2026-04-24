<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\DTOs\CarDTO;
use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use App\Services\CarService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    public function __construct(
        protected CarService $carService
    ) {
    }

    public function index(Request $request)
    {
        $cars = $this->carService->getAllCars($request);
        return view('cars.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('cars.show', compact('car'));
    }

    public function create(): View
    {
        return view('admin.cars.create');
    }

    public function store(StoreCarRequest $request)
    {
        // Change to dto
        $dto = CarDTO::fromRequest(
            $request->validated(),
            $request->file('image')
        );

        // Call Car Service
        $this->carService->createCar($dto);

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambah!');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(StoreCarRequest $request, Car $car)
    {
        $dto = CarDTO::fromRequest($request->validated(), $request->file('image'));

        $this->carService->updateCar($car, $dto);

        return redirect()->route('admin.cars.index')->with('success', 'Data mobil diperbarui');
    }

    public function destroy(Car $car)
    {
        $this->carService->deleteCar($car);
        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasi dihapus');
    }

    public function indexAdmin(Request $request)
    {
        $cars = $this->carService->getAllCars($request);

        return view('admin.cars.index', compact('cars'));
    }
}
