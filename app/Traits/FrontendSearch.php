<?php

namespace App\Traits;

use App\Models\Vendor;
use Illuminate\Http\Request;

trait FrontendSearch {

    public function search(Request $request)
    {
        session()->forget(['rows']);
        $bundle                 = $this->getBundle();
        $bundle['location']     = $request['location'];
        $bundle['dates']        = $request['dates'];
        [$bundle['start_date'], $bundle['end_date']] = explode(' > ', $request['dates']);
        $bundle['service_mode'] = $request['service_mode'];

        $bundle['rows']         = Vendor::query()
                                  ->with(['services', 'user'])
                                  ->leftJoin('vendor_services', 'vendors.id', '=', 'vendor_services.vendor_id')
                                  ->selectRaw('vendors.*')
                                  ->whereRaw("NOT EXISTS (
                                        SELECT 1 FROM bookings
                                        WHERE bookings.vendor_id = vendors.id
                                        AND bookings.start_date <= ?
                                        AND bookings.end_date >= ?
                                    )", [$bundle['end_date'], $bundle['start_date']])
                                  ->groupBy('vendors.id')
                                  ->orderBy('vendors.created_at', 'desc');

        if($request['location']){
            $bundle['rows']->where('vendors.location', '=', $bundle['location']);
        }

        if($request['service_mode']){
            $bundle['rows']->where('vendor_services.service_mode', '=', $bundle['service_mode']);
        }

        $bundle['rows']           = $bundle['rows']->paginate(8);
        session(['rows' => $bundle['rows']]);
        return redirect()->route(FRONTEND.'search_vendor');
    }

}
