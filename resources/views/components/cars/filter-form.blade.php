<div
  class="bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl shadow-gray-200/50 border border-gray-100/50 p-6 md:p-8 mb-8 animate-slideUp">
  <form method="GET" action="{{ route('cars.index') }}" class="space-y-6" id="filterForm">
    <!-- Search Input dengan icon yang lebih menarik -->
    <div>
      <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        Cari Mobil
      </label>
      <div class="relative group">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none transition-all duration-200">
          <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-600" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input type="text" name="search" value="{{ request('search') }}"
          placeholder="Cari berdasarkan nama mobil, merk, atau tipe..."
          class="block w-full pl-12 pr-4 py-3.5 md:py-4 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 text-gray-900 placeholder-gray-400 hover:border-gray-300 bg-white/50 focus:bg-white">
      </div>
    </div>

    <!-- Filters Grid dengan responsive design yang lebih baik -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 md:gap-5">
      <!-- Category -->
      <div class="group">
        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
          <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
          </svg>
          Kategori
        </label>
        <select name="category"
          class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none bg-select-arrow">
          <option value="">Semua Kategori</option>
          <option value="SUV" {{ request('category') == 'SUV' ? 'selected' : '' }}>🚙 SUV</option>
          <option value="MPV" {{ request('category') == 'MPV' ? 'selected' : '' }}>🚐 MPV</option>
          <option value="Sedan" {{ request('category') == 'Sedan' ? 'selected' : '' }}>🚗 Sedan
          </option>
          <option value="Hatchback" {{ request('category') == 'Hatchback' ? 'selected' : '' }}>🚕
            Hatchback</option>
        </select>
      </div>

      <!-- Seats -->
      <div class="group">
        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
          <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          Kapasitas
        </label>
        <select name="seats"
          class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none bg-select-arrow">
          <option value="">Semua Kapasitas</option>
          <option value="2" {{ request('seats') == '2' ? 'selected' : '' }}>2 Kursi</option>
          <option value="4" {{ request('seats') == '4' ? 'selected' : '' }}>4 Kursi</option>
          <option value="5" {{ request('seats') == '5' ? 'selected' : '' }}>5 Kursi</option>
          <option value="7" {{ request('seats') == '7' ? 'selected' : '' }}>7 Kursi</option>
          <option value="7+" {{ request('seats') == '7+' ? 'selected' : '' }}>> 7 Kursi</option>
        </select>
      </div>

      <!-- Transmission -->
      <div class="group">
        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
          <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
          </svg>
          Transmisi
        </label>
        <select name="transmission"
          class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none bg-select-arrow">
          <option value="">Semua Transmisi</option>
          <option value="AT" {{ request('transmission') == 'AT' ? 'selected' : '' }}>⚙️ Otomatis
            (AT)</option>
          <option value="MT" {{ request('transmission') == 'MT' ? 'selected' : '' }}>🔧 Manual (MT)
          </option>
        </select>
      </div>

      <!-- Fuel Type -->
      <div class="group">
        <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center gap-2">
          <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
          </svg>
          Bahan Bakar
        </label>
        <select name="fuel_type"
          class="custom-select w-full px-4 py-3.5 border-2 border-gray-200 rounded-2xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 bg-white transition-all duration-200 hover:border-gray-300 cursor-pointer appearance-none bg-select-arrow">
          <option value="">Semua Bahan Bakar</option>
          <option value="Bensin" {{ request('fuel_type') == 'Bensin' ? 'selected' : '' }}>⛽ Bensin
          </option>
          <option value="Diesel" {{ request('fuel_type') == 'Diesel' ? 'selected' : '' }}>🛢️ Diesel
          </option>
          <option value="Hybrid" {{ request('fuel_type') == 'Hybrid' ? 'selected' : '' }}>🔋 Hybrid
          </option>
          <option value="Listrik" {{ request('fuel_type') == 'Listrik' ? 'selected' : '' }}>⚡
            Listrik</option>
        </select>
      </div>
    </div>

    <!-- Action Buttons dengan improved design -->
    <div class="flex flex-col sm:flex-row gap-3 justify-end pt-4 border-t border-gray-100">
      <a href="{{ route('cars.index') }}"
        class="inline-flex items-center justify-center gap-2 px-6 py-3.5 border-2 border-gray-200 rounded-xl text-gray-700 hover:bg-gray-50 hover:border-gray-300 transition-all duration-200 font-semibold">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>
        Reset Filter
      </a>
      <button type="submit"
        class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white rounded-xl transition-all duration-200 font-semibold shadow-lg shadow-blue-600/30 hover:shadow-xl hover:shadow-blue-600/40">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        Terapkan Filter
      </button>
    </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('filterForm');
    const carsGrid = document.getElementById('carsGrid');
    const skeletonLoading = document.getElementById('skeletonLoading');

    // Show skeleton loading on form submit
    form.addEventListener('submit', function () {
      carsGrid.classList.add('hidden');
      skeletonLoading.classList.remove('hidden');
    });

    // Optional: Add loading state for select changes
    const selects = form.querySelectorAll('select');
    selects.forEach(select => {
      select.addEventListener('change', function () {
        // Auto submit on change (optional)
        // form.submit();
      });
    });

  });
</script>