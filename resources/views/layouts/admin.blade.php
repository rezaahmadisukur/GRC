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

    /* =============================================
           🔔 TOAST NOTIFICATION SYSTEM
        ============================================= */
    #toast-container {
      position: fixed;
      top: 1.25rem;
      right: 1.25rem;
      z-index: 99999;
      display: flex;
      flex-direction: column;
      gap: 0.65rem;
      pointer-events: none;
    }

    .toast-item {
      pointer-events: all;
      display: flex;
      align-items: flex-start;
      gap: 0.875rem;
      min-width: 320px;
      max-width: 420px;
      padding: 1rem 1.1rem;
      border-radius: 1rem;
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      box-shadow:
        0 8px 32px rgba(0, 0, 0, 0.12),
        0 2px 8px rgba(0, 0, 0, 0.08),
        inset 0 1px 0 rgba(255, 255, 255, 0.6);
      position: relative;
      overflow: hidden;
      cursor: pointer;
      border: 1px solid transparent;
      animation: toastSlideIn 0.45s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    .toast-item.toast-leaving {
      animation: toastSlideOut 0.35s cubic-bezier(0.4, 0, 1, 1) forwards;
    }

    /* SUCCESS */
    .toast-success {
      background: linear-gradient(135deg, rgba(209, 250, 229, 0.95) 0%, rgba(236, 253, 245, 0.98) 100%);
      border-color: rgba(16, 185, 129, 0.25);
    }

    .toast-success .toast-icon-wrap {
      background: linear-gradient(135deg, #059669, #10b981);
      box-shadow: 0 4px 14px rgba(16, 185, 129, 0.45);
    }

    .toast-success .toast-progress {
      background: linear-gradient(90deg, #059669, #34d399);
    }

    .toast-success .toast-title {
      color: #065f46;
    }

    .toast-success .toast-message {
      color: #047857;
    }

    /* ERROR */
    .toast-error {
      background: linear-gradient(135deg, rgba(254, 226, 226, 0.95) 0%, rgba(255, 241, 242, 0.98) 100%);
      border-color: rgba(239, 68, 68, 0.25);
    }

    .toast-error .toast-icon-wrap {
      background: linear-gradient(135deg, #dc2626, #ef4444);
      box-shadow: 0 4px 14px rgba(239, 68, 68, 0.45);
    }

    .toast-error .toast-progress {
      background: linear-gradient(90deg, #dc2626, #f87171);
    }

    .toast-error .toast-title {
      color: #7f1d1d;
    }

    .toast-error .toast-message {
      color: #991b1b;
    }

    /* WARNING */
    .toast-warning {
      background: linear-gradient(135deg, rgba(254, 243, 199, 0.95) 0%, rgba(255, 251, 235, 0.98) 100%);
      border-color: rgba(245, 158, 11, 0.25);
    }

    .toast-warning .toast-icon-wrap {
      background: linear-gradient(135deg, #d97706, #f59e0b);
      box-shadow: 0 4px 14px rgba(245, 158, 11, 0.45);
    }

    .toast-warning .toast-progress {
      background: linear-gradient(90deg, #d97706, #fbbf24);
    }

    .toast-warning .toast-title {
      color: #78350f;
    }

    .toast-warning .toast-message {
      color: #92400e;
    }

    /* INFO */
    .toast-info {
      background: linear-gradient(135deg, rgba(219, 234, 254, 0.95) 0%, rgba(239, 246, 255, 0.98) 100%);
      border-color: rgba(59, 130, 246, 0.25);
    }

    .toast-info .toast-icon-wrap {
      background: linear-gradient(135deg, #2563eb, #3b82f6);
      box-shadow: 0 4px 14px rgba(59, 130, 246, 0.45);
    }

    .toast-info .toast-progress {
      background: linear-gradient(90deg, #2563eb, #60a5fa);
    }

    .toast-info .toast-title {
      color: #1e3a8a;
    }

    .toast-info .toast-message {
      color: #1d4ed8;
    }

    /* SHARED PARTS */
    .toast-icon-wrap {
      flex-shrink: 0;
      width: 2.25rem;
      height: 2.25rem;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      animation: iconPop 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) 0.15s both;
    }

    .toast-icon-wrap svg {
      width: 1.1rem;
      height: 1.1rem;
      color: #fff;
    }

    .toast-body {
      flex: 1;
      min-width: 0;
    }

    .toast-title {
      font-size: 0.875rem;
      font-weight: 700;
      letter-spacing: -0.01em;
      margin-bottom: 0.15rem;
      line-height: 1.3;
    }

    .toast-message {
      font-size: 0.8125rem;
      font-weight: 500;
      line-height: 1.5;
      opacity: 0.9;
    }

    .toast-close {
      flex-shrink: 0;
      width: 1.5rem;
      height: 1.5rem;
      border-radius: 50%;
      background: rgba(0, 0, 0, 0.08);
      border: none;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s, transform 0.2s;
    }

    .toast-close:hover {
      background: rgba(0, 0, 0, 0.15);
      transform: scale(1.1);
    }

    .toast-close svg {
      width: 0.7rem;
      height: 0.7rem;
      color: rgba(0, 0, 0, 0.45);
    }

    .toast-progress {
      position: absolute;
      bottom: 0;
      left: 0;
      height: 3px;
      border-radius: 0 0 1rem 1rem;
      width: 100%;
      transform-origin: left;
      animation: toastProgress linear forwards;
    }

    /* Shimmer hidup */
    .toast-item::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 60%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.35), transparent);
      animation: toastShimmer 2.5s ease-in-out 0.5s infinite;
    }

    @keyframes toastSlideIn {
      from {
        opacity: 0;
        transform: translateX(110%) scale(0.9);
      }

      to {
        opacity: 1;
        transform: translateX(0) scale(1);
      }
    }

    @keyframes toastSlideOut {
      from {
        opacity: 1;
        transform: translateX(0) scale(1);
        max-height: 120px;
      }

      to {
        opacity: 0;
        transform: translateX(110%) scale(0.9);
        max-height: 0;
        padding: 0;
      }
    }

    @keyframes toastProgress {
      from {
        transform: scaleX(1);
      }

      to {
        transform: scaleX(0);
      }
    }

    @keyframes toastShimmer {
      0% {
        left: -100%;
        opacity: 0;
      }

      20% {
        opacity: 1;
      }

      80% {
        opacity: 1;
      }

      100% {
        left: 150%;
        opacity: 0;
      }
    }

    @keyframes iconPop {
      from {
        transform: scale(0.5);
        opacity: 0;
      }

      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    @media (max-width: 480px) {
      #toast-container {
        top: auto;
        bottom: 1.25rem;
        right: 0.75rem;
        left: 0.75rem;
      }

      .toast-item {
        min-width: unset;
        max-width: 100%;
      }
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

  {{-- ============================================
  🔔 TOAST CONTAINER — jangan dihapus
  ============================================ --}}
  <div id="toast-container" aria-live="polite"></div>

  {{-- ============================================
  🔔 TOAST ENGINE
  ============================================ --}}
  <script>
    const GRCToast = (() => {
      const container = document.getElementById('toast-container');

      const icons = {
        success: `<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>`,
        error: `<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>`,
        warning: `<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/></svg>`,
        info: `<svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20A10 10 0 0012 2z"/></svg>`,
      };

      const defaultTitles = {
        success: 'Berhasil!',
        error: 'Terjadi Kesalahan',
        warning: 'Perhatian',
        info: 'Informasi',
      };

      function show({ type = 'info', title = null, message = '', duration = 4000 }) {
        const toast = document.createElement('div');
        toast.className = `toast-item toast-${type}`;
        toast.setAttribute('role', 'alert');

        toast.innerHTML = `
                <div class="toast-icon-wrap">${icons[type] ?? icons.info}</div>
                <div class="toast-body">
                    <div class="toast-title">${title ?? defaultTitles[type]}</div>
                    ${message ? `<div class="toast-message">${message}</div>` : ''}
                </div>
                <button class="toast-close" aria-label="Tutup">
                    <svg fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <div class="toast-progress" style="animation-duration:${duration}ms;"></div>
            `;

        container.appendChild(toast);

        const dismiss = () => {
          if (toast.classList.contains('toast-leaving')) return;
          toast.classList.add('toast-leaving');
          toast.addEventListener('animationend', () => toast.remove(), { once: true });
        };

        let autoTimer = setTimeout(dismiss, duration);

        toast.querySelector('.toast-close').addEventListener('click', (e) => {
          e.stopPropagation();
          dismiss();
        });

        toast.addEventListener('click', dismiss);

        toast.addEventListener('mouseenter', () => {
          clearTimeout(autoTimer);
          toast.querySelector('.toast-progress').style.animationPlayState = 'paused';
        });

        toast.addEventListener('mouseleave', () => {
          toast.querySelector('.toast-progress').style.animationPlayState = 'running';
          autoTimer = setTimeout(dismiss, 1500);
        });
      }

      return { show };
    })();
  </script>

  {{-- Flash Messages dari Controller --}}
  @if (session('success'))
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        GRCToast.show({ type: 'success', message: @json(session('success')) });
      });
    </script>
  @endif

  @if (session('error'))
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        GRCToast.show({ type: 'error', message: @json(session('error')), duration: 5000 });
      });
    </script>
  @endif

  @if (session('warning'))
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        GRCToast.show({ type: 'warning', message: @json(session('warning')) });
      });
    </script>
  @endif

  @if (session('info'))
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        GRCToast.show({ type: 'info', message: @json(session('info')) });
      });
    </script>
  @endif

</body>

</html>