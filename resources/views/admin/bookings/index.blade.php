<x-admin-layout>
  <x-slot name="header">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <h2 class="text-xl font-semibold text-gray-800 tracking-tight">
        Manajemen Pemesanan
      </h2>
      <div class="flex items-center gap-3">
        <div class="relative">
          <input type="text" placeholder="Cari pemesanan..."
            class="pl-10 pr-4 py-2 w-full sm:w-64 border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all duration-200">
          <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </div>
      </div>
    </div>
  </x-slot>

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Status Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500 font-medium">Total Pesanan</p>
            <p class="text-2xl font-bold text-gray-900 mt-1">{{ $bookings->total() }}</p>
          </div>
          <div class="w-12 h-12 rounded-full bg-gray-50 flex items-center justify-center">
            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
              </path>
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500 font-medium">Menunggu</p>
            <p class="text-2xl font-bold text-amber-600 mt-1">{{ $pendingCount }}</p>
          </div>
          <div class="w-12 h-12 rounded-full bg-amber-50 flex items-center justify-center">
            <svg class="w-6 h-6 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500 font-medium">Aktif</p>
            <p class="text-2xl font-bold text-emerald-600 mt-1">{{ $activeCount }}</p>
          </div>
          <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center">
            <svg class="w-6 h-6 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 hover:shadow-md transition-all duration-300">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-sm text-gray-500 font-medium">Selesai</p>
            <p class="text-2xl font-bold text-blue-600 mt-1">{{ $completedCount }}</p>
          </div>
          <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center">
            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>
        </div>
      </div>
    </div>

    <!-- Bookings Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Pelanggan
              </th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Kendaraan
              </th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal &
                Durasi</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Total</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-50">
            @if ($bookings && count($bookings) > 0)
              @foreach($bookings as $booking)
                <tr class="hover:bg-gray-50 transition-colors duration-150 group">
                  <td class="px-6 py-4">
                    <div class="flex items-center gap-3">
                      <div
                        class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white font-medium text-sm">
                        {{ substr($booking->customer_name, 0, 2) }}
                      </div>
                      <div>
                        <p class="font-medium text-gray-900">{{ $booking->customer_name }}</p>
                        <p class="text-sm text-gray-500">{{ $booking->whatsapp_number }}</p>
                        <p class="text-xs text-gray-400">#{{ $booking->booking_code }}</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <p class="text-gray-900 font-medium">{{ $booking->car->name }}</p>
                    <p class="text-sm text-gray-500">{{ $booking->car->plate_code }} •
                      {{ $booking->car->transmission == 'AT' ? 'Matic' : 'Manual' }}
                    </p>
                  </td>
                  <td class="px-6 py-4">
                    <p class="text-gray-900">{{ $booking->start_date->format('d M Y') }}</p>
                    <p class="text-sm text-gray-500">{{ $booking->duration_hours }} Jam</p>
                  </td>
                  <td class="px-6 py-4">
                    <p class="text-gray-900 font-medium">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500">DP: Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}</p>
                  </td>
                  <td class="px-6 py-4">
                    @if($booking->status == 'pending')
                      <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-2 animate-pulse"></span>
                        Menunggu
                      </span>
                    @elseif($booking->status == 'active')
                      <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2"></span>
                        Aktif
                      </span>
                    @elseif($booking->status == 'cancelled')
                      <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-2"></span>
                        Dibatalkan
                      </span>
                    @elseif($booking->status == 'completed')
                      <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                        <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-2"></span>
                        Selesai
                      </span>
                    @endif
                  </td>
                  <td class="px-6 py-4 text-right">
                    <div class="flex items-center justify-end gap-2 flex-wrap">
                      @if($booking->status == 'pending')
                        <form method="POST" action="{{ route('admin.bookings.update-status', $booking) }}"
                          class="inline-block">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="status" value="confirmed">
                          <button type="submit"
                            class="px-3 py-1.5 rounded-md text-xs font-medium bg-emerald-600 text-white hover:bg-emerald-700 transition-all duration-200 shadow-sm hover:shadow active:scale-95"
                            data-booking-id="{{ $booking->id }}">
                            Setujui
                          </button>
                        </form>
                        <form method="POST" action="{{ route('admin.bookings.update-status', $booking) }}"
                          class="inline-block">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="status" value="cancelled">
                          <button type="submit"
                            class="px-3 py-1.5 rounded-md text-xs font-medium bg-red-600 text-white hover:bg-red-700 transition-all duration-200 shadow-sm hover:shadow active:scale-95"
                            data-booking-id="{{ $booking->id }}">
                            Tolak
                          </button>
                        </form>
                      @elseif($booking->status == 'active')
                        <form method="POST" action="{{ route('admin.bookings.update-status', $booking) }}"
                          class="inline-block">
                          @csrf
                          @method('PATCH')
                          <input type="hidden" name="status" value="completed">
                          <button type="submit"
                            class="px-3 py-1.5 rounded-md text-xs font-medium bg-blue-600 text-white hover:bg-blue-700 transition-all duration-200 shadow-sm hover:shadow active:scale-95"
                            data-booking-id="{{ $booking->id }}">
                            Selesai
                          </button>
                        </form>
                      @endif
                      {{-- <button
                        class="px-3 py-1.5 rounded-md text-xs font-medium bg-gray-100 text-gray-700 hover:bg-gray-200 transition-all duration-200 active:scale-95"
                        onclick="window.location.href='{{ route('admin.bookings.show', $booking) }}'"
                        data-booking-id="{{ $booking->id }}">
                        Detail
                      </button> --}}
                    </div>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="6" class="px-6 py-20">
                  <div class="flex flex-col items-center justify-center text-center">
                    <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center mb-6">
                      <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                        </path>
                      </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum Ada Pemesanan</h3>
                    <p class="text-gray-500 max-w-sm mb-6">Saat ini belum ada pemesanan yang masuk. Semua pemesanan baru
                      akan muncul disini secara otomatis.</p>
                  </div>
                </td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      @if ($bookings->total() > 0)
        <div class="px-6 py-4 border-t border-gray-100 bg-gray-50">
          <div class="flex items-center justify-between">
            <p class="text-sm text-gray-500">Menampilkan {{ $bookings->firstItem() }} sampai {{ $bookings->lastItem() }}
              dari {{ $bookings->total() }} data</p>
            <div class="flex items-center gap-1">
              {{ $bookings->links() }}
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</x-admin-layout>