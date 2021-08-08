@extends('backend.layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Tender name</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tender name</li>
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
                                    <h3> Edit Tender name
                                        @else
                                            Add Tender name
                                        @endif

                                        <a class="btn btn-success float-right btn-sm" href="{{route('setups.tendername.view')}}"><i class="fa fa-list"></i>Tender name list</a>
                                    </h3>


                            </div><!-- /.card-header -->
                            <div class="card-body" >



                                <form method="POST" action="{{(@$editData)?route('setups.tendername.update',$editData->id):route('setups.tendername.store')}}" >
                                    @csrf

                                    <div class="form-group row">
                                        <label>Tender Name</label>
                                        <div class="col-md-4">
                                            <input type="text" name="tender_name" value="{{@$editData->tender_name}}" class="form-control"  id="tender_name">
                                            <font style="color:red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tender_open_date">Tender Open<span style="color: red;font-weight: bold;">*</span></label>
                                        <input type="date" name="tender_open_date" id="tender_open_date"class="form-control" placeholder="Tender Oopen Date" value="{{@$editData['data']['tender_open_date']}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tender_close_date">Tender Close<span style="color: red;font-weight: bold;">*</span></label>
                                        <input type="date" name="tender_close_date" value="{{@$editData['data']['tender_close_date']}}" id="tender_close_date"class="form-control" placeholder="Tender Oopen Date">
                                    </div>


                                    <div class="form-group row mb-0">
                                        <div class="col-md-4 offset-md-4">
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