<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="font-bold text-xl text-gray-900 leading-tight">Daftar Pesanan Saya</h2>
        <p class="text-sm text-gray-400 mt-0.5">Riwayat seluruh pemesanan sewa mobil Anda</p>
      </div>
      @if(!$bookings->isEmpty())
        <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50
                             text-emerald-600 text-sm font-semibold rounded-full border border-emerald-100">
          <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full animate-pulse"></span>
          {{ $totalAllBookings }} Pesanan
        </span>
      @endif
    </div>
  </x-slot>

  <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-emerald-50 via-blue-50 to-fuchsia-50">
    <div class="max-w-7xl mx-auto">

      @if($bookings->isEmpty())
        {{-- ==================== EMPTY STATE ==================== --}}
        <div
          class="opacity-0 animate-[fadeInUp_.45s_ease_forwards] flex flex-col items-center justify-center py-24 text-center">

          {{-- Illustration --}}
          <div class="relative mb-8">
            {{-- Rings --}}
            <div
              class="absolute inset-0 rounded-full bg-gradient-to-r from-gray-100 via-gray-200 to-gray-100 bg-[length:200%_100%] animate-[shimmer_2s_infinite] scale-150 opacity-40">
            </div>
            <div
              class="absolute inset-0 rounded-full bg-gradient-to-r from-gray-100 via-gray-200 to-gray-100 bg-[length:200%_100%] animate-[shimmer_2s_infinite] scale-125 opacity-60 [animation-delay:.3s]">
            </div>

            <div class="relative w-28 h-28 bg-white rounded-full shadow-xl flex items-center
                              justify-center border border-gray-100">
              <svg class="w-14 h-14 text-gray-300 animate-[float_3s_ease-in-out_infinite]" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0
                               00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
              </svg>
            </div>
          </div>

          <h3 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Pesanan</h3>
          <p class="text-gray-400 text-sm max-w-xs mb-8 leading-relaxed">
            Anda belum pernah melakukan pemesanan. Mulai petualangan Anda sekarang!
          </p>

          <a href="{{ route('cars.index') }}"
            class="relative overflow-hidden inline-flex items-center gap-2.5 px-7 py-3.5 rounded-2xl
                          text-white font-semibold text-sm shadow-lg shadow-emerald-200 bg-gradient-to-br from-emerald-500 to-emerald-600
                          hover:-translate-y-0.5 active:scale-[.97] transition-all duration-200
                          after:absolute after:inset-0 after:bg-white/15 after:opacity-0 after:transition-opacity hover:after:opacity-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z
                             M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1
                             1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414A1 1 0 0121
                             11.414V16a1 1 0 01-1 1h-1" />
            </svg>
            Lihat Daftar Mobil
          </a>
        </div>

      @else
        {{-- ==================== BOOKING GRID ==================== --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

          @foreach($bookings as $index => $booking)
            @php
              /* ---- status config ---- */
              $cfg = match ($booking->status) {
                'pending' => ['dot' => true, 'dotColor' => 'bg-amber-500 animate-[pulse-y_1.8s_ease_infinite]', 'badge' => 'bg-amber-50 text-amber-700 border-amber-200', 'label' => 'Menunggu Konfirmasi'],
                'active' => ['dot' => true, 'dotColor' => 'bg-emerald-500 animate-[pulse-g_1.8s_ease_infinite]', 'badge' => 'bg-emerald-50 text-emerald-700 border-emerald-200', 'label' => 'Sedang Berjalan'],
                'completed' => ['dot' => false, 'dotColor' => '', 'badge' => 'bg-gray-100 text-gray-600 border-gray-200', 'label' => 'Selesai'],
                'cancelled' => ['dot' => false, 'dotColor' => '', 'badge' => 'bg-red-50 text-red-600 border-red-200', 'label' => 'Dibatalkan'],
                default => ['dot' => false, 'dotColor' => '', 'badge' => 'bg-gray-100 text-gray-600 border-gray-200', 'label' => $booking->status],
              };

              /* ---- duration ---- */
              $h = $booking->duration_hours;
              $durLabel = $h < 24
                ? "{$h} Jam"
                : (($rem = $h % 24) === 0
                  ? floor($h / 24) . ' Hari'
                  : floor($h / 24) . ' Hari ' . $rem . ' Jam');

              /* Stagger animation delay */
              $delay = match (true) {
                $index === 0 => '.05s',
                $index === 1 => '.10s',
                $index === 2 => '.15s',
                $index === 3 => '.20s',
                $index === 4 => '.25s',
                $index === 5 => '.30s',
                default => '.35s',
              };
            @endphp

            <div
              class="opacity-0 animate-[fadeInUp_.45s_ease_forwards] [animation-delay:{{ $delay }}]
                                    bg-white/80 backdrop-blur-sm rounded-2xl border border-white shadow-sm overflow-hidden flex flex-col
                                    transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(0,0,0,0.08)]">

              {{-- ---- Image ---- --}}
              <div class="relative h-44 bg-gradient-to-br from-gray-100 to-gray-200
                                      overflow-hidden shrink-0">

                @if($booking->car && $booking->car->image)
                  <img src="{{ asset('storage/' . $booking->car->image) }}" alt="{{ $booking->car->name }}" loading="lazy"
                    class="w-full h-full object-cover transition-transform duration-600 group-hover:scale-107">
                @else
                  <div class="w-full h-full flex items-center justify-center">
                    <svg class="w-14 h-14 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0
                                                   014 0zM19 17a2 2 0 11-4 0 2 2 0
                                                   014 0zM13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001
                                                   1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0
                                                   01.707.293l3.414 3.414A1 1 0 0121 11.414V16a1 1 0 01-1 1h-1" />
                    </svg>
                  </div>
                @endif

                {{-- gradient overlay --}}
                <div class="absolute inset-0
                                        bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

                {{-- Status Badge (bottom-left on image) --}}
                <div class="absolute bottom-3 left-3">
                  <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[11px]
                                           font-semibold border {{ $cfg['badge'] }} backdrop-blur-sm bg-opacity-90">
                    @if($cfg['dot'])
                      <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $cfg['dotColor'] }}"></span>
                    @endif
                    {{ $cfg['label'] }}
                  </span>
                </div>
              </div>

              {{-- ---- Body ---- --}}
              <div class="flex flex-col flex-1 p-5 gap-4">

                {{-- Car name + masked code --}}
                <div>
                  <h3 class="font-bold text-gray-900 text-base leading-snug mb-1">
                    {{ $booking->car->name ?? 'Mobil tidak tersedia' }}
                  </h3>
                  <div class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-gray-50
                                          rounded-lg border border-gray-100">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4
                                           a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 0121 9z" />
                    </svg>
                    <span class="font-mono text-xs text-gray-500 tracking-wider">
                      {{ Str::mask($booking->booking_code, '*', 5, 8) }}
                    </span>
                  </div>
                </div>

                {{-- Meta info --}}
                <div class="space-y-2">
                  {{-- Start date --}}
                  <div class="flex items-center gap-2 text-sm">
                    <div class="w-7 h-7 bg-blue-50 rounded-lg flex items-center
                                            justify-center shrink-0">
                      <svg class="w-3.5 h-3.5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0
                                             00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                    </div>
                    <span class="text-gray-400 text-xs">Mulai</span>
                    <span class="font-semibold text-gray-700 text-xs ml-auto">
                      {{ $booking->start_date->translatedFormat('d F Y') }}
                    </span>
                  </div>

                  {{-- Duration --}}
                  <div class="flex items-center gap-2 text-sm">
                    <div class="w-7 h-7 bg-purple-50 rounded-lg flex items-center
                                            justify-center shrink-0">
                      <svg class="w-3.5 h-3.5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                    </div>
                    <span class="text-gray-400 text-xs">Durasi</span>
                    <span class="font-semibold text-gray-700 text-xs ml-auto">
                      {{ $durLabel }}
                    </span>
                  </div>

                  {{-- Car category (if exists) --}}
                  @if($booking->car)
                    <div class="flex items-center gap-2 text-sm">
                      <div class="w-7 h-7 bg-emerald-50 rounded-lg flex items-center
                                                    justify-center shrink-0">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0
                                                     010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013
                                                     12V7a4 4 0 014-4z" />
                        </svg>
                      </div>
                      <span class="text-gray-400 text-xs">Tipe</span>
                      <span class="font-semibold text-gray-700 text-xs ml-auto">
                        {{ $booking->car->category }}
                      </span>
                    </div>
                  @endif
                </div>

                {{-- Spacer --}}
                <div class="flex-1"></div>

                {{-- Security note + CTA --}}
                <div class="pt-4 border-t border-gray-100 space-y-3">
                  <div class="flex items-start gap-2 p-2.5 bg-amber-50 rounded-xl
                                          border border-amber-100">
                    <svg class="w-4 h-4 text-amber-500 mt-0.5 shrink-0" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <p class="text-[11px] text-amber-700 leading-relaxed">
                      Detail lengkap hanya bisa dibuka dengan <strong>Kode Booking</strong>
                      yang diterima via WhatsApp.
                    </p>
                  </div>

                  <a href="{{ route('bookings.check-form') }}"
                    class="relative overflow-hidden w-full flex items-center justify-center gap-2
                                        py-2.5 rounded-xl text-white text-sm font-semibold
                                        shadow-lg shadow-emerald-100 bg-gradient-to-br from-emerald-500 to-emerald-600
                                        hover:-translate-y-0.5 active:scale-[.97] transition-all duration-200
                                        after:absolute after:inset-0 after:bg-white/15 after:opacity-0 after:transition-opacity hover:after:opacity-100">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0
                                           00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Cek Detail Pesanan
                  </a>
                </div>

              </div>{{-- /body --}}
            </div>{{-- /card --}}
          @endforeach

        </div>{{-- /grid --}}
      @endif

    </div>
  </div>
</x-app-layout>