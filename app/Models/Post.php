<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // biar tahu, field mana saja yang boleh diisi. (pilih salah satu)
    // protected $fillable = ['title', 'excerpt', 'body']; // ini yang boleh create/update
    protected $guarded = ['id']; // ini yang ga boleh di create/update
    protected $with = ['author', 'category'];

    public function category()
    {
        // models post berelasi dengan model kategori
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        // models post berelasi dengan model kategori
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        // if(isset($filter['search']) ? true : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        // Sama kyk yg diatas tapi pake when() dan Null Coalescing Operator
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%');
        });

        // index category
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        // juga sama kyk diatas tp pake arrow function
        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) =>
            $query->whereHas(
                'author',
                fn($query) =>
                $query->where('username', $author)
            )
        );
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}