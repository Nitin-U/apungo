<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends BaseModel
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name', 'description','status','created_by','updated_by','deleted_at'];

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
