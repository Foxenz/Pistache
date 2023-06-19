<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\MenusController;
use App\Http\Controllers\API\AuthController;

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
    Route::get('/menus/getMenusByCategorie/{id}', 'getMenusByCategorie');
});
