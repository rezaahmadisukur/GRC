{{-- ============================================
🔔 TOAST CONTAINER & HANDLER
============================================ --}}

<div id="toast-container" aria-live="polite"></div>

@vite(['resources/css/components/toast.css', 'resources/js/components/toast.js'])

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