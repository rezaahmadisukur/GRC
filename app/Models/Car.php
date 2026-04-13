<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'plate_code',
        'color',
        'transmission',
        'price_12h',
        'price_24h',
        'is_available'
    ];
}
