<x-guest-layout>
  <div class="mb-4 text-sm text-gray-600">
    {{ __('Demi keamanan akun GRC Rental Anda, silakan buat password baru yang hanya Anda ketahui.') }}
  </div>

  <form method="POST" action="{{ route('password.force-update') }}">
    @csrf
    @method('patch')

    <div class="mt-4">
      <x-input-label for="password" value="Password Baru" />
      <div class="relative mt-1">
        <x-text-input id="password" name="password" type="password" class="block w-full pr-12" required />
        <button type="button" onclick="togglePassword('password', this)"
          class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg id="eye-password" class="w-5 h-5 eye-open" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
            </path>
          </svg>
          <svg id="eye-off-password" class="w-5 h-5 eye-close hidden" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
            </path>
          </svg>
        </button>
      </div>
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="mt-4">
      <x-input-label for="password_confirmation" value="Konfirmasi Password Baru" />
      <div class="relative mt-1">
        <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block w-full pr-12"
          required />
        <button type="button" onclick="togglePassword('password_confirmation', this)"
          class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-400 hover:text-gray-600 transition-colors">
          <svg id="eye-password_confirmation" class="w-5 h-5 eye-open" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
            </path>
          </svg>
          <svg id="eye-off-password_confirmation" class="w-5 h-5 eye-close hidden" fill="none" stroke="currentColor"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21">
            </path>
          </svg>
        </button>
      </div>
    </div>

    <div class="flex items-center justify-end mt-4">
      <button type="submit"
        class="bg-emerald-600 text-white px-4 py-2 rounded-lg font-bold shadow-lg shadow-emerald-200 hover:bg-emerald-700 transition-all duration-200">
        Simpan & Lanjut ke Dashboard
      </button>
    </div>
  </form>

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