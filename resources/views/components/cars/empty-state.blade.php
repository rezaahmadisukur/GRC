<div class="bg-white rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100 p-12 md:p-16 text-center">
  <div class="max-w-md mx-auto">
    <div
      class="w-24 h-24 mx-auto mb-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-full flex items-center justify-center">
      <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
          d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
          d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1" />
      </svg>
    </div>
    <h3 class="text-2xl md:text-3xl font-black text-gray-900 mb-3">Tidak ada mobil ditemukan</h3>
    <p class="text-gray-500 mb-8 text-sm md:text-base leading-relaxed">
      Maaf, kami tidak dapat menemukan mobil yang sesuai dengan kriteria pencarian Anda. Silakan
      coba sesuaikan filter atau reset pencarian Anda.
    </p>
    <a href="{{ route('cars.index') }}"
      class="inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-2xl transition-all duration-300 font-bold shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/50 hover:scale-105 active:scale-95">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
      </svg>
      Reset Pencarian
    </a>
  </div>
</div>