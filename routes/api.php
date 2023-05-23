<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\OrderController;

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
Route::get('/getProducts/{id}',[ProduitController::class,'index']);
Route::get('/getCategory',[CategorieController::class,'getCategories']);
//Route::get('/getProducts',[CategorieController::class,'getProducts']);


Route::post('/order', [OrderController :: class,'addOrder']);


Route::group(['middleware' => ['auth:sanctum']],function(){

});


