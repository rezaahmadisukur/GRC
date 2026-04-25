<x-app-layout>
  <style>
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes pulse-ring {
      0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
      70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
      100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
    }
    @keyframes shimmer {
      0% { background-position: -200% 0; }
      100% { background-position: 200% 0; }
    }
    @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-6px); }
    }
    @keyframes progress-fill {
      from { width: 0%; }
      to { width: 100%; }
    }
    @keyframes draw-line {
      from { height: 0%; }
      to { height: 100%; }
    }
  
    .animate-fade-up { animation: fadeInUp 0.5s ease forwards; }
    .animate-float { animation: float 3s ease-in-out infinite; }
  
    .card-hover {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card-hover:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    }
  
    .active-step { animation: pulse-ring 2s ease infinite; }
  
    .shimmer-bg {
      background: linear-gradient(90deg, #f0fdf4 25%, #dcfce7 50%, #f0fdf4 75%);
      background-size: 200% 100%;
      animation: shimmer 2s infinite;
    }
  
    .glass-card {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.7);
    }
  
    .progress-bar-animated {
      animation: progress-fill 1s ease 0.5s both;
    }
    .progress-line-animated {
      animation: draw-line 1s ease 0.5s both;
    }
  
    .detail-row {
      transition: background 0.2s ease;
      border-radius: 10px;
      padding: 10px 12px;
      margin: 0 -12px;
    }
    .detail-row:hover {
      background: #f8fffe;
    }
  
    .wa-btn {
      position: relative;
      overflow: hidden;
    }
    .wa-btn::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 0;
      height: 0;
      background: rgba(255,255,255,0.15);
      border-radius: 50%;
      transform: translate(-50%, -50%);
      transition: width 0.5s, height 0.5s;
    }
    .wa-btn:hover::before {
      width: 300px;
      height: 300px;
    }
  
    .status-badge {
      position: relative;
      display: inline-flex;
      align-items: center;
    }
    .status-badge::before {
      content: '';
      width: 7px;
      height: 7px;
      border-radius: 50%;
      margin-right: 6px;
      background: currentColor;
      animation: pulse-ring 2s ease infinite;
    }
  
    .step-connector-fill {
      transition: width 1s ease 0.3s, height 1s ease 0.3s;
    }
  </style>
  
  <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8"
       style="background: linear-gradient(135deg, #f0fdf8 0%, #f8faff 50%, #fdf4ff 100%);">
  
    @php
      $statusMapping = ['pending' => 1, 'active' => 2, 'completed' => 3, 'cancelled' => 0];
      $statuses = [1 => 'Pesanan Diterima', 2 => 'Sedang Berjalan', 3 => 'Selesai'];
      $currentStatus = $statusMapping[$booking->status] ?? 1;
      $isCancelled = $booking->status === 'cancelled';
    @endphp
  
    <div class="max-w-5xl mx-auto space-y-6">
  
      {{-- ===================== HEADER ===================== --}}
      <div class="text-center animate-fade-up" style="animation-delay: 0s;">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/80 border border-emerald-100
                    rounded-full text-sm text-emerald-600 font-medium mb-4 shadow-sm">
          <span class="w-2 h-2 bg-emerald-400 rounded-full inline-block
                       animate-[pulse_1.5s_ease-in-out_infinite]"></span>
          Booking Live Tracking
        </div>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-2">
          Status <span class="text-emerald-500">Pemesanan</span>
        </h1>
        <p class="text-gray-400 text-sm">
          Kode Booking:
          <span class="font-bold text-emerald-600 tracking-widest">{{ $booking->booking_code }}</span>
        </p>
      </div>
  
      {{-- ===================== CANCELLED ALERT ===================== --}}
      @if($isCancelled)
        <div class="animate-fade-up glass-card rounded-2xl p-6 text-center border-red-100"
             style="animation-delay: 0.1s; background: rgba(254,242,242,0.9); border-color: #fecaca;">
          <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-7 h-7 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </div>
          <h3 class="text-lg font-bold text-red-700 mb-1">Pesanan Dibatalkan</h3>
          <p class="text-red-400 text-sm">Pemesanan ini telah dibatalkan dan tidak dapat dilanjutkan.</p>
        </div>
      @endif
  
      {{-- ===================== STEPPER ===================== --}}
      <div class="animate-fade-up glass-card rounded-2xl shadow-sm p-6 sm:p-8 card-hover"
           style="animation-delay: 0.15s;">
  
        {{-- Desktop --}}
        <div class="hidden md:flex items-center justify-between">
          @foreach($statuses as $index => $statusName)
                    @php
                      $isDone = !$isCancelled && $currentStatus > $index;
                      $isActive = !$isCancelled && $currentStatus === $index;
                      $isPast = $isDone || $isActive;
                    @endphp
                    <div class="flex flex-col items-center flex-1 relative">

                      {{-- Connector --}}
                      @if(!$loop->last)
                        <div class="absolute top-5 left-1/2 w-full h-1 rounded-full bg-gray-100 overflow-hidden">
                          <div class="h-full rounded-full
                                      {{ $isDone && !$isCancelled ? 'bg-gradient-to-r from-emerald-400 to-emerald-500 step-connector-fill' : '' }}"
                               style="width: {{ $isDone && !$isCancelled ? '100%' : '0%' }}; transition: width 1s ease 0.4s;">
                          </div>
                        </div>
                      @endif

                      {{-- Circle --}}
                      <div class="relative z-10 w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm
                                  transition-all duration-300
                                  {{ $isCancelled
            ? 'bg-red-500 text-white shadow-lg shadow-red-200'
            : ($isPast
              ? 'bg-gradient-to-br from-emerald-400 to-emerald-600 text-white shadow-lg shadow-emerald-200'
              : 'bg-gray-100 text-gray-400') }}
                                  {{ $isActive && !$isCancelled ? 'active-step' : '' }}">

                        @if($isCancelled)
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                          </svg>
                        @elseif($isDone)
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                          </svg>
                        @else
                          {{ $index }}
                        @endif
                      </div>

                      {{-- Label --}}
                      <p class="mt-3 text-xs font-semibold text-center tracking-wide uppercase
                                {{ $isCancelled ? 'text-red-400' : ($isPast ? 'text-emerald-600' : 'text-gray-300') }}">
                        {{ $statusName }}
                      </p>
                    </div>
          @endforeach
        </div>
  
        {{-- Mobile --}}
        <div class="md:hidden space-y-0">
          @foreach($statuses as $index => $statusName)
                    @php
                      $isDone = !$isCancelled && $currentStatus > $index;
                      $isActive = !$isCancelled && $currentStatus === $index;
                      $isPast = $isDone || $isActive;
                    @endphp
                    <div class="flex items-start gap-4">
                      <div class="flex flex-col items-center">
                        <div class="w-9 h-9 rounded-full flex items-center justify-center text-sm font-bold shrink-0
                                    {{ $isCancelled
            ? 'bg-red-500 text-white shadow-md shadow-red-200'
            : ($isPast
              ? 'bg-gradient-to-br from-emerald-400 to-emerald-600 text-white shadow-md shadow-emerald-200'
              : 'bg-gray-100 text-gray-400') }}
                                    {{ $isActive ? 'active-step' : '' }}">
                          @if($isCancelled)
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                          @elseif($isDone)
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                            </svg>
                          @else
                            {{ $index }}
                          @endif
                        </div>
                        @if(!$loop->last)
                          <div class="w-0.5 h-10 mt-1 bg-gray-100 overflow-hidden rounded-full">
                            <div class="w-full rounded-full
                                        {{ $isDone && !$isCancelled ? 'bg-gradient-to-b from-emerald-400 to-emerald-500' : '' }}"
                                 style="height: {{ $isDone && !$isCancelled ? '100%' : '0%' }}; transition: height 1s ease 0.4s;">
                            </div>
                          </div>
                        @endif
                      </div>
                      <div class="pt-1.5 pb-8">
                        <p class="font-semibold text-sm
                                  {{ $isCancelled ? 'text-red-400' : ($isPast ? 'text-emerald-600' : 'text-gray-300') }}">
                          {{ $statusName }}
                        </p>
                        @if($isActive)
                          <p class="text-xs text-gray-400 mt-0.5">Sedang diproses...</p>
                        @endif
                      </div>
                    </div>
          @endforeach
        </div>
      </div>
  
      {{-- ===================== MAIN GRID ===================== --}}
      <div class="grid md:grid-cols-2 gap-6">
  
        {{-- LEFT: ORDER DETAILS --}}
        <div class="animate-fade-up glass-card rounded-2xl shadow-sm p-6 card-hover space-y-1"
             style="animation-delay: 0.2s;">
  
          <div class="flex items-center gap-3 mb-6">
            <div class="w-9 h-9 bg-emerald-50 rounded-xl flex items-center justify-center">
              <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2
                         M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
              </svg>
            </div>
            <h2 class="text-lg font-bold text-gray-900">Detail Pesanan</h2>
          </div>
  
          @php
            $rows = [
              ['label' => 'Kode Booking', 'value' => $booking->booking_code, 'class' => 'font-bold text-emerald-600 tracking-wider'],
              ['label' => 'Nama Customer', 'value' => $booking->customer_name, 'class' => 'font-semibold text-gray-800'],
              ['label' => 'Tanggal Sewa', 'value' => \Carbon\Carbon::parse($booking->start_date)->format('d M Y, H:i'), 'class' => 'text-gray-700'],
              ['label' => 'Tanggal Kembali', 'value' => \Carbon\Carbon::parse($booking->end_date)->format('d M Y, H:i'), 'class' => 'text-gray-700'],
            ];
            $hours = $booking->duration_hours;
            $durationLabel = $hours < 24
              ? "{$hours} Jam"
              : (($r = $hours % 24) == 0
                ? floor($hours / 24) . " Hari"
                : floor($hours / 24) . " Hari {$r} Jam");
          @endphp
  
          @foreach($rows as $row)
            <div class="detail-row flex justify-between items-center gap-2">
              <span class="text-gray-400 text-sm shrink-0">{{ $row['label'] }}</span>
              <span class="text-sm text-right {{ $row['class'] }}">{{ $row['value'] }}</span>
            </div>
          @endforeach
  
          @if($booking->actual_end_date)
            <div class="detail-row flex justify-between items-center gap-2">
              <span class="text-gray-400 text-sm">Dikembalikan</span>
              <span class="text-sm font-medium text-blue-500">
                {{ \Carbon\Carbon::parse($booking->actual_end_date)->format('d M Y, H:i') }}
              </span>
            </div>
          @endif
  
          <div class="detail-row flex justify-between items-center gap-2">
            <span class="text-gray-400 text-sm">Durasi</span>
            <span class="text-sm font-semibold text-gray-800 bg-gray-50 px-2.5 py-0.5 rounded-full">
              {{ $durationLabel }}
            </span>
          </div>
  
          <div class="detail-row flex justify-between items-center gap-2">
            <span class="text-gray-400 text-sm">Uang Muka (DP)</span>
            <span class="text-sm font-semibold text-gray-800">
              Rp {{ number_format($booking->dp_amount, 0, ',', '.') }}
            </span>
          </div>
  
          @if($booking->penalty_amount > 0)
            <div class="detail-row flex justify-between items-center gap-2">
              <span class="text-gray-400 text-sm">Denda</span>
              <span class="text-sm font-bold text-red-500 bg-red-50 px-2.5 py-0.5 rounded-full">
                + Rp {{ number_format($booking->penalty_amount, 0, ',', '.') }}
              </span>
            </div>
          @endif
  
          <div class="detail-row flex justify-between items-center gap-2">
            <span class="text-gray-400 text-sm">Total Harga</span>
            <span class="text-base font-extrabold text-gray-900">
              Rp {{ number_format($booking->final_total_price ?? $booking->total_price, 0, ',', '.') }}
            </span>
          </div>
  
          {{-- Payment status divider --}}
          <div class="!mt-4 pt-4 border-t border-gray-50">
            <div class="flex justify-between items-center">
              <span class="text-gray-400 text-sm">Status Pembayaran</span>
              @if($booking->remains_payment <= 0 || $booking->status === 'completed')
                <span class="status-badge text-xs font-semibold text-emerald-600
                             bg-emerald-50 px-3 py-1.5 rounded-full">
                  Lunas
                </span>
              @else
                <span class="text-xs font-semibold text-amber-600 bg-amber-50 px-3 py-1.5 rounded-full">
                  Sisa: Rp {{ number_format($booking->remains_payment, 0, ',', '.') }}
                </span>
              @endif
            </div>
          </div>
  
          @if($booking->return_notes)
            <div class="!mt-4 pt-4 border-t border-gray-50">
              <span class="text-xs font-medium text-gray-400 uppercase tracking-wider">Catatan Admin</span>
              <p class="mt-2 text-sm text-gray-600 bg-gray-50 rounded-xl p-3 leading-relaxed border border-gray-100">
                {{ $booking->return_notes }}
              </p>
            </div>
          @endif
        </div>
  
        {{-- RIGHT: VEHICLE DETAILS --}}
        <div class="animate-fade-up glass-card rounded-2xl shadow-sm p-6 card-hover"
             style="animation-delay: 0.25s;">
  
          <div class="flex items-center gap-3 mb-6">
            <div class="w-9 h-9 bg-blue-50 rounded-xl flex items-center justify-center">
              <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z
                         M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0
                         01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414A1 1 0
                         0121 11.414V16a1 1 0 01-1 1h-1"/>
              </svg>
            </div>
            <h2 class="text-lg font-bold text-gray-900">Detail Unit</h2>
          </div>
  
          @if($booking->car)
            {{-- Car Image --}}
            <div class="relative h-48 bg-gray-100 rounded-2xl overflow-hidden mb-6 group">
              @if($booking->car->image)
                <img src="{{ asset('storage/' . $booking->car->image) }}"
                     alt="{{ $booking->car->name }}"
                     loading="lazy"
                     class="w-full h-full object-cover transition-transform duration-700
                            group-hover:scale-105
                            {{ !$booking->car->is_available ? 'opacity-70 grayscale' : '' }}">
              @else
                <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br
                            from-gray-100 to-gray-200 text-gray-300 gap-2">
                  <svg class="w-14 h-14" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z
                             M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0
                             01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414A1 1
                             0 0121 11.414V16a1 1 0 01-1 1h-1"/>
                  </svg>
                  <span class="text-xs">No Image</span>
                </div>
              @endif

              {{-- Car name overlay --}}
              <div class="absolute bottom-0 left-0 right-0 p-3
                          bg-gradient-to-t from-black/50 to-transparent">
                <p class="text-white font-bold text-sm">{{ $booking->car->name }}</p>
                <p class="text-white/70 text-xs">{{ strtoupper($booking->car->plate_code) }}</p>
              </div>
            </div>

            {{-- Car Specs Grid --}}
            <div class="grid grid-cols-2 gap-3">
              @php
                $specs = [
                  [
                    'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
                    'label' => 'Kategori',
                    'value' => $booking->car->category,
                    'color' => 'purple'
                  ],
                  [
                    'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01',
                    'label' => 'Warna',
                    'value' => $booking->car->color,
                    'color' => 'pink'
                  ],
                  [
                    'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
                    'label' => 'Kapasitas',
                    'value' => $booking->car->seats . ' Orang',
                    'color' => 'blue'
                  ],
                  [
                    'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4',
                    'label' => 'Transmisi',
                    'value' => $booking->car->transmission === 'AT' ? 'Matic' : 'Manual',
                    'color' => 'orange'
                  ],
                  [
                    'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',
                    'label' => 'Bahan Bakar',
                    'value' => $booking->car->fuel_type,
                    'color' => 'yellow'
                  ],
                ];
                $colorMap = [
                  'purple' => ['bg' => 'bg-purple-50', 'text' => 'text-purple-500'],
                  'pink' => ['bg' => 'bg-pink-50', 'text' => 'text-pink-500'],
                  'blue' => ['bg' => 'bg-blue-50', 'text' => 'text-blue-500'],
                  'orange' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-500'],
                  'yellow' => ['bg' => 'bg-yellow-50', 'text' => 'text-yellow-500'],
                ];
              @endphp

              @foreach($specs as $spec)
                @php $c = $colorMap[$spec['color']]; @endphp
                <div class="flex items-start gap-2.5 p-3 rounded-xl bg-gray-50
                            hover:bg-white hover:shadow-sm transition-all duration-200 border border-transparent
                            hover:border-gray-100">
                  <div class="w-8 h-8 {{ $c['bg'] }} rounded-lg flex items-center justify-center shrink-0">
                    <svg class="w-4 h-4 {{ $c['text'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $spec['icon'] }}"/>
                    </svg>
                  </div>
                  <div class="min-w-0">
                    <p class="text-xs text-gray-400">{{ $spec['label'] }}</p>
                    <p class="text-sm font-semibold text-gray-800 truncate">{{ $spec['value'] }}</p>
                  </div>
                </div>
              @endforeach
            </div>

          @else
            <div class="h-48 flex flex-col items-center justify-center text-gray-300 gap-3">
              <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
              <p class="text-sm">Data unit tidak tersedia</p>
            </div>
          @endif
        </div>
      </div>
  
      {{-- ===================== WHATSAPP CTA ===================== --}}
      <div class="animate-fade-up text-center pb-4" style="animation-delay: 0.3s;">
        <p class="text-gray-400 text-sm mb-4">Ada pertanyaan tentang pesanan Anda?</p>
        <a href="https://wa.me/{{ config('services.whatsapp.number') }}?text={{ urlencode('Halo Admin, saya ingin menanyakan tentang booking dengan kode: ' . $booking->booking_code) }}"
           target="_blank" rel="noopener noreferrer"
           class="wa-btn inline-flex items-center gap-3 px-8 py-4 rounded-2xl font-bold text-white
                  shadow-xl shadow-green-200 transition-all duration-300 hover:shadow-green-300
                  hover:-translate-y-1 active:scale-95"
           style="background: linear-gradient(135deg, #25D366, #128C7E);">
          <svg class="w-5 h-5 animate-float" fill="currentColor" viewBox="0 0 24 24">
            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94
                     1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059
                     -.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371
                     -.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01
                     -.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198
                     2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719
                     2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87
                     0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45
                     4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45
                     -4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0
                     2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0
                     11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
          </svg>
          Hubungi Admin via WhatsApp
        </a>
      </div>
  
    </div>
  </div>
  </x-app-layout>