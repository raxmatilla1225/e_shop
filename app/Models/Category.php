<?php

namespace App\Models;

use App\Traits\MultiLanguage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory, MultiLanguage;
    protected $guarded = [];

    protected $multi_lang = [
        'title', 'description'
    ];

    public function child_categories(){
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
