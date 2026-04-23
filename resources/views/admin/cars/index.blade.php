<x-admin-layout>

  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Pengelolaan Mobil
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
                        <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="delete-form"
                          data-car-name="{{ $car->name }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="10" class="px-6 py-16">
                      <div class="flex flex-col items-center justify-center text-center">
                        <!-- Empty State Illustration -->
                        <div class="mb-6">
                          <div class="w-32 h-32 mx-auto mb-4 rounded-full bg-gray-100 flex items-center justify-center">
                            <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z">
                              </path>
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1">
                              </path>
                            </svg>
                          </div>
                        </div>

                        <!-- Text Content -->
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                          Tidak ada mobil ditemukan
                        </h3>
                        <p class="text-gray-500 mb-6 max-w-md">
                          Saat ini belum ada data mobil yang terdaftar. Anda bisa menambahkan mobil baru dengan klik
                          tombol di bawah ini.
                        </p>

                        <!-- Action Button -->
                        <a href="{{ route('admin.cars.create') }}"
                          class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-200 shadow-sm hover:shadow-md font-medium">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                          </svg>
                          Tambah Mobil Pertama
                        </a>

                        <!-- Helper Tip -->
                        <p class="mt-6 text-sm text-gray-400">
                          Atau coba ubah filter pencarian di atas
                        </p>
                      </div>
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

          <!-- Pagination -->
          @if(isset($cars) && $cars->hasPages())
            <div class="mt-6 flex">
              {{ $cars->links() }}
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <!-- Custom Confirm Delete Modal -->
  <div id="deleteConfirmModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm transition-opacity" id="deleteModalOverlay">
    </div>
    <div class="flex items-center justify-center min-h-screen p-4">
      <div
        class="bg-white rounded-xl shadow-2xl max-w-md w-full transform transition-all duration-300 scale-95 opacity-0"
        id="deleteModalBox">
        <div class="p-6">
          <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 rounded-full bg-red-100">
            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
              </path>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-center text-gray-900 mb-2">Konfirmasi Hapus</h3>
          <p class="text-gray-600 text-center mb-6">
            Anda yakin ingin menghapus mobil <strong id="deleteCarName" class="text-gray-900"></strong>?<br>
            <span class="text-sm text-gray-500">Tindakan ini tidak dapat dibatalkan.</span>
          </p>
          <div class="flex gap-3 justify-center">
            <button id="cancelDeleteBtn"
              class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
              Batal
            </button>
            <button id="confirmDeleteBtn"
              class="px-6 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition font-medium">
              Ya, Hapus
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    let activeFormToSubmit = null;
    const modal = document.getElementById('deleteConfirmModal');
    const modalOverlay = document.getElementById('deleteModalOverlay');
    const modalBox = document.getElementById('deleteModalBox');
    const deleteCarName = document.getElementById('deleteCarName');
    const cancelBtn = document.getElementById('cancelDeleteBtn');
    const confirmBtn = document.getElementById('confirmDeleteBtn');

    // Listen all delete forms
    document.querySelectorAll('.delete-form').forEach(form => {
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        activeFormToSubmit = this;

        // Show car name in modal
        deleteCarName.textContent = this.dataset.carName;

        // Open modal with animation
        modal.classList.remove('hidden');
        setTimeout(() => {
          modalOverlay.classList.add('opacity-100');
          modalBox.classList.remove('scale-95', 'opacity-0');
          modalBox.classList.add('scale-100', 'opacity-100');
        }, 10);
      });
    });

    // Cancel button
    cancelBtn.addEventListener('click', closeDeleteModal);
    modalOverlay.addEventListener('click', closeDeleteModal);

    function closeDeleteModal() {
      modalBox.classList.remove('scale-100', 'opacity-100');
      modalBox.classList.add('scale-95', 'opacity-0');
      modalOverlay.classList.remove('opacity-100');

      setTimeout(() => {
        modal.classList.add('hidden');
        activeFormToSubmit = null;
      }, 200);
    }

    // Confirm button - submit the actual form
    confirmBtn.addEventListener('click', function () {
      if (activeFormToSubmit) {
        activeFormToSubmit.submit();
      }
    });

    // Close with Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
        closeDeleteModal();
      }
    });
  </script>

</x-admin-layout>