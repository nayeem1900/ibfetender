<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product_Demand extends Model
{
    public function category(){

        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function unit(){

        return $this->belongsTo(Unit::class,'unit_id','id');
    }

    public function products(){

        return $this->belongsTo(Product::class,'product_id','id');

    }
    public function tenders(){

        return $this->belongsTo(Tender_info::class,'tender_id','id');

    }
}
