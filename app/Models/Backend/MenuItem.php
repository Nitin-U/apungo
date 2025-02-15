<?php

namespace App\Models\Backend;


use App\Models\Base\BaseModel;
use App\Traits\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends BaseModel
{
    use HasFactory, SoftDeletes, Slug;

    protected $table    ='menu_items';
    protected $fillable =['id','title','name','slug','type','target','menu_id','page_id','service_id','blog_id','package_id','status','created_by','updated_by'];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'menu_id', 'id');
    }
}
