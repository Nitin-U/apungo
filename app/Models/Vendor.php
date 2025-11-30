<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Backend\User;

class Vendor extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','image','email', 'title', 'about_me', 'experience', 'rating', 'verified', 'availability', 'agreement'
        ,'created_by','updated_by','deleted_at','created_at','updated_at'];

    // Relationships
    public function user()
    {
        return $this->hasOne(User::class,'vendor_id','id');
    }

    public function documents()
    {
        return $this->hasMany(VendorDocument::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class,'vendor_services','vendor_id','service_id')->withPivot('rate','service_mode');
    }

    public function bookingServices()
    {
        return $this->hasMany(BookingService::class);
    }
}
