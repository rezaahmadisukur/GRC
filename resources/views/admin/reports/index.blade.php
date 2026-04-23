<x-admin-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Laporan Transaksi
    </h2>
  </x-slot>

  <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-8 px-4 sm:px-6 lg:px-8">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      <!-- Form Card -->
      <div class="lg:col-span-1">
        <div
          class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
          <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-5">
            <h2 class="text-lg font-semibold text-white">Pilih Periode Laporan</h2>
            <p class="text-sm mt-1 text-white">Tentukan rentang tanggal untuk laporan</p>
          </div>

          <form action="{{ route('admin.reports.download') }}" method="GET" class="p-6 space-y-5" id="reportForm">
            @csrf

            <!-- Start Date -->
            <div class="space-y-2">
              <label for="start_date" class="block text-sm font-medium text-slate-700">Tanggal
                Mulai</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                  </svg>
                </div>
                <input type="date" id="start_date" name="start_date" required
                  class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 hover:bg-white"
                  value="{{ date('Y-m-01') }}">
              </div>
            </div>

            <!-- End Date -->
            <div class="space-y-2">
              <label for="end_date" class="block text-sm font-medium text-slate-700">Tanggal Akhir</label>
              <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                  </svg>
                </div>
                <input type="date" id="end_date" name="end_date" required
                  class="w-full pl-10 pr-4 py-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-slate-50 hover:bg-white"
                  value="{{ date('Y-m-d') }}">
              </div>
            </div>

            <!-- Validation Message -->
            <div id="dateError" class="hidden p-3 bg-red-50 border border-red-200 rounded-xl text-red-600 text-sm">
              <span>Tanggal akhir harus lebih besar dari tanggal mulai</span>
            </div>

            <!-- Quick Date Presets -->
            <div class="space-y-2">
              <label class="block text-sm font-medium text-slate-700">Pilihan Cepat</label>
              <div class="grid grid-cols-2 gap-2">
                <button type="button" onclick="setDatePreset('today')"
                  class="px-3 py-2 text-sm bg-slate-100 hover:bg-slate-200 rounded-lg transition-all text-slate-700 font-medium">
                  Hari Ini
                </button>
                <button type="button" onclick="setDatePreset('week')"
                  class="px-3 py-2 text-sm bg-slate-100 hover:bg-slate-200 rounded-lg transition-all text-slate-700 font-medium">
                  7 Hari
                </button>
                <button type="button" onclick="setDatePreset('month')"
                  class="px-3 py-2 text-sm bg-slate-100 hover:bg-slate-200 rounded-lg transition-all text-slate-700 font-medium">
                  Bulan Ini
                </button>
                <button type="button" onclick="setDatePreset('lastmonth')"
                  class="px-3 py-2 text-sm bg-slate-100 hover:bg-slate-200 rounded-lg transition-all text-slate-700 font-medium">
                  Bulan Lalu
                </button>
              </div>
            </div>

            <!-- Download Button -->
            <button type="submit" id="downloadBtn"
              class="w-full mt-2 group relative px-6 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/30 hover:shadow-xl hover:shadow-blue-500/40 transition-all duration-300 hover:-translate-y-0.5 overflow-hidden disabled:opacity-70 disabled:cursor-not-allowed disabled:hover:translate-y-0">
              <span class="relative z-10 flex items-center justify-center gap-2">
                <svg class="w-5 h-5 transition-transform group-hover:-translate-y-0.5" fill="none" stroke="currentColor"
                  viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                  </path>
                </svg>
                <span id="btnText">Unduh Laporan PDF</span>
              </span>
              <div
                class="absolute inset-0 bg-gradient-to-r from-indigo-600 to-blue-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              </div>
            </button>
          </form>
        </div>
      </div>

      <!-- Info & Preview Section -->
      <div class="lg:col-span-2 space-y-6">
        <!-- Info Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
          <div
            class="bg-white rounded-xl shadow-lg p-5 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 border-l-4 border-blue-500">
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                  </path>
                </svg>
              </div>
              <div>
                <p class="text-sm text-slate-500">Total Booking</p>
                <p class="text-2xl font-bold text-slate-800" id="totalBookings">-</p>
              </div>
            </div>
          </div>

          <div
            class="bg-white rounded-xl shadow-lg p-5 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 border-l-4 border-emerald-500">
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 rounded-lg bg-emerald-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                  </path>
                </svg>
              </div>
              <div>
                <p class="text-sm text-slate-500">Total Omzet</p>
                <p class="text-2xl font-bold text-slate-800" id="totalRevenue">Rp -</p>
              </div>
            </div>
          </div>

          <div
            class="bg-white rounded-xl shadow-lg p-5 transition-all duration-300 hover:shadow-xl hover:-translate-y-1 border-l-4 border-purple-500">
            <div class="flex items-center gap-4">
              <div class="w-12 h-12 rounded-lg bg-purple-100 flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                  </path>
                </svg>
              </div>
              <div>
                <p class="text-sm text-slate-500">Mobil Aktif</p>
                <p class="text-2xl font-bold text-slate-800">
                  {{ \App\Models\Car::where('is_available', true)->count() }}
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Preview Card -->
        <div class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 overflow-hidden">
          <div class="px-6 py-5 border-b border-slate-100">
            <h3 class="font-semibold text-slate-800">Panduan Penggunaan</h3>
          </div>
          <div class="p-6">
            <div class="space-y-4">
              <div class="flex items-start gap-4 p-4 bg-blue-50 rounded-xl">
                <div
                  class="flex-shrink-0 w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                  1</div>
                <div>
                  <h4 class="font-medium text-slate-800">Pilih Rentang Tanggal</h4>
                  <p class="text-sm text-slate-600 mt-1">Tentukan tanggal mulai dan tanggal akhir
                    untuk periode laporan yang ingin dihasilkan</p>
                </div>
              </div>

              <div class="flex items-start gap-4 p-4 bg-emerald-50 rounded-xl">
                <div
                  class="flex-shrink-0 w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold">
                  2</div>
                <div>
                  <h4 class="font-medium text-slate-800">Klik Unduh Laporan</h4>
                  <p class="text-sm text-slate-600 mt-1">Sistem akan secara otomatis generate file PDF
                    yang berisi seluruh data transaksi pada periode yang dipilih</p>
                </div>
              </div>

              <div class="flex items-start gap-4 p-4 bg-purple-50 rounded-xl">
                <div
                  class="flex-shrink-0 w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold">
                  3</div>
                <div>
                  <h4 class="font-medium text-slate-800">File PDF Siap Digunakan</h4>
                  <p class="text-sm text-slate-600 mt-1">File laporan akan otomatis terunduh dan siap untuk dibagikan
                    atau dicetak</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const startDate = document.getElementById('start_date');
        const endDate = document.getElementById('end_date');
        const dateError = document.getElementById('dateError');
        const reportForm = document.getElementById('reportForm');
        const downloadBtn = document.getElementById('downloadBtn');
        const btnText = document.getElementById('btnText');

        // Validate dates on change
        startDate.addEventListener('change', validateDates);
        endDate.addEventListener('change', validateDates);

        function validateDates() {
          if (new Date(endDate.value) < new Date(startDate.value)) {
            dateError.classList.remove('hidden');
            downloadBtn.disabled = true;
            return false;
          } else {
            dateError.classList.add('hidden');
            downloadBtn.disabled = false;
            return true;
          }
        }

        // Date preset handler
        window.setDatePreset = function (preset) {
          const today = new Date();
          let start = new Date();

          switch (preset) {
            case 'today':
              start = new Date();
              break;
            case 'week':
              start.setDate(today.getDate() - 7);
              break;
            case 'month':
              start = new Date(today.getFullYear(), today.getMonth(), 1);
              break;
            case 'lastmonth':
              start = new Date(today.getFullYear(), today.getMonth() - 1, 1);
              const lastDay = new Date(today.getFullYear(), today.getMonth(), 0);
              endDate.value = lastDay.toISOString().split('T')[0];
              break;
          }

          startDate.value = start.toISOString().split('T')[0];
          if (preset !== 'lastmonth') {
            endDate.value = today.toISOString().split('T')[0];
          }
          validateDates();
        }

        // Form submit handler with loading state
        reportForm.addEventListener('submit', function (e) {
          if (!validateDates()) {
            e.preventDefault();
            return;
          }

          downloadBtn.disabled = true;
          btnText.innerHTML = 'Generating PDF...';
        });
      });
    </script>
  @endpush

</x-admin-layout>