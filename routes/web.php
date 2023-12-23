<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;
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

Route::get('add-view-category',[AdminController::class,'addViewCategory'])->name('addViewCategory');
Route::post('addCategory',[AdminController::class,'addCategory'])->name('addCategory');
Route::get('delete-category/{id}',[AdminController::class,'deleteCategory'])->name('deleteCategory');
Route::get('edit-category/{id}',[AdminController::class,'editCategory'])->name('editCategory');
Route::post('update-category',[AdminController::class,'updateCategory'])->name('updateCategory');
