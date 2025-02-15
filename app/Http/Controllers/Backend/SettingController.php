<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Backend\SettingRequest;
use App\Models\Backend\Setting;
use App\Traits\ControllerTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class SettingController extends BaseController
{
    use ControllerTrait;

    protected string $module        = BACKEND;
    protected string $route_name    = BACKEND.'setting.';
    protected string $resource_path = BACKEND.'setting.';
    protected string $page          = 'Setting';
    protected string $folder_name   = 'setting';
    protected string $page_title, $page_method, $image_path, $file_path;
    protected object $model;


    public function __construct()
    {
        $this->model      = new Setting();
        $this->image_path = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
        $this->file_path   = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR);
    }

    public function index()
    {
        $this->page_method = INDEX;
        $this->page_title  = 'System '.$this->page;
        $bundle            = $this->getBundle();
        $bundle['row']     = $this->model->descending()->first();

        return view($this->loadResource($this->resource_path.INDEX), compact('bundle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SettingRequest $request
     * @return JsonResponse
     */
    public function store(SettingRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id]);
            $request->request->add(['status' => true]);

            if ($request->file('brochure_input')) {
                $file_name = $this->uploadFile($request->file('brochure_input'));
                $request->request->add(['brochure' => $file_name]);
            }

            if ($request->hasFile('logo_input')) {
                $image_name = $this->uploadImage($request->file('logo_input'));
                $request->request->add(['logo' => $image_name]);
            }
            if ($request->hasFile('white_logo_input')) {
                $image_name = $this->uploadImage($request->file('white_logo_input'));
                $request->request->add(['logo_white' => $image_name]);
            }
            if ($request->hasFile('favicon_input')) {
                $image_name = $this->uploadImage($request->file('favicon_input'));
                $request->request->add(['favicon' => $image_name]);
            }

            $this->model->create($request->all());

            Session::flash(SUCCESS, $this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR, $this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->route_name.INDEX));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param SettingRequest $request
     * @param int            $id
     * @return JsonResponse
     */
    public function update(SettingRequest $request, $id)
    {
        $bundle['row'] = $this->model->find($id);

        DB::beginTransaction();
        try {
            if ($request->hasFile('logo_input')) {
                $image_name = $this->updateImage($request->file('logo_input'), $bundle['row']->logo);
                $request->request->add(['logo' => $image_name]);
            }
            if ($request->hasFile('white_logo_input')) {
                $image_name = $this->updateImage($request->file('white_logo_input'), $bundle['row']->logo_white);
                $request->request->add(['logo_white' => $image_name]);
            }
            if ($request->hasFile('favicon_input')) {
                $image_name = $this->updateImage($request->file('favicon_input'), $bundle['row']->favicon);
                $request->request->add(['favicon' => $image_name]);
            }

            if ($request->file('brochure_input')) {
                $file_name = $this->uploadFile($request->file('brochure_input'));
                $request->request->add(['brochure' => $file_name]);
                if ($bundle['row'] && $bundle['row']->brochure) {
                    $this->deleteFile($bundle['row']->brochure);
                }
            }

            $request->request->add(['updated_by' => auth()->user()->id]);
            $request->request->add(['status' => true]);

            $bundle['row']->update($request->all());

            Session::flash(SUCCESS, $this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR, $this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->route_name.INDEX));
    }

    public function removeBrochure()
    {
        $bundle['row'] = $this->model->first();

        DB::beginTransaction();
        try {

            $bundle['row']->update(['brochure' => null]);

            if ($bundle['row'] && $bundle['row']->brochure) {
                $this->deleteFile($bundle['row']->brochure);
            }

            Session::flash(SUCCESS, $this->page.' was removed successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR, $this->page.'  was not removed. Something went wrong.');
        }

        return response()->json(route($this->route_name.INDEX));

    }
}
