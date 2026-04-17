<x-admin-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Kelola Mobil
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <!-- Action Buttons -->
      <div class="mb-6 flex justify-between items-center">
        <div>
          <a href="{{ route('admin.cars.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
            Tambah Mobil Baru
          </a>
        </div>
        <div class="flex space-x-2">
          <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition">
            Export Excel
          </button>
          <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
            Refresh
          </button>
        </div>
      </div>

      <!-- Search and Filter -->
      <div class="mb-6 bg-white p-4 rounded-lg shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
          <div>
            <input type="text" placeholder="Cari mobil..."
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div>
            <select
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="">Semua transmisi</option>
              <option value="AT">Automatic (AT)</option>
              <option value="MT">Manual (MT)</option>
            </select>
          </div>
          <div>
            <select
              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
              <option value="">Semua status</option>
              <option value="1">Tersedia</option>
              <option value="0">Tidak tersedia</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Data Table -->
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    ID
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Nama Mobil
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Plat
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Warna
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Transmisi
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Harga 12 Jam
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Harga 24 Jam
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Gambar
                  </th>
                  <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                  </th>
                  <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Actions</span>
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                @forelse($cars as $car)
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                      {{ $car->id }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                      {{ $car->name }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                      {{ $car->plate_code }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                      {{ $car->color }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                      {{ $car->transmission == 'AT' ? 'Automatic' : 'Manual' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">
                      Rp {{ number_format($car->price_12h, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">
                      Rp {{ number_format($car->price_24h, 0, ',', '.') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                      @if($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="Gambar mobil"
                          class="h-8 w-8 rounded-full object-cover">
                      @else
                        <span class="text-gray-400">Tidak ada</span>
                      @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <span
                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $car->is_available ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $car->is_available ? 'Tersedia' : 'Tidak tersedia' }}
                      </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                      <div class="flex space-x-2">
                        <a href="{{ route('admin.cars.edit', $car) }}"
                          class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <form action="{{ route('admin.cars.destroy', $car) }}" method="POST"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="10" class="px-6 py-4 text-center text-sm text-gray-500">
                      Tidak ada data mobil
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          @if(isset($cars) && $cars->hasPages())
            <div class="mt-6 flex justify-center">
              {{ $cars->links() }}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

</x-admin-layout>