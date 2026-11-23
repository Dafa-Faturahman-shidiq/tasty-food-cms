<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'name'        => 'RAINBOW POKE BOWL',
                'description' => 'Perpaduan potongan salmon panggang lembut dengan sayuran segar, jagung manis, dan telur rebus kaya protein untuk energi harianmu.',
                'image'       => 'asset/img-1.png',
                'is_featured' => true
            ],
            [
                'name'        => 'GRILLED HERB SALMON',
                'description' => 'Filet salmon panggang bumbu rempah pilihan yang disajikan hangat bersama tumis brokoli segar dan nasi biji-bijian bernutrisi tinggi.',
                'image'       => 'asset/img-2.png',
                'is_featured' => true
            ],
            [
                'name'        => 'SEAFOOD RAMEN BOWL',
                'description' => 'Mie ramen kenyal dalam kuah kaldu gurih kaya rasa, lengkap dengan udang segar, telur rebus lembut, dan taburan daun bawang.',
                'image'       => 'asset/img-3.png',
                'is_featured' => true
            ],
            [
                'name'        => 'FIG & CHEESE PLATTER',
                'description' => 'Sajian istimewa kombinasi buah ara segar, zaitun hijau, potongan daging asap, dan keju pilihan untuk hidangan pembuka yang elegan.',
                'image'       => 'asset/img-4.png',
                'is_featured' => true
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}