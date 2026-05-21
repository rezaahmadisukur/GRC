{{-- resources/views/cars/index.blade.php --}}
<x-app-layout title="Cari Mobil">

    <div class="min-h-screen py-8 md:py-12"
        style="background: linear-gradient(135deg, #f0f4ff 0%, #e8effe 25%, #eef2ff 50%, #f0f9ff 75%, #f0f4ff 100%);">

        {{-- Background decoration --}}
        <div class="fixed inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
            <div class="absolute -top-40 -right-40 w-96 h-96 bg-blue-200/20 rounded-full blur-3xl"></div>
            <div class="absolute top-1/3 -left-20 w-72 h-72 bg-indigo-200/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-1/4 w-64 h-64 bg-blue-100/30 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">

            {{-- Page Header --}}
            <div class="text-center mb-6 md:mb-10 animate-fadeIn">
                <div class="inline-block mb-3">
                    <span class="inline-flex items-center gap-2 px-4 py-2 
                                 bg-blue-600/10 text-blue-700 rounded-full text-sm font-semibold
                                 border border-blue-200/60">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                            <path
                                d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z" />
                        </svg>
                        Rental Mobil Premium
                    </span>
                </div>
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold 
                            bg-gradient-to-r from-gray-900 via-blue-800 to-indigo-900 
                            bg-clip-text text-transparent mb-3 md:mb-4 leading-tight">
                    Pilih Mobil Impian Anda
                </h1>
                <p class="text-gray-500 text-sm md:text-base max-w-2xl mx-auto leading-relaxed hidden sm:block">
                    Temukan kendaraan terbaik untuk perjalanan Anda dengan berbagai pilihan tipe dan fitur premium
                </p>
            </div>

            {{-- Filter --}}
            <x-cars.filter-form />

            {{-- Results Count --}}
            <div class="mb-4 flex items-center gap-2.5">
                <div class="h-7 w-1 bg-gradient-to-b from-blue-600 to-indigo-500 rounded-full"></div>
                <p class="text-gray-600 text-sm md:text-base">
                    Menampilkan
                    <span class="font-bold text-gray-900">{{ $cars->count() }}</span>
                    mobil
                </p>
            </div>

            {{-- Cars Grid --}}
            <div id="carsGrid">
                @if($cars->count())
                    {{--
                    Mobile: 2 kolom — card compact
                    Tablet sm: 2 kolom
                    Desktop lg: 3 kolom
                    --}}
                    <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 lg:gap-6">
                        @foreach($cars as $index => $car)
                            <x-car-card :car="$car" :index="$index" />
                        @endforeach
                    </div>
                @else
                    <x-cars.empty-state />
                @endif
            </div>

            {{-- Skeleton --}}
            <x-cars.skeleton-loading />

            {{-- Pagination --}}
            <div class="mt-10 md:mt-12 flex justify-center">
                {{ $cars->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

</x-app-layout>