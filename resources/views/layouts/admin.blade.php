<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    [x-cloak] {
      display: none !important;
    }

    html.sidebar-collapsed aside {
      width: 5rem !important;
    }

    html.sidebar-collapsed .main-content {
      margin-left: 5rem !important;
    }

    html:not(.sidebar-collapsed) aside {
      width: 18rem !important;
    }

    html:not(.sidebar-collapsed) .main-content {
      margin-left: 18rem !important;
    }

    @media (max-width: 767px) {

      html.sidebar-collapsed .main-content,
      html:not(.sidebar-collapsed) .main-content {
        margin-left: 0 !important;
      }
    }

    html.sidebar-collapsed .sidebar-user-info {
      display: none !important;
    }

    html.sidebar-collapsed .sidebar-actions {
      flex-direction: column !important;
    }

    html.sidebar-collapsed .sidebar-label {
      display: none !important;
    }

    html.sidebar-collapsed .sidebar-logo-text {
      display: none !important;
    }

    html.sidebar-collapsed .sidebar-user-wrapper {
      justify-content: center !important;
      padding-left: 0 !important;
      padding-right: 0 !important;
    }

    .no-transition * {
      transition: none !important;
    }

    .nav-item {
      transition: background-color 0s, color 0s;
    }

    .nav-item:not(.active):hover {
      transition: background-color 150ms ease, color 150ms ease;
    }

    .nav-item.active {
      transition: none !important;
    }
  </style>

  <script>
    (function () {
      const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
      if (isCollapsed) document.documentElement.classList.add('sidebar-collapsed');
      document.documentElement.classList.add('no-transition');
      window.addEventListener('load', () => {
        setTimeout(() => document.documentElement.classList.remove('no-transition'), 100);
      });
    })();
  </script>
</head>

<body class="font-sans antialiased bg-gray-50" x-data="{
    sidebarOpen: false,
    sidebarCollapsed: localStorage.getItem('sidebarCollapsed') === 'true'
}" x-init="
    $watch('sidebarCollapsed', value => {
        localStorage.setItem('sidebarCollapsed', value);
        if (value) {
            document.documentElement.classList.add('sidebar-collapsed');
        } else {
            document.documentElement.classList.remove('sidebar-collapsed');
        }
    })
">

  <div class="flex min-h-screen overflow-hidden">

    @include('layouts.navigation')

    <div class="main-content flex-1 flex flex-col min-h-screen transition-all duration-300 bg-gray-50"
      :class="sidebarCollapsed ? 'md:ml-20' : 'md:ml-72'">

      {{-- Mobile Header --}}
      <header
        class="md:hidden bg-white/80 backdrop-blur-md border-b border-slate-100 px-4 py-3 flex items-center justify-between sticky top-0 z-20">
        <div class="flex items-center gap-2">
          <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
          </div>
          <span class="font-bold text-slate-800">GRC Rental</span>
        </div>
        <button @click="sidebarOpen = true"
          class="p-2 rounded-xl bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </header>

      {{-- Desktop Header --}}
      @if (isset($header))
        <header class="bg-white/80 backdrop-blur-md border-b border-slate-100 sticky top-0 z-10 hidden md:block">
          <div class="px-8 py-4 flex items-center gap-4">
            <button @click="sidebarCollapsed = !sidebarCollapsed"
              class="group p-2 rounded-xl bg-slate-50 hover:bg-emerald-50 text-slate-400 hover:text-emerald-600 transition-all duration-300 flex-shrink-0"
              :title="sidebarCollapsed ? 'Expand Sidebar' : 'Collapse Sidebar'">
              <svg class="w-5 h-5 transition-transform duration-300" :class="sidebarCollapsed ? 'rotate-180' : 'rotate-0'"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
              </svg>
            </button>
            <div class="flex-1">{{ $header }}</div>
          </div>
        </header>
      @endif

      {{-- Main Content --}}
      <main class="flex-1 p-4 sm:p-6 lg:p-8">
        {{ $slot }}
      </main>

    </div>
  </div>

  {{-- TOAST NOTIFICATION SYSTEM --}}
  <x-toast-container />

</body>

</html>