<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\News;
use App\Models\Gallery;
use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Default
        User::create([
            'name' => 'Admin Tasty Food',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password123'),
        ]);

        // 2. Profil Perusahaan (Tentang, Visi, Misi & Footer)
        CompanyProfile::create([
            'about_text' => 'Tasty Food adalah restoran yang berdedikasi untuk menyajikan hidangan lezat dan sehat kepada pelanggan kami. Kami percaya bahwa makanan yang baik tidak hanya memuaskan selera, tetapi juga memberikan manfaat bagi kesehatan.',
            'vision' => 'Menjadi restoran terdepan yang dikenal dengan kualitas makanan yang superior, bahan organik pilihan, dan pelayanan pelanggan yang luar biasa.',
            'mission' => 'Menyajikan hidangan sehat berkualitas tinggi dengan cita rasa autentik, mendukung petani lokal, serta menciptakan pengalaman bersantap yang hangat bagi setiap keluarga.',
            'email' => 'tastyfood@gmail.com',
            'phone' => '+62 812 3456 7890',
            'address' => 'Kota Bandung, Jawa Barat',
            'maps_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.5731164!3d-6.9034443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1700000000000',
            'facebook_url' => 'https://facebook.com',
            'twitter_url' => 'https://twitter.com',
        ]);

        // 3. Data Berita Awal (1 Utama + 4 Lainnya)
        $newsList = [
            [
                'title' => 'Rahasia Racikan Rempah Autentik di Dapur Tasty Food',
                'content' => 'Setiap hidangan yang tersaji di meja Anda melewati proses seleksi bahan baku yang ketat. Kepala koki kami memadukan rempah-rempah nusantara pilihan untuk menghasilkan cita rasa yang kaya tanpa bahan pengawet buatan.',
                'image' => 'asset/main.jpg',
                'is_featured' => true,
            ],
            [
                'title' => 'Manfaat Sayuran Organik Segar untuk Energi Harian',
                'content' => 'Kami bekerja sama langsung dengan petani lokal di dataran tinggi Bandung untuk memastikan sayuran dipetik pada pagi hari dan langsung diolah di dapur kami.',
                'image' => 'asset/tomat.jpg',
                'is_featured' => false,
            ],
            [
                'title' => 'Mengenal Lebih Dekat Tim Koki Profesional Kami',
                'content' => 'Di balik kelezatan setiap porsi makanan, ada dedikasi tim kuliner berpengalaman yang selalu berinovasi menciptakan menu sehat modern.',
                'image' => 'asset/chef.jpg',
                'is_featured' => false,
            ],
            [
                'title' => 'Standar Kebersihan dan Higienitas Dapur Berkelas',
                'content' => 'Keamanan pangan adalah prioritas utama kami. Seluruh peralatan dan area dapur disterilisasi secara berkala sesuai standar internasional.',
                'image' => 'asset/dapur.jpg',
                'is_featured' => false,
            ],
            [
                'title' => 'Menu Sarapan Baru: Croissant Panggang & Kopi Lokal',
                'content' => 'Nikmati pagi hari yang lebih bersemangat dengan menu pastry renyah yang dipanggang setiap pagi langsung dari oven restoran kami.',
                'image' => 'asset/coason.jpg',
                'is_featured' => false,
            ],
        ];

        foreach ($newsList as $item) {
            News::create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'content' => $item['content'],
                'image' => $item['image'],
                'is_featured' => $item['is_featured'],
            ]);
        }

        // 4. Data Galeri Awal
        $galleryImages = [
            ['title' => 'Hidangan Spesial', 'image' => 'asset/main.jpg', 'is_featured' => true],
            ['title' => 'Aksi Koki', 'image' => 'asset/chef.jpg', 'is_featured' => true],
            ['title' => 'Sayuran Segar', 'image' => 'asset/tomat.jpg', 'is_featured' => true],
            ['title' => 'Suasana Dapur', 'image' => 'asset/dapur.jpg', 'is_featured' => false],
            ['title' => 'Pastry Hangat', 'image' => 'asset/coason.jpg', 'is_featured' => false],
            ['title' => 'Ramen Spesial', 'image' => 'asset/ramen.jpg', 'is_featured' => false],
        ];

        foreach ($galleryImages as $gal) {
            Gallery::create($gal);
        }
    }
}