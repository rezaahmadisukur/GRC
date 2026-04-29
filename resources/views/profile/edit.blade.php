<x-admin-layout>
    <x-slot name="header">
        {{-- ── Page Header ── --}}
        <div class="flex items-center gap-3">
            {{-- Animated Icon --}}
            <div class="relative flex-shrink-0">
                <div class="w-9 h-9 rounded-xl
                            bg-gradient-to-br from-violet-500 via-purple-500 to-indigo-600
                            flex items-center justify-center
                            shadow-lg shadow-violet-500/40
                            animate-pulse-slow">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75
                                 3.75 0 017.5 0zM4.501 20.118a7.5 7.5
                                 0 0114.998 0A17.933 17.933 0 0112
                                 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </div>
                {{-- Online dot --}}
                <span class="absolute -top-0.5 -right-0.5 w-2.5 h-2.5
                             bg-emerald-400 rounded-full border-2 border-white
                             animate-pulse"></span>
            </div>

            <div>
                <h2 class="font-bold text-xl
                           bg-gradient-to-r from-gray-900 via-gray-800 to-gray-600
                           bg-clip-text text-transparent leading-tight">
                    {{ __('Profil Saya') }}
                </h2>
                <p class="text-xs text-gray-400 font-medium leading-none mt-0.5">
                    {{ __('Kelola pengaturan akun Anda') }}
                </p>
            </div>
        </div>
    </x-slot>

    {{-- ================================================================
    MAIN CONTENT
    ================================================================ --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-violet-50/30 py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ================================================================
            CARD — UPDATE PASSWORD
            ================================================================ --}}
            <div class="group relative bg-white rounded-2xl
                        border border-gray-100
                        shadow-sm shadow-gray-200/80
                        hover:shadow-lg hover:shadow-violet-500/8
                        hover:border-violet-100
                        transition-all duration-500
                        overflow-hidden">

                {{-- Card top accent bar --}}
                <div class="h-1 w-full bg-gradient-to-r from-violet-500 via-purple-500 to-indigo-500
                            opacity-0 group-hover:opacity-100
                            transition-opacity duration-500"></div>

                {{-- Decorative blob (background) --}}
                <div class="absolute -top-16 -right-16 w-48 h-48
                            bg-gradient-to-br from-violet-100/40 to-indigo-100/40
                            rounded-full blur-3xl pointer-events-none
                            group-hover:scale-125 transition-transform duration-700"></div>
                <div class="absolute -bottom-12 -left-12 w-36 h-36
                            bg-gradient-to-tr from-purple-100/30 to-pink-100/30
                            rounded-full blur-2xl pointer-events-none"></div>

                {{-- Card Content --}}
                <div class="relative p-6 sm:p-8">

                    {{-- ── SECTION HEADER ── --}}
                    <div class="flex items-start gap-4 mb-7">

                        {{-- Icon Badge --}}
                        <div class="flex-shrink-0 relative">
                            <div class="w-11 h-11 rounded-xl
                                        bg-gradient-to-br from-violet-500 to-indigo-600
                                        flex items-center justify-center
                                        shadow-lg shadow-violet-500/30
                                        group-hover:scale-110 group-hover:rotate-3
                                        transition-all duration-300">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9
                                             0v3.75m-.75 11.25h10.5a2.25 2.25
                                             0 002.25-2.25v-6.75a2.25 2.25 0
                                             00-2.25-2.25H6.75a2.25 2.25 0
                                             00-2.25 2.25v6.75a2.25 2.25 0
                                             002.25 2.25z" />
                                </svg>
                            </div>
                        </div>

                        {{-- Title & Desc --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 flex-wrap">
                                <h2 class="text-lg font-bold
                                           bg-gradient-to-r from-gray-900 to-gray-700
                                           bg-clip-text text-transparent">
                                    {{ __('Perbarui Kata Sandi') }}
                                </h2>
                                {{-- Security badge --}}
                                <span class="inline-flex items-center gap-1 px-2 py-0.5
                                             bg-emerald-50 border border-emerald-200
                                             rounded-full text-[10px] font-semibold
                                             text-emerald-600 tracking-wide">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    {{ __('Teraman') }}
                                </span>
                            </div>
                            <p class="mt-1 text-sm text-gray-500 leading-relaxed">
                                {{ __('Pastikan akun Anda menggunakan kata sandi panjang & acak agar tetap aman.') }}
                            </p>
                        </div>
                    </div>

                    {{-- Gradient Divider --}}
                    <div class="h-px mb-7 rounded-full
                                bg-gradient-to-r from-violet-200 via-indigo-100 to-transparent">
                    </div>

                    {{-- ================================================================
                    FORM
                    ================================================================ --}}
                    <form method="post" action="{{ route('password.update') }}" class="space-y-5" x-data="{
                            showCurrent: false,
                            showNew:     false,
                            showConfirm: false,
                            strength:    0,
                            strengthLabel: '',
                            strengthColor: '',
                            strengthBg: '',
                            checkStrength(val) {
                                let s = 0;
                                if (val.length >= 8)          s++;
                                if (val.length >= 12)         s++;
                                if (/[A-Z]/.test(val))        s++;
                                if (/[0-9]/.test(val))        s++;
                                if (/[^A-Za-z0-9]/.test(val)) s++;
                                this.strength = s;
                                const map = {
                                    0: { label: '',            color: 'bg-gray-200',    bg: 'text-gray-400'     },
                                    1: { label: 'Sangat Lemah',   color: 'bg-red-500',     bg: 'text-red-500'      },
                                    2: { label: 'Lemah',        color: 'bg-orange-500',  bg: 'text-orange-500'   },
                                    3: { label: 'Cukup',        color: 'bg-yellow-500',  bg: 'text-yellow-600'   },
                                    4: { label: 'Kuat',      color: 'bg-lime-500',    bg: 'text-lime-600'     },
                                    5: { label: 'Sangat Kuat', color: 'bg-emerald-500', bg: 'text-emerald-600'  },
                                };
                                this.strengthLabel = map[s].label;
                                this.strengthColor  = map[s].color;
                                this.strengthBg     = map[s].bg;
                            }
                        }">
                        @csrf
                        @method('put')

                        {{-- ── FIELD REUSABLE STRUCTURE ────────────────────────────
                        1. Current Password
                        ──────────────────────────────────────────────────────── --}}
                        <div class="group/field">
                            <x-input-label for="update_password_current_password" :value="__('Kata Sandi Saat Ini')"
                                class="block text-sm font-semibold text-gray-700 mb-2
                                       transition-colors duration-200
                                       group-focus-within/field:text-violet-600" />

                            <div class="relative">
                                {{-- Left Icon --}}
                                <div class="absolute inset-y-0 left-0 pl-3.5
                                            flex items-center pointer-events-none z-10">
                                    <svg class="w-4 h-4 text-gray-400
                                                transition-colors duration-200
                                                group-focus-within/field:text-violet-500" fill="none"
                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0
                                                 01-7.029 5.912c-.563-.097-1.159.026
                                                 -1.563.43L10.5 17.25H8.25v2.25H6v2.25
                                                 H2.25v-2.818c0-.597.237-1.17.659-1.591
                                                 l6.499-6.499c.404-.404.527-1 .43-1.563
                                                 A6 6 0 1121.75 8.25z" />
                                    </svg>
                                </div>

                                {{-- Input --}}
                                <x-text-input id="update_password_current_password" name="current_password"
                                    :type="'password'" x-bind:type="showCurrent ? 'text' : 'password'"
                                    autocomplete="current-password"
                                    placeholder="{{ __('Masukkan kata sandi Anda saat ini') }}" class="block w-full pl-10 pr-12 py-3
                                           bg-gray-50/60 border border-gray-200
                                           rounded-xl text-sm text-gray-900
                                           placeholder:text-gray-400
                                           transition-all duration-300
                                           focus:bg-white focus:border-violet-400
                                           focus:ring-4 focus:ring-violet-500/10
                                           focus:outline-none hover:border-gray-300
                                           " />

                                {{-- Toggle Eye --}}
                                <button type="button" @click="showCurrent = !showCurrent"
                                    :aria-label="showCurrent ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'" class="absolute inset-y-0 right-0 pr-3.5
                                               flex items-center z-10
                                               text-gray-400 hover:text-violet-500
                                               transition-colors duration-200
                                               focus:outline-none">
                                    {{-- Eye Open --}}
                                    <svg x-show="!showCurrent" class="w-4 h-4" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423
                                                 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007
                                                 9.963 7.178.07.207.07.431 0 .639C20.577
                                                 16.49 16.64 19.5 12 19.5c-4.638 0-8.573
                                                 -3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    {{-- Eye Slash --}}
                                    <svg x-show="showCurrent" style="display:none;" class="w-4 h-4" fill="none"
                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226
                                                 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138
                                                 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5
                                                 c4.756 0 8.773 3.162 10.065 7.498a10.523
                                                 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228
                                                 3.228l3.65 3.65m7.894 7.894L21 21m-3.228
                                                 -3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243
                                                 m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>

                            <x-input-error :messages="$errors->updatePassword->get('current_password')"
                                class="mt-2 flex items-center gap-1.5 text-xs text-red-500" />
                        </div>

                        {{-- ── 2. New Password ──────────────────────────────────── --}}
                        <div class="group/field">
                            <x-input-label for="update_password_password" :value="__('Kata Sandi Baru')" class="block text-sm font-semibold text-gray-700 mb-2
                                       transition-colors duration-200
                                       group-focus-within/field:text-violet-600" />

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5
                                            flex items-center pointer-events-none z-10">
                                    <svg class="w-4 h-4 text-gray-400
                                                transition-colors duration-200
                                                group-focus-within/field:text-violet-500" fill="none"
                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9
                                                 0v3.75m-.75 11.25h10.5a2.25 2.25
                                                 0 002.25-2.25v-6.75a2.25 2.25 0
                                                 00-2.25-2.25H6.75a2.25 2.25 0
                                                 00-2.25 2.25v6.75a2.25 2.25 0
                                                 002.25 2.25z" />
                                    </svg>
                                </div>

                                <x-text-input id="update_password_password" name="password" :type="'password'"
                                    x-bind:type="showNew ? 'text' : 'password'" autocomplete="new-password"
                                    @input="checkStrength($event.target.value)"
                                    placeholder="{{ __('Masukkan kata sandi baru') }}" class="block w-full pl-10 pr-12 py-3
                                           bg-gray-50/60 border border-gray-200
                                           rounded-xl text-sm text-gray-900
                                           placeholder:text-gray-400
                                           transition-all duration-300
                                           focus:bg-white focus:border-violet-400
                                           focus:ring-4 focus:ring-violet-500/10
                                           focus:outline-none hover:border-gray-300" />

                                <button type="button" @click="showNew = !showNew" class="absolute inset-y-0 right-0 pr-3.5
                                               flex items-center z-10
                                               text-gray-400 hover:text-violet-500
                                               transition-colors duration-200
                                               focus:outline-none">
                                    <svg x-show="!showNew" class="w-4 h-4" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423
                                                 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007
                                                 9.963 7.178.07.207.07.431 0 .639C20.577
                                                 16.49 16.64 19.5 12 19.5c-4.638 0-8.573
                                                 -3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <svg x-show="showNew" style="display:none;" class="w-4 h-4" fill="none"
                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226
                                                 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138
                                                 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5
                                                 c4.756 0 8.773 3.162 10.065 7.498a10.523
                                                 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228
                                                 3.228l3.65 3.65m7.894 7.894L21 21m-3.228
                                                 -3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243
                                                 m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>

                            {{-- ── Password Strength Meter ── --}}
                            <div x-show="strength > 0" x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0" class="mt-3 space-y-2"
                                style="display:none;">
                                {{-- 5 Bars --}}
                                <div class="flex gap-1.5">
                                    <template x-for="i in 5" :key="i">
                                        <div class="h-1.5 flex-1 rounded-full
                                                    transition-all duration-400" :class="i <= strength
                                                     ? strengthColor + ' shadow-sm'
                                                     : 'bg-gray-100'">
                                        </div>
                                    </template>
                                </div>

                                {{-- Label Row --}}
                                <div class="flex items-center justify-between">
                                    <p class="text-xs font-semibold transition-colors duration-300" :class="strengthBg">
                                        <span x-text="strengthLabel"></span>
                                    </p>
                                    <p class="text-[11px] text-gray-400">
                                        {{ __('Gunakan minimal 12 karakter, huruf besar, angka & simbol') }}
                                    </p>
                                </div>
                            </div>

                            <x-input-error :messages="$errors->updatePassword->get('password')"
                                class="mt-2 text-xs text-red-500" />
                        </div>

                        {{-- ── 3. Confirm Password ──────────────────────────────── --}}
                        <div class="group/field">
                            <x-input-label for="update_password_password_confirmation" :value="__('Konfirmasi Kata Sandi')" class="block text-sm font-semibold text-gray-700 mb-2
                                       transition-colors duration-200
                                       group-focus-within/field:text-violet-600" />



                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5
                                            flex items-center pointer-events-none z-10">
                                    <svg class="w-4 h-4 text-gray-400
                                                transition-colors duration-200
                                                group-focus-within/field:text-violet-500" fill="none"
                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036
                                                 A11.959 11.959 0 013.598 6 11.99 11.99
                                                 0 003 9.749c0 5.592 3.824 10.29 9 11.623
                                                 5.176-1.332 9-6.03 9-11.622
                                                 0-1.31-.21-2.571-.598-3.751
                                                 h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                                    </svg>
                                </div>

                                <x-text-input id="update_password_password_confirmation" name="password_confirmation"
                                    :type="'password'" x-bind:type="showConfirm ? 'text' : 'password'"
                                    autocomplete="new-password" placeholder="{{ __('Ulangi kata sandi baru') }}" class="block w-full pl-10 pr-12 py-3
                                           bg-gray-50/60 border border-gray-200
                                           rounded-xl text-sm text-gray-900
                                           placeholder:text-gray-400
                                           transition-all duration-300
                                           focus:bg-white focus:border-violet-400
                                           focus:ring-4 focus:ring-violet-500/10
                                           focus:outline-none hover:border-gray-300" />

                                <button type="button" @click="showConfirm = !showConfirm" class="absolute inset-y-0 right-0 pr-3.5
                                               flex items-center z-10
                                               text-gray-400 hover:text-violet-500
                                               transition-colors duration-200
                                               focus:outline-none">
                                    <svg x-show="!showConfirm" class="w-4 h-4" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423
                                                 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007
                                                 9.963 7.178.07.207.07.431 0 .639C20.577
                                                 16.49 16.64 19.5 12 19.5c-4.638 0-8.573
                                                 -3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <svg x-show="showConfirm" style="display:none;" class="w-4 h-4" fill="none"
                                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226
                                                 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138
                                                 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5
                                                 c4.756 0 8.773 3.162 10.065 7.498a10.523
                                                 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228
                                                 3.228l3.65 3.65m7.894 7.894L21 21m-3.228
                                                 -3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243
                                                 m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>

                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')"
                                class="mt-2 text-xs text-red-500" />
                        </div>

                        {{-- ── ACTION ROW ───────────────────────────────────────── --}}
                        <div class="pt-3 flex flex-col gap-3
                                    sm:flex-row sm:items-center sm:justify-between">

                            {{-- Tip — kiri --}}
                            <p class="flex items-center gap-1.5 text-xs text-gray-400 order-2 sm:order-1">
                                <svg class="w-3.5 h-3.5 flex-shrink-0 text-violet-400" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116
                                             0zm-7-4a1 1 0 11-2 0 1 1 0 012
                                             0zM9 9a.75.75 0 000 1.5h.253a.25.25
                                             0 01.244.304l-.459 2.066A1.75 1.75
                                             0 009.836 15h.666a1.75 1.75 0
                                             001.713-2.13l-.459-2.066a.25.25 0
                                             01.244-.304H12a.75.75 0 000-1.5H9z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Perubahan berlaku langsung.') }}
                            </p>

                            {{-- Button + Toast — kanan --}}
                            <div class="flex items-center gap-3 order-1 sm:order-2">

                                {{-- ── Submit Button ── --}}
                                <button type="submit" class="group/btn relative inline-flex items-center
                                           gap-2 px-5 py-2.5
                                           bg-gradient-to-r from-violet-600 to-indigo-600
                                           hover:from-violet-500 hover:to-indigo-500
                                           text-white text-sm font-semibold rounded-xl
                                           shadow-md shadow-violet-500/25
                                           hover:shadow-lg hover:shadow-violet-500/30
                                           hover:-translate-y-0.5
                                           active:translate-y-0 active:shadow-sm
                                           transition-all duration-200
                                           focus:outline-none focus:ring-4
                                           focus:ring-violet-500/25
                                           overflow-hidden whitespace-nowrap">
                                    {{-- Shimmer --}}
                                    <span class="absolute inset-0
                                                 bg-gradient-to-r from-transparent
                                                 via-white/20 to-transparent
                                                 -translate-x-full
                                                 group-hover/btn:translate-x-full
                                                 transition-transform duration-700
                                                 ease-in-out pointer-events-none">
                                    </span>

                                    {{-- Icon --}}
                                    <svg class="w-4 h-4 relative z-10
                                                group-hover/btn:rotate-12
                                                transition-transform duration-200" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9
                                                 0v3.75m-.75 11.25h10.5a2.25 2.25
                                                 0 002.25-2.25v-6.75a2.25 2.25 0
                                                 00-2.25-2.25H6.75a2.25 2.25 0
                                                 00-2.25 2.25v6.75a2.25 2.25 0
                                                 002.25 2.25z" />
                                    </svg>

                                    <span class="relative z-10">{{ __('Simpan Kata Sandi') }}</span>
                                </button>

                            </div>
                        </div>
                        {{-- ── END ACTION ROW ──────────────────────────────────── --}}

                    </form>
                </div>
                {{-- End Card Content --}}

            </div>
            {{-- End Card --}}
        </div>
    </div>

</x-admin-layout>