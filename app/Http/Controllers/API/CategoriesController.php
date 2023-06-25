<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuHasCategory;


class CategoriesController extends Controller
{
    public function getCategoriesWithMenuId($id)
    {
        // Récuperer les catégories qui ont le menu_id passé en paramètre
        $idMenuHasCategory = MenuHasCategory::where('menu_id', $id)->get();
        // Renvoyer le valeur du champs "name" des catégories qui ont le menu_id passé en paramètre
        $categories = [];
        foreach ($idMenuHasCategory as $idCategory) {
            $category = Category::find($idCategory->category_id);
            array_push($categories, $category->name);
        }

        return response()->json($categories);
    }
}
