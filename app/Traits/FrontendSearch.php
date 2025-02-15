<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FrontendSearch {

    public function search(Request $request)
    {
        $this->page_method      = 'search';
        $this->page_title       = 'Search '.$this->page;
        $bundle                   = $this->getCommonBundle();
        $bundle['query']          = $request['for'];

        $bundle['rows']           = $this->model->query();

        if($request['for']){
            $bundle['rows']->where('title', 'LIKE', '%' . $bundle['query']  . '%');
        }

        $bundle['rows']           = $bundle['rows']->active()->paginate(6);

        return view($this->loadResource($this->resource_path.'search'), compact('bundle'));
    }

}
