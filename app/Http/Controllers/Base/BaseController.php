<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    use ImageUpload;

//    protected function loadResource($path){
//        View::composer($path, function ($view){
//            $view->with('route_name', $this->route_name);
//            $view->with('resource_path', $this->resource_path);
//            if(isset($this->page)) {
//                $view->with('page', $this->page);
//            }
//            $view->with('folder_name', property_exists($this,'folder_name') ? $this->folder_name:'');
//            if(isset($this->module)){
//                $view->with('module', $this->module);
//            }
//            if(isset($this->base_group)){
//                $view->with('base_group', $this->base_group);
//            }
//            if(isset($this->page_method)){
//                $view->with('page_method', $this->page_method);
//            }
//            if(isset($this->page_title)){
//                $view->with('page_title', $this->page_title);
//            }
//            if(isset($this->image_path)){
//                $view->with('image_path', $this->image_path);
//            }
//            if(isset($this->file_path)){
//                $view->with('file_path', $this->file_path);
//            }
//            if(isset($this->folder_name)){
//                $view->with('folder_name', $this->folder_name);
//            }
//        });
//        return $path;
//    }

    protected function loadResource($path){
        View::composer($path, function ($view){
            $properties = ['route_name', 'resource_path', 'page', 'folder_name', 'module', 'base_group', 'page_method', 'page_title', 'image_path', 'file_path'];

            foreach ($properties as $property) {
                if (property_exists($this, $property) && isset($this->$property)) {
                    $view->with($property, $this->$property);
                }
            }
        });

        return $path;
    }


}
