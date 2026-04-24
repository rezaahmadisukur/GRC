@if ($paginator->hasPages())
    @php
        $isAdmin = request()->is('admin*') || str_starts_with(Route::currentRouteName(), 'admin.');
    @endphp

    @if($isAdmin)
        {{-- ═══════════════════════════════════════
        ADMIN PAGINATION
        ═══════════════════════════════════════ --}}
        <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between w-full mt-4">

            {{-- Mobile --}}
            <div class="flex justify-between flex-1 sm:hidden gap-3">
                @if ($paginator->onFirstPage())
                    <span class="inline-flex items-center gap-1.5 px-4 py-2.5 text-sm font-semibold rounded-xl cursor-not-allowed"
                        style="color: #94a3b8; background: #f8fafc; border: 1.5px solid #e2e8f0;">
                        ← Sebelumnya
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 hover:-translate-x-0.5"
                        style="color: #475569; background: white; border: 1.5px solid #e2e8f0;"
                        onmouseover="this.style.borderColor='#10b981'; this.style.color='#059669';"
                        onmouseout="this.style.borderColor='#e2e8f0'; this.style.color='#475569';">
                        ← Sebelumnya
                    </a>
                @endif

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="inline-flex items-center gap-1.5 px-4 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 hover:translate-x-0.5"
                        style="color: #475569; background: white; border: 1.5px solid #e2e8f0;"
                        onmouseover="this.style.borderColor='#10b981'; this.style.color='#059669';"
                        onmouseout="this.style.borderColor='#e2e8f0'; this.style.color='#475569';">
                        Selanjutnya →
                    </a>
                @else
                    <span class="inline-flex items-center gap-1.5 px-4 py-2.5 text-sm font-semibold rounded-xl cursor-not-allowed"
                        style="color: #94a3b8; background: #f8fafc; border: 1.5px solid #e2e8f0;">
                        Selanjutnya →
                    </span>
                @endif
            </div>

            {{-- Desktop --}}
            <div class="hidden sm:flex sm:items-center sm:justify-between w-full">

                {{-- Info --}}
                <div class="flex items-center gap-2 text-sm" style="color: #64748b;">
                    <div class="px-3 py-1.5 rounded-lg text-xs font-bold"
                        style="background: #f0fdf4; color: #059669; border: 1px solid #bbf7d0;">
                        {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }}
                    </div>
                    <span>dari</span>
                    <span class="font-bold" style="color: #1e293b;">{{ $paginator->total() }}</span>
                    <span>data</span>
                </div>

                {{-- Controls --}}
                <div class="inline-flex items-center gap-1">

                    {{-- Prev --}}
                    @if ($paginator->onFirstPage())
                        <span class="w-9 h-9 flex items-center justify-center rounded-xl cursor-not-allowed"
                            style="color: #cbd5e1; background: #f8fafc; border: 1.5px solid #f1f5f9;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                            class="w-9 h-9 flex items-center justify-center rounded-xl transition-all duration-200 hover:-translate-x-0.5 group"
                            style="color: #64748b; background: white; border: 1.5px solid #e2e8f0;"
                            onmouseover="this.style.borderColor='#10b981'; this.style.color='#059669'; this.style.background='#f0fdf4';"
                            onmouseout="this.style.borderColor='#e2e8f0'; this.style.color='#64748b'; this.style.background='white';">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pages --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="w-9 h-9 flex items-center justify-center text-sm" style="color: #94a3b8;">
                                ···
                            </span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="w-9 h-9 flex items-center justify-center text-sm font-black text-white rounded-xl shadow-md"
                                        style="background: linear-gradient(135deg, #10b981, #059669); box-shadow: 0 4px 12px rgba(16,185,129,0.35);">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="w-9 h-9 flex items-center justify-center text-sm font-semibold rounded-xl transition-all duration-200 hover:scale-105"
                                        style="color: #64748b; background: white; border: 1.5px solid #e2e8f0;"
                                        onmouseover="this.style.borderColor='#10b981'; this.style.color='#059669'; this.style.background='#f0fdf4';"
                                        onmouseout="this.style.borderColor='#e2e8f0'; this.style.color='#64748b'; this.style.background='white';">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                            class="w-9 h-9 flex items-center justify-center rounded-xl transition-all duration-200 hover:translate-x-0.5"
                            style="color: #64748b; background: white; border: 1.5px solid #e2e8f0;"
                            onmouseover="this.style.borderColor='#10b981'; this.style.color='#059669'; this.style.background='#f0fdf4';"
                            onmouseout="this.style.borderColor='#e2e8f0'; this.style.color='#64748b'; this.style.background='white';">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                        <span class="w-9 h-9 flex items-center justify-center rounded-xl cursor-not-allowed"
                            style="color: #cbd5e1; background: #f8fafc; border: 1.5px solid #f1f5f9;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif

                </div>
            </div>
        </nav>

    @else
        {{-- ═══════════════════════════════════════
        CUSTOMER PAGINATION
        ═══════════════════════════════════════ --}}
        <nav role="navigation" aria-label="Pagination" class="flex items-center justify-center w-full">

            <div class="inline-flex items-center gap-1.5 p-1.5 rounded-2xl"
                style="background: white; border: 1.5px solid #e2e8f0; box-shadow: 0 4px 24px rgba(0,0,0,0.06);">

                {{-- Prev --}}
                @if ($paginator->onFirstPage())
                    <span
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-not-allowed select-none"
                        style="color: #cbd5e1; background: #f8fafc;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="hidden md:inline">Sebelumnya</span>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 hover:-translate-x-0.5 group"
                        style="color: #475569; background: transparent;"
                        onmouseover="this.style.background='#f1f5f9'; this.style.color='#1e293b';"
                        onmouseout="this.style.background='transparent'; this.style.color='#475569';">
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:-translate-x-0.5" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg>
                        <span class="hidden md:inline">Sebelumnya</span>
                    </a>
                @endif

                {{-- Divider --}}
                <div class="w-px h-6 mx-1" style="background: #e2e8f0;"></div>

                {{-- Pages --}}
                <div class="hidden sm:flex items-center gap-1">
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="w-10 h-10 flex items-center justify-center text-sm font-bold"
                                style="color: #94a3b8; letter-spacing: 0.05em;">
                                ···
                            </span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span
                                        class="relative w-10 h-10 flex items-center justify-center text-sm font-black text-white rounded-xl overflow-hidden"
                                        style="background: linear-gradient(135deg, #2563eb, #1d4ed8); box-shadow: 0 4px 14px rgba(37,99,235,0.40);">
                                        {{-- Shine --}}
                                        <span class="absolute inset-0 opacity-20"
                                            style="background: linear-gradient(135deg, white 0%, transparent 60%);"></span>
                                        <span class="relative">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="w-10 h-10 flex items-center justify-center text-sm font-semibold rounded-xl transition-all duration-200 hover:scale-105"
                                        style="color: #64748b;"
                                        onmouseover="this.style.background='#eff6ff'; this.style.color='#2563eb'; this.style.fontWeight='700';"
                                        onmouseout="this.style.background='transparent'; this.style.color='#64748b'; this.style.fontWeight='600';">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                {{-- Mobile: current / total --}}
                <div class="sm:hidden flex items-center px-2">
                    <span class="text-sm font-bold" style="color: #1e293b;">
                        {{ $paginator->currentPage() }}
                    </span>
                    <span class="text-sm mx-1.5" style="color: #94a3b8;">/</span>
                    <span class="text-sm font-semibold" style="color: #64748b;">
                        {{ $paginator->lastPage() }}
                    </span>
                </div>

                {{-- Divider --}}
                <div class="w-px h-6 mx-1" style="background: #e2e8f0;"></div>

                {{-- Next --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold transition-all duration-200 group"
                        style="color: #475569; background: transparent;"
                        onmouseover="this.style.background='#f1f5f9'; this.style.color='#1e293b';"
                        onmouseout="this.style.background='transparent'; this.style.color='#475569';">
                        <span class="hidden md:inline">Selanjutnya</span>
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-0.5" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                @else
                    <span
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl text-sm font-semibold cursor-not-allowed select-none"
                        style="color: #cbd5e1; background: #f8fafc;">
                        <span class="hidden md:inline">Selanjutnya</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                @endif

            </div>
        </nav>
    @endif
@endif