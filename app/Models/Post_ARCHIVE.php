<?php

namespace App\Models;

class Post_
{
    private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Java Kanaya",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus excepturi magnam perspiciatis, dolorem eos omnis, dicta aut suscipit accusamus hic dolores laborum. Dicta mollitia veniam explicabo voluptate iste tempora cumque aut quasi ea, deleniti corporis ut. Libero, minus illum dolores eveniet dolor animi consectetur labore, quidem adipisci vel quia iusto non odio, suscipit iste error. Tempore nulla, reprehenderit quod dolore iste nam veritatis in rerum odit! Sit voluptatum vitae maxime, nam itaque odit exercitationem voluptatibus, est, ab iure ullam placeat!"
        ],
        [
            "title" => "Judul Post Java",
            "slug" => "judul-post-kedua",
            "author" => "Kanaya Prada",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus excepturi magnam perspiciatis, dolorem eos omnis, dicta aut suscipit accusamus hic dolores laborum. Dicta mollitia veniam explicabo voluptate iste tempora cumque aut quasi ea, deleniti corporis ut. Libero, minus illum dolores eveniet dolor animi consectetur labore, quidem adipisci vel quia iusto non odio, suscipit iste error. Tempore nulla, reprehenderit quod dolore iste nam veritatis in rerum odit! Sit voluptatum vitae maxime, nam itaque odit exercitationem voluptatibus, est, ab iure ullam placeat! Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus excepturi magnam perspiciatis, dolorem eos omnis, dicta aut suscipit accusamus hic dolores laborum. Dicta mollitia veniam explicabo voluptate iste tempora cumque aut quasi ea, deleniti corporis ut. Libero, minus illum dolores eveniet dolor animi consectetur labore, quidem adipisci vel quia iusto non odio, suscipit iste error. Tempore nulla, reprehenderit quod dolore iste nam veritatis in rerum odit! Sit voluptatum vitae maxime, nam itaque odit exercitationem voluptatibus, est, ab iure ullam placeat!"
        ]
    ];

    public static function all() {
        // karena static pake self::, kalo biasa pake this->
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        // self:: untuk properties, static:: untuk function
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
        
        // Kalau tidak pake collect() pake yg ini ygy
        // $post = [];
        // foreach($posts as $p) { 
        //     if($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }
        // return $post;
                
    }
}