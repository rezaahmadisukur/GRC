<x-admin-layout>

  <x-slot name="header">
    <div>
      <h1 class="text-2xl font-bold text-gray-800">Manajemen Staff</h1>
      <p class="text-gray-500 mt-1">Kelola admin dan staff sistem</p>
    </div>
  </x-slot>

  <div class="container mx-auto px-4 py-6">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
      <button onclick="openModal()"
        class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md flex items-center gap-2 w-fit">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Tambah Admin Baru
      </button>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
      <div class="overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="bg-gray-50 border-b border-gray-100">
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Username</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100">
            @forelse($staffs as $key => $staff)
                      <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-sm text-gray-600 font-medium">{{ $key + 1 }}</td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $staff->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $staff->username }}</td>
                        <td class="px-6 py-4">
                          @if($staff->is_active)
                            <span
                              class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-700">
                              Aktif
                            </span>
                          @else
                            <span
                              class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-700">
                              Nonaktif
                            </span>
                          @endif
                        </td>
                        <td class="px-6 py-4">
                          <form action="{{ route('admin.staff.toggle', $staff->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="px-4 py-1.5 text-xs font-medium rounded-lg transition-all duration-200 
                                                                  {{ $staff->is_active
              ? 'bg-amber-100 text-amber-700 hover:bg-amber-200'
              : 'bg-gray-100 text-gray-700 hover:bg-gray-200' 
                                                                  }}">
                              {{ $staff->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                            </button>
                          </form>
                        </td>
                      </tr>
            @empty
              <tr>
                <td colspan="5" class="px-6 py-12 text-center">
                  <svg class="w-12 h-12 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                    </path>
                  </svg>
                  <p class="text-gray-500 font-medium">Belum ada admin terdaftar</p>
                  <p class="text-gray-400 text-sm mt-1">Klik tombol Tambah Admin Baru untuk menambahkan</p>
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Admin -->
  <div id="addModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
      <div class="bg-white rounded-xl shadow-xl w-full max-w-md relative animate-in fade-in zoom-in duration-200">
        <div class="p-6 border-b border-gray-100">
          <h3 class="text-lg font-bold text-gray-800">Tambah Admin Baru</h3>
          <p class="text-gray-500 text-sm mt-1">Isi data untuk mendaftarkan admin baru</p>
        </div>

        <form action="{{ route('admin.staff.store') }}" method="POST">
          @csrf
          <div class="p-6 space-y-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1.5">Nama Lengkap</label>
              <input type="text" name="name" value="{{ old('name') }}"
                class="w-full px-4 py-2.5 border @error('name') border-red-300 focus:ring-red-500 @else border-gray-200 focus:ring-blue-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                placeholder="Masukkan nama lengkap">
              @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1.5">Username</label>
              <input type="text" name="username" value="{{ old('username') }}" 
                class="w-full px-4 py-2.5 border @error('username') border-red-300 focus:ring-red-500 @else border-gray-200 focus:ring-blue-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                placeholder="Masukkan username">
              @error('username')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
              <div class="relative">
                <input type="password" name="password" id="password" minlength="6" 
                  class="w-full px-4 py-2.5 pr-12 border @error('password') border-red-300 focus:ring-red-500 @else border-gray-200 focus:ring-blue-500 @enderror rounded-lg focus:outline-none focus:ring-2 focus:border-transparent transition-all"
                  placeholder="Minimal 6 karakter">
                <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600 transition-colors rounded-r-lg">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
                </button>
              </div>
              @error('password')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1.5">Konfirmasi Password</label>
              <div class="relative">
                <input type="password" name="password_confirmation" id="password_confirmation" minlength="6" 
                  class="w-full px-4 py-2.5 pr-12 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                  placeholder="Ulangi password">
                <button type="button" onclick="togglePassword('password_confirmation', this)" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600 transition-colors rounded-r-lg">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>

          <div class="p-6 border-t border-gray-100 flex justify-end gap-3">
            <button type="button" onclick="closeModal()"
              class="px-5 py-2 text-gray-600 hover:bg-gray-100 font-medium rounded-lg transition-all">
              Batal
            </button>
            <button type="submit"
              class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-all shadow-sm">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    function openModal() {
      document.getElementById('addModal').classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closeModal() {
      document.getElementById('addModal').classList.add('hidden');
      document.body.style.overflow = '';
    }

    // Escape key to close modal
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        closeModal();
      }
    });

    // Toggle password visibility
    function togglePassword(inputId, button) {
      const input = document.getElementById(inputId);
      const isPassword = input.type === 'password';
      
      input.type = isPassword ? 'text' : 'password';
      
      if (isPassword) {
        button.innerHTML = `
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
          </svg>
        `;
      } else {
        button.innerHTML = `
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
          </svg>
        `;
      }
    }

    // Auto open modal if there are validation errors
    @if($errors->any())
      openModal();
    @endif

    // Password match validation before submit
    document.querySelector('form').addEventListener('submit', function(e) {
      const password = document.getElementById('password').value;
      const confirmPassword = document.getElementById('password_confirmation').value;
      
      if (password !== confirmPassword) {
        e.preventDefault();
        alert('Password dan Konfirmasi Password tidak cocok!');
      }
    });
  </script>

</x-admin-layout>