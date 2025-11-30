<?php

namespace App\Services;

use App\Models\Vendor;
use Illuminate\Http\JsonResponse;
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

    /**
     * @param Request $request
     * @return JsonResponse
     * @throws \Exception
     */
    public function getDataForDatatable(Request $request)
    {
        $query = $this->model->query()->whereHas('user', function($query) {
                        $query->where('user_type', 'vendor')
                              ->where('status', 1);
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
            ->editColumn('action', function ($item) {
                $components = [
                    'id'         => $item->id,
                    'route_name' => $this->route_name,
                ];
                return view($this->module.'.includes.dataTable_action', compact('components'));
            })
            ->rawColumns(['action','image'])
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * @param Request $request
     * @param $bundle
     * @return void
     */
    public function syncVendorServices(Request $request, $vendor){
        // Handle Vendor Services with pivot data
        $syncData = [];
        $services = $request->input('services', []);
        $rates    = $request->rate ?? [];
        $service_mode    = $request->service_mode ?? [];

        foreach ($services as $key=>$serviceId) {
            $syncData[$serviceId] = [
                'rate' => $rates[$serviceId] ?? 0,
                'service_mode'  => $service_mode[$serviceId] ?? 'physical',
            ];
        }

        if (!empty($syncData)) {
            $vendor->services()->sync($syncData);
        }
    }
}
