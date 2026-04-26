<x-app-layout>
    <div class="bg-gradient-to-br from-gray-50 via-blue-50/30 to-gray-50 min-h-screen py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Page Header dengan animasi -->
            <div class="text-center mb-8 md:mb-12 animate-fadeIn">
                <div class="inline-block mb-4">
                    <span
                        class="inline-flex items-center gap-2 px-4 py-2 bg-blue-100 text-blue-700 rounded-full text-sm font-semibold">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                            <path
                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z" />
                        </svg>
                        Rental Mobil Premium
                    </span>
                </div>
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-r from-gray-900 via-blue-900 to-gray-900 bg-clip-text text-transparent mb-4">
                    Pilih Mobil Impian Anda
                </h1>
                <p class="text-gray-600 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                    Temukan kendaraan terbaik untuk perjalanan Anda dengan berbagai pilihan tipe dan fitur premium
                </p>
            </div>

            <!-- Search & Filter Form Component -->
            <x-cars.filter-form />

            <!-- Results Count dengan animasi -->
            <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-1 bg-gradient-to-b from-blue-600 to-blue-400 rounded-full"></div>
                    <p class="text-gray-600 text-sm md:text-base">
                        Menampilkan <span class="font-bold text-gray-900 text-lg">{{ $cars->count() }}</span> mobil
                        tersedia
                    </p>
                </div>
            </div>

            <!-- Cars Grid atau Skeleton Loading -->
            <div id="carsGrid">
                @if($cars->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                        @foreach($cars as $index => $car)
                            <x-car-card :car="$car" :index="$index" />
                        @endforeach
                    </div>
                @else
                    <!-- Empty State Component -->
                    <x-cars.empty-state />
                @endif
            </div>

            <!-- Skeleton Loading Component -->
            <x-cars.skeleton-loading />

            <!-- Pagination -->
            <div class="mt-12 flex justify-center animate-fadeIn">
                {{ $cars->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

</x-app-layout>