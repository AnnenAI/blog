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

Route::get('{username}/blog', [PostController::class,'getAllPosts'])
->name('blog');

Route::post('/addTag',[TagController::class,'addTag'])
->middleware('auth')->name('addTag');

Route::get('/blog/create-post', [PostController::class,'createPost'])
->middleware('auth')->name('createPost');

Route::post('/blog/new-post', [PostController::class,'createPostSubmit'])
->middleware('auth')->name('createPostSubmit');

Route::get('{username}/post/{id}', [PostController::class,'getPostById'])
->middleware('owner.post')->name('getPost');

Route::get('/post/{id}/delete', [PostController::class,'deletePost'])
->middleware('can.edit')->name('deletePost');

Route::get('/post/{id}/update', [PostController::class,'updatePost'])
->middleware('can.edit')->name('updatePost');

Route::post('/post/{id}/update', [PostController::class,'updatePostSubmit'])
->middleware('can.edit')->name('updatePostSubmit');
