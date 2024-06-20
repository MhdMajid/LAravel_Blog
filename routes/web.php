<?php

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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
Route::get('/', function () {
    return  redirect()->route('posts');
});

Auth::routes();
// Routes for Profile
Route::get('/home',              [HomeController::class,    'index'])    ->name('home');
Route::get('/profile',           [ProfileController::class, 'index'])    ->name('profile');
Route::put('/profile/update',    [ProfileController::class, 'update'])   ->name('profile.update');
// Route::post('/ajax_search', [PostController::class,'ajax_search'] )-> name('ajax_search_job');
// Routes for Posts
Route::get('/posts',             [PostController::class, 'index'])       ->name('posts');
// Route::get('/postss',             [PostController::class, 'ind'])       ->name('postss');
Route::get('/posts/trashed',     [PostController::class, 'postsTrashed'])->name('posts.trashed');
Route::get('/post/create',       [PostController::class, 'create'])      ->name('post.create');
Route::post('/post/store',       [PostController::class, 'store'])       ->name('post.store');
Route::get('/post/show/{slug}',  [PostController::class, 'show'])        ->name('post.show');
Route::get('/post/notification/{id}',   [PostController::class,'notification'])->name('post.notification');
Route::get('/post/allNotification',   [PostController::class,'allNotification'])->name('all.notification');
Route::get('/post/readAllNotification',   [PostController::class,'readAllNotification'])->name('read.all.notification');
Route::get('/post/{id}',         [PostController::class, 'edit'])        ->name('post.edit');
Route::post('/post/update/{id}', [PostController::class, 'update'])      ->name('post.update');
Route::get('/post/destroy/{id}', [PostController::class, 'destroy'])     ->name('post.destroy');
Route::get('/post/hdelete/{id}', [PostController::class, 'hdelete'])     ->name('post.hdelete');
Route::get('/post/restore/{id}', [PostController::class, 'restore'])     ->name('post.restore');


// Routes for tags
Route::get('/tags',              [TagController::class, 'index'])        ->name('tags');
Route::get('/tag/create',        [TagController::class, 'create'])       ->name('tag.create');
Route::post('/tag/store',        [TagController::class, 'store'])        ->name('tag.store');
Route::get('/tag/{id}',          [TagController::class, 'edit'])         ->name('tag.edit');
Route::post('/tag/update/{id}',  [TagController::class, 'update'])       ->name('tag.update');
Route::get('/tag/destroy/{id}',  [TagController::class, 'destroy'])      ->name('tag.destroy');
 

// Routes for users 
Route::middleware(['checkUser'])->group(function () {
    
    Route::get('/users',              [UserController::class, 'index'])       ->name('users');
    Route::get('/user/create',        [UserController::class, 'create'])      ->name('user.create');
    Route::post('/user/store',        [UserController::class, 'store'])       ->name('user.store');
    Route::post('/user/{id}',          [UserController::class, 'edit'])        ->name('user.edit');
    Route::post('/user/update/{id}',  [UserController::class, 'update'])      ->name('user.update');
    Route::get('/user/destroy/{id}',  [UserController::class, 'destroy'])     ->name('user.destroy');

});    
