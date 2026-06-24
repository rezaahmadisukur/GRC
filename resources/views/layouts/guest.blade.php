@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? "$title - " . config('app.name') : config('app.name') }}</title>

    <!-- Fav Icon -->
    @include('layouts.partials.favicon')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-sans antialiased min-h-screen flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-blue-50 via-indigo-50/40 to-purple-50/30">

    {{-- ═══ ANIMATED BACKGROUND LAYER ═══ --}}
    <div class="fixed inset-0 pointer-events-none">

        {{-- Gradient mesh base --}}
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_-20%,rgba(120,119,198,0.15),transparent)]">
        </div>
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_60%_40%_at_20%_80%,rgba(99,102,241,0.10),transparent)]">
        </div>
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_50%_30%_at_90%_60%,rgba(168,85,247,0.08),transparent)]">
        </div>

        {{-- Orb 1 — large, slow, top-left --}}
        <div class="absolute top-[-15%] left-[-8%] w-[500px] h-[500px] rounded-full opacity-40 animate-[float-orb-1_12s_ease-in-out_infinite_alternate]"
            style="background: radial-gradient(circle, rgba(99,102,241,0.20) 0%, transparent 70%);">
        </div>

        {{-- Orb 2 — medium, bottom-right, offset timing --}}
        <div class="absolute bottom-[-18%] right-[-8%] w-[420px] h-[420px] rounded-full opacity-35 animate-[float-orb-2_14s_ease-in-out_infinite_alternate_reverse]"
            style="background: radial-gradient(circle, rgba(236,72,153,0.15) 0%, transparent 70%);">
        </div>

        {{-- Orb 3 — small, mid-right, chaotic --}}
        <div class="absolute top-[30%] right-[-4%] w-[280px] h-[280px] rounded-full opacity-25 animate-[float-orb-3_18s_ease-in-out_infinite]"
            style="background: radial-gradient(circle, rgba(52,211,153,0.12) 0%, transparent 70%);">
        </div>

        {{-- Orb 4 — tiny accent --}}
        <div class="absolute bottom-[25%] left-[5%] w-[160px] h-[160px] rounded-full opacity-20 animate-[float-orb-1_16s_ease-in-out_infinite_alternate_-4s]"
            style="background: radial-gradient(circle, rgba(251,191,36,0.10) 0%, transparent 70%);">
        </div>

        {{-- Subtle dot grid overlay --}}
        <div class="absolute inset-0 opacity-[0.35]"
            style="background-image: radial-gradient(circle, #94a3b8 1px, transparent 1px); background-size: 32px 32px;">
        </div>

        {{-- Top edge glow --}}
        <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-indigo-400/30 to-transparent">
        </div>
    </div>

    {{-- ═══ MAIN CONTENT ═══ --}}
    <div class="relative z-10 w-full max-w-2xl px-4 sm:px-6 py-12">
        {{ $slot }}
    </div>

    @stack('scripts')
</body>

</html>