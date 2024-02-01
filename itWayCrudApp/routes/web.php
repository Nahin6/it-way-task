<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(productController::class)->group(function () {


    Route::get('/addCategory', 'addCategoryPage')->name('addCategoryPage');
    Route::get('/addProduct', 'addProductPage')->name('addProductPage');
    Route::get('/displayProduct', 'displayProductPage')->name('displayProductPage');
    Route::post('/add-new-catagory', 'addNewCatagory')->name('addNewCatagory');
    Route::post('/add-new-products','addNewProduct')->name('addProducts');

});
