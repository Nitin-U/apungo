<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

trait Order {

    public function orderUpdate(Request $request)
    {
        $rows = $this->model->all();

        $message  = '';

        DB::beginTransaction();
        try {

            foreach ($rows as $row) {
                foreach ($request['order'] as $order) {
                    if ($order['id'] == $row->id) {
                        $row->order =  $order['position'];
                        $row->update();
                    }
                }
            }

            $message = ' order updated Successfully';
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            $message = ' order was not updated. Something went wrong.';
        }

        return response()->json(['message' =>$this->page. $message]);
    }


}
