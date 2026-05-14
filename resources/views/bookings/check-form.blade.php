<x-app-layout title="Cek Pemesanan">
  <div
    class="min-h-screen relative py-16 px-4 sm:px-6 lg:px-8 overflow-hidden bg-gradient-to-br from-sky-50 via-blue-50 to-green-50">

    {{-- ═══ BACKGROUND ═══ --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
      {{-- Blobs --}}
      <div
        class="absolute -top-40 -left-40 w-[500px] h-[500px] rounded-full opacity-25 animate-pulse bg-[radial-gradient(circle,#bfdbfe,transparent_70%)] [animation-duration:7s]">
      </div>
      <div
        class="absolute -bottom-40 -right-40 w-[500px] h-[500px] rounded-full opacity-20 animate-pulse bg-[radial-gradient(circle,#bbf7d0,transparent_70%)] [animation-duration:9s] [animation-delay:3s]">
      </div>
      <div
        class="absolute top-1/2 right-0 w-72 h-72 rounded-full opacity-15 animate-pulse bg-[radial-gradient(circle,#e0e7ff,transparent_70%)] [animation-duration:6s] [animation-delay:1s]">
      </div>

      {{-- Dot grid --}}
      <div
        class="absolute inset-0 opacity-[0.35] bg-[radial-gradient(circle,#94a3b8_1px,transparent_1px)] bg-[length:32px_32px]">
      </div>

      {{-- Floating shapes --}}
      <div
        class="absolute top-16 left-[8%] w-14 h-14 rounded-2xl opacity-[0.12] float-shape bg-gradient-to-br from-blue-500 to-blue-700 [--r:15deg]">
      </div>
      <div
        class="absolute top-28 right-[10%] w-9 h-9 rounded-xl opacity-[0.10] float-shape bg-gradient-to-br from-emerald-500 to-emerald-700 [--r:-12deg] [animation-delay:1.2s]">
      </div>
      <div
        class="absolute bottom-28 left-[12%] w-11 h-11 rounded-2xl opacity-[0.08] float-shape bg-gradient-to-br from-violet-500 to-violet-700 [--r:8deg] [animation-delay:2.4s]">
      </div>
      <div
        class="absolute bottom-40 right-[14%] w-7 h-7 rounded-xl opacity-[0.12] float-shape bg-gradient-to-br from-amber-500 to-amber-700 [--r:-20deg] [animation-delay:0.8s]">
      </div>
      <div
        class="absolute top-1/2 left-[4%] w-5 h-5 rounded-full opacity-20 float-shape bg-blue-500 [animation-delay:1.8s]">
      </div>
      <div
        class="absolute top-1/3 right-[6%] w-4 h-4 rounded-full opacity-15 float-shape bg-emerald-500 [animation-delay:3.2s]">
      </div>
      <div
        class="absolute bottom-1/4 left-1/3 w-3 h-3 rounded-full opacity-20 float-shape bg-amber-500 [animation-delay:0.4s]">
      </div>
    </div>

    <div class="relative max-w-3xl mx-auto">

      {{-- ═══ PAGE HEADER ═══ --}}
      <div class="text-center mb-10">
        {{-- Icon --}}
        <div class="relative inline-flex items-center justify-center mb-5">
          <div class="absolute w-24 h-24 rounded-full opacity-15 animate-pulse bg-blue-600 [animation-duration:3s]">
          </div>
          <div
            class="absolute w-[72px] h-[72px] rounded-full opacity-10 animate-pulse bg-blue-600 [animation-duration:3s] [animation-delay:0.5s]">
          </div>
          <div
            class="relative w-16 h-16 rounded-2xl flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-800 shadow-xl shadow-blue-600/38">
            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.8">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
          </div>
        </div>

        <h1 class="text-3xl sm:text-4xl font-black tracking-tight mb-3 text-slate-900">
          Cek Status Pemesanan
        </h1>
        <p class="text-base leading-relaxed max-w-md mx-auto text-slate-500">
          Masukkan <span class="font-bold text-blue-600">kode pemesanan</span> atau
          <span class="font-bold text-blue-600">nomor WhatsApp</span> untuk melihat
          detail & riwayat pemesanan secara realtime
        </p>
      </div>

      {{-- ═══ ERROR STATE ═══ --}}
      @if(session('error'))
        <div
          class="mb-6 rounded-3xl overflow-hidden animate-slide-up bg-white/90 backdrop-blur-lg border border-red-200 shadow-lg shadow-red-500/08">
          <div class="h-1 bg-gradient-to-r from-red-500 to-red-400"></div>
          <div class="p-5 flex items-start gap-4">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 bg-red-100">
              <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <div>
              <h3 class="font-black text-red-800 text-sm mb-0.5">Pemesanan Tidak Ditemukan</h3>
              <p class="text-sm font-medium text-red-500 leading-relaxed">{{ session('error') }}</p>
            </div>
          </div>
        </div>
      @endif

      {{-- ═══ FORM CARD ═══ --}}
      <div class="relative">
        {{-- Card glow --}}
        <div class="absolute -inset-1 rounded-3xl opacity-20 blur-xl bg-gradient-to-br from-blue-200 to-green-200">
        </div>

        <div
          class="relative rounded-3xl overflow-hidden bg-white/93 backdrop-blur-2xl border border-white/90 shadow-xl shadow-black/07">

          {{-- Top gradient strip --}}
          <div class="h-1 bg-gradient-to-r from-blue-600 via-blue-500 to-emerald-500"></div>

          {{-- Form body --}}
          <div class="p-7 sm:p-10">
            <form action="{{ route('bookings.check.status') }}" method="POST" id="check-form">
              @csrf

              <div class="mb-6">
                <label for="query" class="block text-xs font-bold uppercase tracking-widest mb-3 text-slate-500">
                  Kode Pemesanan / Nomor WhatsApp
                </label>

                <div class="relative">
                  {{-- Search icon --}}
                  <div class="absolute left-4 top-1/2 -translate-y-1/2 pointer-events-none z-10" id="input-icon">
                    <svg class="w-5 h-5 transition-colors duration-300 text-slate-400 group-focus-within:text-blue-600"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                  </div>

                  <input type="text" id="query" name="query" placeholder="Contoh: BK-20240101-XXXX atau 08123456789"
                    value="{{ old('query') }}" autocomplete="off" class="w-full pl-12 pr-12 py-4 rounded-2xl text-sm font-medium outline-none transition-all duration-300 bg-slate-50 border border-slate-200 text-slate-800
                    focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-600/10">

                  {{-- Clear button --}}
                  <button type="button" id="clear-btn" onclick="clearInput()"
                    class="absolute right-4 top-1/2 -translate-y-1/2 w-6 h-6 rounded-full items-center justify-center transition-all duration-200 hover:scale-110 hidden bg-slate-200">
                    <svg class="w-3 h-3 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                      stroke-width="2.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>

                @error('query')
                  <div class="mt-2.5 flex items-center gap-1.5 animate-slide-up">
                    <svg class="w-3.5 h-3.5 text-red-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                      <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                    </svg>
                    <p class="text-xs font-semibold text-red-500">{{ $message }}</p>
                  </div>
                @enderror
              </div>

              {{-- Submit button --}}
              <button type="submit" id="submit-btn"
                class="relative w-full flex items-center justify-center gap-2.5 py-4 px-6 rounded-2xl font-black text-base text-white overflow-hidden transition-all duration-300 hover:-translate-y-0.5 active:scale-[0.98] group bg-gradient-to-br from-blue-600 to-blue-800 shadow-lg shadow-blue-600/35 hover:shadow-xl hover:shadow-blue-600/52">

                {{-- Shine --}}
                <div
                  class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-gradient-to-br from-white/14 via-transparent to-transparent">
                </div>

                {{-- Idle state --}}
                <span id="btn-idle" class="relative flex items-center gap-2.5">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
                  Cek Status Pemesanan
                </span>

                {{-- Loading state --}}
                <span id="btn-loading" class="relative items-center gap-2.5 hidden">
                  <svg class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                  </svg>
                  Mencari...
                </span>
              </button>
            </form>
          </div>

          {{-- Tips --}}
          <div class="px-7 sm:px-10 pb-7 sm:pb-9">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
              @php
                $tips = [
                  [
                    'icon' => 'M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z',
                    'text' => 'Kode pemesanan dikirim ke WhatsApp Anda setelah booking berhasil dibuat',
                    'color' => 'blue',
                  ],
                  [
                    'icon' => 'M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z',
                    'text' => 'Gunakan nomor WhatsApp yang didaftarkan saat melakukan pemesanan',
                    'color' => 'green',
                  ],
                ];
              @endphp
              @foreach($tips as $tip)
                <div
                  class="flex items-start gap-3 p-4 rounded-2xl transition-all duration-200 hover:-translate-y-0.5 cursor-default bg-{{ $tip['color'] }}-50 border border-{{ $tip['color'] }}-500/20 hover:border-{{ $tip['color'] }}-500/40 hover:shadow-md hover:shadow-black/04">
                  <div
                    class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5 bg-{{ $tip['color'] }}-500/15 border border-{{ $tip['color'] }}-500/25">
                    <svg class="w-4 h-4 text-{{ $tip['color'] }}-500" fill="none" stroke="currentColor"
                      viewBox="0 0 24 24" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="{{ $tip['icon'] }}" />
                    </svg>
                  </div>
                  <p class="text-xs leading-relaxed font-medium text-slate-500">
                    {{ $tip['text'] }}
                  </p>
                </div>
              @endforeach
            </div>
          </div>

          {{-- Footer --}}
          <div class="px-7 sm:px-10 py-5 flex items-center justify-between bg-slate-50 border-t border-slate-100">
            <p class="text-xs font-medium text-slate-400">Butuh bantuan langsung?</p>
            <a href="https://wa.me/6281234567890" target="_blank"
              class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white transition-all duration-200 hover:-translate-y-0.5 bg-gradient-to-br from-green-600 to-green-700 shadow-lg shadow-green-600/30 hover:shadow-xl hover:shadow-green-600/48">
              <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.87 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.825 0 00-3.48-8.413z" />
              </svg>
              Chat WhatsApp
            </a>
          </div>

        </div>
      </div>

      {{-- ═══ FOOTER NOTE ═══ --}}
      <div class="mt-8 text-center">
        <p class="text-xs font-medium text-slate-400">
          Jika mengalami kesulitan, silakan
          <a href="https://wa.me/6281234567890" target="_blank"
            class="font-bold transition-colors duration-200 text-blue-600 hover:underline">
            hubungi customer service kami
          </a>
        </p>
      </div>

    </div>
  </div>

  @once
    <style>
      @keyframes slideUp {
        from {
          opacity: 0;
          transform: translateY(14px);
        }

        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      .animate-slide-up {
        animation: slideUp 0.4s ease-out both;
      }

      @keyframes floatShape {

        0%,
        100% {
          transform: translateY(0) rotate(var(--r, 0deg));
        }

        50% {
          transform: translateY(-14px) rotate(var(--r, 0deg));
        }
      }

      .float-shape {
        animation: floatShape 5s ease-in-out infinite;
      }
    </style>
  @endonce

  @once
    <script>
      const queryInput = document.getElementById('query');
      const clearBtn = document.getElementById('clear-btn');
      const form = document.getElementById('check-form');
      const btnIdle = document.getElementById('btn-idle');
      const btnLoading = document.getElementById('btn-loading');
      const submitBtn = document.getElementById('submit-btn');

      function handleInput(input) {
        const hasValue = input.value.length > 0;
        clearBtn.classList.toggle('hidden', !hasValue);
        clearBtn.classList.toggle('flex', hasValue);
      }

      function clearInput() {
        queryInput.value = '';
        clearBtn.classList.add('hidden');
        clearBtn.classList.remove('flex');
        queryInput.focus();
      }

      form.addEventListener('submit', function () {
        if (!queryInput.value.trim()) return;
        btnIdle.classList.add('hidden');
        btnLoading.classList.remove('hidden');
        btnLoading.classList.add('flex');
        submitBtn.disabled = true;
        submitBtn.style.opacity = '0.85';
      });

      // Init for old() value
      if (queryInput.value.length > 0) {
        clearBtn.classList.remove('hidden');
        clearBtn.classList.add('flex');
      }
    </script>
  @endonce
</x-app-layout>