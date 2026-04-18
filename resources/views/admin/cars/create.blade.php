{{-- Use Admin Layout --}}
<x-admin-layout>
  <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 px-4 py-8 md:px-6 lg:px-8">
    <!-- Page Header -->
    <div class="mb-8 max-w-4xl mx-auto">
      <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <div>
          <h1 class="text-[clamp(1.75rem,3vw,2.5rem)] font-bold text-slate-800 tracking-tight">Tambah Mobil Baru</h1>
          <p class="text-slate-500 mt-1">Masukkan informasi dan detail kendaraan baru.</p>
        </div>
        <a href="{{ route('admin.cars.index') }}"
          class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-slate-600 bg-white rounded-xl border border-slate-200 shadow-sm hover:bg-slate-50 hover:border-slate-300 transition-all duration-200">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
            </path>
          </svg>
          Kembali ke Daftar
        </a>
      </div>
    </div>

    <!-- Main Form Card -->
    <div class="max-w-4xl mx-auto">
      <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <!-- Form Header -->
        <div class="px-6 py-5 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-white">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
              <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1">
                </path>
              </svg>
            </div>
            <div>
              <h2 class="text-lg font-semibold text-slate-800">Detail Kendaraan</h2>
              <p class="text-sm text-slate-500">Mobil baru yang akan ditambahkan ke sistem</p>
            </div>
          </div>
        </div>

        <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-8">
          @csrf

          <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <!-- Vehicle Name -->
            <div class="group">
              <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama Mobil</label>
              <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="w-full px-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 placeholder:text-slate-400 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-200 @error('name') border-red-500 focus:ring-red-500/10 @enderror"
                placeholder="e.g Toyota Avanza, Honda Innova">
              @error('name')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Plate Code -->
            <div class="group">
              <label for="plate_code" class="block text-sm font-medium text-slate-700 mb-2">Kode Plat</label>
              <input type="text" id="plate_code" name="plate_code" value="{{ old('plate_code') }}" maxlength="3"
                class="w-full px-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 placeholder:text-slate-400 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-200 uppercase tracking-widest font-medium @error('plate_code') border-red-500 focus:ring-red-500/10 @enderror"
                placeholder="TRM">
              @error('plate_code')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Color -->
            <div class="group">
              <label for="color" class="block text-sm font-medium text-slate-700 mb-2">Warna Mobil</label>
              <input type="text" id="color" name="color" value="{{ old('color') }}"
                class="w-full px-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 placeholder:text-slate-400 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-200 @error('color') border-red-500 focus:ring-red-500/10 @enderror"
                placeholder="Black, White, Silver">
              @error('color')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Transmission -->
            <div class="group">
              <label for="transmission" class="block text-sm font-medium text-slate-700 mb-2">Transmisi</label>
              <div class="flex gap-3">
                <label class="flex-1 cursor-pointer">
                  <input type="radio" name="transmission" value="AT" class="peer sr-only" {{ old('transmission') === 'AT' ? 'checked' : '' }}>
                  <div
                    class="px-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-center font-medium text-slate-600 peer-checked:bg-blue-50 peer-checked:border-blue-500 peer-checked:text-blue-600 transition-all duration-200">
                    Automatic (AT)
                  </div>
                </label>
                <label class="flex-1 cursor-pointer">
                  <input type="radio" name="transmission" value="MT" class="peer sr-only" {{ old('transmission') === 'MT' ? 'checked' : '' }}>
                  <div
                    class="px-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-center font-medium text-slate-600 peer-checked:bg-blue-50 peer-checked:border-blue-500 peer-checked:text-blue-600 transition-all duration-200">
                    Manual (MT)
                  </div>
                </label>
              </div>
              @error('transmission')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Price 12 Hours -->
            <div class="group">
              <label for="price_12h" class="block text-sm font-medium text-slate-700 mb-2">Harga 12 Jam</label>
              <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-medium">Rp</span>
                <input type="number" id="price_12h" name="price_12h" value="{{ old('price_12h') }}" min="0"
                  class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 placeholder:text-slate-400 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-200 @error('price_12h') border-red-500 focus:ring-red-500/10 @enderror"
                  placeholder="350000">
              </div>
              @error('price_12h')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Price 24 Hours -->
            <div class="group">
              <label for="price_24h" class="block text-sm font-medium text-slate-700 mb-2">Harga 24 Jam</label>
              <div class="relative">
                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-medium">Rp</span>
                <input type="number" id="price_24h" name="price_24h" value="{{ old('price_24h') }}" min="0"
                  class="w-full pl-12 pr-4 py-3.5 rounded-xl border border-slate-200 bg-slate-50 text-slate-800 placeholder:text-slate-400 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all duration-200 @error('price_24h') border-red-500 focus:ring-red-500/10 @enderror"
                  placeholder="550000">
              </div>
              @error('price_24h')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Image Upload -->
            <div class="md:col-span-2 group">
              <label for="image" class="block text-sm font-medium text-slate-700 mb-2">Gambar Mobil</label>
              <div
                class="border-2 border-dashed border-slate-200 rounded-xl bg-slate-50 p-6 transition-all duration-200 hover:border-blue-300 hover:bg-blue-50/30">
                <input type="file" id="image" name="image" accept="image/*"
                  class="w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="mt-2 text-xs text-slate-400">PNG, JPG up to 2MB</p>
              </div>
              @error('image')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>

            <!-- Availability Status -->
            <div class="md:col-span-2 group">
              <label class="block text-sm font-medium text-slate-700 mb-3">Status Ketersediaan</label>
              <label class="relative inline-flex items-center cursor-pointer">
                <input type="hidden" name="is_available" value="0">
                <input type="checkbox" name="is_available" value="1" class="sr-only peer" {{ old('is_available', 1) ? 'checked' : '' }}>
                <div
                  class="w-14 h-7 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-500/20 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[4px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-emerald-500">
                </div>
                <span class="ms-4 text-sm font-medium text-slate-700">Kendaraan tersedia untuk disewa</span>
              </label>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="mt-10 pt-6 border-t border-slate-100 flex flex-col sm:flex-row gap-3 sm:justify-end">
            <a href="{{ route('admin.cars.index') }}"
              class="px-6 py-3.5 text-sm font-medium text-slate-600 bg-white rounded-xl border border-slate-200 hover:bg-slate-50 transition-all duration-200 text-center">
              Batal
            </a>
            <button type="submit"
              class="px-8 py-3.5 text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl shadow-lg shadow-blue-600/25 hover:shadow-xl hover:shadow-blue-600/30 hover:-translate-y-0.5 transition-all duration-200">
              Simpan Mobil Baru
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-admin-layout>