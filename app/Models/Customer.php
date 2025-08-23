<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Backend\User;
use App\Models\Booking;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    // Relationships
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
