<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

trait Status {

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
