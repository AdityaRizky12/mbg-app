# Sistem Monitoring Distribusi MBG

Aplikasi CRUD sederhana untuk monitoring dan pendataan distribusi program Makan Bergizi Gratis (MBG) ke sekolah-sekolah penerima.

## Fitur

- Manajemen data sekolah/penerima (CRUD)
- Manajemen data menu (CRUD)
- Pencatatan dan monitoring distribusi harian (CRUD)
- Tracking status distribusi (pending, dikirim, diterima, gagal)
- Notifikasi toast untuk setiap aksi (tambah/edit/hapus)

## Tech Stack

- Laravel 13
- MySQL
- Tailwind CSS (via Vite)
- Blade Templates

## Struktur Database

- `sekolah` — data sekolah/penerima program MBG
- `menu` — data menu makanan
- `distribusi` — catatan pengiriman, relasi ke `sekolah` dan `menu`

## Instalasi

1. Clone repository ini
   ```bash
   git clone https://github.com/AdityaRizky12/mbg-app.git
   cd mbg-app
   ```

2. Install dependency
   ```bash
   composer install
   npm install
   ```

3. Copy file environment dan sesuaikan konfigurasi database
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Jalankan migration
   ```bash
   php artisan migrate
   ```

5. Jalankan server (butuh dua terminal)
   ```bash
   php artisan serve
   ```
   ```bash
   npm run dev
   ```

6. Buka `http://localhost:8000`

## Rencana Pengembangan

- Validasi jumlah porsi terhadap jumlah siswa sekolah
- Fitur search/filter pada halaman distribusi
- Dashboard ringkasan statistik
- Autentikasi/login admin
