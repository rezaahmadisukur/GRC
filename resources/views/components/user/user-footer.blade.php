<footer class="relative bg-slate-950 overflow-hidden" id="contact">

  {{-- Background --}}
  <div class="absolute inset-0 pointer-events-none select-none">
    <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-blue-500/40 to-transparent"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_40%_at_50%_-5%,rgba(37,99,235,0.10),transparent)]"></div>
    <div class="absolute inset-0 opacity-[0.03] bg-[radial-gradient(circle,rgba(255,255,255,0.9)_1px,transparent_1px)] bg-[size:32px_32px]"></div>
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- ═══ TOP SECTION ═══ --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 pt-14 pb-12 border-b border-white/[0.06]">

      {{-- Brand Column --}}
      <div class="lg:col-span-5 flex flex-col gap-5">

        {{-- Logo --}}
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg shadow-blue-600/30 bg-gradient-to-br from-blue-600 to-blue-700">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M5 17H3a2 2 0 01-2-2v-4a2 2 0 012-2h1l3-5h10l3 5h1a2 2 0 012 2v4a2 2 0 01-2 2h-2" />
              <circle cx="7.5" cy="17.5" r="2.5" />
              <circle cx="16.5" cy="17.5" r="2.5" />
            </svg>
          </div>
          <div>
            <div class="text-white font-black text-lg leading-tight tracking-tight">Pusat Rentcar</div>
            <div class="text-blue-400 text-xs font-bold tracking-[0.18em] uppercase">Purwakarta</div>
          </div>
        </div>

        {{-- Description --}}
        <p class="text-sm leading-relaxed max-w-sm text-slate-500">
          Solusi rental mobil terpercaya di Purwakarta sejak 2015. Armada lengkap, harga transparan,
          dan layanan siap membantu perjalanan Anda kapan saja.
        </p>

        {{-- Trust Badges --}}
        <div class="flex flex-wrap gap-2">
          @foreach([
            ['⭐ 4.9/5', 'Rating'],
            ['✨ Mobil Bersih', 'Selalu'],
            ['24/7', 'Support'],
          ] as [$val, $label])
            <div class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs bg-white/[0.04] border border-white/[0.08]">
              <span class="text-blue-400 font-bold">{{ $val }}</span>
              <span class="text-slate-600">{{ $label }}</span>
            </div>
          @endforeach
        </div>

        {{-- Social Media --}}
        <div class="flex items-center gap-2">
          <span class="text-xs font-semibold uppercase tracking-widest mr-1 text-slate-700">Ikuti kami</span>
          @php
            $socials = [
              [
                'label' => 'Instagram',
                'color' => 'text-pink-500',
                'border' => 'hover:border-pink-500/40',
                'path' => 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z'
              ],
              [
                'label' => 'Facebook',
                'color' => 'text-blue-500',
                'border' => 'hover:border-blue-500/40',
                'path' => 'M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z'
              ],
              [
                'label' => 'WhatsApp',
                'color' => 'text-green-500',
                'border' => 'hover:border-green-500/40',
                'path' => 'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.87 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.825 0 00-3.48-8.413z'
              ],
              [
                'label' => 'TikTok',
                'color' => 'text-slate-100',
                'border' => 'hover:border-slate-100/25',
                'path' => 'M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 00-.79-.05 6.34 6.34 0 00-6.34 6.34 6.34 6.34 0 006.34 6.34 6.34 6.34 0 006.33-6.34V8.69a8.18 8.18 0 004.78 1.52V6.75a4.85 4.85 0 01-1.01-.06z'
              ],
            ];
          @endphp

          @foreach($socials as $s)
            <a href="#" title="{{ $s['label'] }}"
              class="group w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-300 hover:-translate-y-0.5 bg-white/[0.04] border border-white/[0.08] hover:bg-white/[0.07] {{ $s['border'] }}">
              <svg class="w-3.5 h-3.5 transition-colors duration-300 text-white/35 group-hover:{{ $s['color'] }}" fill="currentColor" viewBox="0 0 24 24">
                <path d="{{ $s['path'] }}" />
              </svg>
            </a>
          @endforeach
        </div>
      </div>

      {{-- Right Column: Nav + Contact --}}
      <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-10 lg:pl-8">

        {{-- Navigasi --}}
        <div>
          <h4 class="text-white font-bold text-sm mb-5 tracking-wide">Navigasi</h4>
          <ul class="space-y-3.5">
            @foreach([
                ['Beranda', route('home'), 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-5'],
                ['Cari Mobil', route('cars.index') , 'M5 17H3a2 2 0 01-2-2v-4a2 2 0 012-2h1l3-5h10l3 5h1a2 2 0 012 2v4a2 2 0 01-2 2h-2M7.5 17.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm9 0a2.5 2.5 0 100-5 2.5 2.5 0 000 5z'],
                ['Riwayat Pemesanan', route('bookings.check-form'), 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
              ] as [$label, $href, $icon])
                <li>
                  <a href="{{ $href }}" class="group flex items-center gap-3 transition-all duration-200">
                    <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 transition-all duration-300 bg-blue-600/[0.08] border border-blue-600/[0.15] group-hover:bg-blue-600/[0.18] group-hover:border-blue-600/[0.35]">
                      <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}" />
                      </svg>
                    </div>
                    <span class="text-sm font-medium transition-colors duration-200 text-slate-500 group-hover:text-slate-200">{{ $label }}</span>
                  </a>
                </li>
            @endforeach
          </ul>
        </div>

        {{-- Kontak --}}
        <div>
          <h4 class="text-white font-bold text-sm mb-5 tracking-wide">Kontak Kami</h4>
          <ul class="space-y-3.5">

            {{-- Lokasi --}}
            <li>
              <a href="https://maps.google.com/?q=Purwakarta,+Jawa+Barat" target="_blank" class="group flex items-start gap-3 transition-all duration-200">
                <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5 bg-blue-600/[0.08] border border-blue-600/[0.15]">
                  <svg class="w-3.5 h-3.5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <div>
                  <p class="text-xs font-semibold uppercase tracking-widest mb-0.5 text-slate-700">Lokasi</p>
                  <p class="text-sm font-medium leading-snug transition-colors duration-200 text-slate-500 group-hover:text-slate-200">
                    Jl. Contoh No. 123,<br>Purwakarta, Jawa Barat
                  </p>
                </div>
              </a>
            </li>

            {{-- WhatsApp --}}
            <li>
              <a href="https://wa.me/6281234567890" target="_blank" class="group flex items-start gap-3 transition-all duration-200">
                <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5 bg-green-500/[0.08] border border-green-500/[0.15]">
                  <svg class="w-3.5 h-3.5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.87 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.825 0 00-3.48-8.413z" />
                  </svg>
                </div>
                <div>
                  <p class="text-xs font-semibold uppercase tracking-widest mb-0.5 text-slate-700">WhatsApp</p>
                  <p class="text-sm font-medium transition-colors duration-200 text-slate-500 group-hover:text-green-500">+62 812-3456-7890</p>
                </div>
              </a>
            </li>

            {{-- Email --}}
            <li>
              <a href="mailto:info@grc-rental.com" class="group flex items-start gap-3 transition-all duration-200">
                <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5 bg-purple-500/[0.08] border border-purple-500/[0.15]">
                  <svg class="w-3.5 h-3.5 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                  </svg>
                </div>
                <div>
                  <p class="text-xs font-semibold uppercase tracking-widest mb-0.5 text-slate-700">Email</p>
                  <p class="text-sm font-medium transition-colors duration-200 text-slate-500 group-hover:text-slate-200">info@grc-rental.com</p>
                </div>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>

    {{-- ═══ CTA STRIP ═══ --}}
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 py-8 border-b border-white/[0.06]">
      <div>
        <p class="text-white font-bold text-base">Siap memesan? Hubungi kami sekarang!</p>
        <p class="text-sm mt-0.5 text-slate-600">Respon cepat, proses mudah, harga transparan.</p>
      </div>
      <a href="https://wa.me/6281234567890" target="_blank"
        class="flex-shrink-0 inline-flex items-center gap-2.5 px-6 py-3 rounded-xl font-bold text-sm text-white transition-all duration-300 hover:-translate-y-0.5 bg-gradient-to-br from-green-600 to-green-700 shadow-lg shadow-green-600/35 hover:shadow-xl hover:shadow-green-600/50">
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.87 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.825 0 00-3.48-8.413z" />
        </svg>
        Chat via WhatsApp
      </a>
    </div>

    {{-- ═══ COPYRIGHT ═══ --}}
    <div class="flex flex-col sm:flex-row items-center justify-between gap-3 py-6 text-xs">
      <p class="text-slate-700">
        © {{ date('Y') }}
        <span class="font-semibold text-slate-600">Pusat Rentcar Purwakarta.</span>
        Semua hak dilindungi.
      </p>
      <div class="flex items-center gap-4 text-slate-700">
        <a href="#" class="transition-colors duration-200 hover:text-white/60">Syarat & Ketentuan</a>
        <span>·</span>
        <a href="#" class="transition-colors duration-200 hover:text-white/60">Kebijakan Privasi</a>
        <span class="hidden sm:inline">·</span>
        <span class="hidden sm:flex items-center gap-1">
          Dibuat dengan
          <svg class="w-3 h-3 fill-red-500/60 mx-0.5" viewBox="0 0 24 24">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
          </svg>
          di Indonesia
        </span>
      </div>
    </div>

  </div>
</footer>
