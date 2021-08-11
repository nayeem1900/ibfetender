<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Main_Tender1 extends Model
{
    public function category(){

        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function unit(){

        return $this->belongsTo(Unit::class,'unit_id','id');
    }
    public function branch(){

        return $this->belongsTo(Branch_name::class,'branch_id','id');
    }
    public function product(){

        return $this->belongsTo(Product::class,'product_id','id');

    }
    public function tender(){

        return $this->belongsTo(Tender_info::class,'tender_id','id');

    }
}
