<?php

namespace App\Http\Controllers\Backend\GeneralSetup;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Backend\GeneralSetup\VendorRequest;
use App\Models\Backend\User;
use App\Models\Service;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Services\VendorExtendedService;
use App\Traits\ControllerTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VendorController extends BaseController
{
    use ControllerTrait;
    protected string $module        = BACKEND;
    protected string $route_name    = BACKEND.'general_setup.vendor_management.';
    protected string $resource_path = BACKEND.'general_setup.vendor_management.';
    protected string $page          = 'Vendor';
    protected string $folder_name   = 'user';
    protected string $page_title, $page_method, $image_path;
    protected object $model;
    protected object $vendorService;
    protected object $vendor;
    private VendorExtendedService $vendorExtendedService;

    public function __construct(VendorExtendedService $vendorExtendedService)
    {
        $this->model                 = new User();
        $this->vendor                = new Vendor();
        $this->vendorService         = new VendorService();
        $this->vendorExtendedService = $vendorExtendedService;
        $this->image_path   = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function getBundle(): array
    {
        $bundle['services'] = Service::active()->descending()->pluck('name','id');
        return $bundle;
    }


    public function getDataForDataTable(Request $request)
    {
        return $this->vendorExtendedService->getDataForDatatable($request);
    }

    public function store(VendorRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['created_by' => auth()->user()->id]);
            $request->request->add(['password' => bcrypt($request['password_input']) ]);
            $request->request->add(['user_type' => 'vendor']);
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'400','400');
                $request->request->add(['image'=>$image_name]);
            }


            $vendor = $this->vendor->create($request->except('name','image','password_input','password_input_confirmation','contact','address'));

            if($vendor){
                $request->request->add(['vendor_id' => $vendor->id]);
                // attach selected services to the bundle
                $vendor->services()->sync($request->input('services', []));
                $this->model->create($request->all());
            }

            Session::flash(SUCCESS,$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e->getMessage());
            Session::flash(ERROR,$this->page.' was not created. '.$e->getMessage());
        }

        return response()->json(route($this->route_name.INDEX));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit($id)
    {
        $this->page_method          = EDIT;
        $this->page_title           = 'Edit '.$this->page;
        $bundle                     = $this->getBundle();
        $bundle['row']              = $this->vendor->find($id);
        $bundle['vendor_services']  = $bundle['row']->services()->pluck('service_id')->toArray();

        return view($this->loadResource($this->resource_path.EDIT), compact('bundle'));
    }


    public function update(VendorRequest $request, $id)
    {
        $bundle['row']       = $this->vendor->find($id);
        $bundle['user']       = $this->model->find($bundle['row']->user->id);
        DB::beginTransaction();
        try {
            $request->request->add(['updated_by' => auth()->user()->id ]);
            if($request->filled('password_input')) {
                $request->request->add(['password' => bcrypt($request->input('password_input'))]);
            }
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'400','400');
                $request->request->add(['image'=>$image_name]);
            }

            $vendor = $bundle['row']->update($request->except('name','password_input','image','password_input_confirmation','contact','address'));
            if($vendor){
                $bundle['row']->services()->sync($request->input('services', []));
                $bundle['user']->update($request->all());
            }

            Session::flash(SUCCESS,$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.' was not updated. '.$e->getMessage());
        }

        return response()->json(route($this->route_name.INDEX));
    }

    public function removeTrash(Request $request, $id)
    {
        $bundle['row'] = $this->model->withTrashed()->find($id);

        DB::beginTransaction();
        try {
            if ($bundle['row']->profile_picture) {
                $this->deleteImage($bundle['row']->profile_picture);
            }
            $bundle['row']->forceDelete();

            Session::flash(SUCCESS,$this->page.' was removed successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.' was not removed. Something went wrong.');
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
            DB::rollback();
            Session::flash(ERROR,$this->page.' status update failed. Something went wrong.');
        }

        return response()->json(['id'=>$bundle['row']->id,'status'=>$bundle['row']->status]);
    }
}
