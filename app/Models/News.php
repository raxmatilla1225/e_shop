<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'news_category_id',
        'image_url',
        'author_id',
        'views_count',
        'status',
        'meta_keys',
        'meta_description',
    ];

    public function category()
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
