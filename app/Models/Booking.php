<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'booking_code',
        'customer_name',
        'whatsapp_number',
        'start_date',
        'duration_hours',
        'end_date',
        'total_price',
        'dp_amount',
        'remains_payment',
        'actual_end_date',
        'penalty_amount',
        'final_total_price',
        'return_notes',
        'status',
        'notes'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
