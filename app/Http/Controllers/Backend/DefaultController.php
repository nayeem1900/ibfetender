<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Payorder;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Auth;
use App\Model\Supplier;
use App\Model\Category;
use App\Model\Product;
use App\Model\Unit;
use PDF;
use App\Model\Purchase;






class DefaultController extends Controller
{
public function getcategory(Request $request){

    $supplier_id=$request->supplier_id;

  /*  $allcategory=Product::with(['category'])-> select('category_id')->where($supplier_id)->where('supplier_id',$supplier_id)->groupBy('category_id')->get();

    return response()->json($allcategory);*/

  $allcategory=Product::where('supplier_id',$supplier_id)->get();
    dd($allcategory);
}

    public function getsupplier(Request $request){

        $year_id=$request->year_id;
        $tendername_id=$request->tendername_id;
        $allData=Payorder::with(['supplier'])->where('year_id',$year_id)->where('tendername_id',$tendername_id)->get();
        return response()->json($allData);

    }


public function getProduct(Request $request){

/*$category_id=$request->category_id;
$allproduct=Product::with(['product'])->select('product_id')->where('category_id',$category_id)->groupBy('product_id')->get();
return response()->json($allproduct);*/
/*dd("ok");*/
$category_id=$request->category_id;
$allproduct=Product::where('category_id',$category_id)->get();
return response()->json($allproduct);
}



}
