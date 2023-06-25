<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuHasCategory;

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

    public function getMenusByCategorieId($id)
    {
        // Récuperer les menus grace a leur id dans la table menu_has_category avec l'id de la catégorie passé en paramètre
        $idMenuHasCategory = MenuHasCategory::where('category_id', $id)->get();
        // Renvoyer les menus qui ont le status "published" et qui ont le id de la catégorie passé en paramètre
        $menus = [];
        foreach ($idMenuHasCategory as $idMenu) {
            $menu = Menu::find($idMenu->menu_id);
            if ($menu->status == 'published') {
                array_push($menus, $menu);
            }
        }

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
