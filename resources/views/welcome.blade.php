<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GRC Rental - Solusi Rental Mobil Terpercaya</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 1.5rem 2rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: #1e40af;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #1e40af;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(30, 64, 175, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #1e40af;
            border: 2px solid #1e40af;
        }

        .btn-secondary:hover {
            background: #1e40af;
            color: white;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%);
            color: white;
            padding: 6rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: -100px;
            right: -100px;
        }

        .hero::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            bottom: -80px;
            left: -80px;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Search Section */
        .search-section {
            background: white;
            padding: 3rem 2rem;
            max-width: 1200px;
            margin: -2rem auto 0;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
        }

        .search-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            align-items: end;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #1e40af;
            font-size: 0.95rem;
        }

        .form-group input,
        .form-group select {
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #1e40af;
        }

        /* Cars Section */
        .cars-section {
            max-width: 1200px;
            margin: 5rem auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #1e40af;
            font-weight: 700;
        }

        .section-subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 3rem;
            font-size: 1.1rem;
        }

        .cars-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .car-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .car-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .car-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            overflow: hidden;
            position: relative;
        }

        .car-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .car-card:hover .car-image img {
            transform: scale(1.05);
        }

        .car-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #1e40af;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }

        .car-info {
            padding: 1.5rem;
        }

        .car-brand {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 0.5rem;
        }

        .car-type {
            color: #999;
            font-size: 0.95rem;
            margin-bottom: 1rem;
        }

        .car-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #e5e7eb;
            padding-top: 1rem;
            margin-top: 1rem;
        }

        .car-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e40af;
        }

        .car-price-unit {
            font-size: 0.85rem;
            color: #999;
            display: block;
        }

        .btn-view {
            background: #1e40af;
            color: white;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }

        .btn-view:hover {
            background: #1e3a8a;
            transform: translateX(3px);
        }

        /* Features Section */
        .features-section {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            padding: 4rem 2rem;
            margin: 4rem 0;
        }

        .features-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #1e40af;
        }

        .feature-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            color: #666;
            font-size: 0.95rem;
        }

        /* Footer */
        .footer {
            background: #1e40af;
            color: white;
            padding: 3rem 2rem;
            text-align: center;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 1.5rem 0;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        .footer-links a:hover {
            opacity: 0.8;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #999;
        }

        @media (max-width: 768px) {
            .nav-links {
                gap: 1rem;
                font-size: 0.9rem;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                width: 100%;
            }

            .search-form {
                grid-template-columns: 1fr;
            }

            .cars-grid {
                grid-template-columns: 1fr;
            }

            .search-section {
                margin-top: -1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header & Navigation -->
    <header class="header">
        <nav class="navbar">
            <div class="logo">🚗 GRC Rental</div>
            <ul class="nav-links">
                <li><a href="#home">Beranda</a></li>
                <li><a href="#cars">Mobil</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
            <div class="auth-buttons">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endif
                @endauth
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>Solusi Rental Mobil Terpercaya</h1>
            <p>Nikmati kenyamanan berkendara dengan armada mobil pilihan kami yang modern dan terawat</p>
            <div class="hero-buttons">
                <button class="btn btn-primary" onclick="document.querySelector('.search-section').scrollIntoView({behavior: 'smooth'})">Cari Mobil</button>
                <a href="#about" class="btn btn-secondary">Pelajari Lebih Lanjut</a>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <div class="search-section">
        <form action="{{ route('dashboard') }}" method="GET" class="search-form">
            <div class="form-group">
                <label>Tanggal Mulai</label>
                <input type="date" name="start_date" required>
            </div>
            <div class="form-group">
                <label>Tanggal Selesai</label>
                <input type="date" name="end_date" required>
            </div>
            <div class="form-group">
                <label>Tipe Mobil</label>
                <select name="type">
                    <option value="">Semua Tipe</option>
                    <option value="SUV">SUV</option>
                    <option value="Sedan">Sedan</option>
                    <option value="MPV">MPV</option>
                    <option value="City Car">City Car</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Cari Sekarang</button>
        </form>
    </div>

    <!-- Cars Section -->
    <section class="cars-section" id="cars">
        <h2 class="section-title">Daftar Mobil Tersedia</h2>
        <p class="section-subtitle">Pilih dari koleksi lengkap kendaraan premium kami</p>

        {{-- @if($cars && count($cars) > 0)
            <div class="cars-grid">
                @foreach($cars as $car)
                    <div class="car-card">
                        <div class="car-image">
                            @if($car->image_url)
                                <img src="{{ $car->image_url }}" alt="{{ $car->brand }} {{ $car->model }}">
                            @else
                                <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); color: #1e40af; font-size: 3rem;">
                                    <i class="fas fa-car"></i>
                                </div>
                            @endif
                            <span class="car-badge">{{ $car->type ?? 'Standar' }}</span>
                        </div>
                        <div class="car-info">
                            <div class="car-brand">{{ $car->brand }} {{ $car->model }}</div>
                            <div class="car-type">{{ $car->year ?? '2024' }} • {{ $car->transmission ?? 'Manual' }}</div>
                            <div class="car-details">
                                <div>
                                    <span class="car-price">Rp {{ number_format($car->price_per_day, 0, ',', '.') }}</span>
                                    <span class="car-price-unit">/ hari</span>
                                </div>
                                <a href="{{ route('cars.show', $car->plate_code) }}" class="btn-view">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-inbox" style="font-size: 3rem; margin-bottom: 1rem; display: block; color: #1e40af;"></i>
                <p style="font-size: 1.1rem;">Maaf, tidak ada mobil yang tersedia saat ini. Silakan cek kembali nanti.</p>
            </div>
        @endif --}}
    </section>

    <!-- Features Section -->
    <section class="features-section" id="about">
        <div class="features-container">
            <h2 class="section-title">Mengapa Memilih Kami</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-car-alt"></i></div>
                    <h3 class="feature-title">Armada Lengkap</h3>
                    <p class="feature-desc">Pilihan mobil terlengkap dari berbagai merek ternama dan dalam kondisi terbaik</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-tag"></i></div>
                    <h3 class="feature-title">Harga Terjangkau</h3>
                    <p class="feature-desc">Tarif kompetitif dengan berbagai paket sewa yang fleksibel sesuai kebutuhan Anda</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-headset"></i></div>
                    <h3 class="feature-title">Layanan 24/7</h3>
                    <p class="feature-desc">Tim customer service siap membantu Anda kapan saja untuk kepuasan maksimal</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3 class="feature-title">Asuransi Lengkap</h3>
                    <p class="feature-desc">Perlindungan menyeluruh dengan asuransi komprehensif untuk setiap penyewaan</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <h3 class="feature-title">Lokasi Strategis</h3>
                    <p class="feature-desc">Kantor cabang tersebar di berbagai lokasi untuk kemudahan akses Anda</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fas fa-check-circle"></i></div>
                    <h3 class="feature-title">Proses Mudah</h3>
                    <p class="feature-desc">Proses sewa yang cepat, mudah, dan transparan tanpa ribet</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="footer-content">
            <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">GRC Rental - Solusi Rental Mobil Anda</h3>
            <div class="footer-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">FAQ</a>
                <a href="#">Contact Us</a>
            </div>
            <p style="margin-top: 2rem; opacity: 0.9;">
                📍 Purwakarta, Jawa Barat<br>
                📞 +62 XXX-XXXX-XXXX<br>
                📧 info@grc-rental.com
            </p>
            <p style="margin-top: 2rem; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 2rem; opacity: 0.8;">
                &copy; 2024 GRC Rental. Semua hak dilindungi.
            </p>
        </div>
    </footer>

    <script>
        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#' && document.querySelector(href)) {
                    e.preventDefault();
                    document.querySelector(href).scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
