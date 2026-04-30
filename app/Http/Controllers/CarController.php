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
        $cars = $this->carService->getAllCars($request, 9);
        return view('cars.index', compact('cars'));
    }

    public function show(Car $car)
    {
        // Get all bookings dates with status for this car
        $bookedDates = $car->bookings()
            ->whereIn('status', ['pending', 'active'])
            ->select('start_date', 'end_date', 'status')
            ->get()
            ->map(function ($booking) {
                return [
                    'start' => $booking->start_date->format('Y-m-d'),
                    'end' => $booking->end_date->format('Y-m-d'),
                    'status' => $booking->status,
                    'isToday' => $booking->start_date->isToday()
                ];
            });

        return view('cars.show', compact('car', 'bookedDates'));
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
        $cars = $this->carService->getAllCars($request, 10);

        // Get the same filtered query without pagination for stats
        $baseQuery = Car::filter($request->only(['search', 'category', 'seats', 'transmission', 'fuel_type', 'status']));

        $stats = [
            'available' => (clone $baseQuery)->where('is_available', 1)->count(),
            'unavailable' => (clone $baseQuery)->where('is_available', 0)->count(),
        ];

        return view('admin.cars.index', compact('cars', 'stats'));
    }

    public function welcome()
    {
        $cars = Car::getCarWelcome();
        return view('welcome', compact('cars'));
    }
}
