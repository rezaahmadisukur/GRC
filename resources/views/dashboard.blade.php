<x-admin-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard Admin') }}
    </h2>
  </x-slot>

  <div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      {{-- Statistic Cards --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

        {{-- Main Amount Card - Dynamic based on role --}}
        <div
          class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500 mb-1">{{ $stats['label'] }}</p>
              <p class="text-2xl font-bold text-gray-900">Rp
                {{ number_format($stats['primaryAmount'] ?? 0, 0, ',', '.') }}
              </p>
              <p class="text-xs text-gray-500 mt-1">
                @if($user->role === 'owner')
                  Sampai tanggal hari ini
                @else
                  Hari ini
                @endif
              </p>
            </div>
            <div class="w-12 h-12 rounded-full bg-emerald-50 flex items-center justify-center">
              <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
          </div>
        </div>

        {{-- Total DP Diterima --}}
        <div
          class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500 mb-1">Total DP Diterima</p>
              <p class="text-2xl font-bold text-gray-900">Rp
                {{ number_format($stats['totalDP'] ?? 0, 0, ',', '.') }}
              </p>
              <p class="text-xs text-gray-500 mt-1">
                @if($user->role === 'owner')
                  Dari semua booking
                @else
                  Hari ini
                @endif
              </p>
            </div>
            <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center">
              <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
          </div>
        </div>

        {{-- Booking Aktif --}}
        <div
          class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
          <div class="flex items-center justify-between">
            <div>
              <p class="text-sm font-medium text-gray-500 mb-1">Booking Aktif</p>
              <p class="text-2xl font-bold text-gray-900">{{ $stats['activeBookings'] ?? 0 }}</p>
              <p class="text-xs text-gray-500 mt-1">Sedang berjalan</p>
            </div>
            <div class="w-12 h-12 rounded-full bg-amber-50 flex items-center justify-center">
              <svg class="w-6 h-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
              </svg>
            </div>
          </div>
        </div>

        {{-- 4th Card - Dynamic based on role --}}
        @if($user->role === 'owner')
          {{-- Mobil Tersedia --}}
          <div
            class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Mobil Tersedia</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['availableCars'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Total Staff: {{ $stats['staffCount'] ?? 0 }}</p>
              </div>
              <div class="w-12 h-12 rounded-full bg-indigo-50 flex items-center justify-center">
                <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
              </div>
            </div>
          </div>
        @else
          {{-- Pending Approval (For Admin Role) --}}
          <div
            class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 transition-all duration-300 hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
              <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Menunggu Persetujuan</p>
                <p class="text-2xl font-bold text-gray-900">{{ $stats['pendingApproval'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Booking perlu di-approve</p>
              </div>
              <div class="w-12 h-12 rounded-full bg-orange-50 flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                </svg>
              </div>
            </div>
          </div>
        @endif

      </div>

      {{-- Middle Section: Chart + Popular Cars --}}
      @if($user->role === 'owner' && !empty($chartData))
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
          {{-- Chart Pendapatan --}}
          <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Tren Pendapatan (7 Hari Terakhir)</h3>
            <div class="h-64">
              <canvas id="revenueChart"></canvas>
            </div>
          </div>

          {{-- Unit Terpopuler --}}
          <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100">
              <h3 class="font-semibold text-gray-900">Unit Terpopuler</h3>
            </div>
            <div class="p-4 space-y-3">
              @foreach($popularCars as $index => $car)
                <div class="flex items-center gap-3 p-3 rounded-lg bg-gray-50 hover:bg-gray-100 transition-colors">
                  <div
                    class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-sm">
                    {{ $index + 1 }}
                  </div>
                  <div class="flex-1">
                    <p class="font-medium text-gray-900">{{ $car->name ?? 'Mobil ' . $car->id }}</p>
                    <p class="text-xs text-gray-500">{{ $car->bookings_count }} kali disewa</p>
                  </div>
                </div>
              @endforeach

              @if($popularCars->isEmpty())
                <div class="text-center py-8 text-gray-400 text-sm">
                  Belum ada data peminjaman
                </div>
              @endif
            </div>
          </div>
        </div>
      @endif

      {{-- Bottom Section: Aktivitas Terbaru --}}
      <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
          <h3 class="font-semibold text-gray-900">Aktivitas Terbaru</h3>
          <a href="{{ route('admin.bookings.index') }}"
            class="text-sm font-medium text-indigo-600 hover:text-indigo-700 transition-colors">
            Lihat semua →
          </a>
        </div>

        <div class="overflow-x-auto">
          @if ($recentBookings->isEmpty())
            <div class="p-12 text-center">
              <div class="flex flex-col items-center justify-center">
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                  <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">
                  Belum ada aktivitas
                </h3>
                <p class="text-gray-500 mb-6 max-w-sm mx-auto text-sm">
                  Semua booking yang masuk akan muncul di sini.
                </p>
              </div>
            </div>
          @else
            <table class="min-w-full">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kode Booking
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Penyewa
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Mobil
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Admin
                  </th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Total
                  </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
                @foreach ($recentBookings as $booking)
                  <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span class="font-medium text-gray-900">{{ $booking->booking_code }}</span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                      {{ $booking->customer_name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-700">
                      {{ $booking->car->name ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 text-sm">
                      {{ $booking->admin->name ?? '-' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      @php
                        $badgeClasses = match ($booking->status) {
                          'pending' => 'bg-amber-50 text-amber-700 ring-1 ring-inset ring-amber-600/20',
                          'active' => 'bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-600/20',
                          'completed' => 'bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-600/20',
                          'cancelled' => 'bg-red-50 text-red-700 ring-1 ring-inset ring-red-600/20',
                          default => 'bg-gray-50 text-gray-700 ring-1 ring-inset ring-gray-600/20'
                        };
                      @endphp
                      <span
                        class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $badgeClasses }}">
                        {{ ucfirst($booking->status) }}
                      </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right font-medium text-gray-900">
                      Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @endif
        </div>
      </div>

    </div>
  </div>

  @if($user->role === 'owner' && !empty($chartData))
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('revenueChart').getContext('2d');

        // Gradasi Warna buat Area Grafik
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(16, 185, 129, 0.4)'); // Emerald
        gradient.addColorStop(1, 'rgba(16, 185, 129, 0)');

        new Chart(ctx, {
          type: 'line',
          data: {
            labels: @json($chartData['labels'] ?? []),
            datasets: [{
              label: 'Pendapatan (Rp)',
              data: @json($chartData['data'] ?? []),
              borderColor: '#10b981', // Emerald-500
              borderWidth: 3,
              fill: true,
              backgroundColor: gradient,
              tension: 0.4, // Bikin garisnya melengkung smooth
              pointBackgroundColor: '#10b981',
              pointRadius: 4,
              pointHoverRadius: 6
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: { display: false },
              tooltip: {
                callbacks: {
                  label: function (context) {
                    return 'Rp ' + context.raw.toLocaleString('id-ID');
                  }
                }
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                grid: {
                  display: true,
                  color: 'rgba(0, 0, 0, 0.05)',
                  drawBorder: false
                },
                ticks: {
                  callback: function (value) {
                    return 'Rp ' + value.toLocaleString('id-ID');
                  }
                }
              },
              x: {
                grid: {
                  display: false
                }
              }
            }
          }
        });
      });
    </script>
  @endif
</x-admin-layout>