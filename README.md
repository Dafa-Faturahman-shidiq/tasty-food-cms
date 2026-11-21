<div align="center">

# 🍽️ Tasty Food CMS

**Sistem manajemen konten dan restoran berbasis web yang modern, ringan, dan mudah dikelola.**

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

[Fitur](#-fitur-utama) • [Teknologi](#-teknologi) • [Instalasi](#-instalasi) • [Struktur Proyek](#-struktur-proyek) • [Kontribusi](#-kontribusi) • [Kontak](#-kontak)

</div>

---

## 📖 Tentang Proyek

**Tasty Food CMS** adalah aplikasi web *Restaurant Management System* (RMS) yang dikembangkan menggunakan **Laravel 12** dan **Tailwind CSS**. Aplikasi ini terdiri dari halaman publik (*landing page*) untuk pengunjung serta dashboard admin untuk mengelola konten restoran seperti berita, galeri, dan pesan dari pelanggan.

Proyek ini dikembangkan sebagai bagian dari kegiatan **Praktik Kerja Lapangan (PKL)** di **PT Cyberlabs**.

## ✨ Fitur Utama

### 🌐 Sisi Publik
- **Landing Page** responsif dengan tampilan yang menarik
- **Berita** — pengunjung dapat membaca artikel dan informasi terbaru
- **Galeri** — menampilkan dokumentasi menu dan suasana restoran
- **Formulir Kontak** — pesan pengunjung langsung masuk ke dashboard admin

### 🔐 Sisi Admin
- **Autentikasi** — registrasi, login, dan logout
- **Dashboard Admin** — ringkasan dan pusat pengelolaan konten
- **CRUD Berita** — tambah, ubah, hapus, dan publikasi berita
- **CRUD Galeri** — kelola foto galeri dengan mudah
- **Manajemen Pesan Kontak** — baca dan kelola pesan yang masuk dari pengunjung

## 🛠️ Teknologi

| Kategori   | Teknologi                |
|------------|--------------------------|
| Backend    | Laravel 12 (PHP 8.2+)    |
| Frontend   | Blade, Tailwind CSS, Vite|
| Database   | MySQL                    |
| Tools      | Composer, NPM, Vite, Git |

## 📸 Tampilan Aplikasi

> Tambahkan tangkapan layar aplikasi pada folder `docs/screenshots/` lalu ganti tautan di bawah.

| Landing Page | Dashboard Admin |
|:---:|:---:|
| ![Landing Page](docs/screenshots/landing.png) | ![Dashboard](docs/screenshots/dashboard.png) |

## ✅ Prasyarat

Pastikan perangkat Anda sudah terpasang:

- [PHP](https://www.php.net/) >= 8.2
- [Composer](https://getcomposer.org/) >= 2.x
- [Node.js](https://nodejs.org/) >= 18 & NPM (untuk Vite dan Tailwind CSS)
- [MySQL](https://www.mysql.com/) / MariaDB
- [Git](https://git-scm.com/)

> 💡 Anda dapat menggunakan **XAMPP**, **Laragon**, atau **Docker** sebagai lingkungan pengembangan lokal.

## 🚀 Instalasi

**1. Clone repositori**

```bash
git clone https://github.com/Dafa-Faturahman-shidiq/tasty-food-cms.git
cd tasty-food-cms
```

**2. Install dependensi**

```bash
composer install
npm install
```

**3. Salin dan konfigurasi file environment**

```bash
cp .env.example .env
```

Buka file `.env`, lalu sesuaikan kredensial database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=tasty_food
DB_USERNAME=root
DB_PASSWORD=
```

**4. Buat database**

Buat database kosong bernama `tasty_food` (atau sesuai konfigurasi `.env`) melalui phpMyAdmin atau MySQL CLI.

**5. Generate application key**

```bash
php artisan key:generate
```

**6. Jalankan migrasi dan seeder**

```bash
php artisan migrate --seed
```

**7. Buat symbolic link untuk storage** *(agar gambar dapat tampil)*

```bash
php artisan storage:link
```

**8. Jalankan aplikasi**

Jalankan dua terminal secara bersamaan:

```bash
# Terminal 1 — server Laravel
php artisan serve

# Terminal 2 — Vite (compile Tailwind CSS & JS)
npm run dev
```

Untuk produksi, build aset dengan `npm run build`.

Aplikasi dapat diakses melalui **http://127.0.0.1:8000**

## 🔑 Akun Admin Default

Jika seeder menyediakan akun admin, gunakan kredensial berikut (sesuaikan dengan data seeder Anda):

| Email               | Password   |
|---------------------|------------|
| admin@example.com   | password   |

> ⚠️ **Penting:** Segera ubah kredensial default sebelum aplikasi digunakan di lingkungan produksi.

## 📂 Struktur Proyek

```
tasty-food-cms/
├── app/
│   ├── Http/Controllers/    # Logika controller (News, Gallery, Contact, Auth)
│   └── Models/              # Model Eloquent
├── database/
│   ├── migrations/          # Skema database
│   └── seeders/             # Data awal
├── public/                  # Aset publik & hasil build
├── resources/
│   ├── css/                 # Entry Tailwind CSS
│   ├── js/                  # JavaScript
│   └── views/               # Template Blade (landing & dashboard)
├── routes/
│   └── web.php              # Definisi rute aplikasi
├── .env.example             # Contoh konfigurasi environment
└── README.md
```

## 🧪 Pengujian

```bash
php artisan test
```

## 🗺️ Rencana Pengembangan

- [ ] Manajemen menu makanan & minuman
- [ ] Sistem reservasi meja online
- [ ] Manajemen peran pengguna (multi-role)
- [ ] Notifikasi email untuk pesan kontak baru
- [ ] Dukungan multi-bahasa

## 🤝 Kontribusi

Kontribusi sangat diterima! Berikut langkah-langkahnya:

1. *Fork* repositori ini
2. Buat *branch* fitur baru (`git checkout -b fitur/nama-fitur`)
3. *Commit* perubahan Anda (`git commit -m "feat: menambahkan fitur X"`)
4. *Push* ke branch (`git push origin fitur/nama-fitur`)
5. Buka *Pull Request*

## 📄 Lisensi

Proyek ini dilisensikan di bawah **MIT License**. Lihat berkas [LICENSE](LICENSE) untuk informasi lebih lanjut.

## 👤 Pengembang

**Dafa Faturahman Shidiq**

- GitHub: [@Dafa-Faturahman-shidiq](https://github.com/Dafa-Faturahman-shidiq)

## 🙏 Ucapan Terima Kasih

- **PT Cyberlabs** atas kesempatan dan bimbingan selama program PKL
- [Laravel](https://laravel.com/) dan [Tailwind CSS](https://tailwindcss.com/) atas framework yang luar biasa

---

<div align="center">

⭐ Jika proyek ini bermanfaat, jangan lupa berikan **star** pada repositori ini!

</div>
