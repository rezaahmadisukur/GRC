@props(['icon' => '', 'label' => '', 'value' => 0, 'gradient' => 'from-blue-500 to-indigo-600'])

<div class="bg-white rounded-2xl p-4 flex items-center gap-3.5 shadow-sm">
  <div class="p-2.5 rounded-xl bg-gradient-to-br {{ $gradient }} shrink-0">
    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
    </svg>
  </div>
  <div>
    <p class="text-xs text-gray-500 font-medium">{{ $label }}</p>
    <p class="text-xl font-bold text-gray-800">{{ $value }}</p>
  </div>
</div>