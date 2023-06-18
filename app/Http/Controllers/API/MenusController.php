<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenusController extends Controller
{
    public function getAllMenus()
    {
        // Récuperer tous les menus et les trier du plus récent au plus ancien
        $menus = Menu::orderBy('date', 'desc')->get();
        return response()->json($menus);
    }

    public function getMenusByCategorie($categorie)
    {
        $menus = Menu::where('categorie_id', $categorie)->get();
        return response()->json($menus);
    }
}
