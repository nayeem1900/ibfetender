@extends('backend.layouts.master')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Manage Payorder Entry</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"> Entry</li>
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
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-12">
                        <!-- Custom tabs (Charts with tabs)-->


                        <div class="card">
                            <div class="card-header">
                                <h3>Search Criteria</h3>

                            </div><!-- /.card-header -->

                            <div class="card-body">

                                <form method="post" action="{{route('setups.payorder.store')}}" id="myForm">
                                    @csrf
                                    <div class="form-row">

                                        <div class="col-md-3">
                                            <label>Year <font style="color: red">*</font></label>
                                            <select name="year_id" id="year_id" class="form-control form-control-sm">
                                                <option value="">Select Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{$year->id}}">{{$year->name}} </option>

                                                @endforeach

                                            </select>

                                        </div>

                                        <div class="col-md-3">
                                            <label>Tender name <font style="color: red">*</font></label>
                                            <select name="tendername_id" id="tendername_id" class="form-control form-control-sm">
                                                <option value="">Select Tender name</option>
                                                @foreach($tendernames as $tendername)
                                                    <option value="{{$tendername->id}}">{{$tendername->name}} </option>

                                                @endforeach

                                            </select>

                                        </div>


                                        <div class="form-group col-md-3" style="padding-top:29px;">

                                            <a id="search"class="btn btn-primary btn-sm" name="search">Search</a>
                                        </div>

                                    </div><br/>
                                    <div class="row d-none" id="payorder-entry">
                                        <div class="col-md-12">
                                            <table class="table table-bordered table-striped dt-responsive" style="width: 100%">
                                                <thead>
                                                <tr>

                                                    <th>Supplier Name</th>
                                                    <th>Organization Name</th>
                                                    <th>Mobile NO</th>
                                                    <th>Payorder</th>
                                                </tr>
                                                </thead>
                                                <tbody id="payorder-entry-tr"></tbody>

                                            </table>
                                            <button type="submit" class="btn btn-success btn-sm">Submit</button>


                                        </div>

                                    </div>


                                </form>


                            </div>
                            <!-- /.card-body -->
                        </div>



                    </section>

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>




    <script type="text/javascript">
        $(document).on('click','#search',function () {

            var year_id=$('#year_id').val();
            var class_id=$('#tendername_id').val();

            $('.notifyjs-corner').html('');
            if(year_id==''){
                $.notify("Year required",{globalPosition:'top-right',className:'error'});
                return false;
            }
            if(tendername_id=='') {
                $.notify("Tender name required", {globalPosition: 'top-right', className: 'error'});
                return false;
            }


            $.ajax({
                url:"{{route('get-supplier')}}",
                type:"GET",
                data:{'year_id':year_id,'tendername_id':tendername_id},
                success:function (data){
                    $('#payorder-entry').removeClass('d-none');
                    var html='';
                    $.each(data,function (key,v) {
                        html+=
                            '<tr>'+

                            '<td>'+ v.supplier.name+ '</td>'+
                            '<td>'+ v.supplier.organization+ '</td>'+
                            '<td>'+ v.supplier.mobile+ '</td>'+

                            '<td><input type="text" class="form-control form-control-sm" name="payorder_name[]"> </td>'+
                            '</tr>';

                    });

                    html=$('#payorder-entry-tr').html(html);
                }
            });

        });

    </script>


    {{--<script type="text/javascript">
        $(function () {
            $(document).on('change','#class_id',function () {
                var class_id=$('#class_id').val();

                $.ajax({
                    url:"{{route('get-subject')}}",
                    type:"GET",
                    data:{class_id:class_id},
                    success :function (data) {
                        var html='<option value="">Select Subject</option>';

                        $.each(data,function (key,v) {
                            html +='<option value ="'+v.id+'">'+v.subject.name+'</option>';

                        });
                        $('#assign_subject_id').html(html);
                    }

                });

            });
        });

    </script>--}}



    <script type="text/javascript">
        $(document).ready(function () {


            $('#myForm').validate({
                rules: {

                    "payorder_name[]": {
                        required: true

                    }
                },


                messages: {


                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>



@endsection