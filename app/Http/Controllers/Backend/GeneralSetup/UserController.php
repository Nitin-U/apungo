<?php

namespace App\Http\Controllers\Backend\GeneralSetup;


use App\Http\Controllers\Base\BaseController;
use App\Http\Requests\Backend\UserRequest;
use App\Models\Backend\User;
use App\Services\UserService;
use App\Traits\ControllerTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends BaseController
{
    use ControllerTrait;
    protected string $module            = BACKEND;
    protected string $route_name        = BACKEND.'general_setup.user_management.';
    protected string $resource_path     = BACKEND.'general_setup.user_management.';
    protected string $page              = 'User';
    protected string $folder_name       = 'user';
    protected string $page_title, $page_method, $image_path;
    protected object $model;
    private UserService $userService;


    public function __construct(UserService $userService)
    {
        $this->model        = new User();
        $this->userService  = $userService;
        $this->image_path   = public_path(DIRECTORY_SEPARATOR.'storage'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
    }


    public function getDataForDataTable(Request $request)
    {
        return $this->userService->getDataForDatatable($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request)
    {
        DB::beginTransaction();
        try {
            $request->request->add(['password' => bcrypt($request['password_input']) ]);

            $request->request->add(['password',]);
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'200','200');
                $request->request->add(['image'=>$image_name]);
            }
            if($request->hasFile('cover_image')){
                $image_name = $this->uploadImage($request->file('cover_image'),'2000','850');
                $request->request->add(['cover'=>$image_name]);
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


    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UserRequest $request, $id)
    {
        $bundle['row']       = $this->model->find($id);

        DB::beginTransaction();
        try {
            if($request->filled('password_input')) {
                $request->request->add(['password' => bcrypt($request->input('password_input'))]);
            }
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'),'200','200');
                $request->request->add(['image'=>$image_name]);
            }
            if($request->hasFile('cover_image')){
                $image_name = $this->uploadImage($request->file('cover_image'),'2000','850');
                $request->request->add(['cover'=>$image_name]);
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


    public function removeTrash(Request $request, $id)
    {
        $bundle['row']       = $this->model->withTrashed()->find($id);
        DB::beginTransaction();
        try {
            $this->deleteImage($bundle['row']->image);
            $this->deleteImage($bundle['row']->cover);
            $bundle['row']->forceDelete();

            Session::flash(SUCCESS,$this->page.' was removed successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.' was not removed. Something went wrong.');
        }

        return redirect()->route($this->route_name.TRASH);
    }

    public function statusUpdate(){

        $bundle['row']       = $this->model->find(request()->id);
        DB::beginTransaction();
        try {
            $bundle['row']->update(request()->all());
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.' was not updated. Something went wrong.');
        }
        return response()->json(['id'=>$bundle['row']->id,'status'=>$bundle['row']->status]);
    }
}
