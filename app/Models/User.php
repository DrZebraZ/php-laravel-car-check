<?php

namespace App\Models;

use App\Enums\UserGender;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'age',
        'gender'
    ];

    // protected $casts = [
    //     'gender' => UserGender::class,
    // ];
    // public function status(): Attribute{
    //     return Attribute::make(
    //         set: fn (UserGender $gender) => $gender->name,
    //     );
    // }
}
