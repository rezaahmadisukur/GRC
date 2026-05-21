{{-- resources/views/components/cars/filter-form.blade.php --}}

@php
    $hasActiveFilters = request('search') || request('category') || 
                        request('seats') || request('transmission') || 
                        request('fuel_type');
    
    $activeCount = collect([
        request('search'), request('category'), request('seats'),
        request('transmission'), request('fuel_type')
    ])->filter()->count();
@endphp

<div class="mb-6 animate-slideUp" x-data="{ sheetOpen: false }">

    {{-- ============================================================
         MOBILE: Trigger Bar + Bottom Sheet (< sm)
    ============================================================ --}}
    <div class="sm:hidden">

        {{-- Trigger Bar --}}
        <div class="bg-white/90 backdrop-blur-xl rounded-2xl shadow-lg shadow-blue-900/10 
                    border border-blue-100 p-3">
            <div class="flex items-center gap-2">

                {{-- Search Input (selalu visible) --}}
                <form method="GET" action="{{ route('cars.index') }}" 
                      id="mobileSearchForm" class="flex-1">
                    @foreach(['category','seats','transmission','fuel_type'] as $f)
                        @if(request($f))
                            <input type="hidden" name="{{ $f }}" value="{{ request($f) }}">
                        @endif
                    @endforeach

                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari mobil..."
                            class="w-full pl-9 pr-3 py-2.5 bg-gray-50 border border-gray-200 
                                   rounded-xl text-sm text-gray-900 placeholder-gray-400
                                   focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 
                                   focus:bg-white transition-all">
                    </div>
                </form>

                {{-- Filter Button (trigger bottom sheet) --}}
                <button @click="sheetOpen = true" type="button"
                    class="relative flex-shrink-0 flex items-center gap-1.5 px-3.5 py-2.5 
                           rounded-xl font-semibold text-sm transition-all duration-200
                           {{ $hasActiveFilters 
                               ? 'bg-blue-600 text-white shadow-lg shadow-blue-600/30 border-2 border-blue-600' 
                               : 'bg-white border-2 border-gray-200 text-gray-700 hover:border-blue-300' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L13 13.414V19a1 1 0 01-.553.894l-4 2A1 1 0 017 21v-7.586L3.293 6.707A1 1 0 013 6V4z"/>
                    </svg>
                    Filter
                    {{-- Badge count --}}
                    @if($activeCount > 0)
                        <span class="absolute -top-1.5 -right-1.5 min-w-[18px] h-[18px] px-1
                                     bg-orange-500 text-white text-[10px] font-black rounded-full 
                                     flex items-center justify-center shadow">
                            {{ $activeCount }}
                        </span>
                    @endif
                </button>

                {{-- Reset Button (hanya muncul kalau ada filter aktif) --}}
                @if($hasActiveFilters)
                    <a href="{{ route('cars.index') }}"
                        class="flex-shrink-0 p-2.5 rounded-xl border border-gray-200 
                               text-gray-400 hover:bg-red-50 hover:border-red-200 
                               hover:text-red-500 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </a>
                @endif
            </div>

            {{-- Active Filter Chips --}}
            @if($hasActiveFilters)
                <div class="flex flex-wrap gap-1.5 mt-2.5 pt-2.5 border-t border-gray-100">
                    @if(request('search'))
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 
                                     bg-blue-50 text-blue-700 text-xs font-semibold rounded-full
                                     border border-blue-100">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            "{{ Str::limit(request('search'), 15) }}"
                        </span>
                    @endif
                    @if(request('category'))
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 
                                     bg-blue-50 text-blue-700 text-xs font-semibold rounded-full
                                     border border-blue-100">
                            {{ request('category') }}
                        </span>
                    @endif
                    @if(request('seats'))
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 
                                     bg-blue-50 text-blue-700 text-xs font-semibold rounded-full
                                     border border-blue-100">
                            {{ request('seats') }} Kursi
                        </span>
                    @endif
                    @if(request('transmission'))
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 
                                     bg-blue-50 text-blue-700 text-xs font-semibold rounded-full
                                     border border-blue-100">
                            {{ request('transmission') }}
                        </span>
                    @endif
                    @if(request('fuel_type'))
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 
                                     bg-blue-50 text-blue-700 text-xs font-semibold rounded-full
                                     border border-blue-100">
                            {{ request('fuel_type') }}
                        </span>
                    @endif
                </div>
            @endif
        </div>

        {{-- ========================================================
             BOTTOM SHEET
        ======================================================== --}}

        {{-- Backdrop --}}
        <div x-show="sheetOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="sheetOpen = false"
             class="fixed inset-0 bg-black/50 backdrop-blur-sm z-40"
             x-cloak>
        </div>

        {{-- Sheet Panel --}}
        <div x-show="sheetOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-y-full"
             x-transition:enter-end="translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="translate-y-0"
             x-transition:leave-end="translate-y-full"
             class="fixed bottom-0 left-0 right-0 z-50 
                    bg-white rounded-t-3xl shadow-2xl shadow-black/30
                    max-h-[85vh] overflow-y-auto"
             x-cloak>

            {{-- Handle bar (drag indicator) --}}
            <div class="sticky top-0 bg-white rounded-t-3xl pt-3 pb-2 px-5 
                        border-b border-gray-100 z-10">
                <div class="w-10 h-1 bg-gray-300 rounded-full mx-auto mb-3"></div>
                <div class="flex items-center justify-between">
                    <h3 class="text-base font-black text-gray-900">Filter Mobil</h3>
                    <button @click="sheetOpen = false" type="button"
                        class="p-2 rounded-xl text-gray-400 hover:bg-gray-100 
                               hover:text-gray-600 transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Filter Form --}}
            <form method="GET" action="{{ route('cars.index') }}" 
                  id="mobileFilterForm" class="px-5 py-4 space-y-4">

                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif

                {{-- Category --}}
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                        Kategori
                    </label>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach(['SUV' => '🚙', 'MPV' => '🚐', 'Sedan' => '🚗', 'Hatchback' => '🚕'] as $val => $emoji)
                            <label class="relative cursor-pointer">
                                <input type="radio" name="category" value="{{ $val }}"
                                    {{ request('category') == $val ? 'checked' : '' }}
                                    class="sr-only peer">
                                <div class="flex items-center gap-2 px-3 py-2.5 rounded-xl border-2 
                                            border-gray-200 text-sm font-semibold text-gray-700
                                            peer-checked:border-blue-500 peer-checked:bg-blue-50 
                                            peer-checked:text-blue-700 transition-all duration-150
                                            hover:border-gray-300">
                                    <span>{{ $emoji }}</span>
                                    {{ $val }}
                                </div>
                            </label>
                        @endforeach
                        {{-- All option --}}
                        <label class="relative cursor-pointer col-span-2">
                            <input type="radio" name="category" value=""
                                {{ !request('category') ? 'checked' : '' }}
                                class="sr-only peer">
                            <div class="flex items-center justify-center gap-2 px-3 py-2 rounded-xl border-2 
                                        border-gray-200 text-sm font-semibold text-gray-500
                                        peer-checked:border-blue-500 peer-checked:bg-blue-50 
                                        peer-checked:text-blue-700 transition-all duration-150">
                                Semua Kategori
                            </div>
                        </label>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="border-t border-gray-100"></div>

                {{-- Seats --}}
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                        Kapasitas
                    </label>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['' => 'Semua', '2' => '2', '4' => '4', '5' => '5', '7' => '7', '7+' => '7+'] as $val => $label)
                            <label class="relative cursor-pointer">
                                <input type="radio" name="seats" value="{{ $val }}"
                                    {{ request('seats') == $val ? 'checked' : '' }}
                                    {{ $val === '' && !request('seats') ? 'checked' : '' }}
                                    class="sr-only peer">
                                <div class="px-4 py-2 rounded-xl border-2 border-gray-200 
                                            text-sm font-bold text-gray-600
                                            peer-checked:border-blue-500 peer-checked:bg-blue-50 
                                            peer-checked:text-blue-700 transition-all duration-150
                                            hover:border-gray-300 whitespace-nowrap">
                                    {{ $label }}{{ $val !== '' && $val !== '7+' ? ' Kursi' : ($val === '7+' ? '+ Kursi' : '') }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Divider --}}
                <div class="border-t border-gray-100"></div>

                {{-- Transmission --}}
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                        Transmisi
                    </label>
                    <div class="grid grid-cols-3 gap-2">
                        @foreach(['' => ['label' => 'Semua', 'emoji' => ''], 'AT' => ['label' => 'Otomatis', 'emoji' => '⚙️'], 'MT' => ['label' => 'Manual', 'emoji' => '🔧']] as $val => $item)
                            <label class="relative cursor-pointer">
                                <input type="radio" name="transmission" value="{{ $val }}"
                                    {{ request('transmission') == $val ? 'checked' : '' }}
                                    {{ $val === '' && !request('transmission') ? 'checked' : '' }}
                                    class="sr-only peer">
                                <div class="flex flex-col items-center gap-1 px-2 py-2.5 rounded-xl border-2 
                                            border-gray-200 text-xs font-bold text-gray-600 text-center
                                            peer-checked:border-blue-500 peer-checked:bg-blue-50 
                                            peer-checked:text-blue-700 transition-all duration-150">
                                    @if($item['emoji'])
                                        <span class="text-base">{{ $item['emoji'] }}</span>
                                    @endif
                                    {{ $item['label'] }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Divider --}}
                <div class="border-t border-gray-100"></div>

                {{-- Fuel Type --}}
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">
                        Bahan Bakar
                    </label>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach([
                            '' => ['label' => 'Semua', 'emoji' => ''],
                            'Bensin' => ['label' => 'Bensin', 'emoji' => '⛽'],
                            'Diesel' => ['label' => 'Diesel', 'emoji' => '🛢️'],
                            'Hybrid' => ['label' => 'Hybrid', 'emoji' => '🔋'],
                            'Listrik' => ['label' => 'Listrik', 'emoji' => '⚡'],
                        ] as $val => $item)
                            <label class="relative cursor-pointer {{ $val === '' ? 'col-span-2' : '' }}">
                                <input type="radio" name="fuel_type" value="{{ $val }}"
                                    {{ request('fuel_type') == $val ? 'checked' : '' }}
                                    {{ $val === '' && !request('fuel_type') ? 'checked' : '' }}
                                    class="sr-only peer">
                                <div class="flex items-center {{ $val === '' ? 'justify-center' : 'gap-2' }} 
                                            px-3 py-2.5 rounded-xl border-2 border-gray-200 
                                            text-sm font-semibold text-gray-600
                                            peer-checked:border-blue-500 peer-checked:bg-blue-50 
                                            peer-checked:text-blue-700 transition-all duration-150
                                            hover:border-gray-300">
                                    @if($item['emoji'])
                                        <span>{{ $item['emoji'] }}</span>
                                    @endif
                                    {{ $item['label'] }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Divider --}}
                <div class="border-t border-gray-100"></div>

                {{-- Action Buttons (sticky bottom) --}}
                <div class="flex gap-3 pt-1 pb-safe">
                    <a href="{{ route('cars.index') }}"
                        class="flex-1 flex items-center justify-center gap-2 py-3.5 
                               border-2 border-gray-200 rounded-2xl text-gray-700 
                               font-bold text-sm hover:bg-gray-50 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset
                    </a>
                    <button type="submit"
                        class="flex-[2] flex items-center justify-center gap-2 py-3.5 
                               bg-gradient-to-r from-blue-600 to-blue-700 text-white 
                               rounded-2xl font-bold text-sm shadow-lg shadow-blue-600/30
                               hover:from-blue-700 hover:to-blue-800 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Terapkan
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- ============================================================
         DESKTOP: Full Filter (sm ke atas)
    ============================================================ --}}
    <div class="hidden sm:block">
        <div class="bg-white/85 backdrop-blur-xl rounded-3xl shadow-xl shadow-blue-200/40 
                    border border-blue-100/80 p-6 md:p-8">
            <form method="GET" action="{{ route('cars.index') }}" class="space-y-6" id="filterForm">

                {{-- Search --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Cari Mobil
                    </label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-600 transition-colors duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari berdasarkan nama mobil, merk, atau tipe..."
                            class="block w-full pl-12 pr-4 py-3.5 md:py-4 border-2 border-gray-200 
                                   rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 
                                   transition-all duration-200 text-gray-900 placeholder-gray-400 
                                   hover:border-gray-300 bg-white/60 focus:bg-white">
                    </div>
                </div>

                {{-- Filter Grid --}}
                <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 md:gap-5">
                    {{-- Category --}}
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Kategori
                        </label>
                        <select name="category"
                            class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl
                                   focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white 
                                   transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none">
                            <option value="">Semua Kategori</option>
                            <option value="SUV" {{ request('category') == 'SUV' ? 'selected' : '' }}>🚙 SUV</option>
                            <option value="MPV" {{ request('category') == 'MPV' ? 'selected' : '' }}>🚐 MPV</option>
                            <option value="Sedan" {{ request('category') == 'Sedan' ? 'selected' : '' }}>🚗 Sedan</option>
                            <option value="Hatchback" {{ request('category') == 'Hatchback' ? 'selected' : '' }}>🚕 Hatchback</option>
                        </select>
                    </div>

                    {{-- Seats --}}
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            Kapasitas
                        </label>
                        <select name="seats"
                            class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl
                                   focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white 
                                   transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none">
                            <option value="">Semua Kapasitas</option>
                            <option value="2" {{ request('seats') == '2' ? 'selected' : '' }}>2 Kursi</option>
                            <option value="4" {{ request('seats') == '4' ? 'selected' : '' }}>4 Kursi</option>
                            <option value="5" {{ request('seats') == '5' ? 'selected' : '' }}>5 Kursi</option>
                            <option value="7" {{ request('seats') == '7' ? 'selected' : '' }}>7 Kursi</option>
                            <option value="7+" {{ request('seats') == '7+' ? 'selected' : '' }}>> 7 Kursi</option>
                        </select>
                    </div>

                    {{-- Transmission --}}
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            </svg>
                            Transmisi
                        </label>
                        <select name="transmission"
                            class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl
                                   focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white 
                                   transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none">
                            <option value="">Semua Transmisi</option>
                            <option value="AT" {{ request('transmission') == 'AT' ? 'selected' : '' }}>⚙️ Otomatis (AT)</option>
                            <option value="MT" {{ request('transmission') == 'MT' ? 'selected' : '' }}>🔧 Manual (MT)</option>
                        </select>
                    </div>

                    {{-- Fuel --}}
                    <div class="group">
                        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/>
                            </svg>
                            Bahan Bakar
                        </label>
                        <select name="fuel_type"
                            class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl
                                   focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white 
                                   transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none">
                            <option value="">Semua Bahan Bakar</option>
                            <option value="Bensin" {{ request('fuel_type') == 'Bensin' ? 'selected' : '' }}>⛽ Bensin</option>
                            <option value="Diesel" {{ request('fuel_type') == 'Diesel' ? 'selected' : '' }}>🛢️ Diesel</option>
                            <option value="Hybrid" {{ request('fuel_type') == 'Hybrid' ? 'selected' : '' }}>🔋 Hybrid</option>
                            <option value="Listrik" {{ request('fuel_type') == 'Listrik' ? 'selected' : '' }}>⚡ Listrik</option>
                        </select>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 justify-end pt-4 border-t border-blue-50">
                    <a href="{{ route('cars.index') }}"
                        class="inline-flex items-center justify-center gap-2 px-6 py-3.5 
                               border-2 border-gray-200 rounded-xl text-gray-700 
                               hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 font-semibold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset Filter
                    </a>
                    <button type="submit"
                        class="inline-flex items-center justify-center gap-2 px-8 py-3.5 
                               bg-gradient-to-r from-blue-600 to-blue-700 
                               hover:from-blue-700 hover:to-blue-800 text-white rounded-xl 
                               transition-all duration-200 font-semibold 
                               shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/40">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Terapkan Filter
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Alpine x-cloak style --}}
<style>
    [x-cloak] { display: none !important; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const carsGrid = document.getElementById('carsGrid');
    const skeletonLoading = document.getElementById('skeletonLoading');

    function showSkeleton() {
        if (carsGrid) carsGrid.classList.add('hidden');
        if (skeletonLoading) skeletonLoading.classList.remove('hidden');
    }

    const forms = ['filterForm', 'mobileFilterForm', 'mobileSearchForm'];
    forms.forEach(id => {
        const form = document.getElementById(id);
        if (form) form.addEventListener('submit', showSkeleton);
    });
});
</script>