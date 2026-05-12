@props(['label', 'value', 'icon', 'text', 'bg'])

<div class="bg-white rounded-2xl px-4 py-3.5 shadow-sm border-2 border-gray-100 flex items-center gap-3">
  <div class="w-9 h-9 rounded-xl {{ $bg }} flex items-center justify-center flex-shrink-0">
    <svg class="w-5 h-5 {{ $text }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
    </svg>
  </div>
  <div>
    <p class="text-[11px] text-gray-400 font-medium">{{ $label }}</p>
    <p class="text-lg font-bold text-gray-800 leading-tight">
      {{ $value }}
    </p>
  </div>
</div>