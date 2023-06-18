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
            'statut' => 'publish',
            'date' => '2021-06-18',
            'categorie_id' => 1,
            'url_image' => 'assets/images/bruschetta-chorizo-poivron.avif',
            'price' => 11.40,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Salade de chèvre, nectarine & tomate',
            'statut' => 'publish',
            'date' => '2022-04-21',
            'categorie_id' => 1,
            'url_image' => 'assets/images/salade-chevre-nectarine-tomate.avif',
            'price' => 12.50,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Pizza turque au bœuf haché & persil',
            'statut' => 'publish',
            'date' => '2023-03-22',
            'categorie_id' => 2,
            'url_image' => 'assets/images/pizza-turque-boeuf-hache-persil.avif',
            'price' => 16.90,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => "Cuisse de poulet confite et salade d'automne",
            'statut' => 'publish',
            'date' => '2022-04-21',
            'categorie_id' => 2,
            'url_image' => 'assets/images/cuisse-poulet-confite-salade-automne.avif',
            'price' => 15.90,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => "Tiramisu",
            'statut' => 'publish',
            'date' => '2023-01-03',
            'categorie_id' => 3,
            'url_image' => 'assets/images/tiramisu.jpeg',
            'price' => 7.90,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => "Fondant au chocolat",
            'statut' => 'publish',
            'date' => '2022-12-03',
            'categorie_id' => 3,
            'url_image' => 'assets/images/fondant-chocolat.jpeg',
            'price' => 8.90,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
