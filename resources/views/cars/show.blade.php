<x-app-layout>

  <div class="min-h-screen bg-gray-50 py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">

      {{-- ═══ BACK BUTTON ═══ --}}
      <div class="mb-8">
        <a href="{{ route('home') }}"
          class="inline-flex items-center gap-2 text-slate-500 hover:text-slate-800 transition-all duration-200 group">
          <div class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 group-hover:-translate-x-0.5"
            style="background: white; border: 1px solid #e2e8f0;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
          </div>
          <span class="text-sm font-semibold">Kembali</span>
        </a>
      </div>

      {{-- ═══ MAIN GRID ═══ --}}
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        {{-- ─────────────────────────────────
             LEFT COLUMN — Car Info
        ───────────────────────────────── --}}
        <div class="lg:col-span-7 flex flex-col gap-6">

          {{-- Hero Image --}}
          <div class="relative rounded-3xl overflow-hidden shadow-xl group"
            style="background: #f1f5f9;">
            @if($car->image)
              <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                class="w-full h-80 sm:h-96 object-cover transition-transform duration-700 group-hover:scale-105">
            @else
              <div class="w-full h-80 sm:h-96 flex items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200">
                <svg class="w-24 h-24 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 17H3a2 2 0 01-2-2v-4a2 2 0 012-2h1l3-5h10l3 5h1a2 2 0 012 2v4a2 2 0 01-2 2h-2"/>
                  <circle cx="7.5" cy="17.5" r="2.5"/>
                  <circle cx="16.5" cy="17.5" r="2.5"/>
                </svg>
              </div>
            @endif

            {{-- Overlay gradient --}}
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>

            {{-- Availability Badge --}}
            <div class="absolute top-5 left-5">
              @if($car->is_available)
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold text-white"
                  style="background: rgba(22,163,74,0.85); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.2);">
                  <span class="relative flex h-2 w-2">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-white opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-2 w-2 bg-white"></span>
                  </span>
                  Tersedia
                </span>
              @else
                <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-bold text-white"
                  style="background: rgba(220,38,38,0.85); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.2);">
                  <span class="w-2 h-2 rounded-full bg-white"></span>
                  Tidak Tersedia
                </span>
              @endif
            </div>

            {{-- Plate Code --}}
            <div class="absolute top-5 right-5">
              <span class="px-3.5 py-1.5 rounded-full text-xs font-black text-slate-800"
                style="background: rgba(255,255,255,0.92); backdrop-filter: blur(8px);">
                {{ $car->plate_code }}
              </span>
            </div>

            {{-- Car Name overlay on image bottom --}}
            <div class="absolute bottom-0 left-0 right-0 p-6">
              <h1 class="text-3xl sm:text-4xl font-black text-white leading-tight drop-shadow-lg">
                {{ $car->name }}
              </h1>
              <p class="text-white/70 text-sm font-semibold mt-1">{{ $car->category }}</p>
            </div>
          </div>

          {{-- Specs Card --}}
          <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <h2 class="text-base font-bold text-slate-800 mb-5 flex items-center gap-2">
              <span class="w-1 h-4 rounded-full bg-blue-600 inline-block"></span>
              Spesifikasi Kendaraan
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
              @php
$specs = [
  [
    'label' => 'Warna',
    'value' => $car->color,
    'bg' => '#eff6ff',
    'iconColor' => '#2563eb',
    'icon' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'
  ],
  [
    'label' => 'Transmisi',
    'value' => $car->transmission,
    'bg' => '#f5f3ff',
    'iconColor' => '#7c3aed',
    'icon' => 'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4'
  ],
  [
    'label' => 'Kapasitas',
    'value' => ($car->seats ?? '-') . ' Kursi',
    'bg' => '#ecfdf5',
    'iconColor' => '#059669',
    'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'
  ],
  [
    'label' => 'BBM',
    'value' => $car->fuel_type ?? 'Bensin',
    'bg' => '#fff7ed',
    'iconColor' => '#ea580c',
    'icon' => 'M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z'
  ],
];
              @endphp

              @foreach($specs as $spec)
                <div class="flex flex-col gap-3 p-4 rounded-2xl" style="background: {{ $spec['bg'] }};">
                  <div class="w-9 h-9 rounded-xl flex items-center justify-center bg-white shadow-sm">
                    <svg class="w-4.5 h-4.5" style="color: {{ $spec['iconColor'] }}; width:18px; height:18px;"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="{{ $spec['icon'] }}" />
                    </svg>
                  </div>
                  <div>
                    <p class="text-xs font-semibold uppercase tracking-widest" style="color: #94a3b8;">{{ $spec['label'] }}</p>
                    <p class="text-sm font-bold text-slate-800 mt-0.5 capitalize">{{ $spec['value'] }}</p>
                  </div>
                </div>
              @endforeach
            </div>
          </div>

          {{-- Pricing Card --}}
          <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">
            <h2 class="text-base font-bold text-slate-800 mb-5 flex items-center gap-2">
              <span class="w-1 h-4 rounded-full bg-blue-600 inline-block"></span>
              Tarif Sewa
            </h2>

            <div class="grid grid-cols-2 gap-4">
              {{-- 12 Jam --}}
              <div class="relative overflow-hidden rounded-2xl p-5"
                style="background: linear-gradient(135deg, #eff6ff, #dbeafe); border: 1.5px solid #bfdbfe;">
                <div class="absolute top-3 right-3">
                  <svg class="w-5 h-5 text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <p class="text-xs font-bold uppercase tracking-widest text-blue-500 mb-2">12 Jam</p>
                <p class="text-2xl font-black text-blue-700">
                  Rp {{ number_format($car->price_12h, 0, ',', '.') }}
                </p>
                <p class="text-xs text-blue-400 mt-1 font-medium">
                  ≈ Rp {{ number_format($car->price_12h / 12, 0, ',', '.') }}/jam
                </p>
              </div>

              {{-- 24 Jam --}}
              <div class="relative overflow-hidden rounded-2xl p-5"
                style="background: linear-gradient(135deg, #f5f3ff, #ede9fe); border: 1.5px solid #c4b5fd;">
                <div class="absolute top-3 right-3">
                  <svg class="w-5 h-5 text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                  </svg>
                </div>
                <p class="text-xs font-bold uppercase tracking-widest text-purple-500 mb-2">24 Jam</p>
                <p class="text-2xl font-black text-purple-700">
                  Rp {{ number_format($car->price_24h, 0, ',', '.') }}
                </p>
                <p class="text-xs text-purple-400 mt-1 font-medium">
                  ≈ Rp {{ number_format($car->price_24h / 24, 0, ',', '.') }}/jam
                </p>
              </div>
            </div>
          </div>
        </div>

        {{-- ─────────────────────────────────
             RIGHT COLUMN — Booking Form
        ───────────────────────────────── --}}
        <div class="lg:col-span-5">
          <div class="sticky top-8 bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">

            {{-- Form Header --}}
            <div class="px-7 pt-7 pb-6 border-b border-slate-100">
              <h2 class="text-xl font-black text-slate-900">Pesan Mobil Ini</h2>
              <p class="text-sm text-slate-400 mt-1 font-medium">Isi data di bawah untuk melanjutkan pemesanan</p>
            </div>

            <form action="{{ route('bookings.store') }}" method="POST" class="px-7 py-6 space-y-5">
              @csrf
              <input type="hidden" name="car_id" value="{{ $car->id }}">

              {{-- Customer Name --}}
              <div>
                <label for="customer_name" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                  Nama Lengkap <span class="text-red-400">*</span>
                </label>
                <input type="text" id="customer_name" name="customer_name"
                  value="{{ old('customer_name') }}"
                  placeholder="Contoh: Budi Santoso"
                  class="w-full px-4 py-3 rounded-xl text-sm font-medium text-slate-800 placeholder:text-slate-300 transition-all duration-200 outline-none"
                  style="background: #f8fafc; border: 1.5px solid #e2e8f0;"
                  onfocus="this.style.borderColor='#2563eb'; this.style.background='#fff';"
                  onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc';">
                @error('customer_name')
                  <p class="mt-1.5 text-xs text-red-500 font-medium flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                  </p>
                @enderror
              </div>

              {{-- WhatsApp --}}
              <div>
                <label for="whatsapp_number" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                  Nomor WhatsApp <span class="text-red-400">*</span>
                </label>
                <div class="relative">
                  <div class="absolute left-3.5 top-1/2 -translate-y-1/2">
                    <svg class="w-4 h-4" style="color: #22c55e;" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                  </div>
                  <input type="tel" id="whatsapp_number" name="whatsapp_number"
                    value="{{ old('whatsapp_number') }}"
                    placeholder="+62 812 3456 7890"
                    class="w-full pl-10 pr-4 py-3 rounded-xl text-sm font-medium text-slate-800 placeholder:text-slate-300 transition-all duration-200 outline-none"
                    style="background: #f8fafc; border: 1.5px solid #e2e8f0;"
                    onfocus="this.style.borderColor='#2563eb'; this.style.background='#fff';"
                    onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc';">
                </div>
                @error('whatsapp_number')
                  <p class="mt-1.5 text-xs text-red-500 font-medium flex items-center gap-1">
                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    {{ $message }}
                  </p>
                @enderror
              </div>

              {{-- Duration Type --}}
              <div>
                <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">
                  Paket Durasi <span class="text-red-400">*</span>
                </label>
                <div class="grid grid-cols-2 gap-3">
                  <label class="relative cursor-pointer">
                    <input type="radio" name="duration_type" value="12" class="hidden peer"
                      {{ old('duration_type') == '12' ? 'checked' : '' }}>
                    <div class="peer-checked:border-blue-600 peer-checked:bg-blue-600 border-2 border-slate-200 rounded-xl p-4 transition-all duration-200 text-center"
                      style="background: #f8fafc;">
                      <p class="text-sm font-black peer-checked:text-white text-slate-700 transition-colors">12 Jam</p>
                      <p class="text-xs font-semibold text-slate-400 mt-0.5 peer-checked:text-blue-100">
                        Rp {{ number_format($car->price_12h, 0, ',', '.') }}
                      </p>
                    </div>
                  </label>
                  <label class="relative cursor-pointer">
                    <input type="radio" name="duration_type" value="24" class="hidden peer"
                      {{ old('duration_type') == '24' ? 'checked' : '' }}>
                    <div class="peer-checked:border-blue-600 peer-checked:bg-blue-600 border-2 border-slate-200 rounded-xl p-4 transition-all duration-200 text-center"
                      style="background: #f8fafc;">
                      <p class="text-sm font-black text-slate-700 transition-colors">24 Jam</p>
                      <p class="text-xs font-semibold text-slate-400 mt-0.5">
                        Rp {{ number_format($car->price_24h, 0, ',', '.') }}
                      </p>
                    </div>
                  </label>
                </div>
              </div>

              {{-- Start Date --}}
              <div>
                <label for="start_date"
                  class="block text-xs font-bold text-[hsl(var(--muted-foreground))] uppercase tracking-widest mb-2">
                  Tanggal & Waktu Mulai <span class="text-red-400">*</span>
                </label>
              
                <div class="relative">
                  {{-- Gunakan x-ref='startDate' agar Alpine bisa menemukan input ini --}}
                  <input x-ref="startDate" type="text" id="start_date" name="start_date" value="{{ old('start_date') }}"
                    placeholder="Pilih tanggal & waktu..." readonly
                    class="w-full pl-4 pr-10 py-3 rounded-xl text-sm font-medium bg-[hsl(var(--background))] border border-[hsl(var(--border))] text-[hsl(var(--foreground))] outline-none focus:ring-2 focus:ring-[hsl(var(--primary))/20] focus:border-[hsl(var(--primary))] transition-all duration-200">
                  <div class="absolute right-4 top-1/2 -translate-y-1/2 text-[hsl(var(--muted-foreground))] pointer-events-none">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                  </div>
                </div>
              </div>

              {{-- Extra Hours --}}
              <div>
                <label for="extra_hours" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                  Jam Tambahan
                  <span class="normal-case font-medium text-slate-300 tracking-normal ml-1">(Opsional)</span>
                </label>
                <input type="number" id="extra_hours" name="extra_hours"
                  min="0" value="{{ old('extra_hours', 0) }}"
                  class="w-full px-4 py-3 rounded-xl text-sm font-medium text-slate-800 transition-all duration-200 outline-none"
                  style="background: #f8fafc; border: 1.5px solid #e2e8f0;"
                  onfocus="this.style.borderColor='#2563eb'; this.style.background='#fff';"
                  onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc';">
                <p class="mt-1.5 text-xs text-slate-400 font-medium">Tambah jam ekstra di luar paket yang dipilih</p>
              </div>

              {{-- End Date (readonly & styled) --}}
              <div>
                <label for="end_date"
                  class="block text-xs font-bold text-[hsl(var(--muted-foreground))] uppercase tracking-widest mb-2">
                  Estimasi Selesai
                </label>
                <div class="relative">
                  <input type="text" {{-- Ubah dari datetime-local ke text agar formatnya rapi --}} id="end_date" name="end_date"
                    readonly placeholder="Otomatis terisi..."
                    class="w-full px-4 py-3 rounded-xl text-sm font-bold bg-[hsl(var(--muted))] border border-[hsl(var(--border))] text-[hsl(var(--foreground))] opacity-80 cursor-not-allowed outline-none">
                  <div class="absolute right-4 top-1/2 -translate-y-1/2 text-[hsl(var(--muted-foreground))] opacity-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                  </div>
                </div>
              </div>

              {{-- Total Price --}}
              <div class="rounded-2xl p-5 relative overflow-hidden"
                style="background: linear-gradient(135deg, #eff6ff, #dbeafe); border: 1.5px solid #bfdbfe;">
                <div class="absolute -right-4 -bottom-4 w-24 h-24 rounded-full opacity-20"
                  style="background: #2563eb;"></div>
                <p class="text-xs font-bold uppercase tracking-widest text-blue-500 mb-1">Total Pembayaran</p>
                <p class="text-3xl font-black text-blue-700">
                  Rp <span id="total_price">0</span>
                </p>
                <p class="text-xs text-blue-400 font-medium mt-1" id="price_breakdown">Pilih paket durasi untuk menghitung</p>
              </div>

              {{-- Notes --}}
              <div>
                <label for="notes" class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">
                  Catatan
                  <span class="normal-case font-medium text-slate-300 tracking-normal ml-1">(Opsional)</span>
                </label>
                <textarea id="notes" name="notes" rows="2"
                  placeholder="Permintaan atau catatan khusus..."
                  class="w-full px-4 py-3 rounded-xl text-sm font-medium text-slate-800 placeholder:text-slate-300 transition-all duration-200 outline-none resize-none"
                  style="background: #f8fafc; border: 1.5px solid #e2e8f0;"
                  onfocus="this.style.borderColor='#2563eb'; this.style.background='#fff';"
                  onblur="this.style.borderColor='#e2e8f0'; this.style.background='#f8fafc';">{{ old('notes') }}</textarea>
              </div>

              {{-- Terms --}}
              <div class="flex items-center gap-3">
                <div class="relative flex-shrink-0">
                  <input type="checkbox" name="terms" id="terms"
                    class="w-4.5 h-4.5 rounded-md border-slate-300 text-blue-600 focus:ring-blue-500 cursor-pointer"
                    style="width: 18px; height: 18px;">
                </div>
                <label for="terms" class="text-sm text-slate-500 leading-relaxed cursor-pointer">
                  Saya menyetujui
                  <a href="#" class="text-blue-600 font-semibold hover:underline">Syarat & Ketentuan</a>
                  yang berlaku <span class="text-red-400">*</span>
                </label>
              </div>
              @error('terms')
                <p class="text-xs text-red-500 font-medium flex items-center gap-1">
                  <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                  {{ $message }}
                </p>
              @enderror

              {{-- Submit Button --}}
              <div class="pt-1">
                @if($car->is_available)
                  <button type="submit" id="submit-btn"
                    class="relative w-full flex items-center justify-center gap-3 py-4 px-6 rounded-2xl font-black text-base text-white overflow-hidden transition-all duration-300 hover:-translate-y-0.5 active:scale-[0.98] group"
                    style="background: linear-gradient(135deg, #16a34a, #15803d); box-shadow: 0 6px 24px rgba(22,163,74,0.40);"
                    onmouseover="this.style.boxShadow='0 10px 32px rgba(22,163,74,0.55)';"
                    onmouseout="this.style.boxShadow='0 6px 24px rgba(22,163,74,0.40)';">

                    {{-- Shine effect --}}
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"
                      style="background: linear-gradient(135deg, rgba(255,255,255,0.1), transparent 60%);"></div>

                    {{-- WhatsApp Icon --}}
                    <svg class="relative w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>

                    <span class="relative">Pesan via WhatsApp</span>

                    {{-- Arrow --}}
                    <svg class="relative w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                      fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                  </button>
                @else
                  <div class="w-full flex items-center justify-center gap-3 py-4 px-6 rounded-2xl font-black text-base text-white cursor-not-allowed"
                    style="background: #94a3b8;">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/>
                    </svg>
                    Mobil Tidak Tersedia
                  </div>
                @endif

                <p class="text-xs text-center text-slate-400 font-medium mt-3 flex items-center justify-center gap-1.5">
                  <svg class="w-3.5 h-3.5 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                  </svg>
                  Pemesanan dikonfirmasi via WhatsApp
                </p>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    const endDateInput = document.getElementById('end_date');
    const extraHoursInput = document.getElementById('extra_hours');
    const totalPriceSpan = document.getElementById('total_price');
    const priceBreakdown = document.getElementById('price_breakdown');
    const durationInputs = document.querySelectorAll('input[name="duration_type"]');

    const price12h = {{ $car->price_12h }};
    const price24h = {{ $car->price_24h }};

    function formatRupiah(number) {
      return number.toLocaleString('id-ID');
    }

    function updateForm() {
    // 1. Ambil input-inputnya
    const hiddenInput = document.querySelector('input[name="start_date"]');
    const startDateVal = hiddenInput ? hiddenInput.value : null;
    const durationRadio = document.querySelector('input[name="duration_type"]:checked');
    const extraHours = parseInt(extraHoursInput.value) || 0;

    if (!startDateVal || !durationRadio) {
        totalPriceSpan.textContent = '0';
        priceBreakdown.textContent = 'Pilih paket durasi untuk menghitung';
        return;
    }

    // 2. Kalkulasi Waktu
    const startDate = new Date(startDateVal.replace(/-/g, '/')); 
    const baseDuration = parseInt(durationRadio.value); // 12 atau 24
    
    // Total Jam = Paket (12/24) + Jam Tambahan
    const totalHours = baseDuration + extraHours;
    
    // Hitung tanggal selesai
    const endDate = new Date(startDate.getTime() + (totalHours * 60 * 60 * 1000));

    // 3. Update Tampilan Estimasi Selesai
    const options = { day: 'numeric', month: 'long', year: 'numeric' };
    const datePart = endDate.toLocaleDateString('id-ID', options);
    const h = endDate.getHours().toString().padStart(2, '0');
    const m = endDate.getMinutes().toString().padStart(2, '0');
    
    endDateInput.value = `${datePart} pukul ${h}.${m}`;

    // 4. Update Harga (Opsional tapi penting)
    const basePrice = baseDuration === 12 ? price12h : price24h;
    const pricePerHour = basePrice / baseDuration;
    const extraCost = extraHours * pricePerHour;
    const totalAmount = basePrice + extraCost;

    totalPriceSpan.textContent = formatRupiah(totalAmount);
    priceBreakdown.textContent = extraHours > 0
        ? `Paket ${baseDuration}j (Rp ${formatRupiah(basePrice)}) + ${extraHours}j tambahan (Rp ${formatRupiah(extraCost)})`
        : `Paket ${baseDuration} jam`;
}

    // Listener untuk Radio Button
    durationInputs.forEach(input => {
      input.addEventListener('change', () => {
        updateForm();
      });
    });

    // Listener untuk Jam Tambahan
    extraHoursInput.addEventListener('input', updateForm);

    // Flatpickr Calendar with colored dates
    document.addEventListener('DOMContentLoaded', function() {
        const bookedDates = @json($bookedDates);
        
        flatpickr(document.getElementById('start_date'), {
            enableTime: true,
            minDate: 'today',
            time_24hr: true,
            locale: 'id',
            altInput: true,
            altFormat: 'j F Y \\p\\u\\k\\u\\l H.i',
            dateFormat: 'Y-m-d H:i',
            onChange: function(selectedDates, dateStr) {
                if (typeof updateForm === 'function') {
                    updateForm();
                }
            },
            onDayCreate: function(dObj, dStr, fp, dayElem) {
                // Fix timezone issue: use local date not UTC
                const date = dayElem.dateObj;
                const currentDate = date.getFullYear() 
                    + '-' + String(date.getMonth() + 1).padStart(2, '0') 
                    + '-' + String(date.getDate()).padStart(2, '0');
                
                bookedDates.forEach(range => {
                    if (currentDate >= range.start && currentDate <= range.end) {
                        const today = new Date();
                        const todayStr = today.getFullYear() 
                            + '-' + String(today.getMonth() + 1).padStart(2, '0') 
                            + '-' + String(today.getDate()).padStart(2, '0');
                        
                        if (currentDate === todayStr) {
                            // Merah untuk hari ini
                            dayElem.style.backgroundColor = '#fecaca';
                            dayElem.style.color = '#991b1b';
                        } else if (range.status === 'active') {
                            // Hijau untuk booking sudah di approve
                            dayElem.style.backgroundColor = '#dcfce7';
                            dayElem.style.color = '#166534';
                        } else if (range.status === 'pending') {
                            // Kuning untuk booking menunggu approve
                            dayElem.style.backgroundColor = '#fef3c7';
                            dayElem.style.color = '#92400e';
                        }
                        dayElem.style.fontWeight = '600';
                    }
                });
            }
        });
    });
  </script>

</x-app-layout>