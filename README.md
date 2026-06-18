# Pusat Rentcar Purwakarta

The project is a Laravel-based car rental management system with public booking flows, authenticated admin and owner dashboards, booking receipts, PDF reports, and a small API surface documented through Scalar.

No Docker image, docker-compose file, or CI/CD workflow is present in the repository. The documented setup below is the verified local development path.

## English

### Project Name

Pusat Rentcar Purwakarta

### Description

Pusat Rentcar Purwakarta is a car rental web application built with Laravel 10. It supports public vehicle browsing, customer booking, booking status lookup, authenticated administration, owner-only staff management, car inventory management, booking confirmations, report generation, and PDF exports.

The application uses username-based authentication instead of email login. New staff accounts are created by the owner from the dashboard and are forced to change their password on first login.

### Features

- Public home page with highlighted cars.
- Public car listing with filtering by search, category, seats, transmission, fuel type, and availability.
- Public car detail pages with booked date visibility.
- Public booking submission with WhatsApp handoff to the admin number.
- Public booking status lookup by booking code or WhatsApp number.
- Authenticated dashboard with revenue, booking, and car statistics.
- Admin quick-booking flow with instant receipt generation.
- Booking status workflow for pending, active, completed, and cancelled bookings.
- Car CRUD with image upload support.
- Owner-only staff management with account activation and password reset.
- PDF report export for a selected date range.
- Profile password change and forced-password-change flow.
- API endpoint for car availability checks.
- Scalar API documentation served from the built-in OpenAPI file.

### Tech Stack

- PHP 8.1 or later.
- Laravel 10.10.
- MySQL as the default database engine.
- Composer for PHP dependency management.
- npm with a committed `package-lock.json` for frontend dependency management.
- Vite for frontend bundling.
- Blade templates for server-rendered views.
- Tailwind CSS for styling.
- Alpine.js for lightweight interactivity.
- Chart.js for dashboard charts.
- Flatpickr for date/time selection.
- SweetAlert2 for modal alerts.
- Laravel Sanctum for API authentication.
- Barryvdh Laravel DomPDF for PDF export.
- Playwright for browser testing.
- PHPUnit for PHP unit tests.

### Prerequisites

- PHP 8.1+ with the extensions required by Laravel and DomPDF.
- Composer.
- MySQL or a MySQL-compatible server.
- Node.js and npm.
- A local PHP web server stack such as Laragon, XAMPP, Valet, or a manual PHP install.
- Write access to `storage/` and `bootstrap/cache/`.

Needs Verification:

- The repository does not declare a Node engine version in `package.json`. Use a current Node.js LTS release that is compatible with Vite 5 and Playwright 1.60.
- The repository does not provide Docker or container-based prerequisites.

### Installation

1. Clone the repository and enter the project directory.

```bash
git clone <repository-url>
cd GRC-rental-question-mark
```

Use these commands when you are starting from a new machine or an empty workspace. They download the code and change the shell into the project root.

2. Install PHP dependencies.

```bash
composer install
```

Run this immediately after cloning. It installs the Laravel application, DomPDF, Sanctum, Breeze, PHPUnit, Pint, Sail, and the other PHP packages defined in `composer.json`.

3. Create the environment file.

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

Run this once on a fresh clone if `.env` does not exist. The command matches the repository's Composer bootstrap behavior and copies the checked-in environment template.

4. Generate the application key.

```bash
php artisan key:generate
```

Run this after creating `.env`. It writes the `APP_KEY` value required for encryption, sessions, and cookies.

5. Install frontend dependencies.

```bash
npm install
```

Run this after PHP dependencies are installed and before building assets or running Playwright. It installs Vite, Tailwind, Alpine.js, Chart.js, Flatpickr, SweetAlert2, Playwright, and the other Node packages listed in `package.json`.

6. Configure your `.env` file.

Open `.env` and set the environment-specific values described in the next section before running migrations.

7. Prepare the database.

Create the MySQL database named in your `.env` file, then run migrations and seeding as described below.

### Environment Configuration

The checked-in template in `.env.example` is the source of truth for local configuration. The most important values are:

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

What each group does and when it matters:

- `APP_KEY` must be generated before the application can serve requests safely.
- `APP_URL` should match the actual local or production URL so asset and storage links resolve correctly.
- `WHATSAPP_ADMIN_NUMBER` is required for the booking-to-WhatsApp redirect in `BookingService`. Leave it blank only if you have not yet wired the admin number. Needs Verification.
- `DB_*` controls the primary database connection.
- `CACHE_DRIVER`, `SESSION_DRIVER`, and `QUEUE_CONNECTION` are set to file, file, and sync respectively for local development.
- `MAIL_*` is preconfigured for Mailpit-compatible local email testing.

The repository also reads additional optional variables from configuration files, including `CACHE_PREFIX`, `SESSION_DOMAIN`, `SESSION_STORE`, `SANCTUM_STATEFUL_DOMAINS`, `REDIS_*`, `AWS_*`, `PUSHER_*`, `MAILGUN_*`, `POSTMARK_TOKEN`, and `DYNAMODB_*`. These are not required for the default local workflow unless you switch to those services.

### Database Configuration

The application uses MySQL by default. The verified local defaults are:

- Driver: `mysql`
- Host: `127.0.0.1`
- Port: `3306`
- Database: `laravel`
- Username: `root`
- Password: empty

The Playwright test harness uses a separate database named `db_grc` in `tests/playwright/db.ts`. If you want to run the browser tests without editing that file, create a MySQL database with that exact name. Needs Verification if you prefer a different test database name.

### Database Migration

```bash
php artisan migrate
```

Run this after the database has been created and `.env` is configured. It creates all application tables defined in the repository:

- `users` with `username`, `role`, `is_active`, and `must_change_password`.
- `password_reset_tokens` for password reset tokens.
- `failed_jobs` for failed queue entries.
- `personal_access_tokens` for Sanctum API tokens.
- `cars` for vehicle inventory.
- `customers` for renter data.
- `bookings` for rental transactions.

If you need to start from a blank database, the standard Laravel reset flow is to drop and recreate the schema before migrating. The repository does not add a custom command for this. Needs Verification.

### Database Seeding

```bash
php artisan db:seed
```

Run this after migrations when you want the default owner account. `DatabaseSeeder` currently seeds only `UserSeeder`, so the default seed creates just one owner user.

```bash
php artisan db:seed --class=CarSeeder
```

Run this only when you want demo vehicle data. `CarSeeder` generates 350 car records with randomized inventory details.

```bash
php artisan db:seed --class=BookingSeeder
```

Run this after the car data exists. `BookingSeeder` depends on `cars` being populated and generates 2,500 sample bookings.

Seeding order matters:

1. Run `php artisan db:seed` for the default owner.
2. Run `php artisan db:seed --class=CarSeeder` if you want sample cars.
3. Run `php artisan db:seed --class=BookingSeeder` only after cars exist.

### Storage Setup

```bash
php artisan storage:link
```

Run this after migrations and before uploading or displaying car images. The application stores uploaded vehicle images in `storage/app/public/cars`, and this command exposes them through `public/storage`.

Also make sure `storage/` and `bootstrap/cache/` are writable on the target machine or server.

### Frontend Asset Installation

```bash
npm install
```

Run this on a fresh machine before any frontend build or test command. The frontend bundle depends on Vite, Tailwind CSS, Alpine.js, Chart.js, Flatpickr, SweetAlert2, and Playwright.

### Frontend Build

```bash
npm run build
```

Run this before production deployment or whenever you want a production-ready asset bundle. It compiles `resources/css/app.css` and `resources/js/app.js` through Vite.

For local development you can also use:

```bash
npm run dev
```

Run this when you want Vite to watch and serve assets during development.

### Running the Application

```bash
npm run start
```

Run this during local development when you want the backend and frontend to start together. The script runs `php artisan serve` and `vite` concurrently, so the application is available while assets are rebuilt automatically.

If you prefer separate terminals, use:

```bash
php artisan serve
```

Run this when you want only the Laravel backend server. It serves the application on the default local port used by Laravel.

```bash
npm run dev
```

Run this in a second terminal when you want only the Vite frontend watcher.

### Running Queue Workers

```bash
php artisan queue:work
```

Run this only if you change `QUEUE_CONNECTION` away from `sync` and start dispatching asynchronous jobs. The repository defaults to synchronous queue handling, so no worker is required for the standard local setup.

### Running Scheduled Tasks

The repository does not define custom scheduled tasks in `app/Console/Kernel.php`, so there is nothing project-specific to run yet.

If you add scheduled jobs later, the standard Laravel commands are:

```bash
php artisan schedule:work
```

Run this when you want to keep the scheduler active in a local shell.

```bash
php artisan schedule:run
```

Run this from a cron job once per minute in production if scheduled commands are added later.

Needs Verification: no custom schedule entries currently exist in the repository.

### Testing

```bash
vendor/bin/phpunit
```

Run this to execute the PHP unit test suite described by `phpunit.xml`. The repository currently contains a basic unit test scaffold and Laravel application test bootstrap files.

```bash
npm run playwright:test
```

Run this to execute the browser test suite in `tests/playwright`. The Playwright config targets Chromium and expects the application to be available at `http://localhost:8000`.

```bash
npm run playwright:show-report
```

Run this after Playwright tests to open the HTML report generated by the test runner.

Needs Verification:

- If Playwright reports a missing browser binary, install the Chromium runtime with the standard Playwright browser-install command.
- The Playwright tests use the MySQL database name `db_grc` in `tests/playwright/db.ts`.

### Project Structure

```text
app/
	Console/           Console kernel and command registration
	DTOs/              Typed data transfer objects for cars and bookings
	Exceptions/        Global exception handler
	Http/
		Controllers/     Public, auth, and admin controllers
		Middleware/      Custom role, password, and HTTPS middleware
		Requests/        Form request validation classes
	Models/            Eloquent models for users, cars, bookings, and customers
	Providers/         Laravel service providers and route provider
	Services/          Domain services for booking and car operations
bootstrap/           Laravel bootstrap files
config/              Application configuration and service wiring
database/
	factories/         Model factories
	migrations/        Schema definitions
	seeders/           Default and demo seed data
public/              Web root, OpenAPI document, and static assets
resources/
	css/               Tailwind entry stylesheet
	js/                Vite entry script
	views/             Blade templates
routes/              Web, auth, API, console, and channel routes
storage/             Logs, cache, sessions, and uploaded files
tests/
	Unit/              PHPUnit unit tests
	playwright/        Playwright end-to-end tests and DB helpers
```

### Default Credentials

| Account | Username         | Password       | Notes                                                                                                           |
| ------- | ---------------- | -------------- | --------------------------------------------------------------------------------------------------------------- |
| Owner   | `owner123`       | `password123`  | Seeded by `UserSeeder`. This is the only account created by `php artisan db:seed` on a fresh database.          |
| Admin   | created by owner | `grcrental123` | Used when the owner creates or resets a staff account. The account is forced to change password on first login. |

Needs Verification:

- No customer self-registration flow is exposed in `routes/auth.php`; staff accounts are created manually by the owner.

### Troubleshooting

- If login fails immediately after seeding, verify that `APP_KEY` is set and that the `users` table contains the seeded owner account.
- If the database connection fails, confirm the values in `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD`.
- If booking redirects do not lead to WhatsApp, set `WHATSAPP_ADMIN_NUMBER` in `.env`.
- If uploaded car images do not appear publicly, rerun `php artisan storage:link` and confirm the `public/storage` symlink exists.
- If new admin users cannot access the dashboard, remember that `must_change_password` forces them through the password-change screen first.
- If `npm run start` fails, reinstall frontend dependencies with `npm install` and verify that `php artisan serve` and `vite` can both start on the machine.
- If report PDF downloads fail, verify that the date range is valid and does not exceed one year, as enforced by `DownloadReportRequest`.

### Deployment Guide

This repository does not contain Docker, `docker-compose`, GitHub Actions, or other deployment automation. Deploy it as a standard Laravel application.

1. Provision the server.

```text
PHP 8.1+
Composer
Node.js
npm
MySQL or a compatible database server
```

Use this stack on the target machine before attempting deployment.

2. Install production PHP dependencies.

```bash
composer install --no-dev --optimize-autoloader
```

Run this on the production host after cloning the repository. It installs only runtime dependencies and generates an optimized autoloader.

3. Configure the environment.

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
```

Run these commands if the production environment does not already have a populated `.env` file and application key. Set `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` to the final domain, and configure the database, mail, cache, session, and WhatsApp variables.

4. Run database migrations.

```bash
php artisan migrate --force
```

Run this after production database credentials are configured. The `--force` flag is required in non-interactive production environments.

5. Seed only if you explicitly want the default owner or demo data.

```bash
php artisan db:seed --force
```

Run this only when you want the seeded owner account in production. Avoid the demo car and booking seeders on live environments unless you intentionally want sample data.

6. Publish the public storage symlink.

```bash
php artisan storage:link
```

Run this before serving uploaded images from the public web root.

7. Build frontend assets.

```bash
npm install
npm run build
```

Run these on the deployment machine or build host before exposing the application. The build step generates the production-ready Vite bundle.

8. Cache framework metadata.

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Run these after the environment file is finalized and the application is ready to serve traffic.

9. Point your web server at the `public/` directory.

Use the `public` directory as the document root in Nginx, Apache, or your hosting control panel.

10. Review HTTPS and proxy handling.

The repository includes a `ForceToHTTPS` middleware that forces HTTPS when the host ends with `ngrok-free.dev`. For normal production deployments, terminate TLS at the web server or proxy and make sure `APP_URL` uses the final HTTPS domain. Needs Verification for your specific hosting stack.

11. Prepare queue and scheduler services only if you enable async background work later.

```bash
php artisan queue:work
php artisan schedule:run
```

Use these commands only if you change the queue driver away from `sync` or add scheduled tasks to the application.

### Contributing

1. Create a branch for your change.
2. Keep edits focused and follow the existing Laravel, Blade, and Tailwind conventions already used in the repository.
3. Run the relevant tests before opening a pull request.
4. Update the README whenever setup, commands, or runtime behavior changes.
5. Avoid committing generated environment files or build artifacts unless they are intentionally part of the release process.

### License

This project is licensed under the MIT License, as declared in `composer.json`.

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

Gunakan perintah ini saat memulai dari mesin baru atau workspace kosong. Perintah ini mengunduh kode dan memindahkan shell ke root proyek.

2. Install dependensi PHP.

```bash
composer install
```

Jalankan segera setelah clone. Perintah ini menginstall aplikasi Laravel, DomPDF, Sanctum, Breeze, PHPUnit, Pint, Sail, dan paket PHP lain yang didefinisikan di `composer.json`.

3. Buat file environment.

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

Jalankan sekali pada clone baru jika `.env` belum ada. Perintah ini menyalin template environment dari repository.

4. Generate application key.

```bash
php artisan key:generate
```

Jalankan setelah `.env` dibuat. Perintah ini mengisi `APP_KEY` yang diperlukan untuk enkripsi, session, dan cookie.

5. Install dependensi frontend.

```bash
npm install
```

Jalankan setelah dependensi PHP terpasang dan sebelum build asset atau menjalankan Playwright. Perintah ini memasang Vite, Tailwind CSS, Alpine.js, Chart.js, Flatpickr, SweetAlert2, Playwright, dan paket Node lain yang tercantum di `package.json`.

6. Konfigurasikan file `.env`.

Buka `.env` dan isi nilai spesifik environment yang dijelaskan di bagian berikut sebelum menjalankan migrasi.

7. Siapkan database.

Buat database MySQL yang disebutkan di `.env`, lalu jalankan migrasi dan seeding seperti dijelaskan di bawah.

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
npm run start
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

Jalankan ini untuk mengeksekusi browser test di `tests/playwright`. Konfigurasi Playwright menargetkan Chromium dan mengharapkan aplikasi tersedia di `http://localhost:8000`.

```bash
npm run playwright:show-report
```

Jalankan ini setelah Playwright test untuk membuka HTML report yang dihasilkan test runner.

Needs Verification:

- Jika Playwright melaporkan browser binary hilang, install runtime Chromium dengan perintah install browser Playwright standar.
- Playwright test menggunakan nama database MySQL `db_grc` di `tests/playwright/db.ts`.

### Struktur Proyek

```text
app/
	Console/           Kernel console dan registrasi command
	DTOs/              Data transfer object untuk mobil dan booking
	Exceptions/        Exception handler global
	Http/
		Controllers/     Controller publik, auth, dan admin
		Middleware/      Middleware role, password, dan HTTPS custom
		Requests/        Kelas validasi form request
	Models/            Model Eloquent untuk user, mobil, booking, dan customer
	Providers/         Service provider Laravel dan route provider
	Services/          Service domain untuk operasi booking dan mobil
bootstrap/           File bootstrap Laravel
config/              Konfigurasi aplikasi dan wiring service
database/
	factories/         Factory model
	migrations/        Definisi schema
	seeders/           Seed data default dan demo
public/              Web root, dokumen OpenAPI, dan aset statis
resources/
	css/               Entry Tailwind
	js/                Entry script Vite
	views/             Template Blade
routes/              Route web, auth, API, console, dan channel
storage/             Log, cache, session, dan file upload
tests/
	Unit/              Unit test PHPUnit
	playwright/        End-to-end test Playwright dan helper DB
```

### Kredensial Default

| Akun  | Username          | Password       | Catatan                                                                                                           |
| ----- | ----------------- | -------------- | ----------------------------------------------------------------------------------------------------------------- |
| Owner | `owner123`        | `password123`  | Diseed oleh `UserSeeder`. Ini adalah satu-satunya akun yang dibuat oleh `php artisan db:seed` pada database baru. |
| Admin | dibuat oleh owner | `grcrental123` | Digunakan saat owner membuat atau mereset akun staf. Akun akan dipaksa mengganti password saat login pertama.     |

Needs Verification:

- Alur registrasi customer tidak diekspos di `routes/auth.php`; akun staf dibuat manual oleh owner.

### Troubleshooting

- Jika login gagal tepat setelah seeding, pastikan `APP_KEY` sudah terisi dan tabel `users` berisi akun owner yang diseed.
- Jika koneksi database gagal, cek nilai `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`.
- Jika redirect booking tidak menuju WhatsApp, isi `WHATSAPP_ADMIN_NUMBER` di `.env`.
- Jika gambar mobil yang diupload tidak tampil publik, jalankan ulang `php artisan storage:link` dan pastikan symlink `public/storage` ada.
- Jika user admin baru tidak bisa masuk dashboard, ingat bahwa `must_change_password` memaksa mereka melalui halaman ubah password terlebih dahulu.
- Jika `npm run start` gagal, install ulang dependensi frontend dengan `npm install` dan pastikan `php artisan serve` serta `vite` bisa start di mesin tersebut.
- Jika download PDF laporan gagal, pastikan rentang tanggal valid dan tidak melebihi satu tahun, karena hal ini divalidasi oleh `DownloadReportRequest`.

### Panduan Deployment

Repository ini tidak menyertakan Docker, `docker-compose`, GitHub Actions, atau otomasi deployment lain. Deploy sebagai aplikasi Laravel standar.

1. Siapkan server.

```text
PHP 8.1+
Composer
Node.js
npm
MySQL atau database server yang kompatibel
```

Gunakan stack ini di mesin target sebelum mulai deployment.

2. Install dependensi PHP produksi.

```bash
composer install --no-dev --optimize-autoloader
```

Jalankan di host production setelah repository di-clone. Perintah ini hanya menginstall dependensi runtime dan membuat autoloader yang dioptimalkan.

3. Konfigurasikan environment.

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate
```

Jalankan perintah ini jika environment produksi belum memiliki file `.env` yang terisi dan application key. Set `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` ke domain final, dan konfigurasikan variabel database, mail, cache, session, dan WhatsApp.

4. Jalankan migrasi database.

```bash
php artisan migrate --force
```

Jalankan setelah kredensial database produksi dikonfigurasi. Flag `--force` diperlukan pada environment produksi yang non-interaktif.

5. Lakukan seeding hanya jika Anda memang ingin owner default atau data demo.

```bash
php artisan db:seed --force
```

Jalankan ini hanya jika Anda ingin akun owner hasil seed di production. Hindari seeder demo mobil dan booking pada environment live kecuali Anda memang membutuhkan data contoh.

6. Buat symlink storage publik.

```bash
php artisan storage:link
```

Jalankan sebelum menyajikan gambar upload dari web root publik.

7. Build asset frontend.

```bash
npm install
npm run build
```

Jalankan ini di mesin deployment atau host build sebelum aplikasi dibuka ke publik. Langkah build menghasilkan bundle Vite yang siap produksi.

8. Cache metadata framework.

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Jalankan setelah file environment final dan aplikasi siap melayani traffic.

9. Arahkan web server ke direktori `public/`.

Gunakan direktori `public` sebagai document root di Nginx, Apache, atau panel hosting Anda.

10. Review HTTPS dan proxy handling.

Repository ini menyertakan middleware `ForceToHTTPS` yang memaksa HTTPS ketika host berakhiran `ngrok-free.dev`. Untuk deployment normal, terminasi TLS di web server atau proxy dan pastikan `APP_URL` memakai domain HTTPS final. Needs Verification untuk stack hosting spesifik Anda.

11. Siapkan queue dan scheduler hanya jika Anda nanti mengaktifkan background work asinkron.

```bash
php artisan queue:work
php artisan schedule:run
```

Gunakan perintah ini hanya jika Anda mengubah queue driver dari `sync` atau menambahkan scheduled task ke aplikasi.

### Kontribusi

1. Buat branch untuk perubahan Anda.
2. Jaga scope perubahan tetap fokus dan ikuti konvensi Laravel, Blade, dan Tailwind yang sudah ada di repository.
3. Jalankan test yang relevan sebelum membuka pull request.
4. Perbarui README setiap kali setup, command, atau perilaku runtime berubah.
5. Hindari meng-commit file environment yang dihasilkan atau artifact build kecuali memang sengaja menjadi bagian dari rilis.

### Lisensi

Proyek ini dilisensikan di bawah MIT License, seperti yang dideklarasikan di `composer.json`.
