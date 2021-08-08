<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Demand_product;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function view(){


        $data['allData']=Demand_product::all();


        return view ('backend.setup.demand.view-demand',$data);


    }

}
