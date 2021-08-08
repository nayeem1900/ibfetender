<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Branch_name;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function view(){


        $data['allData']=Branch_name::all();


        return view ('backend.setup.branch.view-branch',$data);


    }

    public function add(){

        return view('backend.setup.branch.add-branch');
    }

    public function store(Request $request){
        $this->validate($request,[

            'name'=>'required|unique:branch_names,name',
        ]);

        $data =new Branch_name();
        $data->name=$request->name;

        $data->save();
        session()->flash('success',' Data Insert success');
        return redirect()->route('setups.branch.view');
    }

    public function edit($id){

        $editData=Branch_name::find($id);
        return view('backend.setup.unit.add-unit',compact('editData'));
    }


    public function update(Request $request,$id){

        $data =Branch_name::find($id);
        $this->validate($request,[

            'name'=>'required|unique:branch_names,name,'.$data->id
        ]);


        $data->name=$request->name;

        $data->save();
        session()->flash('success',' Unit update success');
        return redirect()->route('setups.unit.view');

    }

}
