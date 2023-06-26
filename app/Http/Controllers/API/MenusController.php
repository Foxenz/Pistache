<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuHasCategory;
use Illuminate\Http\Request;

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
        // Supprimer les menu_has_category dont le menu_id est passé en paramètre
        $menuHasCategory = MenuHasCategory::where('menu_id', $id)->get();
        foreach ($menuHasCategory as $menu) {
            $menu->delete();
        }

        // Supprimer le menu dont l'id est passé en paramètre
        $menu = Menu::find($id);
        $menu->delete();
        return response()->json($menu);
    }

    public function createMenu(Request $request)
    {
        // Créer un nouveau menu avec les données envoyées en paramètre
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->status = "published";
        $menu->date = date('Y-m-d H:i:s');
        $menu->url_image = "assets/images/menus/default.png";
        $menu->save();

        // Pour chaque categorie créer un nouveau menu_has_category avec les données envoyées en paramètre
        foreach ($request->categories as $category) {
            $category_id = $category['id']; // Récupérer l'ID de la catégorie
            $menuHasCategory = new MenuHasCategory();
            $menuHasCategory->menu_id = $menu->id;
            $menuHasCategory->category_id = $category_id; // Affecter l'ID de la catégorie à menuHasCategory->category_id
            $menuHasCategory->save();
        }

        return response()->json($menu);
    }
}
