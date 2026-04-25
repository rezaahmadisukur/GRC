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

    {{-- Inline styles untuk animasi & custom styling --}}
    <style>
        /* ── Animasi & Transisi ── */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(59, 130, 246, .4);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(59, 130, 246, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(59, 130, 246, 0);
            }
        }

        @keyframes rowSlideIn {
            from {
                opacity: 0;
                transform: translateX(-8px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp .45s ease both;
        }

        .delay-1 {
            animation-delay: .05s;
        }

        .delay-2 {
            animation-delay: .10s;
        }

        .delay-3 {
            animation-delay: .15s;
        }

        /* ── Kartu & Panel ── */
        .glass-card {
            background: rgba(255, 255, 255, .85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, .6);
        }

        /* ── Tombol Utama ── */
        .btn-primary {
            position: relative;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .6rem 1.25rem;
            background: linear-gradient(135deg, #3b82f6, #4f46e5);
            color: #fff;
            border-radius: .75rem;
            font-weight: 600;
            font-size: .875rem;
            transition: transform .2s, box-shadow .2s;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(79, 70, 229, .35);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            opacity: 0;
            transition: opacity .25s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(79, 70, 229, .45);
        }

        .btn-primary:hover::before {
            opacity: 1;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary span {
            position: relative;
            z-index: 1;
        }

        .btn-primary svg {
            position: relative;
            z-index: 1;
        }

        /* ── Tombol Sekunder ── */
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .6rem 1.1rem;
            background: #fff;
            color: #374151;
            border: 1.5px solid #e5e7eb;
            border-radius: .75rem;
            font-weight: 500;
            font-size: .875rem;
            transition: all .2s;
        }

        .btn-secondary:hover {
            background: #f9fafb;
            border-color: #d1d5db;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
        }

        /* ── Input / Select ── */
        .form-input {
            width: 100%;
            padding: .6rem 1rem;
            background: #fff;
            border: 1.5px solid #e5e7eb;
            border-radius: .75rem;
            font-size: .875rem;
            color: #374151;
            transition: border-color .2s, box-shadow .2s;
            outline: none;
        }

        .form-input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .15);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        /* ── Baris Tabel ── */
        .table-row {
            transition: background .2s, transform .15s;
            animation: rowSlideIn .35s ease both;
        }

        .table-row:hover {
            background: linear-gradient(90deg, #f0f4ff, #fafafa);
        }

        /* ── Badge Status ── */
        .badge-available {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .25rem .75rem;
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            color: #15803d;
            border-radius: 9999px;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .04em;
            border: 1px solid #86efac;
        }

        .badge-unavailable {
            display: inline-flex;
            align-items: center;
            gap: .35rem;
            padding: .25rem .75rem;
            background: linear-gradient(135deg, #fee2e2, #fecaca);
            color: #dc2626;
            border-radius: 9999px;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .04em;
            border: 1px solid #fca5a5;
        }

        .badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            animation: pulse-ring 2s infinite;
        }

        .badge-available .badge-dot {
            background: #16a34a;
        }

        .badge-unavailable .badge-dot {
            background: #dc2626;
            animation: none;
        }

        /* ── Gambar Mobil ── */
        .car-thumb {
            width: 2.75rem;
            height: 2.75rem;
            border-radius: .625rem;
            object-fit: cover;
            border: 2px solid #e5e7eb;
            transition: transform .2s, box-shadow .2s;
            cursor: pointer;
        }

        .car-thumb:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(0, 0, 0, .15);
        }

        /* ── Aksi Tombol Edit/Hapus ── */
        .action-btn {
            padding: .35rem .75rem;
            border-radius: .5rem;
            font-size: .78rem;
            font-weight: 600;
            transition: all .2s;
        }

        .action-edit {
            color: #4f46e5;
            background: #ede9fe;
        }

        .action-edit:hover {
            background: #4f46e5;
            color: #fff;
            box-shadow: 0 4px 12px rgba(79, 70, 229, .3);
        }

        .action-delete {
            color: #dc2626;
            background: #fee2e2;
        }

        .action-delete:hover {
            background: #dc2626;
            color: #fff;
            box-shadow: 0 4px 12px rgba(220, 38, 38, .3);
        }

        /* ── Header Tabel ── */
        .th-cell {
            padding: .875rem 1.25rem;
            font-size: .7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .07em;
            color: #6b7280;
            white-space: nowrap;
        }

        /* ── Nomor Baris ── */
        .row-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 1.75rem;
            height: 1.75rem;
            background: linear-gradient(135deg, #ede9fe, #dbeafe);
            color: #4f46e5;
            border-radius: .5rem;
            font-size: .75rem;
            font-weight: 700;
        }

        /* ── Skeleton Loading ── */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.4s infinite;
            border-radius: .5rem;
        }

        /* ── Plat Nomor ── */
        .plate-badge {
            display: inline-block;
            padding: .2rem .6rem;
            background: #1e293b;
            color: #fbbf24;
            border-radius: .4rem;
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .06em;
        }

        /* ── Transmisi Badge ── */
        .trans-at {
            display: inline-block;
            padding: .2rem .55rem;
            background: #dbeafe;
            color: #1d4ed8;
            border-radius: .4rem;
            font-size: .72rem;
            font-weight: 700;
        }

        .trans-mt {
            display: inline-block;
            padding: .2rem .55rem;
            background: #fef9c3;
            color: #854d0e;
            border-radius: .4rem;
            font-size: .72rem;
            font-weight: 700;
        }

        /* ── Harga ── */
        .price-cell {
            font-weight: 600;
            color: #065f46;
            font-size: .82rem;
        }

        /* ── Stats Card ── */
        .stat-card {
            background: #fff;
            border: 1.5px solid #f1f5f9;
            border-radius: 1rem;
            padding: 1rem 1.25rem;
            display: flex;
            align-items: center;
            gap: .875rem;
            transition: transform .2s, box-shadow .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, .08);
        }

        /* ── Warna Dot ── */
        .color-dot {
            display: inline-block;
            width: .75rem;
            height: .75rem;
            border-radius: 50%;
            border: 1.5px solid rgba(0, 0, 0, .1);
            vertical-align: middle;
            margin-right: .35rem;
        }

        /* ── Scrollbar ── */
        .custom-scroll::-webkit-scrollbar {
            height: 5px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 9999px;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 9999px;
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* ── Search icon wrapper ── */
        .search-wrapper {
            position: relative;
        }

        .search-wrapper .search-icon {
            position: absolute;
            left: .75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
        }

        .search-wrapper .form-input {
            padding-left: 2.5rem;
        }

        /* ── Tooltip ── */
        .tooltip-wrap {
            position: relative;
        }

        .tooltip-wrap .tooltip-label {
            position: absolute;
            bottom: 110%;
            left: 50%;
            transform: translateX(-50%);
            background: #1e293b;
            color: #fff;
            font-size: .7rem;
            font-weight: 500;
            padding: .25rem .6rem;
            border-radius: .4rem;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity .2s;
        }

        .tooltip-wrap:hover .tooltip-label {
            opacity: 1;
        }
    </style>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ════════════════════════════════════════ --}}
            {{-- STAT CARDS --}}
            {{-- ════════════════════════════════════════ --}}
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 fade-in-up">

                {{-- Total --}}
                <div class="stat-card">
                    <div class="p-2.5 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600 shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0zM13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Total Mobil</p>
                        <p class="text-xl font-bold text-gray-800">{{ $cars->total() }}</p>
                    </div>
                </div>

                {{-- Tersedia --}}
                <div class="stat-card">
                    <div class="p-2.5 rounded-xl bg-gradient-to-br from-emerald-400 to-teal-500 shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Tersedia</p>
                        <p class="text-xl font-bold text-emerald-600">
                            {{ $cars->getCollection()->where('is_available', true)->count() }}
                        </p>
                    </div>
                </div>

                {{-- Tidak Tersedia --}}
                <div class="stat-card">
                    <div class="p-2.5 rounded-xl bg-gradient-to-br from-rose-400 to-red-500 shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Tidak Tersedia</p>
                        <p class="text-xl font-bold text-rose-600">
                            {{ $cars->getCollection()->where('is_available', false)->count() }}
                        </p>
                    </div>
                </div>

                {{-- Halaman --}}
                <div class="stat-card">
                    <div class="p-2.5 rounded-xl bg-gradient-to-br from-violet-400 to-purple-600 shrink-0">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Halaman</p>
                        <p class="text-xl font-bold text-violet-600">{{ $cars->currentPage() }} /
                            {{ $cars->lastPage() }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- ════════════════════════════════════════ --}}
            {{-- TOOLBAR: Tambah + Refresh --}}
            {{-- ════════════════════════════════════════ --}}
            <div class="flex flex-wrap justify-between items-center gap-3 fade-in-up delay-1">
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.cars.create') }}" class="btn-primary">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                d="M12 4v16m8-8H4" />
                        </svg>
                        <span>Tambah Mobil Baru</span>
                    </a>

                    <button onclick="window.location.reload()" class="btn-secondary tooltip-wrap" id="refreshBtn">
                        <span class="tooltip-label">Muat Ulang</span>
                        <svg id="refreshIcon" class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span class="text-gray-600">Refresh</span>
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
                class="glass-card rounded-2xl shadow-sm p-5 fade-in-up delay-2">

                <div class="flex items-center gap-2 mb-4">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z" />
                    </svg>
                    <span class="text-sm font-semibold text-gray-600">Filter & Pencarian</span>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">

                    {{-- Search --}}
                    <div class="search-wrapper lg:col-span-1">
                        <svg class="search-icon w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0" />
                        </svg>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari nama, plat, warna..." class="form-input" autocomplete="off">
                    </div>

                    {{-- Transmisi --}}
                    <div>
                        <select name="transmission" class="form-input">
                            <option value="">🔧 Semua Transmisi</option>
                            <option value="AT" {{ request('transmission') == 'AT' ? 'selected' : '' }}>⚡ Automatic (AT)
                            </option>
                            <option value="MT" {{ request('transmission') == 'MT' ? 'selected' : '' }}>🔩 Manual (MT)
                            </option>
                        </select>
                    </div>

                    {{-- Status --}}
                    <div>
                        <select name="status" class="form-input">
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
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden fade-in-up delay-3">

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

                <div class="overflow-x-auto custom-scroll">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gradient-to-r from-slate-50 to-gray-50 border-b border-gray-100">
                                <th class="th-cell text-left w-12">#</th>
                                <th class="th-cell text-left">Nama Mobil</th>
                                <th class="th-cell text-left">Plat</th>
                                <th class="th-cell text-left">Warna</th>
                                <th class="th-cell text-left">Transmisi</th>
                                <th class="th-cell text-right">Harga 12 Jam</th>
                                <th class="th-cell text-right">Harga 24 Jam</th>
                                <th class="th-cell text-center">Foto</th>
                                <th class="th-cell text-center">Status</th>
                                <th class="th-cell text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($cars as $car)
                                <tr class="table-row" style="animation-delay: {{ $loop->index * 0.04 }}s">

                                    {{-- No --}}
                                    <td class="px-5 py-3.5">
                                        <span class="row-number">
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
                                        <span class="plate-badge p">{{ $car->plate_code }}</span>
                                    </td>

                                    {{-- Warna --}}
                                    <td class="px-5 py-3.5 text-sm text-gray-600">
                                        <span class="color-dot"
                                            style="background-color: {{ strtolower($car->color) }};"></span>
                                        {{ $car->color }}
                                    </td>

                                    {{-- Transmisi --}}
                                    <td class="px-5 py-3.5">
                                        @if($car->transmission === 'AT')
                                            <span class="trans-at">AT</span>
                                        @else
                                            <span class="trans-mt">MT</span>
                                        @endif
                                    </td>

                                    {{-- Harga 12 Jam --}}
                                    <td class="px-5 py-3.5 text-right">
                                        <span class="price-cell">
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
                                                class="car-thumb mx-auto" loading="lazy"
                                                onclick="openImageModal(this.src, '{{ $car->name }}')"
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
                                            <span class="badge-available">
                                                <span class="badge-dot"></span>
                                                Tersedia
                                            </span>
                                        @else
                                            <span class="badge-unavailable">
                                                <span class="badge-dot"></span>
                                                Tidak Tersedia
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="px-5 py-3.5">
                                        <div class="flex items-center justify-center gap-1.5">
                                            <a href="{{ route('admin.cars.edit', $car) }}"
                                                class="action-btn action-edit tooltip-wrap">
                                                <span class="tooltip-label">Edit</span>
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
                                                <button type="submit" class="action-btn action-delete tooltip-wrap">
                                                    <span class="tooltip-label">Hapus</span>
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
                                                <div class="w-28 h-28 rounded-3xl bg-gradient-to-br from-slate-100 to-blue-50
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
                                                    <a href="{{ route('admin.cars.index') }}" class="btn-secondary text-sm">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                                        </svg>
                                                        Reset Filter
                                                    </a>
                                                @endif
                                                <a href="{{ route('admin.cars.create') }}" class="btn-primary">
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
                    <div class="px-6 py-4 border-t border-gray-100 flex flex-col sm:flex-row
                              items-center justify-between gap-3">
                        <p class="text-xs text-gray-400">
                            Halaman {{ $cars->currentPage() }} dari {{ $cars->lastPage() }}
                        </p>
                        <div class="pagination-wrapper">
                            {{ $cars->appends(request()->query())->links() }}
                        </div>
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