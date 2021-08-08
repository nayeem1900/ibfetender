<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function view(){


        $data['allData']=Unit::all();


        return view ('backend.setup.unit.view-unit',$data);


    }

    public function add(){

        return view('backend.setup.unit.add-unit');
    }

    public function store(Request $request){
        $this->validate($request,[

            'name'=>'required|unique:units,name',
        ]);

        $data =new Unit();
        $data->name=$request->name;

        $data->save();
        session()->flash('success',' Data update success');
        return redirect()->route('setups.unit.view');
    }

    public function edit($id){

        $editData=Unit::find($id);
        return view('backend.setup.unit.add-unit',compact('editData'));
    }


    public function update(Request $request,$id){

        $data =Unit::find($id);
        $this->validate($request,[

            'name'=>'required|unique:units,name,'.$data->id
        ]);


        $data->name=$request->name;

        $data->save();
        session()->flash('success',' Unit update success');
        return redirect()->route('setups.unit.view');

    }


}
