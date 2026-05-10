@props(['label', 'value', 'color', 'icon', 'iconBg', 'text', 'ring', 'trend' => null, 'live' => null, 'bg', 'delay' => 0])

<div
  class="bg-gradient-to-br {{ $bg }} rounded-2xl p-5 overflow-hidden relative group ring-1 {{ $ring }} shadow-lg transition-all duration-300 ease-out animate-fadeInUp border-2 border-gray-300 text-white"
  style="box-shadow: none; animation-delay: {{ $delay }}s">

  <div class="flex items-start justify-between gap-2 mt-1 relative">
    <div class="flex-1 min-w-0">
      <p class="text-[14px] font-bold text-white uppercase tracking-widest mb-2">
        {{ $label }}
      </p>
      <p class="text-3xl font-black text-white leading-none tabular-nums">
        {{ $value }}
      </p>
      @if(!empty($live))
        <div class="flex items-center gap-1.5 mt-2">
          <span class="relative flex h-2 w-2">
            <span
              class="animate-ping absolute inline-flex h-full w-full rounded-full bg-current border border-white"></span>
            <span class="relative inline-flex rounded-full h-2 w-2 bg-current"></span>
          </span>
          <span class="text-[12px] font-semibold text-white tracking-wide">LIVE</span>
        </div>
      @else
        <div class="mt-2 h-5"></div>
      @endif
    </div>

    <div
      class="w-11 h-11 rounded-2xl {{ $iconBg }} flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform duration-300 ring-1 {{ $ring }}">
      <svg class="w-5 h-5 {{ $text }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
      </svg>
    </div>
  </div>
</div>