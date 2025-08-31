<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    // Relationships
    public function vendorServices()
    {
        return $this->hasMany(VendorService::class);
    }

    public function bookingServices()
    {
        return $this->hasMany(BookingService::class);
    }
}
