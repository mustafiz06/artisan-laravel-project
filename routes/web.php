<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
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
Route::post('/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('category.delete');
Route::post('/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::post('/category/status/change/{id}', [CategoryController::class, 'status_change'])->name('category.status.change');




Route::get('/tag', [TagController::class, 'index'])->name('tag');
Route::post('/tag/insert', [TagController::class, 'tag_insert'])->name('tag.insert');
Route::post('/tag/delete/{id}', [TagController::class, 'tag_delete'])->name('tag.delete');
Route::post('/tag/edit/{id}', [TagController::class, 'tag_edit'])->name('tag.edit');
Route::post('/tag/status/change/{id}', [TagController::class, 'status_change'])->name('tag.status.change');
Route::post('/tag/restore/{id}', [TagController::class, 'tag_restore'])->name('tag.restore');
Route::post('/tag/forcedelete/{id}', [TagController::class, 'tag_forcedelete'])->name('tag.forcedelete');



// add blog
Route::get('/blog/add', [BlogController::class, 'blog_add'])->name('blog.add');
Route::post('/blog/add/post', [BlogController::class, 'blog_add_post'])->name('blog.post');
// edit blog
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::post('/blog/delete/{id}', [BlogController::class, 'blog_delete'])->name('blog.delete');
Route::post('/blog/status/change/{id}', [BlogController::class, 'blog_status_change'])->name('blog.status.change');
Route::get('/blog/trash', [BlogController::class, 'blog_trash'])->name('blog.trash');
Route::post('/blog/restore/{id}', [BlogController::class, 'blog_restore'])->name('blog.restore');
Route::post('/blog/delete/forever/{id}', [BlogController::class, 'blog_forcedelete'])->name('blog.forcedelete');


