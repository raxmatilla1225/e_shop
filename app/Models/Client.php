<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class Client extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $guarded = false;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
