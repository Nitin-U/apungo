<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Traits\ImageUpload;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    use ImageUpload;

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
