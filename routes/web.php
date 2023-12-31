<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;


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
    return view('home', [
        "title" => "Home",
        "active" => 'home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => 'about',
        "name" => "Java Kanaya",
        "email" => "javakanaya@gmail.com",
        "image" => "anjing.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories/', function () {
    return view('categories', [
        'title' => 'Post Categories',
        "active" => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //hanya bisa diakses user yang belum login
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest'); //hanya bisa diakses user yang belum login;
Route::post('/register', [RegisterController::class, 'store']);

Route::get('dashboard', function () {
    return view('dashboard.index');
})->middleware('auth'); //hanya bisa diakses user yang sudah login


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
// semua nya ditangani di sini
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// AUTHORIZATION menggunakan middleware
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');

// AUTHORIZATION menggunakan gate
// Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show');