<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'image',
        'is_available'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
