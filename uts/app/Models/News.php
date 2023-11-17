<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "author",
        "description",
        "content",
        "url",
        "url_image",
        "published_at",
        "category",
    ];

    // mendapatkan judul
    public static function search($title)
    {
        return static::where('title', $title)->first();
    }
}
