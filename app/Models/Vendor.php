<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Backend\User;

class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'profile_picture', 'title', 'about_me',
        'experience', 'rating', 'verified',
        'availability', 'agreement'
    ];

    // Relationships
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function documents()
    {
        return $this->hasMany(VendorDocument::class);
    }

    public function vendorServices()
    {
        return $this->hasMany(VendorService::class);
    }

    public function bookingServices()
    {
        return $this->hasMany(BookingService::class);
    }
}
