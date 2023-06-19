<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenusController extends Controller
{
    public function getAllMenus()
    {
        // Récuperer tous les menus avec le status "published"
        $menus = Menu::where('status', 'published')->get();
        return response()->json($menus);
    }
    public function getAllMenusForAdmin()
    {
        // Récuperer tous les menus et les trier du plus récent au plus ancien
        $menus = Menu::orderBy('date', 'desc')->get();
        return response()->json($menus);
    }

    public function getMenusByCategorie($categorie)
    {
        // Récuperer tous les menus avec le status "published" et dont la catégorie est passée en paramètre
        $menus = Menu::where('status', 'published')->where('categorie_id', $categorie)->get();
        return response()->json($menus);
    }

    public function publishMenu($id)
    {
        // Modifier le champs status en "published" pour le menu dont l'id est passé en paramètre
        $menu = Menu::find($id);
        $menu->status = 'published';
        $menu->save();
        return response()->json($menu);
    }

    public function archiveMenu($id)
    {
        // Modifier le champs status en "archived" pour le menu dont l'id est passé en paramètre
        $menu = Menu::find($id);
        $menu->status = 'archived';
        $menu->save();
        return response()->json($menu);
    }

    public function deleteMenu($id)
    {
        // Supprimer le menu dont l'id est passé en paramètre
        $menu = Menu::find($id);
        $menu->delete();
        return response()->json($menu);
    }
}
