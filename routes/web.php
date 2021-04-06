<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;

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

Route::get('/blog/{username}', [PostController::class,'getAllPosts'])
->name('blog');

Route::get('/blog/post/new-post', [PostController::class,'createPost'])
->middleware('auth')->name('createPost');

Route::post('/blog/post/new-post', [PostController::class,'createPostSubmit'])
->middleware('auth')->name('createPostSubmit');

Route::get('/blog/{username}/post/{id}', [PostController::class,'getPostById'])
->middleware('owner.post')->name('getPost');

Route::get('/blog/post/{id}/delete', [PostController::class,'deletePost'])
->middleware('can.edit')->name('deletePost');

Route::get('/blog/post/{id}/update', [PostController::class,'updatePost'])
->middleware('can.edit')->name('updatePost');

Route::post('/blog/post/{id}/update', [PostController::class,'updatePostSubmit'])
->middleware('can.edit')->name('updatePostSubmit');

Route::post('/addTag',[TagController::class,'addTag'])->middleware('auth')->name('addTag');
