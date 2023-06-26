<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuHasCategory;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function getAllCategories()
    {
        // Récuperer toutes les catégories
        $categories = Category::all();
        return response()->json($categories);
    }

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

    public function deleteCategory($id)
    {
        // Supprimer les liens entre les menus et la catégorie qui a l'id passé en paramètre
        $idMenuHasCategory = MenuHasCategory::where('category_id', $id)->get();
        foreach ($idMenuHasCategory as $idCategory) {
            $category = MenuHasCategory::find($idCategory->id);
            $category->delete();
        }

        // Supprimer la catégorie qui a l'id passé en paramètre
        $category = Category::find($id);
        $category->delete();
        return response()->json('Category deleted');
    }

    public function createCategory($name)
    {
        // Créer une nouvelle catégorie avec le nom passé en paramètre
        $category = new Category();
        $category->name = $name;
        $category->save();
        return response()->json($category);
    }

    public function updateCategory(Request $request)
    {
        // Modifier le nom de la catégorie
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return response()->json($category);
    }
}
