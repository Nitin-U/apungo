<?php

namespace App\Services;

use App\Models\Backend\User;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VendorPendingService
{
    protected string $module        = BACKEND;
    protected string $route_name    = 'backend.general_setup.vendor_pending.';
    private DataTables $dataTables;
    private Vendor $vendorModel;
    private User $userModel;

    public function __construct(DataTables $dataTables)
    {
        $this->vendorModel = new Vendor();
        $this->userModel   = new User();
        $this->dataTables = $dataTables;
    }

    public function getDataForDatatable(Request $request)
    {
        // Build query FIRST
        $query = $this->vendorModel
            ->with(['user:id,name,contact,status,vendor_id']) // eager load only needed fields
            ->whereHas('user', function ($q) {
                $q->where('user_type', 'vendor')
                ->where('status', 0); // only INACTIVE users
            })
            ->orderBy('created_at', 'desc');

        // THEN return the DataTable
        return $this->dataTables->eloquent($query)
            ->editColumn('fullname', fn($item) => $item->user->name ?? '-')
            ->editColumn('contact', fn($item) => $item->user->contact ?? '-')
            ->editColumn('status', function ($item) {
                // Use the same status blade as in other classes
                $components = [
                    'id'         => $item->user->id ?? $item->id,
                    'status'     => $item->user->status ?? 0,
                    'route_name' => $this->route_name,
                ];
                return view($this->module.'includes.status', compact('components'));
            })
            ->editColumn('title', fn($item) => $item->title ?? '-')
            ->editColumn('verified', fn($item) => $item->verified ? 'Yes' : 'No')
            ->editColumn('experience', fn($item) => $item->experience ?? '-')
            ->editColumn('email', fn($item) => $item->email ?? '-')
            ->editColumn('image', function ($item) {
                $components = [
                    'image' => $item->image ?? null,
                    'id'    => $item->id
                ];
                return view($this->module.'includes.image', compact('components'));
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
