<section class="bg-gray-50 py-20" id="cars">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

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
          <x-car-card :car="$car" :index="$index" />
        @endforeach
      </div>
    @else
      <div class="text-center py-20">
        <div class="w-24 h-24 rounded-3xl bg-slate-100 flex items-center justify-center mx-auto mb-6">
          <svg class="w-12 h-12 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 17H3a2 2 0 0 1-2-2v-4a2 2 0 0 1 2-2h1l3-5h10l3 5h1a2 2 0 0 1 2 2v4a2 2 0 0 1-2 2h-2" />
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