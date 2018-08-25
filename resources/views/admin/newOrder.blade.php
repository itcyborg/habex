@extends('layouts.sys')
@section('content')
<div id="wrapper">
    @include('layouts.header')
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3> </div>
                <div class="user-profile">
                </div>
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{url('/admin')}}" class="waves-effect">
                            <i data-icon="7" class="mdi mdi-av-timer fa-fw"></i>
                            <span class="hide-menu">Dashboard </span>
                        </a>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="/" class="mdi mdi-account-multiple"></i><span class="hide-menu"> Farmers<span class="fa arrow"></span><span class="label label-rouded label-purple pull-right"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('/admin/farmer/add')}}"><i data-icon=")" class="mdi mdi-account-plus"></i><span class="hide-menu"> New Farmer </span></a></li>
                            <li><a href="{{url('/admin/farmers')}}"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> Farmers Accounts </span></a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="" class="mdi mdi-account-multiple"></i><span class="hide-menu"> Agronomists<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/admin/agronomist/add')}}">
                                    <i data-icon="/" class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu"> New Agronomist </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/agronomists')}}">
                                    <i data-icon="7" class="mdi mdi-account-multiple"></i>
                                    <span class="hide-menu"> Agronomists Accounts </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('/admin/farminfo')}}" class="waves-effect">
                            <i data-icon="" class="mdi mdi-pine-tree"></i>
                            <span class="hide-menu"> Farm Info </span>
                        </a>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="" class="mdi mdi-wallet"></i><span class="hide-menu"> Financials<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{url('/admin/order/add')}}"><i data-icon="/" class="fa fa-edit"></i><span class="hide-menu"> New Order</span></a> </li>
                            <li> <a href="{{url('/admin/orders')}}"><i data-icon="7" class="fa  fa-list"></i><span class="hide-menu"> Orders</span></a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="" class="mdi mdi-wallet"></i><span class="hide-menu"> Payroll<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{url('/admin/payroll/add')}}"><i data-icon="/" class="fa fa-edit"></i><span class="hide-menu"> New Payment</span></a> </li>
                            <li> <a href="{{url('/admin/payroll/all')}}"><i data-icon="7" class="fa  fa-list"></i><span class="hide-menu"> Payments</span></a> </li>
                        </ul>
                    </li>
                    <li> <a href="{{url('/admin/leave/all')}}" class="waves-effect">
                            <i data-icon="" class="mdi mdi-airplane-takeoff"></i>
                            <span class="hide-menu"> Leave Requests</span>
                        </a>
                    </li>

                    <li>
                        <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">New Order</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <a href="javascript: void(0);" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Financial</a></li>
                            <li class="active">New</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title">New Order</h3>
                            <form action="{{url('/admin/order/add')}}" method="post" id="orderForm">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="farmer">Farmer</label>
                                            <select name="farmer" id="farmer" class="form-control">
                                                <option value="">Select Farmer</option>
                                                @foreach($farmers as $farmer)
                                                    <option value="{{$farmer->id}}">{{$farmer->firstname}} {{$farmer->sirname}} (ID: {{$farmer->idnumber}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dueDate">Due Date</label>
                                            <input type="date" name="dueDate" id="dueDate" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group table-responsive">
                                        <table class="table table-condensed table-hover table-striped" id="itemsTable">
                                            <thead>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Unit Cost</th>
                                            <th>VAT</th>
                                            <th>Total</th>
                                            <th></th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <input type="text" class="form-control input-sm" name="description[]"
                                                           id="description">
                                                </td>
                                                <td>
                                                    <input type="number" name="quantity[]" id="quantity" class="form-control input-sm">
                                                </td>
                                                <td>
                                                    <input type="text" name="unitCost[]" id="unitCost" class="form-control input-sm">
                                                </td>
                                                <td>
                                                    <input type="text" name="vat[]" id="vat" class="form-control input-sm">
                                                </td>
                                                <td>
                                                    <span id="total">121</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-outline btn-sm" type="button" onclick="removeItem(this)"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-danger btn-sm btn-outline" type="button" onclick="removeAll()"><i class="fa fa-minus"></i> Remove All</button>
                                    <button class="btn btn-primary btn-sm btn-outline" type="button" onclick="addItem()"><i class="fa fa-plus"></i> Add Item</button>
                                    <button class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>
                                <li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>
                                <li><b>With Dark sidebar</b></li>
                                <br/>
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme working">12</a></li>
                            </ul>
                            <ul class="m-t-20 all-demos">
                                <li><b>Choose other demos</b></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/genu.jpg" alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small class="text-warning">Away</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/ritesh.jpg" alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/arijit.jpg" alt="user-img" class="img-circle"> <span>Arijit Sinh <small class="text-muted">Offline</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/govinda.jpg" alt="user-img" class="img-circle"> <span>Govinda Star <small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/hritik.jpg" alt="user-img" class="img-circle"> <span>John Abraham<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/john.jpg" alt="user-img" class="img-circle"> <span>Hritik Roshan<small class="text-success">online</small></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/pawandeep.jpg" alt="user-img" class="img-circle"> <span>Pwandeep rajan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in </footer>
        </div>
    <!-- /#page-wrapper -->
</div>
@endsection
@section('scripts')
    <script>
        let total=0;
        let rows=0;

        $(document).ready(function(){
            $('#orderForm').submit(function(e){
                e.preventDefault();
                let data=[];
                $('#itemsTable tbody').find('tr').each(function(i,k) {
                    let item = null,
                        quantity = 0,
                        unitCost = 0,
                        vat = 0;
                    var cells = $(this).find('td');
                    item = cells.eq(1).find('[name="description[]"]').val();
                    quantity = cells.eq(2).find('[name="quantity[]"]').val();
                    unitCost = cells.eq(3).find('[name="unitCost[]"]').val();
                    vat = cells.eq(4).find('[name="vat[]"]').val();
                    data.push(
                        {
                            'item': item,
                            'quantity': quantity,
                            'unitCost': unitCost,
                            'vat': vat
                        }
                    );
                });
                let farmer=$('#farmer').val();
                let duedate=$('#dueDate').val();
                $.ajax(
                    {
                        url:"{{url('/admin/order/add')}}",
                        type:'post',
                        dataType:'json',
                        data:{
                            '_token':'{{csrf_token()}}',
                            'farmer':farmer,
                            'duedate':duedate,
                            'items':data
                        },
                        success:function(data){
                            console.log(data);
                        }
                    }
                )
            });
        });

        rows=$('#itemsTable tbody tr').length;
        function addItem(){
            rows=$('#itemsTable tbody tr').length;
            $('#itemsTable tbody tr:last').
            after('<tr><td>'+(++rows)+'</td><td><input type="text" class="form-control input-sm" name="description[]" id="description"></td><td><input type="number" name="quantity[]" id="quantity" class="form-control input-sm"></td><td><input type="text" name="unitCost[]" id="unitCost" class="form-control input-sm"></td><td><input type="text" name="vat[]" id="vat" class="form-control input-sm"></td><td><span id="total">121</span></td><td><button class="btn btn-danger btn-outline btn-sm" type="button" onclick="removeItem(this)"><i class="fa fa-trash"></i></button></td></tr>');
        }

        function removeItem(row){
            if($('#itemsTable tbody tr').length>1) {
                row.parentElement.parentElement.remove();
            }
        }

        function removeAll(){
            if($('#itemsTable tbody tr').length>1){
                $('#itemsTable tbody tr').each(function(i,v){
                    if($('#itemsTable tbody tr').length>1) {
                        v.remove();
                    }
                });
            }
        }
    </script>
@endsection
