<?php

namespace App\Http\Controllers;

use App\Business\Admin\Role;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class Controller extends BaseController{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setFilters(Request $request){
        session( $request->except(['_method','_token']) );
        return redirect()->back();
    }

    protected function getFilterValues(){
        $institution_default = auth()->user()->id;
        /*
         if (auth()->user()->hasRole(Role::ADMIN_ROLE)){
            $institution_default = '';
        }*/

        if (Gate::allows('filter-institutions')) {
            $institution_default = '';
        }
        $values = [
            'stations_filter_institution' => session()->get('stations_filter_institution', $institution_default),
            'stations_filter_capacity' => session()->get('stations_filter_capacity',''),
            'stations_filter_ethernet' => session()->get('stations_filter_ethernet',''),
            'stations_filter_confweb' => session()->get('stations_filter_confweb',''),
        ];
        session($values);  // set values again
        return $values;
    }

}
