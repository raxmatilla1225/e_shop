<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = [];


    protected function images() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
            set: fn ($value) => json_encode($value),
        );
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
          'slug' => [
              'source' => 'name_ru'
          ]
        ];
    }
}
