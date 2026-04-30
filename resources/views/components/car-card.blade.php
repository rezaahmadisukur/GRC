@props(['car', 'index' => 0])

<div
  class="car-card bg-white rounded-3xl shadow-lg shadow-gray-200/50 border border-gray-100 overflow-hidden group hover:shadow-2xl hover:shadow-gray-300/50 transition-all duration-500 hover:-translate-y-2 animate-fadeInUp"
  style="animation-delay: {{ $index * 0.1 }}s">
  <!-- Car Image -->
  <div
    class="relative h-56 md:h-64 bg-gradient-to-br from-gray-100 to-gray-50 overflow-hidden isolate translate-z-0 backface-hidden">
    @if($car->image)
      <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 {{ !$car->is_available ? 'opacity-50 grayscale-[40%]' : '' }} will-change-transform rounded-inherit"
        loading="lazy">
    @else
      <div
        class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 {{ !$car->is_available ? 'opacity-50 grayscale-[40%]' : '' }}">
        <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1" />
        </svg>
      </div>
    @endif

    <!-- Overlay gradient -->
    <div
      class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
    </div>

    <!-- Availability Badge -->
    <div class="absolute top-4 left-4 z-10">
      @if($car->is_available)
        <span
          class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs font-bold rounded-full shadow-lg shadow-green-500/30">
          <span class="w-2 h-2 bg-white rounded-full"></span>
          Tersedia
        </span>
      @endif
    </div>

    @if(!$car->is_available)
      <!-- Non Aktif Overlay Center -->
      <div class="absolute inset-0 flex items-center justify-center z-20 bg-black/50 backdrop-blur-sm">
        <div
          class="bg-red-600/90 text-white font-black text-xl md:text-2xl px-8 py-4 rounded-xl transform -rotate-6 shadow-2xl border-2 border-white/20">
          NON AKTIF
        </div>
      </div>
    @endif

    <!-- Plate Code Badge -->
    <div class="absolute top-4 right-4 z-10">
      <span
        class="inline-flex items-center px-3 py-1.5 bg-white/95 backdrop-blur-sm text-gray-800 text-xs font-black rounded-full shadow-lg border border-gray-200">
        {{ $car->plate_code }}
      </span>
    </div>
  </div>

  <!-- Car Info -->
  <div class="p-5 md:p-6">
    <!-- Header -->
    <div class="mb-4">
      <div class="flex items-start justify-between gap-2 mb-2">
        <h3
          class="text-lg md:text-xl font-black text-gray-900 group-hover:text-blue-600 transition-colors duration-300 line-clamp-1">
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
      <div
        class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/feature">
        <div
          class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-2 shadow-sm group-hover/feature:shadow-md transition-shadow">
          <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <span class="text-xs text-gray-500 font-medium">Kapasitas</span>
        <span class="text-sm font-bold text-gray-900">{{ $car->seats }} Kursi</span>
      </div>

      <div
        class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/feature">
        <div
          class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-2 shadow-sm group-hover/feature:shadow-md transition-shadow">
          <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          </svg>
        </div>
        <span class="text-xs text-gray-500 font-medium">Transmisi</span>
        <span class="text-sm font-bold text-gray-900">{{ $car->transmission }}</span>
      </div>

      <div
        class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/feature">
        <div
          class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-2 shadow-sm group-hover/feature:shadow-md transition-shadow">
          <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
          </svg>
        </div>
        <span class="text-xs text-gray-500 font-medium">BBM</span>
        <span class="text-sm font-bold text-gray-900">{{ $car->fuel_type }}</span>
      </div>
    </div>

    <!-- Price dengan design yang lebih menarik -->
    <div class="grid grid-cols-2 gap-3 mb-5">
      <div
        class="relative bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl p-4 border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 hover:shadow-lg group/price">
        <div class="absolute top-2 right-2">
          <svg class="w-4 h-4 text-blue-400 group-hover/price:text-blue-600 transition-colors" fill="currentColor"
            viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
              clip-rule="evenodd" />
          </svg>
        </div>
        <div class="text-xs text-blue-600 font-bold mb-1">12 Jam</div>
        <div class="text-sm font-black text-blue-700">
          Rp {{ number_format($car->price_12h, 0, ',', '.') }}
        </div>
      </div>

      <div
        class="relative bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl p-4 border-2 border-purple-200 hover:border-purple-400 transition-all duration-300 hover:shadow-lg group/price">
        <div class="absolute top-2 right-2">
          <svg class="w-4 h-4 text-purple-400 group-hover/price:text-purple-600 transition-colors" fill="currentColor"
            viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
              clip-rule="evenodd" />
          </svg>
        </div>
        <div class="text-xs text-purple-600 font-bold mb-1">24 Jam</div>
        <div class="text-sm font-black text-purple-700">
          Rp {{ number_format($car->price_24h, 0, ',', '.') }}
        </div>
      </div>
    </div>

    <!-- Action Button dengan improved design -->
    <a href="{{ route('cars.show', $car->plate_code) }}"
      class="block text-center bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-3.5 rounded-2xl font-bold text-sm transition-all duration-300 shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/50 overflow-hidden">
      <span class="flex items-center justify-center gap-2">
        Lihat Detail
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
      </span>
    </a>
  </div>
</div>