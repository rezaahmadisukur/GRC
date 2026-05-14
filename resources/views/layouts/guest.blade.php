<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fav Icon -->
    @include('layouts.favicon')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Only essential animations not in Tailwind */
        @keyframes floatOrb1 {
            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(60px, 80px) scale(1.15);
            }
        }

        @keyframes floatOrb2 {
            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(-50px, -60px) scale(1.1);
            }
        }

        @keyframes cardReveal {
            from {
                opacity: 0;
                transform: translateY(24px) scale(0.97);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Animated gradient orbs */
        .orb-1 {
            position: fixed;
            top: -20%;
            left: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.15) 0%, transparent 70%);
            animation: floatOrb1 8s ease-in-out infinite alternate;
            pointer-events: none;
            z-index: 0;
        }

        .orb-2 {
            position: fixed;
            bottom: -20%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(236, 72, 153, 0.12) 0%, transparent 70%);
            animation: floatOrb2 10s ease-in-out infinite alternate;
            pointer-events: none;
            z-index: 0;
        }

        /* Noise overlay */
        .noise-overlay {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.015) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.015) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            z-index: 0;
        }

        /* Card reveal animation */
        .auth-card {
            animation: cardReveal 0.6s cubic-bezier(0.16, 1, 0.3, 1) both;
        }
    </style>
</head>

<body class="font-sans antialiased bg-gray-50 min-h-screen flex items-center justify-center relative">

    <!-- Background decorative orbs -->
    <div class="orb-1"></div>
    <div class="orb-2"></div>

    <!-- Noise texture overlay -->
    <div class="noise-overlay"></div>

    <!-- Main content wrapper -->
    <div class="relative z-10 w-full max-w-2xl px-4 sm:px-6 py-12">
        {{ $slot }}
    </div>

</body>

</html>