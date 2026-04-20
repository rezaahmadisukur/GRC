<x-app-layout>

  <div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
      <!-- Back Button -->
      <div class="mb-8">
        <a href="{{ route('cars.index') }}"
          class="inline-flex items-center gap-2 text-var(--accent) hover:text-var(--accent-dark) transition-colors duration-200">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
          <span class="text-sm font-medium">Kembali ke Mobil</span>
        </a>
      </div>

      <!-- Main Grid Layout -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

        <!-- Left Column: Car Images & Details -->
        <div class="lg:col-span-1">

          <!-- Hero Image Section -->
          <div class="relative mb-8 group overflow-hidden rounded-2xl shadow-xl">
            @if($car->image)
              <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}"
                class="w-full h-96 object-cover transition-transform duration-500 group-hover:scale-105">
            @else
              <div class="w-full h-96 bg-gradient-to-br from-slate-200 to-slate-300 flex items-center justify-center">
                <svg class="w-24 h-24 text-slate-400" fill="currentColor" viewBox="0 0 24 24">
                  <path
                    d="M18.364 5.636l-3.536 3.536m9.172-9.172a9 9 0 11-12.728 12.728m3.536-6.364l3.536-3.536m0 9.172a4 4 0 11-5.656-5.656m5.656 5.656L9.172 9.172">
                  </path>
                </svg>
              </div>
            @endif

            <!-- Availability Badge -->
            <div class="absolute top-4 right-4">
              <span
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full {{ $car->is_available ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} font-medium text-sm backdrop-blur-sm">
                <span
                  class="w-2 h-2 rounded-full {{ $car->is_available ? 'bg-green-600' : 'bg-red-600' }} animate-pulse"></span>
                {{ $car->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
              </span>
            </div>
          </div>

          <!-- Car Details Card -->
          <div class="bg-white rounded-2xl shadow-lg p-8 mb-8 border border-var(--border-light)">

            <!-- Header -->
            <div class="mb-8 pb-8 border-b border-var(--border-light)">
              <h1 class="heading-display text-4xl sm:text-5xl text-var(--primary) mb-3">{{ $car->name }}</h1>
              <p class="text-lg text-var(--accent) font-semibold">{{ $car->plate_code }}</p>
            </div>

            <!-- Specifications Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 mb-8">

              <!-- Color Spec -->
              <div class="flex flex-col items-start">
                <div class="flex items-center gap-3 mb-2">
                  <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8z">
                      </path>
                    </svg>
                  </div>
                  <span class="text-sm font-medium text-var(--text-muted)">Warna</span>
                </div>
                <p class="text-lg font-semibold text-var(--primary) capitalize">{{ $car->color }}</p>
              </div>

              <!-- Transmission Spec -->
              <div class="flex flex-col items-start">
                <div class="flex items-center gap-3 mb-2">
                  <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-purple-600" fill="currentColor" viewBox="0 0 24 24">
                      <path
                        d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 9.5c0 .83-.67 1.5-1.5 1.5S11 13.33 11 12.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5zm6 0c0 .83-.67 1.5-1.5 1.5s-1.5-.67-1.5-1.5.67-1.5 1.5-1.5 1.5.67 1.5 1.5z">
                      </path>
                    </svg>
                  </div>
                  <span class="text-sm font-medium text-var(--text-muted)">Transmisi</span>
                </div>
                <p class="text-lg font-semibold text-var(--primary)">{{ $car->transmission }}</p>
              </div>

              <!-- Availability Spec -->
              <div class="flex flex-col items-start">
                <div class="flex items-center gap-3 mb-2">
                  <div class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                      <path
                        d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z">
                      </path>
                    </svg>
                  </div>
                  <span class="text-sm font-medium text-var(--text-muted)">Status</span>
                </div>
                <p class="text-lg font-semibold {{ $car->is_available ? 'text-green-600' : 'text-red-600' }}">
                  {{ $car->is_available ? 'Tersedia' : 'Tidak Tersedia' }}
                </p>
              </div>
            </div>

            <!-- Pricing Section -->
            <div class="grid grid-cols-2 gap-6 pt-8 border-t border-var(--border-light)">
              <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-6 border border-blue-100">
                <p class="text-sm font-medium text-var(--text-muted) mb-2">Tarif 12 Jam</p>
                <p class="heading-display text-3xl text-var(--accent)">Rp
                  {{ number_format($car->price_12h, 0, ',', '.') }}
                </p>
              </div>
              <div class="bg-gradient-to-br from-cyan-50 to-teal-50 rounded-xl p-6 border border-cyan-100">
                <p class="text-sm font-medium text-var(--text-muted) mb-2">Tarif 24 Jam</p>
                <p class="heading-display text-3xl text-var(--accent-light)">Rp
                  {{ number_format($car->price_24h, 0, ',', '.') }}
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column: Booking Form -->
        <div class="lg:col-span-1">
          <div class="sticky top-8 bg-white rounded-2xl shadow-xl p-8 border border-var(--border-light)">
            <h2 class="heading-display text-2xl mb-6 text-var(--primary)">Pesan Mobil Ini</h2>

            <form action="{{ route('bookings.store') }}" method="POST" class="space-y-5">
              @csrf
              <input type="hidden" name="car_id" value="{{ $car->id }}">

              <!-- Customer Name -->
              <div>
                <label for="customer_name" class="block text-sm font-semibold text-var(--primary) mb-2">
                  Nama Lengkap <span class="text-red-500">*</span>
                </label>
                <input type="text" id="customer_name" name="customer_name" placeholder="Nama lengkap Anda"
                  class="w-full px-4 py-3 rounded-lg border border-var(--border-light) focus:outline-none focus:ring-2 focus:ring-var(--accent) focus:border-transparent transition-all duration-200 placeholder:text-slate-400">
                @error('customer_name')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <!-- WhatsApp Number -->
              <div>
                <label for="whatsapp_number" class="block text-sm font-semibold text-var(--primary) mb-2">
                  Nomor WhatsApp <span class="text-red-500">*</span>
                </label>
                <input type="tel" id="whatsapp_number" name="whatsapp_number" placeholder="+62 812 3456 7890"
                  class="w-full px-4 py-3 rounded-lg border border-var(--border-light) focus:outline-none focus:ring-2 focus:ring-var(--accent) focus:border-transparent transition-all duration-200 placeholder:text-slate-400">
                @error('whatsapp_number')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <!-- Duration Type Selector -->
              <div>
                <label class="block text-sm font-semibold text-var(--primary) mb-3">Jenis Durasi <span
                    class="text-red-500">*</span></label>
                <div class="grid grid-cols-2 gap-3">
                  <label class="relative">
                    <input type="radio" name="duration_type" value="12" class="hidden peer">
                    <div
                      class="w-full py-3 px-4 border-2 border-var(--border-light) rounded-lg cursor-pointer peer-checked:border-var(--accent) peer-checked:bg-blue-50 transition-all duration-200 text-center">
                      <p class="text-sm font-semibold peer-checked:text-var(--accent)">12 Jam</p>
                    </div>
                  </label>
                  <label class="relative">
                    <input type="radio" name="duration_type" value="24" class="hidden peer">
                    <div
                      class="w-full py-3 px-4 border-2 border-var(--border-light) rounded-lg cursor-pointer peer-checked:border-var(--accent) peer-checked:bg-blue-50 transition-all duration-200 text-center">
                      <p class="text-sm font-semibold peer-checked:text-var(--accent)">24 Jam</p>
                    </div>
                  </label>
                </div>
              </div>

              <!-- Start Date -->
              <div>
                <label for="start_date" class="block text-sm font-semibold text-var(--primary) mb-2">
                  Tanggal & Waktu Mulai <span class="text-red-500">*</span>
                </label>
                <input type="datetime-local" id="start_date" name="start_date"
                  class="w-full px-4 py-3 rounded-lg border border-var(--border-light) focus:outline-none focus:ring-2 focus:ring-var(--accent) focus:border-transparent transition-all duration-200">
                @error('start_date')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <!-- Duration Hours (Dynamic) -->
              <div>
                <label for="extra_hours" class="block text-sm font-semibold text-var(--primary) mb-2">
                  Jam Tambahan (Opsional)
                </label>
                <input type="number" id="extra_hours" name="extra_hours" min="0" value="0" placeholder="0"
                  class="w-full px-4 py-3 rounded-lg border border-var(--border-light) focus:outline-none focus:ring-2 focus:ring-var(--accent) focus:border-transparent transition-all duration-200">
                <p class="mt-1 text-xs text-var(--text-muted)">Tambahkan jam ekstra di luar durasi yang dipilih</p>
              </div>

              <!-- End Date (Read-only) -->
              <div>
                <label for="end_date" class="block text-sm font-semibold text-var(--primary) mb-2">
                  Tanggal & Waktu Akhir
                </label>
                <input type="datetime-local" id="end_date" name="end_date"
                  class="w-full px-4 py-3 rounded-lg border border-var(--border-light) bg-slate-50 focus:outline-none focus:ring-2 focus:ring-var(--accent) focus:border-transparent transition-all duration-200"
                  readonly>
              </div>

              <!-- Price Display -->
              <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-4 border border-blue-100">
                <p class="text-sm font-medium text-var(--text-muted) mb-1">Harga Total</p>
                <p class="heading-display text-2xl text-var(--accent)">Rp <span id="total_price">0</span></p>
              </div>

              <!-- Notes -->
              <div>
                <label for="notes" class="block text-sm font-semibold text-var(--primary) mb-2">
                  Permintaan Khusus (Opsional)
                </label>
                <textarea id="notes" name="notes" rows="3" placeholder="Ada permintaan atau catatan khusus?"
                  class="w-full px-4 py-3 rounded-lg border border-var(--border-light) focus:outline-none focus:ring-2 focus:ring-var(--accent) focus:border-transparent transition-all duration-200 placeholder:text-slate-400 resize-none"></textarea>
              </div>

              <!-- Terms & Conditions Checkbox -->
              <div>
                <label class="flex items-start gap-3 cursor-pointer">
                  <input type="checkbox" name="terms" id="terms"
                    class="mt-1 w-5 h-5 rounded border-var(--border-light) text-var(--accent) focus:ring-var(--accent) cursor-pointer">
                  <span class="text-sm text-var(--primary)">
                    Saya menyetujui <span class="text-var(--accent) font-medium">Syarat & Ketentuan</span> yang berlaku
                    untuk pemesanan ini <span class="text-red-500">*</span>
                  </span>
                </label>
                @error('terms')
                  <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
              </div>

              <!-- Submit Button -->
              <button type="submit"
                class="w-full bg-gradient-to-r from-var(--accent) to-var(--accent-light) text-white font-semibold py-4 rounded-lg hover:shadow-lg transition-all duration-200 hover:scale-[1.02] active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed bg-green-600"
                {{ !$car->is_available ? 'disabled' : '' }}>
                {{ $car->is_available ? 'Pesan via WhatsApp' : 'Mobil Tidak Tersedia' }}
              </button>

              <p class="text-xs text-center text-var(--text-muted)">
                Kami akan mengonfirmasi pemesanan Anda melalui WhatsApp
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const startDateInput = document.getElementById('start_date');
    const endDateInput = document.getElementById('end_date');
    const durationTypeInputs = document.querySelectorAll('input[name="duration_type"]');
    const durationHoursInput = document.getElementById('extra_hours');
    const totalPriceSpan = document.getElementById('total_price');

    const price12h = {{ $car->price_12h }};
    const price24h = {{ $car->price_24h }};

    function calculatePricePerHour(durationType) {
      if (durationType === '12') return price12h / 12;
      if (durationType === '24') return price24h / 24;
      return 0;
    }

    function updateEndDateAndPrice() {
      const startDate = new Date(startDateInput.value);
      const durationType = document.querySelector('input[name="duration_type"]:checked')?.value;
      const additionalHours = parseInt(durationHoursInput.value) || 0;

      if (!startDate || !durationType) return;

      let totalHours = parseInt(durationType) + additionalHours;
      const endDate = new Date(startDate.getTime() + totalHours * 60 * 60 * 1000);
      endDateInput.value = endDate.toISOString().slice(0, 16);

      let totalPrice = 0;
      if (durationType === '12') {
        totalPrice = price12h + (calculatePricePerHour('12') * additionalHours);
      } else if (durationType === '24') {
        totalPrice = price24h + (calculatePricePerHour('24') * additionalHours);
      }

      totalPriceSpan.textContent = totalPrice.toLocaleString('id-ID');
    }

    startDateInput.addEventListener('change', updateEndDateAndPrice);
    durationHoursInput.addEventListener('input', updateEndDateAndPrice);
    durationTypeInputs.forEach(input => {
      input.addEventListener('change', updateEndDateAndPrice);
    });

    // Set minimum date to today
    const today = new Date().toISOString().slice(0, 16);
    startDateInput.min = today;
  </script>
</x-app-layout>