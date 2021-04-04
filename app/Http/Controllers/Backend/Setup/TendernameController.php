<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Tendername;
use Illuminate\Http\Request;

class TendernameController extends Controller
{
    public function view(){


        $data['allData']=Tendername::all();


        return view ('backend.setup.tender-name.view-tender-name',$data);


    }

    public function add(){

        return view('backend.setup.tender-name.add-tendername');
    }

    public function store(Request $request){
        $this->validate($request,[

            'name'=>'required|unique:tendernames,name',
        ]);

        $data =new Tendername();
        $data->name=$request->name;

        $data->save();
        session()->flash('success',' Data update success');
        return redirect()->route('setups.tendername.view');
    }

}
