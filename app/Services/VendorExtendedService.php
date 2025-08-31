<?php

namespace App\Services;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VendorExtendedService
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
        $query = $this->model->query()->whereHas('user', function($query) {
                        $query->where('user_type', 'vendor');
                    })->orderBy('created_at', 'desc');

        return $this->dataTables->eloquent($query)
            ->editColumn('fullname', function ($item) {
                return $item->user->name ?? '';
            })
            ->editColumn('contact', function ($item) {
                return $item->user->contact ?? '-';
            })
            ->editColumn('image', function ($item) {
                $components = [
                    'image'         => $item->user->image ?? null,
                    'id'         => $item->id
                ];
                return view($this->module.'includes.image', compact('components'));
            })
            ->editColumn('availability', function ($item) {
                $components = [
                    'availability'      => $item->availability ?? 0,
                ];
                return view($this->route_name.'includes.availability_display', compact('components'));
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
            ->rawColumns(['action','status','image'])
            ->addIndexColumn()
            ->make(true);
    }
}
