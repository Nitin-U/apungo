<?php

namespace App\Models\Backend\News;

use App\Models\Backend\BaseModel;
use App\Traits\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends BaseModel
{
    use HasFactory, SoftDeletes, Sluggable, Slug;

    protected $table    ='blog_categories';
    protected $fillable = ['id','title','key','slug','status','created_by','updated_by'];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

}
