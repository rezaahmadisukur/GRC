<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50" x-data="{ 
  sidebarOpen: false, 
  sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true' 
}" @sidebar-toggle.window="localStorage.setItem('sidebarCollapsed', sidebarCollapsed)">

  <style>
    /* Anti blink sidebar - dijalankan SEBELUM Alpine load */
    html.sidebar-collapsed aside {
      width: 5rem !important;
    }

    html.sidebar-collapsed .main-content {
      margin-left: 5rem !important;
    }

    /* Nonaktifkan transisi ketika halaman pertama kali load */
    body.loading * {
      transition: none !important;
    }
  </style>

  <script>
    (function () {
      const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
      if (isCollapsed) {
        document.documentElement.classList.add('sidebar-collapsed');
      }
      // Tambahkan class loading untuk disable transisi sementara
      document.body.classList.add('loading');
      // Hapus setelah halaman selesai load
      window.addEventListener('load', function () {
        setTimeout(() => document.body.classList.remove('loading'), 10);
      });
    })();
  </script>

  <div class="flex min-h-screen overflow-hidden">

    @include('layouts.navigation')

    <div class="main-content flex-1 flex flex-col min-h-screen transition-all duration-300 bg-gray-50"
      :class="sidebarCollapsed ? 'md:ml-20' : 'md:ml-64'">

      <header class="md:hidden bg-white border-b px-4 py-3 flex items-center justify-between sticky top-0 z-20">
        <span class="font-bold text-emerald-600">GRC Admin</span>
        <button @click="sidebarOpen = true" class="p-2 rounded-lg bg-gray-100 text-gray-600">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </header>

      @if (isset($header))
        <header class="bg-white border-b border-gray-100 sticky top-0 z-10 hidden md:block">
          <div class="px-8 py-5 flex items-center gap-4">
            <button @click="sidebarCollapsed = !sidebarCollapsed"
              class="p-2 rounded-lg bg-gray-50 hover:bg-gray-100 text-gray-600 transition-colors">
              {{-- Panel Left Close --}}
              <svg x-show="!sidebarCollapsed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8"
                fill="none" stroke="currentColor">
                <g fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                  <path d="M9 3.5v17m7-5.5l-3-3l3-3" />
                  <path
                    d="M3 12c0-4.243 0-6.364 1.318-7.682C5.636 3 7.758 3 12 3c4.243 0 6.364 0 7.682 1.318C21 5.636 21 7.758 21 12c0 4.243 0 6.364-1.318 7.682C18.364 21 16.242 21 12 21c-4.243 0-6.364 0-7.682-1.318C3 18.364 3 16.242 3 12" />
                </g>
              </svg>
              {{-- Panel Right Close --}}
              <svg x-show="sidebarCollapsed" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8"
                fill="none" stroke="currentColor">
                <g fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                  <path d="M15 3.5v17M8 9l3 3l-3 3" />
                  <path
                    d="M3 12c0-4.243 0-6.364 1.318-7.682C5.636 3 7.758 3 12 3c4.243 0 6.364 0 7.682 1.318C21 5.636 21 7.758 21 12c0 4.243 0 6.364-1.318 7.682C18.364 21 16.242 21 12 21c-4.243 0-6.364 0-7.682-1.318C3 18.364 3 16.242 3 12" />
                </g>
              </svg>
            </button>
            <div class="flex-1">
              {{ $header }}
            </div>
          </div>
        </header>
      @endif

      <main class="flex-1 p-4 sm:p-6 lg:p-8">
        {{ $slot }}
      </main>
    </div>
  </div>

  @if(session('success'))
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
          toast: true,
          position: 'top-end',
          icon: 'success',
          title: 'Berhasil!',
          text: @json(session('success')),
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          customClass: {
            popup: 'rounded-xl shadow-lg border border-emerald-100 bg-white/90 backdrop-blur-md',
          }
        });
      });
    </script>
  @endif

  @if(session('error'))
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: @json(session('error')),
          confirmButtonColor: '#ef4444',
        });
      });
    </script>
  @endif
</body>

</html>