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

    public function category()
    {
        // models post berelasi dengan model kategori
        return $this->belongsTo(Category::class);
    }
}
