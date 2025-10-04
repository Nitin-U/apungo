<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Base\BaseController;
use Illuminate\Contracts\Support\Renderable;

class HomePageController extends BaseController
{
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

}
