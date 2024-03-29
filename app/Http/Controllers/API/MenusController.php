<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuHasCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // Récuperer tous les menus et les trier du plus récent au plus ancien et de l'id le plus grand au plus petit
        $menus = Menu::orderBy('date', 'desc')->orderBy('id', 'desc')->get();
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
        $menu->status = $request->status;
        $menu->date = date('Y-m-d H:i:s');
        if ($request->menu_image) {
            $menu->url_image = $request->menu_image;
        } else {
            $menu->url_image = 'assets/images/menus/default.png';
        }
        $menu->save();

        // Pour chaque id de la categorie créer un nouveau menu_has_category avec les données envoyées en paramètre
        foreach ($request->categories as $category) {
            $menuHasCategory = new MenuHasCategory();
            $menuHasCategory->menu_id = $menu->id;
            $menuHasCategory->category_id = $category;
            $menuHasCategory->save();
        }
        return response()->json($menu);
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            // Vérifiez si le fichier a été correctement téléchargé
            if ($request->file('image')->isValid()) {
                // Récupérer le nom du fichier
                $OriginalName = $request->file('image')->getClientOriginalName();

                // Utiliser le nom du fichier et le stocker dans le dossier "assets/images/menus/"
                $path = $request->file('image')->storeAs('public/assets/images/menus', $OriginalName);

                // Renvoyer le chemin de l'image
                return response()->json(['imageUrl' => Storage::url($path)]);
            }
        }

        return response()->json(['message' => 'Erreur lors de l\'upload de l\'image'], 400);
    }

    public function getMenuById($id)
    {
        // Récuperer le menu dont l'id est passé en paramètre
        $menu = Menu::find($id);

        // Récuperer les categories du menu
        $menuHasCategory = MenuHasCategory::where('menu_id', $id)->get();
        $categories = [];
        foreach ($menuHasCategory as $menus) {
            array_push($categories, $menus->category_id);
        }

        // Renvoyer le menu et les categories
        return response()->json(['menu' => $menu, 'categories' => $categories]);
    }

    public function updateMenu(Request $request)
    {
        // Récuperer le menu dont l'id est passé en paramètre
        $menu = Menu::find($request->id);
        $menu->name = $request->name;
        $menu->description = $request->description;
        $menu->date = date('Y-m-d H:i:s');
        $menu->url_image = $request->menu_image;
        $menu->save();

        // Supprimer les menu_has_category dont le menu_id est passé en paramètre
        $menuHasCategory = MenuHasCategory::where('menu_id', $request->id)->get();
        foreach ($menuHasCategory as $menu_) {
            $menu_->delete();
        }

        // Pour chaque id de la categorie créer un nouveau menu_has_category avec les données envoyées en paramètre
        foreach ($request->categories as $category) {
            $menuHasCategory = new MenuHasCategory();
            $menuHasCategory->menu_id = $menu->id;
            $menuHasCategory->category_id = $category;
            $menuHasCategory->save();
        }
        return response()->json($menu);
    }
}
