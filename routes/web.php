<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
// Guest Access
Route::get('/', function () {
    return redirect('/blogs');
});
Route::get('/register', array(AuthenticationController::class, 'register'))->middleware('guest');
Route::post('/register', array(UserController::class, 'register'))->middleware('guest');
Route::get('/login', array(AuthenticationController::class, 'login'))->name('login')->middleware('guest');

// Signed-in Access
Route::post('/login', array(AuthenticationController::class, 'authenticate'));
Route::get('/logout', array(AuthenticationController::class, 'logout'))->middleware('auth');

// Users
Route::get('/users', array(UserController::class, 'index'))->middleware(['auth', 'role:admin']);
Route::get('/users/new', array(UserController::class, 'create'))->middleware(['auth', 'role:admin']);
Route::get('/users/{id}', array(UserController::class, 'edit'))->middleware(['auth', 'role:admin']);
Route::delete('/users/{id}', array(UserController::class, 'delete'))->middleware(['auth', 'role:admin']);
Route::post('/users/save', array(UserController::class, 'save'))->middleware(['auth', 'role:admin']);

//Posts
Route::get('/blogs', array(PostController::class, 'index'));
Route::get('/blogs/{slug}', array(PostController::class, 'show'));
Route::get('/posts', array(PostController::class, 'list'))->middleware(['auth', 'role:user']);
Route::get('/posts/new', array(PostController::class, 'create'))->middleware(['auth', 'role:user']);
Route::get('/posts/{id}', array(PostController::class, 'edit'))->middleware(['auth', 'role:user']);
Route::delete('/posts/{id}', array(PostController::class, 'delete'))->middleware(['auth', 'role:user']);
Route::post('/posts/save', array(PostController::class, 'save'))->middleware(['auth', 'role:user']);

