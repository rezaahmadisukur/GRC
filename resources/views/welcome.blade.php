<x-app-layout>

    {{-- ═══════════════════════════════════════════════════════════
    HERO SECTION — Deep navy gradient with animated elements
    ═══════════════════════════════════════════════════════════ --}}
    <section
        class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 min-h-[92vh] flex items-center border-none"
        id="home">

        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-[600px] h-[600px] rounded-full bg-blue-600/20 blur-3xl"></div>
            <div class="absolute -bottom-32 -left-32 w-[500px] h-[500px] rounded-full bg-blue-800/25 blur-3xl"></div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] rounded-full bg-blue-700/10 blur-3xl">
            </div>

            <div class="absolute inset-0 opacity-[0.03]"
                style="background-image: linear-gradient(rgba(255,255,255,0.5) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.5) 1px, transparent 1px); background-size: 60px 60px;">
            </div>

            <div class="absolute top-20 left-10 w-2 h-2 rounded-full bg-blue-400/40"></div>
            <div class="absolute top-40 left-32 w-1 h-1 rounded-full bg-blue-300/50"></div>
            <div class="absolute top-60 right-20 w-3 h-3 rounded-full bg-blue-500/30"></div>
            <div class="absolute bottom-40 right-40 w-2 h-2 rounded-full bg-blue-400/40"></div>
            <div class="absolute bottom-20 left-1/4 w-1.5 h-1.5 rounded-full bg-blue-300/40"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div class="text-center lg:text-left">
                    <div
                        class="inline-flex items-center gap-2 bg-blue-500/10 border border-blue-500/20 rounded-full px-4 py-1.5 mb-8">
                        <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                        <span class="text-blue-300 text-xs font-semibold tracking-widest uppercase">Terpercaya Sejak
                            2015</span>
                    </div>

                    <h1
                        class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-[1.05] tracking-tight mb-6">
                        Rental Mobil
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">
                            Premium &amp; Terpercaya
                        </span>
                    </h1>

                    <p class="text-lg md:text-xl text-slate-300 leading-relaxed mb-10 max-w-xl mx-auto lg:mx-0">
                        Nikmati kenyamanan berkendara dengan unit kendaraan pilihan kami yang modern, terawat, dan siap
                        menemani perjalanan Anda.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#cars"
                            class="group inline-flex items-center justify-center gap-2.5 bg-blue-600 hover:bg-blue-500 text-white px-8 py-4 rounded-2xl font-bold text-base shadow-lg shadow-blue-600/30 hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.35-4.35" />
                            </svg>
                            Cari Mobil Sekarang
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                                stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 18 15 12 9 6" />
                            </svg>
                        </a>
                        <a href="#about"
                            class="inline-flex items-center justify-center gap-2 border border-slate-600 hover:border-blue-500 text-slate-300 hover:text-white px-8 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:bg-blue-500/10 hover:-translate-y-0.5">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>

                    <div
                        class="flex flex-wrap gap-8 justify-center lg:justify-start mt-14 pt-10 border-t border-slate-700/50">
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-extrabold text-white">500<span class="text-blue-400">+</span>
                            </div>
                            <div class="text-xs text-slate-400 font-medium tracking-wide mt-0.5">Unit Mobil</div>
                        </div>
                        <div class="w-px bg-slate-700 hidden sm:block"></div>
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-extrabold text-white">10K<span class="text-blue-400">+</span>
                            </div>
                            <div class="text-xs text-slate-400 font-medium tracking-wide mt-0.5">Pelanggan Puas</div>
                        </div>
                        <div class="w-px bg-slate-700 hidden sm:block"></div>
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-extrabold text-white">24<span class="text-blue-400">/7</span>
                            </div>
                            <div class="text-xs text-slate-400 font-medium tracking-wide mt-0.5">Layanan Aktif</div>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:flex items-center justify-center relative">
                    <div class="relative w-full max-w-sm">
                        <div
                            class="absolute -top-4 -right-4 w-full h-full rounded-3xl bg-blue-600/20 border border-blue-500/20">
                        </div>
                        <div
                            class="absolute -top-2 -right-2 w-full h-full rounded-3xl bg-blue-600/10 border border-blue-500/10">
                        </div>

                        <div
                            class="relative bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-xl border border-slate-700/50 rounded-3xl p-8 shadow-2xl">
                            <div
                                class="w-20 h-20 rounded-2xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center mb-6 shadow-lg shadow-blue-600/30">
                                <svg class="w-10 h-10 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2" />
                                    <circle cx="7.5" cy="17.5" r="2.5" />
                                    <circle cx="16.5" cy="17.5" r="2.5" />
                                </svg>
                            </div>
                            <h3 class="text-white font-bold text-xl mb-1">Pusat Rentcar Purwakarta</h3>
                            <p class="text-slate-400 text-sm mb-6">Sewa mobil terpercaya di Purwakarta</p>

                            <div class="grid grid-cols-2 gap-3">
                                <div class="bg-slate-700/50 rounded-xl p-3">
                                    <div class="text-blue-400 font-bold text-lg">SUV</div>
                                    <div class="text-slate-400 text-xs">Tersedia</div>
                                </div>
                                <div class="bg-slate-700/50 rounded-xl p-3">
                                    <div class="text-blue-400 font-bold text-lg">MPV</div>
                                    <div class="text-slate-400 text-xs">Tersedia</div>
                                </div>
                                <div class="bg-slate-700/50 rounded-xl p-3">
                                    <div class="text-blue-400 font-bold text-lg">Sedan</div>
                                    <div class="text-slate-400 text-xs">Tersedia</div>
                                </div>
                                <div class="bg-slate-700/50 rounded-xl p-3">
                                    <div class="text-blue-400 font-bold text-lg">City</div>
                                    <div class="text-slate-400 text-xs">Tersedia</div>
                                </div>
                            </div>

                            <div
                                class="mt-5 flex items-center gap-2 bg-blue-600/10 border border-blue-500/20 rounded-xl px-4 py-2.5">
                                <div class="flex gap-0.5">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-4 h-4 text-yellow-400 fill-yellow-400" viewBox="0 0 24 24">
                                            <path
                                                d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-white font-bold text-sm">4.9</span>
                                <span class="text-slate-400 text-xs">/ 5.0 Rating</span>
                            </div>
                        </div>
                    </div>

                    <div
                        class="absolute -bottom-6 -left-6 bg-white rounded-2xl px-4 py-3 shadow-xl flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                        </div>
                        <div>
                            <div class="text-slate-800 font-bold text-sm">Booking Mudah</div>
                            <div class="text-slate-500 text-xs">Proses cepat &amp; aman</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom wave divider --}}
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" >
                <path d="M0 60L1440 60L1440 20C1200 60 960 0 720 20C480 40 240 0 0 20L0 60Z" fill="rgb(249 250 251)"/>
            </svg>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════════════
    CARS SECTION — Premium card grid
    ═══════════════════════════════════════════════════════════ --}}
    <section class="bg-gray-50 py-20" id="cars">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section Header --}}
            <div class="text-center mb-14">
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
                    Daftar Mobil <span class="text-blue-600">Tersedia</span>
                </h2>
                <p class="text-lg text-slate-500 max-w-xl mx-auto">
                    Pilih dari koleksi lengkap kendaraan premium kami yang siap menemani perjalanan Anda
                </p>
            </div>

            @if($cars && count($cars) > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach($cars as $index => $car)
                        <div class="car-card bg-white rounded-3xl shadow-lg shadow-gray-200/50 border border-gray-100 overflow-hidden group hover:shadow-2xl hover:shadow-gray-300/50 transition-all duration-500 hover:-translate-y-2 animate-fadeInUp" style="animation-delay: {{ $index * 0.1 }}s">
                            <!-- Car Image -->
                            <div class="relative h-56 md:h-64 bg-gradient-to-br from-gray-100 to-gray-50 overflow-hidden" style="isolation: isolate; transform: translateZ(0); backface-visibility: hidden;">
                                @if($car->image)
                                    <img src="{{ asset('storage/' . $car->image) }}" 
                                         alt="{{ $car->name }}"
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 {{ !$car->is_available ? 'opacity-50 grayscale-[40%]' : '' }}"
                                         style="will-change: transform; border-radius: inherit;"
                                         loading="lazy">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-gray-100 to-gray-200 {{ !$car->is_available ? 'opacity-50 grayscale-[40%]' : '' }}">
                                        <svg class="w-20 h-20 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1"/>
                                        </svg>
                                    </div>
                                @endif

                                <!-- Overlay gradient -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                                @if($car->is_available)
                                    <!-- Availability Badge -->
                                    <div class="absolute top-4 left-4 z-10">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-green-500 to-emerald-500 text-white text-xs font-bold rounded-full shadow-lg shadow-green-500/30">
                                            <span class="w-2 h-2 bg-white rounded-full"></span>
                                            Tersedia
                                        </span>
                                    </div>
                                @else
                                    <!-- Sedang Disewa Badge Center -->
                                    <div class="absolute inset-0 flex items-center justify-center z-10">
                                        <div class="bg-gradient-to-r from-red-600 to-red-700 backdrop-blur-sm px-8 py-4 rounded-2xl shadow-2xl transform rotate-[-3deg] hover:rotate-0 transition-transform duration-300">
                                            <span class="text-white font-black text-base md:text-lg tracking-wider drop-shadow-lg">SEDANG DISEWA</span>
                                        </div>
                                    </div>
                                @endif

                                <!-- Plate Code Badge -->
                                <div class="absolute top-4 right-4 z-10">
                                    <span class="inline-flex items-center px-3 py-1.5 bg-white/95 backdrop-blur-sm text-gray-800 text-xs font-black rounded-full shadow-lg border border-gray-200">
                                        {{ $car->plate_code }}
                                    </span>
                                </div>
                            </div>

                            <!-- Car Info -->
                            <div class="p-5 md:p-6">
                                <!-- Header -->
                                <div class="mb-4">
                                    <div class="flex items-start justify-between gap-2 mb-2">
                                        <h3 class="text-lg md:text-xl font-black text-gray-900 group-hover:text-blue-600 transition-colors duration-300 line-clamp-1">
                                            {{ $car->name }}
                                        </h3>
                                        <div class="flex-shrink-0">
                                            <span class="inline-flex items-center px-2.5 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-lg">
                                                {{ $car->category }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Features dengan icon yang lebih menarik -->
                                <div class="grid grid-cols-3 gap-3 mb-5 pb-5 border-b border-gray-100">
                                    <div class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/feature">
                                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-2 shadow-sm group-hover/feature:shadow-md transition-shadow">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs text-gray-500 font-medium">Kapasitas</span>
                                        <span class="text-sm font-bold text-gray-900">{{ $car->seats }} Kursi</span>
                                    </div>

                                    <div class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/feature">
                                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-2 shadow-sm group-hover/feature:shadow-md transition-shadow">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs text-gray-500 font-medium">Transmisi</span>
                                        <span class="text-sm font-bold text-gray-900">{{ $car->transmission }}</span>
                                    </div>

                                    <div class="flex flex-col items-center text-center p-3 bg-gray-50 rounded-xl hover:bg-blue-50 transition-colors duration-300 group/feature">
                                        <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center mb-2 shadow-sm group-hover/feature:shadow-md transition-shadow">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs text-gray-500 font-medium">BBM</span>
                                        <span class="text-sm font-bold text-gray-900">{{ $car->fuel_type }}</span>
                                    </div>
                                </div>

                                <!-- Price dengan design yang lebih menarik -->
                                <div class="grid grid-cols-2 gap-3 mb-5">
                                    <div class="relative bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl p-4 border-2 border-blue-200 hover:border-blue-400 transition-all duration-300 hover:shadow-lg group/price">
                                        <div class="absolute top-2 right-2">
                                            <svg class="w-4 h-4 text-blue-400 group-hover/price:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="text-xs text-blue-600 font-bold mb-1">12 Jam</div>
                                        <div class="text-sm font-black text-blue-700">
                                            Rp {{ number_format($car->price_12h, 0, ',', '.') }}
                                        </div>
                                    </div>

                                    <div class="relative bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl p-4 border-2 border-purple-200 hover:border-purple-400 transition-all duration-300 hover:shadow-lg group/price">
                                        <div class="absolute top-2 right-2">
                                            <svg class="w-4 h-4 text-purple-400 group-hover/price:text-purple-600 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                        <div class="text-xs text-purple-600 font-bold mb-1">24 Jam</div>
                                        <div class="text-sm font-black text-purple-700">
                                            Rp {{ number_format($car->price_24h, 0, ',', '.') }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Button dengan improved design -->
                                <a href="{{ route('cars.show', $car->plate_code) }}" class="block text-center bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white py-3.5 rounded-2xl font-bold text-sm transition-all duration-300 shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/50 overflow-hidden">
                                    <span class="flex items-center justify-center gap-2">
                                        Lihat Detail
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-20">
                    <div class="w-24 h-24 rounded-3xl bg-slate-100 flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2" />
                            <circle cx="7.5" cy="17.5" r="2.5" />
                            <circle cx="16.5" cy="17.5" r="2.5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-700 mb-2">Tidak Ada Mobil Tersedia</h3>
                    <p class="text-slate-500 max-w-sm mx-auto">Maaf, tidak ada mobil yang tersedia saat ini. Silakan cek
                        kembali nanti atau hubungi kami.</p>
                </div>
            @endif
        </div>
    </section>


{{-- ═══════════════════════════════════════════════════════════
FEATURES SECTION
═══════════════════════════════════════════════════════════ --}}
<section class="py-28 relative overflow-hidden" style="background: #ffffff;" id="about">
    {{-- Subtle background pattern --}}
    <div class="absolute inset-0 opacity-[0.025] pointer-events-none"
        style="background-image: radial-gradient(circle, #1d4ed8 1px, transparent 1px); background-size: 40px 40px;">
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center mb-20">
            <div class="inline-flex items-center gap-2 mb-5 px-5 py-2 rounded-full"
                style="background: rgba(37,99,235,0.07); border: 1px solid rgba(37,99,235,0.15);">
                <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    stroke-width="2.5">
                    <polyline points="20 6 9 17 4 12" />
                </svg>
                <span class="text-blue-700 text-xs font-bold tracking-[0.15em] uppercase">Keunggulan Kami</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 tracking-tight mb-5 leading-tight">
                Mengapa Memilih<br>
                <span class="text-blue-600">Pusat Rentcar Purwakarta?</span>
            </h2>
            <p class="text-lg text-slate-500 max-w-lg mx-auto leading-relaxed">
                Kami berkomitmen memberikan pengalaman rental terbaik dengan standar layanan premium
            </p>
        </div>

        {{-- Features Grid --}}
        {{-- @php
            $features = [
                ['icon' => 'M5 17H3a2 2 0 01-2-2v-4a2 2 0 012-2h1l3-5h10l3 5h1a2 2 0 012 2v4a2 2 0 01-2 2h-2M7.5 17.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm9 0a2.5 2.5 0 100-5 2.5 2.5 0 000 5z', 'title' => 'Unit Kendaraan Lengkap', 'desc' => 'Pilihan mobil terlengkap dari berbagai merek ternama dan dalam kondisi terbaik untuk perjalanan Anda.', 'color' => '#2563eb', 'bg' => '#eff6ff'],
                ['icon' => 'M12 1v22M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6', 'title' => 'Harga Terjangkau', 'desc' => 'Tarif kompetitif dengan berbagai paket sewa yang fleksibel, mulai 12 jam hingga berhari-hari.', 'color' => '#059669', 'bg' => '#ecfdf5'],
                ['icon' => 'M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.69 12 19.79 19.79 0 011.61 3.4 2 2 0 013.6 1.22h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.91 8.77a16 16 0 006.29 6.29l.95-.95a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z', 'title' => 'Layanan 24/7', 'desc' => 'Tim customer service profesional siap membantu Anda kapan saja, siang maupun malam.', 'color' => '#7c3aed', 'bg' => '#f5f3ff'],
                ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Asuransi Lengkap', 'desc' => 'Perlindungan menyeluruh dengan asuransi komprehensif untuk setiap perjalanan penyewaan.', 'color' => '#dc2626', 'bg' => '#fef2f2'],
                ['icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Lokasi Strategis', 'desc' => 'Kantor kami berlokasi di pusat kota Purwakarta, mudah diakses dari berbagai penjuru wilayah.', 'color' => '#d97706', 'bg' => '#fffbeb'],
                ['icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4', 'title' => 'Proses Booking Mudah', 'desc' => 'Pesan secara online dalam hitungan menit. Proses cepat, transparan, dan tanpa biaya tersembunyi.', 'color' => '#0891b2', 'bg' => '#ecfeff'],
            ];
        @endphp --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($features as $i => $f)
                <div class="group relative p-8 rounded-3xl transition-all duration-500 hover:-translate-y-2 cursor-default"
                    style="background: white; border: 1.5px solid #f1f5f9; box-shadow: 0 1px 3px rgba(0,0,0,0.04);"
                    onmouseover="this.style.boxShadow='0 20px 60px rgba(0,0,0,0.08)'; this.style.borderColor='{{ $f['color'] }}30';"
                    onmouseout="this.style.boxShadow='0 1px 3px rgba(0,0,0,0.04)'; this.style.borderColor='#f1f5f9';">

                    {{-- Icon --}}
                    <div class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-110"
                        style="background: {{ $f['bg'] }};">
                        <svg class="w-8 h-8" style="color: {{ $f['color'] }};" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="{{ $f['icon'] }}" />
                        </svg>
                    </div>

                    {{-- Number --}}
                    <div class="absolute top-7 right-7 text-5xl font-black opacity-[0.04] select-none"
                        style="color: {{ $f['color'] }}; line-height: 1;">
                        {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                    </div>

                    <h3 class="text-lg font-black text-slate-900 mb-3">{{ $f['title'] }}</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">{{ $f['desc'] }}</p>

                    {{-- Bottom accent line --}}
                    <div class="absolute bottom-0 left-8 right-8 h-0.5 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500"
                        style="background: linear-gradient(90deg, {{ $f['color'] }}, transparent);"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>


    {{-- ═══════════════════════════════════════════════════════════
    CTA BANNER — Bottom call to action
    ═══════════════════════════════════════════════════════════ --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-blue-700 via-blue-800 to-slate-900 py-20">
        {{-- Decorative blobs --}}
        <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full bg-blue-500/20 blur-3xl pointer-events-none">
        </div>
        <div class="absolute -bottom-20 -left-20 w-80 h-80 rounded-full bg-blue-900/40 blur-3xl pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div
                class="inline-flex items-center gap-2 bg-white/10 border border-white/20 rounded-full px-4 py-1.5 mb-6">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                <span class="text-white/80 text-xs font-semibold tracking-widest uppercase">Siap Melayani Anda</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-5">
                Siap Memulai Perjalanan?
            </h2>
            <p class="text-lg text-blue-200 mb-10 max-w-xl mx-auto">
                Pesan sekarang dan dapatkan pengalaman berkendara terbaik bersama   Pusat Rentcar Purwakarta! Unit kendaraan premium, layanan 24/7, dan harga terjangkau menanti Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#cars"
                    class="group inline-flex items-center justify-center gap-2.5 bg-white text-blue-700 hover:bg-blue-50 px-8 py-4 rounded-2xl font-bold text-base shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-0.5">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    Cari Mobil Sekarang
                </a>
                <a href="tel:+6281234567890"
                    class="inline-flex items-center justify-center gap-2.5 border-2 border-white/30 hover:border-white text-white px-8 py-4 rounded-2xl font-bold text-base transition-all duration-300 hover:bg-white/10 hover:-translate-y-0.5">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                    </svg>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>


    {{-- Smooth scroll script --}}
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>

</x-app-layout>
