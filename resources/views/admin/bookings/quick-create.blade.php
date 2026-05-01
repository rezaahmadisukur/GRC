<x-admin-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div
                class="flex items-center justify-center w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 shadow-lg shadow-blue-200">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-800 leading-tight">Quick Booking</h1>
                <p class="text-xs text-gray-400 font-medium">Walk-in Customer</p>
            </div>
        </div>
    </x-slot>

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

        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: scale(0.93) translateY(16px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .car-card {
            animation: fadeInUp 0.4s ease both;
        }

        .car-card:nth-child(1) {
            animation-delay: 0.05s;
        }

        .car-card:nth-child(2) {
            animation-delay: 0.10s;
        }

        .car-card:nth-child(3) {
            animation-delay: 0.15s;
        }

        .car-card:nth-child(4) {
            animation-delay: 0.20s;
        }

        .car-card:nth-child(5) {
            animation-delay: 0.25s;
        }

        .car-card:nth-child(6) {
            animation-delay: 0.30s;
        }

        .car-card:nth-child(7) {
            animation-delay: 0.35s;
        }

        .car-card:nth-child(8) {
            animation-delay: 0.40s;
        }

        .modal-content {
            animation: modalSlideIn 0.3s cubic-bezier(0.34, 1.56, 0.64, 1) both;
        }

        /* Custom number input — hide spinners */
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        /* Custom select styling */
        .custom-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280' stroke-width='2'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem;
            appearance: none;
            -webkit-appearance: none;
        }

        /* Transaction radio card active state */
        .txn-card input[type="radio"]:checked+.txn-label-immediate {
            border-color: #10b981;
            background-color: #ecfdf5;
            color: #065f46;
        }

        .txn-card input[type="radio"]:checked+.txn-label-booking {
            border-color: #6366f1;
            background-color: #eef2ff;
            color: #3730a3;
        }

        .txn-card input[type="radio"]:checked+.txn-label-immediate .txn-icon-immediate {
            background-color: #10b981;
            color: #fff;
        }

        .txn-card input[type="radio"]:checked+.txn-label-booking .txn-icon-booking {
            background-color: #6366f1;
            color: #fff;
        }

        .txn-card input[type="radio"]:checked+.txn-label-immediate .txn-check {
            display: flex;
        }

        .txn-card input[type="radio"]:checked+.txn-label-booking .txn-check {
            display: flex;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-indigo-50/20">
        <div class="container mx-auto px-4 py-8">
            <div class="max-w-7xl mx-auto space-y-6">

                {{-- ── Error Alert ── --}}
                @if(session('error'))
                    <div class="flex items-start gap-3 bg-red-50 border border-red-200 text-red-700
                                px-5 py-4 rounded-2xl shadow-sm animate-[fadeInUp_0.3s_ease]">
                        <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="text-sm font-medium flex-1">{{ session('error') }}</p>
                    </div>
                @endif

                {{-- ── Stats Bar ── --}}
                <div class="grid grid-cols-3 gap-3">
                    <div
                        class="bg-white rounded-2xl px-4 py-3.5 shadow-sm border border-gray-100 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-emerald-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-400 font-medium">Tersedia</p>
                            <p class="text-lg font-bold text-gray-800 leading-tight">
                                {{ $cars->where('is_available', true)->count() }}</p>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-2xl px-4 py-3.5 shadow-sm border border-gray-100 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-rose-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-400 font-medium">Dibooking</p>
                            <p class="text-lg font-bold text-gray-800 leading-tight">
                                {{ $cars->where('is_available', false)->count() }}</p>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-2xl px-4 py-3.5 shadow-sm border border-gray-100 flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-[11px] text-gray-400 font-medium">Total Armada</p>
                            <p class="text-lg font-bold text-gray-800 leading-tight">{{ $cars->count() }}</p>
                        </div>
                    </div>
                </div>

                {{-- ── Car Grid ── --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach($cars as $car)
                                    <div class="car-card group bg-white rounded-2xl shadow-sm border border-gray-100
                                                overflow-hidden hover:shadow-xl hover:shadow-blue-100/60
                                                hover:-translate-y-1.5 transition-all duration-300
                                                {{ !$car->is_available ? 'opacity-60' : '' }}">

                                        {{-- Image --}}
                                        <div class="relative h-36 overflow-hidden bg-gradient-to-br from-slate-100 to-slate-200">
                                            @if($car->image)
                                                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full flex flex-col items-center justify-center gap-2">
                                                    <svg class="w-14 h-14 text-slate-300" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                            d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1" />
                                                    </svg>
                                                    <span class="text-xs text-slate-300 font-medium">No Image</span>
                                                </div>
                                            @endif

                                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>

                                            {{-- Status badge --}}
                                            <div class="absolute top-2 left-2">
                                                @if($car->is_available)
                                                    <span class="inline-flex items-center gap-1 px-2.5 py-1
                                                                     bg-emerald-500 text-white text-[10px] font-bold
                                                                     rounded-full shadow-lg shadow-emerald-200">
                                                        <span class="w-1.5 h-1.5 bg-white rounded-full animate-pulse"></span>
                                                        Tersedia
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center gap-1 px-2.5 py-1
                                                                     bg-rose-500 text-white text-[10px] font-bold
                                                                     rounded-full shadow-lg shadow-rose-200">
                                                        <span class="w-1.5 h-1.5 bg-white rounded-full"></span>
                                                        Dibooking
                                                    </span>
                                                @endif
                                            </div>

                                            {{-- Plate code --}}
                                            <div class="absolute top-2 right-2">
                                                <span class="px-2 py-1 bg-white/90 backdrop-blur-sm text-gray-700
                                                             text-[10px] font-bold rounded-lg shadow">
                                                    {{ $car->plate_code }}
                                                </span>
                                            </div>
                                        </div>

                                        {{-- Info --}}
                                        <div class="p-3.5">
                                            <h3 class="font-bold text-gray-800 text-sm leading-tight truncate mb-0.5">
                                                {{ $car->name }}
                                            </h3>
                                            <p class="text-[11px] text-gray-400 mb-2.5">Sewa per-sesi</p>

                                            <div class="flex items-center justify-between mb-3">
                                                <div>
                                                    <p class="text-[10px] text-gray-400">12 Jam</p>
                                                    <p class="text-sm font-bold text-emerald-600">
                                                        Rp {{ number_format($car->price_12h, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                                <div class="w-px h-8 bg-gray-100"></div>
                                                <div class="text-right">
                                                    <p class="text-[10px] text-gray-400">24 Jam</p>
                                                    <p class="text-sm font-bold text-blue-600">
                                                        Rp {{ number_format($car->price_24h, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <button class="openBookingModal w-full relative overflow-hidden text-white
                                                       py-2.5 rounded-xl font-bold text-xs transition-all duration-300
                                                       group/btn
                                                       {{ $car->is_available
                        ? 'bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 shadow-md shadow-blue-200 hover:shadow-lg hover:shadow-blue-300 active:scale-95'
                        : 'bg-gray-200 text-gray-400 cursor-not-allowed' }}"
                                                data-car-id="{{ $car->id }}" data-car-name="{{ $car->name }}"
                                                data-price12="{{ $car->price_12h }}" data-price24="{{ $car->price_24h }}"
                                                @if(!$car->is_available) disabled @endif>

                                                @if($car->is_available)
                                                    <span class="absolute inset-0 bg-gradient-to-r from-transparent
                                                                 via-white/20 to-transparent -translate-x-full
                                                                 group-hover/btn:translate-x-full transition-transform
                                                                 duration-700 ease-in-out"></span>
                                                @endif

                                                <span class="relative flex items-center justify-center gap-1.5">
                                                    @if($car->is_available)
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                                                d="M12 4v16m8-8H4" />
                                                        </svg>
                                                        Booking Sekarang
                                                    @else
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                                        </svg>
                                                        Tidak Tersedia
                                                    @endif
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    {{-- ════════════════════════════════════════════════════
    MODAL
    ════════════════════════════════════════════════════ --}}
    <div id="bookingModal" class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-50 hidden items-center
                justify-center p-4">

        <div class="modal-content bg-white rounded-3xl shadow-2xl w-full max-w-lg
                    max-h-[92vh] overflow-hidden flex flex-col">

            <form action="{{ route('admin.quick-booking.store') }}" method="POST"
                class="flex flex-col h-full overflow-hidden">
                @csrf
                <input type="hidden" name="car_id" id="modal_car_id" value="">
                <input type="hidden" name="transaction_mode" value="immediate">

                {{-- ── Modal Header ── --}}
                <div class="px-6 py-5 bg-gradient-to-r from-blue-600 to-indigo-600 flex-shrink-0">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-xl bg-white/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-white/70 text-xs font-medium">Formulir Booking</p>
                                <h3 class="font-bold text-white text-base leading-tight" id="modal_title">
                                    Booking Mobil
                                </h3>
                            </div>
                        </div>
                        <button type="button" class="closeModal w-8 h-8 rounded-xl bg-white/20 hover:bg-white/30
                                       flex items-center justify-center text-white
                                       transition-all duration-200 hover:rotate-90 active:scale-90">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- ── Modal Body ── --}}
                <div class="flex-1 overflow-y-auto px-6 py-5 space-y-5">


                    {{-- ── Customer Info ── --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">
                                Nama Customer
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 w-10 flex items-center
                                            justify-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input type="text" name="customer_name" placeholder="Nama lengkap..." class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5
                                              text-sm text-gray-700 bg-gray-50 focus:bg-white
                                              focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100
                                              outline-none transition-all duration-200" required>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">
                                Nomor HP
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 w-10 flex items-center
                                            justify-center pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <input type="text" name="whatsapp_number" placeholder="08xx-xxxx-xxxx" class="w-full border border-gray-200 rounded-xl pl-10 pr-4 py-2.5
                                              text-sm text-gray-700 bg-gray-50 focus:bg-white
                                              focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100
                                              outline-none transition-all duration-200" required>
                            </div>
                        </div>
                    </div>

                    {{-- ── Start Date ── --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">
                            Tanggal & Jam Mulai
                        </label>
                        <div class="relative">
                            <input id="modal_start_date" type="text" name="start_date" placeholder="Pilih tanggal & waktu..." readonly
                                class="w-full border border-gray-200 rounded-xl pl-4 pr-10 py-2.5
                                          text-sm text-gray-700 bg-gray-50 focus:bg-white
                                          focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100
                                          outline-none transition-all duration-200" required>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>


                    {{-- ── Durasi + Extra Jam ── --}}
                    <div class="grid grid-cols-2 gap-4">
                        {{-- Durasi Sewa --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">
                                Paket Durasi
                            </label>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="duration_type" value="12" class="hidden peer" checked>
                                    <div class="peer-checked:border-blue-600 peer-checked:bg-blue-600 border-2 border-gray-200 rounded-xl p-3 transition-all duration-200 text-center bg-gray-50">
                                        <p class="text-sm font-black peer-checked:text-white text-gray-700 transition-colors">12 Jam</p>
                                    </div>
                                </label>
                                <label class="relative cursor-pointer">
                                    <input type="radio" name="duration_type" value="24" class="hidden peer">
                                    <div class="peer-checked:border-blue-600 peer-checked:bg-blue-600 border-2 border-gray-200 rounded-xl p-3 transition-all duration-200 text-center bg-gray-50">
                                        <p class="text-sm font-black peer-checked:text-white text-gray-700 transition-colors">24 Jam</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        {{-- Extra Jam — Number input --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">
                                Extra Jam
                            </label>
                            <div class="relative flex items-center border border-gray-200 rounded-xl
                                        bg-gray-50 focus-within:bg-white focus-within:border-indigo-400
                                        focus-within:ring-2 focus-within:ring-indigo-100
                                        transition-all duration-200 overflow-hidden">
                                <input type="number" name="extra_hours" id="modal_extra_hours" value="0" min="0" class="flex-1 px-3 py-2.5 text-sm font-bold text-gray-700
                                              bg-transparent outline-none w-0 border-none">
                                <span class="flex-shrink-0 w-10 flex items-center justify-center
                                             text-xs font-bold text-gray-400 border-l border-gray-200
                                             bg-gray-100 self-stretch">
                                    jam
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- ── Estimasi Selesai ── --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">
                            Estimasi Selesai
                        </label>
                        <div class="relative">
                            <input type="text" id="modal_end_date" readonly placeholder="Otomatis terisi..."
                                class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                          text-sm font-bold text-gray-700 bg-gray-100
                                          opacity-80 cursor-not-allowed outline-none">
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 opacity-50 pointer-events-none">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    {{-- ── Total Price Card ── --}}
                    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r
                                from-emerald-500 to-teal-500 p-4 shadow-lg shadow-emerald-200/50">
                        <div class="absolute -top-6 -right-6 w-24 h-24 bg-white/10 rounded-full"></div>
                        <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-white/10 rounded-full"></div>
                        <div class="relative flex items-center justify-between">
                            <div>
                                <p class="text-emerald-100 text-xs font-semibold uppercase tracking-wider">Total Harga
                                </p>
                                <p id="modal_price_breakdown" class="text-white text-xs mt-0.5 opacity-80">Termasuk extra jam</p>
                            </div>
                            <p id="modal_total_price" class="text-2xl font-black text-white tracking-tight">
                                Rp 0
                            </p>
                        </div>
                    </div>

                    {{-- ── Notes ── --}}
                    <div>
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">
                            Catatan
                            <span class="normal-case font-medium text-gray-300 tracking-normal ml-1">(Opsional)</span>
                        </label>
                        <textarea name="notes" rows="2"
                            placeholder="Permintaan atau catatan khusus..."
                            class="w-full border border-gray-200 rounded-xl px-4 py-2.5
                                      text-sm text-gray-700 bg-gray-50 focus:bg-white
                                      focus:border-indigo-400 focus:ring-2 focus:ring-indigo-100
                                      outline-none transition-all duration-200 resize-none"></textarea>
                    </div>

                    {{-- ── Immediate: Cash & Change ── --}}
                    <div id="immediate_fields">
                        <div class="grid grid-cols-2 gap-4">

                            {{-- Uang Diterima --}}
                            <div>
                                <label
                                    class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">
                                    Uang Diterima (DP)
                                </label>
                                <div class="relative flex items-center border border-gray-200 rounded-xl
                                            bg-gray-50 focus-within:bg-white focus-within:border-indigo-400
                                            focus-within:ring-2 focus-within:ring-indigo-100
                                            transition-all duration-200 overflow-hidden">
                                    <span class="flex-shrink-0 w-10 flex items-center justify-center
                                                 text-xs font-bold text-gray-400 border-r border-gray-200
                                                 bg-gray-100 self-stretch">
                                        Rp
                                    </span>
                                    <input type="number" name="cash_paid" id="modal_cash_paid" min="0" placeholder="0"
                                        class="flex-1 px-3 py-2.5 text-sm font-bold text-gray-700
                                                  bg-transparent outline-none w-0 border-none" >
                                </div>
                            </div>

                            {{-- Kembalian --}}
                            <div>
                                <label
                                    class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">
                                    Kembalian
                                </label>
                                <div id="modal_change_display" class="flex items-center border-2 border-blue-200 rounded-xl
                                            bg-blue-50 px-3 py-2.5 min-h-[42px]
                                            transition-all duration-300">
                                    <span class="text-xs font-bold text-blue-400 mr-1.5 flex-shrink-0">Rp</span>
                                    <span id="modal_change_value" class="text-sm font-bold text-blue-700">0</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- ── Booking: DP ── --}}
                    <div id="booking_fields" class="hidden">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1.5">
                            Jumlah DP (Uang Muka)
                        </label>
                        <div class="relative flex items-center border border-gray-200 rounded-xl
                                    bg-gray-50 focus-within:bg-white focus-within:border-indigo-400
                                    focus-within:ring-2 focus-within:ring-indigo-100
                                    transition-all duration-200 overflow-hidden">
                            <span class="flex-shrink-0 w-10 flex items-center justify-center
                                         text-xs font-bold text-gray-400 border-r border-gray-200
                                         bg-gray-100 self-stretch">
                                Rp
                            </span>
                            <input type="number" name="dp_amount" id="modal_dp_amount" min="0" placeholder="0" class="flex-1 px-3 py-2.5 text-sm font-bold text-gray-700
                                          bg-transparent outline-none w-0 border-none">
                        </div>
                    </div>

                </div>

                {{-- ── Modal Footer ── --}}
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/80 flex-shrink-0">
                    <div class="flex gap-3">
                        <button type="button" class="closeModal flex-1 border-2 border-gray-200 text-gray-600
                                       hover:border-gray-300 hover:bg-gray-100 font-semibold
                                       py-3 px-4 rounded-2xl text-sm transition-all duration-200
                                       active:scale-95">
                            Batal
                        </button>
                        <button type="submit" class="flex-[2] relative overflow-hidden bg-gradient-to-r
                                       from-emerald-500 to-teal-500 hover:from-emerald-600
                                       hover:to-teal-600 text-white font-bold py-3 px-6
                                       rounded-2xl text-sm shadow-lg shadow-emerald-200
                                       hover:shadow-xl hover:shadow-emerald-300
                                       transition-all duration-300 active:scale-95 group">
                            <span class="absolute inset-0 bg-gradient-to-r from-transparent
                                         via-white/20 to-transparent -translate-x-full
                                         group-hover:translate-x-full transition-transform
                                         duration-700 ease-in-out"></span>
                            <span class="relative flex items-center justify-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Buat Booking & Cetak Struk
                            </span>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    {{-- ════════════════════════════════════════════════════
    JAVASCRIPT
    ════════════════════════════════════════════════════ --}}
    <script>
        (() => {
            'use strict';

            // ── Refs ─────────────────────────────────────────────────────────
            const modal = document.getElementById('bookingModal');
            const modalCarId = document.getElementById('modal_car_id');
            const modalTitle = document.getElementById('modal_title');
            const elDuration = document.querySelectorAll('input[name="duration_type"]');
            const elExtraHours = document.getElementById('modal_extra_hours');
            const elCashPaid = document.getElementById('modal_cash_paid');
            const elTotalPrice = document.getElementById('modal_total_price');
            const elPriceBreakdown = document.getElementById('modal_price_breakdown');
            const elEndDate = document.getElementById('modal_end_date');
            const elChangeBox = document.getElementById('modal_change_display');
            const elChangeValue = document.getElementById('modal_change_value');
            const elImmediate = document.getElementById('immediate_fields');
            const elBooking = document.getElementById('booking_fields');
            const elDpAmount = document.getElementById('modal_dp_amount');
            const elTransactionMode = document.querySelectorAll('input[name="transaction_mode"]');
            const elStartDate = document.querySelector('input[name="start_date"]');

            let selectedCar = null;

            // ── Formatters ───────────────────────────────────────────────────
            const formatIDR = (n) => new Intl.NumberFormat('id-ID').format(Math.round(n));

            // ── Modal open / close ────────────────────────────────────────────
            function openModal() {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            function closeModal() {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }

            let flatpickrInstance = null;
            
            // Use event delegation to ensure it works even for dynamically loaded elements
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.openBookingModal');
                if (!btn) return;
                if (btn.disabled) return;

                selectedCar = {
                    id: btn.dataset.carId,
                    name: btn.dataset.carName,
                    price12: parseInt(btn.dataset.price12),
                    price24: parseInt(btn.dataset.price24),
                };

                modalCarId.value = selectedCar.id;
                modalTitle.textContent = '🚗 ' + selectedCar.name;

                // Reset extra hours
                elExtraHours.value = 0;

                // Destroy old flatpickr if exists
                if (flatpickrInstance) {
                    flatpickrInstance.destroy();
                }

                // Filter booked dates only for THIS car
                const carBookedDates = bookedDates.filter(date => date.car_id == selectedCar.id);

                // Initialize new flatpickr for this specific car
                flatpickrInstance = flatpickr(document.getElementById('modal_start_date'), {
                    enableTime: true,
                    minDate: 'today',
                    time_24hr: true,
                    locale: 'id',
                    altInput: true,
                    altFormat: 'j F Y \\p\\u\\k\\u\\l H.i',
                    dateFormat: 'Y-m-d H:i',
                    defaultDate: new Date(),
                    onChange: function(selectedDates, dateStr) {
                        if (typeof calculateTotal === 'function') {
                            calculateTotal();
                        }
                    },
                    onDayCreate: function(dObj, dStr, fp, dayElem) {
                        // Fix timezone issue: use local date not UTC
                        const date = dayElem.dateObj;
                        const currentDate = date.getFullYear() 
                            + '-' + String(date.getMonth() + 1).padStart(2, '0') 
                            + '-' + String(date.getDate()).padStart(2, '0');
                        
                        carBookedDates.forEach(range => {
                            if (currentDate >= range.start && currentDate <= range.end) {
                                const today = new Date();
                                const todayStr = today.getFullYear() 
                                    + '-' + String(today.getMonth() + 1).padStart(2, '0') 
                                    + '-' + String(today.getDate()).padStart(2, '0');
                                
                                if (currentDate === todayStr) {
                                    // Merah untuk hari ini
                                    dayElem.style.backgroundColor = '#fecaca';
                                    dayElem.style.color = '#991b1b';
                                } else if (range.status === 'active') {
                                    // Hijau untuk booking sudah di approve
                                    dayElem.style.backgroundColor = '#dcfce7';
                                    dayElem.style.color = '#166534';
                                } else if (range.status === 'pending') {
                                    // Kuning untuk booking menunggu approve
                                    dayElem.style.backgroundColor = '#fef3c7';
                                    dayElem.style.color = '#92400e';
                                }
                                dayElem.style.fontWeight = '600';
                            }
                        });
                    }
                });

                calculateTotal();
                openModal();
            });

            document.addEventListener('click', function(e) {
                if (e.target.closest('.closeModal')) {
                    closeModal();
                }
            });

            modal.addEventListener('click', e => { if (e.target === modal) closeModal(); });
            document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });


            elExtraHours.addEventListener('input', () => {
                let v = parseInt(elExtraHours.value) || 0;
                v = Math.max(0, v);
                elExtraHours.value = v;
                calculateTotal();
            });


            // ── Calculations ─────────────────────────────────────────────────
            function calculateTotal() {
                if (!selectedCar) return;

                const durationRadio = document.querySelector('input[name="duration_type"]:checked');
                const duration = parseInt(durationRadio.value);
                const extra = parseInt(elExtraHours.value) || 0;
                const base = duration === 12 ? selectedCar.price12 : selectedCar.price24;
                const perHour = base / duration;
                const total = Math.round(base + extra * perHour);

                elTotalPrice.textContent = 'Rp ' + formatIDR(total);
                
                // Update price breakdown
                elPriceBreakdown.textContent = extra > 0
                    ? `Paket ${duration}j (Rp ${formatIDR(base)}) + ${extra}j tambahan (Rp ${formatIDR(Math.round(extra * perHour))})`
                    : `Paket ${duration} jam`;

                // Calculate end date
                const startDateVal = elStartDate.value;
                if (startDateVal) {
                    const startDate = new Date(startDateVal.replace(/-/g, '/'));
                    const totalHours = duration + extra;
                    const endDate = new Date(startDate.getTime() + (totalHours * 60 * 60 * 1000));
                    
                    const options = { day: 'numeric', month: 'long', year: 'numeric' };
                    const datePart = endDate.toLocaleDateString('id-ID', options);
                    const h = endDate.getHours().toString().padStart(2, '0');
                    const m = endDate.getMinutes().toString().padStart(2, '0');
                    elEndDate.value = `${datePart} pukul ${h}.${m}`;
                }

                calculateChange();
            }

            function calculateChange() {
                const cash = parseInt(elCashPaid.value) || 0;
                const total = parseInt(
                    elTotalPrice.textContent.replace(/[^0-9]/g, '')
                ) || 0;
                const change = cash - total;
                const abs = Math.abs(change);
                const neg = change < 0;

                elChangeValue.textContent = (neg ? '-' : '') + formatIDR(abs);

                // Update styling of the change box
                elChangeBox.className = [
                    'flex items-center border-2 rounded-xl px-3 py-2.5 min-h-[42px] transition-all duration-300',
                    neg
                        ? 'border-rose-200 bg-rose-50'
                        : 'border-blue-200 bg-blue-50',
                ].join(' ');

                const rpLabel = elChangeBox.querySelector('span:first-child');
                if (rpLabel) {
                    rpLabel.className = `text-xs font-bold mr-1.5 flex-shrink-0 ${neg ? 'text-rose-400' : 'text-blue-400'}`;
                }
                elChangeValue.className = `text-sm font-bold ${neg ? 'text-rose-600' : 'text-blue-700'}`;
            }

            // ── Event listeners ───────────────────────────────────────────────
            elDuration.forEach(input => input.addEventListener('change', calculateTotal));
            elCashPaid.addEventListener('input', calculateChange);
            elStartDate.addEventListener('change', calculateTotal);

        })();

        const bookedDates = @json($bookedDates);
    </script>

</x-admin-layout>
