<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusesType extends Model
{
    use HasFactory;

    protected $fillable=[
      'name'
    ];

    public function status(){
        return $this->hasOne(Status::class);
    }
}
