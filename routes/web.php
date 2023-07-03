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

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Java Kanaya",
        "email" => "javakanaya@gmail.com",
        "image" => "anjing.jpg"
    ]);
});

Route::get('/blog', function () {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Java Kanaya",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus excepturi magnam perspiciatis, dolorem eos omnis, dicta aut suscipit accusamus hic dolores laborum. Dicta mollitia veniam explicabo voluptate iste tempora cumque aut quasi ea, deleniti corporis ut. Libero, minus illum dolores eveniet dolor animi consectetur labore, quidem adipisci vel quia iusto non odio, suscipit iste error. Tempore nulla, reprehenderit quod dolore iste nam veritatis in rerum odit! Sit voluptatum vitae maxime, nam itaque odit exercitationem voluptatibus, est, ab iure ullam placeat!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Kanaya Prada",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus excepturi magnam perspiciatis, dolorem eos omnis, dicta aut suscipit accusamus hic dolores laborum. Dicta mollitia veniam explicabo voluptate iste tempora cumque aut quasi ea, deleniti corporis ut. Libero, minus illum dolores eveniet dolor animi consectetur labore, quidem adipisci vel quia iusto non odio, suscipit iste error. Tempore nulla, reprehenderit quod dolore iste nam veritatis in rerum odit! Sit voluptatum vitae maxime, nam itaque odit exercitationem voluptatibus, est, ab iure ullam placeat! Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus excepturi magnam perspiciatis, dolorem eos omnis, dicta aut suscipit accusamus hic dolores laborum. Dicta mollitia veniam explicabo voluptate iste tempora cumque aut quasi ea, deleniti corporis ut. Libero, minus illum dolores eveniet dolor animi consectetur labore, quidem adipisci vel quia iusto non odio, suscipit iste error. Tempore nulla, reprehenderit quod dolore iste nam veritatis in rerum odit! Sit voluptatum vitae maxime, nam itaque odit exercitationem voluptatibus, est, ab iure ullam placeat!"
        ]
    ];
    return view('posts', [
        "title" => "Posts",
        "posts" => $blog_posts
    ]);
});

Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Java Kanaya",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus excepturi magnam perspiciatis, dolorem eos omnis, dicta aut suscipit accusamus hic dolores laborum. Dicta mollitia veniam explicabo voluptate iste tempora cumque aut quasi ea, deleniti corporis ut. Libero, minus illum dolores eveniet dolor animi consectetur labore, quidem adipisci vel quia iusto non odio, suscipit iste error. Tempore nulla, reprehenderit quod dolore iste nam veritatis in rerum odit! Sit voluptatum vitae maxime, nam itaque odit exercitationem voluptatibus, est, ab iure ullam placeat!"
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Kanaya Prada",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus excepturi magnam perspiciatis, dolorem eos omnis, dicta aut suscipit accusamus hic dolores laborum. Dicta mollitia veniam explicabo voluptate iste tempora cumque aut quasi ea, deleniti corporis ut. Libero, minus illum dolores eveniet dolor animi consectetur labore, quidem adipisci vel quia iusto non odio, suscipit iste error. Tempore nulla, reprehenderit quod dolore iste nam veritatis in rerum odit! Sit voluptatum vitae maxime, nam itaque odit exercitationem voluptatibus, est, ab iure ullam placeat! Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus excepturi magnam perspiciatis, dolorem eos omnis, dicta aut suscipit accusamus hic dolores laborum. Dicta mollitia veniam explicabo voluptate iste tempora cumque aut quasi ea, deleniti corporis ut. Libero, minus illum dolores eveniet dolor animi consectetur labore, quidem adipisci vel quia iusto non odio, suscipit iste error. Tempore nulla, reprehenderit quod dolore iste nam veritatis in rerum odit! Sit voluptatum vitae maxime, nam itaque odit exercitationem voluptatibus, est, ab iure ullam placeat!"
        ]
    ];
    $new_post = [];
    foreach($blog_posts as $post) {
        if($post['slug'] === $slug) {
            $new_post = $post;
        }
    }
    return view('post', [
        "title" => "Single Post",
        "post" =>$new_post
    ]);
});