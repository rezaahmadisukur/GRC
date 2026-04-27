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
        'category',
        'plate_code',
        'color',
        'seats',
        'transmission',
        'fuel_type',
        'price_12h',
        'price_24h',
        'image',
        'is_available'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Scope Filter
     */
    public function scopeFilter($query, array $filters)
    {
        return $query->when($filters['search'] ?? null, function ($q, $search) {
            $q->where('name', 'like', '%' . $search . '%');
        })->when($filters['category'] ?? null, function ($q, $category) {
            $q->where('category', $category);
        })->when($filters['seats'] ?? null, function ($q, $seats) {
            if ($seats == '7+') {
                return $q->where('seats', '>=', 7);
            }
            return $q->where('seats', $seats);
        })->when($filters['transmission'] ?? null, function ($q, $transmission) {
            $q->where('transmission', $transmission);
        })->when($filters['fuel_type'] ?? null, function ($q, $fuel) {
            $q->where('fuel_type', $fuel);
        })->when(array_key_exists('status', $filters) && $filters['status'] !== '', function ($q) use ($filters) {
            if ($filters['status'] === 'available') {
                $q->where('is_available', 1);
            } elseif ($filters['status'] === 'unavailable') {
                $q->where('is_available', 0);
            }
        });
    }

    public static function getCarWelcome()
    {
        return static::latest()->take(3)->get();
    }
}
