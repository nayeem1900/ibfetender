<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Payorder;
use App\Model\Tendername;
use App\Model\Year;
use Illuminate\Http\Request;

class PayorderController extends Controller
{
    public function add()
    {

        $data['years'] = Year::orderBy('id','asc')->get();

        $data['tendernames'] = Tendername::all();


        return view('backend.setup.payorder.add-payorder', $data);


    }


    public function store(Request $request){

        $suppliercount=$request->supplier_id;
        if($suppliercount){

            for($i=0;$i<count($request->supplier_id);$i++){

                $data= New Payorder();
                $data->year_id=$request->year_id;
                $data->tendername_id=$request->tendername_id;


                $data->supplier_id=$request->supplier_id[$i];

                $data->payorder_name=$request->payorder_name[$i];
                $data->save();
            }
        }
        return redirect()->back()->with('success', "successfully Payorder Insert generate");
    }

}
