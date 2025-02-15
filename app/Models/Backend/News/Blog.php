<?php

namespace App\Models\Backend\News;

use App\Models\Backend\BaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends BaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    ='blogs';
    protected $fillable = ['id','blog_category_id','title','key','slug','description','image','meta_title','meta_tags','meta_description','status','created_by','updated_by'];

    public function blogCategory(){
        return $this->belongsTo(BlogCategory::class);
    }

}
