<?php

namespace App\Http\Controllers\Frontend\Blog;

use App\Http\Controllers\Base\BaseController;
use App\Models\Backend\News\Blog;
use App\Models\Backend\News\BlogCategory;
use App\Traits\FrontendSearch;
use Illuminate\Contracts\Support\Renderable;

class BlogController extends BaseController
{
    use FrontendSearch;
    protected string $module        = FRONTEND;
    protected string $route_name    = FRONTEND.'blog.';
    protected string $resource_path = FRONTEND.'blog.';
    protected string $page          = 'Blog';
    protected string $folder_name   = 'blog';
    protected string $page_title, $page_method, $image_path;
    protected object $model;
    protected object $blogCategoryModel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model                = new Blog();
        $this->blogCategoryModel    = new BlogCategory();
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $this->page_method      = 'index';
        $this->page_title       = 'All '.$this->page;
        $data                   = $this->getBundle();
        $data['rows']           = $this->model->active()->descending()->paginate(4);

        if(!$data['rows']){
            abort(404);
        }
        return view($this->loadResource($this->resource_path.'index'), compact('data'));
    }


    public function getBundle(): array
    {
        $data['categories']     = $this->blogCategoryModel->active()->descending()->has('blogs')->withCount('blogs')->get();
        $data['latest']         = $this->model->active()->descending()->limit(4)->get();

        return $data;
    }

    public function show($slug)
    {

        $this->page_method      = 'show';
        $data                   = $this->getBundle();
        $data['row']            = $this->model->where('slug',$slug)->first();

        if(!$data['row']){
            abort(404);
        }

        $data['previous']       = $this->model->where('id', '<', $data['row']->id)->select('title','slug')->orderBy('id', 'desc')->first();
        $data['next']           = $this->model->where('id', '>', $data['row']->id)->select('title','slug')->orderBy('id', 'asc')->first();
        $this->page_title       = $data['row']->title  ?? $this->page.' Details';

        return view($this->loadResource($this->resource_path.'show'), compact('data'));
    }

    public function category($slug)
    {
        try {
            $this->page_method      = 'category';
            $data                   = $this->getBundle();
            $data['category']       = $this->blogCategoryModel->where('slug',$slug)->active()->first();
            $this->page_title       = $data['category']->title;
            $data['rows']           = $this->model->where('blog_category_id', $data['category']->id)->active()->descending()->paginate(4);
        } catch (\Exception $e) {
            abort(404);
        }

        return view($this->loadResource($this->resource_path.'category'), compact('data'));
    }

}
