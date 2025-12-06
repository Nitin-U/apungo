<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Base\BaseController;
use Illuminate\Http\Request;
use App\Models\Backend\User;
use App\Models\Vendor;
use App\Models\VendorDocument;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CustomSignupController extends BaseController{
    protected string $module            = FRONTEND;
    protected string $route_name        = FRONTEND.'signup.';
    protected string $resource_path     = FRONTEND.'signup.';
    protected string $page              = 'Vendor';
    protected string $folder_name       = 'vendor';
    protected string $page_title, $page_method, $image_path;
    protected object $model;

    public function __construct()
    {
        $this->image_path   = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }
    public function signup(Request $request)
    {

        // Validate input
        $request->validate([
            'name'            => 'required|string|max:255',
            'email_signup'    => 'required|email|unique:users,email',
            'password_signup' => 'required|string|min:6',
            'experience'      => 'nullable|integer|min:0|max:80',
            // 'document'        => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120', // 5MB
        ]);

        // Use transaction to avoid partial saves
        DB::beginTransaction();
        try {
            // Step 1: Create User
            $user = User::create([
                'name'             => $request->name,
                'email'            => $request->email_signup,
                'password'         => Hash::make($request->password_signup),
                'status'           => 0, // inactive
                'user_type'        => 'vendor',
                'email_verified_at' => null,
            ]);

            // Step 2: Create Vendor linked to User
            $vendor = Vendor::create([
                'title'       => $request->name,
                'email'       => $request->email_signup,
                'experience'  => $request->experience ?? 0,
                'user_id'     => $user->id, // link user
                'verified'    => 0, // optional
                'created_by'  => auth()->id() ?? $user->id,
                'agreement'   => $request->has('agreement') ? 1 : 0,
            ]);

            $user->vendor_id = $vendor->id;
            $user->save();

            // Step 3: Save uploaded document if exists
            if ($request->hasFile('document')) {
                $image_name = $this->uploadImage($request->file('document'));
                $request->request->add(['document' => $image_name]);
                
                VendorDocument::create([
                    'vendor_id' => $vendor->id,
                    'file_path' => $image_name,
                    'type'      => $request->document_type,
                ]);
            }
            DB::commit();
            Session::flash(SUCCESS,$this->page.' was registered successfully. We will get back to you soon.');

        } catch (\Exception $e) {
            DB::rollBack();
            dd(vars: $e);
            Session::flash(ERROR,$this->page.'  was not registered. Something went wrong.');
        }

        return response()->json(data: route(FRONTEND.'home'));

    }
}