<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UniteController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\SuccursaleController;
use App\Http\Controllers\CaracteristiquesController;

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

Route::apiResource("/succursales",SuccursaleController::class);
Route::apiResource("/users",UserController::class);
Route::apiResource('/caracteristique',CaracteristiquesController::class);
Route::apiResource('/produits',ProduitController::class);
Route::get('/produits/{code}/succursale/{succ}',[ProduitController::class,'searchProduct']);

Route::apiResource('/unite',UniteController::class);
Route::apiResource("/commandes",CommandeController::class);
Route::apiResource("/client",ClientController::class);
Route::POST('login', [LoginController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::get('users', [UserController::class,'index']);

    Route::get('logout',[LoginController::class,'logout']);
});

Route::controller(AmiController::class)->prefix('/succursales/{id}/')->group(function () {
    Route::get('friends',  'listeSuccursalesFriends');
    Route::get('others',  'listeSuccursalesOthers');
    Route::get('wait',  'listeSuccursalesWait');
});


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
