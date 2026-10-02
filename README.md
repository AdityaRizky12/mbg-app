Sistem Monitoring Distribusi MBG

Aplikasi CRUD sederhana untuk monitoring dan pendataan distribusi program Makan Bergizi Gratis (MBG) ke sekolah-sekolah penerima.

Fitur
Manajemen data sekolah/penerima (CRUD)
Manajemen data menu (CRUD)
Pencatatan dan monitoring distribusi harian (CRUD)
Tracking status distribusi (pending, dikirim, diterima, gagal)
Notifikasi toast untuk setiap aksi (tambah/edit/hapus)
Tech Stack
Laravel 13
MySQL
Tailwind CSS (via Vite)
Blade Templates
Struktur Database
sekolah — data sekolah/penerima program MBG
menu — data menu makanan
distribusi — catatan pengiriman, relasi ke sekolah dan menu
Instalasi
Clone repository ini
bash
   git clone https://github.com/AdityaRizky12/mbg-app.git
   cd mbg-app
Install dependency
bash
   composer install
   npm install
Copy file environment dan sesuaikan konfigurasi database
bash
   cp .env.example .env
   php artisan key:generate
Jalankan migration
bash
   php artisan migrate
Jalankan server (butuh dua terminal)
bash
   php artisan serve
bash
   npm run dev
Buka http://localhost:8000
