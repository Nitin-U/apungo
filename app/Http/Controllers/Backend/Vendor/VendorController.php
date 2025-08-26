<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Backend\VendorRequest;
use App\Models\Vendor;
use App\Services\VendorService;
use App\Traits\ControllerTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Backend\User;

class VendorController extends BaseController
{
    use ControllerTrait;

    protected string $module        = BACKEND;
    protected string $route_name    = BACKEND.'general_setup.vendor_management.';
    protected string $resource_path = BACKEND.'general_setup.vendor_management.';
    protected string $page          = 'Vendor';
    protected string $folder_name   = 'vendor';
    protected string $page_title, $page_method, $image_path;
    protected object $model;
    private VendorService $vendorService;

    public function __construct(VendorService $vendorService)
    {
        $this->model        = new Vendor();
        $this->vendorService = $vendorService;
        $this->image_path   = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }

    public function getDataForDataTable(Request $request)
    {
        return $this->vendorService->getDataForDatatable($request);
    }

    public function store(VendorRequest $request)
    {
        DB::beginTransaction();
        try {
            // handle vendor profile picture upload
            if ($request->hasFile('profile_picture')) {
                $image_name = $this->uploadImage($request->file('profile_picture'),'400','400');
                $request->merge(['profile_picture'=>$image_name]);
            }

            // 1. Create Vendor
            $vendor = $this->model->create($request->only([
                'profile_picture','title','about_me','experience',
                'rating','verified','availability','agreement'
            ]));

            // 2. Create linked User
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password_input ?? 'password123'),
                'contact' => $request->contact,
                'address' => $request->address,
                'user_type' => 'vendor',
                'vendor_id' => $vendor->id,
                'status' => $request->status,
            ];

            User::create($userData);

            Session::flash(SUCCESS,$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.' was not created. '.$e->getMessage());
        }

        return response()->json(route($this->route_name.INDEX));
    }

    public function update(VendorRequest $request, $id)
    {
        $vendor = $this->model->find($id);

        DB::beginTransaction();
        try {
            // profile picture update
            if ($request->hasFile('profile_picture')) {
                $image_name = $this->updateImage($request->file('profile_picture'), $vendor->profile_picture);
                $request->merge(['profile_picture'=>$image_name]);
            }

            // 1. Update Vendor
            $vendor->update($request->only([
                'profile_picture','title','about_me','experience',
                'rating','verified','availability','agreement'
            ]));

            // 2. Update linked User
            $user = User::where('vendor_id',$vendor->id)->first();
            if ($user) {
                $user->update([
                    'name'      => $request->name,
                    'email'     => $request->email,
                    'contact'   => $request->contact,
                    'address'   => $request->address,
                    'status'    => $request->verified ? 1 : ($request->status ?? $user->status),
                ]);

                if ($request->filled('password_input')) {
                    $user->update(['password'=>bcrypt($request->password_input)]);
                }
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
