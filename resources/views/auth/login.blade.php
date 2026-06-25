<x-guest-layout title="Masuk">
    <div class="w-full max-w-md mx-auto">
        <!-- Auth Card Container -->
        <div class="bg-white/90 backdrop-blur-xl rounded-3xl border border-gray-200/50 shadow-2xl p-6 sm:p-8 md:p-10">

            <!-- Header -->
            <div class="mb-8 text-center">
                <h1 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight mb-2">
                    Selamat Datang
                </h1>
                <p class="text-slate-500 text-sm md:text-base">
                    Masukkan identitas Anda untuk melanjutkan
                </p>
            </div>

            <!-- Error Alert -->
            @error('login_failed')
                <div class="mb-5 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <p class="text-sm font-semibold text-red-600 mb-1">Terjadi kesalahan</p>
                    <p class="text-sm text-red-500">{{ $message }}</p>
                </div>
            @enderror

            <!-- Success Status -->
            @if (session('status'))
                <div class="mb-5 p-4 bg-green-50 border border-green-200 rounded-xl text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username Field -->
                <div class="mb-4">
                    <label for="username"
                        class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
                        Username
                    </label>
                    <input id="username" type="text" name="username" value="{{ old('username') }}" autofocus
                        autocomplete="username"
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-slate-900 text-sm font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 hover:border-gray-300 placeholder:text-slate-400"
                        placeholder="Masukkan username..." />
                    @error('username')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label for="password"
                        class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">
                        Password
                    </label>
                    <input id="password" type="password" name="password" autocomplete="current-password"
                        class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl text-slate-900 text-sm font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 hover:border-gray-300 placeholder:text-slate-400"
                        placeholder="••••••••" />
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-2">
                        <input id="remember_me" type="checkbox" name="remember"
                            class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500/20 cursor-pointer" />
                        <label for="remember_me" class="text-sm text-slate-600 cursor-pointer select-none">
                            Ingat saya
                        </label>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="login-button"
                    class="group w-full py-3 px-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold text-sm md:text-base rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-blue-500/50 transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 active:shadow-md flex items-center justify-center gap-2">
                    <svg id="login-icon" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                        <polyline points="10 17 15 12 10 7" />
                        <line x1="15" y1="12" x2="3" y2="12" />
                    </svg>
                    <span id="login-text">Masuk</span>
                    <svg id="login-spinner" class="hidden w-5 h-5 animate-spin" viewBox="0 0 24 24" fill="none">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                        </circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z">
                        </path>
                    </svg>
                </button>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.querySelector('form').addEventListener('submit', () => {
                const btn = document.getElementById("login-button");
                const icon = document.getElementById("login-icon");
                const text = document.getElementById("login-text");
                const spinner = document.getElementById("login-spinner")

                btn.disabled = true;
                btn.classList.add('opacity-75', 'cursor-not-allowed')
                icon.classList.add('hidden');
                text.textContent = 'Masuk...'
                spinner.classList.remove('hidden')
            })
        </script>
    @endpush
</x-guest-layout>