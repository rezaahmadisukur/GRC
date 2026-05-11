@props(['label', 'value', 'icon', 'ring', 'bg', 'bgicon', 'text'])
@php
  $hoverClasses = [
    'bg-blue-50' => 'group-hover:bg-blue-200',
    'bg-emerald-50' => 'group-hover:bg-emerald-200',
    'bg-purple-50' => 'group-hover:bg-purple-200',
  ];
  $hoverClass = $hoverClasses[$bgicon] ?? '';
@endphp

<div
  class="group relative bg-gradient-to-br {{ $bg }} backdrop-blur-sm rounded-2xl p-5 shadow-sm ring-1 {{ $ring }} border border-gray-50 hover:shadow-xl transition-all duration-300 overflow-hidden">
  <div class="flex items-center gap-4">
    <div
      class="w-12 h-12 rounded-xl {{ $bgicon }} flex items-center justify-center transition-all duration-300 {{ $hoverClass }} {{ $ring }}">
      <svg class="w-6 h-6 {{ $text }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
      </svg>
    </div>
    <div class="text-white">
      <p class="text-xs font-semibold uppercase tracking-wider">{{ $label }}</p>
      <p class="text-2xl font-extrabold leading-none mt-0.5" id="totalBookings">
        {{ $value }}
      </p>
    </div>
  </div>
  {{-- Decorative blob --}}
  <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full {{ $bgicon }} opacity-60">
  </div>
</div>