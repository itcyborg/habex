@extends('layouts.sys')
@section('styles')
    <link rel="stylesheet" href="{{asset('sys/plugins/bower_components/select2/dist/css/select2.css')}}">
@endsection
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
                        <a href="{{url('/admin/cropinfo')}}" class="waves-effect">
                            <i data-icon="" class="mdi mdi-pine-tree"></i>
                            <span class="hide-menu"> Crop Info </span>
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
                        <h4 class="page-title">Crop Information</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Crop Information</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- .row -->

                <div class="row white-box">
                    <div class="col-md-6">


                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Search Farmer</label>
                        <select name="" id="farmer" class="form-control">
                            <option value="">Search for Farmer</option>
                            @foreach($farmers as $farmer)
                                <option value="{{$farmer->id}}">{{$farmer->sirname}} {{$farmer->firstname}} {{$farmer->lastname}} (ID: {{$farmer->idnumber}})</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row white-box" id="farmersInfo">
                    <div class="bg-title">
                        <div>Farmer's Information</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Farmer's Name</label>
                                <input type="text" id="farmerName" class="form-control" placeholder=""
                                ></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">ID Number</label>
                                <input type="text" id="idnumber" class="form-control" placeholder="">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Mobile Number</label>
                                <input type="text" id="mobilenumber" class="form-control" placeholder="">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Farmer's Code</label>
                                <input type="text" id="farmerCode" class="form-control" placeholder="">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->


                </div>

                <div class="row white-box" id="farms">
                    <div class="bg-title">
                        <div>Farms</div>
                    </div>
                    <div class="row">
                        <table class="table table-striped" id="farmsTable">
                            <thead>
                            <th>#</th>
                            <th>County</th>
                            <th>Farm Location</th>
                            <th>Farm Size</th>
                            <th>Seedlings Planted</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                {{--<div class="right-sidebar">--}}
                    {{--<div class="slimscrollright">--}}
                        {{--<div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>--}}
                        {{--<div class="r-panel-body">--}}
                            {{--<ul id="themecolors" class="m-t-20">--}}
                                {{--<li><b>With Light sidebar</b></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>--}}
                                {{--<li><b>With Dark sidebar</b></li>--}}
                                {{--<br/>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme working">12</a></li>--}}
                            {{--</ul>--}}
                            {{--<ul class="m-t-20 all-demos">--}}
                                {{--<li><b>Choose other demos</b></li>--}}
                            {{--</ul>--}}
                            {{--<ul class="m-t-20 chatonline">--}}
                                {{--<li><b>Chat option</b></li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Sharon Cherutich <small class="text-success">online</small></span></a>--}}
                                {{--</li>--}}

                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
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
    <script src="{{asset("sys/plugins/bower_components/select2/dist/js/select2.full.js")}}"></script>
    <script src="{{asset("sys/plugins/bower_components/blockUI/jquery.blockUI.js")}}"></script>
    <script>
        $(document).ready(function(){
            $('#farmer').select2(
                {
                    'width':'100%'
                }
            );
            var blocked=$('#farmersInfo,#farms').block({
                message: '<h4>Select a farmer first</h4>',
                css: {
                    border: '1px solid #fff'
                },
            });
            $('#farmer').on('change',function(){
                if($(this).val()!==""){
                    //ajax to get the rest of the data
                    $.ajax({
                        url: '{{url("/admin/farmer/search")}}',
                        type:'get',
                        data:{
                            'farmer':$(this).val(),
                        },
                        dataType:'json',
                        beforeSend:function(){
                            $('#farmersInfo,#farms').block({
                                message: '<h4><img src="{{asset('sys/plugins/images/busy.gif')}}" alt=""> Processing ...</h4>',
                                css: {
                                    border: '1px solid #fff'
                                },
                            });
                        },
                        success:function(data){
                            if(data.farmer){
                                $('#farmersInfo').unblock();
                                $('#farmerName').val(data.farmer.sirname+' '+data.farmer.firstname+' '+data.farmer.lastname).prop('readonly',true);
                                $('#idnumber').val(data.farmer.idnumber).prop('readonly',true);
                                $('#mobilenumber').val(data.farmer.mobilenumber).prop('readonly',true);
                                $('#farmerCode').val(data.farmer.id).prop('readonly',true);
                            }
                            if(data.farms.length>0){
                                var rows='';
                                $.each(data.farms,function(index,farm){
                                    rows+=
                                        '<tr>' +
                                            '<td>'+farm.id+'</td>' +
                                            '<td>'+farm.county+'</td>' +
                                            '<td>'+farm.constituency+'</td>' +
                                            '<td>'+farm.farmSize+'</td>' +
                                            '<td>'+farm.seedlingsPlanted+'</td>' +
                                        '</tr>';
                                });
                                $('#farmsTable').find('tbody').html(rows);
                                $('#farms').unblock();
                            }else{
                                $('#farms').block({
                                    message: '<h4>No Farms Found</h4>',
                                    css: {
                                        border: '1px solid #fff'
                                    },
                                });
                            }
                        },
                        error:function(data){
                            $('#farmersInfo,#farms').block({
                                message: '<h4>An Error Occured. Try again later.</h4>',
                                css: {
                                    border: '1px solid rgb(251, 150, 120)',
                                    backgroundColor: 'rgb(251, 150, 120)'
                                },
                            });
                            console.log(data);
                        }
                    });
                }else{
                    $('#farmersInfo,#farms').block({
                        message: '<h4>No Farmer Selected. Select a farmer first</h4>',
                        css: {
                            border: '1px solid #fff'
                        },
                    });
                }
            });
        });
    </script>
@endsection
