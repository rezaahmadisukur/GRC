{{-- GRC Rental — Customer Navbar (Modern Rebuild) --}}
<nav x-data="{
        open: false,
        scrolled: false,
        hoveredLink: null
    }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
  class="fixed top-0 inset-x-0 z-50">
  {{-- ══════════════════════════════════════════
  MAIN NAV BAR
  ══════════════════════════════════════════ --}}
  <div :class="scrolled
            ? 'bg-white shadow-[0_4px_24px_-4px_rgba(59,130,246,0.15)] shadow-slate-200/80'
            : 'bg-white/80 backdrop-blur-2xl'" class="transition-all duration-500 border-b border-slate-100/80">
    {{-- Gradient accent top border --}}
    <div class="h-[3px] bg-gradient-to-r from-blue-400 via-blue-600 to-indigo-500 relative overflow-hidden">
      <div
        class="absolute inset-0 bg-gradient-to-r from-transparent via-white/40 to-transparent
                        -translate-x-full animate-[shimmer_3s_ease-in-out_infinite] [@keyframes_shimmer]{0%{transform:translateX(-100%)}60%,100%{transform:translateX(100%)}}">
      </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16 lg:h-[68px]">

        {{-- ── LOGO ── --}}
        <a href="{{ url('/') }}" class="flex items-center gap-3 group flex-shrink-0">

          {{-- Icon --}}
          <div class="relative w-10 h-10 flex-shrink-0">
            {{-- Glow layer --}}
            <div class="absolute inset-0 rounded-2xl bg-blue-500 blur-md opacity-0
                                    group-hover:opacity-40 transition-opacity duration-500 scale-110"></div>
            {{-- Badge --}}
            <div class="relative w-10 h-10 rounded-2xl
                                    bg-gradient-to-br from-blue-500 via-blue-600 to-indigo-700
                                    flex items-center justify-center
                                    shadow-lg shadow-blue-500/25
                                    group-hover:shadow-blue-500/50
                                    group-hover:-translate-y-0.5
                                    transition-all duration-300">
              <svg class="w-[22px] h-[22px] text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2" />
                <circle cx="7.5" cy="17.5" r="2.5" />
                <circle cx="16.5" cy="17.5" r="2.5" />
              </svg>
              {{-- Shine --}}
              <span class="absolute top-1.5 left-2 w-3 h-1 rounded-full
                                         bg-gradient-to-r from-white/60 to-transparent
                                         rotate-[-30deg]"></span>
            </div>
          </div>

          {{-- Wordmark --}}
          <div class="leading-none min-w-0 hidden sm:block">
            <div class="flex items-baseline gap-1.5">
              <span class="text-[15px] lg:text-[16px] font-black tracking-tight
                                         text-slate-800 group-hover:text-blue-700
                                         transition-colors duration-200">
                Pusat Rentcar
              </span>
              <span class="text-[15px] lg:text-[16px] font-black tracking-tight
                                         bg-gradient-to-r from-blue-600 to-indigo-600
                                         bg-clip-text text-transparent">
                Purwakarta
              </span>
            </div>
            <div class="flex items-center gap-1.5 mt-0.5">
              <span class="w-3 h-[1.5px] rounded-full bg-blue-400"></span>
              <span class="text-[8px] font-bold tracking-[0.22em] text-blue-500/80 uppercase">
                Rental Mobil
              </span>
              <span class="w-3 h-[1.5px] rounded-full bg-blue-400"></span>
            </div>
          </div>

          {{-- Mobile wordmark (short) --}}
          <div class="leading-none min-w-0 sm:hidden">
            <span class="text-[15px] font-black tracking-tight
                                     bg-gradient-to-r from-slate-800 to-blue-700
                                     bg-clip-text text-transparent">
              PRP
            </span>
            <span class="block text-[8px] font-bold tracking-[0.2em] text-blue-500 uppercase">
              Rental Mobil
            </span>
          </div>
        </a>

        {{-- ── DESKTOP NAV LINKS (lg+) ── --}}
        <nav class="hidden lg:flex items-center bg-slate-50/80 rounded-2xl p-1 border border-slate-100">
          @php
            $navLinks = [
              [
                'label' => 'Beranda',
                'href' => url('/'),
                'route' => '/',
                'icon' => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
              ],
              [
                'label' => 'Cari Mobil',
                'href' => route('cars.index'),
                'route' => 'cars.index',
                'icon' => '<path d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2"/><circle cx="7.5" cy="17.5" r="2.5"/><circle cx="16.5" cy="17.5" r="2.5"/>',
              ],
              [
                'label' => 'Riwayat Pemesanan',
                'href' => route('bookings.check-form'),
                'route' => 'bookings.check-form',
                'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>',
              ],
            ];
          @endphp

          @foreach($navLinks as $link)
                  @php
                    $isActive = request()->routeIs($link['route'])
                      || request()->url() === $link['href'];
                  @endphp
                  <a href="{{ $link['href'] }}" class="relative flex items-center gap-2 px-4 py-2 rounded-xl
                                                          text-sm font-semibold transition-all duration-200 group
                                                          {{ $isActive
            ? 'bg-white text-blue-700 shadow-sm shadow-blue-100/80'
            : 'text-slate-500 hover:text-slate-700' }}">

                    {{-- Icon --}}
                    <svg
                      class="w-3.5 h-3.5 flex-shrink-0 transition-transform duration-200
                                                                group-hover:-translate-y-px
                                                                {{ $isActive ? 'text-blue-600' : 'text-slate-400 group-hover:text-slate-600' }}"
                      viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round">
                      {!! $link['icon'] !!}
                    </svg>

                    {{ $link['label'] }}

                    {{-- Active dot --}}
                    @if($isActive)
                      <span class="absolute -top-0.5 -right-0.5 w-2 h-2 rounded-full
                                                                           bg-gradient-to-br from-blue-500 to-indigo-500
                                                                           shadow-sm shadow-blue-400/50"></span>
                    @endif
                  </a>
          @endforeach
        </nav>

        {{-- ── RIGHT: Phone + Hamburger ── --}}
        <div class="flex items-center gap-2 sm:gap-3">

          {{-- Phone CTA — Desktop (lg+) --}}
          <a href="tel:+6281234567890" class="hidden lg:flex items-center gap-3 px-4 py-2.5
                              bg-gradient-to-r from-blue-600 to-indigo-600
                              hover:from-blue-500 hover:to-indigo-500
                              text-white rounded-2xl
                              shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50
                              hover:-translate-y-0.5
                              transition-all duration-300 group">
            {{-- Pulse ring --}}
            <span class="relative flex-shrink-0">
              <span class="absolute inset-0 rounded-full bg-white/30
                                         animate-ping opacity-75 scale-150"></span>
              <svg class="relative w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path
                  d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
              </svg>
            </span>
            <div class="leading-none">
              <span class="block text-[9px] font-bold tracking-widest text-blue-200 uppercase">
                Hubungi Kami
              </span>
              <span class="block text-[13px] font-bold tracking-tight text-white">
                0812-3456-7890
              </span>
            </div>
          </a>

          {{-- Hamburger (mobile + tablet = below lg) --}}
          <button @click="open = !open" class="lg:hidden w-10 h-10 rounded-2xl flex flex-col items-center justify-center gap-[5px]
                               border border-slate-200 bg-white hover:border-blue-200 hover:bg-blue-50
                               transition-all duration-200 focus:outline-none group" :aria-expanded="open"
            aria-label="Toggle navigation">
            <span class="w-5 h-[2px] rounded-full bg-slate-600 group-hover:bg-blue-600
                                     transition-all duration-300"
              :class="open ? 'rotate-45 translate-y-[7px]' : ''"></span>
            <span class="w-5 h-[2px] rounded-full bg-slate-600 group-hover:bg-blue-600
                                     transition-all duration-200"
              :class="open ? 'opacity-0 scale-x-0' : 'opacity-100'"></span>
            <span class="w-5 h-[2px] rounded-full bg-slate-600 group-hover:bg-blue-600
                                     transition-all duration-300"
              :class="open ? '-rotate-45 -translate-y-[7px]' : ''"></span>
          </button>
        </div>

      </div>
    </div>
  </div>

  {{-- ══════════════════════════════════════════
  MOBILE & TABLET DRAWER (below lg)
  ══════════════════════════════════════════ --}}
  <div x-show="open" x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-4 scale-y-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-y-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0 scale-y-100"
    x-transition:leave-end="opacity-0 -translate-y-4 scale-y-95" class="lg:hidden origin-top bg-white/95 backdrop-blur-2xl
               border-b border-slate-100 shadow-xl shadow-slate-200/60" @click.away="open = false">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 space-y-2">

      {{-- Section label --}}
      <p class="px-2 text-[10px] font-bold tracking-[0.2em] text-slate-400 uppercase mb-3">
        Menu Navigasi
      </p>

      {{-- ── Mobile Nav Links ── --}}
      @php
        $mobileLinks = [
          [
            'label' => 'Beranda',
            'href' => url('/'),
            'route' => '/',
            'icon' => '<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
            'description' => 'Halaman utama kami',
            'color' => 'from-blue-500 to-blue-600',
            'shadow' => 'shadow-blue-400/30',
          ],
          [
            'label' => 'Cari Mobil',
            'href' => route('cars.index'),
            'route' => 'cars.index',
            'icon' => '<path d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2"/><circle cx="7.5" cy="17.5" r="2.5"/><circle cx="16.5" cy="17.5" r="2.5"/>',
            'description' => 'Temukan mobil impianmu',
            'color' => 'from-violet-500 to-indigo-600',
            'shadow' => 'shadow-violet-400/30',
          ],
          [
            'label' => 'Riwayat Pemesanan',
            'href' => route('bookings.check-form'),
            'route' => 'bookings.check-form',
            'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>',
            'description' => 'Cek status pemesanan',
            'color' => 'from-emerald-500 to-teal-600',
            'shadow' => 'shadow-emerald-400/30',
          ],
        ];
      @endphp

      @foreach($mobileLinks as $link)
          @php
            $isActive = request()->routeIs($link['route'])
              || request()->url() === $link['href'];
          @endphp
          <a href="{{ $link['href'] }}" @click="open = false" class="flex items-center gap-4 px-4 py-3.5 rounded-2xl
                                      transition-all duration-200 group
                                      {{ $isActive
        ? 'bg-gradient-to-r from-blue-50 to-indigo-50/60 border border-blue-100'
        : 'hover:bg-slate-50 border border-transparent hover:border-slate-100' }}">

            {{-- Colored icon box --}}
            <span class="flex-shrink-0 w-10 h-10 rounded-xl flex items-center justify-center
                                             bg-gradient-to-br {{ $link['color'] }}
                                             shadow-md {{ $link['shadow'] }}
                                             group-hover:-translate-y-0.5 group-hover:shadow-lg
                                             transition-all duration-200">
              <svg class="w-4.5 h-4.5 text-white w-[18px] h-[18px]" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                {!! $link['icon'] !!}
              </svg>
            </span>

            {{-- Text --}}
            <div class="flex-1 min-w-0">
              <p class="text-sm font-bold text-slate-800 leading-tight
                                              {{ $isActive ? 'text-blue-700' : '' }}">
                {{ $link['label'] }}
              </p>
              <p class="text-xs text-slate-400 mt-0.5 leading-tight">
                {{ $link['description'] }}
              </p>
            </div>

            {{-- Right indicator --}}
            @if($isActive)
              <span class="flex-shrink-0 w-6 h-6 rounded-full
                                                       bg-gradient-to-br from-blue-500 to-indigo-500
                                                       flex items-center justify-center
                                                       shadow-sm shadow-blue-400/40">
                <svg class="w-3 h-3 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"
                  stroke-linecap="round">
                  <polyline points="20 6 9 17 4 12" />
                </svg>
              </span>
            @else
              <svg class="flex-shrink-0 w-4 h-4 text-slate-300
                                                      group-hover:text-slate-400 group-hover:translate-x-0.5
                                                      transition-all duration-200" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <polyline points="9 18 15 12 9 6" />
              </svg>
            @endif
          </a>
      @endforeach

      {{-- ── Divider ── --}}
      <div class="relative my-3">
        <div class="border-t border-dashed border-slate-200"></div>
        <span class="absolute inset-x-0 top-0 h-px
                             bg-gradient-to-r from-transparent via-blue-200 to-transparent"></span>
      </div>

      {{-- ── Phone CTA ── --}}
      <a href="tel:+6281234567890" class="relative flex items-center gap-4 px-4 py-4 rounded-2xl overflow-hidden
                      bg-gradient-to-r from-blue-600 via-blue-600 to-indigo-600
                      hover:from-blue-500 hover:to-indigo-500
                      shadow-lg shadow-blue-500/25 hover:shadow-blue-500/40
                      hover:-translate-y-0.5 active:translate-y-0
                      transition-all duration-300 group">

        {{-- BG pattern --}}
        <div
          class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_20%_50%,white_1px,transparent_1px),radial-gradient(circle_at_80%_20%,white_1px,transparent_1px)] bg-[size:24px_24px]">
        </div>

        {{-- Icon with pulse --}}
        <span class="relative flex-shrink-0 w-10 h-10 rounded-xl bg-white/20
                             flex items-center justify-center
                             group-hover:bg-white/30 transition-colors duration-200">
          <span class="absolute inset-0 rounded-xl bg-white/20 animate-ping opacity-50"></span>
          <svg class="relative w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor"
            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path
              d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
          </svg>
        </span>

        {{-- Text --}}
        <div class="relative leading-none flex-1">
          <span class="block text-[9px] font-bold tracking-[0.2em] text-blue-200 uppercase mb-1">
            Hubungi Kami Sekarang
          </span>
          <span class="block text-base font-black text-white tracking-tight">
            0812-3456-7890
          </span>
        </div>

        {{-- Chevron --}}
        <svg class="relative flex-shrink-0 w-5 h-5 text-white/60
                            group-hover:text-white group-hover:translate-x-1
                            transition-all duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2.5" stroke-linecap="round">
          <polyline points="9 18 15 12 9 6" />
        </svg>
      </a>

      <div class="h-1"></div>
    </div>
  </div>

</nav>

{{-- ── Spacer ── --}}
<div class="h-16 lg:h-[68px]"></div>