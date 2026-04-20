<x-app-layout>
  <div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-5xl mx-auto">
      <!-- Page Header -->
      <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Status Booking</h1>
        <p class="text-gray-500">Lihat status terbaru pemesanan Anda</p>
      </div>

      <!-- Timeline Stepper -->
      <div class="bg-white rounded-2xl shadow-sm p-6 mb-8">
        <!-- Desktop Horizontal Timeline -->
        <div class="hidden md:block">
          <div class="flex items-center justify-between">
            @php
              $statusMapping = [
                'pending' => 1,
                'active' => 2,
                'completed' => 3
              ];
              $statuses = [
                1 => 'Pesanan Diterima',
                2 => 'Sedang Jalan',
                3 => 'Selesai'
              ];
              $currentStatus = $statusMapping[$booking->status] ?? 1;
            @endphp

            @foreach($statuses as $index => $statusName)
              <div class="flex flex-col items-center flex-1 relative">
                @if(!$loop->last)
                  <div class="absolute top-5 left-1/2 w-full h-1 bg-gray-200">
                    <div class="h-full transition-all duration-500 @if($currentStatus > $index) bg-emerald-500 @endif"
                      style="width: {{ $currentStatus > $index ? '100%' : '0%' }}"></div>
                  </div>
                @endif

                <div class="relative z-10 w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300
                                            @if($currentStatus >= $index)
                                              bg-emerald-500 text-white
                                            @else
                                              bg-gray-200 text-gray-400
                                            @endif">
                  @if($currentStatus > $index)
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                  @else
                    <span class="font-semibold text-sm">{{ $index }}</span>
                  @endif
                </div>

                <p class="mt-3 text-sm font-medium text-center
                                            @if($currentStatus >= $index)
                                              text-emerald-600
                                            @else
                                              text-gray-400
                                            @endif">
                  {{ $statusName }}
                </p>
              </div>
            @endforeach
          </div>
        </div>

        <!-- Mobile Vertical Timeline -->
        <div class="md:hidden space-y-6">
          @php
            $statusMapping = [
              'pending' => 1,
              'active' => 2,
              'completed' => 3
            ];
            $statuses = [
              1 => 'Pesanan Diterima',
              2 => 'Sedang Jalan',
              3 => 'Selesai'
            ];
            $currentStatus = $statusMapping[$booking->status] ?? 1;
          @endphp

          @foreach($statuses as $index => $statusName)
            <div class="flex items-start gap-4">
              <div class="flex flex-col items-center">
                <div class="w-10 h-10 rounded-full flex items-center justify-center shrink-0
                                            @if($currentStatus >= $index)
                                              bg-emerald-500 text-white
                                            @else
                                              bg-gray-200 text-gray-400
                                            @endif">
                  @if($currentStatus > $index)
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                  @else
                    <span class="font-semibold text-sm">{{ $index }}</span>
                  @endif
                </div>
                @if(!$loop->last)
                  <div class="w-1 h-12 mt-2 bg-gray-200">
                    <div class="w-full transition-all duration-500 @if($currentStatus > $index) bg-emerald-500 @endif"
                      style="height: {{ $currentStatus > $index ? '100%' : '0%' }}"></div>
                  </div>
                @endif
              </div>

              <div class="pt-2">
                <p class="font-medium
                                            @if($currentStatus >= $index)
                                              text-emerald-600
                                            @else
                                              text-gray-400
                                            @endif">
                  {{ $statusName }}
                </p>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <!-- Detail Content Grid -->
      <div class="grid md:grid-cols-2 gap-6 mb-8">
        <!-- Left Column: Order Details -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
          <h2 class="text-xl font-bold text-gray-900 mb-6">Detail Pesanan</h2>

          <div class="space-y-5">
            <div class="flex justify-between items-center border-b border-gray-100 pb-4">
              <span class="text-gray-500">Kode Booking</span>
              <span class="font-bold text-emerald-600">{{ $booking->booking_code }}</span>
            </div>

            <div class="flex justify-between items-center border-b border-gray-100 pb-4">
              <span class="text-gray-500">Nama Customer</span>
              <span class="font-semibold text-gray-900">{{ $booking->customer_name }}</span>
            </div>

            <div class="flex justify-between items-center border-b border-gray-100 pb-4">
              <span class="text-gray-500">Tanggal Sewa</span>
              <span class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y') }}
                - {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y') }}</span>
            </div>

            <div class="flex justify-between items-center border-b border-gray-100 pb-4">
              <span class="text-gray-500">Durasi</span>
              <span
                class="font-medium text-gray-900">{{ \Carbon\Carbon::parse($booking->end_date)->diffInDays($booking->start_date) }}
                Hari</span>
            </div>

            <div class="flex justify-between items-center border-b border-gray-100 pb-4">
              <span class="text-gray-500">Total Harga</span>
              <span class="font-bold text-lg text-gray-900">Rp
                {{ number_format($booking->total_price, 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between items-center">
              <span class="text-gray-500">Status Pembayaran</span>
              @if($booking->remains_payment <= 0)
                <span
                  class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-emerald-100 text-emerald-700">Lunas</span>
              @else
                <span
                  class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-amber-100 text-amber-700">Sisa
                  Pembayaran: Rp {{ number_format($booking->remains_payment, 0, ',', '.') }}</span>
              @endif
            </div>
          </div>
        </div>

        <!-- Right Column: Vehicle Details -->
        <div class="bg-white rounded-2xl shadow-sm p-6">
          <h2 class="text-xl font-bold text-gray-900 mb-6">Detail Unit</h2>

          @if($booking->car)
            <div class="aspect-video bg-gray-100 rounded-xl overflow-hidden mb-6">
              <img src="{{ $booking->car->image ?? 'https://placehold.co/600x400/e2e8f0/64748b?text=Gambar+Mobil' }}"
                alt="{{ $booking->car->name }}" class="w-full h-full object-cover">
            </div>

            <div class="space-y-5">
              <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                <span class="text-gray-500">Nama Mobil</span>
                <span class="font-bold text-gray-900">{{ $booking->car->name }}</span>
              </div>

              <div class="flex justify-between items-center border-b border-gray-100 pb-4">
                <span class="text-gray-500">Plat Nomor</span>
                <span class="font-semibold text-gray-900">{{ strtoupper($booking->car->plate_number) }}</span>
              </div>

              <div class="flex justify-between items-center">
                <span class="text-gray-500">Warna</span>
                <span class="font-medium text-gray-900">{{ $booking->car->color }}</span>
              </div>
            </div>
          @else
            <div class="text-center py-8 text-gray-400">
              Data unit tidak tersedia
            </div>
          @endif
        </div>
      </div>

      <!-- WhatsApp Contact Button -->
      <div class="text-center">
        <a href="https://wa.me/{{ config('services.whatsapp.number') }}?text={{ urlencode('Halo Admin, saya ingin menanyakan tentang booking dengan kode: ' . $booking->booking_code) }}"
          target="_blank" rel="noopener noreferrer"
          class="inline-flex items-center gap-3 px-8 py-4 bg-[#25D366] hover:bg-[#20bd5a] text-white font-semibold rounded-xl shadow-lg shadow-green-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
          <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
          </svg>
          Hubungi Admin via WhatsApp
        </a>
      </div>
    </div>
  </div>
</x-app-layout>