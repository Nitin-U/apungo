<?php

namespace App\Services;

use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ServiceService
{
    protected string $module     = BACKEND;
    protected string $route_name = 'backend.general_setup.service_management.';
    private DataTables $dataTables;
    private Service $model;

    public function __construct(DataTables $dataTables)
    {
        $this->model      = new Service();
        $this->dataTables = $dataTables;
    }

    public function getDataForDatatable(Request $request)
    {
        $query = $this->model->query()->orderBy('created_at', 'desc');

        return $this->dataTables->eloquent($query)
            ->editColumn('status', function ($item) {
                $components = [
                    'id'         => $item->id,
                    'status'     => $item->status,
                    'route_name' => $this->route_name,
                ];
                return view($this->module.'includes.status', compact('components'));
            })
            ->editColumn('action', function ($item) {
                $components = [
                    'id'         => $item->id,
                    'route_name' => $this->route_name,
                ];
                return view($this->module.'includes.dataTable_action', compact('components'));
            })
            ->rawColumns(['status', 'action'])
            ->addIndexColumn()
            ->make(true);
    }
}