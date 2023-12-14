<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;
    protected $fillable = [
        'exterior',
        'interior',
        'mechanical',
        'electrical',
        'oil',
        'tires',
        'scheduled',
        'car_id'
    ];
}
