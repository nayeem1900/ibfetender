<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Tender_info;
use Illuminate\Http\Request;

class TenderinfoController extends Controller
{
    public function view(){


        $data['allData']=Tender_info::all();


        return view ('backend.setup.tendername.view-tender-name',$data);


    }

    public function add(){

        return view('backend.setup.tendername.add-tendername');
    }

    public function store(Request $request){
        $this->validate($request,[

            'tender_name'=>'required|unique:tender_infos,tender_name'
        ]);

        $data =new Tender_info();
        $data->tender_name=$request->tender_name;
        $data->tender_open_date=$request->tender_open_date;
        $data->tender_close_date=$request->tender_close_date;

        $data->save();
        session()->flash('success',' Data update success');
        return redirect()->route('setups.tendername.view');
    }

    public function edit($id){

        $editData=Tender_info::find($id);
        return view('backend.setup.tendername.add-tendername',compact('editData'));
    }


    public function update(Request $request,$id){

        $data =Tender_info::find($id);
        $this->validate($request,[

            'tender_name'=>'required|unique:tender_infos,tender_name,'.$data->id
        ]);


        $data->tender_name=$request->tender_name;
        $data->tender_open_date=$request->tender_open_date;
        $data->tender_close_date=$request->tender_close_date;
        $data->save();
        session()->flash('success',' Tender Name update success');
        return redirect()->route('setups.tendername.view');

    }
}

