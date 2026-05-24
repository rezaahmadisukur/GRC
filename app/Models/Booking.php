<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'admin_id',
        'customer_id',
        'booking_code',
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
        'notes',
        'is_walkin',
        'cash_paid',
        'change_amount'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'actual_end_date' => 'datetime',
    ];

    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function scopeForPeriod(Builder $query, mixed $startDate, mixed $endDate): Builder
    {
        // add 1 day to make the end_date inclusive (start_date < end_date+1)
        $endDateInclusive = Carbon::parse($endDate)->addDay();
        return $query->where('start_date', '>=', $startDate)
            ->where('start_date', '<', $endDateInclusive)
            ->with('car')
            ->orderBy('start_date');
    }

    public static function calculateRevenueForPeriod(mixed $startDate, mixed $endDate): mixed
    {
        return static::forPeriod($startDate, $endDate)->sum('final_total_price');
    }

    /**
     * Query scope for filtering bookings by search term and status
     * Used on admin bookings index page
     */
    public function scopeFilter(Builder $query, Request $request): Builder
    {
        return $query->when($request->filled('search'), function ($q) use ($request) {
            $searchTerm = '%' . $request->search . '%';
            $q->where(function ($subQuery) use ($searchTerm) {
                $subQuery->whereHas('customer', fn($q) => $q->where('name', 'like', $searchTerm))
                    ->orWhere('booking_code', 'like', $searchTerm)
                    ->orWhereHas('customer', fn($q) => $q->where('whatsapp_number', 'like', $searchTerm))
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
