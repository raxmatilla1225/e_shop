<?php

namespace App\Models;

use App\Http\Controllers\Admin\StatusesTypesController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'statuses_type_id'
    ];

    public function type()
    {
        return $this->belongsTo(StatusesType::class, 'statuses_type_id');
    }
}
