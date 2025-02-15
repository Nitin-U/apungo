<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Backend\News\BlogRequest;
use App\Models\Backend\News\Blog;
use App\Models\Backend\News\BlogCategory;
use App\Traits\ControllerTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class BlogController extends BaseController
{
    use ControllerTrait;
    protected string $module            = BACKEND;
    protected string $route_name        = BACKEND.'news.blog.';
    protected string $resource_path     = BACKEND.'news.blog.';
    protected string $page              = 'Blog';
    protected string $folder_name       = 'blog';
    protected string $page_title, $page_method, $image_path;
    protected object $model;

    public function __construct()
    {
        $this->model            = new Blog();
        $this->image_path       = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function getBundle(): array
    {
        $bundle['categories'] = BlogCategory::active()->descending()->pluck('title','id');

        return $bundle;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param BlogRequest $request
     * @return JsonResponse
     */
    public function store(BlogRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['key' => $this->model->changeTokey($request['title'])]);
            $request->request->add(['created_by' => auth()->user()->id ]);
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'600','400');
                $request->request->add(['image'=>$image_name]);
            }

            $this->model->create($request->all());
            Session::flash(SUCCESS,$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->route_name.INDEX));
    }


    public function update(BlogRequest $request, $id)
    {
        $bundle['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['slug' => $this->model->changeTokey($request['title'])]);
            $request->request->add(['updated_by' => auth()->user()->id ]);

            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$bundle['row']->image,'600','400');
                $request->request->add(['image'=>$image_name]);
            }
            $bundle['row']->update($request->all());
            Session::flash(SUCCESS,$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->route_name.INDEX));
    }
}
