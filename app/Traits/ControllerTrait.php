<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait ControllerTrait {

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */

    public function index()
    {
        $this->page_method = INDEX;
        $this->page_title  = 'List '.$this->page;
        $bundle              = $this->getBundle();
        $bundle['row']       = $this->model->descending()->get();

        return view($this->loadResource($this->resource_path.INDEX), compact('bundle'));
    }

    public function getBundle(): array
    {
        return [];
    }

    public function create()
    {
        $this->page_method = CREATE;
        $this->page_title  = 'Create '.$this->page;
        $bundle            = [];

        return view($this->loadResource($this->resource_path.CREATE), compact('bundle'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            if($request->hasFile('image_input')){
                $image_name = $this->uploadImage($request->file('image_input'));
                $request->request->add(['image'=>$image_name]);
            }
            $request->request->add(['created_by' => auth()->user()->id ]);

            $this->model->create($request->all());
            Session::flash(SUCCESS,$this->page.' was created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.'  was not created. Something went wrong.');
        }

        return response()->json(route($this->resource_path.INDEX));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */

    public function show($id)
    {
        $this->page_method = SHOW;
        $this->page_title  = 'Show '.$this->page;
        $bundle            = [];

        return view($this->loadResource($this->resource_path.SHOW), compact('bundle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function edit($id)
    {
        $this->page_method  = EDIT;
        $this->page_title   = 'Edit '.$this->page;
        $bundle              = $this->getBundle();
        $bundle['row']       = $this->model->find($id);

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



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        // dd($this->model->find($id));
        try {
            DB::beginTransaction();
            $this->model->find($id)->forceDelete();
            DB::rollBack();

            //deletable without any child values
            $this->model->find($id)->delete();
            DB::commit();
            Session::flash(SUCCESS,$this->page.' was removed successfully');
        } catch (\Exception $e) {
            Session::flash(ERROR,$this->page.' was not removed as bundle is already in use.');
        }

        return response()->json(route($this->resource_path.INDEX));
    }



    public function trash()
    {
        $this->page_method = TRASH;
        $this->page_title  = 'Trash '.$this->page;
        $bundle              = [];
        $bundle['users']     = $this->model->onlyTrashed()->get();

        return view($this->loadResource($this->resource_path.TRASH), compact('bundle'));
    }

    public function restore(Request $request, $id)
    {

        DB::beginTransaction();
        try {
            $this->model->withTrashed()->find($id)->restore();

            Session::flash(SUCCESS,$this->page.' restored successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.' restored failed. Something went wrong.');
        }

        return redirect()->route($this->resource_path.INDEX);
    }

    public function removeTrash(Request $request, $id)
    {
        $bundle['row']       = $this->model->withTrashed()->find($id);
        DB::beginTransaction();
        try {
            if ($bundle['row']->image){
                $this->deleteImage($bundle['row']->image);
            }
            $bundle['row']->forceDelete();

            Session::flash(SUCCESS,$this->page.' was removed successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash(ERROR,$this->page.' was not removed. Something went wrong.');
        }

        return redirect()->route($this->resource_path.TRASH);
    }


}
