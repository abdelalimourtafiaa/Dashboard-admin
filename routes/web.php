<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/home', [HomeController::class, 'redirect']);
Route::get('/', [HomeController::class, 'index']);

Route::get('/addProduct',[HomeController::class,'addProduct']);

Route::post('/upload_product',[HomeController::class,'upload_product']);

Route::get('/AllProduct',[HomeController::class,'showproducts']);

Route::get('/UpdateProduct/{id}',[HomeController::class,'updateProduct']);

Route::post('/edite_product/{id}',[HomeController::class,'edite_product']);

Route::get('/delet_product/{id}',[HomeController::class,'delet_product']);

Route::get('/Orders',[HomeController::class,'showOrders']);

Route::get('/addCategory',[HomeController::class,'addCategory']);

Route::post('/upload_categorie',[HomeController::class,'upload_categorie']);


Route::get('/AllCategories',[HomeController::class,'showcategory']);

Route::get('/UpdateCategory/{id}',[HomeController::class,'updateCategory']);

Route::post('/edite_categorie/{id}',[HomeController::class,'edite_categorie']);

Route::get('/delet_category/{id}',[HomeController::class,'delet_category']);








Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
