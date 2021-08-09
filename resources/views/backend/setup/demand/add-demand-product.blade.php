@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Add Demand</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Demand</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->

                <!-- /.row -->
                <!-- Main row -->
                <div class="row" >
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->


                        <div class="card">
                            <div class="card-header">

                                @if(isset($editData))
                                    <h3> Edit Product
                                        @else
                                            Add Product
                                        @endif

                                        <a class="btn btn-success float-right btn-sm" href="{{route('setups.demand.view')}}"><i class="fa fa-list"></i>Demand List</a>
                                    </h3>


                            </div><!-- /.card-header -->
                            <div class="card-body" >

                                <form method="post" action="{{(@$editData)?route('setups.demand.update',$editData->id):route('setups.demand.store')}}" >
                                    @csrf



                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Category <font style="color: red">*</font></label>
                                            <select name="category_id" id="category_id" class="form-control form-control-sm">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"{{(@$editData->category_id==$category->id)?"selected":""}}>{{$category->name}} </option>

                                                @endforeach

                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label>Product Name <font style="color: red">*</font></label>
                                            <select name="product_id" id="product_id" class="form-control form-control-sm">
                                                <option value="">Select Product</option>



                                            </select>

                                        </div>
                                        <div class="col-md-4">
                                            <label>Tender Name <font style="color: red">*</font></label>
                                            <select name="tender_id" class="form-control form-control-sm">
                                                <option value="">Select Tender</option>
                                                @foreach($tenders as $tender)
                                                   <option value="{{$tender->id}}">{{$tender->tender_name}}</option>

                                                @endforeach

                                            </select>

                                        </div>


       {{-- 11 no 14.44 video--}}

                                        <div class="col-md-4 ">
                                            <label>Proposed Model Name</label>

                                            <input type="text" name="p_model" value="{{@$editData->name}}" class="form-control"id="name">
                                            <font style="color:red">{{($errors->has('p_model'))?($errors->first('p_model')):''}}</font>

                                        </div>
                                        <div class="col-md-4 ">
                                            <label>Proposed Brand Name</label>

                                            <input type="text" name="p_brand" value="{{@$editData->name}}" class="form-control"id="name">
                                            <font style="color:red">{{($errors->has('p_brand'))?($errors->first('p_brand')):''}}</font>

                                        </div>
                                        <div class="col-md-4 ">
                                            <label>Proposed Orgin Name</label>

                                            <input type="text" name="p_orgin" value="{{@$editData->name}}" class="form-control"id="name">
                                            <font style="color:red">{{($errors->has('p_orgin'))?($errors->first('p_orgin')):''}}</font>

                                        </div>
                                        <div class="col-md-4 ">
                                            <label>Demand Quantity</label>

                                            <input type="text" name="p_quantity" value="{{@$editData->name}}" class="form-control"id="name">
                                            <font style="color:red">{{($errors->has('p_quantity'))?($errors->first('p_quantity')):''}}</font>

                                        </div>


                                    </div>


{{--<div class="form-group col-md-2" style="padding-top:30px;">

    <a class="btn btn-primary addeventmore"><i class="fa fa-plus-circle"></i>Add Item</a>

</div>--}}

                                    <br>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-4 ">
                                            <button type="submit" class="btn btn-primary">

                                                {{(@$editData)?'Update':'Submit'}}

                                            </button>

                                        </div>
                                    </div>

                                </form>


                            </div><!-- /.card-body -->
                        </div>



                    </section>

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>


<script type="text/javascript">

$(function () {
    $(document).on('change','#category_id', function () {
        var category_id=$(this).val();

        $.ajax({
url:"{{route('get-product')}}",
            type:"GET",
            data:{category_id:category_id},
            success:function (data) {
                var html='<option value="">Select Product </option>'
                $.each(data,function (key,v) {
                    html +='<option value="'+v.id+'">'+v.name+'</option>';
                    
                });
                $('#product_id').html(html);
            }
        });
    });
});
</script>

    <script type="text/javascript">

        $(function () {
            $(document).on('change','#product_id', function () {
                var product_id=$(this).val();

                $.ajax({
                    url:"{{route('get-unit')}}",
                    type:"GET",
                    data:{product_id:product_id},
                    success:function (data) {
                        var html='<option value="">Select Unit </option>'
                        $.each(data,function (key,v) {
                            html +='<option value="'+v.id+'">'+v.name+'</option>';

                        });
                        $('#unit_id').html(html);
                    }
                });
            });
        });
    </script>


@endsection