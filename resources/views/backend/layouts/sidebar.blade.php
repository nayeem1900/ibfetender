


<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @if(Auth::user()->role=='Admin')
        <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage User
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('users.view')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>View User</p>
                    </a>
                </li>



            </ul>
        </li>
        @endif
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Manage Profile
                    <i class="fas fa-angle-left right"></i>

                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('profiles.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Your Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('profiles.password.view')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Change Your password</p>
                    </a>
                </li>



            </ul>
        </li>




{{--
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Suplier
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('suppliers.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>view supplier</p>
                        </a>
                    </li>




                </ul>
            </li>--}}
           {{-- <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Customer
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('customers.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>view customer</p>
                        </a>
                    </li>




                </ul>
            </li>--}}
            {{--<li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Units
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('units.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>view Units</p>
                        </a>
                    </li>




                </ul>
            </li>--}}

         {{--   <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Categories
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('category.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>view Categories</p>
                        </a>
                    </li>




                </ul>
            </li>--}}
{{--
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Products
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>view Products</p>
                        </a>
                    </li>




                </ul>
            </li>--}}
          {{--  <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Purchase
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('purchase.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>view purchase</p>
                        </a>
                    </li>


                </ul>
            </li>

--}}


            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Setup
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('setups.year.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Year</p>
                        </a>
                    </li>


                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('setups.unit.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Unit</p>
                        </a>
                    </li>


                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('setups.branch.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Branch Name</p>
                        </a>
                    </li>


                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('setups.category.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Category</p>
                        </a>
                    </li>


                </ul>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('setups.product.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product</p>
                        </a>
                    </li>


                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('setups.tendername.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Tender Name</p>
                        </a>
                    </li>


                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('setups.demand.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Product Demand</p>
                        </a>
                    </li>


                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('setups.payorder.add')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Payorder entry</p>
                        </a>
                    </li>


                </ul>

            </li>



            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Tender Suplier
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('tsuppliers.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>view Tender supplier</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('tsuppliers.draft.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>DraftTender supplier</p>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage TProducts
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('tproducts.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>view TProducts</p>
                        </a>
                    </li>




                </ul>
            </li>



           <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Report
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Report</p>
                        </a>
                    </li>




                </ul>
            </li>


            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Manage Tender
                        <i class="fas fa-angle-left right"></i>

                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('maintender1.view')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>view Tender Table</p>
                        </a>
                    </li>




                </ul>
            </li>

    </ul>
</nav>