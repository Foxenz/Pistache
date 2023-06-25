<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MenuHasCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_has_category')->insert([
            'menu_id' => 1,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menu_has_category')->insert([
            'menu_id' => 2,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menu_has_category')->insert([
            'menu_id' => 3,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menu_has_category')->insert([
            'menu_id' => 4,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menu_has_category')->insert([
            'menu_id' => 5,
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menu_has_category')->insert([
            'menu_id' => 6,
            'category_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('menu_has_category')->insert([
            'menu_id' => 6,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
