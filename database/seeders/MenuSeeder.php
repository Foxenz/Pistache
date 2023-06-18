<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            'name' => 'Bruschetta chorizo & poivron',
            'status' => 'publish',
            'date' => '2021-06-18',
            'categorie_id' => 1,
            'url_image' => '/assets/images/menus/bruschetta-chorizo-poivron.avif',
            'price' => 11,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Salade de chèvre, nectarine & tomate',
            'status' => 'publish',
            'date' => '2022-04-21',
            'categorie_id' => 1,
            'url_image' => '/assets/images/menus/salade-chevre-nectarine-tomate.avif',
            'price' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Pizza turque au bœuf haché & persil',
            'status' => 'publish',
            'date' => '2023-03-22',
            'categorie_id' => 2,
            'url_image' => '/assets/images/menus/pizza-turque-boeuf-hache-persil.avif',
            'price' => 16,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => "Cuisse de poulet confite et salade d'automne",
            'status' => 'publish',
            'date' => '2022-04-21',
            'categorie_id' => 2,
            'url_image' => '/assets/images/menus/cuisse-poulet-confite-salade-automne.avif',
            'price' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => "Tiramisu",
            'status' => 'publish',
            'date' => '2023-01-03',
            'categorie_id' => 3,
            'url_image' => '/assets/images/menus/tiramisu.jpeg',
            'price' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => "Fondant au chocolat",
            'status' => 'publish',
            'date' => '2022-12-03',
            'categorie_id' => 3,
            'url_image' => '/assets/images/menus/fondant-au-chocolat.jpeg',
            'price' => 8,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
