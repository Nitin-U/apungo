<?php

namespace App\Models\Backend;


use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    = 'settings';
    protected $guarded  = ['id'];

}
