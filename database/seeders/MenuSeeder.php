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
            'description' => 'Chorizo, poivron, tomate, mozzarella, oignon, ail, basilic, huile d\'olive',
            'status' => 'published',
            'date' => '2021-06-18',
            'url_image' => '/assets/images/menus/bruschetta-chorizo-poivron.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Salade de chèvre, nectarine & tomate',
            'description' => 'Chèvre, nectarine, tomate, salade, huile d\'olive, vinaigre balsamique, sel, poivre',
            'status' => 'published',
            'date' => '2022-04-21',
            'url_image' => '/assets/images/menus/salade-chevre-nectarine-tomate.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Pizza turque au bœuf haché',
            'description' => 'Bœuf haché, persil, tomate, oignon, ail, poivron, piment, huile d\'olive',
            'status' => 'published',
            'date' => '2023-03-22',
            'url_image' => '/assets/images/menus/pizza-turque-boeuf-hache-persil.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => "Cuisse de poulet confite et salade d'automne",
            'description' => 'Poulet, pomme de terre, carotte, oignon, ail, huile d\'olive, sel',
            'status' => 'published',
            'date' => '2022-04-21',
            'url_image' => '/assets/images/menus/cuisse-poulet-confite-salade-automne.avif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => "Tiramisu",
            'description' => 'Biscuit à la cuillère, mascarpone, œuf, sucre, café, cacao',
            'status' => 'published',
            'date' => '2023-01-03',
            'url_image' => '/assets/images/menus/tiramisu.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => "Fondant au chocolat",
            'description' => 'Chocolat, beurre, œuf, sucre, farine',
            'status' => 'published',
            'date' => '2022-12-03',
            'url_image' => '/assets/images/menus/fondant-au-chocolat.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
