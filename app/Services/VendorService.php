<?php

namespace App\Services;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VendorService
{
    protected string $module        = BACKEND;
    protected string $route_name    = 'backend.general_setup.vendor_management.';
    private DataTables $dataTables;
    private Vendor $model;

    public function __construct(DataTables $dataTables)
    {
        $this->model      = new Vendor();
        $this->dataTables = $dataTables;
    }

    public function getDataForDatatable(Request $request)
    {
        $query = $this->model->query()->orderBy('created_at', 'desc');

        return $this->dataTables->eloquent($query)
            ->editColumn('title', function ($item) {
                return $item->title ? 'Yes' : 'No';
            })
            ->editColumn('status', function ($item) {
                $components = [
                    'id'         => $item->id,
                    'status'     => $item->availability,
                    'route_name' => $this->route_name,
                ];
                return view($this->module.'includes.status', compact('components'));
            })
            ->editColumn('action', function ($item) {
                $components = [
                    'id'         => $item->id,
                    'route_name' => $this->route_name,
                ];
                return view($this->module.'.includes.dataTable_action', compact('components'));
            })
            ->rawColumns(['action','status'])
            ->addIndexColumn()
            ->make(true);
    }
}
