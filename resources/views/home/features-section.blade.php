@php
  $features = [
    [
      'icon' => 'M5 17H3a2 2 0 01-2-2v-4a2 2 0 012-2h1l3-5h10l3 5h1a2 2 0 012 2v4a2 2 0 01-2 2h-2M7.5 17.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5zm9 0a2.5 2.5 0 100-5 2.5 2.5 0 000 5z',
      'title' => 'Unit Kendaraan Lengkap',
      'desc' => 'Pilihan mobil terlengkap dari berbagai merek ternama dan dalam kondisi terbaik untuk perjalanan Anda.',
      'color' => '#2563eb',
      'bg' => '#eff6ff'
    ],
    [
      'icon' => 'M12 1v22M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6',
      'title' => 'Harga Terjangkau',
      'desc' => 'Tarif kompetitif dengan berbagai paket sewa yang fleksibel, mulai 12 jam hingga berhari-hari.',
      'color' => '#059669',
      'bg' => '#ecfdf5'
    ],
    [
      'icon' => 'M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.69 12 19.79 19.79 0 011.61 3.4 2 2 0 013.6 1.22h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L7.91 8.77a16 16 0 006.29 6.29l.95-.95a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z',
      'title' => 'Layanan 24/7',
      'desc' => 'Tim customer service profesional siap membantu Anda kapan saja, siang maupun malam.',
      'color' => '#7c3aed',
      'bg' => '#f5f3ff'
    ],
    [
      'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
      'title' => 'Asuransi Lengkap',
      'desc' => 'Perlindungan menyeluruh dengan asuransi komprehensif untuk setiap perjalanan penyewaan.',
      'color' => '#dc2626',
      'bg' => '#fef2f2'
    ],
    [
      'icon' => 'M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z',
      'title' => 'Lokasi Strategis',
      'desc' => 'Kantor kami berlokasi di pusat kota Purwakarta, mudah diakses dari berbagai penjuru wilayah.',
      'color' => '#d97706',
      'bg' => '#fffbeb'
    ],
    [
      'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4',
      'title' => 'Proses Booking Mudah',
      'desc' => 'Pesan secara online dalam hitungan menit. Proses cepat, transparan, dan tanpa biaya tersembunyi.',
      'color' => '#0891b2',
      'bg' => '#ecfeff'
    ],
  ];
@endphp

<section class="py-28 relative overflow-hidden bg-white" id="about">
  <div
    class="absolute inset-0 opacity-[0.025] pointer-events-none bg-[radial-gradient(circle,#1d4ed8_1px,transparent_1px)] bg-[length:40px_40px]">
  </div>

  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-20">
      <div
        class="inline-flex items-center gap-2 mb-5 px-5 py-2 rounded-full bg-blue-600/[0.07] border border-blue-600/15">
        <svg class="w-3.5 h-3.5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
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

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach($features as $i => $f)
        <div
          class="group relative p-8 rounded-3xl transition-all duration-500 hover:-translate-y-2 cursor-default bg-white border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-black/[0.08]"
          style="--color: {{ $f['color'] }}; --bg: {{ $f['bg'] }};">

          <div
            class="w-16 h-16 rounded-2xl flex items-center justify-center mb-6 transition-transform duration-300 group-hover:scale-110 bg-[var(--bg)]">
            <svg class="w-8 h-8 text-[var(--color)]" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="{{ $f['icon'] }}" />
            </svg>
          </div>

          <div
            class="absolute top-7 right-7 text-5xl font-black opacity-[0.04] select-none text-[var(--color)] leading-none">
            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
          </div>

          <h3 class="text-lg font-black text-slate-900 mb-3">{{ $f['title'] }}</h3>
          <p class="text-slate-500 text-sm leading-relaxed">{{ $f['desc'] }}</p>

          <div class="absolute bottom-0 left-8 right-8 h-0.5 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500
                                     bg-gradient-to-r from-[var(--color)] to-transparent">
          </div>

          <div
            class="absolute inset-0 rounded-3xl border border-[var(--color)] opacity-0 group-hover:opacity-100 transition-all duration-500 pointer-events-none">
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>