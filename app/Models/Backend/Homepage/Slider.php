<?php

namespace App\Models\Backend\Homepage;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table    ='sliders';
    protected $fillable = ['id','title','subtitle','button','link','image','status','created_by','updated_by'];

}
