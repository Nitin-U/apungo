<?php

namespace App\Services;

use App\Models\Backend\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class UserService {


    protected string $module        = BACKEND;
    protected string $base_route    = 'backend.user.user-management.';
    private DataTables $dataTables;
    private User $model;

    public function __construct(DataTables $dataTables)
    {
        $this->model        = new User();
        $this->dataTables = $dataTables;
    }

    public function getDataForDatatable(Request $request){

        $query = $this->model->query()->orderBy('created_at', 'desc');
        return $this->dataTables->eloquent($query)
            ->editColumn('status',function ($item){
                $params = [
                    'id'            => $item->id,
                    'status'        => $item->status,
                    'base_route'    => $this->base_route,
                ];
                return view($this->module.'includes.status', compact('params'));
            })
            ->editColumn('action',function ($item){
                $params = [
                    'id'            => $item->id,
                    'base_route'    => $this->base_route,
                ];
                return view($this->module.'.includes.dataTable_action', compact('params'));

            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
    }

}
