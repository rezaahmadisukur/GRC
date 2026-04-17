<x-admin-layout>



  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Tambah Mobil Baru
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
              <!-- Name Field -->
              <div>
                <x-input-label for="name" :value="__('Nama Mobil')" />
                <x-text-input id="name" name="name" type="text" :value="old('name')" required class="mt-1 block w-full"
                  placeholder="Contoh: Inova Ribon, Avanza" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
              </div>

              <!-- Plate Code Field -->
              <div>
                <x-input-label for="plate_code" :value="__('Kode Plat')" />
                <x-text-input id="plate_code" name="plate_code" type="text" :value="old('plate_code')" required
                  class="mt-1 block w-full" placeholder="Contoh: TRM, ALZ, TYV" />
                <x-input-error :messages="$errors->get('plate_code')" class="mt-2" />
              </div>

              <!-- Color Field -->
              <div>
                <x-input-label for="color" :value="__('Warna')" />
                <x-text-input id="color" name="color" type="text" :value="old('color')" required
                  class="mt-1 block w-full" placeholder="Contoh: Merah, Biru, Hitam" />
                <x-input-error :messages="$errors->get('color')" class="mt-2" />
              </div>

              <!-- Transmission Field -->
              <div>
                <x-input-label for="transmission" :value="__('Transmisi')" />
                <select id="transmission" name="transmission" required
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                  <option value="AT" {{ old('transmission') == 'AT' ? 'selected' : '' }}>Automatic (AT)</option>
                  <option value="MT" {{ old('transmission') == 'MT' ? 'selected' : '' }}>Manual (MT)</option>
                </select>
                <x-input-error :messages="$errors->get('transmission')" class="mt-2" />
              </div>

              <!-- Price 12h Field -->
              <div>
                <x-input-label for="price_12h" :value="__('Harga 12 Jam')" />
                <x-text-input id="price_12h" name="price_12h" type="number" :value="old('price_12h')" required
                  class="mt-1 block w-full" placeholder="Contoh: 150000" />
                <x-input-error :messages="$errors->get('price_12h')" class="mt-2" />
              </div>

              <!-- Price 24h Field -->
              <div>
                <x-input-label for="price_24h" :value="__('Harga 24 Jam')" />
                <x-text-input id="price_24h" name="price_24h" type="number" :value="old('price_24h')" required
                  class="mt-1 block w-full" placeholder="Contoh: 250000" />
                <x-input-error :messages="$errors->get('price_24h')" class="mt-2" />
              </div>

              <!-- Image Field -->
              <div>
                <x-input-label for="image" :value="__('Gambar')" />
                <input type="file" id="image" name="image" accept="image/*"
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                @if(old('image'))
                  <p class="mt-2 text-sm text-gray-500">File saat ini: {{ old('image') }}</p>
                @endif
              </div>

              <!-- Is Available Field -->
              <div class="sm:col-span-2">
                <label for="is_available" class="flex items-center">
                  <input type="checkbox" id="is_available" name="is_available" value="1"
                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" {{ old('is_available', 1) ? 'checked' : '' }}>
                  <span class="ml-2 text-sm text-gray-700">Tersedia untuk disewa</span>
                </label>
                <x-input-error :messages="$errors->get('is_available')" class="mt-2" />
              </div>
            </div>

            <div class="flex justify-end mt-6">
              <a href="{{ route('admin.cars.index') }}"
                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">
                {{ __('Batal') }}
              </a>
              <x-primary-button class="ml-3">
                {{ __('Simpan Mobil') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</x-admin-layout>