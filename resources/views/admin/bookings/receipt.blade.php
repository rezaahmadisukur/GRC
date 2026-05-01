<x-admin-layout>

  <style>
    /* ── Animations ─────────────────────────────── */
    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-24px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(24px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes scaleIn {
      from {
        opacity: 0;
        transform: scale(0.85);
      }

      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    @keyframes checkPop {
      0% {
        transform: scale(0) rotate(-10deg);
        opacity: 0;
      }

      60% {
        transform: scale(1.2) rotate(4deg);
      }

      100% {
        transform: scale(1) rotate(0deg);
        opacity: 1;
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

    @keyframes pulse-ring {
      0% {
        transform: scale(0.9);
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.5);
      }

      70% {
        transform: scale(1);
        box-shadow: 0 0 0 14px rgba(16, 185, 129, 0);
      }

      100% {
        transform: scale(0.9);
        box-shadow: 0 0 0 0 rgba(16, 185, 129, 0);
      }
    }

    @keyframes dashedMove {
      from {
        stroke-dashoffset: 20;
      }

      to {
        stroke-dashoffset: 0;
      }
    }

    .anim-fade-down {
      animation: fadeInDown 0.5s ease both;
    }

    .anim-fade-up {
      animation: fadeInUp 0.5s ease both;
    }

    .anim-scale-in {
      animation: scaleIn 0.45s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    .anim-check-pop {
      animation: checkPop 0.55s cubic-bezier(0.34, 1.56, 0.64, 1) both;
    }

    .anim-delay-1 {
      animation-delay: 0.10s;
    }

    .anim-delay-2 {
      animation-delay: 0.20s;
    }

    .anim-delay-3 {
      animation-delay: 0.30s;
    }

    .anim-delay-4 {
      animation-delay: 0.40s;
    }

    .anim-delay-5 {
      animation-delay: 0.50s;
    }

    .success-ring {
      animation: pulse-ring 2s ease-out infinite;
    }

    /* Shimmer on total badge */
    .shimmer-text {
      background: linear-gradient(90deg, #10b981 30%, #6ee7b7 50%, #10b981 70%);
      background-size: 200% auto;
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      animation: shimmer 2.5s linear infinite;
    }

    /* Dashed separator (receipt look) */
    .receipt-dash {
      border: none;
      border-top: 2px dashed #e2e8f0;
    }

    /* ── Print Styles ────────────────────────────── */
    @media print {
      body * {
        visibility: hidden;
      }

      #receipt-print,
      #receipt-print * {
        visibility: visible;
      }

      #receipt-print {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        border: none !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        padding: 12px !important;
      }

      .no-print {
        display: none !important;
      }

      @page {
        size: 80mm auto;
        margin: 4mm;
      }
    }
  </style>

  <div class="min-h-screen bg-gradient-to-br from-slate-50 via-emerald-50/30 to-teal-50/20 py-10 px-4">
    <div class="max-w-md mx-auto space-y-6">

      {{-- ── Success Hero ── --}}
      <div class="text-center space-y-3 anim-fade-down">

        {{-- Animated check icon --}}
        <div class="inline-flex items-center justify-center relative">
          <div class="success-ring w-20 h-20 rounded-full bg-emerald-500
                              flex items-center justify-center">
            <svg class="w-10 h-10 text-white anim-check-pop" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
            </svg>
          </div>
        </div>

        <div>
          <h2 class="text-2xl font-black text-gray-800 tracking-tight">
            Booking Berhasil!
          </h2>
          <p class="text-sm text-gray-400 font-medium mt-0.5">
            Walk-in Customer · Struk siap dicetak
          </p>
        </div>

      </div>

      {{-- ── Receipt Card ── --}}
      <div id="receipt-print" class="bg-white rounded-3xl shadow-xl shadow-gray-200/60
                      border border-gray-100 overflow-hidden anim-scale-in anim-delay-2">

        {{-- Header strip --}}
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-5 text-center relative overflow-hidden">
          {{-- Decorative circles --}}
          <div class="absolute -top-8 -left-8 w-24 h-24 bg-white/10 rounded-full"></div>
          <div class="absolute -bottom-6 -right-6 w-20 h-20 bg-white/10 rounded-full"></div>

          <p class="text-blue-200 text-[10px] font-bold uppercase tracking-[0.2em] mb-1">
            Bukti Penyewaan
          </p>
          <h3 class="text-white font-black text-xl tracking-tight">
            RENTAL MOBIL
          </h3>

          {{-- Booking code badge --}}
          <div class="mt-3 inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm
                              border border-white/30 rounded-xl px-4 py-1.5">
            <svg class="w-3.5 h-3.5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
            </svg>
            <span class="text-white font-mono font-bold text-sm tracking-widest">
              {{ $booking->booking_code }}
            </span>
          </div>

          <p class="text-blue-200 text-xs mt-2">
            {{ $booking->created_at->format('d M Y · H:i') }} WIB
          </p>
        </div>

        {{-- Notch decoration (receipt-style) --}}
        <div class="relative flex items-center bg-white">
          <div class="absolute -left-3 w-6 h-6 bg-slate-50 rounded-full border border-gray-100"></div>
          <hr class="receipt-dash flex-1 mx-4 my-0">
          <div class="absolute -right-3 w-6 h-6 bg-slate-50 rounded-full border border-gray-100"></div>
        </div>

        {{-- Body --}}
        <div class="px-6 py-5 space-y-1 font-mono">

          {{-- Section: Customer & Kendaraan --}}
          <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">
            Detail Pelanggan
          </p>

          @php
            $rows = [
              [
                'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z',
                'label' => 'Nama',
                'value' => $booking->customer_name,
                'bold' => true
              ],
              [
                'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
                'label' => 'No HP',
                'value' => $booking->whatsapp_number,
                'bold' => false
              ],
              [
                'icon' => 'M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0zM13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1',
                'label' => 'Kendaraan',
                'value' => $booking->car->name . ' · ' . $booking->car->plate_code,
                'bold' => true
              ],
            ];
          @endphp

          @foreach($rows as $row)
            <div class="flex items-center justify-between py-2
                                  border-b border-dashed border-gray-100 last:border-0">
              <div class="flex items-center gap-2 text-gray-500 text-xs">
                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $row['icon'] }}" />
                </svg>
                {{ $row['label'] }}
              </div>
              <span class="text-xs text-right max-w-[55%] truncate
                                       {{ $row['bold'] ? 'font-bold text-gray-800' : 'text-gray-600' }}">
                {{ $row['value'] }}
              </span>
            </div>
          @endforeach

          {{-- Section: Waktu --}}
          <div class="pt-4">
            <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">
              Waktu Sewa
            </p>

            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-4 space-y-3">

              {{-- Timeline visual --}}
              <div class="flex items-stretch gap-3">
                {{-- Left: icons & line --}}
                <div class="flex flex-col items-center">
                  <div class="w-7 h-7 rounded-full bg-blue-500 flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <div class="flex-1 w-px bg-blue-200 my-1.5"></div>
                  <div class="w-7 h-7 rounded-full bg-indigo-500 flex items-center justify-center flex-shrink-0">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                </div>

                {{-- Right: dates --}}
                <div class="flex-1 space-y-2">
                  <div>
                    <p class="text-[10px] text-blue-500 font-bold uppercase tracking-wider">Mulai</p>
                    <p class="text-sm font-bold text-gray-800">
                      {{ \Carbon\Carbon::parse($booking->start_date)->format('d M Y · H:i') }}
                    </p>
                  </div>
                  <div>
                    <p class="text-[10px] text-indigo-500 font-bold uppercase tracking-wider">Selesai</p>
                    <p class="text-sm font-bold text-gray-800">
                      {{ \Carbon\Carbon::parse($booking->end_date)->format('d M Y · H:i') }}
                    </p>
                  </div>
                </div>

                {{-- Duration badge --}}
                <div class="flex items-center">
                  <div class="bg-white border border-blue-100 rounded-xl px-3 py-2 text-center shadow-sm">
                    <p class="text-xl font-black text-blue-600">{{ $booking->duration_hours }}</p>
                    <p class="text-[10px] text-blue-400 font-bold -mt-0.5">JAM</p>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>

        {{-- Notch decoration --}}
        <div class="relative flex items-center bg-white">
          <div class="absolute -left-3 w-6 h-6 bg-slate-50 rounded-full border border-gray-100"></div>
          <hr class="receipt-dash flex-1 mx-4 my-0">
          <div class="absolute -right-3 w-6 h-6 bg-slate-50 rounded-full border border-gray-100"></div>
        </div>

        {{-- Payment Section --}}
        <div class="px-6 py-5 space-y-3 font-mono">

          <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400 mb-3">
            Ringkasan Pembayaran
          </p>

          {{-- Total --}}
          <div class="flex items-center justify-between">
            <span class="text-xs text-gray-500 flex items-center gap-1.5">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 11h.01M12 11h.01M15 11h.01M4 19h16a2 2 0 002-2V7a2 2 0 00-2-2H4a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              Total Tagihan
            </span>
            <span class="text-base font-black text-gray-800">
              Rp {{ number_format($booking->total_price, 0, ',', '.') }}
            </span>
          </div>

          {{-- Cash Paid --}}
          <div class="flex items-center justify-between">
            <span class="text-xs text-gray-500 flex items-center gap-1.5">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
              Uang Diterima
            </span>
            <span class="text-sm font-bold text-gray-700">
              Rp {{ number_format($booking->cash_paid, 0, ',', '.') }}
            </span>
          </div>

          {{-- Change --}}
          <div class="bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200
                              rounded-2xl px-4 py-3 flex items-center justify-between">
            <span class="text-xs font-bold text-emerald-700 flex items-center gap-1.5">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Uang Kembalian
            </span>
            <span class="shimmer-text text-lg font-black">
              Rp {{ number_format($booking->change_amount, 0, ',', '.') }}
            </span>
          </div>

        </div>

        {{-- Footer --}}
        <div class="bg-gradient-to-r from-gray-50 to-slate-50 border-t border-dashed
                          border-gray-200 px-6 py-4 text-center space-y-1">
          <p class="text-xs text-gray-400 font-medium">
            Terima kasih atas kepercayaan Anda 🙏
          </p>
          <p class="text-[11px] text-gray-300">
            Admin: <span class="font-semibold text-gray-400">{{ auth()->user()->name }}</span>
            &nbsp;·&nbsp;
            {{ now()->format('d M Y') }}
          </p>

          {{-- Barcode-style decoration --}}
          <div class="flex justify-center gap-px mt-2 opacity-20">
            @foreach(range(1, 32) as $i)
              <div class="bg-gray-800 rounded-sm"
                style="width: {{ rand(1, 3) }}px; height: {{ $i % 4 === 0 ? '20px' : '14px' }}">
              </div>
            @endforeach
          </div>
          <p class="text-[9px] text-gray-300 font-mono tracking-widest">
            {{ $booking->booking_code }}
          </p>
        </div>

      </div>

      {{-- ── Action Buttons ── --}}
      <div class="grid grid-cols-2 gap-3 no-print anim-fade-up anim-delay-4">

        {{-- Print --}}
        <button onclick="window.print()" class="group relative overflow-hidden flex items-center justify-center gap-2
                             bg-gradient-to-r from-blue-500 to-indigo-600
                             hover:from-blue-600 hover:to-indigo-700
                             text-white font-bold py-3.5 px-4 rounded-2xl text-sm
                             shadow-lg shadow-blue-200 hover:shadow-xl hover:shadow-blue-300
                             transition-all duration-300 active:scale-95">
          <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20
                               to-transparent -translate-x-full group-hover:translate-x-full
                               transition-transform duration-700 ease-in-out"></span>
          <svg class="w-4 h-4 relative" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
          </svg>
          <span class="relative">Cetak Struk</span>
        </button>

        {{-- New Booking --}}
        <a href="{{ route('admin.quick-booking.create') }}" class="group relative overflow-hidden flex items-center justify-center gap-2
                        bg-gradient-to-r from-emerald-500 to-teal-500
                        hover:from-emerald-600 hover:to-teal-600
                        text-white font-bold py-3.5 px-4 rounded-2xl text-sm
                        shadow-lg shadow-emerald-200 hover:shadow-xl hover:shadow-emerald-300
                        transition-all duration-300 active:scale-95">
          <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20
                               to-transparent -translate-x-full group-hover:translate-x-full
                               transition-transform duration-700 ease-in-out"></span>
          <svg class="w-4 h-4 relative" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
          </svg>
          <span class="relative">Booking Baru</span>
        </a>

      </div>

      {{-- ── Back link ── --}}
      <div class="text-center no-print anim-fade-up anim-delay-5">
        <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center gap-1.5 text-xs text-gray-400
                        hover:text-gray-600 transition-colors duration-200 font-medium">
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Kembali ke Daftar Booking
        </a>
      </div>

    </div>
  </div>

</x-admin-layout>