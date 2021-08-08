<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Model\Category;

use App\Model\Demand_Product;
use App\Model\Product;
use App\Model\Tender_info;
use App\Model\Unit;
use Illuminate\Http\Request;

class DemandController extends Controller
{
    public function view()
    {


        $data['allData'] = Demand_Product::all();


        return view('backend.setup.demand.view-demand', $data);


    }

    public function add()
    {
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();
        $data['tenders'] = Tender_info::all();
        $data['products'] = Product::all();

        return view('backend.setup.demand.add-demand-product', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|unique:products,name',
        ]);

        $data = new Product();
        $data->name = $request->name;
        $data->unit_id = $request->unit_id;
        $data->category_id = $request->category_id;

        $data->save();
        session()->flash('success', ' Data Insert success');
        return redirect()->route('setups.product.view');
    }

    public function edit($id)
    {
        $data['categories'] = Category::all();
        $data['units'] = Unit::all();
        $data['editData'] = Product::find($id);
        return view('backend.setup.product.add-product', $data);
    }


    public function update(Request $request, $id)
    {

        $data = Product::find($id);
        $data->unit_id = $request->unit_id;
        $data->category_id = $request->category_id;
        $this->validate($request, [

            'name' => 'required|unique:products,name,' . $data->id
        ]);


        $data->name = $request->name;

        $data->save();
        session()->flash('success', ' Year update success');
        return redirect()->route('setups.product.view');


    }
}
