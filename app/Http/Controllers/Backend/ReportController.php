<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Stproduct;
use Auth;
use App\Model\Supplier;
use App\Model\Unit;
use App\User;
class ReportController extends Controller
{
    public function csr(){
        $id=Auth::user()->id;
        $data['categories']=Category::all();
        $data['stproducts']=Stproduct::select(
            "stproducts.id as stp_id",
            'tproducts.name as product_name',
            'stproducts.brand',
            'stproducts.orgin',
            'stproducts.unit',
            'stproducts.pack_size',
            'tproducts.total_qty as total_qty',
            'stproducts.total_price',
            'users.name as user_name',
            'users.organization'
        )
            ->where('stproducts.created_by', Auth::user()->id)
            ->join('tproducts', ['stproducts.tproduct_id' => 'tproducts.id'])
            ->join('users', ['users.id' => 'stproducts.created_by'])
            ->get();




        $data ['data']=Stproduct::with(['user_name','organization'])->where('student_id')->first();
            $pdf = PDF::loadView('backend/student/student_reg/student-details-pdf', $data);
            $pdf->SetProtection(['copy', 'print'], '', 'pass');
            return $pdf->stream('document.pdf');
        }

        /*return view('backend.report.comparision-pdf');*/

}
