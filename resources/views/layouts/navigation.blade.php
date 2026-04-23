<!-- Overlay untuk Mobile dengan Blur yang lebih kuat -->
<div x-show="sidebarOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
  x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="sidebarOpen = false"
  class="fixed inset-0 bg-slate-900/60 backdrop-blur-md z-30 md:hidden" x-cloak></div>

<aside
  class="fixed top-0 left-0 z-40 h-screen bg-white border-r border-slate-100 shadow-[20px_0_30px_0_rgba(0,0,0,0.02)] transition-all duration-300 ease-in-out md:translate-x-0"
  :class="sidebarCollapsed ? 'md:w-20 w-64' : 'w-72'"
  :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }">

  <!-- Logo Section -->
  <div class="h-20 flex items-center px-6 mb-2" :class="{ 'justify-center': sidebarCollapsed }">
    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
      <div
        class="w-10 h-10 bg-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-200 group-hover:scale-105 transition-transform duration-300">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
        </svg>
      </div>
      <div class="flex flex-col" x-show="!sidebarCollapsed" x-transition:enter="delay-100 duration-200">
        <span class="text-slate-800 font-bold tracking-tight text-lg leading-none">GRC <span
            class="text-emerald-600">Rental</span></span>
        <span class="text-[10px] text-slate-400 font-medium uppercase tracking-[0.2em] mt-1">Management System</span>
      </div>
    </a>
  </div>

  <!-- Navigation -->
  <nav class="px-4 space-y-1.5 h-[calc(100vh-180px)] overflow-y-auto custom-scrollbar">
    <div class="mb-4 mt-6" x-show="!sidebarCollapsed" x-cloak>
      <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest leading-none">
        Main Menu
      </p>
    </div>

    <!-- Dashboard -->
    <a href="{{ route('dashboard') }}" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl group relative
          {{ request()->routeIs('dashboard')
  ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100 active'
  : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}" :class="{ 'justify-center': sidebarCollapsed }">
      <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
          d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-5" />
      </svg>
      <span class="text-[14px] font-semibold" x-show="!sidebarCollapsed" x-cloak>Dashboard</span>
    </a>

    <!-- Daftar Booking -->
    <a href="{{ route('admin.bookings.index') }}" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl group relative
          {{ request()->routeIs('admin.bookings.*')
  ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100 active'
  : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}" :class="{ 'justify-center': sidebarCollapsed }">
      <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
      </svg>
      <span class="text-[14px] font-semibold" x-show="!sidebarCollapsed" x-cloak>Daftar Booking</span>
    </a>

    <!-- Kelola Mobil -->
    <a href="{{ route('admin.cars.index') }}" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl group relative
          {{ request()->routeIs('admin.cars.*')
  ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100 active'
  : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}" :class="{ 'justify-center': sidebarCollapsed }">
      <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
          d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
      </svg>
      <span class="text-[14px] font-semibold" x-show="!sidebarCollapsed" x-cloak>Kelola Mobil</span>
    </a>

    <!-- Laporan -->
    <a href="{{ route('admin.reports.index') }}" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl group relative
          {{ request()->routeIs('admin.reports.*')
  ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100 active'
  : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}" :class="{ 'justify-center': sidebarCollapsed }">
      <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
      </svg>
      <span class="text-[14px] font-semibold" x-show="!sidebarCollapsed" x-cloak>Laporan</span>
    </a>

    @if (Auth::user()->role === 'owner')
      <div class="pt-4 mb-2" x-show="!sidebarCollapsed" x-cloak>
        <p class="px-4 text-[11px] font-bold text-slate-400 uppercase tracking-widest">Management</p>
      </div>
      <a href="{{ route('admin.staff.index') }}" class="nav-item flex items-center gap-3 px-4 py-3 rounded-xl group relative
                                                                                                      {{ request()->routeIs('admin.staff.*')
      ? 'bg-emerald-600 text-white shadow-lg shadow-emerald-100 active'
      : 'text-slate-500 hover:bg-slate-50 hover:text-slate-900' }}" :class="{ 'justify-center': sidebarCollapsed }">
        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        <span class="text-[14px] font-semibold" x-show="!sidebarCollapsed" x-cloak>Kelola Staff</span>
      </a>
    @endif
  </nav>

  <!-- User Section -->
  <div class="absolute bottom-0 w-full p-4 bg-white/80 backdrop-blur-md border-t border-slate-50">
    <div class="bg-slate-50 rounded-2xl p-3">
      <div class="flex items-center gap-3 px-4" :class="{ 'justify-center px-0': sidebarCollapsed }">
        <div
          class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-emerald-600 shadow-sm flex-shrink-0">
          <span class="font-bold text-lg">{{ substr(Auth::user()->name, 0, 1) }}</span>
        </div>
        <div class="overflow-hidden" x-show="!sidebarCollapsed">
          <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
          <p class="text-[11px] text-slate-500 truncate font-medium">{{ Auth::user()->email }}</p>
        </div>
      </div>

      <div class="mt-3 flex gap-2 items-center" :class="{ 'flex-col gap-1.5 mx-auto items-center': sidebarCollapsed }">
        <a href="{{ route('profile.edit') }}"
          class="flex-1 flex justify-center items-center gap-3 py-3 rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 transition-all duration-300 group"
          :class="{ 'w-10 h-10': sidebarCollapsed }" title="Settings">
          <svg class="w-5 h-5 flex-shrink-0 group-hover:scale-105 transition-transform duration-300" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
              d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
            </path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
            </path>
          </svg>
          <span class="text-[14px] font-semibold" x-show="!sidebarCollapsed" x-cloak>Profile</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="flex-1">
          @csrf
          <button type="submit"
            class="w-full flex justify-center items-center gap-3 py-3 rounded-xl bg-red-50 border border-red-100 text-red-500 hover:bg-red-100 transition-all duration-30"
            :class=" { 'px-2' : sidebarCollapsed }" title="Logout">
            <svg class="w-5 h-5 flex-shrink-0 group-hover:scale-105 transition-transform duration-300" fill="none"
              stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span class="text-[14px] font-semibold" x-show="!sidebarCollapsed" x-cloak>Logout</span>
          </button>
        </form>
      </div>
    </div>
  </div>
</aside>

<style>
  [x-cloak] {
    display: none !important;
  }

  /* Custom Scrollbar yang lebih cantik */
  .custom-scrollbar::-webkit-scrollbar {
    width: 4px;
  }

  .custom-scrollbar::-webkit-scrollbar-track {
    background: transparent;
  }

  .custom-scrollbar::-webkit-scrollbar-thumb {
    background: #e2e8f0;
    border-radius: 10px;
  }

  .custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #cbd5e1;
  }
</style>