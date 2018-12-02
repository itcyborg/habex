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
    @include('layouts.sidebar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
        <style>
            .user-bg .overlay-box {
                background:#929bde;
            }
            .thumb-lg {
                height: 150px;
                width: 150px;
            }
        </style>
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
                                                        <th>FARMER'S CODE</th>
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
                                                            <td>{{$farmer->farmerscode}}</td>
                                                            <td>{{$farmer->idnumber}}</td>
                                                            <td>{{$farmer->mobilenumber}}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-info btn-outline btn-sm m-r-5" onclick="addFarm({{$farmer->id}})" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add Farm">
                                                                    <i class="mdi mdi-pine-tree"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-info btn-outline btn-sm m-r-10" data-toggle="tooltip" data-placement="top" title="" data-original-title="Upload Documents" onclick="upload({{$farmer->id}})">
                                                                    <i class="ti-upload"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-info btn-outline btn-sm m-r-10" onclick="Farmer.view({{$farmer->id}})" data-toggle="tooltip" data-placement="top" title="View Details">
                                                                    <i class="ti ti-file"></i>
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
                        <form action="{{url('/admin/farm/add')}}" method="post">
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
                    <form action="{{url('/admin/farmer/upload')}}" method="post" enctype="multipart/form-data">
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
<div id="viewFarmer">
    <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="viewFarmer" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="viewFarmer">Farmer Information</h4> </div>
                <div class="modal-body">
                    <div class="sttabs tabs-style-iconbox">
                        <nav>
                            <ul>
                                <li>
                                    <a href="#section-iconbox-1" class="sticon ti-clipboard">Personal Information</a>
                                </li>
                                <li>
                                    <a href="#section-iconbox-2" class="sticon fa fa-tree">Farm Information</a>
                                </li>
                                <li>
                                    <a href="#section-iconbox-3" class="sticon ti-money">Account Information</a>
                                </li>
                            </ul>
                        </nav>
                        <div class="content-wrap">
                            <section id="section-iconbox-1" class="content-current">
                                <div class="row p-10">
                                    <div class="user-bg">
                                        <img width="100%" alt="user" src="" class="passportpic">
                                        <div class="overlay-box">
                                            <div class="user-content">
                                                <a href="javascript:void(0)">
                                                    <img src="" class="thumb-lg img-rounded passportpic" alt="img">
                                                </a>
                                                <h4 class="text-white" id="name"></h4>
                                                <h5 class="text-white" id="email"></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-btm-box">
                                        <div class="col-md-4 col-sm-4 text-center">
                                            <p class="text-purple"><i class="fa fa-phone"></i></p>
                                            <h2 id="contact"></h2>
                                        </div>
                                        <div class="col-md-4 col-sm-4 text-center">
                                            <p class="text-blue"><i class="mdi mdi-account-card-details"></i></p>
                                            <h2 id="idnumber"></h2>
                                        </div>
                                        <div class="col-md-4 col-sm-4 text-center">
                                            <p class="text-danger"><i class="mdi mdi-barcode"></i></p>
                                            <h2 id="farmercode"></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-10">
                                    <div class="col-md-4">
                                        <img src="idfront" id="vidfront" class="img img-responsive img-rounded">
                                    </div>
                                    <div class="col-md-4">
                                        <img src="idback" id="vidback" class="img img-responsive img-rounded">
                                    </div>
                                    <div class="col-md-4">
                                        <p class="p-20">
                                            <a href="" class="btn btn-primary btn-lg" id="vcontract" target="_blank">
                                                <i class="fa fa-cloud-download"></i>
                                                Download Contract Form
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </section>
                            <section id="section-iconbox-2">
                                <div class="row p-10">
                                    <table class="table table-striped table-sm table-condensed table-box" id="vfarmTable">
                                        <thead>
                                            <th>#ID</th>
                                            <th>County</th>
                                            <th>Constituency</th>
                                            <th>Ward</th>
                                            <th>Location</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Elevation</th>
                                            <th>Seedlings Planted</th>
                                            <th>Farm Size</th>
                                            <th>Updated On</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </section>
                            <section id="section-iconbox-3">
                                <div class="row p-10">
                                    <button class="btn btn-info btn-sm pull-right collapsed" type="button" data-toggle="collapse" data-target="#accountInfo" aria-expanded="false" aria-controls="accountInfo">
                                        <i class="fa fa-edit"></i> Update Account Information
                                    </button>
                                </div>
                                <div class="row collapse jumbotron" id="accountInfo" style="height:0px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="paymentmodeu">Payment Mode</label>
                                                <select name="paymentmodeu" id="paymentmodeu" class="form-control">
                                                    <option value="">Select Payment Mode</option>
                                                    <option value="MPESA">M-PESA</option>
                                                    <option value="BANK">BANK</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="accountnameu">Account Name</label>
                                                <input type="text" class="form-control" id="accountnameu" name="accountnameu">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="accountnameu">Account Number</label>
                                                <input type="text" class="form-control" id="accountnumberu" name="accountnumberu">
                                            </div>
                                        </div>
                                        <div class="row m-t-20">
                                            <div class="col-md-6">
                                                <label for="banknameu">Bank Name</label>
                                                <input type="text" class="form-control" id="banknameu" name="banknameu">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="branchnameu">Branch Name</label>
                                                <input type="text" class="form-control" id="branchnameu" name="branchnameu">
                                            </div>
                                        </div>
                                        <div class="row m-t-15">
                                            <button type="button" class="btn btn-primary btn-outline pull-right m-r-10" onclick="Farmer.updateAccount()">
                                                <i class="fa fa-save"></i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-10">
                                    <div class="row text-right">Updated on :<span id="bupdate"></span></div>
                                    <div class="row"><h2>Account Information</h2></div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Selected Payment Mode</label>
                                            <h3 id="vpaymentmode"></h3>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Account Name</label>
                                            <h3 id="vaccountname"></h3>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Account Number</label>
                                            <h3 id="vaccountnumber"></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row p-10">
                                    <div class="row"><h2>Bank Details</h2></div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Bank Name</label>
                                            <h3 id="vbankname"></h3>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Branch</label>
                                            <h3 id="vbranch"></h3>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
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
<script src="{{asset('sys/js/cbpFWTabs.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuogBspOfHKhSzSldN3vYhcCcsHSoShRA&libraries=places"></script>
<script>
    let farmerTable=null;
    let idno=null;

    var marker=false;
    $(document).ready(function(){
        (function() {
            [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
                new CBPFWTabs(el);
            });
        })();
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
        google.maps.event.addDomListener(window, 'load', initMap);
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
                    url:'{{url("/admin/farmer/delete")}}/'+id,
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

    Farmer={
        view            :   function(id){
            $.ajax({
                url     :   '{{url("/farmer/view/")}}/'+id,
                type    :   'get',
                dataType:   'json',
                success :   function(data){
                    idno=data.farmer.idnumber;
                    var rows='';
                    console.log(data.account);
                    $.each(data.farms,function(k,v){
                        rows+='<tr>' +
                            '<td>'+v.id+'</td>' +
                            '<td>'+v.county+'</td>' +
                            '<td>'+v.constituency+'</td>' +
                            '<td>'+v.ward+'</td>' +
                            '<td>'+v.location+'</td>' +
                            '<td>'+v.latitude+'</td>' +
                            '<td>'+v.longitude+'</td>' +
                            '<td>'+v.elevation+'</td>' +
                            '<td>'+v.seedlingsPlanted+'</td>' +
                            '<td>'+v.farmSize+'</td>' +
                            '<td>'+v.updated_at+'</td>' +
                            '</tr>';
                    });
                    $('#vfarmTable tbody').html(rows);
                    $.each($('.passportpic'),function(k,v){
                        $(v).prop('src',data.imgs.passport);
                    });
                    $('#email').html(data.farmer.email);
                    $('#idnumber').html(data.farmer.idnumber);
                    $('#contact').html(data.farmer.mobilenumber);
                    $('#farmercode').html(data.farmer.farmerscode);
                    $('#vidfront').prop('src',data.imgs.idfront);
                    $('#vidback').prop('src',data.imgs.idback);
                    $('#vcontract').prop('href',data.imgs.contract);
                    if(data.account) {
                        $('#bupdate').html(checkSilent(data.account.updated_at));
                        $('#vaccountname').html(checkSilent(data.account.accountname));
                        $('#vaccountnumber').html(checkSilent(data.account.accountnumber));
                        $('#vbankname').html(checkSilent(data.account.bank));
                        $('#vbranch').html(checkSilent(data.account.branch));
                        $('#vpaymentmode').html(checkSilent(data.account.paymentoption));
                    }
                    $('#name').html(data.farmer.sirname+', '+data.farmer.firstname+' '+data.farmer.lastname);
                    $('#viewFarmer .modal').modal();
                }
            });
        },
        updateAccount   :   function(){
            var bankname=$('#banknameu').val(),
                paymentmode=check($('#paymentmodeu').val(),'Payment Mode'),
                accountname=check($('#accountnameu').val(),'Account Name'),
                accountnumber=check($('#accountnumberu').val(), 'Account Number'),
                branchname=$('#branchnameu').val();
            $.ajax({
                url         :   "{{url('/farmer/update/account')}}",
                data        :   {
                    '_token'        :   "{{csrf_token()}}",
                    'accountname'   :   accountname,
                    'accountnumber' :   accountnumber,
                    'bankname'      :   bankname,
                    'branchname'    :   branchname,
                    'id'            :   idno,
                    'paymentmode'   :   paymentmode
                },
                dataType    :   'json',
                type        :   'post',
                success     :   function(data){
                    if(data.status==200){
                        swal({
                            type:'success',
                            title:'Success',
                            text:data.msg,
                        })
                    }
                }
            });
        }
    };


    var map, infoWindow,pos=null,elevator;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: -34.397, lng: 150.644},
            zoom: 14
        });
        elevator = new google.maps.ElevationService;
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                infoWindow.setPosition(pos);
                infoWindow.setContent('Location found.');
                infoWindow.open(map);
                map.setCenter(pos);
                if(marker===false){
                    marker=new google.maps.Marker({
                        position:pos,
                        map:map,
                        draggable:true
                    });
                    markerLocation();
                    displayLocationElevation(pos, elevator, infoWindow);
                    google.maps.event.addListener(marker,'dragend',function(event){
                        markerLocation();
                        displayLocationElevation(event.latLng, elevator, infoWindow);
                    });
                }else{
                    marker.setPosition(pos);
                }
            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function dropPin(){
        var latitud= 0.514277,longit=35.269779;
        if(pos==null) {
            pos = {
                lat: latitud,
                lng: longit
            };
        }
        map.setCenter(pos);
        if(marker===false){
            marker=new google.maps.Marker({
                position:pos,
                map:map,
                draggable:true
            });
            markerLocation();
            displayLocationElevation(pos, elevator, infoWindow);
        }else{
            marker.setPosition(pos);
        }
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }

    function markerLocation(){
        var currentLocation=marker.getPosition();
        document.getElementById('latitude').value=currentLocation.lat();
        document.getElementById('longitude').value=currentLocation.lng();
    }

    function displayLocationElevation(location, elevator, infowindow) {
        // Initiate the location request
        elevator.getElevationForLocations({
            'locations': [location]
        }, function (results, status) {
            infowindow.setPosition(location);
            if (status === 'OK') {
                // Retrieve the first result
                if (results[0]) {
                    // Open the infowindow indicating the elevation at the clicked position.
                    $('#elevation').val(results[0].elevation);
                } else {
                    infowindow.setContent('No results found');
                }
            } else {
                infowindow.setContent('Elevation service failed due to: ' + status);
            }
        });
    }
</script>
@endsection
