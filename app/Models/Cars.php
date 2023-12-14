<?php

namespace App\Models;

use App\Enums\UserGender;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'brand',
        'year',
        'user_id'
    ];
}
