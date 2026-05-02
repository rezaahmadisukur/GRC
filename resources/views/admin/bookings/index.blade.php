<x-admin-layout>
  <x-slot name="header">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
      <div>
        <h2 class="text-xl font-bold text-gray-900 tracking-tight">Manajemen Pemesanan</h2>
        <p class="text-sm text-gray-400 mt-0.5">Kelola semua transaksi sewa kendaraan</p>
      </div>
      <div class="relative lg:w-1/3">
        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none"
          stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        <input type="text" id="search-input" placeholder="Cari nama customer, kode booking, nama kendaraan..." class="pl-9 pr-9 py-2.5 w-full  bg-white border border-gray-200 rounded-xl
                         text-sm text-gray-700 placeholder-gray-400
                         focus:ring-2 focus:ring-emerald-400 focus:border-transparent
                         transition-all duration-200 shadow-sm">
        <button id="clear-search"
          class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 hover:text-gray-600 transition-colors hidden">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </x-slot>


  <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-emerald-50 via-blue-50 to-purple-50">
    <div class="max-w-7xl mx-auto space-y-6">

      @php
        $statCards = [
          [
            'label' => 'Total Pesanan',
            'value' => $totalAllBookings,
            'color' => 'gray',
            'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',
            'bg' => 'from-gray-400 to-gray-600',
            'light' => 'bg-gray-50',
            'text' => 'text-gray-600',
          ],
          [
            'label' => 'Menunggu',
            'value' => $pendingCount,
            'color' => 'amber',
            'live' => true,
            'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
            'bg' => 'from-amber-400 to-amber-500',
            'light' => 'bg-amber-50',
            'text' => 'text-amber-600',
          ],
          [
            'label' => 'Aktif',
            'value' => $activeCount,
            'color' => 'emerald',
            'live' => true,
            'icon' => 'M5 13l4 4L19 7',
            'bg' => 'from-emerald-400 to-emerald-600',
            'light' => 'bg-emerald-50',
            'text' => 'text-emerald-600',
          ],
          [
            'label' => 'Selesai',
            'value' => $completedCount,
            'color' => 'blue',
            'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
            'bg' => 'from-blue-400 to-blue-600',
            'light' => 'bg-blue-50',
            'text' => 'text-blue-600',
          ],
        ];
      @endphp

      <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($statCards as $sc)
          <div
            class="transition-all duration-250 ease hover:-translate-y-1 hover:shadow-2xl animate-fadeInUp bg-white/88 backdrop-blur-md border border-white/70 rounded-2xl p-5 overflow-hidden relative"
            style="animation-delay: {{ $loop->index * 0.05 }}s">
            {{-- Top gradient bar --}}
            <div class="absolute top-0 left-0 right-0 h-1 rounded-t-2xl bg-gradient-to-r {{ $sc['bg'] }}"></div>

            <div class="flex items-start justify-between gap-2 mt-1">
              <div>
                <p class="text-xs font-medium text-gray-400 uppercase tracking-wide mb-1.5">
                  {{ $sc['label'] }}
                </p>
                <p class="text-3xl font-extrabold text-gray-900 leading-none">
                  {{ $sc['value'] }}
                </p>
                @if(!empty($sc['live']))
                  <div class="flex items-center gap-1.5 mt-1.5">
                    <span
                      class="inline-block w-1.75 h-1.75 rounded-full animate-[pulseRing_1.8s_ease_infinite] {{ $sc['text'] }}"
                      style="color:{{ ['amber' => '#f59e0b', 'emerald' => '#10b981'][$sc['color']] ?? '#6b7280' }}"></span>
                    <span class="text-[11px] text-gray-400">Live</span>
                  </div>
                @endif
              </div>
              <div class="w-10 h-10 rounded-xl {{ $sc['light'] }} flex items-center justify-center shrink-0">
                <svg class="w-5 h-5 {{ $sc['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $sc['icon'] }}" />
                </svg>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      {{-- =================== TABLE CARD =================== --}}
      <div class="bg-white/88 backdrop-blur-md border border-white/70 rounded-2xl overflow-hidden animate-fadeInUp"
        style="animation-delay:.25s">

        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between gap-3">
          <div class="flex items-center gap-2">
            <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>
            <span class="text-sm font-semibold text-gray-700">Daftar Pemesanan</span>
            <span class="text-xs text-gray-400 bg-gray-100 px-2 py-0.5 rounded-full">
              {{ $bookings->total() }} data
            </span>
          </div>

          <div class="hidden sm:flex items-center gap-1.5" id="filter-pills">
            @foreach(['all' => 'Semua', 'pending' => 'Menunggu', 'active' => 'Aktif', 'completed' => 'Selesai', 'cancelled' => 'Batal'] as $val => $lbl)
              <button data-filter="{{ $val }}"
                class="filter-pill px-3 py-1 rounded-lg text-xs font-medium transition-all duration-150 {{ $val === 'all' ? 'bg-emerald-500 text-white shadow-sm' : 'bg-gray-100 text-gray-500 hover:bg-gray-200' }}">
                {{ $lbl }}
              </button>
            @endforeach
          </div>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full" id="bookings-table">
            <thead>
              <tr class="bg-gray-50/70">
                @foreach(['Pelanggan', 'Kendaraan', 'Tanggal & Durasi', 'Total', 'Status', 'Aksi'] as $th)
                  <th
                    class="px-5 py-3.5 text-left text-[11px] font-semibold text-gray-400 uppercase tracking-wider {{ $loop->last ? 'text-right' : '' }}">
                    {{ $th }}
                  </th>
                @endforeach
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-50/80" id="bookings-tbody">

              @forelse($bookings as $booking)
                @php
                  $badge = match ($booking->status) {
                    'pending' => ['cls' => 'bg-amber-50 text-amber-700', 'dot' => 'bg-amber-400', 'label' => 'Menunggu', 'pulse' => true],
                    'active' => ['cls' => 'bg-emerald-50 text-emerald-700', 'dot' => 'bg-emerald-400', 'label' => 'Aktif', 'pulse' => true],
                    'completed' => ['cls' => 'bg-blue-50 text-blue-700', 'dot' => 'bg-blue-400', 'label' => 'Selesai', 'pulse' => false],
                    'cancelled' => ['cls' => 'bg-red-50 text-red-600', 'dot' => 'bg-red-400', 'label' => 'Dibatalkan', 'pulse' => false],
                    default => ['cls' => 'bg-gray-100 text-gray-600', 'dot' => 'bg-gray-400', 'label' => ucfirst($booking->status), 'pulse' => false],
                  };
                  $initials = strtoupper(substr($booking->customer_name, 0, 2));
                  $h = $booking->duration_hours;
                  $dur = $h < 24
                    ? "{$h} Jam"
                    : (($r = $h % 24) === 0
                      ? floor($h / 24) . ' Hari'
                      : floor($h / 24) . ' Hari ' . $r . ' Jam');
                @endphp

                <tr class="transition-[background,transform] duration-150 ease hover:bg-emerald-50"
                  data-status="{{ $booking->status }}"
                  data-search="{{ strtolower($booking->customer_name . ' ' . $booking->booking_code . ' ' . ($booking->car->name ?? '')) }}">

                  {{-- Customer --}}
                  <td class="px-5 py-4">
                    <div class="flex items-center gap-3">
                      <div
                        class="w-9 h-9 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center text-white text-xs font-bold shrink-0">
                        {{ $initials }}
                      </div>
                      <div class="min-w-0">
                        <p class="font-semibold text-gray-900 text-sm truncate">{{ $booking->customer_name }}</p>
                        <p class="text-xs text-gray-400">{{ $booking->whatsapp_number }}</p>
                        <p class="text-[11px] font-mono text-gray-300 mt-0.5">#{{ $booking->booking_code }}</p>
                      </div>
                    </div>
                  </td>

                  {{-- Vehicle --}}
                  <td class="px-5 py-4">
                    <p class="font-semibold text-gray-800 text-sm">{{ $booking->car->name }}</p>
                    <p class="text-xs text-gray-400 mt-0.5">
                      {{ strtoupper($booking->car->plate_code) }}
                      <span class="mx-1 text-gray-200">•</span>
                      {{ $booking->car->transmission === 'AT' ? 'Matic' : 'Manual' }}
                    </p>
                  </td>

                  {{-- Date & Duration --}}
                  <td class="px-5 py-4">
                    <p class="text-sm font-medium text-gray-800">
                      {{ $booking->start_date->format('d M Y') }}
                    </p>
                    <span
                      class="inline-flex items-center mt-1 gap-1 px-2 py-0.5 bg-purple-50text-purple-600 text-[11px] font-semibold rounded-full">
                      <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      {{ $dur }}
                    </span>
                  </td>

                  {{-- Total --}}
                  <td class="px-5 py-4">
                    <p class="font-bold text-gray-900 text-sm">
                      Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                    </p>
                    <p class="text-xs text-gray-400 mt-0.5">
                      DP: Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}
                    </p>
                  </td>

                  {{-- Status --}}
                  <td class="px-5 py-4">
                    <span
                      class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold {{ $badge['cls'] }}">
                      <span
                        class="w-1.5 h-1.5 rounded-full inline-block {{ $badge['dot'] }} {{ $badge['pulse'] ? 'animate-pulse' : '' }}"></span>
                      {{ $badge['label'] }}
                    </span>
                  </td>

                  {{-- Actions --}}
                  <td class="px-5 py-4 text-right">
                    <div class="flex items-center justify-end gap-2 flex-wrap">

                      @if($booking->status === 'pending')
                        {{-- Approve --}}
                        <button type="button"
                          class="inline-flex items-center gap-1.25 px-3.5 py-1.5 rounded-xl text-xs font-semibold cursor-pointer transition-all duration-150 ease hover:-translate-y-0.5 hover:shadow-lg active:scale-95 bg-emerald-500 hover:bg-emerald-600 text-white shadow-sm shadow-emerald-200 open-dp-modal"
                          data-booking-id="{{ $booking->id }}" data-booking-code="{{ $booking->booking_code }}"
                          data-customer-name="{{ $booking->customer_name }}" data-total-price="{{ $booking->total_price }}"
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

                        {{-- Reject → triggers custom cancel modal --}}
                        <button type="button"
                          class="inline-flex items-center gap-1.25 px-3.5 py-1.5 rounded-xl text-xs font-semibold cursor-pointer transition-all duration-150 ease hover:-translate-y-0.5 hover:shadow-lg active:scale-95 bg-red-50 hover:bg-red-100 text-red-600 border border-red-100 open-cancel-modal"
                          data-booking-id="{{ $booking->id }}" data-booking-code="{{ $booking->booking_code }}"
                          data-customer-name="{{ $booking->customer_name }}"
                          data-action="{{ route('admin.bookings.update-status', $booking) }}" data-mode="reject">
                          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                              d="M6 18L18 6M6 6l12 12" />
                          </svg>
                          Tolak
                        </button>

                        {{-- Hidden reject form --}}
                        <form id="reject-form-{{ $booking->id }}" method="POST"
                          action="{{ route('admin.bookings.update-status', $booking) }}" class="hidden">
                          @csrf @method('PATCH')
                          <input type="hidden" name="status" value="cancelled">
                          <input type="hidden" name="cancel_reason" id="cancel-reason-{{ $booking->id }}">
                        </form>

                      @elseif($booking->status === 'active')
                        {{-- Complete --}}
                        <button type="button"
                          class="inline-flex items-center gap-1.25 px-3.5 py-1.5 rounded-xl text-xs font-semibold cursor-pointer transition-all duration-150 ease hover:-translate-y-0.5 hover:shadow-lg active:scale-95 bg-blue-500 hover:bg-blue-600 text-white shadow-sm shadow-blue-200 open-complete-modal"
                          data-booking-id="{{ $booking->id }}" data-booking-code="{{ $booking->booking_code }}"
                          data-customer-name="{{ $booking->customer_name }}" data-total-price="{{ $booking->total_price }}"
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

                        {{-- Cancel active booking --}}
                        <button type="button"
                          class="inline-flex items-center gap-1.25 px-3.5 py-1.5 rounded-xl text-xs font-semibold cursor-pointer transition-all duration-150 ease hover:-translate-y-0.5 hover:shadow-lg active:scale-95 bg-red-50 hover:bg-red-100 text-red-500 border border-red-100 open-cancel-modal"
                          data-booking-id="{{ $booking->id }}" data-booking-code="{{ $booking->booking_code }}"
                          data-customer-name="{{ $booking->customer_name }}"
                          data-action="{{ route('admin.bookings.update-status', $booking) }}" data-mode="cancel">
                          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                          </svg>
                          Batalkan
                        </button>

                        {{-- Print Receipt --}}
                        <a href="{{ route('admin.bookings.receipt', $booking) }}" target="_blank"
                          class="inline-flex items-center gap-1.25 px-3.5 py-1.5 rounded-xl text-xs font-semibold cursor-pointer transition-all duration-150 ease hover:-translate-y-0.5 hover:shadow-lg active:scale-95 bg-blue-500 hover:bg-blue-600 text-white shadow-sm shadow-blue-200">
                          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                          </svg>
                          Cetak Struk
                        </a>

                        <form id="cancel-form-{{ $booking->id }}" method="POST"
                          action="{{ route('admin.bookings.update-status', $booking) }}" class="hidden">
                          @csrf @method('PATCH')
                          <input type="hidden" name="status" value="cancelled">
                          <input type="hidden" name="cancel_reason" id="cancel-reason-{{ $booking->id }}">
                        </form>

                      @elseif($booking->status === 'completed')

                        {{-- Print Receipt only for completed status --}}
                        <a href="{{ route('admin.bookings.receipt', $booking) }}" target="_blank"
                          class="inline-flex items-center gap-1.25 px-3.5 py-1.5 rounded-xl text-xs font-semibold cursor-pointer transition-all duration-150 ease hover:-translate-y-0.5 hover:shadow-lg active:scale-95 bg-blue-500 hover:bg-blue-600 text-white shadow-sm shadow-blue-200">
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
                  <td colspan="6" class="py-20 text-center">
                    <div class="flex flex-col items-center gap-3">
                      <div class="w-16 h-16 bg-gray-100 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                      </div>
                      <p class="font-semibold text-gray-600">Belum Ada Pemesanan</p>
                      <p class="text-sm text-gray-400 max-w-xs">Semua pemesanan baru akan muncul di sini secara otomatis.
                      </p>
                    </div>
                  </td>
                </tr>
              @endforelse

            </tbody>
          </table>
        </div>

        <div id="no-result" class="hidden py-12 text-center text-sm text-gray-400">
          <div class="flex flex-col items-center gap-2">
            <svg class="w-10 h-10 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            Tidak ada hasil untuk pencarian Anda.
          </div>
        </div>

        @if($bookings->total() > 0)
          <div
            class="px-6 py-4 border-t border-gray-100 bg-gray-50/60 flex flex-col sm:flex-row items-center justify-between gap-3">
            {{ $bookings->links() }}
          </div>
        @endif
      </div>

    </div>
  </div>

  <div id="dp-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden" role="dialog"
    aria-modal="true">
    <div class="animate-overlayIn absolute inset-0 bg-black/40 backdrop-blur-sm" id="dp-modal-backdrop"></div>
    <div class="animate-modalIn relative bg-white rounded-2xl shadow-2xl max-w-md w-full" id="dp-modal-content">

      {{-- Header --}}
      <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
        <div class="flex items-center gap-2.5">
          <div class="w-8 h-8 bg-emerald-50 rounded-xl flex items-center justify-center">
            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <h3 class="font-bold text-gray-900">Konfirmasi Pemesanan</h3>
        </div>
        <button id="close-modal-btn"
          class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-all">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- Body --}}
      <div class="p-6 space-y-4">
        <div class="flex items-center gap-3 p-3.5 bg-emerald-50 rounded-xl border border-emerald-100">
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-400 to-teal-500
                              flex items-center justify-center text-white text-sm font-bold" id="dp-modal-avatar">--
          </div>
          <div>
            <p class="font-bold text-gray-900 text-sm" id="modal-customer-name">–</p>
            <p class="text-xs text-emerald-600 font-mono" id="modal-booking-code">–</p>
          </div>
        </div>

        <div class="bg-gray-50 rounded-xl p-4 space-y-4 border border-gray-100">
          <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500">Total Harga</span>
            <span class="font-bold text-gray-900" id="modal-total-price">Rp 0</span>
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-2 uppercase tracking-wide">
              Jumlah DP
            </label>
            <div class="relative">
              <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-sm font-semibold text-gray-400">Rp</span>
              <input type="number" id="modal-dp-input" min="0" placeholder="0"
                class="focus:ring-emerald-500/18 w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl text-lg font-bold text-gray-900 bg-white focus:ring-2 focus:ring-emerald-400 focus:border-transparent transition-all duration-200">
            </div>
          </div>
          <div class="flex justify-between items-center pt-3 border-t border-gray-200">
            <span class="text-sm text-gray-500">Sisa Pembayaran</span>
            <span class="text-lg font-extrabold text-emerald-600" id="modal-remaining">Rp 0</span>
          </div>
        </div>
      </div>

      {{-- Footer --}}
      <div class="px-6 pb-6 flex gap-3">
        <button id="modal-cancel-btn"
          class="flex-1 py-3 rounded-xl bg-gray-100 text-gray-600 text-sm font-semibold hover:bg-gray-200 transition-all active:scale-95">
          Batal
        </button>
        <button id="modal-confirm-btn"
          class="flex-1 py-3 rounded-xl bg-gradient-to-r from-emerald-500 to-emerald-600 text-white text-sm font-semibold shadow-lg shadow-emerald-200 hover:shadow-emerald-300 hover:-translate-y-0.5 transition-all active:scale-95">
          Konfirmasi
        </button>
      </div>
    </div>
  </div>

  <div id="complete-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden" role="dialog"
    aria-modal="true">
    <div class="animate-overlayIn absolute inset-0 bg-black/40 backdrop-blur-sm" id="complete-modal-backdrop"></div>
    <div class="animate-modalIn relative bg-white rounded-2xl shadow-2xl max-w-md w-full" id="complete-modal-content">

      {{-- Header --}}
      <div class="flex items-center justify-between px-6 py-5 border-b border-gray-100">
        <div class="flex items-center gap-2.5">
          <div class="w-8 h-8 bg-blue-50 rounded-xl flex items-center justify-center">
            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <h3 class="font-bold text-gray-900">Selesaikan Pemesanan</h3>
        </div>
        <button id="close-complete-modal-btn"
          class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-all">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- Body --}}
      <div class="p-6 space-y-4">
        <div class="flex items-center gap-3 p-3.5 bg-blue-50 rounded-xl border border-blue-100">
          <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-400 to-indigo-500
                              flex items-center justify-center text-white text-sm font-bold"
            id="complete-modal-avatar">--</div>
          <div>
            <p class="font-bold text-gray-900 text-sm" id="complete-modal-customer-name">–</p>
            <p class="text-xs text-blue-600 font-mono" id="complete-modal-booking-code">–</p>
          </div>
        </div>

        <div class="bg-gray-50 rounded-xl p-4 space-y-4 border border-gray-100">
          <div class="flex justify-between items-center">
            <span class="text-sm text-gray-500">Total Harga Sewa</span>
            <span class="font-bold text-gray-900" id="complete-modal-total-price">Rp 0</span>
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-2 uppercase tracking-wide">
              Denda <span class="normal-case font-normal text-gray-400">(Keterlambatan / Kerusakan)</span>
            </label>
            <div class="relative">
              <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-sm font-semibold text-gray-400">Rp</span>
              <input type="number" id="complete-modal-penalty-input" min="0" value="0" class=" focus:ring-emerald-500/18 w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl
                                        text-lg font-bold text-gray-900 bg-white
                                        focus:ring-2 focus:ring-blue-400 focus:border-transparent
                                        transition-all duration-200">
            </div>
          </div>
          <div>
            <label class="block text-xs font-semibold text-gray-600 mb-2 uppercase tracking-wide">
              Catatan Pengembalian
              <span class="normal-case font-normal text-gray-400 ml-1">(opsional)</span>
            </label>
            <textarea id="complete-modal-notes-input" rows="2"
              class="focus:ring-emerald-500/18 w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-white text-gray-700 resize-none focus:ring-2 focus:ring-blue-400 focus:border-transparent transition-all duration-200"
              placeholder="Kondisi mobil saat dikembalikan..."></textarea>
          </div>
          <div class="flex justify-between items-center pt-3 border-t border-gray-200">
            <span class="text-sm text-gray-500">Total Akhir</span>
            <span class="text-xl font-extrabold text-blue-600" id="complete-modal-final-total">Rp 0</span>
          </div>
        </div>
      </div>

      {{-- Footer --}}
      <div class="px-6 pb-6 flex gap-3">
        <button id="complete-modal-cancel-btn"
          class="flex-1 py-3 rounded-xl bg-gray-100 text-gray-600 text-sm font-semibold hover:bg-gray-200 transition-all active:scale-95">
          Batal
        </button>
        <button id="complete-modal-confirm-btn"
          class="flex-1 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-semibold shadow-lg shadow-blue-200 hover:shadow-blue-300 hover:-translate-y-0.5 transition-all active:scale-95">
          Selesaikan Booking
        </button>
      </div>
    </div>
  </div>

  <div id="cancel-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 hidden" role="dialog"
    aria-modal="true" aria-labelledby="cancel-modal-title">
    <div class="animate-overlayIn absolute inset-0 bg-black/50 backdrop-blur-sm" id="cancel-modal-backdrop"></div>

    <div class="animate-modalIn relative bg-white rounded-2xl shadow-2xl max-w-sm w-full" id="cancel-modal-content">

      {{-- Danger Icon --}}
      <div class="flex flex-col items-center pt-8 pb-2 px-6">
        <div class="relative mb-4">
          {{-- Outer ring glow --}}
          <div class="absolute inset-0 rounded-full bg-red-100 animate-ping opacity-60 scale-110"></div>
          <div class="relative w-16 h-16 bg-gradient-to-br from-red-400 to-rose-600
                              rounded-full flex items-center justify-center shadow-lg shadow-red-200">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
          </div>
        </div>

        <h3 id="cancel-modal-title" class="text-lg font-bold text-gray-900 text-center">
          Batalkan Pesanan?
        </h3>
        <p class="text-sm text-gray-500 text-center mt-1 leading-relaxed" id="cancel-modal-subtitle">
          Tindakan ini tidak dapat dibatalkan.
        </p>
      </div>

      {{-- Customer chip --}}
      <div class="mx-6 mt-4 flex items-center gap-3 p-3 bg-red-50 rounded-xl border border-red-100">
        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-red-400 to-rose-500
                          flex items-center justify-center text-white text-xs font-bold shrink-0"
          id="cancel-modal-avatar">--</div>
        <div>
          <p class="font-semibold text-gray-900 text-sm" id="cancel-modal-customer">–</p>
          <p class="text-xs text-red-500 font-mono" id="cancel-modal-code">–</p>
        </div>
      </div>

      {{-- Reason textarea --}}
      <div class="mx-6 mt-4">
        <label class="block text-xs font-semibold text-gray-600 mb-2 uppercase tracking-wide">
          Alasan Pembatalan
          <span class="normal-case font-normal text-gray-400 ml-1">(opsional)</span>
        </label>
        <textarea id="cancel-modal-reason" rows="2"
          class="focus:ring-emerald-500/18 w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-white text-gray-700 resize-none focus:ring-2 focus:ring-red-400 focus:border-transparent transition-all duration-200"
          placeholder="Masukkan alasan pembatalan..."></textarea>
      </div>

      {{-- Footer --}}
      <div class="p-6 flex gap-3">
        <button id="cancel-modal-dismiss"
          class="flex-1 py-3 rounded-xl bg-gray-100 text-gray-600 text-sm font-semibold hover:bg-gray-200 transition-all active:scale-95">
          Kembali
        </button>
        <button id="cancel-modal-confirm"
          class="flex-1 py-3 rounded-xl bg-gradient-to-r from-red-500 to-rose-600 text-white text-sm font-semibold shadow-lg shadow-red-200 hover:shadow-red-300 hover:-translate-y-0.5 transition-all active:scale-95 flex items-center justify-center gap-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
          </svg>
          Ya, Batalkan
        </button>
      </div>
    </div>
  </div>

  <script>
    (() => {
      'use strict';

      const $ = id => document.getElementById(id);
      const idr = n => 'Rp ' + new Intl.NumberFormat('id-ID').format(n);
      const initials = name => name.trim().substring(0, 2).toUpperCase();

      function makeModal(modalId, backdropId) {
        const el = $(modalId);
        const bd = $(backdropId);
        return {
          open() {
            el.classList.remove('hidden');
            // re-trigger bounce animation
            el.querySelectorAll('.modal-box').forEach(b => {
              b.style.animation = 'none';
              b.offsetHeight;
              b.style.animation = '';
            });
            // Prevent body scroll
            document.body.style.overflow = 'hidden';
          },
          close() {
            el.classList.add('hidden');
            document.body.style.overflow = '';
          },
          el, bd
        };
      }

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
          setTimeout(() => dpInput.focus(), 50);
        });
      });

      dpInput.addEventListener('input', () => {
        dpRemain.textContent = idr(dpTotal - (parseInt(dpInput.value) || 0));
      });

      $('modal-confirm-btn').addEventListener('click', () => {
        $('dp-input-' + dpBookingId).value = parseInt(dpInput.value) || 0;
        $('confirm-form-' + dpBookingId).submit();
      });

      ['close-modal-btn', 'modal-cancel-btn'].forEach(id =>
        $(id).addEventListener('click', () => dpModal.close())
      );
      dpModal.bd.addEventListener('click', () => dpModal.close());

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
          setTimeout(() => penaltyInput.focus(), 50);
        });
      });

      penaltyInput.addEventListener('input', () => {
        finalTotalEl.textContent = idr(cTotal + (parseInt(penaltyInput.value) || 0));
      });

      $('complete-modal-confirm-btn').addEventListener('click', () => {
        $('penalty-input-' + cBookingId).value = parseInt(penaltyInput.value) || 0;
        $('notes-input-' + cBookingId).value = notesInput.value;
        $('complete-form-' + cBookingId).submit();
      });

      ['close-complete-modal-btn', 'complete-modal-cancel-btn'].forEach(id =>
        $(id).addEventListener('click', () => cModal.close())
      );
      cModal.bd.addEventListener('click', () => cModal.close());

      const cancelModal = makeModal('cancel-modal', 'cancel-modal-backdrop');
      let cancelBookingId = null;
      let cancelMode = 'reject'; // 'reject' | 'cancel'
      const cancelReason = $('cancel-modal-reason');

      document.querySelectorAll('.open-cancel-modal').forEach(btn => {
        btn.addEventListener('click', () => {
          cancelBookingId = btn.dataset.bookingId;
          cancelMode = btn.dataset.mode || 'reject';

          // Populate modal content
          $('cancel-modal-customer').textContent = btn.dataset.customerName;
          $('cancel-modal-code').textContent = '#' + btn.dataset.bookingCode;
          $('cancel-modal-avatar').textContent = initials(btn.dataset.customerName);

          // Adjust wording based on mode
          const isReject = cancelMode === 'reject';
          $('cancel-modal-title').textContent = isReject ? 'Tolak Pemesanan?' : 'Batalkan Pesanan?';
          $('cancel-modal-subtitle').textContent = isReject
            ? 'Pemesanan ini akan ditolak dan pelanggan akan dinotifikasi.'
            : 'Pemesanan aktif ini akan dibatalkan. Tindakan ini tidak dapat diurungkan.';

          cancelReason.value = '';
          cancelModal.open();
          setTimeout(() => cancelReason.focus(), 80);
        });
      });

      // Confirm cancel/reject
      $('cancel-modal-confirm').addEventListener('click', () => {
        const btn = $('cancel-modal-confirm');

        // Loading state
        btn.disabled = true;
        btn.innerHTML = `
              <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor"
                      d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
              </svg>
              Memproses...`;

        const formId = cancelMode === 'reject'
          ? 'reject-form-' + cancelBookingId
          : 'cancel-form-' + cancelBookingId;

        const reasonInputId = 'cancel-reason-' + cancelBookingId;
        if ($(reasonInputId)) {
          $(reasonInputId).value = cancelReason.value;
        }

        const form = $(formId);
        if (form) {
          form.submit();
        } else {
          // Fallback: reset button if form not found
          btn.disabled = false;
          btn.textContent = 'Ya, Batalkan';
        }
      });

      // Dismiss cancel modal
      ['cancel-modal-dismiss'].forEach(id =>
        $(id).addEventListener('click', () => cancelModal.close())
      );
      cancelModal.bd.addEventListener('click', () => cancelModal.close());

      document.addEventListener('keydown', e => {
        if (e.key === 'Escape') {
          dpModal.close();
          cModal.close();
          cancelModal.close();
        }
      });

      const searchInput = $('search-input');
      const tbody = $('bookings-tbody');
      const noResult = $('no-result');

      let searchTimeout = null;

      function applyServerFilters() {
        const params = new URLSearchParams(window.location.search);

        const search = searchInput.value.trim();
        const status = document.querySelector('.filter-pill.bg-emerald-500')?.dataset.filter || 'all';

        // Reset ke halaman 1 setiap kali filter diubah
        params.delete('page');

        if (search) params.set('search', search);
        else params.delete('search');

        if (status !== 'all') params.set('status', status);
        else params.delete('status');

        const newUrl = `${window.location.pathname}${params.toString() ? '?' + params.toString() : ''}`;
        window.location.href = newUrl;
      }

      // Auto search setelah user berhenti mengetik selama 10000ms
      searchInput.addEventListener('input', () => {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(applyServerFilters, 1000);
      });

      document.querySelectorAll('.filter-pill').forEach(pill => {
        pill.addEventListener('click', (e) => {
          // Reset SEMUA button terlebih dahulu
          const allPills = document.querySelectorAll('.filter-pill');
          allPills.forEach(p => {
            p.classList.remove('bg-emerald-500', 'text-white', 'shadow-sm');
            p.classList.add('bg-gray-100', 'text-gray-500');
          });

          // Set yang diklik saja jadi aktif
          e.currentTarget.classList.add('bg-emerald-500', 'text-white', 'shadow-sm');
          e.currentTarget.classList.remove('bg-gray-100', 'text-gray-500');

          applyServerFilters();
        });
      });

      // Clear search button handler
      const clearBtn = $('clear-search');

      function toggleClearButton() {
        if (searchInput.value.trim().length > 0) {
          clearBtn.classList.remove('hidden');
        } else {
          clearBtn.classList.add('hidden');
        }
      }

      toggleClearButton();

      searchInput.addEventListener('input', toggleClearButton);

      clearBtn.addEventListener('click', () => {
        searchInput.value = '';
        toggleClearButton();
        applyServerFilters();
      });

      // Set active filter pill berdasarkan query parameter di URL
      document.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const activeStatus = urlParams.get('status') || 'all';
        const searchQuery = urlParams.get('search') || '';

        searchInput.value = searchQuery;
        toggleClearButton();

        // Reset SEMUA status terlebih dahulu
        const allPills = document.querySelectorAll('.filter-pill');
        allPills.forEach(p => {
          p.classList.remove('bg-emerald-500', 'text-white', 'shadow-sm');
          p.classList.add('bg-gray-100', 'text-gray-500');
        });

        // Baru set yang aktif
        allPills.forEach(p => {
          if (p.dataset.filter === activeStatus) {
            p.classList.add('bg-emerald-500', 'text-white', 'shadow-sm');
            p.classList.remove('bg-gray-100', 'text-gray-500');
          }
        });
      });

    })();
  </script>

</x-admin-layout>