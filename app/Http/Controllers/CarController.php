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

    public function welcome()
    {
        $cars = Car::latest()->take(6)->get();

        $features = [
            [
                'icon' => 'M5 17H3a2 2 0 01-2-2v-4a2 2 0 012-2h1l3-5h10l3 5h1a2 2 0 012 2v4a2 2 0 01-2 2h-2M7.5 17.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm9 0a2.5 2.5 0 100-5 2.5 2.5 0 000 5z',
                'title' => 'Unit Kendaraan Lengkap',
                'desc' => 'Pilihan mobil terlengkap dari berbagai merek ternama dan dalam kondisi terbaik untuk perjalanan Anda.',
                'color' => '#2563eb',
                'bg' => '#eff6ff'
            ],
            [
                'icon' => 'M12 1v22M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6',
                'title' => 'Harga Terjangkau',
                'desc' => 'Tarif kompetitif dengan berbagai paket sewa yang fleksibel, mulai 12 jam hingga berhari-hari.',
                'color' => '#059669',
                'bg' => '#ecfdf5'
            ],
            [
                'icon' => 'M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.69 12 19.79 19.79 0 011.61 3.4 2 2 0 013.6 1.22h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.91 8.77a16 16 0 006.29 6.29l.95-.95a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z',
                'title' => 'Layanan 24/7',
                'desc' => 'Tim customer service profesional siap membantu Anda kapan saja, siang maupun malam.',
                'color' => '#7c3aed',
                'bg' => '#f5f3ff'
            ],
            [
                'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                'title' => 'Asuransi Lengkap',
                'desc' => 'Perlindungan menyeluruh dengan asuransi komprehensif untuk setiap perjalanan penyewaan.',
                'color' => '#dc2626',
                'bg' => '#fef2f2'
            ],
            [
                'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
                'title' => 'Lokasi Strategis',
                'desc' => 'Kantor kami berlokasi di pusat kota Purwakarta, mudah diakses dari berbagai penjuru wilayah.',
                'color' => '#d97706',
                'bg' => '#fffbeb'
            ],
            [
                'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
                'title' => 'Proses Booking Mudah',
                'desc' => 'Pesan secara online dalam hitungan menit. Proses cepat, transparan, dan tanpa biaya tersembunyi.',
                'color' => '#0891b2',
                'bg' => '#ecfeff'
            ],
        ];

        return view('welcome', compact('cars', 'features'));
    }
}
