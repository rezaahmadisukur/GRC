{{-- resources/views/components/car-card.blade.php --}}
@props(['car', 'index' => 0])

<div class="car-card group animate-fadeInUp h-full" style="animation-delay: {{ $index * 0.08 }}s">

  <div class="bg-white rounded-2xl shadow-md shadow-blue-900/8 border border-blue-100/60
                overflow-hidden h-full flex flex-col
                hover:shadow-xl hover:shadow-blue-900/12 hover:-translate-y-1
                hover:border-blue-200 transition-all duration-300">

    {{-- ===================== IMAGE ===================== --}}
    <div class="relative
                    h-32 sm:h-40 lg:h-52
                    bg-gradient-to-br from-slate-100 to-blue-50 overflow-hidden flex-shrink-0">

      @if($car->image)
        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-full object-cover group-hover:scale-105
                                       transition-transform duration-500
                                       {{ !$car->is_available ? 'opacity-50 grayscale-[40%]' : '' }}" loading="lazy">
      @else
        <div class="w-full h-full flex items-center justify-center
                                        {{ !$car->is_available ? 'opacity-50 grayscale-[40%]' : '' }}">
          <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1" />
          </svg>
        </div>
      @endif

      {{-- Overlay gradient --}}
      <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent
                        opacity-0 group-hover:opacity-100 transition-opacity duration-300">
      </div>

      {{-- Available badge --}}
      @if($car->is_available)
        <div class="absolute top-2 left-2">
          <span class="inline-flex items-center gap-1 px-1.5 py-0.5
                                             bg-green-500 text-white text-[9px] sm:text-[10px] font-bold
                                             rounded-full shadow-md shadow-green-500/30">
            <span class="w-1 h-1 sm:w-1.5 sm:h-1.5 bg-white rounded-full"></span>
            <span class="hidden sm:inline">Tersedia</span>
            <span class="sm:hidden">Tersedia</span>
          </span>
        </div>
      @endif

      {{-- Tidak Aktif overlay --}}
      @if(!$car->is_available)
        <div class="absolute inset-0 flex items-center justify-center z-20
                                        bg-black/50 backdrop-blur-sm">
          <div class="bg-red-600/90 text-white font-black
                                            text-[10px] sm:text-sm
                                            px-2 py-1 sm:px-4 sm:py-2
                                            rounded-lg sm:rounded-xl transform -rotate-6 shadow-xl
                                            border border-white/20 uppercase tracking-wider">
            Tidak Aktif
          </div>
        </div>
      @endif

      {{-- Plate badge — disembunyikan di mobile karena sempit --}}
      <div class="absolute top-2 right-2 hidden sm:block">
        <span class="px-2 py-0.5 bg-white/95 backdrop-blur-sm text-gray-800
                             text-[10px] font-black rounded-full shadow border border-gray-200">
          {{ $car->plate_code }}
        </span>
      </div>
    </div>

    {{-- ===================== CONTENT ===================== --}}
    <div class="flex flex-col flex-1 p-2.5 sm:p-3.5 lg:p-5 gap-2 sm:gap-2.5">

      {{-- ---- NAMA + KATEGORI ---- --}}
      <div>
        <h3 class="font-black text-gray-900 group-hover:text-blue-600
                           transition-colors duration-200 line-clamp-1 leading-tight
                           text-xs sm:text-sm lg:text-base">
          {{ $car->name }}
        </h3>

        {{-- Kategori: tampil di mobile sebagai text kecil, desktop sebagai badge --}}
        <p class="text-[10px] sm:hidden text-gray-400 font-medium mt-0.5">
          {{ $car->category }} · {{ $car->plate_code }}
        </p>
        <div class="hidden sm:flex items-center gap-1.5 mt-1">
          <span class="text-[10px] font-bold px-2 py-0.5
                                 bg-blue-50 text-blue-700 rounded-lg border border-blue-100">
            {{ $car->category }}
          </span>
          <span class="text-[10px] text-gray-400 font-medium">{{ $car->plate_code }}</span>
        </div>
      </div>

      {{-- ---- FEATURES ---- --}}

      {{-- Mobile: 1 baris icon + text ringkas, hemat ruang --}}
      <div class="flex items-center gap-2 sm:hidden">
        {{-- Kursi --}}
        <div class="flex items-center gap-1">
          <svg class="w-3 h-3 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span class="text-[10px] font-semibold text-gray-600">{{ $car->seats }}</span>
        </div>

        <span class="text-gray-200 text-xs">·</span>

        {{-- Transmisi --}}
        <div class="flex items-center gap-1">
          <svg class="w-3 h-3 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          </svg>
          <span class="text-[10px] font-semibold text-gray-600">{{ $car->transmission }}</span>
        </div>

        <span class="text-gray-200 text-xs">·</span>

        {{-- BBM --}}
        <div class="flex items-center gap-1">
          <svg class="w-3 h-3 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
          </svg>
          <span class="text-[10px] font-semibold text-gray-600">{{ $car->fuel_type }}</span>
        </div>
      </div>

      {{-- Tablet & Desktop: 3 box features seperti biasa --}}
      <div class="hidden sm:grid grid-cols-3 gap-1.5 lg:gap-2">

        <div class="flex flex-col items-center text-center p-1.5 lg:p-2.5
                            bg-slate-50 rounded-xl border border-gray-100/80">
          <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-blue-500 mb-1" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <span class="text-[9px] text-gray-400 font-medium leading-none">Kursi</span>
          <span class="text-[11px] lg:text-xs font-bold text-gray-800 mt-0.5">{{ $car->seats }}</span>
        </div>

        <div class="flex flex-col items-center text-center p-1.5 lg:p-2.5
                            bg-slate-50 rounded-xl border border-gray-100/80">
          <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-blue-500 mb-1" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          </svg>
          <span class="text-[9px] text-gray-400 font-medium leading-none">Trans</span>
          <span class="text-[11px] lg:text-xs font-bold text-gray-800 mt-0.5">{{ $car->transmission }}</span>
        </div>

        <div class="flex flex-col items-center text-center p-1.5 lg:p-2.5
                            bg-slate-50 rounded-xl border border-gray-100/80">
          <svg class="w-3.5 h-3.5 lg:w-4 lg:h-4 text-blue-500 mb-1" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
          </svg>
          <span class="text-[9px] text-gray-400 font-medium leading-none">BBM</span>
          <span class="text-[11px] lg:text-xs font-bold text-gray-800 mt-0.5">{{ $car->fuel_type }}</span>
        </div>
      </div>

      {{-- ---- PRICE ---- --}}

      {{-- Mobile: stack vertikal super compact --}}
      <div class="sm:hidden flex flex-col gap-1 mt-auto">
        {{-- Harga utama (12 jam) --}}
        <div class="bg-blue-50 rounded-xl px-2.5 py-1.5 border border-blue-100">
          <div class="text-[9px] text-blue-500 font-bold leading-none mb-0.5">12 Jam</div>
          <div class="text-xs font-black text-blue-700 truncate leading-tight">
            Rp {{ number_format($car->price_12h, 0, ',', '.') }}
          </div>
        </div>

        {{-- Harga 24 jam lebih subtle --}}
        <div class="bg-purple-50 rounded-xl px-2.5 py-1.5 border border-purple-100">
          <div class="text-[9px] text-purple-500 font-bold leading-none mb-0.5">24 Jam</div>
          <div class="text-xs font-black text-purple-700 truncate leading-tight">
            Rp {{ number_format($car->price_24h, 0, ',', '.') }}
          </div>
        </div>
      </div>

      {{-- Tablet & Desktop: 2 box berdampingan --}}
      <div class="hidden sm:grid grid-cols-2 gap-1.5 lg:gap-2">
        <div class="bg-blue-50 rounded-xl p-2 lg:p-3 border border-blue-100">
          <div class="text-[9px] lg:text-[10px] text-blue-500 font-bold mb-0.5">12 Jam</div>
          <div class="text-[11px] lg:text-xs font-black text-blue-700 truncate">
            Rp {{ number_format($car->price_12h, 0, ',', '.') }}
          </div>
        </div>
        <div class="bg-purple-50 rounded-xl p-2 lg:p-3 border border-purple-100">
          <div class="text-[9px] lg:text-[10px] text-purple-500 font-bold mb-0.5">24 Jam</div>
          <div class="text-[11px] lg:text-xs font-black text-purple-700 truncate">
            Rp {{ number_format($car->price_24h, 0, ',', '.') }}
          </div>
        </div>
      </div>

      {{-- ---- CTA BUTTON ---- --}}
      <a href="{{ route('cars.show', $car->plate_code) }}" class="block text-center
                       bg-gradient-to-r from-blue-600 to-blue-700
                       hover:from-blue-700 hover:to-blue-800
                       text-white rounded-xl font-bold
                       transition-all duration-300
                       shadow-sm shadow-blue-600/20
                       hover:shadow-md hover:shadow-blue-600/40
                       py-2 text-[11px] sm:py-2.5 sm:text-xs lg:py-3 lg:text-sm">
        <span class="flex items-center justify-center gap-1">
          {{-- Mobile: hanya arrow icon, hemat ruang --}}
          <span class="sm:hidden">Detail</span>
          <span class="hidden sm:inline">Lihat Detail</span>
          <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 lg:w-4 lg:h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
          </svg>
        </span>
      </a>
    </div>
  </div>
</div>