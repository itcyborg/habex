@extends('layouts.sys')
@section('styles')
    <link href="{{asset('sys/plugins/bower_components/dropify/dist/css/dropify.min.css')}}" rel="stylesheet">
    <link href="{{asset('sys/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
{{--    <link rel="stylesheet" href="{{asset('sys/plugins/bower_components/sweetalert2/sweetalert.css')}}">--}}
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
                        <a href="{{url('/agronomist')}}" class="waves-effect">
                            <i data-icon="7" class="mdi mdi-av-timer fa-fw"></i>
                            <span class="hide-menu">Dashboard </span>
                        </a>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="/" class="mdi mdi-account-multiple"></i><span class="hide-menu"> Farmers<span class="fa arrow"></span><span class="label label-rouded label-purple pull-right"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('/agronomist/farmer/add')}}"><i data-icon=")" class="mdi mdi-account-plus"></i><span class="hide-menu"> New Farmer </span></a></li>
                            <li><a href="{{url('/agronomist/farmers')}}"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> Farmers Accounts </span></a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('/agronomist/farminfo')}}" class="waves-effect">
                            <i data-icon="" class="mdi mdi-pine-tree"></i>
                            <span class="hide-menu"> Farm Info </span>
                        </a>
                    </li>
                    <li> <a href="{{url('/agronomist/leave/all')}}" class="waves-effect">
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
                        <h4 class="page-title">Farmer's Accounts</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Farmers</a></li>
                            <li class="active">Farmers Accounts</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                         <div class="white-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="box-title m-b-0">Farmer's Accounts</h3>
                                </div>

                                <div class="col-md-6">
                                    <select name="searchFarmer" id="searchFarmer" class="form-control">
                                        <option value="">Search for Farmer</option>
                                        @foreach($farmers as $farmer)
                                            <option value="{{$farmer->id}}">
                                                {{$farmer->sirname}} {{$farmer->lastname}} |id:
                                                {{$farmer->idnumber}}
                                            </option>
                                        @endforeach
                                    </select>
                               </div>   
                            </div>             
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            @if(session('status'))
                                <div class="alert alert-success">{{session('status')}}</div>
                            @endif
                            <h3 class="box-title">ALL FARMERS</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table" id="farmersTable">
                                                <thead>
                                                <tr>
                                                    <th width="70" class="text-center">#</th>
                                                    <th>NAME</th>
                                                    <th>EMAIL</th>
                                                    <th>ID NUMBER</th>
                                                    <th>MOBILE NUMBER</th>
                                                    <th width="300">ACTIONS</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($farmers as $farmer)
                                                    <tr>
                                                        <td class="text-center">{{$farmer->id}}</td>
                                                        <td>{{$farmer->sirname}}
                                                            {{$farmer->firstname}}
                                                            {{$farmer->lastname}}
                                                        </td>
                                                        <td>{{$farmer->email}}</td>
                                                        <td>{{$farmer->idnumber}}</td>
                                                        <td>{{$farmer->mobilenumber}}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-info btn-outline btn-sm m-r-5" onclick="addFarm({{$farmer->id}})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Farm">
                                                                <i class="mdi mdi-pine-tree"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-info btn-outline btn-sm m-r-20" data-toggle="tooltip" data-placement="top" title="" data-original-title="Upload Documents" onclick="upload({{$farmer->id}})">
                                                                <i class="ti-upload"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-outline btn-sm m-r-5"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Farmer" onclick="deleteFarmer({{$farmer->id}})">
                                                                <i class="ti-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
    <div id="addFarms">
        <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Add Farm</h4> </div>
                    <div class="modal-body">
                        <form action="{{url('/agronomist/farm/add')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <input type="text" name="farmerid" id="farmerid" hidden>
                                <div class="col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-wrapper collapse in" aria-expanded="true">
                                        <div class="panel-body">
                                            <div class="form-body">
                                                <h3 class="box-title">Farm Info</h3>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>County</label>
                                                            <select class="form-control" id="county" name="county">
                                                                <option>--Select your County--</option>
                                                                @foreach($counties as $county)
                                                                    <option value="{{$county->county_name}}">{{$county->county_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sub-County</label>
                                                            <select class="form-control" id="constituency" name="constituency">
                                                                <option>--Select your Sub-County--</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Ward</label>
                                                            <select class="form-control" id="ward" name="ward">
                                                                <option>--Select your Ward--</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location</label>
                                                            <input type="text" class="form-control" name="location" id="location">
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Latitude</label>
                                                                    <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Farm's Latitude">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Longitude</label>
                                                                    <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Farm's Longitude">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label>Elevation</label>
                                                                    <input type="text" class="form-control" name="elevation" id="elevation" placeholder="Elevation">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Seedlings Planted</label>
                                                                    <input type="number" class="form-control" placeholder="Number of trees" id="numberplanted" name="numberplanted">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Farm Size</label>
                                                                    <input type="text" id="farmsize" name="farmsize" class="form-control" placeholder="Farm Size">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="white-box">
                                                                <h3 class="box-title">Map of the Farm</h3>
                                                                <!--<div id="markermap" class="gmaps"></div>-->
                                                                <div>
                                                                    <hr>
                                                                    <div id="map" style="height: 400px;"></div>
                                                                    <br>
                                                                    <input class="btn btn-outline-primary" type="button" value="Drop Pin" onclick="dropPin()"> Drop a marker on the center of your map<br>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <button class="btn btn-primary"><i class="fa fa-save"></i> Add Farm</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
<div id="addUploads">
    <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Uploads</h4> </div>
                <div class="modal-body">
                    <form action="{{url('/agronomist/farmer/upload')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="text" name="farmerid" id="farmerid1" hidden>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-wrapper collapse in" aria-expanded="true">
                                        <div class="panel-body">
                                            <div class="form-body">
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                                        <div class="white-box">
                                                            <h3 class="box-title">Passport Photo</h3>
                                                            <input type="file" id="passport" name="passport" class="dropify" /> </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                                        <div class="white-box">
                                                            <h3 class="box-title">Contract Form</h3>
                                                            <input type="file" id="contractform" name="contractform" class="dropify" /> </div>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                                        <div class="white-box">
                                                            <h3 class="box-title">ID Scan-Front</h3>
                                                            <input type="file" id="idfront" name="idfront" class="dropify" /> </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                                        <div class="white-box">
                                                            <h3 class="box-title">ID Scan-Back</h3>
                                                            <input type="file" id="idback" name="idback" class="dropify" /> </div>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Upload Documents</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('sys/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
<!-- jQuery file upload -->
<script src="{{asset('sys/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{asset('sys/plugins/bower_components/sweetalert2/sweetalert.js')}}"></script>
<script>
    let farmerTable=null;
    $(document).ready(function(){
        $('.dropify').dropify();
        farmerTable=$('#farmersTable').dataTable();
        $.ajax({
            url:'{{url('/counties')}}',
            type:'get',
            dataType:'json',
            success:function(data){
                counties=data;
            }
        });
        $('#county').on('change',function(){
            let county=$(this).val();
            $.each(counties.counties,function(i,j){
                if(i===county){
                    let options='<option value="">Select Sub-county</option>';
                    $.each(j,function(k,v){
                        if(options.indexOf('<option value="'+v.name+'">'+v.name+'</option>')===-1){
                            options+='<option value="'+v.name+'">'+v.name+'</option>';
                        }
                    });
                    $('#constituency').html(options);
                }
            });
        });
        $('#constituency').on('change',function(){
            $.ajax({
                url:'{{url("/counties/ward/")}}',
                data:{
                    '_token':'{{csrf_token()}}',
                    'county':$('#county').val(),
                    'subcounty':$(this).val()
                },
                type:'post',
                success:function(data){
                    if(data){
                        let rows='<option value="">Select Ward</option>';
                        $.each(data,function(i,j){
                            rows+='<option value="'+j.ward+'">'+j.ward+'</option>';
                        });
                        $('#ward').html(rows);
                    }
                }
            });
        });
        $('#searchFarmer').on('change',function(){
            farmerTable._fnReDraw();
        });
    });
    let currentid=null;
    function addFarm(id) {
        currentid=id;
        $('#farmerid').val(id);
        $('#addFarms .modal').modal();
    }

    function upload(id){
        currentid=id;
        $('#farmerid1').val(id);
        $('#addUploads .modal').modal();
    }

    function deleteFarmer(id){
        swal({
            type:'warning',
            title:'Delete record',
            text:'Are you sure you want to delete the Farmer? This action cannot be undone.',
            showConfirmButton:true,
            showCancelButton:true,
            confirmButtonText:'Yes, Delete',
            confirmButtonColor:'red'
        }).then((result)=>{
            if(result.value){
                $.ajax({
                    url:'{{url("/agronomist/farmer/delete")}}/'+id,
                    type:'get',
                    dataType:'json',
                    success:function(data){
                        if(data.status){
                            swal({
                                type:'success',
                                title:'Success',
                                text:'Record deleted successfully'
                            });
                        }
                    }
                });
            }
        });
    }
    $.fn.dataTable.ext.search.push(
        function (settings, data, dataIndex) {
            if (settings.nTable.id != "farmersTable") return true;
            if ($('#searchFarmer').val() == "") {
                return true;
            }
            farmerid = $('#searchFarmer').val();
            d = data[0];
            if (farmerid == null) {
                return true;
            }
            if (farmerid===d) {
                return true;
            }
            return false;
        }
    );
</script>
@endsection
