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
                            <li class="breadcrumb-item active">Product Entry</li>
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
                                    <h3> Edit Fee Amount
                                        @else
                                            Add Product
                                        @endif

                                        <a class="btn btn-success float-right btn-sm" href=""><i class="fa fa-list"></i>View Product</a>
                                    </h3>


                            </div><!-- /.card-header -->
                            <div class="card-body" >

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>Deadline</th>
                                        <th>Tender Name</th>
                                        <th>Apply</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($allData as $key=>$etender)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{($etender->tender_open_date)}}</td>
                                            <td>{{($etender->tender_close_date)}}</td>
                                            <td>{{($etender->tender_name)}}</td>
                                            <td>
                                                <a class="btn btn-success  btn-sm" href="{{route('maintender1.add')}}"><i class="fa fa-sign-in"></i>Apply</a>

                                            </td>
                                            {{--<td>{{($etender->t_download)}}</td>--}}
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>





                            </div><!-- /.card-body -->
                        </div>



                    </section>

                </div>

            </div>
        </section>
        <!-- /.content -->
    </div>



    {{--<script>
    $(document).ready()(function () {

      $("#pdqty,#unit_p").keyup(function () {

          var qty_id=$(this).data('id');
          var x=number($("#pdqty").val());
          var x=number($("#unit_p").val());
          var total_p=x*y;
          $('#total_p').val(total_p);
      });

    });




    </script>--}}

    <script type="text/javascript">
        $(document).ready(function () {

            /*$( "#pdqty" ).change(function() {
             multiply();
             });
             */
            $( "#unit_p" ).change(function() {
                multiply();
            });

            function multiply() {



                var total_qty= $("#pdqty").val();
                var unit_price=$("#unit_p").val();

                var total_price=total_qty*unit_price;
                $("#total_p").val(total_price);


            }

        });


    </script>

    {{-- extra add item --}}

    <script type="text/javascript">




        $(document).ready(function(){



            //var no=0;
            //$('.tproduct_id').on('change',function(){
            $('body').on('change', '.tproduct_id', function() {
                var productid=$(this).val();
                var qty_id=$(this).data('id');
                //alert(qty_id);
                $.ajax({
                    type: "GET",
                    url: "<?= URL::to('show-items-qty'); ?>/" + productid ,
                    dataType: "JSON",
                    data: {}, //expect html to be returned
                    success: function (data) {
                        $("#"+qty_id).val(data);
                    }
                });
                //alert(productid);
            });
            var counter = 0;
            $(document).on("click",".addeventmore",function(){
                var qty_add_cls='pdqty_'+counter;
                $(".pdqty_id").attr('data-id',"pdqty_"+counter);
                $(".pdqty").attr('id','pdqty_'+counter);
                var whole_extra_item_add=$("#whole_extra_item_add").html();
                $(this).closest(".add_item").append(whole_extra_item_add);
                $("#"+qty_add_cls).removeClass('pdqty');
                counter++;
            });
            $(document).on("click",".removeeventmore",function(event){
                $(this).closest("#delete_whole_extra_item_add").remove();
                counter -= 1;
            });
        });


    </script>



    {{--validation--}}
    <script type="text/javascript">
        $(document).ready(function () {


            $('#myForm').validate({
                rules: {
                    "tproduct_id": {
                        required: true,
                    },
                    "brand": {
                        required: true,

                    },
                    "orgin": {
                        required: true,

                    },
                    "unit": {
                        required: true,

                    },
                    "pack_size": {
                        required: true,

                    },
                    "net_price": {
                        required: true,

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


    {{--product show--}}




@endsection