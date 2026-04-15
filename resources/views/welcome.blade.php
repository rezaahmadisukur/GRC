<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20" id="home">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                Solusi Rental Mobil Terpercaya
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-blue-100">
                Nikmati kenyamanan berkendara dengan armada mobil pilihan kami yang modern dan terawat
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <button onclick="document.querySelector('.search-section').scrollIntoView({behavior: 'smooth'})"
                    class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors duration-200">
                    Cari Mobil
                </button>
                <a href="#about"
                    class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors duration-200">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <div class="search-section bg-gray-50 py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="{{ route('dashboard') }}" method="GET" class="bg-white rounded-lg shadow-lg p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Mulai
                        </label>
                        <input type="date" name="start_date" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tanggal Selesai
                        </label>
                        <input type="date" name="end_date" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tipe Mobil
                        </label>
                        <select name="type"
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Semua Tipe</option>
                            <option value="SUV">SUV</option>
                            <option value="Sedan">Sedan</option>
                            <option value="MPV">MPV</option>
                            <option value="City Car">City Car</option>
                        </select>
                    </div>
                </div>
                <button type="submit"
                    class="w-full mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-md font-semibold transition-colors duration-200">
                    Cari Sekarang
                </button>
            </form>
        </div>
    </div>

    <!-- Cars Section -->
    <section class="py-16" id="cars">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Daftar Mobil Tersedia
                </h2>
                <p class="text-lg text-gray-600">
                    Pilih dari koleksi lengkap kendaraan premium kami
                </p>
            </div>

            @if($cars && count($cars) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($cars as $car)
                                <div
                                    class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
                                    <div
                                        class="relative h-48 bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center">
                                        @if($car->image_url)
                                            <img src="{{ $car->image_url }}" alt="{{ $car->brand }} {{ $car->model }}"
                                                class="w-full h-full object-cover">
                                        @else
                                            <div class="text-4xl text-blue-600">
                                                <i class="fas fa-car"></i>
                                            </div>
                                        @endif
                                        <span
                                            class="absolute top-4 right-4 bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-medium">
                                            {{ $car->type ?? 'Standar' }}
                                        </span>
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $car->brand }} {{ $car->model }}</h3>
                                        <p class="text-gray-600 mb-4">{{ $car->year ?? '2024' }} • {{ $car->transmission ?? 'Manual' }}
                                        </p>
                                        <div class="flex justify-between items-center">
                                            <div>
                                                <span class="text-2xl font-bold text-blue-600">Rp {{ number_format(
                            $car->price_per_day,
                            0,
                            ',',
                            '.'
                        ) }}</span>
                                                <span class="text-gray-500">/ hari</span>
                                            </div>
                                            <a href="{{ route('cars.show', $car->plate_code) }}"
                                                class="text-blue-600 hover:text-blue-800 font-medium">
                                                Detail →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <i class="fas fa-inbox text-5xl text-gray-400 mb-4"></i>
                    <p class="text-xl text-gray-600">Maaf, tidak ada mobil yang tersedia saat ini. Silakan cek kembali
                        nanti.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-gray-50 py-16" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                    Mengapa Memilih Kami
                </h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-car-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Armada Lengkap</h3>
                    <p class="text-gray-600">
                        Pilihan mobil terlengkap dari berbagai merek ternama dan dalam kondisi terbaik
                    </p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-tag text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Harga Terjangkau</h3>
                    <p class="text-gray-600">
                        Tarif kompetitif dengan berbagai paket sewa yang fleksibel sesuai kebutuhan Anda
                    </p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-headset text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Layanan 24/7</h3>
                    <p class="text-gray-600">
                        Tim customer service siap membantu Anda kapan saja untuk kepuasan maksimal
                    </p>
                </div>

                <!-- Feature 4 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-shield-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Asuransi Lengkap</h3>
                    <p class="text-gray-600">
                        Perlindungan menyeluruh dengan asuransi komprehensif untuk setiap penyewaan
                    </p>
                </div>

                <!-- Feature 5 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-map-marker-alt text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Lokasi Strategis</h3>
                    <p class="text-gray-600">
                        Kantor cabang tersebar di berbagai lokasi untuk kemudahan akses Anda
                    </p>
                </div>

                <!-- Feature 6 -->
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-200">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-check-circle text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Proses Mudah</h3>
                    <p class="text-gray-600">
                        Proses sewa yang cepat, mudah, dan transparan tanpa ribet
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</x-app-layout>