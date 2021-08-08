@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
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

                                        <a class="btn btn-success float-right btn-sm" href="{{route('setups.product.view')}}"><i class="fa fa-list"></i>Product List</a>
                                    </h3>


                            </div><!-- /.card-header -->
                            <div class="card-body" >




                              <form method="post" action="{{(@$editData)?route('setups.product.update',$editData->id):route('setups.product.store')}}" >
                                    @csrf

                                  <div class="row">
                                      <div class="col-md-4">
                                          <label>Category <font style="color: red">*</font></label>
                                          <select name="category_id" class="form-control form-control-sm">
                                              <option value="">Select Category</option>
                                              @foreach($categories as $category)
                                                  <option value="{{$category->id}}"{{(@$editData->category_id==$category->id)?"selected":""}}>{{$category->name}} </option>

                                              @endforeach

                                          </select>

                                      </div>

                                      <div class="col-md-4 ">
                                          <label>Product Name</label>

                                          <input type="text" name="name" value="{{@$editData->name}}" class="form-control"id="name">
                                          <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>

                                      </div>


                                      <div class="col-md-4">
                                          <label>Unit <font style="color: red">*</font></label>
                                          <select name="unit_id" class="form-control form-control-sm">
                                              <option value="">Select Unit</option>
                                              @foreach($units as $unit)
                                                  <option value="{{$unit->id}}"{{(@$editData->unit_id==$unit->id)?"selected":""}}>{{$unit->name}} </option>

                                              @endforeach

                                          </select>

                                      </div>


                                  </div>





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






@endsection