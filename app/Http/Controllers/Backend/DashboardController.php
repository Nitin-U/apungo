<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Models\Backend\Menu;
use App\Models\Backend\Setting;
use App\Models\Backend\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{
    protected string $module           = BACKEND;
    protected string $route_name       = BACKEND;
    protected string $resource_path    = BACKEND;
    protected string $page             = 'Dashboard';
    protected object $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user           = new User();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $bundle                   = [];
        $bundle['all_users']      = $this->user->take(4)->get();

        return view($this->loadResource($this->resource_path.'dashboard'), compact('bundle'));
    }

    public function filemanager()
    {
        return view($this->resource_path.'filemanager.index');
    }


    public function errorPage()
    {
        $bundle               = [];
        return view($this->loadResource($this->resource_path.'errors.404'), compact('bundle'));
    }

}
