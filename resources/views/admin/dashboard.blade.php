@extends('layouts.sys')

@section('content')
    <div id="wrapper">
        <!-- Top Navigation -->
        @include('layouts.header')
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
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
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!--Charts -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">CROP INFO SUMMARY</h3>
                            <div id="cropinfo-donut-chart"></div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">REGISTERED FARMERS PER COUNTY</h3>
                            <div id="farmerinfo-donut-chart"></div>
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">CULTIVATED ACREAGE PER COUNTY</h3>
                            <div id="acreageinfo-donut-chart"></div>
                        </div>
                    </div>

                </div>
                <!-- .row -->


                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Crop Statistics</h3>
                            <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                            <div class="table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>County</th>
                                        <th>Registered Farmers</th>
                                        <th>Seedlings Issued</th>
                                        <th>Surviving Seedlings</th>
                                        <th>Dried Seedlings</th>
                                        <th>Replaced Seedlings</th>
                                        <th>% Suceess</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>County</th>
                                        <th>Registered Farmers</th>
                                        <th>Seedlings Issued</th>
                                        <th>Surviving Seedlings</th>
                                        <th>Dried Seedlings</th>
                                        <th>Replaced Seedlings</th>
                                        <th>% Suceess</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td>Uasin Gishu</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Elgeyo Marakwet</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Trans Nzoia</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Nandi</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Kericho</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>

                                    <tr>
                                        <td>Baringo</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                </div>
                <!-- .row -->

                <!-- .row -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service  <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; Habex Agro designed by GTLabs</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection

@section('scripts')
    <!--Morris JavaScript -->
    <script src="{{asset('sys/plugins/bower_components/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('sys/plugins/bower_components/morrisjs/morris.js')}}"></script>
    <script src="{{asset('sys/js/morris-data.js')}}"></script>



@endsection


