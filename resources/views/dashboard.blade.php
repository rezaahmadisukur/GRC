{{-- resources/views/dashboard.blade.php --}}
<x-admin-layout>
  <x-slot name="header">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div class="flex items-center gap-3">
        {{-- Animated Dashboard Icon --}}
        <div class="relative flex-shrink-0">
          <div
            class="w-11 h-11 bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200/60">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 5a1 1 0 011-1h4a1 1 0 011 1v5a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 15a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1H5a1 1 0 01-1-1v-4zM14 13a1 1 0 011-1h4a1 1 0 011 1v6a1 1 0 01-1 1h-4a1 1 0 01-1-1v-6z" />
            </svg>
          </div>
          <span class="absolute -top-0.5 -right-0.5 flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500 border-2 border-white"></span>
          </span>
        </div>
        <div>
          <h2 class="font-extrabold text-xl text-gray-900 leading-tight tracking-tight">Dashboard Admin</h2>
          <p class="text-xs text-gray-400 mt-0.5 flex items-center gap-1.5">
            <span class="text-gray-400">Selamat datang kembali,</span>
            <span class="font-bold text-emerald-600">{{ $user->name }}</span>
            <span>👋</span>
          </p>
        </div>
      </div>

      {{-- Date Badge --}}
      <div class="flex items-center gap-2.5">
        <div
          class="hidden sm:flex items-center gap-2 px-4 py-2 bg-white/80 backdrop-blur-sm border border-gray-200/80 rounded-2xl text-xs text-gray-500 shadow-sm">
          <div class="w-6 h-6 bg-emerald-50 rounded-lg flex items-center justify-center">
            <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <span class="font-semibold text-gray-600">{{ now()->locale('id_ID')->isoFormat('dddd, DD MMMM YYYY') }}</span>
        </div>

        {{-- Quick Refresh --}}
        <button onclick="window.location.reload()"
          class="w-9 h-9 flex items-center justify-center bg-white/80 backdrop-blur-sm border border-gray-200/80 rounded-xl text-gray-400 hover:text-emerald-600 hover:border-emerald-300 hover:bg-emerald-50 transition-all duration-200 shadow-sm group">
          <svg class="w-4 h-4 group-hover:rotate-180 transition-transform duration-500" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
          </svg>
        </button>
      </div>
    </div>
  </x-slot>

  {{-- ===================== CUSTOM STYLES ===================== --}}
  <style>
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInScale {
      from {
        opacity: 0;
        transform: scale(0.95);
      }

      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-16px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes countUp {
      from {
        opacity: 0;
        transform: translateY(8px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes shimmer {
      0% {
        background-position: -200% center;
      }

      100% {
        background-position: 200% center;
      }
    }

    @keyframes pulseDot {

      0%,
      100% {
        opacity: 1;
        transform: scale(1);
      }

      50% {
        opacity: 0.6;
        transform: scale(1.3);
      }
    }

    .anim-1 {
      animation: fadeInUp 0.5s cubic-bezier(.22, .68, 0, 1.2) 0.05s both;
    }

    .anim-2 {
      animation: fadeInUp 0.5s cubic-bezier(.22, .68, 0, 1.2) 0.12s both;
    }

    .anim-3 {
      animation: fadeInUp 0.5s cubic-bezier(.22, .68, 0, 1.2) 0.19s both;
    }

    .anim-4 {
      animation: fadeInUp 0.5s cubic-bezier(.22, .68, 0, 1.2) 0.26s both;
    }

    .anim-5 {
      animation: fadeInUp 0.5s cubic-bezier(.22, .68, 0, 1.2) 0.33s both;
    }

    .anim-6 {
      animation: fadeInUp 0.5s cubic-bezier(.22, .68, 0, 1.2) 0.40s both;
    }

    .stat-card {
      transition: all 0.35s cubic-bezier(.22, .68, 0, 1.2);
      position: relative;
    }

    .stat-card::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: inherit;
      opacity: 0;
      transition: opacity 0.3s ease;
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
    }

    .stat-card:hover {
      transform: translateY(-5px);
    }

    .stat-card:hover::before {
      opacity: 1;
    }

    .glass-card {
      background: rgba(255, 255, 255, 0.88);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
    }

    .chart-container canvas {
      display: block;
    }

    .pulse-dot {
      animation: pulseDot 1.8s ease infinite;
    }

    .table-row {
      transition: all 0.2s ease;
    }

    .table-row:hover {
      background: linear-gradient(135deg, rgba(16, 185, 129, 0.04), rgba(20, 184, 166, 0.02));
    }

    .period-btn-active {
      background: white;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
      color: #111827;
    }

    /* Scrollbar for table */
    .table-wrapper::-webkit-scrollbar {
      height: 4px;
    }

    .table-wrapper::-webkit-scrollbar-track {
      background: transparent;
    }

    .table-wrapper::-webkit-scrollbar-thumb {
      background: #e5e7eb;
      border-radius: 99px;
    }
  </style>

  {{-- ===================== PAGE WRAPPER ===================== --}}
  <div class="min-h-screen py-6 px-4 sm:px-6 lg:px-8"
    style="background: linear-gradient(135deg, #f0fdf8 0%, #f8faff 55%, #fdf4ff 100%);">
    <div class="max-w-7xl mx-auto space-y-5">

      {{-- =================== STAT CARDS =================== --}}
      @php
        $cards = [
          [
            'label' => $stats['label'],
            'value' => 'Rp ' . number_format($stats['primaryAmount'] ?? 0, 0, ',', '.'),
            'sub' => $user->role === 'owner' ? 'Sampai hari ini' : 'Hari ini',
            'icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
            'color' => 'emerald',
            'bg' => 'from-emerald-400 via-emerald-500 to-teal-600',
            'iconBg' => 'bg-emerald-50',
            'iconRing' => 'ring-emerald-100',
            'text' => 'text-emerald-600',
            'glow' => 'rgba(16,185,129,0.15)',
          ],
          [
            'label' => 'Total DP Diterima',
            'value' => 'Rp ' . number_format($stats['totalDP'] ?? 0, 0, ',', '.'),
            'sub' => $user->role === 'owner' ? 'Dari semua booking' : 'Hari ini',
            'icon' => 'M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z',
            'color' => 'blue',
            'bg' => 'from-blue-400 via-blue-500 to-indigo-600',
            'iconBg' => 'bg-blue-50',
            'iconRing' => 'ring-blue-100',
            'text' => 'text-blue-600',
            'glow' => 'rgba(59,130,246,0.15)',
          ],
          [
            'label' => 'Booking Aktif',
            'value' => (string) ($stats['activeBookings'] ?? 0),
            'sub' => 'Sedang berjalan',
            'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
            'color' => 'amber',
            'bg' => 'from-amber-400 via-amber-500 to-orange-500',
            'iconBg' => 'bg-amber-50',
            'iconRing' => 'ring-amber-100',
            'text' => 'text-amber-600',
            'live' => true,
            'glow' => 'rgba(245,158,11,0.15)',
          ],
          $user->role === 'owner'
          ? [
            'label' => 'Mobil Tersedia',
            'value' => (string) ($stats['availableCars'] ?? 0),
            'sub' => 'Total Staff: ' . ($stats['staffCount'] ?? 0),
            'icon' => 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4',
            'color' => 'indigo',
            'bg' => 'from-indigo-400 via-indigo-500 to-purple-600',
            'iconBg' => 'bg-indigo-50',
            'iconRing' => 'ring-indigo-100',
            'text' => 'text-indigo-600',
            'glow' => 'rgba(99,102,241,0.15)',
          ]
          : [
            'label' => 'Menunggu Persetujuan',
            'value' => (string) ($stats['pendingApproval'] ?? 0),
            'sub' => 'Perlu di-approve',
            'icon' => 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4',
            'color' => 'orange',
            'bg' => 'from-orange-400 via-orange-500 to-red-500',
            'iconBg' => 'bg-orange-50',
            'iconRing' => 'ring-orange-100',
            'text' => 'text-orange-600',
            'live' => true,
            'glow' => 'rgba(249,115,22,0.15)',
          ],
        ];
      @endphp

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($cards as $i => $card)
          @php $animClass = 'anim-' . ($i + 1); @endphp
          <div
            class="stat-card glass-card border border-white/70 rounded-2xl p-5 overflow-hidden ring-1 ring-gray-200/60 shadow-sm {{ $animClass }}"
            style="box-shadow: 0 4px 24px {{ $card['glow'] }}, 0 1px 3px rgba(0,0,0,0.04);">

            {{-- Gradient Top Bar --}}
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r {{ $card['bg'] }} rounded-t-2xl"></div>

            {{-- Background Glow Orb --}}
            <div
              class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full opacity-10 blur-2xl bg-gradient-to-br {{ $card['bg'] }}">
            </div>

            <div class="flex items-start justify-between gap-3 relative">
              <div class="flex-1 min-w-0">
                <p class="text-[10px] font-extrabold text-gray-400 uppercase tracking-widest mb-2">
                  {{ $card['label'] }}
                </p>
                <p class="text-2xl font-black text-gray-900 leading-none truncate tabular-nums">
                  {{ $card['value'] }}
                </p>

                {{-- Growth Badge (first card only) --}}
                @if($loop->first && isset($stats['growth']))
                  <div class="flex items-center gap-1.5 mt-2">
                    @if($stats['growth'] >= 0)
                      <span
                        class="inline-flex items-center gap-0.5 text-[10px] font-bold text-emerald-700 bg-emerald-100 px-1.5 py-0.5 rounded-lg">
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                        {{ $stats['growth'] }}%
                      </span>
                    @else
                      <span
                        class="inline-flex items-center gap-0.5 text-[10px] font-bold text-red-700 bg-red-100 px-1.5 py-0.5 rounded-lg">
                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                            d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                        {{ abs($stats['growth']) }}%
                      </span>
                    @endif
                    <span class="text-[9px] text-gray-400 font-medium">vs periode lalu</span>
                  </div>
                @endif

                {{-- Sub Label --}}
                <div class="flex items-center gap-1.5 mt-2">
                  @if(!empty($card['live']))
                    <span class="relative flex h-2 w-2">
                      <span
                        class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $card['text'] }} opacity-75 bg-current"></span>
                      <span class="relative inline-flex rounded-full h-2 w-2 {{ $card['text'] }} bg-current"></span>
                    </span>
                  @endif
                  <p class="text-xs text-gray-400 font-medium">{{ $card['sub'] }}</p>
                </div>
              </div>

              {{-- Icon Box --}}
              <div
                class="w-12 h-12 rounded-2xl {{ $card['iconBg'] }} ring-1 {{ $card['iconRing'] }} flex items-center justify-center shrink-0 transition-transform duration-300 group-hover:scale-110">
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
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 anim-5">

          {{-- Revenue Line Chart --}}
          <div class="lg:col-span-2 glass-card border border-white/70 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200/60">

            {{-- Chart Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
              <div>
                <div class="flex items-center gap-2 mb-0.5">
                  <div class="w-1 h-5 bg-gradient-to-b from-emerald-500 to-teal-600 rounded-full"></div>
                  <h3 class="font-extrabold text-gray-900 text-base">Tren Pendapatan</h3>
                </div>
                <p class="text-xs text-gray-400 ml-3" id="chart-period-label">7 hari terakhir</p>
              </div>

              <div class="flex items-center gap-2 flex-wrap">
                {{-- Period Toggle --}}
                <div class="flex items-center bg-gray-100/80 rounded-xl p-1 gap-0.5">
                  @foreach([7 => '7h', 30 => '30h', 90 => '90h', 365 => 'Tahun'] as $period => $label)
                    <button data-period="{{ $period }}"
                      class="chart-period-btn px-3 py-1.5 text-[11px] font-bold rounded-lg transition-all duration-200 text-gray-500 hover:text-gray-700">
                      {{ $label }}
                    </button>
                  @endforeach
                </div>

                {{-- Live Indicator --}}
                <div
                  class="flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 border border-emerald-200 rounded-xl text-xs text-emerald-600 font-semibold">
                  <span class="relative flex h-2 w-2">
                    <span
                      class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                  </span>
                  Live
                </div>
              </div>
            </div>

            {{-- Chart Canvas --}}
            <div class="h-64 chart-container">
              <canvas id="revenueChart"></canvas>
            </div>

            {{-- Chart Footer Stats --}}
            <div class="mt-4 pt-4 border-t border-gray-100 grid grid-cols-3 gap-3">
              <div class="text-center">
                <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">Rata-rata</p>
                <p class="text-sm font-black text-gray-900 mt-0.5" id="chart-avg">—</p>
              </div>
              <div class="text-center border-x border-gray-100">
                <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">Tertinggi</p>
                <p class="text-sm font-black text-emerald-600 mt-0.5" id="chart-max">—</p>
              </div>
              <div class="text-center">
                <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider">Terendah</p>
                <p class="text-sm font-black text-gray-500 mt-0.5" id="chart-min">—</p>
              </div>
            </div>
          </div>

          {{-- Donut Chart --}}
          <div class="glass-card border border-white/70 rounded-2xl p-6 shadow-sm ring-1 ring-gray-200/60">
            <div class="mb-5">
              <div class="flex items-center gap-2 mb-0.5">
                <div class="w-1 h-5 bg-gradient-to-b from-blue-500 to-indigo-600 rounded-full"></div>
                <h3 class="font-extrabold text-gray-900 text-base">Unit Terpopuler</h3>
              </div>
              <p class="text-xs text-gray-400 ml-3">Berdasarkan jumlah sewa</p>
            </div>

            @if($popularCars->isNotEmpty())
              {{-- Donut Canvas --}}
              <div class="relative h-48 flex items-center justify-center mb-5">
                <canvas id="donutChart"></canvas>
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                  <p class="text-3xl font-black text-gray-900 tabular-nums">{{ $popularCars->sum('bookings_count') }}</p>
                  <p class="text-[10px] text-gray-400 font-semibold uppercase tracking-wider mt-0.5">Total Sewa</p>
                </div>
              </div>

              {{-- Legend --}}
              <div class="space-y-2.5" id="donut-legend"></div>

            @else
              <div class="h-48 flex flex-col items-center justify-center gap-3">
                <div class="w-14 h-14 bg-gray-100 rounded-2xl flex items-center justify-center">
                  <svg class="w-7 h-7 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                  </svg>
                </div>
                <div class="text-center">
                  <p class="text-sm font-semibold text-gray-500">Belum ada data</p>
                  <p class="text-xs text-gray-400 mt-0.5">Data sewa akan muncul di sini</p>
                </div>
              </div>
            @endif
          </div>
        </div>
      @endif

      {{-- =================== RECENT BOOKINGS =================== --}}
      <div
        class="glass-card border border-white/70 rounded-2xl overflow-hidden shadow-sm ring-1 ring-gray-200/60 anim-6">

        {{-- Section Header --}}
        <div
          class="px-5 sm:px-6 py-4 border-b border-gray-100/80 flex items-center justify-between gap-3 bg-gradient-to-r from-white/50 to-gray-50/30">
          <div class="flex items-center gap-3">
            <div class="flex items-center gap-2">
              <div class="w-1 h-5 bg-gradient-to-b from-emerald-500 to-teal-600 rounded-full"></div>
              <div>
                <h3 class="font-extrabold text-gray-900 text-sm">Aktivitas Terbaru</h3>
                <p class="text-[10px] text-gray-400 font-medium mt-0.5">Booking yang baru masuk</p>
              </div>
            </div>
            @if(!$recentBookings->isEmpty())
              <span
                class="inline-flex items-center gap-1 text-[10px] font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2 py-0.5 rounded-full">
                <span class="relative flex h-1.5 w-1.5">
                  <span
                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-500"></span>
                </span>
                {{ $recentBookings->count() }} data
              </span>
            @endif
          </div>

          <a href="{{ route('admin.bookings.index') }}"
            class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 hover:text-emerald-700 transition-all px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 hover:border-emerald-300 rounded-xl group">
            Lihat semua
            <svg class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7" />
            </svg>
          </a>
        </div>

        {{-- Empty State --}}
        @if($recentBookings->isEmpty())
          <div class="py-20 flex flex-col items-center justify-center text-center px-4">
            <div class="relative mb-4">
              <div
                class="w-20 h-20 bg-gradient-to-br from-gray-100 to-slate-100 rounded-3xl flex items-center justify-center shadow-inner">
                <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
              </div>
              <div class="absolute -bottom-1 -right-1 w-7 h-7 bg-gray-200 rounded-xl flex items-center justify-center">
                <span class="text-gray-400 text-xs font-bold">0</span>
              </div>
            </div>
            <p class="font-bold text-gray-600 text-base">Belum ada aktivitas</p>
            <p class="text-sm text-gray-400 mt-1.5 max-w-xs leading-relaxed">Semua booking baru akan muncul di sini secara
              otomatis.</p>
          </div>

        @else
          {{-- Table --}}
          <div class="table-wrapper overflow-x-auto">
            <table class="min-w-full">
              <thead>
                <tr class="bg-gradient-to-r from-gray-50/80 to-slate-50/60 border-b border-gray-100">
                  @foreach(['Kode Booking', 'Penyewa', 'Kendaraan', 'Disetujui Oleh', 'Status', 'Total'] as $th)
                    <th
                      class="px-5 py-3.5 text-left text-[10px] font-extrabold text-gray-400 uppercase tracking-widest whitespace-nowrap {{ $loop->last ? 'text-right' : '' }}">
                      {{ $th }}
                    </th>
                  @endforeach
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-50/80">
                @foreach($recentBookings as $booking)
                  @php
                    $badge = match ($booking->status) {
                      'pending' => ['cls' => 'bg-amber-50 text-amber-700 ring-amber-200', 'dot' => 'bg-amber-400', 'label' => 'Menunggu', 'pulse' => true],
                      'active' => ['cls' => 'bg-emerald-50 text-emerald-700 ring-emerald-200', 'dot' => 'bg-emerald-500', 'label' => 'Aktif', 'pulse' => true],
                      'completed' => ['cls' => 'bg-blue-50 text-blue-700 ring-blue-200', 'dot' => 'bg-blue-500', 'label' => 'Selesai', 'pulse' => false],
                      'cancelled' => ['cls' => 'bg-red-50 text-red-700 ring-red-200', 'dot' => 'bg-red-400', 'label' => 'Batal', 'pulse' => false],
                      default => ['cls' => 'bg-gray-100 text-gray-600 ring-gray-200', 'dot' => 'bg-gray-400', 'label' => ucfirst($booking->status), 'pulse' => false],
                    };

                    $avatarColors = [
                      'pending' => 'from-amber-400 to-orange-500',
                      'active' => 'from-emerald-400 to-teal-500',
                      'completed' => 'from-blue-400 to-indigo-500',
                      'cancelled' => 'from-gray-400 to-slate-500',
                    ];
                    $avatarGrad = $avatarColors[$booking->status] ?? 'from-emerald-400 to-teal-500';
                  @endphp
                  <tr class="table-row group">
                    {{-- Booking Code --}}
                    <td class="px-5 py-3.5 whitespace-nowrap">
                      <span
                        class="font-mono text-xs font-bold text-gray-700 bg-gray-100 hover:bg-gray-200 px-2.5 py-1.5 rounded-xl transition-colors cursor-default">
                        #{{ $booking->booking_code }}
                      </span>
                    </td>

                    {{-- Customer --}}
                    <td class="px-5 py-3.5 whitespace-nowrap">
                      <div class="flex items-center gap-2.5">
                        <div class="relative flex-shrink-0">
                          <div
                            class="w-8 h-8 rounded-xl bg-gradient-to-br {{ $avatarGrad }} flex items-center justify-center text-white text-[10px] font-black shadow-sm">
                            {{ strtoupper(substr($booking->customer_name, 0, 2)) }}
                          </div>
                          @if($booking->status === 'active')
                            <span
                              class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-emerald-400 rounded-full border-2 border-white"></span>
                          @endif
                        </div>
                        <span class="text-sm text-gray-800 font-semibold">{{ $booking->customer_name }}</span>
                      </div>
                    </td>

                    {{-- Car --}}
                    <td class="px-5 py-3.5 whitespace-nowrap">
                      <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-lg bg-slate-100 flex items-center justify-center flex-shrink-0">
                          <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                          </svg>
                        </div>
                        <span class="text-sm text-gray-700 font-medium">{{ $booking->car->name ?? '—' }}</span>
                      </div>
                    </td>

                    {{-- Admin --}}
                    <td class="px-5 py-3.5 whitespace-nowrap">
                      @if($booking->admin?->name)
                        <span
                          class="inline-flex items-center gap-1 text-xs font-semibold text-blue-700 bg-blue-50 border border-blue-200 px-2 py-0.5 rounded-lg">
                          <span class="w-1.5 h-1.5 rounded-full bg-blue-400"></span>
                          {{ $booking->admin->name }}
                        </span>
                      @else
                        <span class="text-xs text-gray-300 italic">—</span>
                      @endif
                    </td>

                    {{-- Status --}}
                    <td class="px-5 py-3.5 whitespace-nowrap">
                      <span
                        class="inline-flex items-center gap-1.5 rounded-xl px-2.5 py-1 text-[10px] font-bold ring-1 {{ $badge['cls'] }}">
                        <span class="relative flex h-1.5 w-1.5">
                          @if($badge['pulse'])
                            <span
                              class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $badge['dot'] }} opacity-75 bg-current"></span>
                          @endif
                          <span class="relative inline-flex rounded-full h-1.5 w-1.5 {{ $badge['dot'] }}"></span>
                        </span>
                        {{ $badge['label'] }}
                      </span>
                    </td>

                    {{-- Total --}}
                    <td class="px-5 py-3.5 whitespace-nowrap text-right">
                      <span class="text-sm font-black text-gray-900">
                        Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                      </span>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          {{-- Table Footer --}}
          <div
            class="px-5 sm:px-6 py-3 bg-gradient-to-r from-gray-50/60 to-slate-50/40 border-t border-gray-100 flex items-center justify-between">
            <p class="text-xs text-gray-400">
              Menampilkan <span class="font-bold text-gray-600">{{ $recentBookings->count() }}</span> transaksi terbaru
            </p>
            <a href="{{ route('admin.bookings.index') }}"
              class="text-xs font-semibold text-emerald-600 hover:text-emerald-700 transition-colors">
              Lihat semua →
            </a>
          </div>
        @endif
      </div>

    </div>
  </div>

  {{-- =================== SCRIPTS =================== --}}
  @if($user->role === 'owner' && !empty($chartData))
    <script>
      document.addEventListener('DOMContentLoaded', () => {

        /* ─── Palette ─────────────────────────────────────── */
        const COLORS = [
          '#10b981', '#3b82f6', '#f59e0b', '#8b5cf6',
          '#ef4444', '#06b6d4', '#ec4899', '#84cc16',
          '#f97316', '#14b8a6'
        ];

        const idr = v => 'Rp ' + (v >= 1e9
          ? (v / 1e9).toFixed(1) + 'M'
          : v >= 1e6
            ? (v / 1e6).toFixed(1) + 'jt'
            : v.toLocaleString('id-ID'));

        /* ─── Revenue Chart ───────────────────────────────── */
        const rCanvas = document.getElementById('revenueChart');
        if (!rCanvas) return;
        const rCtx = rCanvas.getContext('2d');

        // Multi-stop gradient fill
        const grad = rCtx.createLinearGradient(0, 0, 0, 260);
        grad.addColorStop(0, 'rgba(16,185,129,.30)');
        grad.addColorStop(0.5, 'rgba(16,185,129,.10)');
        grad.addColorStop(1, 'rgba(16,185,129,0)');

        const chartLabels = @json($chartData['labels'] ?? []);
        const chartData = @json($chartData['data'] ?? []);

        // Compute stats
        const avg = chartData.length ? Math.round(chartData.reduce((a, b) => a + b, 0) / chartData.length) : 0;
        const max = chartData.length ? Math.max(...chartData) : 0;
        const min = chartData.length ? Math.min(...chartData) : 0;

        const setChartStats = () => {
          const avgEl = document.getElementById('chart-avg');
          const maxEl = document.getElementById('chart-max');
          const minEl = document.getElementById('chart-min');
          if (avgEl) avgEl.textContent = idr(avg);
          if (maxEl) maxEl.textContent = idr(max);
          if (minEl) minEl.textContent = idr(min);
        };
        setChartStats();

        const revenueChart = new Chart(rCtx, {
          type: 'line',
          data: {
            labels: chartLabels,
            datasets: [{
              data: chartData,
              borderColor: '#10b981',
              borderWidth: 2.5,
              fill: true,
              backgroundColor: grad,
              tension: 0.42,
              pointBackgroundColor: '#ffffff',
              pointBorderColor: '#10b981',
              pointBorderWidth: 2.5,
              pointRadius: 4,
              pointHoverRadius: 7,
              pointHoverBackgroundColor: '#10b981',
              pointHoverBorderColor: '#fff',
              pointHoverBorderWidth: 2.5,
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: { intersect: false, mode: 'index' },
            animation: {
              duration: 900,
              easing: 'easeOutQuart',
            },
            plugins: {
              legend: { display: false },
              tooltip: {
                backgroundColor: 'rgba(17,24,39,0.95)',
                titleColor: '#9ca3af',
                bodyColor: '#f9fafb',
                padding: 12,
                cornerRadius: 12,
                borderColor: 'rgba(255,255,255,0.1)',
                borderWidth: 1,
                displayColors: false,
                callbacks: {
                  label: ctx => '  ' + idr(ctx.raw)
                }
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                grid: { color: 'rgba(0,0,0,0.04)', drawBorder: false },
                border: { display: false },
                ticks: {
                  color: '#9ca3af',
                  font: { size: 11, weight: '500' },
                  callback: v => idr(v),
                  maxTicksLimit: 5,
                }
              },
              x: {
                grid: { display: false },
                border: { display: false },
                ticks: {
                  color: '#9ca3af',
                  font: { size: 11, weight: '500' },
                  maxRotation: 0,
                }
              }
            }
          }
        });

        /* ─── Donut Chart ─────────────────────────────────── */
        const dCanvas = document.getElementById('donutChart');
        if (dCanvas) {
          const cars = @json($popularCars->pluck('name')->map(fn($n, $i) => $n ?? 'Mobil ' . ($i + 1)));
          const counts = @json($popularCars->pluck('bookings_count'));
          const total = counts.reduce((a, b) => a + b, 0);

          const dCtx = dCanvas.getContext('2d');
          new Chart(dCtx, {
            type: 'doughnut',
            data: {
              labels: cars,
              datasets: [{
                data: counts,
                backgroundColor: COLORS.slice(0, cars.length),
                borderWidth: 3,
                borderColor: '#ffffff',
                hoverBorderWidth: 4,
                hoverOffset: 8,
              }]
            },
            options: {
              responsive: true,
              maintainAspectRatio: false,
              cutout: '74%',
              animation: { duration: 900, easing: 'easeOutQuart' },
              plugins: {
                legend: { display: false },
                tooltip: {
                  backgroundColor: 'rgba(17,24,39,0.95)',
                  titleColor: '#9ca3af',
                  bodyColor: '#f9fafb',
                  padding: 12,
                  cornerRadius: 12,
                  borderColor: 'rgba(255,255,255,0.1)',
                  borderWidth: 1,
                  callbacks: {
                    label: ctx => `  ${ctx.raw} sewa  (${((ctx.raw / total) * 100).toFixed(1)}%)`
                  }
                }
              }
            }
          });

          /* Custom Legend */
          const legend = document.getElementById('donut-legend');
          if (legend) {
            cars.forEach((name, i) => {
              const pct = total > 0 ? ((counts[i] / total) * 100).toFixed(0) : 0;
              legend.innerHTML += `
                  <div class="flex items-center gap-2.5 group">
                      <span class="w-2.5 h-2.5 rounded-full shrink-0 shadow-sm"
                          style="background:${COLORS[i]};box-shadow:0 0 6px ${COLORS[i]}60"></span>
                      <span class="text-xs text-gray-600 flex-1 truncate font-semibold">${name}</span>
                      <div class="flex items-center gap-2 ml-auto shrink-0">
                          <div class="w-16 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                              <div class="w-0 h-full rounded-full transition-all duration-[1100ms] ease-out"
                                  style="background:linear-gradient(90deg,${COLORS[i]},${COLORS[(i + 1) % COLORS.length]})"
                                  data-w="${pct}"></div>
                          </div>
                          <span class="text-[11px] font-black text-gray-600 w-6 text-right tabular-nums">${counts[i]}</span>
                      </div>
                  </div>`;
            });

            /* Animate progress bars */
            requestAnimationFrame(() => {
              setTimeout(() => {
                document.querySelectorAll('[data-w]').forEach(el => {
                  el.style.width = el.dataset.w + '%';
                });
              }, 350);
            });
          }
        }

        /* ─── Period Filter ───────────────────────────────── */
        const periodLabels = {
          '7': '7 hari terakhir',
          '30': '30 hari terakhir',
          '90': '90 hari terakhir',
          '365': 'Tahun ini'
        };

        const urlParams = new URLSearchParams(window.location.search);
        const currentPeriod = urlParams.get('period') || '7';
        const periodLabel = document.getElementById('chart-period-label');

        // Set initial label
        if (periodLabel) periodLabel.textContent = periodLabels[currentPeriod] || '7 hari terakhir';

        // Sync active button state
        document.querySelectorAll('.chart-period-btn').forEach(btn => {
          const isActive = btn.dataset.period == currentPeriod;
          btn.classList.toggle('period-btn-active', isActive);
          btn.classList.toggle('text-gray-700', isActive);
          btn.classList.toggle('text-gray-500', !isActive);
        });

        // Period click handler
        document.querySelectorAll('.chart-period-btn').forEach(btn => {
          btn.addEventListener('click', function () {
            // Visual feedback immediately
            document.querySelectorAll('.chart-period-btn').forEach(b => {
              b.classList.remove('period-btn-active', 'text-gray-700');
              b.classList.add('text-gray-500');
            });
            this.classList.add('period-btn-active', 'text-gray-700');
            this.classList.remove('text-gray-500');

            // Navigate
            const params = new URLSearchParams(window.location.search);
            params.set('period', this.dataset.period);
            window.location.search = params.toString();
          });
        });

      });
    </script>
  @endif

</x-admin-layout>