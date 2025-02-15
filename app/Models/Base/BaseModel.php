<?php

namespace App\Models\Base;

use App\Models\Backend\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class BaseModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    public function createdBy(){
        return $this->hasOne(User::class,'created_by','id');
    }

    public function updatedBy(){
        return $this->hasOne(User::class,'updated_by','id');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
    }

    public function scopeDescending(Builder $query): void
    {
        $query->orderBy('created_at', 'DESC');
    }

    public function changeTokey($title)
    {
        return Str::slug($title);
    }

}
