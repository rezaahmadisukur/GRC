{{-- GRC Rental — Customer Navbar --}}
<nav x-data="{ open: false, scrolled: false }"
  x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
  :class="scrolled ? 'bg-white shadow-lg shadow-slate-200/60' : 'bg-white/95 backdrop-blur-md'"
  class="fixed top-0 inset-x-0 z-50 transition-all duration-300 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex items-center justify-between h-16 lg:h-[70px]">

      {{-- ── LOGO ── --}}
      <a href="{{ url('/') }}" class="flex items-center gap-2.5 group flex-shrink-0">
        {{-- Car icon badge --}}
        <div
          class="relative w-9 h-9 rounded-xl bg-gradient-to-br from-blue-600 to-blue-800 flex items-center justify-center shadow-md shadow-blue-500/30 group-hover:shadow-blue-500/50 transition-shadow duration-300">
          <svg class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2" />
            <circle cx="7.5" cy="17.5" r="2.5" />
            <circle cx="16.5" cy="17.5" r="2.5" />
          </svg>
          {{-- Shine dot --}}
          <span class="absolute top-1.5 right-1.5 w-1 h-1 rounded-full bg-white/60"></span>
        </div>
        {{-- Wordmark --}}
        <div class="leading-none">
          <span
            class="block text-[17px] font-extrabold tracking-tight text-slate-800 group-hover:text-blue-700 transition-colors duration-200">GRC</span>
          <span class="block text-[9px] font-semibold tracking-[0.18em] text-blue-600 uppercase">Rental Mobil</span>
        </div>
      </a>

      {{-- ── DESKTOP NAV LINKS ── --}}
      <div class="hidden md:flex items-center gap-1">
        @php
          $navLinks = [
            ['label' => 'Beranda', 'href' => url('/'), 'route' => '/'],
            ['label' => 'Cari Mobil', 'href' => route('cars.index'), 'route' => 'cars.index'],
            ['label' => 'Riwayat Pemesanan', 'href' => route('bookings.check-form'), 'route' => 'bookings.check-form'],
          ];
        @endphp

        @foreach($navLinks as $link)
              @php
                $isActive = request()->routeIs($link['route']) || request()->url() === $link['href'];
              @endphp
              <a href="{{ $link['href'] }}" class="relative px-4 py-2 text-sm font-semibold rounded-lg transition-all duration-200 group
                                  {{ $isActive
          ? 'text-blue-700 bg-blue-50'
          : 'text-slate-600 hover:text-blue-700 hover:bg-slate-50' }}">
                {{ $link['label'] }}
                {{-- Active underline --}}
                <span class="absolute bottom-1 left-4 right-4 h-0.5 rounded-full bg-blue-600 transition-all duration-200
                                  {{ $isActive ? 'opacity-100 scale-x-100' : 'opacity-0 scale-x-0 group-hover:opacity-60 group-hover:scale-x-100' }}
                                  origin-left"></span>
              </a>
        @endforeach
      </div>

      {{-- ── RIGHT SIDE: Phone + Hamburger ── --}}
      <div class="flex items-center gap-3">

        {{-- Phone number (desktop) --}}
        <a href="tel:+6281234567890"
          class="hidden md:flex items-center gap-2 px-4 py-2 rounded-xl border border-blue-100 bg-blue-50 hover:bg-blue-100 hover:border-blue-200 transition-all duration-200 group">
          <span
            class="flex-shrink-0 w-7 h-7 rounded-lg bg-blue-600 flex items-center justify-center shadow-sm shadow-blue-500/30 group-hover:shadow-blue-500/50 transition-shadow duration-200">
            <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
              stroke-linecap="round" stroke-linejoin="round">
              <path
                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
            </svg>
          </span>
          <div class="leading-none">
            <span class="block text-[9px] font-semibold tracking-widest text-blue-500 uppercase">Hubungi Kami</span>
            <span class="block text-[13px] font-bold text-slate-800 tracking-tight">0812-3456-7890</span>
          </div>
        </a>

        {{-- Phone icon only (tablet) --}}
        <a href="tel:+6281234567890"
          class="hidden sm:flex md:hidden items-center justify-center w-9 h-9 rounded-xl bg-blue-50 border border-blue-100 hover:bg-blue-100 transition-colors duration-200"
          title="Hubungi Kami">
          <svg class="w-4 h-4 text-blue-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <path
              d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
          </svg>
        </a>

        {{-- Hamburger (mobile) --}}
        <button @click="open = !open"
          class="md:hidden flex items-center justify-center w-9 h-9 rounded-xl text-slate-600 hover:text-blue-700 hover:bg-slate-100 transition-all duration-200 focus:outline-none"
          :aria-expanded="open" aria-label="Toggle menu">
          {{-- Animated icon --}}
          <svg class="w-5 h-5 transition-transform duration-200" :class="open ? 'rotate-90' : ''" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
            <span x-show="!open">
              <line x1="3" y1="6" x2="21" y2="6" />
              <line x1="3" y1="12" x2="21" y2="12" />
              <line x1="3" y1="18" x2="21" y2="18" />
            </span>
            <span x-show="open">
              <line x1="18" y1="6" x2="6" y2="18" />
              <line x1="6" y1="6" x2="18" y2="18" />
            </span>
          </svg>
          {{-- Fallback static icon (CSS toggle) --}}
          <svg x-show="!open" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round">
            <line x1="3" y1="6" x2="21" y2="6" />
            <line x1="3" y1="12" x2="21" y2="12" />
            <line x1="3" y1="18" x2="21" y2="18" />
          </svg>
          <svg x-show="open" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round">
            <line x1="18" y1="6" x2="6" y2="18" />
            <line x1="6" y1="6" x2="18" y2="18" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  {{-- ── MOBILE DRAWER ── --}}
  <div x-show="open" x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden border-t border-slate-100 bg-white"
    @click.away="open = false">
    <div class="px-4 py-4 space-y-1">
      {{-- Mobile nav links --}}
      @php
        $mobileLinks = [
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
            'icon' => '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/>',
          ],
        ];
      @endphp

      @foreach($mobileLinks as $link)
          @php
            $isActive = request()->routeIs($link['route']) || request()->url() === $link['href'];
          @endphp
          <a href="{{ $link['href'] }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold transition-all duration-150
                            {{ $isActive
        ? 'bg-blue-50 text-blue-700'
        : 'text-slate-600 hover:bg-slate-50 hover:text-blue-700' }}">
            <span class="flex-shrink-0 w-8 h-8 rounded-lg flex items-center justify-center
                            {{ $isActive ? 'bg-blue-600 text-white' : 'bg-slate-100 text-slate-500' }}">
              <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                {!! $link['icon'] !!}
              </svg>
            </span>
            {{ $link['label'] }}
            @if($isActive)
              <span class="ml-auto w-1.5 h-1.5 rounded-full bg-blue-600"></span>
            @endif
          </a>
      @endforeach

      {{-- Divider --}}
      <div class="my-3 border-t border-slate-100"></div>

      {{-- Phone CTA (mobile) --}}
      <a href="tel:+6281234567890"
        class="flex items-center gap-3 px-4 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 transition-colors duration-200">
        <span class="flex-shrink-0 w-8 h-8 rounded-lg bg-white/20 flex items-center justify-center">
          <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
            stroke-linecap="round" stroke-linejoin="round">
            <path
              d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.77a16 16 0 0 0 6.29 6.29l.95-.95a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
          </svg>
        </span>
        <div class="leading-none">
          <span class="block text-[9px] font-semibold tracking-widest text-blue-200 uppercase">Hubungi Kami</span>
          <span class="block text-sm font-bold text-white tracking-tight">0812-3456-7890</span>
        </div>
        <svg class="ml-auto w-4 h-4 text-blue-300" viewBox="0 0 24 24" fill="none" stroke="currentColor"
          stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
          <polyline points="9 18 15 12 9 6" />
        </svg>
      </a>
    </div>
  </div>
</nav>

{{-- Spacer to prevent content from hiding behind fixed navbar --}}
<div class="h-16 lg:h-[70px]"></div>