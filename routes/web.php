<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleManagementController;
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

Route::get('/a', function () {
    return view('welcome');
});

Route::get('/', [FrontendController::class, 'index'])->name('root');

Auth::routes([
    'register' => false, // Registration Routes...
]);

Route::get('/dashboard/manage/role', [RoleManagementController::class, 'index'])->name('role');
Route::get('/dashboard/add/user', [RoleManagementController::class, 'add_user'])->name('add.user');
Route::post('/dashboard/administration/change', [RoleManagementController::class, 'administration_role_edit'])->name('administration.role.edit');



Route::get('/dashboard/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/dashboard/profile/details/update/{id}', [ProfileController::class, 'profile_details_update'])->name('profile.details.update');
Route::post('/dashboard/profile/image/update/{id}', [ProfileController::class, 'profile_image_update'])->name('profile.image.update');
Route::post('/dashboard/profile/delete/{id}', [ProfileController::class, 'profile_delete'])->name('profile.delete');
Route::get('/dashboard/profile/privacy', [ProfileController::class, 'profile_privacy'])->name('profile.privacy');
Route::post('/dashboard/profile/privacy/password/change/{id}', [ProfileController::class, 'profile_password_change'])->name('profile.password.change');


Route::get('/dashboard/category', [CategoryController::class, 'index'])->name('category');
Route::post('/dashboard/category/insert', [CategoryController::class, 'category_insert'])->name('category.insert');
Route::post('/dashboard/category/delete/{id}', [CategoryController::class, 'category_delete'])->name('category.delete');
Route::post('/dashboard/category/edit/{id}', [CategoryController::class, 'category_edit'])->name('category.edit');
Route::post('/dashboard/category/status/change/{id}', [CategoryController::class, 'status_change'])->name('category.status.change');




Route::get('/dashboard/tag', [TagController::class, 'index'])->name('tag');
Route::post('/dashboard/tag/insert', [TagController::class, 'tag_insert'])->name('tag.insert');
Route::post('/dashboard/tag/delete/{id}', [TagController::class, 'tag_delete'])->name('tag.delete');
Route::post('/dashboard/tag/edit/{id}', [TagController::class, 'tag_edit'])->name('tag.edit');
Route::post('/dashboard/tag/status/change/{id}', [TagController::class, 'status_change'])->name('tag.status.change');
Route::post('/dashboard/tag/restore/{id}', [TagController::class, 'tag_restore'])->name('tag.restore');
Route::post('/dashboard/tag/forcedelete/{id}', [TagController::class, 'tag_forcedelete'])->name('tag.forcedelete');



// add blog
Route::get('/dashboard/blog/add', [BlogController::class, 'blog_add'])->name('blog.add');
Route::post('/dashboard/blog/add/post', [BlogController::class, 'blog_add_post'])->name('blog.post');
// edit blog
Route::get('/dashboard/blog', [BlogController::class, 'index'])->name('blog');
Route::post('/dashboard/blog/delete/{id}', [BlogController::class, 'blog_delete'])->name('blog.delete');
Route::post('/dashboard/blog/status/change/{id}', [BlogController::class, 'blog_status_change'])->name('blog.status.change');
Route::get('/dashboard/blog/trash', [BlogController::class, 'blog_trash'])->name('blog.trash');
Route::post('/dashboard/blog/restore/{id}', [BlogController::class, 'blog_restore'])->name('blog.restore');
Route::post('/dashboard/blog/delete/forever/{id}', [BlogController::class, 'blog_forcedelete'])->name('blog.forcedelete');


