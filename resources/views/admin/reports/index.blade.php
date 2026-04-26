<x-admin-layout>

{{-- ═══════════════════════════════════════════════
     HEADER SLOT
═══════════════════════════════════════════════ --}}
<x-slot name="header">
    <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-blue-500 to-indigo-600
                    flex items-center justify-center shadow-md shadow-blue-200">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586
                         a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900 tracking-tight">Laporan Transaksi</h2>
            <p class="text-sm text-gray-400 mt-0.5">Generate & unduh laporan PDF periode tertentu</p>
        </div>
    </div>
</x-slot>

{{-- ═══════════════════════════════════════════════
     PAGE WRAPPER
═══════════════════════════════════════════════ --}}
<div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8"
     style="background: linear-gradient(135deg,#f0f4ff 0%,#f8faff 50%,#f0fdf8 100%);">
<div class="max-w-7xl mx-auto space-y-8">

    {{-- ─────────────────────────────────────────
         STAT CARDS ROW
    ───────────────────────────────────────── --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

        {{-- Total Booking --}}
        <div class="group relative bg-white/80 backdrop-blur-sm rounded-2xl p-5
                    border border-white shadow-lg shadow-blue-100/40
                    hover:shadow-xl hover:shadow-blue-200/50 hover:-translate-y-1
                    transition-all duration-300 overflow-hidden">
            {{-- Top accent bar --}}
            <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-blue-500 to-indigo-500
                        rounded-t-2xl"></div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100
                            flex items-center justify-center
                            group-hover:from-blue-100 group-hover:to-blue-200 transition-all duration-300">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0
                                 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Booking</p>
                    <p class="text-2xl font-extrabold text-slate-800 leading-none mt-0.5"
                       id="totalBookings">–</p>
                </div>
            </div>
            {{-- Decorative blob --}}
            <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full
                        bg-blue-50 opacity-60 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        {{-- Total Omzet --}}
        <div class="group relative bg-white/80 backdrop-blur-sm rounded-2xl p-5
                    border border-white shadow-lg shadow-emerald-100/40
                    hover:shadow-xl hover:shadow-emerald-200/50 hover:-translate-y-1
                    transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-emerald-400 to-teal-500
                        rounded-t-2xl"></div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-50 to-emerald-100
                            flex items-center justify-center
                            group-hover:from-emerald-100 group-hover:to-emerald-200 transition-all duration-300">
                    <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3
                                 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11
                                 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Total Omzet</p>
                    <p class="text-2xl font-extrabold text-slate-800 leading-none mt-0.5"
                       id="totalRevenue">Rp –</p>
                </div>
            </div>
            <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full
                        bg-emerald-50 opacity-60 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        {{-- Mobil Aktif --}}
        <div class="group relative bg-white/80 backdrop-blur-sm rounded-2xl p-5
                    border border-white shadow-lg shadow-purple-100/40
                    hover:shadow-xl hover:shadow-purple-200/50 hover:-translate-y-1
                    transition-all duration-300 overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-0.5 bg-gradient-to-r from-purple-500 to-violet-500
                        rounded-t-2xl"></div>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-purple-50 to-purple-100
                            flex items-center justify-center
                            group-hover:from-purple-100 group-hover:to-purple-200 transition-all duration-300">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857
                                 M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002
                                 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Mobil Aktif</p>
                    <p class="text-2xl font-extrabold text-slate-800 leading-none mt-0.5">
                        {{ \App\Models\Car::where('is_available', true)->count() }}
                    </p>
                </div>
            </div>
            <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full
                        bg-purple-50 opacity-60 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

    </div>{{-- /stat cards --}}

    {{-- ─────────────────────────────────────────
         MAIN GRID  (Form | Guide)
    ───────────────────────────────────────── --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- ══════════════════════════════════
             LEFT — FORM CARD
        ══════════════════════════════════ --}}
        <div class="lg:col-span-1">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl shadow-slate-200/40
                        border border-white overflow-hidden
                        transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">

                {{-- Card header gradient --}}
                <div class="relative bg-gradient-to-r from-blue-600 via-blue-600 to-indigo-600 px-6 py-5 overflow-hidden">
                    {{-- Decorative circles --}}
                    <div class="absolute -top-4 -right-4 w-24 h-24 rounded-full bg-white/10"></div>
                    <div class="absolute -bottom-6 -left-2 w-20 h-20 rounded-full bg-white/5"></div>
                    <div class="relative">
                        <div class="flex items-center gap-2.5 mb-1">
                            <div class="w-6 h-6 rounded-lg bg-white/20 flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h2 class="text-base font-bold text-white">Pilih Periode Laporan</h2>
                        </div>
                        <p class="text-xs text-blue-100">Tentukan rentang tanggal untuk laporan</p>
                    </div>
                </div>

                {{-- Form body --}}
                <form action="{{ route('admin.reports.download') }}"
                      method="GET" class="p-6 space-y-5" id="reportForm">
                    @csrf

                    {{-- Start Date --}}
                    <div class="space-y-1.5">
                        <label for="start_date"
                               class="flex items-center gap-1.5 text-sm font-semibold text-slate-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500 inline-block"></span>
                            Tanggal Mulai
                        </label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400 group-focus-within/input:text-blue-500
                                            transition-colors duration-200"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0
                                             00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" id="start_date" name="start_date" required
                                   value="{{ date('Y-m-01') }}"
                                   class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl
                                          bg-slate-50 hover:bg-white text-slate-800 text-sm
                                          focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                          focus:bg-white transition-all duration-200 outline-none">
                        </div>
                    </div>

                    {{-- End Date --}}
                    <div class="space-y-1.5">
                        <label for="end_date"
                               class="flex items-center gap-1.5 text-sm font-semibold text-slate-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-500 inline-block"></span>
                            Tanggal Akhir
                        </label>
                        <div class="relative group/input">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-slate-400 group-focus-within/input:text-blue-500
                                            transition-colors duration-200"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0
                                             00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <input type="date" id="end_date" name="end_date" required
                                   value="{{ date('Y-m-d') }}"
                                   class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl
                                          bg-slate-50 hover:bg-white text-slate-800 text-sm
                                          focus:ring-2 focus:ring-blue-500/30 focus:border-blue-500
                                          focus:bg-white transition-all duration-200 outline-none">
                        </div>
                    </div>

                    {{-- Validation error --}}
                    <div id="dateError"
                         class="hidden items-center gap-2 p-3 bg-red-50 border border-red-200
                                rounded-xl text-red-600 text-xs font-medium">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0
                                     001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                        </svg>
                        Tanggal akhir harus lebih besar dari tanggal mulai
                    </div>

                    {{-- Quick Date Presets --}}
                    <div class="space-y-2">
                        <label class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">
                            Pilihan Cepat
                        </label>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach([
  ['preset' => 'today', 'label' => '📅 Hari Ini', 'color' => 'blue'],
  ['preset' => 'week', 'label' => '📆 7 Hari', 'color' => 'indigo'],
  ['preset' => 'month', 'label' => '🗓️ Bulan Ini', 'color' => 'violet'],
  ['preset' => 'lastmonth', 'label' => '⏮️ Bulan Lalu', 'color' => 'purple'],
] as $p)
                            <button type="button"
                                    onclick="setDatePreset('{{ $p['preset'] }}')"
                                    class="preset-btn px-3 py-2 text-xs font-semibold rounded-xl
                                           bg-slate-100 text-slate-600
                                           hover:bg-blue-50 hover:text-blue-700 hover:border-blue-200
                                           border border-transparent
                                           active:scale-95 transition-all duration-150">
                                {{ $p['label'] }}
                            </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- Divider --}}
                    <div class="border-t border-dashed border-slate-200"></div>

                    {{-- Download Button --}}
                    <button type="submit" id="downloadBtn"
                            class="group relative w-full px-6 py-3.5
                                   bg-gradient-to-r from-blue-600 to-indigo-600
                                   text-white text-sm font-bold rounded-xl
                                   shadow-lg shadow-blue-500/30
                                   hover:shadow-xl hover:shadow-blue-500/40
                                   hover:-translate-y-0.5
                                   active:scale-95 active:translate-y-0
                                   transition-all duration-200
                                   disabled:opacity-60 disabled:cursor-not-allowed
                                   disabled:hover:translate-y-0 overflow-hidden">
                        {{-- Shimmer overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-blue-600
                                    opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        {{-- Moving shine --}}
                        <div class="absolute inset-0 -translate-x-full group-hover:translate-x-full
                                    bg-gradient-to-r from-transparent via-white/20 to-transparent
                                    transition-transform duration-700 ease-in-out"></div>

                        <span class="relative z-10 flex items-center justify-center gap-2">
                            {{-- Default icon --}}
                            <svg id="btnIcon" class="w-4 h-4 transition-transform group-hover:-translate-y-0.5"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2
                                         h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z" />
                            </svg>
                            <span id="btnText">Unduh Laporan PDF</span>
                        </span>
                    </button>

                </form>
            </div>
        </div>{{-- /form col --}}

        {{-- ══════════════════════════════════
             RIGHT — GUIDE CARD
        ══════════════════════════════════ --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Guide / How-to card --}}
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl shadow-slate-200/40
                        border border-white overflow-hidden">

                {{-- Card header --}}
                <div class="px-6 py-4 border-b border-slate-100 flex items-center gap-2.5">
                    <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-slate-100 to-slate-200
                                flex items-center justify-center">
                        <svg class="w-4 h-4 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-bold text-slate-800 text-sm">Panduan Penggunaan</h3>
                    <span class="ml-auto text-[11px] font-semibold text-slate-400 bg-slate-100
                                 px-2 py-0.5 rounded-full">3 langkah</span>
                </div>

                <div class="p-6">
                    <div class="space-y-4">

                        {{-- Step 1 --}}
                        <div class="group flex items-start gap-4 p-4 rounded-2xl
                                    bg-gradient-to-r from-blue-50 to-blue-50/30
                                    border border-blue-100/50
                                    hover:border-blue-200 hover:from-blue-50 hover:to-indigo-50/40
                                    hover:-translate-y-0.5 transition-all duration-200">
                            <div class="flex-shrink-0 w-9 h-9 rounded-xl
                                        bg-gradient-to-br from-blue-500 to-indigo-500
                                        flex items-center justify-center
                                        text-white text-sm font-extrabold
                                        shadow-md shadow-blue-200
                                        group-hover:shadow-lg group-hover:shadow-blue-300
                                        transition-shadow duration-200">
                                1
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-slate-800 text-sm">Pilih Rentang Tanggal</h4>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                                    Tentukan tanggal mulai dan tanggal akhir untuk periode laporan
                                    yang ingin dihasilkan. Gunakan pilihan cepat untuk kemudahan.
                                </p>
                            </div>
                            <svg class="w-4 h-4 text-blue-300 group-hover:text-blue-400 shrink-0 mt-0.5
                                        transition-colors duration-200"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                        {{-- Step 2 --}}
                        <div class="group flex items-start gap-4 p-4 rounded-2xl
                                    bg-gradient-to-r from-emerald-50 to-emerald-50/30
                                    border border-emerald-100/50
                                    hover:border-emerald-200 hover:from-emerald-50 hover:to-teal-50/40
                                    hover:-translate-y-0.5 transition-all duration-200">
                            <div class="flex-shrink-0 w-9 h-9 rounded-xl
                                        bg-gradient-to-br from-emerald-500 to-teal-500
                                        flex items-center justify-center
                                        text-white text-sm font-extrabold
                                        shadow-md shadow-emerald-200
                                        group-hover:shadow-lg group-hover:shadow-emerald-300
                                        transition-shadow duration-200">
                                2
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-slate-800 text-sm">Klik Unduh Laporan</h4>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                                    Sistem akan secara otomatis men-generate file PDF yang berisi
                                    seluruh data transaksi pada periode yang dipilih.
                                </p>
                            </div>
                            <svg class="w-4 h-4 text-emerald-300 group-hover:text-emerald-400 shrink-0 mt-0.5
                                        transition-colors duration-200"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                        {{-- Step 3 --}}
                        <div class="group flex items-start gap-4 p-4 rounded-2xl
                                    bg-gradient-to-r from-purple-50 to-purple-50/30
                                    border border-purple-100/50
                                    hover:border-purple-200 hover:from-purple-50 hover:to-violet-50/40
                                    hover:-translate-y-0.5 transition-all duration-200">
                            <div class="flex-shrink-0 w-9 h-9 rounded-xl
                                        bg-gradient-to-br from-purple-500 to-violet-500
                                        flex items-center justify-center
                                        text-white text-sm font-extrabold
                                        shadow-md shadow-purple-200
                                        group-hover:shadow-lg group-hover:shadow-purple-300
                                        transition-shadow duration-200">
                                3
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-semibold text-slate-800 text-sm">File PDF Siap Digunakan</h4>
                                <p class="text-xs text-slate-500 mt-1 leading-relaxed">
                                    File laporan akan otomatis terunduh ke perangkat Anda dan siap
                                    untuk dibagikan atau dicetak kapan saja.
                                </p>
                            </div>
                            <svg class="w-4 h-4 text-purple-300 group-hover:text-purple-400 shrink-0 mt-0.5
                                        transition-colors duration-200"
                                 fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 5l7 7-7 7" />
                            </svg>
                        </div>

                    </div>
                </div>

                {{-- PDF Preview Banner — klik untuk download --}}
                <button type="submit" form="reportForm"
                        class="w-full mx-0 rounded-2xl overflow-hidden
                              bg-gradient-to-br from-slate-800 to-slate-900
                              p-5 flex items-center gap-5
                              hover:from-slate-700 hover:to-slate-800
                              active:scale-[0.99] transition-all duration-200
                              group cursor-pointer border-0">

                    <div class="shrink-0 w-14 h-14 rounded-xl bg-red-500/20 border border-red-400/30
                                flex items-center justify-center
                                group-hover:bg-red-500/30 transition-colors duration-200">
                        <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0
                                    0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>

                    <div class="flex-1 min-w-0 text-left">
                        <p class="text-white font-semibold text-sm">Laporan Transaksi.pdf</p>
                        <p class="text-slate-400 text-xs mt-0.5">
                            Format: PDF • Data booking, omzet & detail pelanggan
                        </p>
                        <div class="flex items-center gap-2 mt-2">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full
                                        bg-emerald-500/20 border border-emerald-400/30
                                        text-emerald-400 text-[11px] font-semibold">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                                Siap diunduh
                            </span>
                        </div>
                    </div>

                    {{-- Klik hint --}}
                    <div class="shrink-0 flex flex-col items-center gap-1">
                        <svg class="w-5 h-5 text-slate-400 group-hover:text-white
                                    group-hover:-translate-y-0.5 transition-all duration-200"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span class="text-[10px] text-slate-500 group-hover:text-slate-300
                                    transition-colors duration-200">Klik</span>
                    </div>

                </button>

            </div>{{-- /guide card --}}

        </div>{{-- /right col --}}

    </div>{{-- /main grid --}}

</div>{{-- /max-w --}}
</div>{{-- /wrapper --}}

{{-- ═══════════════════════════════════════════════
     SCRIPTS
═══════════════════════════════════════════════ --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const startDate  = document.getElementById('start_date');
    const endDate    = document.getElementById('end_date');
    const dateError  = document.getElementById('dateError');
    const reportForm = document.getElementById('reportForm');
    const downloadBtn = document.getElementById('downloadBtn');
    const btnText    = document.getElementById('btnText');
    const btnIcon    = document.getElementById('btnIcon');

    /* ── Preset active state ── */
    const presetBtns = document.querySelectorAll('.preset-btn');
    function clearPresets() {
        presetBtns.forEach(b => {
            b.classList.remove('bg-blue-100', 'text-blue-700', 'border-blue-300');
            b.classList.add('bg-slate-100', 'text-slate-600', 'border-transparent');
        });
    }
    presetBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            clearPresets();
            btn.classList.add('bg-blue-100', 'text-blue-700', 'border-blue-300');
            btn.classList.remove('bg-slate-100', 'text-slate-600', 'border-transparent');
        });
    });

    /* ── Date validation ── */
    startDate.addEventListener('change', () => { clearPresets(); validateDates(); });
    endDate.addEventListener('change',   () => { clearPresets(); validateDates(); });

    function validateDates() {
        if (new Date(endDate.value) < new Date(startDate.value)) {
            dateError.classList.remove('hidden');
            dateError.classList.add('flex');
            downloadBtn.disabled = true;
            return false;
        } else {
            dateError.classList.add('hidden');
            dateError.classList.remove('flex');
            downloadBtn.disabled = false;
            return true;
        }
    }

    /* ── Date preset handler ── */
    window.setDatePreset = function (preset) {
        const today = new Date();
        let start   = new Date();

        switch (preset) {
            case 'today':
                start = new Date();
                break;
            case 'week':
                start.setDate(today.getDate() - 7);
                break;
            case 'month':
                start = new Date(today.getFullYear(), today.getMonth(), 1);
                break;
            case 'lastmonth':
                start = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                const lastDay = new Date(today.getFullYear(), today.getMonth(), 0);
                endDate.value = lastDay.toISOString().split('T')[0];
                break;
        }

        startDate.value = start.toISOString().split('T')[0];
        if (preset !== 'lastmonth') {
            endDate.value = today.toISOString().split('T')[0];
        }
        validateDates();
    };

    /* ── Form submit – loading state ── */
    reportForm.addEventListener('submit', function (e) {
        if (!validateDates()) {
            e.preventDefault();
            return;
        }

        downloadBtn.disabled = true;

        // Swap to spinner
        btnIcon.innerHTML = `
            <circle class="opacity-25" cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>`;
        btnIcon.setAttribute('viewBox', '0 0 24 24');
        btnIcon.classList.add('animate-spin');

        btnText.textContent = 'Generating PDF...';

        // Re-enable after 8s fallback
        setTimeout(() => {
            downloadBtn.disabled = false;
            btnIcon.classList.remove('animate-spin');
            btnIcon.innerHTML = `
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2
                         h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z" />`;
            btnText.textContent = 'Unduh Laporan PDF';
        }, 8000);
    });

});
</script>
@endpush

</x-admin-layout>