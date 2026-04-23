<x-app-layout>
    <div class="bg-gradient-to-br from-gray-50 via-blue-50/30 to-gray-50 min-h-screen py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header dengan animasi -->
            <div class="text-center mb-8 md:mb-12 animate-fadeIn">
                <div class="inline-block mb-4">
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/>
                            <path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/>
                        </svg>
                        Rental Mobil Premium
                    </span>
                </div>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-r from-gray-900 via-blue-900 to-gray-900 bg-clip-text text-transparent mb-4">
                    Pilih Mobil Impian Anda
                </h1>
                <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                    Temukan kendaraan terbaik untuk perjalanan Anda dengan berbagai pilihan tipe dan fitur premium
                </p>
            </div>

            <!-- Search & Filter Section dengan improved design -->
            <div class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100/50 p-6 md:p-8 mb-8 animate-slideUp">
                <form method="GET" action="{{ route('cars.index') }}" class="space-y-6" id="filterForm">
                    <!-- Search Input dengan icon yang lebih menarik -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Cari Mobil
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-all duration-200">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input type="text" 
                                   name="search" 
                                   value="{{ request('search') }}"
                                   placeholder="Cari berdasarkan nama mobil, merk, atau tipe..."
                                   class="block w-full pl-12 pr-4 py-3.5 md:py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 text-gray-900 placeholder-gray-400 hover:border-gray-300 bg-white/50 focus:bg-white">
                        </div>
                    </div>

                    <!-- Filters Grid dengan responsive design yang lebih baik -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-5">
                        <!-- Category -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                Kategori
                            </label>
                            <select name="category" class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none bg-select-arrow">
                                <option value="">Semua Kategori</option>
                                <option value="SUV" {{ request('category') == 'SUV' ? 'selected' : '' }}>🚙 SUV</option>
                                <option value="MPV" {{ request('category') == 'MPV' ? 'selected' : '' }}>🚐 MPV</option>
                                <option value="Sedan" {{ request('category') == 'Sedan' ? 'selected' : '' }}>🚗 Sedan</option>
                                <option value="Hatchback" {{ request('category') == 'Hatchback' ? 'selected' : '' }}>🚕 Hatchback</option>
                            </select>
                        </div>

                        <!-- Seats -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                Kapasitas
                            </label>
                            <select name="seats" class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none bg-select-arrow">
                                <option value="">Semua Kapasitas</option>
                                <option value="2" {{ request('seats') == '2' ? 'selected' : '' }}>2 Kursi</option>
                                <option value="4" {{ request('seats') == '4' ? 'selected' : '' }}>4 Kursi</option>
                                <option value="5" {{ request('seats') == '5' ? 'selected' : '' }}>5 Kursi</option>
                                <option value="7" {{ request('seats') == '7' ? 'selected' : '' }}>7 Kursi</option>
                                <option value="7+" {{ request('seats') == '7+' ? 'selected' : '' }}>> 7 Kursi</option>
                            </select>
                        </div>

                        <!-- Transmission -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                </svg>
                                Transmisi
                            </label>
                            <select name="transmission" class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none bg-select-arrow">
                                <option value="">Semua Transmisi</option>
                                <option value="AT" {{ request('transmission') == 'AT' ? 'selected' : '' }}>⚙️ Otomatis (AT)</option>
                                <option value="MT" {{ request('transmission') == 'MT' ? 'selected' : '' }}>🔧 Manual (MT)</option>
                            </select>
                        </div>

                        <!-- Fuel Type -->
                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                </svg>
                                Bahan Bakar
                            </label>
                            <select name="fuel_type" class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none bg-select-arrow">
                                <option value="">Semua Bahan Bakar</option>
                                <option value="Bensin" {{ request('fuel_type') == 'Bensin' ? 'selected' : '' }}>⛽ Bensin</option>
                                <option value="Diesel" {{ request('fuel_type') == 'Diesel' ? 'selected' : '' }}>🛢️ Diesel</option>
                                <option value="Hybrid" {{ request('fuel_type') == 'Hybrid' ? 'selected' : '' }}>🔋 Hybrid</option>
                                <option value="Listrik" {{ request('fuel_type') == 'Listrik' ? 'selected' : '' }}>⚡ Listrik</option>
                            </select>
                        </div>
                    </div>

                    <!-- Action Buttons dengan improved design -->
                    <div class="flex flex-col sm:flex-row gap-3 justify-end pt-4 border-t border-gray-100">
                        <a href="{{ route('cars.index') }}" class="inline-flex items-center justify-center gap-2 px-6 py-3.5 border-2 border-gray-200 rounded-xl text-gray-700 hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 font-semibold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Reset Filter
                        </a>
                        <button type="submit" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl transition-all duration-200 font-semibold shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/40">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Results Count dengan animasi -->
            <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-1 bg-gradient-to-b from-blue-600 to-blue-400 rounded-full"></div>
                    <p class="text-gray-600 text-sm md:text-base">
                        Menampilkan <span class="font-bold text-gray-900 text-lg">{{ $cars->count() }}</span> mobil tersedia
                    </p>
                </div>
            </div>

            <!-- Cars Grid atau Skeleton Loading -->
            <div id="carsGrid">
                @if($cars->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                        @foreach($cars as $index => $car)
                            <div class="car-card bg-white rounded-3xl shadow-lg shadow-gray-200/50 border border-gray-100 overflow-hidden group hover:shadow-2xl hover:shadow-gray-300/50 transition-all duration-500 hover:-translate-y-2 animate-fadeInUp" style="animation-delay: {{ $index * 0.1 }}s">
                                <!-- Car Image -->
                                <div class="relative h-56 md:h-64 bg-gradient-to-br from-gray-100 to-gray-50 overflow-hidden" style="isolation: isolate; transform: translateZ(0); backface-visibility: hidden;">
                                    @if($car->image)
                                        <img src="{{ asset('storage/' . $car->image) }}" 
                                             alt="{{ $car->name }}"
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 {{ !$car->is_available ? 'opacity-50 grayscale-[40%]' : '' }}"
                                             style="will-change: transform; border-radius: inherit;"
                                             loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 {{ !$car->is_available ? 'opacity-50 grayscale-[40%]' : '' }}">
                                            <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1"/>
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Overlay gradient -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                                    @if($car->is_available)
                                        <!-- Availability Badge -->
                                        <div class="absolute top-4 left-4 z-10">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs font-bold rounded-full shadow-lg shadow-green-500/30">
                                                <span class="w-2 h-2 bg-white rounded-full"></span>
                                                Tersedia
                                            </span>
                                        </div>
                                    @else
                                        <!-- Sedang Disewa Badge Center -->
                                        <div class="absolute inset-0 flex items-center justify-center z-10">
                                            <div class="bg-gradient-to-r from-red-600 to-red-700 backdrop-blur-sm px-8 py-4 rounded-2xl shadow-2xl transform rotate-[-3deg] hover:rotate-0 transition-transform duration-300">
                                                <span class="text-white font-black text-base md:text-lg tracking-wider drop-shadow-lg">SEDANG DISEWA</span>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Plate Code Badge -->
                                    <div class="absolute top-4 right-4 z-10">
                                        <span class="inline-flex items-center px-3 py-1.5 bg-white/95 backdrop-blur-sm text-gray-800 text-xs font-black rounded-full shadow-lg border border-gray-200">
                                            {{ $car->plate_code }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Car Info -->
                                <div class="p-5 md:p-6">
                                    <!-- Header -->
                                    <div class="mb-4">
                                        <div class="flex items-start justify-between gap-2 mb-2">
                                            <h3 class="text-lg md:text-xl font-black text-gray-900 group-hover:text-blue-600 transition-colors duration-300 line-clamp-1">
                                                {{ $car->name }}
                                            </h3>
                                            <div class="flex-shrink-0">
                                                <span class="inline-flex items-center px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-lg">
                                                    {{ $car->category }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Features dengan icon yang lebih menarik -->
                                    <div class="grid grid-cols-3 gap-3 mb-5 pb-5 border-b border-gray-100">
                                        <div class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/feature">
                                            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-2 shadow-sm group-hover/feature:shadow-md transition-shadow">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                </svg>
                                            </div>
                                            <span class="text-xs text-gray-500 font-medium">Kapasitas</span>
                                            <span class="text-sm font-bold text-gray-900">{{ $car->seats }} Kursi</span>
                                        </div>

                                        <div class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/feature">
                                            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-2 shadow-sm group-hover/feature:shadow-md transition-shadow">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                                </svg>
                                            </div>
                                            <span class="text-xs text-gray-500 font-medium">Transmisi</span>
                                            <span class="text-sm font-bold text-gray-900">{{ $car->transmission }}</span>
                                        </div>

                                        <div class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/feature">
                                            <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-2 shadow-sm group-hover/feature:shadow-md transition-shadow">
                                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                                </svg>
                                            </div>
                                            <span class="text-xs text-gray-500 font-medium">BBM</span>
                                            <span class="text-sm font-bold text-gray-900">{{ $car->fuel_type }}</span>
                                        </div>
                                    </div>

                                    <!-- Price dengan design yang lebih menarik -->
                                    <div class="grid grid-cols-2 gap-3 mb-5">
                                        <div class="relative bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl p-4 border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 hover:shadow-lg group/price">
                                            <div class="absolute top-2 right-2">
                                                <svg class="w-4 h-4 text-blue-400 group-hover/price:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div class="text-xs text-blue-600 font-bold mb-1">12 Jam</div>
                                            <div class="text-sm font-black text-blue-700">
                                                Rp {{ number_format($car->price_12h, 0, ',', '.') }}
                                            </div>
                                        </div>

                                        <div class="relative bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl p-4 border-2 border-purple-200 hover:border-purple-400 transition-all duration-300 hover:shadow-lg group/price">
                                            <div class="absolute top-2 right-2">
                                                <svg class="w-4 h-4 text-purple-400 group-hover/price:text-purple-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <div class="text-xs text-purple-600 font-bold mb-1">24 Jam</div>
                                            <div class="text-sm font-black text-purple-700">
                                                Rp {{ number_format($car->price_24h, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Button dengan improved design -->
                                    <a href="{{ route('cars.show', $car->plate_code) }}" class="block text-center bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-3.5 rounded-2xl font-bold text-sm transition-all duration-300 shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/50 overflow-hidden">
                                        <span class="flex items-center justify-center gap-2">
                                            Lihat Detail
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State dengan design yang lebih menarik -->
                    <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-12 md:p-16 text-center">
                        <div class="max-w-md mx-auto">
                            <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1"/>
                                </svg>
                            </div>
                            <h3 class="text-2xl md:text-3xl font-black text-gray-900 mb-3">Tidak ada mobil ditemukan</h3>
                            <p class="text-gray-500 mb-8 text-sm md:text-base leading-relaxed">
                                Maaf, kami tidak dapat menemukan mobil yang sesuai dengan kriteria pencarian Anda. Silakan coba sesuaikan filter atau reset pencarian Anda.
                            </p>
                            <a href="{{ route('cars.index') }}" class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-2xl transition-all duration-300 font-bold shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/50 hover:scale-105 active:scale-95">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Reset Pencarian
                            </a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Skeleton Loading (Hidden by default, shown with JavaScript) -->
            <div id="skeletonLoading" class="hidden grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @for($i = 0; $i < 6; $i++)
                    <div class="bg-white rounded-3xl shadow-lg border border-gray-100 overflow-hidden animate-pulse">
                        <!-- Image Skeleton -->
                        <div class="h-56 md:h-64 bg-gradient-to-br from-gray-200 to-gray-300"></div>

                        <!-- Content Skeleton -->
                        <div class="p-5 md:p-6">
                            <!-- Title -->
                            <div class="mb-4">
                                <div class="h-6 bg-gray-200 rounded-lg mb-2 w-3/4"></div>
                                <div class="h-4 bg-gray-200 rounded-lg w-1/4"></div>
                            </div>

                            <!-- Features -->
                            <div class="grid grid-cols-3 gap-3 mb-5 pb-5 border-b border-gray-100">
                                <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl">
                                    <div class="w-10 h-10 bg-gray-200 rounded-lg mb-2"></div>
                                    <div class="h-3 bg-gray-200 rounded w-12 mb-1"></div>
                                    <div class="h-4 bg-gray-200 rounded w-16"></div>
                                </div>
                                <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl">
                                    <div class="w-10 h-10 bg-gray-200 rounded-lg mb-2"></div>
                                    <div class="h-3 bg-gray-200 rounded w-12 mb-1"></div>
                                    <div class="h-4 bg-gray-200 rounded w-16"></div>
                                </div>
                                <div class="flex flex-col items-center p-3 bg-gray-50 rounded-xl">
                                    <div class="w-10 h-10 bg-gray-200 rounded-lg mb-2"></div>
                                    <div class="h-3 bg-gray-200 rounded w-12 mb-1"></div>
                                    <div class="h-4 bg-gray-200 rounded w-16"></div>
                                </div>
                            </div>

                            <!-- Price -->
                            <div class="grid grid-cols-2 gap-3 mb-5">
                                <div class="bg-gray-100 rounded-2xl p-4 h-20"></div>
                                <div class="bg-gray-100 rounded-2xl p-4 h-20"></div>
                            </div>

                            <!-- Button -->
                            <div class="h-12 bg-gray-200 rounded-2xl"></div>
                        </div>
                    </div>
                @endfor
            </div>

            <!-- Pagination (if needed) -->
            <div class="mt-12 flex justify-center">
                <!-- Add your pagination here -->
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        /* Custom Select Arrow */
        .bg-select-arrow {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.75rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out;
        }

        .animate-slideUp {
            animation: slideUp 0.8s ease-out;
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.6s ease-out backwards;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }


        /* Line Clamp */
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <!-- JavaScript for Skeleton Loading -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('filterForm');
            const carsGrid = document.getElementById('carsGrid');
            const skeletonLoading = document.getElementById('skeletonLoading');

            // Show skeleton loading on form submit
            form.addEventListener('submit', function() {
                carsGrid.classList.add('hidden');
                skeletonLoading.classList.remove('hidden');
            });

            // Optional: Add loading state for select changes
            const selects = form.querySelectorAll('select');
            selects.forEach(select => {
                select.addEventListener('change', function() {
                    // Auto submit on change (optional)
                    // form.submit();
                });
            });

        });

    </script>
</x-app-layout>