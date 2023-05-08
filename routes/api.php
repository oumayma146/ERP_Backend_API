<?php

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BonLivraisionsController;
use App\Http\Controllers\CaissesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CoffersController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\FournisseursController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;



Route::post('/sign-in', [AuthController::class, 'signIn']);
Route::get('/profile', [AuthController::class, 'profile']);
Route::post('/sign-up', [AuthController::class, 'signUp']);
Route::post('/sign-out', [AuthController::class, 'signOut']);

Route::group(['prefix' => 'client', 'middleware'=>'auth:sanctum'], function () {
    Route::get('/', [ClientsController::class, 'get']);
    Route::put('/update/{id}', [ClientsController::class, 'updateCommande']);
    Route::get('/facture', [ClientsController::class, 'consulterListeFacture']);
    Route::get('/details/{id}', [ClientsController::class, 'detailsFacture']);
    Route::get('/valide', [ClientsController::class, 'consulterCommandeValidé']);
    Route::get('/non_valide', [ClientsController::class, 'consulterCommandeNonValidé']);
});
Route::group(['prefix' => 'fournisseur', 'middleware'=>'auth:sanctum'], function () {
    Route::put('/update/{id}', [FournisseursController::class, 'updateCommande']);
    Route::get('/facture', [FournisseursController::class, 'consulterListeFacture']);
    Route::get('/details/{id}', [FournisseursController::class, 'detailsFacture']);
    Route::get('/valide', [FournisseursController::class, 'consulterCommandeValidé']);
    Route::get('/non_valide', [FournisseursController::class, 'consulterCommandeNonValidé']);
});
Route::group(['prefix' => 'article', 'middleware'=>'auth:sanctum'], function () {
    Route::get('/', [ArticlesController::class, 'get']);
   
});
Route::group(['prefix' => 'role', 'middleware'=>'auth:sanctum'], function () {
    Route::get('/', [RolesController::class, 'index']);
    Route::post('/store', [RolesController::class, 'store']);
    Route::get('/idRole/{id}', [RolesController::class, 'getRolePermission']);
    Route::put('/update/{id}', [RolesController::class, 'update']);
    Route::delete('/{id}', [RolesController::class, 'destroy']);
    Route::get('/', [RolesController::class, 'normalRoles']);

});
Route::group(['prefix' => 'facture', 'middleware'=>'auth:sanctum'], function () {
    Route::put('/update/{id}', [FacturesController::class, 'update']);
    Route::get('/', [FacturesController::class, 'consulterListeFactureNonPayee']);
    Route::get('/details/{id}', [FacturesController::class, 'detailsFacture']);
   
});
Route::group(['prefix' => 'livraision', 'middleware'=>'auth:sanctum'], function () {
    Route::get('/', [BonLivraisionsController::class, 'consulterListeBonLivraision']);
    Route::get('/details/{id}', [BonLivraisionsController::class, 'detailsBonLivraision']);
   
});
Route::group(['prefix' => 'permission' ,'middleware'=>'auth:sanctum' ], function () {
    Route::get('/',       [PermissionController::class, 'get']);
    Route::post('/create', [PermissionController::class, 'create']);
    Route::delete('/{id}', [PermissionController::class, 'destroy']);
});

Route::group(['prefix' => 'users' ,'middleware'=>'auth:sanctum' ], function () {
    Route::get('/', [UsersController::class, 'index']);
    Route::post('/create', [UsersController::class, 'store']);
    Route::put('/update/{id}', [UsersController::class, 'update']);
    Route::delete('/{id}', [UsersController::class, 'destroy']);
});
Route::group(['prefix' => 'coffer', 'middleware'=>'auth:sanctum'], function () {
    Route::get('/', [CoffersController::class, 'get']);
    Route::get('/cheque', [CoffersController::class, 'sumCheque']);
    Route::get('/virement', [CoffersController::class, 'sumVirement']);
    Route::get('/espaece', [CoffersController::class, 'sumEspece']);
   
});
Route::group(['prefix' => 'caisse', 'middleware'=>'auth:sanctum'], function () {
    Route::get('/', [CaissesController::class, 'get']);
    Route::get('/cheque', [CaissesController::class, 'sumCheque']);
    Route::get('/virement', [CaissesController::class, 'sumVirement']);
    Route::get('/espaece', [CaissesController::class, 'sumEspece']);
   
});