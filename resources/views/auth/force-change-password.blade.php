<x-guest-layout>
  <div class="w-full max-w-md mx-auto">
    <!-- Auth Card Container -->
    <div class="bg-white/90 backdrop-blur-xl rounded-3xl border border-gray-200/50 shadow-2xl p-6 sm:p-8 md:p-10">

      <!-- Header -->
      <div class="mb-8 text-center">
        <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight mb-2">
          Buat Password Baru
        </h1>
        <p class="text-slate-500 text-sm md:text-base">
          Demi keamanan akun GRC Rental Anda, silakan buat password baru yang hanya Anda ketahui.
        </p>
      </div>

      <!-- Success Status -->
      @if (session('status'))
        <div class="mb-5 p-4 bg-green-50 border border-green-200 rounded-xl text-sm text-green-600">
          {{ session('status') }}
        </div>
      @endif

      <!-- Force Change Password Form -->
      <form method="POST" action="{{ route('password.force-update') }}">
        @csrf
        @method('patch')

        <!-- Password Field -->
        <div class="mb-4">
          <label for="password" class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
            Password Baru
          </label>
          <div class="relative">
            <input id="password" name="password" type="password" required
              class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-slate-900 text-sm font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 hover:border-gray-300 placeholder:text-slate-400 pr-12"
              placeholder="Masukkan password baru..." />
            <button type="button" onclick="togglePassword('password', this)"
              class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 transition-colors">
              <!-- Eye Open Icon -->
              <svg id="eye-password" class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                </path>
              </svg>
              <!-- Eye Closed Icon -->
              <svg id="eye-off-password" class="w-5 h-5 eye-close hidden" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                </path>
              </svg>
            </button>
          </div>
          @error('password')
            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <!-- Confirm Password Field -->
        <div class="mb-6">
          <label for="password_confirmation"
            class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
            Konfirmasi Password Baru
          </label>
          <div class="relative">
            <input id="password_confirmation" name="password_confirmation" type="password" required
              class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-slate-900 text-sm font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-emerald-500/20 focus:border-emerald-500 hover:border-gray-300 placeholder:text-slate-400 pr-12"
              placeholder="Ulangi password baru..." />
            <button type="button" onclick="togglePassword('password_confirmation', this)"
              class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 transition-colors">
              <!-- Eye Open Icon -->
              <svg id="eye-password_confirmation" class="w-5 h-5 eye-open" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                </path>
              </svg>
              <!-- Eye Closed Icon -->
              <svg id="eye-off-password_confirmation" class="w-5 h-5 eye-close hidden" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
                </path>
              </svg>
            </button>
          </div>
          @error('password_confirmation')
            <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
          @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit"
          class="group w-full py-3 px-4 bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 text-white font-bold text-sm md:text-base rounded-xl shadow-lg shadow-emerald-200 hover:shadow-emerald-300 transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 active:shadow-md flex items-center justify-center gap-2">
          <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
            <polyline points="10 17 15 12 10 7"></polyline>
            <line x1="15" y1="12" x2="3" y2="12"></line>
          </svg>
          Simpan & Lanjut ke Dashboard
        </button>
      </form>
    </div>
  </div>

  <script>
    function togglePassword(inputId, button) {
      const input = document.getElementById(inputId);
      const eyeOpen = button.querySelector('.eye-open');
      const eyeClose = button.querySelector('.eye-close');

      if (input.type === 'password') {
        input.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClose.classList.remove('hidden');
      } else {
        input.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeClose.classList.add('hidden');
      }
    }
  </script>
</x-guest-layout>