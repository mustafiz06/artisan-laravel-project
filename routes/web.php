<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/details/update/{id}', [ProfileController::class, 'profile_details_update'])->name('profile.details.update');
Route::post('/profile/image/update/{id}', [ProfileController::class, 'profile_image_update'])->name('profile.image.update');
Route::post('/profile/delete/{id}', [ProfileController::class, 'profile_delete'])->name('profile.delete');
Route::get('/profile/privacy', [ProfileController::class, 'profile_privacy'])->name('profile.privacy');
Route::post('/profile/privacy/password/change/{id}', [ProfileController::class, 'profile_password_change'])->name('profile.password.change');


Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category/insert', [CategoryController::class, 'category_insert'])->name('category.insert');
