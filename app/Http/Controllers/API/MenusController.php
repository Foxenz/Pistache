<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenusController extends Controller
{
    public function getAllMenus()
    {
        $menus = Menu::all();
        return response()->json($menus);
    }
}
