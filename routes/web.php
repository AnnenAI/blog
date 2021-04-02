<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('home.home');
})->name('home');

Route::get('/blog', [PostController::class,'getAllPosts'])->name('blog');

Route::get('/blog/{id}', [PostController::class,'getPostById'])->name('getPost');

Route::get('/blog/{id}/delete', [PostController::class,'deletePost'])->middleware('can.edit')->name('deletePost');

Route::get('/blog/{id}/update', [PostController::class,'updatePost'])->middleware('can.edit')->name('updatePost');

Route::post('/blog/{id}/update', [PostController::class,'updatePostSubmit'])->middleware('can.edit')->name('updatePostSubmit');

Route::get('/blog/create/new-post', [PostController::class,'createPost'])->middleware('auth')->name('createPost');

Route::post('/blog/create/new-post', [PostController::class,'createPostSubmit'])->middleware('auth')->name('createPostSubmit');
