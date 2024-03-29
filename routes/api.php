<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MenusController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/login', 'login');
});

Route::controller(MenusController::class)->group(function () {
    Route::get('/menus/getAllMenus', 'getAllMenus');
    Route::get('/menus/getAllMenusForAdmin', 'getAllMenusForAdmin');
    Route::get('/menus/getMenusByCategorieId/{id}', 'getMenusByCategorieId');
    Route::put('/menus/publishMenu/{id}', 'publishMenu');
    Route::put('/menus/archiveMenu/{id}', 'archiveMenu');
    Route::delete('/menus/deleteMenu/{id}', 'deleteMenu');
    Route::post('/menus/createMenu', 'createMenu');
    Route::post('menus/uploadImage', 'uploadImage');
    Route::get('/menus/getMenuById/{id}', 'getMenuById');
    Route::put('/menus/updateMenu', 'updateMenu');
});

Route::controller(CategoriesController::class)->group(function () {
    Route::get('/categories/getAllCategories', 'getAllCategories');
    Route::get('/categories/getCategoriesWithMenuId/{id}', 'getCategoriesWithMenuId');
    Route::delete('/categories/deleteCategory/{id}', 'deleteCategory');
    Route::post('/categories/createCategory/{name}', 'createCategory');
    Route::put('/categories/updateCategory/', 'updateCategory');
});
