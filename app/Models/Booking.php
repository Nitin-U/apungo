<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'location', 'schedule_date',
        'schedule_time', 'remark', 'service_rate', 'status'
    ];

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function bookingServices()
    {
        return $this->hasMany(BookingService::class);
    }
}
