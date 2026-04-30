<x-admin-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">Pengelolaan Mobil</h2>
                <p class="text-sm text-gray-500 font-normal">Kelola armada kendaraan Anda</p>
            </div>
        </div>
    </x-slot>


    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ════════════════════════════════════════ --}}
            {{-- STAT CARDS --}}
            {{-- ════════════════════════════════════════ --}}
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 animate-fade-in-up">

                {{-- Total --}}
                <div
                    class="bg-white border border-slate-100 rounded-2xl p-4 flex items-center gap-3.5 transition-all duration-200 hover:-translate-y-1 hover:shadow-lg">
                    <div class="p-2.5 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 shrink-0">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Total Mobil</p>
                        <p class="text-xl font-bold text-gray-800">{{ $cars->total() }}</p>
                    </div>
                </div>

                {{-- Tersedia --}}
                <div
                    class="bg-white border border-slate-100 rounded-2xl p-4 flex items-center gap-3.5 transition-all duration-200 hover:-translate-y-1 hover:shadow-lg">
                    <div class="p-2.5 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-500 shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Tersedia</p>
                        <p class="text-xl font-bold text-emerald-600">
                            {{ $stats['available'] }}
                        </p>
                    </div>
                </div>

                {{-- Tidak Tersedia --}}
                <div
                    class="bg-white border border-slate-100 rounded-2xl p-4 flex items-center gap-3.5 transition-all duration-200 hover:-translate-y-1 hover:shadow-lg">
                    <div class="p-2.5 rounded-xl bg-gradient-to-br from-rose-400 to-red-500 shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Tidak Tersedia</p>
                        <p class="text-xl font-bold text-rose-600">
                            {{ $stats['unavailable'] }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- ════════════════════════════════════════ --}}
            {{-- TOOLBAR: Tambah + Refresh --}}
            {{-- ════════════════════════════════════════ --}}
            <div class="flex flex-wrap justify-between items-center gap-3 animate-fade-in-up"
                style="animation-delay: .05s">
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.cars.create') }}"
                        class="relative inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl font-semibold text-sm shadow-lg shadow-indigo-300 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-indigo-400 active:translate-y-0 overflow-hidden">
                        <span
                            class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-violet-600 opacity-0 transition-opacity duration-250 hover:opacity-100"></span>
                        <svg class="w-4 h-4 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="relative z-10">Tambah Mobil Baru</span>
                    </a>

                    <button onclick="window.location.reload()"
                        class="relative inline-flex items-center gap-2 px-4 py-2.5 bg-white text-gray-700 border-2 border-gray-200 rounded-xl font-medium text-sm transition-all duration-200 hover:bg-gray-50 hover:border-gray-300 hover:-translate-y-0.5 hover:shadow-md relative"
                        id="refreshBtn">
                        <span class="tooltip-label">Muat Ulang</span>
                        <svg id="refreshIcon" class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </button>
                </div>

                {{-- Jumlah hasil pencarian --}}
                @if(request()->hasAny(['search', 'transmission', 'status']))
                    <div class="flex items-center gap-2 px-3 py-1.5 bg-indigo-50 border border-indigo-200 rounded-lg">
                        <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z" />
                        </svg>
                        <span class="text-sm text-indigo-700 font-medium">Filter aktif · {{ $cars->total() }} hasil</span>
                        <a href="{{ route('admin.cars.index') }}"
                            class="ml-1 text-indigo-500 hover:text-indigo-700 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>

            {{-- ════════════════════════════════════════ --}}
            {{-- SEARCH & FILTER --}}
            {{-- ════════════════════════════════════════ --}}
            <form method="GET" action="{{ route('admin.cars.index') }}"
                class="bg-white/85 backdrop-blur-xl border border-white/60 rounded-2xl shadow-sm p-5 animate-fade-in-up"
                style="animation-delay: .10s">

                <div class="flex items-center gap-2 mb-4">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z" />
                    </svg>
                    <span class="text-sm font-semibold text-gray-600">Filter & Pencarian</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">

                    {{-- Search --}}
                    <div class="relative lg:col-span-1">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" />
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama, plat, warna..."
                            class="w-full pl-10 pr-4 py-2.5 bg-white border-2 border-gray-200 rounded-xl text-sm text-gray-700 outline-none transition-all duration-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100 placeholder:text-gray-400"
                            autocomplete="off">
                    </div>

                    {{-- Transmisi --}}
                    <div>
                        <select name="transmission"
                            class="w-full px-4 py-2.5 bg-white border-2 border-gray-200 rounded-xl text-sm text-gray-700 outline-none transition-all duration-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">
                            <option value="">🔧 Semua Transmisi</option>
                            <option value="AT" {{ request('transmission') == 'AT' ? 'selected' : '' }}>⚡ Automatic (AT)
                            </option>
                            <option value="MT" {{ request('transmission') == 'MT' ? 'selected' : '' }}>🔩 Manual (MT)
                            </option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div>
                        <select name="status"
                            class="w-full px-4 py-2.5 bg-white border-2 border-gray-200 rounded-xl text-sm text-gray-700 outline-none transition-all duration-200 focus:border-indigo-500 focus:ring-4 focus:ring-indigo-100">
                            <option value="">📋 Semua Status</option>
                            <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>✅ Tersedia
                            </option>
                            <option value="unavailable" {{ request('status') == 'unavailable' ? 'selected' : '' }}>❌ Tidak
                                Tersedia</option>
                        </select>
                    </div>

                    {{-- Aksi --}}
                    <div class="flex gap-2">
                        <button type="submit" class="flex-1 flex items-center justify-center gap-2 px-4 py-2.5
                             bg-gradient-to-r from-indigo-500 to-blue-600
                             text-white rounded-xl font-semibold text-sm
                             hover:from-indigo-600 hover:to-blue-700
                             transition-all duration-200 shadow-sm hover:shadow-md
                             active:scale-95">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" />
                            </svg>
                            Cari
                        </button>
                        <a href="{{ route('admin.cars.index') }}" class="flex items-center justify-center px-4 py-2.5
                             bg-gray-100 text-gray-600 rounded-xl font-semibold text-sm
                             hover:bg-gray-200 transition-all duration-200 active:scale-95
                             border border-gray-200">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </a>
                    </div>
                </div>
            </form>

            {{-- ════════════════════════════════════════ --}}
            {{-- DATA TABLE --}}
            {{-- ════════════════════════════════════════ --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden animate-fade-in-up"
                style="animation-delay: .15s">

                {{-- Table Header Bar --}}
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></div>
                        <span class="text-sm font-semibold text-gray-700">Daftar Armada Mobil</span>
                    </div>
                    <span class="text-xs text-gray-400">
                        Menampilkan {{ $cars->firstItem() ?? 0 }}–{{ $cars->lastItem() ?? 0 }}
                        dari {{ $cars->total() }} data
                    </span>
                </div>

                <div
                    class="overflow-x-auto [&::-webkit-scrollbar]:h-1 [&::-webkit-scrollbar-track]:bg-slate-100 [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-300 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb:hover]:bg-gray-400">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-slate-50 to-gray-50 border-b border-gray-100">
                                <th
                                    class="px-5 py-3.5 text-left w-12 text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    #</th>
                                <th
                                    class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    Nama Mobil</th>
                                <th
                                    class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    Plat</th>
                                <th
                                    class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    Warna</th>
                                <th
                                    class="px-5 py-3.5 text-left text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    Transmisi</th>
                                <th
                                    class="px-5 py-3.5 text-right text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    Harga 12 Jam</th>
                                <th
                                    class="px-5 py-3.5 text-right text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    Harga 24 Jam</th>
                                <th
                                    class="px-5 py-3.5 text-center text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    Foto</th>
                                <th
                                    class="px-5 py-3.5 text-center text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    Status</th>
                                <th
                                    class="px-5 py-3.5 text-center text-xs font-bold uppercase tracking-wider text-gray-500 whitespace-nowrap">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($cars as $car)
                                <tr class="transition-all duration-200 animate-row-slide-in hover:bg-gradient-to-r from-blue-50 to-transparent"
                                    style="animation-delay: {{ $loop->index * 0.04 }}s">

                                    {{-- No --}}
                                    <td class="px-5 py-3.5">
                                        <span
                                            class="inline-flex items-center justify-center w-7 h-7 bg-gradient-to-br from-purple-50 to-blue-50 text-indigo-600 rounded-lg text-xs font-bold">
                                            {{ ($cars->currentPage() - 1) * $cars->perPage() + $loop->iteration }}
                                        </span>
                                    </td>

                                    {{-- Nama --}}
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center gap-2.5">
                                            <span class="font-semibold text-gray-800 text-sm">{{ $car->name }}</span>
                                        </div>
                                    </td>

                                    {{-- Plat --}}
                                    <td class="px-5 py-3.5">
                                        <span
                                            class="inline-block px-2.5 py-1 bg-slate-800 text-yellow-400 rounded-lg text-xs font-bold tracking-wider">{{ $car->plate_code }}</span>
                                    </td>

                                    {{-- Warna --}}
                                    <td class="px-5 py-3.5 text-sm text-gray-600">
                                        <span
                                            class="inline-block w-3 h-3 rounded-full border border-gray-200 align-middle mr-1.5"
                                            style="background-color: {{ strtolower($car->color) }};"></span>
                                        {{ $car->color }}
                                    </td>

                                    {{-- Transmisi --}}
                                    <td class="px-5 py-3.5">
                                        @if($car->transmission === 'AT')
                                            <span
                                                class="inline-block px-2.5 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-bold">AT</span>
                                        @else
                                            <span
                                                class="inline-block px-2.5 py-1 bg-yellow-100 text-yellow-700 rounded-lg text-xs font-bold">MT</span>
                                        @endif
                                    </td>

                                    {{-- Harga 12 Jam --}}
                                    <td class="px-5 py-3.5 text-right">
                                        <span class="font-semibold text-emerald-700 text-sm">
                                            Rp {{ number_format($car->price_12h, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    {{-- Harga 24 Jam --}}
                                    <td class="px-5 py-3.5 text-right">
                                        <span class="price-cell">
                                            Rp {{ number_format($car->price_24h, 0, ',', '.') }}
                                        </span>
                                    </td>

                                    {{-- Gambar --}}
                                    <td class="px-5 py-3.5 text-center">
                                        @if($car->image)
                                            <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                                                class="w-11 h-11 rounded-xl object-cover border-2 border-gray-200 transition-all duration-200 cursor-pointer hover:scale-110 hover:shadow-lg mx-auto"
                                                loading="lazy" onclick="openImageModal(this.src, '{{ $car->name }}')"
                                                onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                                            <div style="display:none"
                                                class="w-11 h-11 rounded-xl bg-gray-100 mx-auto items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @else
                                            <div
                                                class="w-11 h-11 rounded-xl bg-gray-100 mx-auto flex items-center justify-center">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-5 py-3.5 text-center">
                                        @if($car->is_available)
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 bg-gradient-to-r from-green-100 to-emerald-100 text-green-700 rounded-full text-xs font-bold tracking-wide border border-green-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse-ring"></span>
                                                Tersedia
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center gap-1.5 px-3 py-1 bg-gradient-to-r from-red-100 to-rose-100 text-red-700 rounded-full text-xs font-bold tracking-wide border border-red-200">
                                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                                Tidak Tersedia
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center justify-center gap-1.5">
                                            <a href="{{ route('admin.cars.edit', $car) }}"
                                                class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200 text-indigo-600 bg-purple-50 hover:bg-indigo-600 hover:text-white hover:shadow-lg relative">
                                                <span
                                                    class="absolute bottom-full left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs font-medium px-2 py-1 rounded-lg whitespace-nowrap opacity-0 pointer-events-none transition-opacity duration-200 hover:opacity-100 mb-1">Edit</span>
                                                <svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('admin.cars.destroy', $car) }}" method="POST"
                                                class="delete-form" data-car-name="{{ $car->name }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1.5 rounded-lg text-xs font-semibold transition-all duration-200 text-red-600 bg-red-50 hover:bg-red-600 hover:text-white hover:shadow-lg relative">
                                                    <span
                                                        class="absolute bottom-full left-1/2 -translate-x-1/2 bg-slate-800 text-white text-xs font-medium px-2 py-1 rounded-lg whitespace-nowrap opacity-0 pointer-events-none transition-opacity duration-200 hover:opacity-100 mb-1">Hapus</span>
                                                    <svg class="w-3.5 h-3.5 inline mr-1" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                                {{-- ─── EMPTY STATE ─── --}}
                                <tr>
                                    <td colspan="10">
                                        <div class="py-20 flex flex-col items-center justify-center text-center px-6">
                                            <div class="relative mb-6">
                                                <div
                                                    class="w-28 h-28 rounded-3xl bg-gradient-to-br from-slate-100 to-blue-50
                                                                                              flex items-center justify-center shadow-inner">
                                                    <svg class="w-14 h-14 text-gray-300" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.2"
                                                            d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="1.2"
                                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1" />
                                                    </svg>
                                                </div>
                                                {{-- Dekorasi --}}
                                                <span
                                                    class="absolute -top-2 -right-2 w-6 h-6 rounded-full bg-yellow-100 border-2 border-yellow-200"></span>
                                                <span
                                                    class="absolute -bottom-1 -left-3 w-4 h-4 rounded-full bg-blue-100 border-2 border-blue-200"></span>
                                            </div>

                                            <h3 class="text-lg font-bold text-gray-700 mb-1.5">
                                                @if(request()->hasAny(['search', 'transmission', 'status']))
                                                    Tidak ada hasil yang cocok
                                                @else
                                                    Belum ada data mobil
                                                @endif
                                            </h3>
                                            <p class="text-sm text-gray-400 max-w-xs mb-6">
                                                @if(request()->hasAny(['search', 'transmission', 'status']))
                                                    Coba ubah kata kunci pencarian atau reset filter di atas.
                                                @else
                                                    Mulai dengan menambahkan mobil pertama ke armada Anda.
                                                @endif
                                            </p>

                                            <div class="flex flex-wrap gap-3 justify-center">
                                                @if(request()->hasAny(['search', 'transmission', 'status']))
                                                    <a href="{{ route('admin.cars.index') }}"
                                                        class="relative inline-flex items-center gap-2 px-4 py-2.5 bg-white text-gray-700 border-2 border-gray-200 rounded-xl font-medium text-sm transition-all duration-200 hover:bg-gray-50 hover:border-gray-300 hover:-translate-y-0.5 hover:shadow-md">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                        </svg>
                                                        Reset Filter
                                                    </a>
                                                @endif
                                                <a href="{{ route('admin.cars.create') }}"
                                                    class="relative inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl font-semibold text-sm shadow-lg shadow-indigo-300 transition-all duration-200 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-indigo-400 active:translate-y-0 overflow-hidden">
                                                    <span
                                                        class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-violet-600 opacity-0 transition-opacity duration-250 hover:opacity-100"></span>
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2.5" d="M12 4v16m8-8H4" />
                                                    </svg>
                                                    <span>Tambah Mobil</span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if(isset($cars) && $cars->hasPages())
                    <div
                        class="px-6 py-4 border-t border-gray-100 bg-gray-50/60 flex flex-col sm:flex-row items-center justify-between gap-3">
                        {{ $cars->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>

    {{-- ═══════════════════════════════════════════════ --}}
    {{-- MODAL: Konfirmasi Hapus --}}
    {{-- ═══════════════════════════════════════════════ --}}
    <div id="deleteConfirmModal" class="fixed inset-0 z-50 hidden" role="dialog" aria-modal="true">
        <div id="deleteModalOverlay"
            class="absolute inset-0 bg-black/40 backdrop-blur-sm opacity-0 transition-opacity duration-300">
        </div>
        <div class="flex items-center justify-center min-h-screen p-4 relative z-10">
            <div id="deleteModalBox" class="bg-white rounded-2xl shadow-2xl max-w-sm w-full transform
                     transition-all duration-300 scale-90 opacity-0 overflow-hidden">

                {{-- Top accent --}}
                <div class="h-1.5 bg-gradient-to-r from-red-400 via-rose-500 to-red-400"></div>

                <div class="p-7">
                    {{-- Icon --}}
                    <div class="flex items-center justify-center w-16 h-16 mx-auto mb-5
                              rounded-2xl bg-red-50 border-2 border-red-100">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-center text-gray-900 mb-1.5">
                        Hapus Mobil?
                    </h3>
                    <p class="text-sm text-gray-500 text-center mb-1.5">
                        Anda akan menghapus
                    </p>
                    <p class="text-base font-semibold text-gray-800 text-center mb-1.5" id="deleteCarName"></p>
                    <p class="text-xs text-red-400 text-center mb-6">
                        ⚠️ Tindakan ini tidak dapat dibatalkan.
                    </p>

                    <div class="flex gap-3">
                        <button id="cancelDeleteBtn" class="flex-1 py-2.5 bg-gray-100 text-gray-700 rounded-xl
                                 font-semibold text-sm hover:bg-gray-200 transition-all duration-200
                                 active:scale-95 border border-gray-200">
                            Batal
                        </button>
                        <button id="confirmDeleteBtn" class="flex-1 py-2.5 bg-gradient-to-r from-red-500 to-rose-600
                                 text-white rounded-xl font-semibold text-sm
                                 hover:from-red-600 hover:to-rose-700
                                 transition-all duration-200 active:scale-95
                                 shadow-lg shadow-red-200">
                            Ya, Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════ --}}
    {{-- MODAL: Preview Gambar --}}
    {{-- ═══════════════════════════════════════════════ --}}
    <div id="imageModal" class="fixed inset-0 z-50 hidden" role="dialog">
        <div id="imageModalOverlay"
            class="absolute inset-0 bg-black/70 backdrop-blur-sm opacity-0 transition-opacity duration-300"
            onclick="closeImageModal()">
        </div>
        <div class="flex items-center justify-center min-h-screen p-6 relative z-10">
            <div id="imageModalBox"
                class="relative max-w-lg w-full transform transition-all duration-300 scale-90 opacity-0">
                <button onclick="closeImageModal()" class="absolute -top-3 -right-3 z-20 w-8 h-8 bg-white rounded-full
                         flex items-center justify-center shadow-lg
                         hover:bg-gray-100 transition-colors">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <img id="imageModalSrc" src="" alt="" class="w-full rounded-2xl shadow-2xl object-cover max-h-96">
                <p id="imageModalLabel" class="text-center text-white text-sm font-medium mt-3 opacity-80"></p>
            </div>
        </div>
    </div>

    {{-- ═══════════════════════════════════════════════ --}}
    {{-- SCRIPT --}}
    {{-- ═══════════════════════════════════════════════ --}}
    <script>
        (function () {
            'use strict';

            /* ── DOM Cache ── */
            const modal = document.getElementById('deleteConfirmModal');
            const modalOverlay = document.getElementById('deleteModalOverlay');
            const modalBox = document.getElementById('deleteModalBox');
            const carNameEl = document.getElementById('deleteCarName');
            const cancelBtn = document.getElementById('cancelDeleteBtn');
            const confirmBtn = document.getElementById('confirmDeleteBtn');

            const imgModal = document.getElementById('imageModal');
            const imgOverlay = document.getElementById('imageModalOverlay');
            const imgBox = document.getElementById('imageModalBox');
            const imgSrc = document.getElementById('imageModalSrc');
            const imgLabel = document.getElementById('imageModalLabel');

            let activeForm = null;

            /* ── Delete Modal ── */
            function openDeleteModal(form) {
                activeForm = form;
                carNameEl.textContent = form.dataset.carName;
                modal.classList.remove('hidden');
                requestAnimationFrame(() => {
                    modalOverlay.classList.add('opacity-100');
                    modalBox.classList.remove('scale-90', 'opacity-0');
                    modalBox.classList.add('scale-100', 'opacity-100');
                });
            }

            function closeDeleteModal() {
                modalBox.classList.remove('scale-100', 'opacity-100');
                modalBox.classList.add('scale-90', 'opacity-0');
                modalOverlay.classList.remove('opacity-100');
                setTimeout(() => {
                    modal.classList.add('hidden');
                    activeForm = null;
                }, 280);
            }

            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', e => { e.preventDefault(); openDeleteModal(form); });
            });

            cancelBtn.addEventListener('click', closeDeleteModal);
            modalOverlay.addEventListener('click', closeDeleteModal);
            confirmBtn.addEventListener('click', () => { if (activeForm) activeForm.submit(); });

            /* ── Image Modal ── */
            window.openImageModal = function (src, name) {
                imgSrc.src = src;
                imgLabel.textContent = name;
                imgModal.classList.remove('hidden');
                requestAnimationFrame(() => {
                    imgOverlay.classList.add('opacity-100');
                    imgBox.classList.remove('scale-90', 'opacity-0');
                    imgBox.classList.add('scale-100', 'opacity-100');
                });
            };

            window.closeImageModal = function () {
                imgBox.classList.remove('scale-100', 'opacity-100');
                imgBox.classList.add('scale-90', 'opacity-0');
                imgOverlay.classList.remove('opacity-100');
                setTimeout(() => { imgModal.classList.add('hidden'); imgSrc.src = ''; }, 280);
            };

            /* ── Keyboard shortcuts ── */
            document.addEventListener('keydown', e => {
                if (e.key === 'Escape') {
                    if (!modal.classList.contains('hidden')) closeDeleteModal();
                    if (!imgModal.classList.contains('hidden')) closeImageModal();
                }
            });

            /* ── Refresh button spin ── */
            const refreshBtn = document.getElementById('refreshBtn');
            const refreshIcon = document.getElementById('refreshIcon');
            if (refreshBtn) {
                refreshBtn.addEventListener('click', () => {
                    refreshIcon.style.transition = 'transform .6s ease';
                    refreshIcon.style.transform = 'rotate(360deg)';
                    setTimeout(() => { refreshIcon.style.transform = ''; }, 700);
                });
            }

            /* ── Row hover: subtle lift via inline style (performance-safe) ── */
            document.querySelectorAll('.table-row').forEach(row => {
                row.addEventListener('mouseenter', () => { row.style.boxShadow = '0 2px 12px rgba(99,102,241,.07)'; });
                row.addEventListener('mouseleave', () => { row.style.boxShadow = ''; });
            });

        })();
    </script>

</x-admin-layout>