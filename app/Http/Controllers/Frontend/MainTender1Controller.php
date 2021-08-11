<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Tender_info;
use Illuminate\Http\Request;

class MainTender1Controller extends Controller
{
    public function view(){
        $data['allData']=Tender_info::where('status','1')->get();


        return view('frontend.main_tender1.view-maintender1',$data);
    }
    public function add(){


        return view('frontend.main_tender1.add-maintender1');

    }

}
