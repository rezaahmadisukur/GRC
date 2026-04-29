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

    public function scopeForPeriod($query, $startDate, $endDate)
    {
        return $query->whereBetween('start_date', [$startDate, $endDate])
            ->with('car')
            ->orderBy('start_date');
    }

    public static function calculateRevenueForPeriod($startDate, $endDate)
    {
        return static::forPeriod($startDate, $endDate)->sum('final_total_price');
    }

    /**
     * Query scope for filtering bookings by search term and status
     * Used on admin bookings index page
     */
    public function scopeFilter($query, $request)
    {
        return $query->when($request->filled('search'), function ($q) use ($request) {
            $searchTerm = '%' . $request->search . '%';
            $q->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('customer_name', 'like', $searchTerm)
                    ->orWhere('booking_code', 'like', $searchTerm)
                    ->orWhere('whatsapp_number', 'like', $searchTerm)
                    ->orWhereHas('car', function ($carQuery) use ($searchTerm) {
                        $carQuery->where('name', 'like', $searchTerm)
                            ->orWhere('plate_code', 'like', $searchTerm);
                    });
            });
        })
            ->when($request->filled('status') && $request->status !== 'all', function ($q) use ($request) {
                $q->where('status', $request->status);
            });
    }
}
