<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Daftar Pesanan Saya') }}
      </h2>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      <!-- Info Text -->
      <div class="mb-8">
        <p class="text-gray-600 text-sm">
          Berikut adalah daftar seluruh pesanan sewa mobil yang pernah anda buat.
        </p>
      </div>

      @if($bookings->isEmpty())
        <!-- Empty State -->
        <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
          <div class="mx-auto w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-6">
            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
              </path>
            </svg>
          </div>
          <h3 class="text-lg font-medium text-gray-700 mb-2">Belum Ada Pesanan</h3>
          <p class="text-gray-500 mb-6 max-w-md mx-auto">Anda belum pernah melakukan pemesanan mobil. Mulailah pesan mobil
            pertama anda sekarang!</p>
          <a href="{{ route('cars.index') }}"
            class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl transition-all duration-200 shadow-sm hover:shadow-md">
            Lihat Daftar Mobil
          </a>
        </div>
      @else
        <!-- Booking Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          @foreach($bookings as $booking)
            <div
              class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 group">
              <!-- Status Badge -->
              <div class="absolute right-4 top-4 z-10">
                @if($booking->status == 'pending')
                  <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                    Menunggu Konfirmasi
                  </span>
                @elseif($booking->status == 'active')
                  <span
                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Sedang Berjalan
                  </span>
                @elseif($booking->status == 'completed')
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                    Selesai
                  </span>
                @elseif($booking->status == 'cancelled')
                  <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                    Dibatalkan
                  </span>
                @endif
              </div>

              <!-- Car Image -->
              <div class="relative h-48 bg-gray-50 overflow-hidden">
                @if($booking->car && $booking->car->image)
                  <img src="{{ asset('storage/' . $booking->car->image) }}" alt="{{ $booking->car->name }}"
                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                  <div class="w-full h-full flex items-center justify-center">
                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M8 7h8m-8 4h8m-4 4h.01M9 17h6a2 2 0 002-2V7a2 2 0 00-2-2H9a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                    </svg>
                  </div>
                @endif
              </div>

              <!-- Card Content -->
              <div class="p-5">
                <!-- Car Name -->
                <h3 class="font-semibold text-lg text-gray-900 mb-3">
                  {{ $booking->car ? $booking->car->name : 'Mobil tidak tersedia' }}
                </h3>

                <!-- Booking Code (Sensor) -->
                <div class="flex items-center mb-3">
                  <span class="text-xs text-gray-500 mr-2">Kode Pesanan</span>
                  <span class="font-mono text-sm font-medium text-gray-700">
                    {{ Str::mask($booking->booking_code, '*', 5, 8) }}
                  </span>
                </div>

                <!-- Info List -->
                <div class="space-y-2 text-sm">
                  <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <span class="text-gray-600">
                      Tanggal Mulai: <span
                        class="font-medium text-gray-800">{{ $booking->start_date->translatedFormat('d F Y') }}</span>
                    </span>
                  </div>

                  <div class="flex items-center">
                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-gray-600">
                      Durasi Sewa: <span class="font-medium text-gray-800">{{ $booking->duration_hours }} Jam</span>
                    </span>
                  </div>
                </div>

                <div class="mt-5 pt-4 border-t border-gray-100">
                  <div class="bg-amber-50 p-3 rounded-lg border border-amber-100 mb-3">
                    <p class="text-[11px] text-amber-700 leading-relaxed">
                      <strong>Info:</strong> Untuk alasan keamanan, detail lengkap hanya bisa dibuka menggunakan <b>Kode
                        Booking</b>
                      lengkap yang Anda terima via WhatsApp
                    </p>
                  </div>

                  <a href="{{ route('bookings.check-form') }}"
                    class="w-full flex items-center justify-center px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-medium rounded-xl transition-all duration-200 shadow-lg shadow-emerald-100">
                    Input Kode Booking
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                      </path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>

      @endif

    </div>
  </div>
</x-app-layout>