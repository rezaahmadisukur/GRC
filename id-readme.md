# Pusat Rentcar Purwakarta

Aplikasi ini adalah sistem manajemen rental mobil berbasis Laravel dengan alur booking publik, dashboard admin dan owner yang terautentikasi, bukti booking, laporan PDF, dan dokumentasi API melalui Scalar.

Di repository ini tidak ada image Docker, file docker-compose, atau workflow CI/CD. Panduan di bawah adalah alur setup lokal yang terverifikasi.

## Indonesian

### Nama Proyek

Pusat Rentcar Purwakarta

### Deskripsi

Pusat Rentcar Purwakarta adalah aplikasi web rental mobil yang dibangun dengan Laravel 10. Aplikasi ini mendukung pencarian mobil publik, pemesanan customer, pengecekan status booking, dashboard admin dan owner yang terautentikasi, manajemen staf khusus owner, manajemen armada mobil, konfirmasi booking, pembuatan laporan, dan ekspor PDF.

Aplikasi ini menggunakan login berbasis username, bukan email. Akun staf baru dibuat oleh owner dari dashboard dan dipaksa mengganti password saat login pertama.

### Fitur

- Halaman beranda publik dengan mobil unggulan.
- Daftar mobil publik dengan filter pencarian, kategori, kursi, transmisi, bahan bakar, dan ketersediaan.
- Halaman detail mobil publik dengan visibilitas tanggal booking.
- Form pemesanan publik dengan pengalihan ke WhatsApp admin.
- Pengecekan status booking publik berdasarkan kode booking atau nomor WhatsApp.
- Dashboard terautentikasi dengan statistik pendapatan, booking, dan mobil.
- Alur quick-booking admin dengan pembuatan receipt instan.
- Alur status booking untuk pending, active, completed, dan cancelled.
- CRUD mobil dengan dukungan upload gambar.
- Manajemen staf khusus owner dengan aktivasi akun dan reset password.
- Ekspor laporan PDF untuk rentang tanggal tertentu.
- Alur ubah password profil dan forced-password-change.
- Endpoint API untuk pengecekan ketersediaan mobil.
- Dokumentasi API Scalar yang disajikan dari file OpenAPI bawaan.

### Tech Stack

- PHP 8.1 atau lebih baru.
- Laravel 10.10.
- MySQL sebagai mesin database default.
- Composer untuk manajemen dependensi PHP.
- npm dengan `package-lock.json` yang sudah disertakan untuk manajemen dependensi frontend.
- Vite untuk bundling frontend.
- Blade untuk view yang dirender di server.
- Tailwind CSS untuk styling.
- Alpine.js untuk interaksi ringan.
- Chart.js untuk grafik dashboard.
- Flatpickr untuk pilihan tanggal dan waktu.
- SweetAlert2 untuk modal alert.
- Laravel Sanctum untuk autentikasi API.
- Barryvdh Laravel DomPDF untuk ekspor PDF.
- Playwright untuk pengujian browser.
- PHPUnit untuk unit test PHP.

### Prasyarat

- PHP 8.1+ dengan ekstensi yang diperlukan Laravel dan DomPDF.
- Composer.
- MySQL atau server yang kompatibel dengan MySQL.
- Node.js dan npm.
- Stack server PHP lokal seperti Laragon, XAMPP, Valet, atau instalasi PHP manual.
- Hak tulis ke `storage/` dan `bootstrap/cache/`.

Needs Verification:

- Repository tidak menentukan versi Node di `package.json`. Gunakan rilis Node.js LTS yang kompatibel dengan Vite 5 dan Playwright 1.60.
- Repository tidak menyediakan Docker atau kebutuhan environment berbasis kontainer.

### Instalasi

1. Clone repository dan masuk ke direktori proyek.

```bash
git clone <repository-url>
cd GRC-rental-question-mark
```

2. Install dependensi.

```bash
composer install
npm install
```

3. Buat file environment dan generate application key.

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
```

4. Reset dan seed database.

```bash
php artisan migrate:fresh --seed
```

5. Buat storage symlink.

```bash
php artisan storage:link
```

6. Jalankan aplikasi.

```bash
npm start
```

### Konfigurasi Environment

Template di `.env.example` adalah sumber kebenaran untuk konfigurasi lokal. Nilai terpentingnya adalah:

```dotenv
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=false
APP_URL=http://localhost

WHATSAPP_ADMIN_NUMBER=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

Fungsi setiap kelompok dan kapan digunakan:

- `APP_KEY` harus dibuat sebelum aplikasi bisa melayani request dengan aman.
- `APP_URL` harus cocok dengan URL lokal atau produksi agar link asset dan storage benar.
- `WHATSAPP_ADMIN_NUMBER` diperlukan untuk redirect booking ke WhatsApp pada `BookingService`. Kosongkan hanya jika nomor admin belum disiapkan. Needs Verification.
- `DB_*` mengatur koneksi database utama.
- `CACHE_DRIVER`, `SESSION_DRIVER`, dan `QUEUE_CONNECTION` masing-masing diset ke file, file, dan sync untuk development lokal.
- `MAIL_*` sudah disiapkan untuk testing email lokal yang kompatibel dengan Mailpit.

Repository juga membaca variabel tambahan yang bersifat opsional dari file konfigurasi, termasuk `CACHE_PREFIX`, `SESSION_DOMAIN`, `SESSION_STORE`, `SANCTUM_STATEFUL_DOMAINS`, `REDIS_*`, `AWS_*`, `PUSHER_*`, `MAILGUN_*`, `POSTMARK_TOKEN`, dan `DYNAMODB_*`. Variabel ini tidak dibutuhkan untuk alur lokal default kecuali Anda berpindah ke layanan tersebut.

### Konfigurasi Database

Aplikasi menggunakan MySQL secara default. Default lokal yang terverifikasi adalah:

- Driver: `mysql`
- Host: `127.0.0.1`
- Port: `3306`
- Database: `laravel`
- Username: `root`
- Password: kosong

Test Playwright memakai database terpisah bernama `db_grc` di `tests/playwright/db.ts`. Jika Anda ingin menjalankan browser test tanpa mengubah file tersebut, buat database MySQL dengan nama yang sama. Needs Verification jika Anda ingin nama database test yang berbeda.

### Migrasi Database

```bash
php artisan migrate
```

Jalankan setelah database dibuat dan `.env` dikonfigurasi. Perintah ini membuat seluruh tabel aplikasi yang didefinisikan di repository:

- `users` dengan `username`, `role`, `is_active`, dan `must_change_password`.
- `password_reset_tokens` untuk token reset password.
- `failed_jobs` untuk entri job yang gagal.
- `personal_access_tokens` untuk token API Sanctum.
- `cars` untuk armada mobil.
- `customers` untuk data penyewa.
- `bookings` untuk transaksi sewa.

Jika Anda perlu memulai dari database kosong, alur reset standar Laravel adalah menghapus lalu membuat ulang schema sebelum migrasi. Repository tidak menambahkan perintah custom untuk hal ini. Needs Verification.

### Seeding Database

```bash
php artisan db:seed
```

Jalankan setelah migrasi ketika Anda ingin akun owner default. `DatabaseSeeder` saat ini hanya memanggil `UserSeeder`, jadi seed default hanya membuat satu user owner.

```bash
php artisan db:seed --class=CarSeeder
```

Jalankan hanya jika Anda ingin data mobil contoh. `CarSeeder` menghasilkan 350 data mobil dengan detail armada acak.

```bash
php artisan db:seed --class=BookingSeeder
```

Jalankan setelah data mobil tersedia. `BookingSeeder` bergantung pada tabel `cars` yang sudah terisi dan menghasilkan 2.500 booking contoh.

Urutan seeding penting:

1. Jalankan `php artisan db:seed` untuk owner default.
2. Jalankan `php artisan db:seed --class=CarSeeder` jika Anda ingin data mobil contoh.
3. Jalankan `php artisan db:seed --class=BookingSeeder` hanya setelah data mobil ada.

### Setup Storage

```bash
php artisan storage:link
```

Jalankan setelah migrasi dan sebelum upload atau menampilkan gambar mobil. Aplikasi menyimpan gambar mobil yang diupload di `storage/app/public/cars`, dan perintah ini mengeksposnya melalui `public/storage`.

Pastikan juga `storage/` dan `bootstrap/cache/` bisa ditulis pada mesin atau server target.

### Instalasi Asset Frontend

```bash
npm install
```

Jalankan di mesin baru sebelum build frontend atau perintah test frontend. Bundle frontend bergantung pada Vite, Tailwind CSS, Alpine.js, Chart.js, Flatpickr, SweetAlert2, dan Playwright.

### Build Frontend

```bash
npm run build
```

Jalankan sebelum deployment produksi atau kapan pun Anda ingin bundle asset yang siap produksi. Perintah ini mengompilasi `resources/css/app.css` dan `resources/js/app.js` lewat Vite.

Untuk development lokal, Anda juga bisa memakai:

```bash
npm run dev
```

Jalankan ini saat Anda ingin Vite memantau perubahan dan menyajikan asset selama development.

### Menjalankan Aplikasi

```bash
npm start
```

Jalankan saat development lokal ketika backend dan frontend ingin dimulai bersamaan. Script ini menjalankan `php artisan serve` dan `vite` secara paralel, sehingga aplikasi tersedia sambil asset direbuild otomatis.

Jika Anda lebih suka terminal terpisah, gunakan:

```bash
php artisan serve
```

Jalankan ini ketika Anda hanya ingin server backend Laravel. Perintah ini menyajikan aplikasi pada port lokal default Laravel.

```bash
npm run dev
```

Jalankan di terminal kedua ketika Anda hanya ingin watcher frontend Vite.

### Menjalankan Queue Worker

```bash
php artisan queue:work
```

Jalankan hanya jika Anda mengubah `QUEUE_CONNECTION` dari `sync` dan mulai mengirim job asinkron. Repository default menggunakan queue sinkron, jadi worker tidak diperlukan untuk setup lokal standar.

### Menjalankan Task Terjadwal

Repository ini tidak mendefinisikan task terjadwal custom di `app/Console/Kernel.php`, jadi saat ini tidak ada scheduler spesifik proyek yang perlu dijalankan.

Jika nanti Anda menambahkan scheduled job, perintah Laravel standarnya adalah:

```bash
php artisan schedule:work
```

Jalankan ini saat Anda ingin scheduler tetap aktif di shell lokal.

```bash
php artisan schedule:run
```

Jalankan ini dari cron setiap menit di production jika command terjadwal ditambahkan nanti.

Needs Verification: belum ada entri schedule custom di repository saat ini.

### Testing

```bash
vendor/bin/phpunit
```

Jalankan ini untuk mengeksekusi test unit PHP yang dijelaskan oleh `phpunit.xml`. Repository saat ini berisi scaffold test unit dasar dan file bootstrap test aplikasi Laravel.

```bash
npm run playwright:test
```

Jalankan ini untuk mengeksekusi browser test suite di `tests/playwright`. Playwright config menargetkan Chromium dan mengharapkan aplikasi tersedia di `http://localhost:8000`.

```bash
npm run playwright:show-report
```

Jalankan ini setelah Playwright tests untuk membuka HTML report yang dihasilkan test runner.

Needs Verification:

- Jika Playwright melaporkan browser binary hilang, install runtime Chromium dengan command instalasi browser Playwright standar.
- Playwright tests memakai nama database MySQL `db_grc` di `tests/playwright/db.ts`.

### Project Structure

```text
app/
	Console/           Console kernel dan registrasi command
	DTOs/              Data transfer object bertipe untuk mobil dan booking
	Exceptions/        Global exception handler
	Http/
		Controllers/     Controller publik, auth, dan admin
		Middleware/      Middleware role, password, dan HTTPS custom
		Requests/        Kelas validasi form request
	Models/            Model Eloquent untuk user, mobil, booking, dan customer
	Providers/         Laravel service provider dan route provider
	Services/          Service domain untuk operasi booking dan mobil
bootstrap/           File bootstrap Laravel
config/              Konfigurasi aplikasi dan wiring service
database/
	factories/         Model factory
	migrations/        Definisi schema
	seeders/           Data seed default dan demo
public/              Web root, dokumen OpenAPI, dan asset statis
resources/
	css/               Stylesheet entry Tailwind
	js/                Script entry Vite
	views/             Template Blade
routes/              Route web, auth, API, console, dan channel
storage/             Log, cache, session, dan file upload
tests/
	Unit/              Unit test PHPUnit
	playwright/        End-to-end test Playwright dan helper DB
```

### Default Credentials

| Account | Username         | Password       | Notes                                                                                                         |
| ------- | ---------------- | -------------- | ------------------------------------------------------------------------------------------------------------- |
| Owner   | `owner123`       | `password123`  | Di-seed oleh `UserSeeder`. Ini satu-satunya akun yang dibuat oleh `php artisan db:seed` pada database baru.   |
| Admin   | created by owner | `grcrental123` | Dipakai ketika owner membuat atau mereset akun staf. Akun akan dipaksa mengganti password saat login pertama. |

Needs Verification:

- Tidak ada alur self-registration customer di `routes/auth.php`; akun staf dibuat manual oleh owner.

### Troubleshooting

- Jika login gagal tepat setelah seeding, pastikan `APP_KEY` sudah terisi dan tabel `users` berisi akun owner yang di-seed.
- Jika koneksi database gagal, cek nilai `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.
- Jika redirect booking tidak menuju WhatsApp, set `WHATSAPP_ADMIN_NUMBER` di `.env`.
- Jika gambar mobil yang diupload tidak muncul publik, jalankan lagi `php artisan storage:link` dan pastikan symlink `public/storage` ada.
- Jika user admin baru tidak bisa akses dashboard, ingat bahwa `must_change_password` memaksa mereka lewat layar ubah password terlebih dahulu.
- Jika `npm start` gagal, install ulang dependensi frontend dengan `npm install` dan pastikan `php artisan serve` serta `vite` sama-sama bisa berjalan di mesin.
- Jika download PDF laporan gagal, pastikan rentang tanggal valid dan tidak lebih dari satu tahun, sesuai validasi `DownloadReportRequest`.

### Deployment Guide

Repository ini tidak memiliki Docker, `docker-compose`, GitHub Actions, atau automasi deployment lain. Deploy sebagai aplikasi Laravel standar.

1. Siapkan server.

```text
PHP 8.1+
Composer
Node.js
npm
MySQL atau server database yang kompatibel
```

Gunakan stack ini pada mesin target sebelum deployment.

2. Install dependensi PHP produksi.

```bash
composer install --no-dev --optimize-autoloader
```

Jalankan di production host setelah repository di-clone. Perintah ini hanya memasang dependensi runtime dan membuat autoloader yang dioptimalkan.

3. Konfigurasikan environment.

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
```

Jalankan perintah ini jika environment produksi belum memiliki file `.env` dan application key yang terisi. Set `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` ke domain final, dan konfigurasi database, mail, cache, session, serta variabel WhatsApp.

4. Jalankan migrasi database.

```bash
php artisan migrate --force
```

Jalankan setelah kredensial database produksi dikonfigurasi. Flag `--force` wajib dipakai pada environment production yang non-interaktif.

5. Seed hanya jika Anda memang ingin owner default atau data demo.

```bash
php artisan db:seed --force
```

Jalankan ini hanya jika Anda ingin akun owner hasil seeding di production. Hindari seeder mobil demo dan booking demo di live environment kecuali memang sengaja ingin data contoh.

6. Publikasikan storage symlink.

```bash
php artisan storage:link
```

Jalankan ini sebelum menyajikan gambar yang diupload dari web root publik.

7. Build frontend assets.

```bash
npm install
npm run build
```

Jalankan ini di mesin deployment atau build host sebelum aplikasi dibuka. Langkah build menghasilkan bundle Vite siap produksi.

8. Cache metadata framework.

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Jalankan ini setelah file environment final dan aplikasi siap menerima traffic.

9. Arahkan web server ke direktori `public/`.

Gunakan direktori `public` sebagai document root di Nginx, Apache, atau control panel hosting.

10. Tinjau handling HTTPS dan proxy.

Repository menyertakan middleware `ForceToHTTPS` yang memaksa HTTPS ketika host berakhiran `ngrok-free.dev`. Untuk deployment production normal, terminate TLS di web server atau proxy dan pastikan `APP_URL` memakai domain HTTPS final. Needs Verification untuk stack hosting Anda.

11. Siapkan queue dan scheduler hanya jika Anda nanti mengaktifkan pekerjaan background asinkron.

```bash
php artisan queue:work
php artisan schedule:run
```

Gunakan command ini hanya jika Anda mengubah queue driver dari `sync` atau menambahkan scheduled task ke aplikasi.

### Kontribusi

1. Buat branch untuk perubahan Anda.
2. Jaga edit tetap fokus dan ikuti konvensi Laravel, Blade, dan Tailwind yang sudah dipakai di repository.
3. Jalankan test yang relevan sebelum membuka pull request.
4. Update README setiap kali setup, command, atau perilaku runtime berubah.
5. Hindari commit file environment hasil generate atau artifact build kecuali memang sengaja menjadi bagian dari proses rilis.

### Lisensi

Project ini menggunakan lisensi MIT, seperti tercantum di `composer.json`.
