<x-app-layout>
    <div class="bg-gray-50 min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header -->
            <div class="text-center mb-10">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">Pilih Mobil Anda</h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">Temukan kendaraan terbaik untuk perjalanan Anda
                    dengan berbagai pilihan tipe dan fitur</p>
            </div>

            <!-- Search & Filter Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
                <form method="GET" action="{{ route('cars.index') }}" class="space-y-6">
                    <!-- Search Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Cari Mobil</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari berdasarkan nama mobil ..."
                                class="block w-full pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                        </div>
                    </div>

                    <!-- Filters Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <select name="category"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                <option value="">Semua Kategori</option>
                                <option value="SUV" {{ request('category') == 'SUV' ? 'selected' : '' }}>SUV</option>
                                <option value="MPV" {{ request('category') == 'MPV' ? 'selected' : '' }}>MPV</option>
                                <option value="Sedan" {{ request('category') == 'Sedan' ? 'selected' : '' }}>Sedan
                                </option>
                                <option value="Hatchback" {{ request('category') == 'Hatchback' ? 'selected' : '' }}>
                                    Hatchback</option>
                            </select>
                        </div>

                        <!-- Seats -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jumlah Kursi</label>
                            <select name="seats"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                <option value="">Semua</option>
                                <option value="2" {{ request('seats') == '2' ? 'selected' : '' }}>2 Kursi</option>
                                <option value="4" {{ request('seats') == '4' ? 'selected' : '' }}>4 Kursi</option>
                                <option value="5" {{ request('seats') == '5' ? 'selected' : '' }}>5 Kursi</option>
                                <option value="7" {{ request('seats') == '7' ? 'selected' : '' }}>7 Kursi</option>
                                <option value="7+" {{ request('seats') == '7+' ? 'selected' : '' }}>> 7 Kursi</option>
                            </select>
                        </div>

                        <!-- Transmission -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Transmisi</label>
                            <select name="transmission"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                <option value="">Semua</option>
                                <option value="AT" {{ request('transmission') == 'AT' ? 'selected' : '' }}>Otomatis (AT)
                                </option>
                                <option value="MT" {{ request('transmission') == 'MT' ? 'selected' : '' }}>Manual (MT)
                                </option>
                            </select>
                        </div>

                        <!-- Fuel Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Bahan Bakar</label>
                            <select name="fuel_type"
                                class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                <option value="">Semua</option>
                                <option value="Bensin" {{ request('fuel_type') == 'Bensin' ? 'selected' : '' }}>Bensin
                                </option>
                                <option value="Diesel" {{ request('fuel_type') == 'Diesel' ? 'selected' : '' }}>Diesel
                                </option>
                                <option value="Hybrid" {{ request('fuel_type') == 'Hybrid' ? 'selected' : '' }}>Hybrid
                                </option>
                                <option value="Listrik" {{ request('fuel_type') == 'Listrik' ? 'selected' : '' }}>Listrik
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-3 justify-end">
                        <a href="{{ route('cars.index') }}"
                            class="px-6 py-3 border border-gray-200 rounded-xl text-gray-700 hover:bg-gray-50 transition-all duration-200 font-medium">
                            Reset Filter
                        </a>
                        <button type="submit"
                            class="px-8 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-200 font-medium shadow-sm hover:shadow-md">
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Results Count -->
            <div class="mb-6">
                <p class="text-gray-600">
                    Menampilkan <span class="font-semibold text-gray-900">{{ $cars->count() }}</span> mobil
                </p>
            </div>

            <!-- Cars Grid -->
            @if($cars->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($cars as $car)
                        <div
                            class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg transition-all duration-300">
                            <!-- Car Image -->
                            <div class="relative h-52 bg-gray-100 overflow-hidden">
                                @if($car->image)
                                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 {{ !$car->is_available ? 'opacity-60 grayscale-[30%]' : '' }}">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gray-200 {{ !$car->is_available ? 'opacity-60 grayscale-[30%]' : '' }}">
                                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 0 01.293.707V16a1 1 0 01-1 1h-1">
                                            </path>
                                        </svg>
                                    </div>
                                @endif

                                @if($car->is_available)
                                    <!-- Availability Badge -->
                                    <div class="absolute top-4 left-4">
                                        <span class="px-3 py-1 bg-green-500 text-white text-xs font-semibold rounded-full">
                                            Tersedia
                                        </span>
                                    </div>
                                @else
                                    <!-- Sedang Disewa Badge Center -->
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <div class="bg-red-600/90 backdrop-blur-sm px-6 py-3 rounded-xl shadow-lg transform rotate-[-2deg]">
                                            <span class="text-white font-bold text-lg tracking-wide">SEDANG DISEWA</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Plate Code Badge -->
                                <div class="absolute top-4 right-4">
                                    <span
                                        class="px-3 py-1 bg-white/90 backdrop-blur text-gray-800 text-xs font-bold rounded-full">
                                        {{ $car->plate_code }}
                                    </span>
                                </div>
                            </div>

                            <!-- Car Info -->
                            <div class="p-5">
                                <div class="mb-3">
                                    <h3 class="text-lg font-bold text-gray-900">{{ $car->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $car->category }}</p>
                                </div>

                                <!-- Features -->
                                <div class="flex items-center gap-4 mb-4 text-sm text-gray-600">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z">
                                            </path>
                                        </svg>
                                        {{ $car->seats }} Kursi
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $car->transmission }}
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z">
                                            </path>
                                        </svg>
                                        {{ $car->fuel_type }}
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="grid grid-cols-2 gap-3 mb-4">
                                    <div class="bg-slate-50 rounded-xl p-2.5 text-center">
                                        <div class="text-xs text-slate-400 font-medium">12 Jam</div>
                                        <div class="text-lg font-bold text-blue-600">Rp
                                            {{ number_format($car->price_12h, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="bg-slate-50 rounded-xl p-2.5 text-center">
                                        <div class="text-xs text-slate-400 font-medium">24 Jam</div>
                                        <div class="text-lg font-bold text-blue-600">Rp
                                            {{ number_format($car->price_24h, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <a href="{{ route('cars.show', $car->plate_code) }}"
                                    class="group/btn block text-center bg-blue-50 hover:bg-blue-600 text-blue-600 hover:text-white py-3 rounded-xl font-bold text-sm transition-all duration-200 border border-blue-100 hover:border-blue-600 hover:shadow-md hover:shadow-blue-600/20">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-12 text-center">
                    <svg class="w-20 h-20 mx-auto text-gray-300 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1">
                        </path>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Tidak ada mobil ditemukan</h3>
                    <p class="text-gray-500 mb-6">Coba sesuaikan filter pencarian Anda atau coba lagi nanti</p>
                    <a href="{{ route('cars.index') }}"
                        class="inline-flex px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all duration-200 font-medium">
                        Reset Pencarian
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>