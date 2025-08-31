<?php

namespace App\Http\Controllers\Backend\GeneralSetup;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Backend\GeneralSetup\ServiceRequest;
use App\Models\Service;
use App\Services\ServiceService;
use App\Traits\ControllerTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServiceController extends BaseController
{
    use ControllerTrait;

    protected string $module        = BACKEND;
    protected string $route_name    = BACKEND.'general_setup.service_management.';
    protected string $resource_path = BACKEND.'general_setup.service_management.';
    protected string $page          = 'Service';
    protected string $folder_name   = 'service';
    protected string $page_title, $page_method;
    protected object $model;
    private ServiceService $serviceService;

    public function __construct(ServiceService $serviceService)
    {
        $this->model         = new Service();
        $this->serviceService = $serviceService;
    }

    public function getDataForDataTable(Request $request)
    {
        return $this->serviceService->getDataForDatatable($request);
    }

    public function store(ServiceRequest $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id ]);

            $this->model->create($request->all());
            Session::flash(SUCCESS, $this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            Session::flash(ERROR, $this->page.' was not created. Something went wrong.');
        }

        return response()->json(route($this->route_name.INDEX));
    }

    public function update(ServiceRequest $request, $id): JsonResponse
    {
        $bundle['row'] = $this->model->find($id);

        DB::beginTransaction();
        try {
            $request->request->add(['updated_by' => auth()->user()->id ]);

            $bundle['row']->update($request->all());
            Session::flash(SUCCESS, $this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash(ERROR, $this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->route_name.INDEX));
    }

    public function removeTrash(Request $request, $id)
    {
        $bundle['row'] = $this->model->withTrashed()->find($id);

        DB::beginTransaction();
        try {
            $bundle['row']->forceDelete();
            Session::flash(SUCCESS, $this->page.' was removed permanently');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash(ERROR, $this->page.' was not removed. Something went wrong.');
        }

        return redirect()->route($this->route_name.TRASH);
    }

    public function statusUpdate()
    {
        $bundle['row'] = $this->model->find(request()->id);

        DB::beginTransaction();
        try {
            $bundle['row']->update(request()->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash(ERROR, $this->page.' status was not updated. Something went wrong.');
        }

        return response()->json(['id' => $bundle['row']->id, 'status' => $bundle['row']->status]);
    }
}
