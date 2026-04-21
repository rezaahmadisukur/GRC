<div x-show="sidebarOpen" x-transition:opacity @click="sidebarOpen = false"
  class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm z-30 md:hidden" x-cloak></div>

<aside
  class="fixed top-0 left-0 z-40 h-screen bg-gray-900 border-r border-gray-800 transition-all duration-300 ease-in-out md:translate-x-0"
  :class="sidebarCollapsed ? 'md:w-20 w-64' : 'w-64'"
  :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">

  <div class="h-16 flex items-center px-6 border-b border-gray-800" :class="{ 'justify-center': sidebarCollapsed }">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
      <span class="text-2xl">🏎️</span>
      <span class="text-white font-bold tracking-wider uppercase text-sm whitespace-nowrap"
        x-show="!sidebarCollapsed">GRC <span class="text-emerald-500">Rental</span></span>
    </a>
  </div>

  <nav class="p-4 space-y-2 h-[calc(100vh-140px)] overflow-y-auto custom-scrollbar">
    <p class="px-4 text-[10px] font-semibold text-gray-500 uppercase tracking-widest mb-4" x-show="!sidebarCollapsed">
      Menu Utama</p>

    <!-- Dashboard -->
    <a href="{{ route('dashboard') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('dashboard') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/20' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}"
      :class="{ 'justify-center': sidebarCollapsed }">
      <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-5"></path>
      </svg>
      <span class="text-sm font-medium whitespace-nowrap" x-show="!sidebarCollapsed">Dashboard</span>
    </a>

    <!-- Daftar Booking -->
    <a href="{{ route('admin.bookings.index') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.bookings.*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/20' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}"
      :class="{ 'justify-center': sidebarCollapsed }">
      <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
        </path>
      </svg>
      <span class="text-sm font-medium whitespace-nowrap" x-show="!sidebarCollapsed">Daftar Booking</span>
    </a>

    <!-- Kelola Mobil -->
    <a href="{{ route('admin.cars.index') }}"
      class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.cars.*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/20' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}"
      :class="{ 'justify-center': sidebarCollapsed }">
      <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
      </svg>
      <span class="text-sm font-medium whitespace-nowrap" x-show="!sidebarCollapsed">Kelola Mobil</span>
    </a>

    <!-- Kelola Staff (Owner Only) -->
    @if (Auth::user()->role === 'owner')
      <a href="{{ route('admin.staff.index') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 group {{ request()->routeIs('admin.staff.*') ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-900/20' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}"
        :class="{ 'justify-center': sidebarCollapsed }">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 4.354a4 4 0 110 5.292M15 12H9m4 5H8m8 0h-4m4 0a4 4 0 11-8 0m8 0a4 4 0 01-8 0"></path>
        </svg>
        <span class="text-sm font-medium whitespace-nowrap" x-show="!sidebarCollapsed">Kelola Staff</span>
      </a>
    @endif
  </nav>

  <div class="absolute bottom-0 w-full p-4 border-t border-gray-800 bg-gray-900">
    <div class="flex items-center gap-3 px-2 mb-4" :class="{ 'justify-center': sidebarCollapsed }">
      <div
        class="w-8 h-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
        {{ substr(Auth::user()->name, 0, 1) }}
      </div>
      <div class="overflow-hidden" x-show="!sidebarCollapsed">
        <p class="text-xs font-semibold text-white truncate">{{ Auth::user()->name }}</p>
        <p class="text-[10px] text-gray-500 truncate">{{ Auth::user()->email }}</p>
      </div>
    </div>
    <div class="grid gap-2" :class="{ 'grid-cols-1': sidebarCollapsed, 'grid-cols-2': !sidebarCollapsed }">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
          class="w-full py-2 rounded-lg text-[10px] font-bold uppercase tracking-wider text-red-400 hover:bg-red-900/20 transition-colors">
          <span x-show="!sidebarCollapsed">Logout</span>
          <span x-show="sidebarCollapsed" title="Logout">⎗</span>
        </button>
      </form>
      <a href="{{ route('profile.edit') }}"
        class="w-full py-2 text-center rounded-lg text-[10px] font-bold uppercase tracking-wider text-gray-400 hover:bg-gray-800 transition-colors border border-gray-700">
        <span x-show="!sidebarCollapsed">Profile</span>
        <span x-show="sidebarCollapsed" title="Profile">⚙</span>
      </a>
    </div>
  </div>
</aside>

<style>
  [x-cloak] {
    display: none !important;
  }

  .custom-scrollbar::-webkit-scrollbar {
    width: 4px;
  }

  .custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
  }

  .custom-scrollbar::-webkit-scrollbar-thumb {
    background: #374151;
    border-radius: 10px;
  }
</style>