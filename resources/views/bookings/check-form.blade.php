<x-app-layout>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
      <!-- Page Header -->
      <div class="text-center mb-10">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
          <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
            </path>
          </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Cek Status Pemesanan</h1>
        <p class="text-gray-600 max-w-md mx-auto">Masukkan kode pemesanan ATAU nomor whatsapp Anda untuk melihat riwayat
          status dan detail
          pemesanan secara realtime</p>
      </div>

      <!-- Search Form Card -->
      <div class="bg-white rounded-2xl shadow-lg shadow-gray-200/50 p-6 sm:p-8 mb-8">
        <form action="{{ route('bookings.check.status') }}" method="POST" class="space-y-6">
          @csrf

          <div>
            <label for="query" class="block text-sm font-medium text-gray-700 mb-2">Kode Pemesanan / Nomor
              Whatsapp</label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                  </path>
                </svg>
              </div>
              <input type="text" id="query" name="query"
                placeholder="Masukkan kode pemesanan atau nomor whatsapp anda..."
                class="block w-full pl-12 pr-4 py-4 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 text-gray-900 placeholder:text-gray-400"
                value="{{ old('query') }}">
            </div>
            @error('query')
              <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-xl shadow-lg shadow-blue-600/20 hover:shadow-blue-600/30 transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <span class="flex items-center justify-center gap-2">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
              Cek Status Pemesanan
            </span>
          </button>
        </form>
      </div>

      @if(isset($booking))
        <!-- Booking Result Card -->
        <div class="bg-white rounded-2xl shadow-lg shadow-gray-200/50 overflow-hidden animate-fade-in">
          <!-- Booking Header -->
          <div class="p-6 sm:p-8 border-b border-gray-100">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
              <div>
                <p class="text-sm text-gray-500 mb-1">Kode Pemesanan</p>
                <h3 class="text-2xl font-bold text-gray-900">{{ $booking->code }}</h3>
              </div>
              <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium
                                  {{ $booking->status == 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                  {{ $booking->status == 'confirmed' ? 'bg-blue-100 text-blue-700' : '' }}
                                  {{ $booking->status == 'approved' ? 'bg-green-100 text-green-700' : '' }}
                                  {{ $booking->status == 'completed' ? 'bg-emerald-100 text-emerald-700' : '' }}
                                  {{ $booking->status == 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                              ">
                <span class="w-2 h-2 rounded-full bg-current animate-pulse"></span>
                {{ ucfirst($booking->status) }}
              </div>
            </div>
          </div>

          <!-- Status History Timeline -->
          <div class="p-6 sm:p-8">
            <h4 class="text-lg font-semibold text-gray-900 mb-6">Riwayat Status Pemesanan</h4>

            <div class="relative">
              <!-- Timeline line -->
              <div class="absolute left-3 top-0 bottom-0 w-0.5 bg-gray-200"></div>

              <div class="space-y-6">
                <!-- Pending Status -->
                <div class="relative pl-10">
                  <div class="absolute left-0 w-7 h-7 rounded-full bg-yellow-500 border-4 border-white shadow"></div>
                  <div class="bg-gray-50 rounded-xl p-4">
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                      <h5 class="font-medium text-gray-900">Pemesanan Dibuat</h5>
                      <span class="text-sm text-gray-500">{{ $booking->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <p class="text-sm text-gray-600">Pemesanan anda telah berhasil dibuat dan menunggu konfirmasi</p>
                  </div>
                </div>

                @if($booking->status != 'pending')
                  <!-- Confirmed Status -->
                  <div class="relative pl-10">
                    <div class="absolute left-0 w-7 h-7 rounded-full bg-blue-500 border-4 border-white shadow"></div>
                    <div class="bg-gray-50 rounded-xl p-4">
                      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                        <h5 class="font-medium text-gray-900">Pemesanan Dikonfirmasi</h5>
                        <span
                          class="text-sm text-gray-500">{{ optional($booking->confirmed_at)->format('d M Y, H:i') ?? '-' }}</span>
                      </div>
                      <p class="text-sm text-gray-600">Pemesanan telah dikonfirmasi oleh admin dan sedang diproses</p>
                    </div>
                  </div>
                @endif

                @if(in_array($booking->status, ['approved', 'completed']))
                  <!-- Approved Status -->
                  <div class="relative pl-10">
                    <div class="absolute left-0 w-7 h-7 rounded-full bg-green-500 border-4 border-white shadow"></div>
                    <div class="bg-gray-50 rounded-xl p-4">
                      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                        <h5 class="font-medium text-gray-900">Pemesanan Disetujui</h5>
                        <span
                          class="text-sm text-gray-500">{{ optional($booking->approved_at)->format('d M Y, H:i') ?? '-' }}</span>
                      </div>
                      <p class="text-sm text-gray-600">Pemesanan telah disetujui, kendaraan siap untuk digunakan</p>
                    </div>
                  </div>
                @endif

                @if($booking->status == 'completed')
                  <!-- Completed Status -->
                  <div class="relative pl-10">
                    <div class="absolute left-0 w-7 h-7 rounded-full bg-emerald-500 border-4 border-white shadow"></div>
                    <div class="bg-gray-50 rounded-xl p-4">
                      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                        <h5 class="font-medium text-gray-900">Pemesanan Selesai</h5>
                        <span
                          class="text-sm text-gray-500">{{ optional($booking->completed_at)->format('d M Y, H:i') ?? '-' }}</span>
                      </div>
                      <p class="text-sm text-gray-600">Pemesanan telah selesai, terima kasih telah menggunakan layanan kami
                      </p>
                    </div>
                  </div>
                @endif

                @if($booking->status == 'cancelled')
                  <!-- Cancelled Status -->
                  <div class="relative pl-10">
                    <div class="absolute left-0 w-7 h-7 rounded-full bg-red-500 border-4 border-white shadow"></div>
                    <div class="bg-gray-50 rounded-xl p-4">
                      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-2">
                        <h5 class="font-medium text-gray-900">Pemesanan Dibatalkan</h5>
                        <span
                          class="text-sm text-gray-500">{{ optional($booking->cancelled_at)->format('d M Y, H:i') ?? '-' }}</span>
                      </div>
                      <p class="text-sm text-gray-600">Pemesanan anda telah dibatalkan</p>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>

          <!-- Booking Details -->
          <div class="p-6 sm:p-8 bg-gray-50 border-t border-gray-100">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <p class="text-sm text-gray-500 mb-1">Nama Pelanggan</p>
                <p class="font-medium text-gray-900">{{ $booking->customer_name }}</p>
              </div>
              <div>
                <p class="text-sm text-gray-500 mb-1">Kendaraan</p>
                <p class="font-medium text-gray-900">{{ optional($booking->car)->name ?? '-' }}</p>
              </div>
              <div>
                <p class="text-sm text-gray-500 mb-1">Tanggal Mulai</p>
                <p class="font-medium text-gray-900">{{ optional($booking->start_date)->format('d M Y') }}</p>
              </div>
              <div>
                <p class="text-sm text-gray-500 mb-1">Tanggal Selesai</p>
                <p class="font-medium text-gray-900">{{ optional($booking->end_date)->format('d M Y') }}</p>
              </div>
            </div>
          </div>
        </div>
      @endif

      @if(session('error'))
        <!-- Error Message -->
        <div class="bg-red-50 border border-red-200 rounded-2xl p-6 text-center animate-fade-in">
          <div class="inline-flex items-center justify-center w-12 h-12 bg-red-100 rounded-full mb-4">
            <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
              </path>
            </svg>
          </div>
          <h3 class="text-lg font-semibold text-red-800 mb-2">Pemesanan Tidak Ditemukan</h3>
          <p class="text-red-600">{{ session('error') }}</p>
        </div>
      @endif

      <!-- Footer Info -->
      <div class="mt-8 text-center text-sm text-gray-500">
        <p>Jika anda mengalami kesulitan, silahkan hubungi customer service kami</p>
      </div>
    </div>
  </div>

  <style>
    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fade-in {
      animation: fadeIn 0.4s ease-out;
    }
  </style>
</x-app-layout>