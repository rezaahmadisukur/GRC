{{-- resources/views/admin/staff/index.blade.php --}}
<x-admin-layout>

<x-slot name="header">
    <div class="flex items-center gap-3">
        <div class="p-2 bg-gradient-to-br from-violet-500 to-indigo-600 rounded-xl shadow-lg shadow-indigo-200">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>
        <div>
            <h1 class="text-xl font-bold text-gray-800 leading-tight">Pengelolaan Karyawan</h1>
            <p class="text-sm text-gray-400 font-normal">Manajemen akun & akses staff</p>
        </div>
    </div>
</x-slot>


<div class="py-8">
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 flex items-center gap-3 hover:-translate-y-1 hover:shadow-md transition-all duration-200">
            <div class="p-2.5 rounded-xl bg-gradient-to-br from-indigo-50 to-violet-100 shrink-0">
                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-medium">Total Staff</p>
                <p class="text-2xl font-bold text-gray-800">{{ $staffs->count() }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 flex items-center gap-3 hover:-translate-y-1 hover:shadow-md transition-all duration-200">
            <div class="p-2.5 rounded-xl bg-gradient-to-br from-emerald-50 to-teal-100 shrink-0">
                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-medium">Aktif</p>
                <p class="text-2xl font-bold text-emerald-600">{{ $staffs->where('is_active', true)->count() }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-4 flex items-center gap-3 hover:-translate-y-1 hover:shadow-md transition-all duration-200 col-span-2 sm:col-span-1">
            <div class="p-2.5 rounded-xl bg-gradient-to-br from-rose-50 to-red-100 shrink-0">
                <svg class="w-5 h-5 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-medium">Nonaktif</p>
                <p class="text-2xl font-bold text-rose-500">{{ $staffs->where('is_active', false)->count() }}</p>
            </div>
        </div>
    </div>

    {{-- TOOLBAR --}}
    <div class="flex items-center justify-between gap-3 flex-wrap">
        <div>
            <h2 class="text-sm font-semibold text-gray-600">Daftar Staff Terdaftar</h2>
            <p class="text-xs text-gray-400">Kelola akun, status, dan password staff</p>
        </div>
        <button type="button" onclick="openModal()"
            class="group relative inline-flex items-center gap-2 px-5 py-2.5
                   bg-gradient-to-r from-indigo-500 to-violet-600 text-white font-semibold text-sm rounded-xl
                   shadow-lg shadow-indigo-200 hover:shadow-xl hover:shadow-indigo-300
                   hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 overflow-hidden">
            <span class="absolute inset-0 bg-white/10 -translate-x-full group-hover:translate-x-full transition-transform duration-500 skew-x-12 pointer-events-none"></span>
            <svg class="w-4 h-4 relative" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
            </svg>
            <span class="relative">Tambah Admin Baru</span>
        </button>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-6 py-3.5 border-b border-gray-100 flex items-center justify-between bg-gradient-to-r from-slate-50 to-white">
            <div class="flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>
                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Data Karyawan</span>
            </div>
            <span class="text-xs text-gray-400">{{ $staffs->count() }} entri</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50/70 border-b border-gray-100">
                        <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-400 uppercase tracking-wider w-14">#</th>
                        <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3.5 text-left text-xs font-bold text-gray-400 uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3.5 text-center text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3.5 text-center text-xs font-bold text-gray-400 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                @forelse($staffs as $key => $staff)
                    <tr class="group hover:bg-indigo-50/40 transition-colors duration-150">

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-lg
                                         bg-gradient-to-br from-indigo-50 to-violet-100 text-indigo-600 text-xs font-bold">
                                {{ $key + 1 }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-400 to-violet-500
                                            flex items-center justify-center text-white text-sm font-bold shrink-0 shadow-sm shadow-indigo-100">
                                    {{ strtoupper(substr($staff->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">{{ $staff->name }}</p>
                                    <p class="text-xs text-gray-400">Staff Admin</p>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span class="text-sm text-gray-600 font-mono">{{ $staff->username }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4 text-center">
                            @if($staff->is_active)
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                                             bg-gradient-to-r from-emerald-50 to-teal-50 text-emerald-700 border border-emerald-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Aktif
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold
                                             bg-gradient-to-r from-rose-50 to-red-50 text-rose-600 border border-rose-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>
                                    Nonaktif
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2 flex-wrap">

                                {{-- Toggle Button --}}
                                <button
                                    type="button"
                                    onclick="openToggleModal(
                                        '{{ $staff->id }}',
                                        '{{ addslashes($staff->name) }}',
                                        {{ $staff->is_active ? 'true' : 'false' }}
                                    )"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold
                                           transition-all duration-200 active:scale-95
                                           {{ $staff->is_active
                                               ? 'bg-amber-50 text-amber-700 border border-amber-200 hover:bg-amber-100 hover:border-amber-300'
                                               : 'bg-emerald-50 text-emerald-700 border border-emerald-200 hover:bg-emerald-100 hover:border-emerald-300'
                                           }}">
                                    @if($staff->is_active)
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                                        </svg>
                                        <span>Nonaktifkan</span>
                                    @else
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>Aktifkan</span>
                                    @endif
                                </button>

                                {{-- Toggle Hidden Form --}}
                                <form id="toggleForm-{{ $staff->id }}"
                                      action="{{ route('admin.staff.toggle', $staff->id) }}"
                                      method="POST" class="hidden">
                                    @csrf
                                    @method('PATCH')
                                </form>

                                {{-- Reset Password Button --}}
                                <button
                                    type="button"
                                    onclick="openResetModal('{{ $staff->id }}', '{{ addslashes($staff->name) }}')"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-semibold
                                           transition-all duration-200 active:scale-95
                                           bg-indigo-50 text-indigo-700 border border-indigo-200
                                           hover:bg-indigo-100 hover:border-indigo-300">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                    </svg>
                                    Reset PW
                                </button>

                                {{-- Reset Hidden Form --}}
                                <form id="resetForm-{{ $staff->id }}"
                                      action="{{ route('admin.staff.reset-password', $staff->id) }}"
                                      method="POST" class="hidden">
                                    @csrf
                                    @method('PATCH')
                                </form>

                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5">
                            <div class="py-20 flex flex-col items-center justify-center text-center px-6">
                                <div class="relative mb-5">
                                    <div class="w-24 h-24 rounded-3xl bg-gradient-to-br from-indigo-50 to-violet-100 flex items-center justify-center shadow-inner">
                                        <svg class="w-12 h-12 text-indigo-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <span class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-indigo-200 animate-bounce"></span>
                                    <span class="absolute -bottom-1 -left-1 w-2 h-2 rounded-full bg-violet-200 animate-bounce delay-[200ms]"></span>
                                </div>
                                <h3 class="text-base font-bold text-gray-700 mb-1">Belum ada staff terdaftar</h3>
                                <p class="text-sm text-gray-400 max-w-xs mb-5">Mulai dengan menambahkan admin baru untuk mengelola sistem.</p>
                                <button type="button" onclick="openModal()"
                                    class="inline-flex items-center gap-2 px-5 py-2.5
                                           bg-gradient-to-r from-indigo-500 to-violet-600
                                           text-white font-semibold text-sm rounded-xl
                                           shadow-lg shadow-indigo-200 hover:-translate-y-0.5
                                           hover:shadow-xl transition-all duration-200 active:scale-95">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Tambah Admin Pertama
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>

{{-- ════════════════════════════ --}}
{{-- MODAL: Tambah Admin Baru   --}}
{{-- ════════════════════════════ --}}
<div id="addModal"
     class="fixed inset-0 z-50 hidden items-center justify-center p-4"
     role="dialog" aria-modal="true" aria-labelledby="addModalTitle">

    <div id="addOverlay"
         class="absolute inset-0 bg-black/40 backdrop-blur-sm opacity-0 transition-opacity duration-300"
         onclick="closeModal()"></div>

    <div id="addBox"
         class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md z-10
                transform transition-all duration-300 scale-90 opacity-0 overflow-hidden">

        <div class="h-1 bg-gradient-to-r from-indigo-400 via-violet-500 to-purple-400"></div>

        <div class="px-6 pt-6 pb-4 border-b border-gray-100 flex items-start justify-between">
            <div class="flex items-center gap-3">
                <div class="p-2 rounded-xl bg-gradient-to-br from-indigo-50 to-violet-100">
                    <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <div>
                    <h3 id="addModalTitle" class="text-base font-bold text-gray-800">Tambah Admin Baru</h3>
                    <p class="text-xs text-gray-400 mt-0.5">Isi data untuk mendaftarkan admin</p>
                </div>
            </div>
            <button type="button" onclick="closeModal()"
                class="p-1.5 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-all duration-150 active:scale-90">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <form action="{{ route('admin.staff.store') }}" method="POST" id="addStaffForm" novalidate>
            @csrf
            <div class="px-6 py-5 space-y-4">

                {{-- Nama --}}
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Nama Lengkap <span class="text-rose-400">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300 pointer-events-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap" autocomplete="off"
                            class="w-full pl-10 pr-4 py-2.5 text-sm border rounded-xl outline-none
                                   transition-all duration-200 placeholder-gray-300 text-gray-700
                                   @error('name') border-rose-300 bg-rose-50 focus:ring-2 focus:ring-rose-200 focus:border-rose-400
                                   @else border-gray-200 bg-white focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400
                                   @enderror">
                    </div>
                    @error('name')
                        <p class="mt-1.5 text-xs text-rose-500 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Username --}}
                <div>
                    <label for="username" class="block text-sm font-semibold text-gray-700 mb-1.5">
                        Username <span class="text-rose-400">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-300 pointer-events-none">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <input type="text" id="username" name="username" value="{{ old('username') }}"
                            placeholder="Masukkan username unik" autocomplete="off"
                            class="w-full pl-10 pr-4 py-2.5 text-sm font-mono border rounded-xl outline-none
                                   transition-all duration-200 placeholder-gray-300 placeholder:font-sans text-gray-700
                                   @error('username') border-rose-300 bg-rose-50 focus:ring-2 focus:ring-rose-200 focus:border-rose-400
                                   @else border-gray-200 bg-white focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400
                                   @enderror">
                    </div>
                    @error('username')
                        <p class="mt-1.5 text-xs text-rose-500 flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Password Notice --}}
                <div class="flex items-start gap-2.5 p-3.5 rounded-xl bg-gradient-to-r from-indigo-50 to-violet-50 border border-indigo-100">
                    <div class="p-1 rounded-lg bg-indigo-100 shrink-0 mt-0.5">
                        <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-indigo-700 mb-0.5">Password Default</p>
                        <p class="text-xs text-indigo-600 leading-relaxed">
                            Akun akan dibuat dengan password:
                            <code class="inline-flex items-center gap-1 bg-indigo-100 text-indigo-800 font-mono font-bold px-1.5 py-0.5 rounded-md ml-0.5">grcrental123</code>
                        </p>
                        <p class="text-xs text-indigo-400 mt-1">Bisa diganti kapan saja melalui tombol Reset PW di tabel.</p>
                    </div>
                </div>

            </div>

            <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-2.5 bg-gray-50/50">
                <button type="button" onclick="closeModal()"
                    class="px-5 py-2.5 text-sm font-semibold text-gray-600 rounded-xl bg-white border border-gray-200
                           hover:bg-gray-100 hover:border-gray-300 transition-all duration-200 active:scale-95">
                    Batal
                </button>
                <button type="submit" id="addSubmitBtn"
                    class="group relative inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white rounded-xl
                           bg-gradient-to-r from-indigo-500 to-violet-600 shadow-lg shadow-indigo-200
                           hover:shadow-xl hover:shadow-indigo-300 hover:-translate-y-0.5 active:translate-y-0
                           transition-all duration-200 overflow-hidden disabled:opacity-60 disabled:cursor-not-allowed disabled:translate-y-0">
                    <span class="absolute inset-0 bg-white/10 -translate-x-full group-hover:translate-x-full transition-transform duration-500 skew-x-12 pointer-events-none"></span>
                    <span class="relative flex items-center gap-2" id="addSubmitContent">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                        </svg>
                        Simpan Admin
                    </span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ════════════════════════════════════ --}}
{{-- MODAL: Konfirmasi Toggle Status    --}}
{{-- ════════════════════════════════════ --}}
<div id="toggleModal"
     class="fixed inset-0 z-[60] hidden items-center justify-center p-4"
     role="dialog" aria-modal="true">

    <div id="toggleOverlay"
         class="absolute inset-0 bg-black/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"
         onclick="closeToggleModal()"></div>

    <div id="toggleBox"
         class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm z-10
                transform transition-all duration-300 scale-90 opacity-0 overflow-hidden">

        <div id="toggleAccentBar" class="h-1.5"></div>

        <div class="p-6">
            <div id="toggleIconArea"
                 class="w-16 h-16 rounded-2xl mx-auto mb-5 flex items-center justify-center border-2">
                <svg id="toggleIconSvg" class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"></svg>
            </div>

            <h3 id="toggleTitle" class="text-lg font-bold text-center text-gray-800 mb-2"></h3>
            <p id="toggleBody" class="text-sm text-gray-500 text-center leading-relaxed mb-6"></p>

            <div id="toggleInfoBox" class="flex items-start gap-2.5 p-3 rounded-xl border mb-6">
                <svg id="toggleInfoIcon" class="w-4 h-4 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p id="toggleInfoText" class="text-xs leading-relaxed"></p>
            </div>

            <div class="flex gap-3">
                <button type="button" onclick="closeToggleModal()"
                    class="flex-1 py-2.5 text-sm font-semibold text-gray-600 rounded-xl
                           bg-gray-100 hover:bg-gray-200 border border-gray-200
                           transition-all duration-200 active:scale-95">
                    Batal
                </button>
                <button type="button" id="toggleConfirmBtn"
                    class="flex-1 py-2.5 text-sm font-semibold text-white rounded-xl
                           transition-all duration-200 active:scale-95 shadow-lg">
                    Konfirmasi
                </button>
            </div>
        </div>
    </div>
</div>

{{-- ════════════════════════════════════ --}}
{{-- MODAL: Konfirmasi Reset Password   --}}
{{-- ════════════════════════════════════ --}}
<div id="resetModal"
     class="fixed inset-0 z-[60] hidden items-center justify-center p-4"
     role="dialog" aria-modal="true">

    <div id="resetOverlay"
         class="absolute inset-0 bg-black/50 backdrop-blur-sm opacity-0 transition-opacity duration-300"
         onclick="closeResetModal()"></div>

    <div id="resetBox"
         class="relative bg-white rounded-2xl shadow-2xl w-full max-w-md z-10
                transform transition-all duration-300 scale-90 opacity-0 overflow-hidden">

        <div class="bg-gradient-to-br from-violet-500 via-indigo-500 to-blue-500 px-6 pt-6 pb-10 relative overflow-hidden">
            <div class="absolute -top-4 -right-4 w-24 h-24 rounded-full bg-white/10"></div>
            <div class="absolute -bottom-6 -left-6 w-32 h-32 rounded-full bg-white/10"></div>
            <div class="absolute top-2 right-16 w-12 h-12 rounded-full bg-white/5"></div>

            <button type="button" onclick="closeResetModal()"
                class="absolute top-4 right-4 p-1.5 rounded-lg text-white/70 hover:text-white
                       hover:bg-white/20 transition-all duration-150 active:scale-90 z-10">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <div class="relative z-10">
                <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-sm border border-white/30
                            flex items-center justify-center mb-4 shadow-lg">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-1">Reset Password</h3>
                <p class="text-white/70 text-sm">Tindakan ini akan mengubah password akun staff</p>
            </div>
        </div>

        <div class="mt-6 mx-4 bg-white rounded-2xl shadow-lg border border-gray-100 p-5 mb-4">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-indigo-400 to-violet-500
                            flex items-center justify-center text-white font-bold text-base shrink-0">
                    <span id="resetStaffInitial">?</span>
                </div>
                <div>
                    <p class="text-xs text-gray-400 font-medium">Akun yang direset</p>
                    <p id="resetStaffName" class="text-sm font-bold text-gray-800"></p>
                </div>
            </div>

            <div class="border-t border-dashed border-gray-200 mb-4"></div>

            <div>
                <p class="text-xs text-gray-400 font-medium mb-2">Password baru akan menjadi:</p>
                <div class="flex items-center justify-between gap-3 px-4 py-3 rounded-xl bg-gray-50 border border-gray-200">
                    <div class="flex items-center gap-2.5">
                        <div class="p-1.5 rounded-lg bg-indigo-100">
                            <svg class="w-3.5 h-3.5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                        <code class="font-mono font-bold text-gray-800 text-sm tracking-widest">grcrental123</code>
                    </div>
                    <span class="text-xs font-semibold text-indigo-600 bg-indigo-50 border border-indigo-200 px-2 py-0.5 rounded-full">default</span>
                </div>
            </div>

            <div class="mt-3 flex items-start gap-2 p-3 rounded-xl bg-amber-50 border border-amber-200">
                <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <p class="text-xs text-amber-700 leading-relaxed">
                    Password lama akan <strong>tidak bisa digunakan</strong> lagi. Pastikan staff sudah diberitahu.
                </p>
            </div>
        </div>

        <div class="px-4 pb-5 flex gap-3">
            <button type="button" onclick="closeResetModal()"
                class="flex-1 py-2.5 text-sm font-semibold text-gray-600 rounded-xl
                       bg-gray-100 hover:bg-gray-200 border border-gray-200
                       transition-all duration-200 active:scale-95">
                Batal
            </button>
            <button type="button" id="resetConfirmBtn"
                class="flex-1 py-2.5 text-sm font-semibold text-white rounded-xl
                       bg-gradient-to-r from-violet-500 to-indigo-600 shadow-lg shadow-indigo-200
                       hover:shadow-xl hover:shadow-indigo-300 hover:-translate-y-0.5 active:translate-y-0
                       transition-all duration-200">
                <span id="resetConfirmContent" class="flex items-center justify-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Ya, Reset Sekarang
                </span>
            </button>
        </div>
    </div>
</div>

{{-- ════════════════════════ --}}
{{-- JAVASCRIPT              --}}
{{-- ════════════════════════ --}}
<script>
(function () {
    'use strict';


    /* ── DOM REFS ───────────────────────────────── */
    const addModal         = document.getElementById('addModal');
    const addOverlay       = document.getElementById('addOverlay');
    const addBox           = document.getElementById('addBox');
    const addSubmitBtn     = document.getElementById('addSubmitBtn');
    const addSubmitContent = document.getElementById('addSubmitContent');

    const toggleModal      = document.getElementById('toggleModal');
    const toggleOverlay    = document.getElementById('toggleOverlay');
    const toggleBox        = document.getElementById('toggleBox');
    const toggleAccentBar  = document.getElementById('toggleAccentBar');
    const toggleIconArea   = document.getElementById('toggleIconArea');
    const toggleIconSvg    = document.getElementById('toggleIconSvg');
    const toggleTitle      = document.getElementById('toggleTitle');
    const toggleBody       = document.getElementById('toggleBody');
    const toggleInfoBox    = document.getElementById('toggleInfoBox');
    const toggleInfoIcon   = document.getElementById('toggleInfoIcon');
    const toggleInfoText   = document.getElementById('toggleInfoText');
    const toggleConfirmBtn = document.getElementById('toggleConfirmBtn');

    const resetModal          = document.getElementById('resetModal');
    const resetOverlay        = document.getElementById('resetOverlay');
    const resetBox            = document.getElementById('resetBox');
    const resetStaffName      = document.getElementById('resetStaffName');
    const resetStaffInitial   = document.getElementById('resetStaffInitial');
    const resetConfirmBtn     = document.getElementById('resetConfirmBtn');
    const resetConfirmContent = document.getElementById('resetConfirmContent');

    /* ── PANEL HELPERS ──────────────────────────── */
    // KEY FIX: pakai style.display bukan class hidden
    // supaya transition CSS tidak ter-block oleh display:none
    function openPanel(modal, overlay, box) {
        console.log('openPanel called', modal, overlay, box); // cek null gak?
        console.log('modal display before:', modal.style.display);
        modal.style.display = 'flex';
        console.log('modal display after:', modal.style.display);
        requestAnimationFrame(() => requestAnimationFrame(() => {
            overlay.classList.add('opacity-100');
            box.classList.remove('scale-90', 'opacity-0');
            box.classList.add('scale-100', 'opacity-100');
        }));
        document.body.style.overflow = 'hidden';
    }

    function closePanel(modal, overlay, box, cb) {
        box.classList.remove('scale-100', 'opacity-100');
        box.classList.add('scale-90', 'opacity-0');
        overlay.classList.remove('opacity-100');
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = '';
            if (typeof cb === 'function') cb();
        }, 280);
    }

    /* ── ADD MODAL ──────────────────────────────── */
    window.openModal  = () => openPanel(addModal, addOverlay, addBox);
    window.closeModal = () => closePanel(addModal, addOverlay, addBox);

    addSubmitBtn && document.getElementById('addStaffForm').addEventListener('submit', () => {
        addSubmitBtn.disabled = true;
        addSubmitContent.innerHTML = `
            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>Menyimpan...`;
    });

    /* ── TOGGLE MODAL ───────────────────────────── */
    let activeToggleId = null;

    window.openToggleModal = function (staffId, name, isActive) {
        activeToggleId = staffId;

        if (isActive) {
            toggleAccentBar.className  = 'h-1.5 bg-gradient-to-r from-amber-400 to-orange-500';
            toggleIconArea.className   = 'w-16 h-16 rounded-2xl mx-auto mb-5 flex items-center justify-center border-2 bg-amber-50 border-amber-200';
            toggleIconSvg.setAttribute('class', 'w-8 h-8 text-amber-500');
            toggleIconSvg.innerHTML    = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />`;
            toggleTitle.textContent    = 'Nonaktifkan Akun?';
            toggleBody.innerHTML       = `Akun <strong class="text-gray-800">${name}</strong> tidak dapat login setelah dinonaktifkan.`;
            toggleInfoBox.className    = 'flex items-start gap-2.5 p-3 rounded-xl border mb-6 bg-amber-50 border-amber-200';
            
            // ✅ FIX: toggleInfoIcon juga SVG element
            toggleInfoIcon.setAttribute('class', 'w-4 h-4 shrink-0 mt-0.5 text-amber-500');
            
            toggleInfoText.className   = 'text-xs text-amber-700 leading-relaxed';
            toggleInfoText.textContent = 'Staff tidak akan bisa mengakses sistem sampai akun diaktifkan kembali.';
            toggleConfirmBtn.className = 'flex-1 py-2.5 text-sm font-semibold text-white rounded-xl transition-all duration-200 active:scale-95 shadow-lg bg-gradient-to-r from-amber-500 to-orange-500 hover:-translate-y-0.5';
            toggleConfirmBtn.textContent = 'Ya, Nonaktifkan';
        } else {
            toggleAccentBar.className  = 'h-1.5 bg-gradient-to-r from-emerald-400 to-teal-500';
            toggleIconArea.className   = 'w-16 h-16 rounded-2xl mx-auto mb-5 flex items-center justify-center border-2 bg-emerald-50 border-emerald-200';
            toggleIconSvg.setAttribute('class', 'w-8 h-8 text-emerald-500');
            toggleIconSvg.innerHTML    = `<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />`;
            toggleTitle.textContent    = 'Aktifkan Akun?';
            toggleBody.innerHTML       = `Akun <strong class="text-gray-800">${name}</strong> dapat login kembali setelah diaktifkan.`;
            toggleInfoBox.className    = 'flex items-start gap-2.5 p-3 rounded-xl border mb-6 bg-emerald-50 border-emerald-200';
            
            // ✅ FIX: toggleInfoIcon juga SVG element
            toggleInfoIcon.setAttribute('class', 'w-4 h-4 shrink-0 mt-0.5 text-emerald-500');
            
            toggleInfoText.className   = 'text-xs text-emerald-700 leading-relaxed';
            toggleInfoText.textContent = 'Staff akan dapat mengakses sistem kembali menggunakan akun yang sudah ada.';
            toggleConfirmBtn.className = 'flex-1 py-2.5 text-sm font-semibold text-white rounded-xl transition-all duration-200 active:scale-95 shadow-lg bg-gradient-to-r from-emerald-500 to-teal-500 hover:-translate-y-0.5';
            toggleConfirmBtn.textContent = 'Ya, Aktifkan';
        }

        openPanel(toggleModal, toggleOverlay, toggleBox);
    };

    window.closeToggleModal = () => closePanel(toggleModal, toggleOverlay, toggleBox, () => {
        activeToggleId = null;
        toggleConfirmBtn.disabled = false;
    });

    toggleConfirmBtn.addEventListener('click', () => {
        if (!activeToggleId) return;
        const form = document.getElementById(`toggleForm-${activeToggleId}`);
        if (!form) return;
        toggleConfirmBtn.disabled = true;
        toggleConfirmBtn.innerHTML = `<svg class="w-4 h-4 inline animate-spin mr-1" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path></svg>Memproses...`;
        form.submit();
    });

    /* ── RESET MODAL ────────────────────────────── */
    let activeResetId = null;

    window.openResetModal = function (staffId, name) {
        activeResetId = staffId;
        resetStaffName.textContent    = name;
        resetStaffInitial.textContent = name.charAt(0).toUpperCase();
        resetConfirmBtn.disabled      = false;
        resetConfirmContent.innerHTML = `
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>Ya, Reset Sekarang`;
        openPanel(resetModal, resetOverlay, resetBox);
    };

    window.closeResetModal = () => closePanel(resetModal, resetOverlay, resetBox, () => {
        activeResetId = null;
    });

    resetConfirmBtn.addEventListener('click', () => {
        if (!activeResetId) return;
        const form = document.getElementById(`resetForm-${activeResetId}`);
        if (!form) return;
        resetConfirmBtn.disabled = true;
        resetConfirmContent.innerHTML = `
            <svg class="w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>Mereset...`;
        form.submit();
    });

    /* ── ESCAPE KEY ─────────────────────────────── */
    document.addEventListener('keydown', (e) => {
        if (e.key !== 'Escape') return;
        if (addModal.style.display    !== 'none') closeModal();
        if (toggleModal.style.display !== 'none') closeToggleModal();
        if (resetModal.style.display  !== 'none') closeResetModal();
    });

    /* ── AUTO-OPEN PADA VALIDATION ERRORS ───────── */
    @if($errors->any())
    document.addEventListener('DOMContentLoaded', () => {
        openModal();
        @foreach($errors->all() as $error)
            GRCToast.show({ type: 'error', message: @json($error), duration: 5000 });
        @endforeach
});
@endif

})();
</script>

</x-admin-layout>