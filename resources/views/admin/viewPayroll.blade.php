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
                        <h4 class="page-title">Agronomist</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agronomist</a></li>
                            <li class="active">Agronomist Accounts</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- .row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box"></div>
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
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Sharon Cherutich <small class="text-success">online</small></span></a>
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
@section('scripts')

@endsection
