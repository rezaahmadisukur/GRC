<x-app-layout>

    {{-- ═══════════════════════════════════════════════════════════
    HERO SECTION — Deep navy gradient with animated elements
    ═══════════════════════════════════════════════════════════ --}}
    <section
        class="relative overflow-hidden bg-gradient-to-br from-slate-900 via-blue-950 to-slate-900 min-h-[92vh] flex items-center"
        id="home">

        {{-- Background decorative blobs --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            {{-- Large glow top-right --}}
            <div class="absolute -top-40 -right-40 w-[600px] h-[600px] rounded-full bg-blue-600/20 blur-3xl"></div>
            {{-- Medium glow bottom-left --}}
            <div class="absolute -bottom-32 -left-32 w-[500px] h-[500px] rounded-full bg-blue-800/25 blur-3xl"></div>
            {{-- Small accent center --}}
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] rounded-full bg-blue-700/10 blur-3xl">
            </div>

            {{-- Subtle grid pattern overlay --}}
            <div class="absolute inset-0 opacity-[0.03]"
                style="background-image: linear-gradient(rgba(255,255,255,0.5) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.5) 1px, transparent 1px); background-size: 60px 60px;">
            </div>

            {{-- Decorative circles --}}
            <div class="absolute top-20 left-10 w-2 h-2 rounded-full bg-blue-400/40"></div>
            <div class="absolute top-40 left-32 w-1 h-1 rounded-full bg-blue-300/50"></div>
            <div class="absolute top-60 right-20 w-3 h-3 rounded-full bg-blue-500/30"></div>
            <div class="absolute bottom-40 right-40 w-2 h-2 rounded-full bg-blue-400/40"></div>
            <div class="absolute bottom-20 left-1/4 w-1.5 h-1.5 rounded-full bg-blue-300/40"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 w-full">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- Left: Text Content --}}
                <div class="text-center lg:text-left">
                    {{-- Badge --}}
                    <div
                        class="inline-flex items-center gap-2 bg-blue-500/10 border border-blue-500/20 rounded-full px-4 py-1.5 mb-8">
                        <span class="w-2 h-2 rounded-full bg-blue-400 animate-pulse"></span>
                        <span class="text-blue-300 text-xs font-semibold tracking-widest uppercase">Terpercaya Sejak
                            2015</span>
                    </div>

                    {{-- Headline --}}
                    <h1
                        class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white leading-[1.05] tracking-tight mb-6">
                        Rental Mobil
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-400">
                            Premium &amp; Terpercaya
                        </span>
                    </h1>

                    {{-- Subheadline --}}
                    <p class="text-lg md:text-xl text-slate-300 leading-relaxed mb-10 max-w-xl mx-auto lg:mx-0">
                        Nikmati kenyamanan berkendara dengan armada mobil pilihan kami yang modern, terawat, dan siap
                        menemani perjalanan Anda.
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <button onclick="document.querySelector('.search-section').scrollIntoView({behavior: 'smooth'})"
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
                        </button>
                        <a href="#about"
                            class="inline-flex items-center justify-center gap-2 border border-slate-600 hover:border-blue-500 text-slate-300 hover:text-white px-8 py-4 rounded-2xl font-semibold text-base transition-all duration-300 hover:bg-blue-500/10 hover:-translate-y-0.5">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>

                    {{-- Stats Row --}}
                    <div
                        class="flex flex-wrap gap-8 justify-center lg:justify-start mt-14 pt-10 border-t border-slate-700/50">
                        <div class="text-center lg:text-left">
                            <div class="text-3xl font-extrabold text-white">500<span class="text-blue-400">+</span>
                            </div>
                            <div class="text-xs text-slate-400 font-medium tracking-wide mt-0.5">Armada Mobil</div>
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

                {{-- Right: Visual Card Stack --}}
                <div class="hidden lg:flex items-center justify-center relative">
                    {{-- Main card --}}
                    <div class="relative w-full max-w-sm">
                        {{-- Background card (offset) --}}
                        <div
                            class="absolute -top-4 -right-4 w-full h-full rounded-3xl bg-blue-600/20 border border-blue-500/20">
                        </div>
                        <div
                            class="absolute -top-2 -right-2 w-full h-full rounded-3xl bg-blue-600/10 border border-blue-500/10">
                        </div>

                        {{-- Main visual card --}}
                        <div
                            class="relative bg-gradient-to-br from-slate-800/80 to-slate-900/80 backdrop-blur-xl border border-slate-700/50 rounded-3xl p-8 shadow-2xl">
                            {{-- Car icon large --}}
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
                            <h3 class="text-white font-bold text-xl mb-1">GRC Rental Mobil</h3>
                            <p class="text-slate-400 text-sm mb-6">Armada premium siap melayani</p>

                            {{-- Mini stats --}}
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

                            {{-- Rating badge --}}
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

                    {{-- Floating badge --}}
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
            <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full">
                <path d="M0 60L1440 60L1440 20C1200 60 960 0 720 20C480 40 240 0 0 20L0 60Z" fill="rgb(249 250 251)" />
            </svg>
        </div>
    </section>


    {{-- ═══════════════════════════════════════════════════════════
    SEARCH SECTION — Floating card with glassmorphism feel
    ═══════════════════════════════════════════════════════════ --}}
    <div class="search-section bg-gray-50 pt-4 pb-16">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section label --}}
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-slate-800">Temukan Mobil Impian Anda</h2>
                <p class="text-slate-500 text-sm mt-1">Isi form di bawah untuk mencari ketersediaan kendaraan</p>
            </div>

            <form action="{{ route('dashboard') }}" method="GET"
                class="bg-white rounded-3xl shadow-xl shadow-slate-200/60 border border-slate-100 p-6 md:p-8">

                {{-- Form header --}}
                <div class="flex items-center gap-3 mb-6 pb-5 border-b border-slate-100">
                    <div
                        class="w-10 h-10 rounded-xl bg-blue-600 flex items-center justify-center shadow-md shadow-blue-600/20">
                        <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.35-4.35" />
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-slate-800 text-sm">Cari Kendaraan</div>
                        <div class="text-slate-400 text-xs">Pilih tanggal dan tipe mobil</div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    {{-- Start Date --}}
                    <div class="group">
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
                            Tanggal Mulai
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                            </div>
                            <input type="date" name="start_date" required
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-700 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-200 hover:border-slate-300">
                        </div>
                    </div>

                    {{-- End Date --}}
                    <div class="group">
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
                            Tanggal Selesai
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                                    <line x1="16" y1="2" x2="16" y2="6" />
                                    <line x1="8" y1="2" x2="8" y2="6" />
                                    <line x1="3" y1="10" x2="21" y2="10" />
                                </svg>
                            </div>
                            <input type="date" name="end_date" required
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-700 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-200 hover:border-slate-300">
                        </div>
                    </div>

                    {{-- Car Type --}}
                    <div class="group">
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
                            Tipe Kendaraan
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2" />
                                    <circle cx="7.5" cy="17.5" r="2.5" />
                                    <circle cx="16.5" cy="17.5" r="2.5" />
                                </svg>
                            </div>
                            <select name="type"
                                class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-slate-700 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent focus:bg-white transition-all duration-200 hover:border-slate-300 appearance-none cursor-pointer">
                                <option value="">Semua Tipe</option>
                                <option value="SUV">SUV</option>
                                <option value="Sedan">Sedan</option>
                                <option value="MPV">MPV</option>
                                <option value="City Car">City Car</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="mt-6">
                    <button type="submit"
                        class="group w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white px-6 py-4 rounded-2xl font-bold text-base shadow-lg shadow-blue-600/25 hover:shadow-blue-500/35 transition-all duration-300 hover:-translate-y-0.5 flex items-center justify-center gap-2.5">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.35-4.35" />
                        </svg>
                        Cari Kendaraan Tersedia
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 18 15 12 9 6" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>


    {{-- ═══════════════════════════════════════════════════════════
    CARS SECTION — Premium card grid
    ═══════════════════════════════════════════════════════════ --}}
    <section class="bg-gray-50 py-20" id="cars">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section Header --}}
            <div class="text-center mb-14">
                <div
                    class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 rounded-full px-4 py-1.5 mb-4">
                    <svg class="w-3.5 h-3.5 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2" />
                        <circle cx="7.5" cy="17.5" r="2.5" />
                        <circle cx="16.5" cy="17.5" r="2.5" />
                    </svg>
                    <span class="text-blue-700 text-xs font-semibold tracking-widest uppercase">Armada Kami</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
                    Daftar Mobil <span class="text-blue-600">Tersedia</span>
                </h2>
                <p class="text-lg text-slate-500 max-w-xl mx-auto">
                    Pilih dari koleksi lengkap kendaraan premium kami yang siap menemani perjalanan Anda
                </p>
            </div>

            @if($cars && count($cars) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                    @foreach($cars as $car)
                        <div
                            class="group bg-white rounded-3xl shadow-md shadow-slate-200/60 border border-slate-100 overflow-hidden hover:shadow-xl hover:shadow-slate-200/80 hover:-translate-y-1 transition-all duration-300">

                            {{-- Car Image --}}
                            <div
                                class="relative h-52 bg-gradient-to-br from-slate-100 via-blue-50 to-slate-100 overflow-hidden">
                                @if($car->image)
                                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center">
                                        <div class="w-20 h-20 rounded-2xl bg-blue-100 flex items-center justify-center">
                                            <svg class="w-10 h-10 text-blue-500" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2" />
                                                <circle cx="7.5" cy="17.5" r="2.5" />
                                                <circle cx="16.5" cy="17.5" r="2.5" />
                                            </svg>
                                        </div>
                                    </div>
                                @endif

                                {{-- Plate code badge --}}
                                <span
                                    class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-bold tracking-wide shadow-md shadow-blue-600/30 uppercase">
                                    {{ $car->plate_code }}
                                </span>

                                {{-- Availability status --}}
                                <div
                                    class="absolute top-4 right-4 flex items-center gap-1.5 bg-white/90 backdrop-blur-sm rounded-full px-2.5 py-1 shadow-sm">
                                    <span
                                        class="w-1.5 h-1.5 rounded-full {{ $car->is_available ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                    <span
                                        class="text-xs font-semibold text-slate-700">{{ $car->is_available ? 'Tersedia' : 'Disewa' }}</span>
                                </div>
                            </div>

                            {{-- Car Info --}}
                            <div class="p-6">
                                {{-- Car Name --}}
                                <div class="mb-3">
                                    <h3 class="text-lg font-extrabold text-slate-900 leading-tight">
                                        {{ $car->name }}
                                    </h3>
                                    <div class="flex items-center gap-2 mt-1">
                                        <span class="text-xs text-slate-400 font-medium">{{ $car->color }}</span>
                                        <span class="w-1 h-1 rounded-full bg-slate-300"></span>
                                        <span
                                            class="text-xs text-slate-400 font-medium">{{ $car->transmission == 'AT' ? 'Automatic' : 'Manual' }}</span>
                                    </div>
                                </div>

                                {{-- Divider --}}
                                <div class="border-t border-slate-100 my-4"></div>

                                {{-- Prices --}}
                                <div class="grid grid-cols-2 gap-3 mb-4">
                                    <div class="bg-slate-50 rounded-xl p-2.5 text-center">
                                        <div class="text-xs text-slate-400 font-medium">12 Jam</div>
                                        <div class="text-lg font-bold text-blue-600">Rp
                                            {{ number_format($car->price_12h, 0, ',', '.') }}</div>
                                    </div>
                                    <div class="bg-slate-50 rounded-xl p-2.5 text-center">
                                        <div class="text-xs text-slate-400 font-medium">24 Jam</div>
                                        <div class="text-lg font-bold text-blue-600">Rp
                                            {{ number_format($car->price_24h, 0, ',', '.') }}</div>
                                    </div>
                                </div>

                                {{-- CTA Button --}}
                                <a href="{{ route('cars.show', $car->plate_code) }}"
                                    class="group/btn block text-center bg-blue-50 hover:bg-blue-600 text-blue-600 hover:text-white py-3 rounded-xl font-bold text-sm transition-all duration-200 border border-blue-100 hover:border-blue-600 hover:shadow-md hover:shadow-blue-600/20">
                                    Lihat Detail
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
    FEATURES SECTION — Why choose us
    ═══════════════════════════════════════════════════════════ --}}
    <section class="bg-white py-24" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Section Header --}}
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center gap-2 bg-blue-50 border border-blue-100 rounded-full px-4 py-1.5 mb-4">
                    <svg class="w-3.5 h-3.5 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="20 6 9 17 4 12" />
                    </svg>
                    <span class="text-blue-700 text-xs font-semibold tracking-widest uppercase">Keunggulan Kami</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
                    Mengapa Memilih <span class="text-blue-600">GRC?</span>
                </h2>
                <p class="text-lg text-slate-500 max-w-xl mx-auto">
                    Kami berkomitmen memberikan pengalaman rental terbaik dengan standar layanan premium
                </p>
            </div>

            {{-- Features Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Feature 1 --}}
                <div
                    class="group relative bg-white border border-slate-100 rounded-3xl p-7 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-50/0 to-blue-50/0 group-hover:from-blue-50/50 group-hover:to-transparent transition-all duration-300 rounded-3xl">
                    </div>
                    <div class="relative">
                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center mb-5 transition-colors duration-300 shadow-sm">
                            <svg class="w-7 h-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2" />
                                <circle cx="7.5" cy="17.5" r="2.5" />
                                <circle cx="16.5" cy="17.5" r="2.5" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-extrabold text-slate-900 mb-2">Armada Lengkap</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Pilihan mobil terlengkap dari berbagai merek ternama dan dalam kondisi terbaik
                        </p>
                    </div>
                </div>

                {{-- Feature 2 --}}
                <div
                    class="group relative bg-white border border-slate-100 rounded-3xl p-7 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-50/0 to-blue-50/0 group-hover:from-blue-50/50 group-hover:to-transparent transition-all duration-300 rounded-3xl">
                    </div>
                    <div class="relative">
                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center mb-5 transition-colors duration-300 shadow-sm">
                            <svg class="w-7 h-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="1" x2="12" y2="23" />
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-extrabold text-slate-900 mb-2">Harga Terjangkau</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Tarif kompetitif dengan berbagai paket sewa yang fleksibel sesuai kebutuhan Anda
                        </p>
                    </div>
                </div>

                {{-- Feature 3 --}}
                <div
                    class="group relative bg-white border border-slate-100 rounded-3xl p-7 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-50/0 to-blue-50/0 group-hover:from-blue-50/50 group-hover:to-transparent transition-all duration-300 rounded-3xl">
                    </div>
                    <div class="relative">
                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center mb-5 transition-colors duration-300 shadow-sm">
                            <svg class="w-7 h-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-extrabold text-slate-900 mb-2">Layanan 24/7</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Tim customer service siap membantu Anda kapan saja untuk kepuasan maksimal
                        </p>
                    </div>
                </div>

                {{-- Feature 4 --}}
                <div
                    class="group relative bg-white border border-slate-100 rounded-3xl p-7 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-50/0 to-blue-50/0 group-hover:from-blue-50/50 group-hover:to-transparent transition-all duration-300 rounded-3xl">
                    </div>
                    <div class="relative">
                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center mb-5 transition-colors duration-300 shadow-sm">
                            <svg class="w-7 h-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-extrabold text-slate-900 mb-2">Asuransi Lengkap</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Perlindungan menyeluruh dengan asuransi komprehensif untuk setiap penyewaan
                        </p>
                    </div>
                </div>

                {{-- Feature 5 --}}
                <div
                    class="group relative bg-white border border-slate-100 rounded-3xl p-7 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-50/0 to-blue-50/0 group-hover:from-blue-50/50 group-hover:to-transparent transition-all duration-300 rounded-3xl">
                    </div>
                    <div class="relative">
                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center mb-5 transition-colors duration-300 shadow-sm">
                            <svg class="w-7 h-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-extrabold text-slate-900 mb-2">Lokasi Strategis</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Kantor cabang tersebar di berbagai lokasi untuk kemudahan akses Anda
                        </p>
                    </div>
                </div>

                {{-- Feature 6 --}}
                <div
                    class="group relative bg-white border border-slate-100 rounded-3xl p-7 hover:border-blue-200 hover:shadow-xl hover:shadow-blue-50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-50/0 to-blue-50/0 group-hover:from-blue-50/50 group-hover:to-transparent transition-all duration-300 rounded-3xl">
                    </div>
                    <div class="relative">
                        <div
                            class="w-14 h-14 rounded-2xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center mb-5 transition-colors duration-300 shadow-sm">
                            <svg class="w-7 h-7 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="9 11 12 14 22 4" />
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-extrabold text-slate-900 mb-2">Proses Mudah</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            Proses sewa yang cepat, mudah, dan transparan tanpa ribet
                        </p>
                    </div>
                </div>

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
                Pesan sekarang dan dapatkan pengalaman berkendara terbaik bersama GRC Rental Mobil
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="document.querySelector('.search-section').scrollIntoView({behavior: 'smooth'})"
                    class="group inline-flex items-center justify-center gap-2.5 bg-white text-blue-700 hover:bg-blue-50 px-8 py-4 rounded-2xl font-bold text-base shadow-lg shadow-black/20 transition-all duration-300 hover:-translate-y-0.5">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.35-4.35" />
                    </svg>
                    Cari Mobil Sekarang
                </button>
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