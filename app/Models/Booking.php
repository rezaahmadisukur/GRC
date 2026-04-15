<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'customer_name',
        'whatsapp_number',
        'start_date',
        'duration_hours',
        'end_date',
        'total_price',
        'dp_amount',
        'remains_payment',
        'status',
        'notes'
    ];

    public function car()
    {
        $this->belongsTo(Car::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
