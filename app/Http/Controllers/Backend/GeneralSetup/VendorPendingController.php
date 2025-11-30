<?php

namespace App\Http\Controllers\Backend\GeneralSetup;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Backend\GeneralSetup\VendorRequest;
use App\Models\Backend\User;
use App\Models\Service;
use App\Models\Vendor;
use App\Models\VendorService;
use App\Services\VendorPendingService;
use App\Traits\ControllerTrait;
use App\Traits\Status;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VendorPendingController extends BaseController
{
    use ControllerTrait;
    use Status;
    protected string $module        = BACKEND;
    protected string $route_name    = BACKEND.'general_setup.vendor_pending.';
    protected string $resource_path = BACKEND.'general_setup.vendor_pending.';
    protected string $page          = 'Vendor Pending';
    protected string $folder_name   = 'user';
    protected string $page_title, $page_method, $image_path;
    protected object $model;
    protected object $vendorService;
    protected object $vendor;
    private VendorPendingService $vendorPendingService;

    public function __construct(VendorPendingService $vendorPendingService)
    {
        $this->model                 = new User();
        $this->vendor                = new Vendor();
        $this->vendorService         = new VendorService();
        $this->vendorPendingService = $vendorPendingService;
        $this->image_path   = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function getBundle(): array
    {
        return [];
    }


    public function getDataForDataTable(Request $request)
    {
        return $this->vendorPendingService->getDataForDatatable($request);
    }
    
    public function edit($id)
    {
        $this->page_method  = EDIT;
        $this->page_title   = 'Edit '.$this->page;
        $bundle['row'] = $this->vendor->with(['user'])->find($id); // include user details
        $bundle['images'] = $bundle['row']->image ? [$bundle['row']->image] : [];
        $bundle['documents'] = $bundle['row']->documents()->get(); // get vendor documents

        return view($this->loadResource($this->resource_path.EDIT), compact('bundle'));
    }



    public function update(Request $request, $id)
    {
        $bundle['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->updateImage($request->file('image_input'),$bundle['row']->image);
                $request->request->add(['image'=>$image_name]);
            }

            $request->request->add(['updated_by' => auth()->user()->id ]);
            $bundle['row']->update($request->all());

            Session::flash(SUCCESS,$this->page.' was updated successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.' was not updated. Something went wrong.');
        }

        return response()->json(route($this->resource_path.INDEX));
    }
}
