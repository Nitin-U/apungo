<?php

namespace App\Http\Controllers\Backend\News;


use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Backend\News\BlogCategoryRequest;
use App\Models\Backend\News\BlogCategory;
use App\Traits\ControllerTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class BlogCategoryController extends BaseController
{
    use ControllerTrait;
    protected string $module            = BACKEND;
    protected string $route_name        = BACKEND.'news.basic_setup.category.';
    protected string $resource_path     = BACKEND.'news.basic_setup.category.';
    protected string $page              = 'Blog Category';
    protected string $folder_name       = 'category';
    protected string $page_title, $page_method, $image_path;
    protected object $model;


    public function __construct()
    {
        $this->model            = new BlogCategory();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param BlogCategoryRequest $request
     * @return JsonResponse
     */
    public function store(BlogCategoryRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['key' => $this->model->changeTokey($request['title'])]);
            $request->request->add(['created_by' => auth()->user()->id ]);

            $this->model->create($request->all());
            Session::flash(SUCCESS,$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->route_name.INDEX));
    }


    public function update(BlogCategoryRequest $request, $id)
    {
        $bundle['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['slug' => $this->model->changeTokey($request['title'])]);
            $request->request->add(['updated_by' => auth()->user()->id ]);
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
