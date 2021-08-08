<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view(){


        $data['allData']=Category::all();


        return view ('backend.setup.category.view-category',$data);


    }

    public function add(){

        return view('backend.setup.category.add-category');
    }

    public function store(Request $request){
        $this->validate($request,[

            'name'=>'required|unique:categories,name',
        ]);

        $data =new Category();
        $data->name=$request->name;

        $data->save();
        session()->flash('success',' Data update success');
        return redirect()->route('setups.category.view');
    }

    public function edit($id){

        $editData=Category::find($id);
        return view('backend.setup.category.add-category',compact('editData'));
    }


    public function update(Request $request,$id){

        $data =Category::find($id);
        $this->validate($request,[

            'name'=>'required|unique:categories,name,'.$data->id
        ]);


        $data->name=$request->name;

        $data->save();
        session()->flash('success',' Year update success');
        return redirect()->route('setups.category.view');

    }


}


