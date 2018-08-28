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
                <h3>
                    <span class="fa-fw open-close">
                        <i class="ti-close ti-menu"></i>
                    </span>
                    <span class="hide-menu">Navigation</span>
                </h3>
            </div>
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
                    <h4 class="page-title">Agronomist</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><a href="#">Agronomist</a></li>
                        <li class="active">New Agronomist</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <!--.row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <form action="{{url('/admin/agronomist/add')}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-body">
                                        <h3 class="box-title">Person Information</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Sir Name</label>
                                                    <input type="text" id="firstName" class="form-control" name="sirname" placeholder="Sir Name">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">First Name</label>
                                                    <input type="text" id="lastName" class="form-control" name="firstname" placeholder="First Name">

                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Last Name</label>
                                                    <input type="text" id="lastName" class="form-control" placeholder="Last Name" name="lastname">

                                                </div>
                                            </div>
                                
                                            
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <hr>
                                        <!--/span-->
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Email Address</label>
                                                    <input type="text" id="firstName" class="form-control" placeholder="Email" name="email">
                                                    <span class="help-block"> please fill in correct info.</span>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">ID Number</label>
                                                    <input type="text" id="lastName" class="form-control" name="idnumber" placeholder="ID Number">

                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile Number</label>
                                                    <input type="text" id="lastName" class="form-control" placeholder="0700889955" name="mobilenumber">

                                                </div>
                                            </div>
                                        </div>
                                            <!--/span-->
                                        <hr>
                                        <div class="row-fluid">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Agronomists Position</label>
                                                    <div>
                                                        <select class="form-control" name="position">
                                                        <option value="Project Lead Agronomist">Project Lead Agronomist</option>
                                                        <option value="County Head Agronomist">County Head Agronomist </option>
                                                        <option value="Agrinimist">Agronomist</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Assign Zone</label>
                                                    <div>
                                                        <select class="form-control" name="zone">
                                                            @foreach($counties as $county)
                                                                <option value="{{$county->county_name}}">{{$county->county_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>

                                    <div class="row">
                                        <div class="container-fluid">
                                            <h3 class="box-title">Payment Details</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="bankName">Bank Name</label>
                                                        <input type="text" id="#" class="form-control" placeholder="Bank Name" name="bankname">

                                                    </div>
                                                </div>
                                                <div class="col-md-3" id="#">
                                                    <div class="form-group">
                                                        <label for="#">Branch Name</label>
                                                        <input type="text" id="#" class="form-control" placeholder="Branch Name" name="branchname">

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Account Name</label>
                                                        <input type="text" id="lastName" class="form-control" placeholder="Account Name" name="accountname">

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="control-label">Account Number</label>
                                                        <input type="text" id="lastName" class="form-control" placeholder="Account Number" name="accountnumber">

                                                    </div>
                                                </div>
                                                <!--/span-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button class="btn btn-lg btn-primary pull-right"><i class="fa fa-save"></i> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--./row-->
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- /.row -->

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
                                <a href="javascript:void(0)"><img src="{{asset('sys/plugins/images/users/varun.jpg')}}" alt="user-img" class="img-circle"> <span>Sharon Cherutich <small class="text-success">online</small></span></a>
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
        <footer class="footer text-center"> 2018 &copy; Habex Agro designed by GTLabs</footer>
    </div>
    <!-- /#page-wrapper -->
</div>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="{{asset('sys/plugins/bower_components/select2/dist/js/select2.full.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#paymentoption').select2();
            $('#bankName').select2(
                {
                    tags:true,
                    placeholder :'Select Bank or enter new one'
                }
            );
            if($('#paymentoption').val()!=='bank'){
                $('#bankdetails').hide();
            }
            $('#paymentoption').on('change',function () {
                if($('#paymentoption').val()!=='bank'){
                    $('#bankdetails').hide();
                }else{
                    $('#bankdetails').show();
                }
            });
        });
    </script>
@endsection
