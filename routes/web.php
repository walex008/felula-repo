<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\WelcomeController::class, 'index'] );
Route::get('blog/{post}/post', [\App\Http\Controllers\WelcomeController::class, 'show'])->name('show-post');
Route::get('blog/category/{category}', [\App\Http\Controllers\WelcomeController::class, 'category'])->name('blog.category');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function (){
    Route::resource('categories', \App\Http\Controllers\CategoriesController::class);
    Route::resource('tags', \App\Http\Controllers\TagsController::class);
    Route::resource('posts', \App\Http\Controllers\PostsController::class);
    Route::get('trashed-posts', [\App\Http\Controllers\PostsController::class, 'trashed'] )->name('trashed-posts.index');
    Route::get('upload', [\App\Http\Controllers\PostsController::class, 'upload'])->name('posts.upload');
    Route::post('store-upload', [\App\Http\Controllers\PostsController::class, 'storeUpload'])->name('posts.store-upload');
    Route::put('restore-post/{post}', [\App\Http\Controllers\PostsController::class, 'restore'])->name('restore-posts');
});

Route::middleware('auth', 'VerifyIsAdmin')->group(function (){
    Route::get('users', [\App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::post('users/{user}/make-admin', [\App\Http\Controllers\UsersController::class, 'makeAdmin'])->name('users.make-admin');
    Route::get('users/edit', [\App\Http\Controllers\UsersController::class, 'edit'])->name('users.profile');
    Route::put('users/{user}/profile', [\App\Http\Controllers\UsersController::class, 'usersProfile'])->name('users.profile-update');
});
