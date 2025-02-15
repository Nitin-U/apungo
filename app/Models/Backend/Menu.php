<?php

namespace App\Models\Backend;

use App\Models\Base\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends BaseModel
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table    ='menus';
    protected $fillable =['id','name','title','slug','location','content','status','created_by','updated_by'];

    public function menuItems()
    {
        return $this->hasMany(MenuItem::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ],
        ];
    }

}
