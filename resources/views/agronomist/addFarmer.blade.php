@extends('layouts.sys')
@section('styles')
    <link href="{{asset('sys/plugins/bower_components/jquery-wizard-master/css/wizard.css')}}" rel="stylesheet">
    <link href="{{asset('sys/plugins/bower_components/dropify/dist/css/dropify.min.css')}}" rel="stylesheet">
    <link rel="stylesheet"
          href="{{asset('sys/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.css')}}">
    <link rel="stylesheet" href="{{asset('sys/plugins/bower_components/sweetalert/sweetalert.css')}}">
    <link rel="stylesheet" href="{{asset('sys/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css')}}">
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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Farmers</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Farmers</a></li>
                            <li class="active">New Farmers</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <h3 class="box-title m-b-0">Farmer's Details</h3>
                            <p class="text-muted m-b-30 font-13"> Please fill in accurately.</p>
                            <div id="addFarmer" class="wizard">
                                <ul class="wizard-steps" role="tablist">
                                    <li class="active" role="tab">
                                        <h4><span><i class="ti-user"></i></span>Personal Information</h4>
                                    </li>
                                    <li role="tab">
                                        <h4><span><i class="ti-cloud-up"></i></span>Upload Documents</h4>
                                    </li>
                                    <li role="tab">
                                        <h4><span><i class="ti-direction"></i></span>Farm Information</h4>
                                    </li>
                                    <li role="tab">
                                        <h4><span><i class="ti-credit-card"></i></span>Payment Details</h4>
                                    </li>
                                </ul>
                                <form action="{{url('/agronomist/farmer/add')}}" method="post" id="formT" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="wizard-content">
                                        <div class="wizard-pane active" role="tabpanel">
                                            <!--.row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-info">
                                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                                            <div class="panel-body">
                                                                <div class="form-body">
                                                                    <h3 class="box-title">Person Info</h3>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Sir Name</label>
                                                                                <input type="text" id="sirName" name="sirName" class="form-control" placeholder="Sir Name">
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">First Name</label>
                                                                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="First Name">
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Last Name</label>
                                                                                <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Last Name">
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                    </div>
                                                                    <!--/row-->
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Email Address</label>
                                                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">ID Number</label>
                                                                                <input type="text" id="idnumber" name="idnumber" class="form-control" placeholder="ID Number">
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Mobile Number</label>
                                                                                <input type="text" id="mobilenumber" name="mobilenumber" class="form-control" placeholder="Mobile Number">
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
                                            <!--./row-->
                                        </div>
                                        <div class="wizard-pane" role="tabpanel">
                                            <!--.row-->
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
                                            <!--./row-->
                                        </div>
                                        <div class="wizard-pane" role="tabpanel">
                                            <!--.row-->
                                            <div class="row">
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
                                                                                        <label>Elevation (metres)</label>
                                                                                        <input type="text" class="form-control" name="elevation" id="elevation" placeholder="Elevation">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label>Farmer's Code</label>
                                                                                        <input type="text" class="form-control" placeholder="Farmer's Code" id="farmerscode" name="farmerscode">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label>Seedlings Planted</label>
                                                                                        <input type="number" class="form-control" placeholder="Number of trees" id="numberplanted" name="numberplanted">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label>Farm Size (acres)</label>
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
                                            <!--./row-->
                                        </div>
                                        <div class="wizard-pane" role="tabpanel">
                                            <!--.row-->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-info">
                                                        <div class="panel-wrapper collapse in" aria-expanded="true">
                                                            <div class="panel-body">
                                                                <div class="form-body">
                                                                    <h3 class="box-title">Payment Information</h3>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label>Payment Option</label>
                                                                                <select class="form-control" name="paymentoption" id="paymentoption">
                                                                                    <option value="">--payment Option--</option>
                                                                                    <option value="mpesa">Mpesa</option>
                                                                                    <option value="bank">Bank Account</option>
                                                                                    <option value="cheque">Cheque</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Bank Name</label>
                                                                                <input type="text" id="accountName" name="accountName" class="form-control" placeholder="KENYA COMMERCIAL BANK">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Branch Name</label>
                                                                                <input type="text" id="accountName" name="accountName" class="form-control" placeholder="ELDORET BRANCH">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Account Name</label>
                                                                                <input type="text" id="accountNumber" name="accountNumber" class="form-control" placeholder="ALEX KIBET MUGOYA">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Account Number</label>
                                                                                <input type="text" id="confirmID" name="confirmID" class="form-control" placeholder="1110700889955">
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
                                            <!--./row-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
    <!-- Form Wizard JavaScript -->
    <script src="{{asset('sys/plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js')}}"></script>
    <!-- FormValidation plugin and the class supports validating Bootstrap form -->
    <script src="{{asset('sys/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js')}}"></script>
    <script src="{{asset('sys/plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('sys/js/custom.min.js')}}"></script>
    <!-- jQuery file upload -->
    <script src="{{asset('sys/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{asset('sys/plugins/bower_components/sweetalert/sweetalert.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuogBspOfHKhSzSldN3vYhcCcsHSoShRA&libraries=places"></script>
    <script type="text/javascript">


        let counties=null;
        var marker=false;

        var map, infoWindow,pos=null;
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

        $(document).ready(function() {
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
            $('#addFarmer').wizard({
                onInit: function() {
                    // $('#addFarmer').formValidation({
                    //     framework: 'bootstrap',
                    //     fields: {
                    //         email: {
                    //             validators: {
                    //                 emailAddress: {
                    //                     message: 'The input is not a valid email address'
                    //                 }
                    //             }
                    //         },
                    //         sirName:{
                    //             validators:{
                    //                 notEmpty:'The Sir Name is required'
                    //             }
                    //         },
                    //         firstName:{
                    //             validators:{
                    //                 notEmpty: 'The First name is required'
                    //             }
                    //         },
                    //         idnumber:{
                    //             validators: {
                    //                 notEmpty: 'The ID Number is required'
                    //             }
                    //         },
                    //         mobilenumber:{
                    //             validators:{
                    //                 notEmpty:'The Mobile Number is required'
                    //             }
                    //         },
                    //         passport:{
                    //             validators:{
                    //                 notEmpty:'Please attach a passport image'
                    //             }
                    //         },
                    //         contractform:{
                    //             validators:{
                    //                 notEmpty:'Please attach the contract form'
                    //             }
                    //         },
                    //         idfront:{
                    //             validators:{
                    //                 notEmpty:'Please attach the front phase of the ID'
                    //             }
                    //         },
                    //         idback:{
                    //             validators:{
                    //                 notEmpty:'Please attach the back phase of the ID'
                    //             }
                    //         },
                    //         county:{
                    //             validators:{
                    //                 notEmpty:'Please select a county'
                    //             }
                    //         },
                    //         constituency:{
                    //             validators:{
                    //                 notEmpty:'Please select a constituency'
                    //             }
                    //         },
                    //         ward:{
                    //             validators:{
                    //                 notEmpty:"Please select the ward"
                    //             }
                    //         },
                    //         location:{
                    //             validators:{
                    //                 notEmpty:'Please enter the Location of the farm'
                    //             }
                    //         },
                    //         latitude:{
                    //             validators:{
                    //                 notEmpty:'Please Enter the latitude or select from the map'
                    //             }
                    //         },
                    //         longitude:{
                    //             validators:{
                    //                 notEmpty:'Please Enter the longitude or select from the map'
                    //             }
                    //         },
                    //         elevation:{
                    //             validators:{
                    //                 notEmpty:'Please enter the elevation or select from the map'
                    //             }
                    //         },
                    //         numberplanted:{
                    //             validators:{
                    //                 notEmpty:'Enter the number of trees planted'
                    //             }
                    //         },
                    //         farmsize:{
                    //             validators:{
                    //                 notEmpty:'Enter the size of the farm in acres'
                    //             }
                    //         },
                    //         paymentoption:{
                    //             validators:{
                    //                 notEmpty:'Select the payment option'
                    //             }
                    //         },
                    //         accountName:{
                    //             validators:{
                    //                 notEmpty:'Enter the Account Name'
                    //             }
                    //         },
                    //         accountNumber:{
                    //             validations:{
                    //                 notEmpty:'Enter the Account number'
                    //             }
                    //         }
                    //     }
                    // });
                },
                // validator: function() {
                //     var fv = $('#addFarmer').data('formValidation');
                //     var $this = $(this);
                //     // Validate the container
                //     fv.validateContainer($this);
                //     var isValidStep = fv.isValidContainer($this);
                //     if (isValidStep === false || isValidStep === null) {
                //         return false;
                //     }
                //     return true;
                // },
                onFinish: function() {
                    $('#formT').submit();
                }
            });
            // Basic
            $('.dropify').dropify();
            google.maps.event.addDomListener(window, 'load', initMap);
        });
    </script>
@endsection
