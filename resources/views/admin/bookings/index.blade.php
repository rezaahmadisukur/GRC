@php
  $statCards = [
    (object) [
      'label' => 'Total Pesanan',
      'value' => $totalAllBookings,
      'color' => 'slate',
      'live' => false,
      'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
      'bg' => 'from-slate-700 to-slate-500',
      'iconBg' => 'bg-slate-100',
      'text' => 'text-slate-600',
      'ring' => 'ring-slate-200',
      'trend' => null,
    ],
    (object) [
      'label' => 'Menunggu',
      'value' => $pendingCount,
      'color' => 'amber',
      'live' => true,
      'trend' => null,
      'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
      'bg' => 'from-orange-700 to-amber-500',
      'iconBg' => 'bg-amber-50',
      'text' => 'text-amber-600',
      'ring' => 'ring-amber-200',
    ],
    (object) [
      'label' => 'Aktif',
      'value' => $activeCount,
      'color' => 'emerald',
      'live' => true,
      'trend' => null,
      'icon' => 'M5 13l4 4L19 7',
      'bg' => 'from-teal-700 to-emerald-500',
      'iconBg' => 'bg-emerald-50',
      'text' => 'text-emerald-600',
      'ring' => 'ring-emerald-200',
    ],
    (object) [
      'label' => 'Selesai',
      'value' => $completedCount,
      'color' => 'blue',
      'live' => false,
      'trend' => null,
      'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
      'bg' => 'from-indigo-700 to-blue-500',
      'iconBg' => 'bg-blue-50',
      'text' => 'text-blue-600',
      'ring' => 'ring-blue-200',
    ],
  ];
@endphp

<x-admin-layout title="Daftar Pemesanan">
  <x-slot name="header">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div class="flex items-center gap-3">
        {{-- Animated Icon --}}
        <div class="relative flex-shrink-0">
          <div
            class="w-11 h-11 bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-200/60">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
          </div>
          <span class="absolute -top-0.5 -right-0.5 flex h-3 w-3">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-emerald-500 border-2 border-white"></span>
          </span>
        </div>
        <div>
          <h2 class="text-xl font-extrabold text-gray-900 tracking-tight leading-tight">Manajemen Pemesanan</h2>
          <p class="text-xs text-gray-400 mt-0.5 flex items-center gap-1.5">
            <span class="inline-block w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
            Kelola semua transaksi sewa kendaraan secara real-time
          </p>
        </div>
      </div>

      {{-- Search Bar --}}
      <div class="relative w-full sm:w-80 lg:w-96">
        <div class="absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none">
          <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input type="text" id="search-input" placeholder="Cari customer, kode booking, kendaraan..."
          class="w-full pl-10 pr-10 py-2.5 bg-white/80 backdrop-blur-sm border border-gray-200/80 rounded-2xl text-sm text-gray-700 placeholder-gray-400 focus:ring-2 focus:ring-emerald-400/50 focus:border-emerald-400 focus:bg-white transition-all duration-300 shadow-sm hover:shadow-md hover:border-gray-300">
        <button id="clear-search"
          class="absolute right-3 top-1/2 -translate-y-1/2 w-5 h-5 flex items-center justify-center rounded-full text-gray-400 hover:text-white hover:bg-gray-400 transition-all duration-200 hidden">
          <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </x-slot>

  <div class="min-h-screen py-6 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto space-y-5">

      {{-- =================== STAT CARDS =================== --}}
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4">
        @foreach($statCards as $stat)
          <x-admin.bookings.stat-card :label="$stat->label" :value="$stat->value" :color="$stat->color"
            :icon="$stat->icon" :iconBg="$stat->iconBg" :text="$stat->text" :ring="$stat->ring" :trend="$stat->trend"
            :live="$stat->live" :bg="$stat->bg" :delay="$loop->index * 0.08" />
        @endforeach
      </div>

      {{-- =================== TABLE CARD =================== --}}
      <div
        class="bg-white/80 backdrop-blur-xl border border-white/70 rounded-2xl overflow-hidden shadow-sm animate-fadeInUp ring-1 ring-gray-200/60"
        style="animation-delay: .2s">

        {{-- Table Header --}}
        <div
          class="px-5 sm:px-6 py-4 border-b border-gray-100/80 flex flex-col sm:flex-row sm:items-center justify-between gap-3 bg-gradient-to-r from-white/50 to-gray-50/50">
          <div class="flex items-center gap-3">
            <div class="flex items-center gap-2">
              <span class="relative flex h-2.5 w-2.5">
                <span
                  class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
              </span>
              <span class="text-sm font-bold text-gray-800">Daftar Pemesanan</span>
            </div>
            <span
              class="inline-flex items-center gap-1 text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-0.5 rounded-full font-semibold">
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 10h16M4 14h16M4 18h16" />
              </svg>
              {{ $bookings->total() }} data
            </span>
          </div>

          {{-- Filter Pills --}}
          <div class="flex items-center gap-1.5 flex-wrap" id="filter-pills">
            @foreach(['all' => 'Semua', 'pending' => 'Menunggu', 'active' => 'Aktif', 'completed' => 'Selesai', 'cancelled' => 'Batal'] as $val => $lbl)
              <button data-filter="{{ $val }}"
                class="filter-pill px-3.5 py-1.5 rounded-xl text-xs font-semibold transition-all duration-200 {{ $val === 'all' ? 'bg-emerald-500 text-white shadow-sm shadow-emerald-200 scale-[1.02]' : 'bg-gray-100 text-gray-500 hover:bg-gray-200 hover:text-gray-700 hover:scale-[1.02]' }}">
                {{ $lbl }}
              </button>
            @endforeach
          </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
          <table class="w-full" id="bookings-table">
            <thead>
              <tr class="bg-gradient-to-r from-gray-50/80 to-slate-50/80 border-b border-gray-100">
                @foreach(['Pelanggan', 'Kendaraan', 'Tanggal & Durasi', 'Total Harga', 'Disetujui Oleh', 'Status', 'Aksi'] as $th)
                  <th
                    class="px-5 py-3.5 text-left text-[10px] font-extrabold text-gray-400 uppercase tracking-widest {{ $loop->last ? 'text-right' : '' }} whitespace-nowrap">
                    {{ $th }}
                  </th>
                @endforeach
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-50/80" id="bookings-tbody">

              @forelse($bookings as $booking)
                @php
                  $badge = match ($booking->status) {
                    'pending' => ['cls' => 'bg-amber-50 text-amber-700 ring-amber-200', 'dot' => 'bg-amber-400', 'label' => 'Menunggu', 'pulse' => true],
                    'active' => ['cls' => 'bg-emerald-50 text-emerald-700 ring-emerald-200', 'dot' => 'bg-emerald-500', 'label' => 'Aktif', 'pulse' => true],
                    'completed' => ['cls' => 'bg-blue-50 text-blue-700 ring-blue-200', 'dot' => 'bg-blue-500', 'label' => 'Selesai', 'pulse' => false],
                    'cancelled' => ['cls' => 'bg-red-50 text-red-600 ring-red-200', 'dot' => 'bg-red-400', 'label' => 'Dibatalkan', 'pulse' => false],
                    default => ['cls' => 'bg-gray-100 text-gray-600 ring-gray-200', 'dot' => 'bg-gray-400', 'label' => ucfirst($booking->status), 'pulse' => false],
                  };
                  $initials = strtoupper(substr($booking->customer->name, 0, 2));
                  $h = $booking->duration_hours;
                  $dur = $h < 24
                    ? "{$h} Jam"
                    : (($r = $h % 24) === 0
                      ? floor($h / 24) . ' Hari'
                      : floor($h / 24) . ' Hari ' . $r . ' Jam');

                  $avatarColors = [
                    'pending' => 'from-amber-400 to-orange-500',
                    'active' => 'from-emerald-400 to-teal-500',
                    'completed' => 'from-blue-400 to-indigo-500',
                    'cancelled' => 'from-gray-400 to-slate-500',
                  ];
                  $avatarGrad = $avatarColors[$booking->status] ?? 'from-emerald-400 to-teal-500';
                @endphp

                <tr
                  class="transition-all duration-200 hover:bg-gradient-to-r hover:from-emerald-50/50 hover:to-teal-50/30 group"
                  data-status="{{ $booking->status }}"
                  data-search="{{ strtolower($booking->customer->name . ' ' . $booking->booking_code . ' ' . ($booking->car->name ?? '')) }}">

                  {{-- Customer --}}
                  <td class="px-5 py-4">
                    <div class="flex items-center gap-3">
                      <div class="relative flex-shrink-0">
                        <div
                          class="w-10 h-10 rounded-2xl bg-gradient-to-br {{ $avatarGrad }} flex items-center justify-center text-white text-xs font-black shadow-sm">
                          {{ $initials }}
                        </div>
                        @if($booking->status === 'active' || $booking->status === 'pending')
                          <span
                            class="absolute -bottom-0.5 -right-0.5 w-3 h-3 {{ $booking->status === 'active' ? 'bg-emerald-400' : 'bg-amber-400' }} rounded-full border-2 border-white"></span>
                        @endif
                      </div>
                      <div class="min-w-0">
                        <p class="font-bold text-gray-900 text-sm truncate max-w-[140px]">{{ $booking->customer->name }}
                        </p>
                        <p class="text-xs text-gray-400 flex items-center gap-1 mt-0.5">
                          <svg class="w-3 h-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                          </svg>
                          <span class="truncate">{{ $booking->customer->whatsapp_number }}</span>
                        </p>
                        <p class="text-[10px] font-mono text-gray-300 mt-0.5 tracking-wide">#{{ $booking->booking_code }}
                        </p>
                      </div>
                    </div>
                  </td>

                  {{-- Vehicle --}}
                  <td class="px-5 py-4">
                    <div class="flex items-start gap-2">
                      <div>
                        <p class="font-bold text-gray-800 text-sm leading-tight">{{ $booking->car->name }}</p>
                        <div class="flex items-center gap-1.5 mt-1">
                          <span
                            class="text-[10px] font-mono font-bold text-gray-500 bg-gray-100 px-1.5 py-0.5 rounded-md">{{ strtoupper($booking->car->plate_code) }}</span>
                          <span class="text-gray-200">•</span>
                          <span
                            class="text-[10px] font-semibold text-gray-400">{{ $booking->car->transmission === 'AT' ? 'Otomatis' : 'Manual' }}</span>
                        </div>
                      </div>
                    </div>
                  </td>

                  {{-- Date & Duration --}}
                  <td class="px-5 py-4">
                    <p class="text-sm font-bold text-gray-800">
                      {{ $booking->start_date->format('d M Y') }}
                    </p>
                    <p class="text-[10px] text-gray-400 mt-0.5">s/d {{ $booking->end_date->format('d M Y') }}</p>
                    <span
                      class="inline-flex items-center mt-1.5 gap-1 px-2 py-0.5 bg-violet-50 text-violet-600 text-[10px] font-bold rounded-full ring-1 ring-violet-200">
                      <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      {{ $dur }}
                    </span>
                  </td>

                  {{-- Total --}}
                  <td class="px-5 py-4">
                    <p class="font-black text-gray-900 text-sm">
                      Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                    </p>
                    <div class="flex items-center gap-1 mt-1">
                      <span class="text-[10px] text-gray-400 font-medium">DP:</span>
                      <span class="text-[10px] font-bold text-emerald-600">Rp
                        {{ number_format($booking->dp_amount, 0, ',', '.') }}</span>
                    </div>
                  </td>

                  {{-- Approved By --}}
                  <td class="px-5 py-4">
                    @if($booking->admin_id && $booking->user)
                      <div
                        class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-xl text-[11px] font-semibold cursor-help
                              {{ $booking->user->role === 'owner' ? 'bg-purple-50 text-purple-700 ring-1 ring-purple-200' : 'bg-blue-50 text-blue-700 ring-1 ring-blue-200' }}"
                        title="{{ $booking->user->role === 'owner' ? '👑 Owner' : '👤 Admin' }} | {{ $booking->updated_at->translatedFormat('d M Y H:i') }}">
                        <span
                          class="w-1.5 h-1.5 rounded-full {{ $booking->user->role === 'owner' ? 'bg-purple-500' : 'bg-blue-400' }}"></span>
                        {{ $booking->user->name }}
                        @if($booking->user->role === 'owner')
                          <svg class="w-2.5 h-2.5 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                            <path
                              d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                          </svg>
                        @endif
                      </div>
                    @else
                      <span class="text-[11px] text-gray-300 italic">—</span>
                    @endif
                  </td>

                  {{-- Status Badge --}}
                  <td class="px-5 py-4">
                    <span
                      class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-xl text-[11px] font-bold ring-1 {{ $badge['cls'] }}">
                      <span class="relative flex h-1.5 w-1.5 flex-shrink-0">
                        @if($badge['pulse'])
                          <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full {{ $badge['dot'] }} opacity-75 bg-current"></span>
                        @endif
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 {{ $badge['dot'] }}"></span>
                      </span>
                      {{ $badge['label'] }}
                    </span>
                  </td>

                  {{-- Actions --}}
                  <td class="px-5 py-4">
                    <div class="flex items-center justify-end gap-1.5 flex-wrap">

                      @if($booking->status === 'pending')

                        {{-- Approve Button --}}
                        <button type="button"
                          class="transition-all duration-200 ease-out active:scale-95 hover:-translate-y-0.5 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white shadow-sm shadow-emerald-200 open-dp-modal"
                          data-booking-id="{{ $booking->id }}" data-booking-code="{{ $booking->booking_code }}"
                          data-customer-name="{{ $booking->customer->name }}" data-total-price="{{ $booking->total_price }}"
                          data-current-dp="{{ $booking->dp_amount }}">
                          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                          </svg>
                          Setujui
                        </button>

                        <form id="confirm-form-{{ $booking->id }}" method="POST"
                          action="{{ route('admin.bookings.update-status', $booking) }}" class="hidden">
                          @csrf @method('PATCH')
                          <input type="hidden" name="status" value="confirmed">
                          <input type="hidden" name="dp_amount" id="dp-input-{{ $booking->id }}">
                        </form>

                        {{-- Reject Button --}}
                        <button type="button"
                          class="transition-all duration-200 ease-out active:scale-95 hover:-translate-y-0.5 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-red-50 hover:bg-red-100 text-red-600 ring-1 ring-red-200 hover:ring-red-300 open-cancel-modal"
                          data-booking-id="{{ $booking->id }}" data-booking-code="{{ $booking->booking_code }}"
                          data-customer-name="{{ $booking->customer->name }}"
                          data-action="{{ route('admin.bookings.update-status', $booking) }}" data-mode="reject">
                          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                              d="M6 18L18 6M6 6l12 12" />
                          </svg>
                          Tolak
                        </button>

                        <form id="reject-form-{{ $booking->id }}" method="POST"
                          action="{{ route('admin.bookings.update-status', $booking) }}" class="hidden">
                          @csrf @method('PATCH')
                          <input type="hidden" name="status" value="cancelled">
                          <input type="hidden" name="cancel_reason" id="cancel-reason-{{ $booking->id }}">
                        </form>

                      @elseif($booking->status === 'active')

                        {{-- Complete Button --}}
                        <button type="button"
                          class="transition-all duration-200 ease-out active:scale-95 hover:-translate-y-0.5 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 text-white shadow-sm shadow-blue-200 open-complete-modal"
                          data-booking-id="{{ $booking->id }}" data-booking-code="{{ $booking->booking_code }}"
                          data-customer-name="{{ $booking->customer->name }}" data-total-price="{{ $booking->total_price }}"
                          data-end-date="{{ $booking->end_date->format('d M Y H:i') }}">
                          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                          Selesai
                        </button>

                        <form id="complete-form-{{ $booking->id }}" method="POST"
                          action="{{ route('admin.bookings.update-status', $booking) }}" class="hidden">
                          @csrf @method('PATCH')
                          <input type="hidden" name="status" value="completed">
                          <input type="hidden" name="penalty_amount" id="penalty-input-{{ $booking->id }}">
                          <input type="hidden" name="return_notes" id="notes-input-{{ $booking->id }}">
                        </form>

                        {{-- Cancel Active --}}
                        <button type="button"
                          class="transition-all duration-200 ease-out active:scale-95 hover:-translate-y-0.5 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-orange-50 hover:bg-orange-100 text-orange-600 ring-1 ring-orange-200 open-cancel-modal"
                          data-booking-id="{{ $booking->id }}" data-booking-code="{{ $booking->booking_code }}"
                          data-customer-name="{{ $booking->customer->name }}"
                          data-action="{{ route('admin.bookings.update-status', $booking) }}" data-mode="cancel">
                          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                          </svg>
                          Batalkan
                        </button>

                        {{-- Print Receipt --}}
                        <a href="{{ route('admin.bookings.receipt', $booking) }}" target="_blank"
                          class="transition-all duration-200 ease-out active:scale-95 hover:-translate-y-0.5 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-teal-50 hover:bg-teal-100 text-teal-600 ring-1 ring-teal-200">
                          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                          </svg>
                          Struk
                        </a>

                        <form id="cancel-form-{{ $booking->id }}" method="POST"
                          action="{{ route('admin.bookings.update-status', $booking) }}" class="hidden">
                          @csrf @method('PATCH')
                          <input type="hidden" name="status" value="cancelled">
                          <input type="hidden" name="cancel_reason" id="cancel-reason-{{ $booking->id }}">
                        </form>

                      @elseif($booking->status === 'completed')

                        {{-- Receipt Only --}}
                        <a href="{{ route('admin.bookings.receipt', $booking) }}" target="_blank"
                          class="transition-all duration-200 ease-out active:scale-95 hover:-translate-y-0.5 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-bold bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-600 hover:to-indigo-600 text-white shadow-sm shadow-blue-200">
                          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                          </svg>
                          Cetak Struk
                        </a>

                      @endif
                    </div>
                  </td>
                </tr>

              @empty
                <tr>
                  <td colspan="7" class="py-24 text-center">
                    <div class="flex flex-col items-center gap-4">
                      <div class="relative">
                        <div
                          class="w-20 h-20 bg-gradient-to-br from-gray-100 to-slate-100 rounded-3xl flex items-center justify-center shadow-inner">
                          <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                          </svg>
                        </div>
                        <div
                          class="absolute -top-1 -right-1 w-6 h-6 bg-gray-200 rounded-full flex items-center justify-center">
                          <span class="text-gray-400 text-xs">0</span>
                        </div>
                      </div>
                      <div>
                        <p class="font-bold text-gray-600 text-base">Belum Ada Pemesanan</p>
                        <p class="text-sm text-gray-400 mt-1 max-w-xs mx-auto leading-relaxed">Semua pemesanan baru akan
                          muncul di sini secara otomatis.</p>
                      </div>
                    </div>
                  </td>
                </tr>
              @endforelse

            </tbody>
          </table>
        </div>

        {{-- No Search Result --}}
        <div id="no-result" class="hidden py-16 text-center">
          <div class="flex flex-col items-center gap-3">
            <div
              class="w-16 h-16 bg-gradient-to-br from-gray-100 to-slate-100 rounded-2xl flex items-center justify-center">
              <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <div>
              <p class="font-bold text-gray-500">Tidak Ada Hasil</p>
              <p class="text-sm text-gray-400 mt-0.5">Coba ubah kata kunci pencarian Anda.</p>
            </div>
          </div>
        </div>

        {{-- Pagination --}}
        @if($bookings->total() > 0)
          <div
            class="px-5 sm:px-6 py-4 border-t border-gray-100 bg-gradient-to-r from-gray-50/60 to-slate-50/40 flex flex-col sm:flex-row items-center justify-between gap-3">
            {{ $bookings->links() }}
          </div>
        @endif
      </div>

    </div>
  </div>

  {{-- =================== MODAL: DP / APPROVE =================== --}}
  <div id="dp-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden" role="dialog"
    aria-modal="true">
    <div class="animate-overlayIn absolute inset-0 bg-black/50 backdrop-blur-md" id="dp-modal-backdrop"></div>
    <div class="animate-modalIn relative w-full max-w-md" id="dp-modal-content">
      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden ring-1 ring-black/5">

        {{-- Modal Header --}}
        <div class="relative px-6 pt-6 pb-5 bg-gradient-to-br from-emerald-50 to-teal-50 border-b border-emerald-100">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div
                class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-md shadow-emerald-200">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
              </div>
              <div>
                <h3 class="font-extrabold text-gray-900 text-base">Konfirmasi Pemesanan</h3>
                <p class="text-xs text-emerald-600 font-medium mt-0.5">Atur jumlah DP yang diterima</p>
              </div>
            </div>
            <button id="close-modal-btn"
              class="w-8 h-8 flex items-center justify-center rounded-xl text-gray-400 hover:text-gray-600 hover:bg-white/80 transition-all">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>

        {{-- Modal Body --}}
        <div class="p-6 space-y-4">
          {{-- Customer Card --}}
          <div
            class="flex items-center gap-3 p-4 bg-gradient-to-r from-emerald-50 to-teal-50 rounded-2xl ring-1 ring-emerald-200">
            <div
              class="w-11 h-11 rounded-2xl bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white text-sm font-black shadow-sm"
              id="dp-modal-avatar">--</div>
            <div>
              <p class="font-bold text-gray-900 text-sm" id="modal-customer-name">–</p>
              <p class="text-xs text-emerald-600 font-mono font-semibold" id="modal-booking-code">–</p>
            </div>
            <div class="ml-auto">
              <span class="text-[10px] font-bold bg-emerald-500 text-white px-2 py-0.5 rounded-full">Pending</span>
            </div>
          </div>

          {{-- Price Info --}}
          <div class="bg-gray-50 rounded-2xl p-4 space-y-4 ring-1 ring-gray-100">
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500 font-medium">Total Harga Sewa</span>
              <span class="font-black text-gray-900" id="modal-total-price">Rp 0</span>
            </div>

            {{-- DP Input --}}
            <div>
              <label class="block text-xs font-extrabold text-gray-600 mb-2 uppercase tracking-widest">
                Jumlah Down Payment (DP)
              </label>
              <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-bold text-gray-400">Rp</span>
                <input type="number" id="modal-dp-input" min="0" placeholder="0"
                  class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-2xl text-lg font-black text-gray-900 bg-white focus:ring-0 focus:border-emerald-400 transition-all duration-200 hover:border-gray-300">
              </div>
            </div>

            <div class="flex justify-between items-center pt-3 border-t-2 border-dashed border-gray-200">
              <span class="text-sm text-gray-500 font-medium">Sisa Pembayaran</span>
              <span class="text-xl font-black text-emerald-600" id="modal-remaining">Rp 0</span>
            </div>
          </div>
        </div>

        {{-- Modal Footer --}}
        <div class="px-6 pb-6 flex gap-3">
          <button id="modal-cancel-btn"
            class="flex-1 py-3 rounded-2xl bg-gray-100 text-gray-600 text-sm font-bold hover:bg-gray-200 transition-all active:scale-95">
            Batal
          </button>
          <button id="modal-confirm-btn"
            class="flex-1 py-3 rounded-2xl bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-sm font-bold shadow-lg shadow-emerald-200 hover:shadow-emerald-300 hover:from-emerald-600 hover:to-teal-600 transition-all active:scale-95 flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
            </svg>
            Konfirmasi & Setujui
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- =================== MODAL: COMPLETE =================== --}}
  <div id="complete-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden" role="dialog"
    aria-modal="true">
    <div class="animate-overlayIn absolute inset-0 bg-black/50 backdrop-blur-md" id="complete-modal-backdrop"></div>
    <div class="animate-modalIn relative w-full max-w-md" id="complete-modal-content">
      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden ring-1 ring-black/5">

        {{-- Header --}}
        <div class="relative px-6 pt-6 pb-5 bg-gradient-to-br from-blue-50 to-indigo-50 border-b border-blue-100">
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div
                class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-md shadow-blue-200">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <h3 class="font-extrabold text-gray-900 text-base">Selesaikan Pemesanan</h3>
                <p class="text-xs text-blue-600 font-medium mt-0.5">Tandai booking sebagai selesai</p>
              </div>
            </div>
            <button id="close-complete-modal-btn"
              class="w-8 h-8 flex items-center justify-center rounded-xl text-gray-400 hover:text-gray-600 hover:bg-white/80 transition-all">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>

        {{-- Body --}}
        <div class="p-6 space-y-4">
          <div
            class="flex items-center gap-3 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl ring-1 ring-blue-200">
            <div
              class="w-11 h-11 rounded-2xl bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center text-white text-sm font-black shadow-sm"
              id="complete-modal-avatar">--</div>
            <div>
              <p class="font-bold text-gray-900 text-sm" id="complete-modal-customer-name">–</p>
              <p class="text-xs text-blue-600 font-mono font-semibold" id="complete-modal-booking-code">–</p>
            </div>
            <div class="ml-auto">
              <span class="text-[10px] font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">Aktif</span>
            </div>
          </div>

          <div class="bg-gray-50 rounded-2xl p-4 space-y-4 ring-1 ring-gray-100">
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500 font-medium">Total Harga Sewa</span>
              <span class="font-black text-gray-900" id="complete-modal-total-price">Rp 0</span>
            </div>

            <div>
              <label class="block text-xs font-extrabold text-gray-600 mb-2 uppercase tracking-widest">
                Denda <span class="normal-case font-normal text-gray-400 text-[10px]">(Keterlambatan / Kerusakan)</span>
              </label>
              <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-bold text-gray-400">Rp</span>
                <input type="number" id="complete-modal-penalty-input" min="0" value="0"
                  class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-2xl text-lg font-black text-gray-900 bg-white focus:ring-0 focus:border-blue-400 transition-all duration-200 hover:border-gray-300">
              </div>
            </div>

            <div>
              <label class="block text-xs font-extrabold text-gray-600 mb-2 uppercase tracking-widest">
                Catatan Pengembalian <span class="normal-case font-normal text-gray-400 text-[10px]">(opsional)</span>
              </label>
              <textarea id="complete-modal-notes-input" rows="2"
                class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl text-sm bg-white text-gray-700 resize-none focus:ring-0 focus:border-blue-400 transition-all duration-200 hover:border-gray-300 placeholder-gray-300"
                placeholder="Kondisi mobil saat dikembalikan..."></textarea>
            </div>

            <div class="flex justify-between items-center pt-3 border-t-2 border-dashed border-gray-200">
              <span class="text-sm text-gray-500 font-medium">Total Akhir</span>
              <span class="text-xl font-black text-blue-600" id="complete-modal-final-total">Rp 0</span>
            </div>
          </div>
        </div>

        {{-- Footer --}}
        <div class="px-6 pb-6 flex gap-3">
          <button id="complete-modal-cancel-btn"
            class="flex-1 py-3 rounded-2xl bg-gray-100 text-gray-600 text-sm font-bold hover:bg-gray-200 transition-all active:scale-95">
            Batal
          </button>
          <button id="complete-modal-confirm-btn"
            class="flex-1 py-3 rounded-2xl bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-sm font-bold shadow-lg shadow-blue-200 hover:shadow-blue-300 hover:from-blue-600 hover:to-indigo-600 transition-all active:scale-95 flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Selesaikan Booking
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- =================== MODAL: CANCEL / REJECT =================== --}}
  <div id="cancel-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden" role="dialog"
    aria-modal="true" aria-labelledby="cancel-modal-title">
    <div class="animate-overlayIn absolute inset-0 bg-black/50 backdrop-blur-md" id="cancel-modal-backdrop"></div>
    <div class="animate-modalIn relative w-full max-w-sm" id="cancel-modal-content">
      <div class="bg-white rounded-3xl shadow-2xl overflow-hidden ring-1 ring-black/5">

        {{-- Danger Header --}}
        <div
          class="relative px-6 pt-8 pb-6 bg-gradient-to-br from-red-50 to-rose-50 flex flex-col items-center text-center">
          {{-- Animated Icon --}}
          <div class="relative mb-4">
            <div class="absolute inset-0 rounded-full bg-red-200 animate-ping opacity-30 scale-125"></div>
            <div
              class="relative w-16 h-16 bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl flex items-center justify-center shadow-lg shadow-red-200 rotate-3">
              <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
          </div>
          <h3 id="cancel-modal-title" class="text-lg font-extrabold text-gray-900">Batalkan Pesanan?</h3>
          <p class="text-sm text-gray-500 mt-1.5 leading-relaxed" id="cancel-modal-subtitle">
            Tindakan ini tidak dapat dibatalkan.
          </p>
        </div>

        {{-- Body --}}
        <div class="px-6 py-5 space-y-4">
          {{-- Customer Chip --}}
          <div class="flex items-center gap-3 p-3.5 bg-red-50 rounded-2xl ring-1 ring-red-200">
            <div
              class="w-10 h-10 rounded-2xl bg-gradient-to-br from-red-400 to-rose-500 flex items-center justify-center text-white text-xs font-black flex-shrink-0"
              id="cancel-modal-avatar">--</div>
            <div>
              <p class="font-bold text-gray-900 text-sm" id="cancel-modal-customer">–</p>
              <p class="text-xs text-red-500 font-mono font-semibold" id="cancel-modal-code">–</p>
            </div>
          </div>

          {{-- Reason --}}
          <div>
            <label class="block text-xs font-extrabold text-gray-600 mb-2 uppercase tracking-widest">
              Alasan Pembatalan <span class="normal-case font-normal text-gray-400">(opsional)</span>
            </label>
            <textarea id="cancel-modal-reason" rows="3"
              class="w-full px-4 py-3 border-2 border-gray-200 rounded-2xl text-sm bg-white text-gray-700 resize-none focus:ring-0 focus:border-red-400 transition-all duration-200 hover:border-gray-300 placeholder-gray-300"
              placeholder="Masukkan alasan pembatalan..."></textarea>
          </div>
        </div>

        {{-- Footer --}}
        <div class="px-6 pb-6 flex gap-3">
          <button id="cancel-modal-dismiss"
            class="flex-1 py-3 rounded-2xl bg-gray-100 text-gray-600 text-sm font-bold hover:bg-gray-200 transition-all active:scale-95">
            Kembali
          </button>
          <button id="cancel-modal-confirm"
            class="flex-1 py-3 rounded-2xl bg-gradient-to-r from-red-500 to-rose-600 text-white text-sm font-bold shadow-lg shadow-red-200 hover:shadow-red-300 hover:from-red-600 hover:to-rose-700 transition-all active:scale-95 flex items-center justify-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Ya, Batalkan
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- =================== JAVASCRIPT =================== --}}
  @push('scripts')
    <script>
      (() => {
        'use strict';

        const $ = id => document.getElementById(id);
        const idr = n => 'Rp ' + new Intl.NumberFormat('id-ID').format(n || 0);
        const initials = name => (name || '--').trim().substring(0, 2).toUpperCase();

        // ── Modal Factory ──────────────────────────────────────────────
        function makeModal(modalId, backdropId) {
          const el = $(modalId);
          const bd = $(backdropId);
          if (!el || !bd) return { open() { }, close() { }, el, bd };
          return {
            open() {
              el.classList.remove('hidden');
              document.body.style.overflow = 'hidden';
            },
            close() {
              el.classList.add('hidden');
              document.body.style.overflow = '';
            },
            el, bd
          };
        }

        // ── DP / Approve Modal ─────────────────────────────────────────
        const dpModal = makeModal('dp-modal', 'dp-modal-backdrop');
        let dpBookingId = null, dpTotal = 0;
        const dpInput = $('modal-dp-input');
        const dpRemain = $('modal-remaining');

        document.querySelectorAll('.open-dp-modal').forEach(btn => {
          btn.addEventListener('click', () => {
            dpBookingId = btn.dataset.bookingId;
            dpTotal = parseInt(btn.dataset.totalPrice) || 0;
            const curDp = parseInt(btn.dataset.currentDp) || 0;

            $('modal-customer-name').textContent = btn.dataset.customerName;
            $('modal-booking-code').textContent = '#' + btn.dataset.bookingCode;
            $('modal-total-price').textContent = idr(dpTotal);
            $('dp-modal-avatar').textContent = initials(btn.dataset.customerName);
            dpInput.value = curDp || '';
            dpRemain.textContent = idr(dpTotal - curDp);

            dpModal.open();
            setTimeout(() => dpInput.focus(), 80);
          });
        });

        dpInput?.addEventListener('input', () => {
          dpRemain.textContent = idr(dpTotal - (parseInt(dpInput.value) || 0));
        });

        $('modal-confirm-btn')?.addEventListener('click', () => {
          const btn = $('modal-confirm-btn');
          btn.disabled = true;
          btn.innerHTML = `<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg> Memproses...`;
          $('dp-input-' + dpBookingId).value = parseInt(dpInput.value) || 0;
          $('confirm-form-' + dpBookingId).submit();
        });

        ['close-modal-btn', 'modal-cancel-btn'].forEach(id => $(id)?.addEventListener('click', () => dpModal.close()));
        dpModal.bd?.addEventListener('click', () => dpModal.close());

        // ── Complete Modal ─────────────────────────────────────────────
        const cModal = makeModal('complete-modal', 'complete-modal-backdrop');
        let cBookingId = null, cTotal = 0;
        const penaltyInput = $('complete-modal-penalty-input');
        const finalTotalEl = $('complete-modal-final-total');
        const notesInput = $('complete-modal-notes-input');

        document.querySelectorAll('.open-complete-modal').forEach(btn => {
          btn.addEventListener('click', () => {
            cBookingId = btn.dataset.bookingId;
            cTotal = parseInt(btn.dataset.totalPrice) || 0;

            $('complete-modal-customer-name').textContent = btn.dataset.customerName;
            $('complete-modal-booking-code').textContent = '#' + btn.dataset.bookingCode;
            $('complete-modal-total-price').textContent = idr(cTotal);
            $('complete-modal-avatar').textContent = initials(btn.dataset.customerName);
            penaltyInput.value = 0;
            notesInput.value = '';
            finalTotalEl.textContent = idr(cTotal);

            cModal.open();
            setTimeout(() => penaltyInput.focus(), 80);
          });
        });

        penaltyInput?.addEventListener('input', () => {
          finalTotalEl.textContent = idr(cTotal + (parseInt(penaltyInput.value) || 0));
        });

        $('complete-modal-confirm-btn')?.addEventListener('click', () => {
          const btn = $('complete-modal-confirm-btn');
          btn.disabled = true;
          btn.innerHTML = `<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg> Memproses...`;
          $('penalty-input-' + cBookingId).value = parseInt(penaltyInput.value) || 0;
          $('notes-input-' + cBookingId).value = notesInput.value;
          $('complete-form-' + cBookingId).submit();
        });

        ['close-complete-modal-btn', 'complete-modal-cancel-btn'].forEach(id => $(id)?.addEventListener('click', () => cModal.close()));
        cModal.bd?.addEventListener('click', () => cModal.close());

        // ── Cancel / Reject Modal ──────────────────────────────────────
        const cancelModal = makeModal('cancel-modal', 'cancel-modal-backdrop');
        let cancelBookingId = null;
        let cancelMode = 'reject';
        const cancelReason = $('cancel-modal-reason');

        document.querySelectorAll('.open-cancel-modal').forEach(btn => {
          btn.addEventListener('click', () => {
            cancelBookingId = btn.dataset.bookingId;
            cancelMode = btn.dataset.mode || 'reject';

            $('cancel-modal-customer').textContent = btn.dataset.customerName;
            $('cancel-modal-code').textContent = '#' + btn.dataset.bookingCode;
            $('cancel-modal-avatar').textContent = initials(btn.dataset.customerName);

            const isReject = cancelMode === 'reject';
            $('cancel-modal-title').textContent = isReject ? 'Tolak Pemesanan?' : 'Batalkan Pesanan?';
            $('cancel-modal-subtitle').textContent = isReject
              ? 'Pemesanan ini akan ditolak dan pelanggan akan dinotifikasi.'
              : 'Pemesanan aktif ini akan dibatalkan. Tindakan tidak dapat diurungkan.';

            cancelReason.value = '';
            cancelModal.open();
            setTimeout(() => cancelReason.focus(), 80);
          });
        });

        $('cancel-modal-confirm')?.addEventListener('click', () => {
          const btn = $('cancel-modal-confirm');
          btn.disabled = true;
          btn.innerHTML = `<svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path></svg> Memproses...`;

          const formId = cancelMode === 'reject' ? 'reject-form-' + cancelBookingId : 'cancel-form-' + cancelBookingId;
          const reasonInputId = 'cancel-reason-' + cancelBookingId;
          if ($(reasonInputId)) $(reasonInputId).value = cancelReason.value;

          const form = $(formId);
          if (form) {
            form.submit();
          } else {
            btn.disabled = false;
            btn.innerHTML = `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg> Ya, Batalkan`;
          }
        });

        ['cancel-modal-dismiss'].forEach(id => $(id)?.addEventListener('click', () => cancelModal.close()));
        cancelModal.bd?.addEventListener('click', () => cancelModal.close());

        // ── Escape Key ─────────────────────────────────────────────────
        document.addEventListener('keydown', e => {
          if (e.key === 'Escape') {
            dpModal.close();
            cModal.close();
            cancelModal.close();
          }
        });

        // ── Search & Filter ────────────────────────────────────────────
        const searchInput = $('search-input');
        const noResult = $('no-result');
        let searchTimeout = null;

        function applyServerFilters() {
          const params = new URLSearchParams(window.location.search);
          const search = searchInput?.value.trim();
          const active = document.querySelector('.filter-pill.active');
          const status = active?.dataset.filter || 'all';

          params.delete('page');
          search ? params.set('search', search) : params.delete('search');
          status !== 'all' ? params.set('status', status) : params.delete('status');

          const newUrl = `${window.location.pathname}${params.toString() ? '?' + params.toString() : ''}`;
          window.location.href = newUrl;
        }

        searchInput?.addEventListener('input', () => {
          clearTimeout(searchTimeout);
          searchTimeout = setTimeout(applyServerFilters, 900);
        });

        // Filter Pills
        document.querySelectorAll('.filter-pill').forEach(pill => {
          pill.addEventListener('click', e => {
            document.querySelectorAll('.filter-pill').forEach(p => {
              p.classList.remove('bg-emerald-500', 'text-white', 'shadow-sm', 'shadow-emerald-200', 'scale-[1.02]', 'active');
              p.classList.add('bg-gray-100', 'text-gray-500');
            });
            e.currentTarget.classList.add('bg-emerald-500', 'text-white', 'shadow-sm', 'shadow-emerald-200', 'scale-[1.02]', 'active');
            e.currentTarget.classList.remove('bg-gray-100', 'text-gray-500');
            applyServerFilters();
          });
        });

        // Clear Search
        const clearBtn = $('clear-search');

        function toggleClearButton() {
          if (searchInput?.value.trim().length > 0) {
            clearBtn?.classList.remove('hidden');
          } else {
            clearBtn?.classList.add('hidden');
          }
        }

        toggleClearButton();
        searchInput?.addEventListener('input', toggleClearButton);
        clearBtn?.addEventListener('click', () => {
          if (searchInput) searchInput.value = '';
          toggleClearButton();
          applyServerFilters();
        });

        // ── Init active filter from URL ────────────────────────────────
        document.addEventListener('DOMContentLoaded', () => {
          const urlParams = new URLSearchParams(window.location.search);
          const activeStatus = urlParams.get('status') || 'all';
          const searchQuery = urlParams.get('search') || '';

          if (searchInput) searchInput.value = searchQuery;
          toggleClearButton();

          document.querySelectorAll('.filter-pill').forEach(p => {
            const isActive = p.dataset.filter === activeStatus;
            p.classList.toggle('bg-emerald-500', isActive);
            p.classList.toggle('text-white', isActive);
            p.classList.toggle('shadow-sm', isActive);
            p.classList.toggle('shadow-emerald-200', isActive);
            p.classList.toggle('scale-[1.02]', isActive);
            p.classList.toggle('active', isActive);
            p.classList.toggle('bg-gray-100', !isActive);
            p.classList.toggle('text-gray-500', !isActive);
          });
        });

      })();
    </script>
  @endpush

</x-admin-layout>