<x-admin-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="font-bold text-xl text-gray-900 leading-tight">Dashboard Admin</h2>
        <p class="text-sm text-gray-400 mt-0.5">
          Selamat datang kembali, <span class="font-semibold text-emerald-600">{{ $user->name }}</span> 👋
        </p>
      </div>
      <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-gray-50
                  border border-gray-200 rounded-xl text-xs text-gray-500">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0
                   00-2 2v12a2 2 0 002 2z" />
        </svg>
        {{ now()->translatedFormat('l, d F Y') }}
      </div>
    </div>
  </x-slot>


  {{-- ===================== PAGE WRAPPER ===================== --}}
  <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8 bg-[linear-gradient(135deg,#f0fdf8_0%,#f8faff_55%,#fdf4ff_100%)]">
    <div class="max-w-7xl mx-auto space-y-6">

      @php
        $cards = [
          [
            'label' => $stats['label'],
            'value' => 'Rp ' . number_format($stats['primaryAmount'] ?? 0, 0, ',', '.'),
            'sub' => $user->role === 'owner' ? 'Sampai hari ini' : 'Hari ini',
            'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
            'color' => 'emerald',
            'bg' => 'from-emerald-400 to-emerald-600',
            'light' => 'bg-emerald-50',
            'text' => 'text-emerald-600',
          ],
          [
            'label' => 'Total DP Diterima',
            'value' => 'Rp ' . number_format($stats['totalDP'] ?? 0, 0, ',', '.'),
            'sub' => $user->role === 'owner' ? 'Dari semua booking' : 'Hari ini',
            'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
            'color' => 'blue',
            'bg' => 'from-blue-400 to-blue-600',
            'light' => 'bg-blue-50',
            'text' => 'text-blue-600',
          ],
          [
            'label' => 'Booking Aktif',
            'value' => (string) ($stats['activeBookings'] ?? 0),
            'sub' => 'Sedang berjalan',
            'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
            'color' => 'amber',
            'bg' => 'from-amber-400 to-amber-500',
            'light' => 'bg-amber-50',
            'text' => 'text-amber-600',
            'live' => true,
          ],
          $user->role === 'owner'
          ? [
            'label' => 'Mobil Tersedia',
            'value' => (string) ($stats['availableCars'] ?? 0),
            'sub' => 'Total Staff: ' . ($stats['staffCount'] ?? 0),
            'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
            'color' => 'indigo',
            'bg' => 'from-indigo-400 to-indigo-600',
            'light' => 'bg-indigo-50',
            'text' => 'text-indigo-600',
          ]
          : [
            'label' => 'Menunggu Persetujuan',
            'value' => (string) ($stats['pendingApproval'] ?? 0),
            'sub' => 'Perlu di-approve',
            'icon' => 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4',
            'color' => 'orange',
            'bg' => 'from-orange-400 to-orange-500',
            'light' => 'bg-orange-50',
            'text' => 'text-orange-600',
            'live' => true,
          ],
        ];
      @endphp

      {{-- =================== STAT CARDS =================== --}}
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach($cards as $card)
          <div
            class="transition-all duration-[250ms] hover:-translate-y-1 hover:shadow-[0_16px_32px_rgba(0,0,0,0.08)] opacity-0 animate-[fadeInUp_.45s_ease_forwards] @even:animate-delay-[100ms] @lg:nth-child(3):animate-delay-[150ms] @lg:nth-child(4):animate-delay-[200ms] bg-white/85 backdrop-blur-xl border border-white/70 rounded-2xl p-5 overflow-hidden relative">
            {{-- subtle gradient top-bar --}}
            <div class="absolute top-0 left-0 right-0 h-1 rounded-t-2xl
                          bg-gradient-to-r {{ $card['bg'] }}"></div>

            <div class="flex items-start justify-between gap-3">
              <div class="flex-1 min-w-0">
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-2">
                  {{ $card['label'] }}
                </p>
                <p class="text-2xl font-extrabold text-gray-900 leading-none truncate">
                  {{ $card['value'] }}
                </p>
                <div class="flex items-center gap-1.5 mt-2">
                  @if(!empty($card['live']))
                    <span
                      class="w-2 h-2 rounded-full inline-block animate-[pulse-dot_1.8s_ease_infinite] {{ $card['text'] }}"
                      style="color:inherit"></span>
                  @endif
                  <p class="text-xs text-gray-400">{{ $card['sub'] }}</p>
                </div>
              </div>

              <div class="w-11 h-11 rounded-xl {{ $card['light'] }} flex items-center
                            justify-center shrink-0">
                <svg class="w-5 h-5 {{ $card['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}" />
                </svg>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{-- =================== OWNER: CHART + DONUT =================== --}}
      @if($user->role === 'owner' && !empty($chartData))
        <div
          class="grid grid-cols-1 lg:grid-cols-3 gap-5 opacity-0 animate-[fadeInUp_.45s_ease_forwards] animate-delay-[250ms]">

          {{-- Revenue Chart --}}
          <div class="lg:col-span-2 bg-white/85 backdrop-blur-xl border border-white/70 rounded-2xl p-6">
            <div class="flex items-center justify-between mb-5">
              <div>
                <h3 class="font-bold text-gray-900">Tren Pendapatan</h3>
                <p class="text-xs text-gray-400 mt-0.5">7 hari terakhir</p>
              </div>
              <div class="flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50
                            border border-emerald-100 rounded-xl text-xs text-emerald-600 font-medium">
                <span class="w-2 h-2 rounded-full inline-block animate-[pulse-dot_1.8s_ease_infinite]"
                  style="color:#10b981"></span>
                Live
              </div>
            </div>
            <div class="h-60">
              <canvas id="revenueChart"></canvas>
            </div>
          </div>

          {{-- Donut + Legend --}}
          <div class="bg-white/85 backdrop-blur-xl border border-white/70 rounded-2xl p-6">
            <div class="mb-5">
              <h3 class="font-bold text-gray-900">Unit Terpopuler</h3>
              <p class="text-xs text-gray-400 mt-0.5">Berdasarkan jumlah sewa</p>
            </div>

            @if($popularCars->isNotEmpty())
              {{-- Donut canvas --}}
              <div class="relative h-44 flex items-center justify-center mb-5">
                <canvas id="donutChart"></canvas>
                {{-- Center label --}}
                <div class="absolute inset-0 flex flex-col items-center
                                    justify-center pointer-events-none">
                  <p class="text-2xl font-extrabold text-gray-900">
                    {{ $popularCars->sum('bookings_count') }}
                  </p>
                  <p class="text-xs text-gray-400">Total Sewa</p>
                </div>
              </div>

              {{-- Legend list --}}
              <div class="space-y-2" id="donut-legend"></div>

            @else
              <div class="h-44 flex flex-col items-center justify-center text-gray-300 gap-2">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0
                                   002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2
                                   2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2
                                   2 0 01-2-2z" />
                </svg>
                <p class="text-sm">Belum ada data</p>
              </div>
            @endif
          </div>

        </div>
      @endif

      {{-- =================== RECENT BOOKINGS =================== --}}
      <div
        class="bg-white/85 backdrop-blur-xl border border-white/70 rounded-2xl overflow-hidden opacity-0 animate-[fadeInUp_.45s_ease_forwards] animate-delay-[300ms]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
          <div>
            <h3 class="font-bold text-gray-900">Aktivitas Terbaru</h3>
            <p class="text-xs text-gray-400 mt-0.5">Booking yang baru masuk</p>
          </div>
          <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center gap-1 text-xs font-semibold text-emerald-600
                  hover:text-emerald-700 transition-colors px-3 py-1.5 bg-emerald-50
                  hover:bg-emerald-100 rounded-lg">
            Lihat semua
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>

        @if($recentBookings->isEmpty())
          <div class="py-16 flex flex-col items-center justify-center text-center px-4">
            <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center
                            justify-center mb-4">
              <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0
                             01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <p class="font-semibold text-gray-700 mb-1">Belum ada aktivitas</p>
            <p class="text-xs text-gray-400">Semua booking baru akan muncul di sini</p>
          </div>

        @else
          <div class="overflow-x-auto">
            <table class="min-w-full">
              <thead>
                <tr class="bg-gray-50/80">
                  @foreach(['Kode Booking', 'Penyewa', 'Mobil', 'Admin', 'Status', 'Total'] as $th)
                    <th class="px-5 py-3 text-left text-[11px] font-semibold text-gray-400
                                       uppercase tracking-wider
                                       {{ $loop->last ? 'text-right' : '' }}">
                      {{ $th }}
                    </th>
                  @endforeach
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-50">
                @foreach($recentBookings as $booking)
                  @php
                    $badge = match ($booking->status) {
                      'pending' => ['cls' => 'bg-amber-50 text-amber-700 ring-amber-200', 'label' => 'Pending'],
                      'active' => ['cls' => 'bg-emerald-50 text-emerald-700 ring-emerald-200', 'label' => 'Aktif'],
                      'completed' => ['cls' => 'bg-blue-50 text-blue-700 ring-blue-200', 'label' => 'Selesai'],
                      'cancelled' => ['cls' => 'bg-red-50 text-red-700 ring-red-200', 'label' => 'Batal'],
                      default => ['cls' => 'bg-gray-100 text-gray-600 ring-gray-200', 'label' => ucfirst($booking->status)],
                    };
                  @endphp
                  <tr class="transition-colors duration-150 hover:bg-[#f8fffe]">
                    <td class="px-5 py-3.5 whitespace-nowrap">
                      <span class="font-mono text-xs font-semibold text-gray-800
                                           bg-gray-100 px-2 py-1 rounded-lg">
                        {{ $booking->booking_code }}
                      </span>
                    </td>
                    <td class="px-5 py-3.5 whitespace-nowrap">
                      <div class="flex items-center gap-2">
                        <div class="w-7 h-7 rounded-full bg-gradient-to-br from-emerald-400
                                            to-blue-500 flex items-center justify-center text-white
                                            text-[10px] font-bold shrink-0">
                          {{ strtoupper(substr($booking->customer_name, 0, 1)) }}
                        </div>
                        <span class="text-sm text-gray-700 font-medium">
                          {{ $booking->customer_name }}
                        </span>
                      </div>
                    </td>
                    <td class="px-5 py-3.5 whitespace-nowrap text-sm text-gray-600">
                      {{ $booking->car->name ?? '-' }}
                    </td>
                    <td class="px-5 py-3.5 whitespace-nowrap text-sm text-gray-400">
                      {{ $booking->admin->name ?? '-' }}
                    </td>
                    <td class="px-5 py-3.5 whitespace-nowrap">
                      <span class="inline-flex items-center rounded-full px-2.5 py-0.5
                                           text-[11px] font-semibold ring-1 {{ $badge['cls'] }}">
                        {{ $badge['label'] }}
                      </span>
                    </td>
                    <td class="px-5 py-3.5 whitespace-nowrap text-right">
                      <span class="text-sm font-bold text-gray-900">
                        Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                      </span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @endif
      </div>

    </div>
  </div>

  {{-- =================== SCRIPTS =================== --}}
  @if($user->role === 'owner' && !empty($chartData))
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        /* -------- Palette -------- */
        const COLORS = [
          '#10b981', '#3b82f6', '#f59e0b', '#8b5cf6',
          '#ef4444', '#06b6d4', '#ec4899', '#84cc16'
        ];

        /* -------- Revenue Line Chart -------- */
        const rCtx = document.getElementById('revenueChart').getContext('2d');
        const grad = rCtx.createLinearGradient(0, 0, 0, 240);
        grad.addColorStop(0, 'rgba(16,185,129,.25)');
        grad.addColorStop(1, 'rgba(16,185,129,0)');

        new Chart(rCtx, {
          type: 'line',
          data: {
            labels: @json($chartData['labels'] ?? []),
            datasets: [{
              data: @json($chartData['data'] ?? []),
              borderColor: '#10b981',
              borderWidth: 2.5,
              fill: true,
              backgroundColor: grad,
              tension: 0.45,
              pointBackgroundColor: '#fff',
              pointBorderColor: '#10b981',
              pointBorderWidth: 2,
              pointRadius: 4,
              pointHoverRadius: 6,
              pointHoverBackgroundColor: '#10b981',
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { intersect: false, mode: 'index' },
            plugins: {
              legend: { display: false },
              tooltip: {
                backgroundColor: '#1f2937',
                titleColor: '#9ca3af',
                bodyColor: '#f9fafb',
                padding: 10,
                cornerRadius: 10,
                callbacks: {
                  label: ctx => ' Rp ' + ctx.raw.toLocaleString('id-ID')
                }
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                grid: { color: 'rgba(0,0,0,.04)', drawBorder: false },
                ticks: {
                  color: '#9ca3af', font: { size: 11 },
                  callback: v => 'Rp ' + (v >= 1e6
                    ? (v / 1e6).toFixed(1) + 'jt'
                    : v.toLocaleString('id-ID'))
                }
              },
              x: {
                grid: { display: false },
                ticks: { color: '#9ca3af', font: { size: 11 } }
              }
            }
          }
        });

        /* -------- Donut Chart -------- */
        const cars = @json($popularCars->pluck('name')->map(fn($n, $i) => $n ?? 'Mobil ' . ($i + 1)));
        const counts = @json($popularCars->pluck('bookings_count'));
        const total = counts.reduce((a, b) => a + b, 0);

        const dCtx = document.getElementById('donutChart').getContext('2d');
        new Chart(dCtx, {
          type: 'doughnut',
          data: {
            labels: cars,
            datasets: [{
              data: counts,
              backgroundColor: COLORS.slice(0, cars.length),
              borderWidth: 2,
              borderColor: '#fff',
              hoverBorderWidth: 3,
              hoverOffset: 6,
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '72%',
            plugins: {
              legend: { display: false },
              tooltip: {
                backgroundColor: '#1f2937',
                titleColor: '#9ca3af',
                bodyColor: '#f9fafb',
                padding: 10,
                cornerRadius: 10,
                callbacks: {
                  label: ctx => ` ${ctx.raw} sewa (${((ctx.raw / total) * 100).toFixed(1)}%)`
                }
              }
            }
          }
        });

        /* -------- Custom Legend -------- */
        const legend = document.getElementById('donut-legend');
        if (legend) {
          cars.forEach((name, i) => {
            const pct = total > 0 ? ((counts[i] / total) * 100).toFixed(0) : 0;
            legend.innerHTML += `
                <div class="flex items-center gap-2.5">
                  <span class="w-2.5 h-2.5 rounded-full shrink-0"
                        style="background:${COLORS[i]}"></span>
                  <span class="text-xs text-gray-600 flex-1 truncate font-medium">${name}</span>
                  <div class="flex items-center gap-1.5 ml-auto shrink-0">
                    <div class="w-16 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                      <div class="w-0 h-full rounded-full transition-all duration-[1200ms] ease-[cubic-bezier(.4,0,.2,1)]" style="background:${COLORS[i]}" data-w="${pct}"></div>
                    </div>
                    <span class="text-[11px] font-bold text-gray-500 w-7 text-right">
                      ${counts[i]}
                    </span>
                  </div>
                </div>`;
          });

          /* Animate progress bars */
          requestAnimationFrame(() => {
            document.querySelectorAll('.bar-fill').forEach(el => {
              el.style.width = el.dataset.w + '%';
            });
          });
        }
      });
    </script>
  @endif

</x-admin-layout>