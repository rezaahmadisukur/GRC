{{-- ═══════════════════════════════════════════════════════════
GALLERY SECTION — Responsive Slider on Mobile, Grid on Desktop
═══════════════════════════════════════════════════════════ --}}
<section class="py-24 bg-gray-50 relative overflow-hidden" id="gallery">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight mb-4">
                Galeri <span class="text-blue-600">Armada Kami</span>
            </h2>
            <p class="text-base text-slate-500 max-w-2xl mx-auto">
                Geser untuk melihat koleksi unit kami (khusus HP) atau lihat semua di Desktop.
            </p>
        </div>

        {{-- Container Gallery --}}
        {{-- Kita gunakan flex & overflow-x-auto untuk HP, dan columns untuk Desktop --}}
        <div class="flex overflow-x-auto pb-8 gap-6 snap-x snap-mandatory hide-scrollbar sm:columns-2 lg:columns-3 sm:block sm:space-y-6 lg:space-y-6">
            
            @for ($i = 1; $i <= 12; $i++)
                <div class="min-w-[85%] sm:min-w-full snap-center group relative overflow-hidden rounded-3xl bg-white shadow-md hover:shadow-2xl transition-all duration-500 cursor-pointer">
                    
                    <img src="{{ asset('image/gallery/car-' . $i . '.jpeg') }}" 
                         alt="Rental Mobil Purwakarta"
                         class="w-full h-64 sm:h-auto object-cover transform transition-transform duration-700 group-hover:scale-110"
                         loading="lazy"
                         onerror="this.src='https://placehold.co/600x800/e2e8f0/64748b?text=Unit+Rental+'+{{$i}}">
                    
                    {{-- Overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent opacity-100 sm:opacity-0 group-hover:opacity-100 transition-all duration-500 flex flex-col justify-end p-6">
                        <h4 class="text-white font-bold text-lg">Unit Armada #{{$i}}</h4>
                        <p class="text-slate-300 text-[10px]">Pusat Rentcar Purwakarta</p>
                    </div>
                </div>
            @endfor

        </div>

        {{-- Indikator Geser (Hanya muncul di HP) --}}
        <div class="flex justify-center gap-2 mt-4 sm:hidden">
            <div class="w-8 h-1.5 bg-blue-600 rounded-full"></div>
            <div class="w-2 h-1.5 bg-slate-300 rounded-full"></div>
            <div class="w-2 h-1.5 bg-slate-300 rounded-full"></div>
        </div>
    </div>

    <style>
        /* Menghilangkan scrollbar agar terlihat bersih di HP */
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</section>