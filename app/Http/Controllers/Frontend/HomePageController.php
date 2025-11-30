<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Base\BaseController;
use App\Traits\FrontendSearch;
use Illuminate\Contracts\Support\Renderable;

class HomePageController extends BaseController
{
    use FrontendSearch;
    protected string $module        = FRONTEND;
    protected string $route_name    = FRONTEND;
    protected string $resource_path = FRONTEND;
    protected string $page          = '';
    protected string $folder_name   = 'homepage';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $bundle        = $this->getBundle();

        return view($this->loadResource($this->resource_path.HOMEPAGE), compact('bundle'));
    }

    public function getBundle(): array
    {
        return [];
    }

    // About Us Page
    public function about()
    {
        $this->page_method          = INDEX;
        $this->page_title           = 'About Us '.$this->page;
        return view($this->loadResource($this->resource_path.ABOUT));
    }

    // Contact Us Page
    public function contact()
    {
        $this->page_method          = INDEX;
        $this->page_title           = 'Contact Us '.$this->page;
        return view($this->loadResource($this->resource_path.CONTACT));
    }

    // Service Page
    public function service()
    {
        $this->page_method          = INDEX;
        $this->page_title           = 'Service '.$this->page;
        return view($this->loadResource($this->resource_path.SERVICE));
    }

    // List Page
    public function list()
    {
        $this->page_method          = INDEX;
        $this->page_title           = 'Pandit '.$this->page;
        return view($this->loadResource($this->resource_path.LISTPAGE));
    }

    public function searchVendor()
    {
        $this->page_method      = 'index';
        $this->page_title       = 'Search '.$this->page;
        $bundle['rows'] = session('rows');
        return view($this->loadResource($this->resource_path.'search'), compact('bundle'));
    }

}
