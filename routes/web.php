<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\SmsController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

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
    return view('home.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/dash',[MainController::class,'dashboard']);

// category
Route::get('add-view-category',[AdminController::class,'addViewCategory'])->name('addViewCategory');
Route::post('addCategory',[AdminController::class,'addCategory'])->name('addCategory');
Route::get('delete-category/{id}',[AdminController::class,'deleteCategory'])->name('deleteCategory');
Route::get('edit-category/{id}',[AdminController::class,'editCategory'])->name('editCategory');
Route::post('update-category',[AdminController::class,'updateCategory'])->name('updateCategory');


//Product

Route::get('add-view-product',[AdminController::class,'addViewProduct'])->name('addViewProduct');
Route::post('add-product',[AdminController::class,'addProduct'])->name('addProduct');
Route::get('view-product',[AdminController::class,'viewProduct'])->name('viewProduct');
Route::get('edit-product/{id}',[AdminController::class,'editProduct'])->name('editProduct');
Route::post('update-product',[AdminController::class,'updateProduct'])->name('updateProduct');
Route::get('search-product',[AdminController::class,'searchProduct'])->name('searchProduct');
Route::get('delete-product/{id}',[AdminController::class,'deleteProduct'])->name('deleteProduct');


// home main

 Route::get('/',[MainController::class,'indexHomeProduct']);

 Route::get('product-desc/{id}',[MainController::class,'productDesc'])->name('productDesc');
 Route::get('descriptionproduct/{id}',[MainController::class,'descriptionProduct'])->name('descriptionProduct');

 Route::post('add-to-cart/{id}',[MainController::class,'addToCart'])->name('addToCart');
Route::get('index-cart',[MainController::class,'IndexCart'])->name('IndexCart');
Route::get('deleteCart/{id}',[MainController::class, 'deleteCart'])->name('deleteCart');
Route::get('add-To-Order', [MainController::class, 'addToOrder'])->name('addToOrder');

Route::get('view-All-Orders', [MainController::class, 'viewAllOrders'])->name('viewAllOrders');
Route::get('searchOrders', [AdminController::class,'searchOrders'])->name('searchOrders');
Route::get('Update/{id}', [MainController::class, 'updateStatus'])->name('updateStatus');
Route::get('deleteFromCart/{id}',[MainController::class,'deletesave'])->name('deletesave');

//
route::get('Accept',[AdminController::class,'accept'])->name('accept');

//save-product
Route::get('Save/{id}' , [MainController::class, 'addToSave'])->name('addToSave');
Route::get('view-saved-product',[MainController::class,'ViewSaveProduct'])->name('ViewSaveProduct');





//pdf

Route::get('pdf/{id}',[AdminController::class,'pdf'])->name('pdf');
Route::get('pfd/{id}',[AdminController::class,'pfd'])->name('pfd');


//sms

Route::get('sms-test',[SmsController::class,'smsSend']);
