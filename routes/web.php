<?php

use App\Http\Controllers\DashboardController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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


// kalo ga pake request yang banyak pake ini
/*
    Route::get('categories/{category:slug}', function(Category $category) {
        return view('posts', [
            'title' => "Post by Category : $category->name",
            "active" => 'categories',
            'posts' => $category->posts->load('category', 'author'),
        ]);
    });

    Route::get('/authors/{author:username}', function(User $author){
        return view('posts', [
            'title' => "Post by author : $author->name",
            "active" => 'posts',
            'posts' => $author->posts->load('category', 'author'),
        ]);
    });
*/