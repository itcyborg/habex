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
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Settings</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Settings</li>
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
                                    <div class="row">
                                        {{Auth::user()->hasRole(['ROLE_ADMIN'])}}
                                    </div>
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
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript">

        let counties = null;

        function initialize() {
            directionsDisplay = new google.maps.DirectionsRenderer();
            var paris = new google.maps.LatLng(-0.46706492082756573, 36.5363312959671);
            var mapOptions = {
                zoom: 13,
                center: paris
            };
            map = new google.maps.Map(document.getElementById("map"), mapOptions);
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }

        function dropPin(position) {
            // if any previous marker exists, let's first remove it from the map
            if (endMarker) {
                endMarker.setMap(null);
            }
            if (position) {
                endMarker = new google.maps.Marker({
                    position: position,
                    map: map,
                    draggable: true,
                    zoom: 13,
                });
            } else {
                endMarker = new google.maps.Marker({
                    position: map.getCenter(),
                    map: map,
                    draggable: true,
                    zoom: 13,
                });
            }
            // create the marker

            copyMarkerpositionToInput();
            // add an event "onDrag"
            google.maps.event.addListener(endMarker, 'dragend', function () {
                copyMarkerpositionToInput();
                displayLocationElevation(endMarker.position, elevator, infowindow);
            });
        }

        function copyMarkerpositionToInput() {
            // get the position of the marker, and set it as the value of input
            latd = endMarker.getPosition().lat();
            longt = endMarker.getPosition().lng();
            $('#latitude').val(latd);
            $('#longitude').val(longt);
            displayLocationElevation(endMarker.position, elevator, infowindow);
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
                        $('#elevation').val(results[0].elevation);
                    } else {
                        swal('info', 'No Elevation found for this point');
                    }
                } else {
                    swal('error', 'Elevation service failed due to: ' + status);
                }
            });
        }

        $(document).ready(function () {
            $.ajax({
                url: '{{url('/counties')}}',
                type: 'get',
                dataType: 'json',
                success: function (data) {
                    counties = data;
                }
            });
            $('#county').on('change', function () {
                let county = $(this).val();
                $.each(counties.counties, function (i, j) {
                    if (i === county) {
                        let options = '<option value="">Select Sub-county</option>';
                        $.each(j, function (k, v) {
                            if (options.indexOf('<option value="' + v.name + '">' + v.name + '</option>') === -1) {
                                options += '<option value="' + v.name + '">' + v.name + '</option>';
                            }
                        });
                        $('#constituency').html(options);
                    }
                });
            });
            $('#constituency').on('change', function () {
                $.ajax({
                    url: '{{url("/counties/ward/")}}',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'county': $('#county').val(),
                        'subcounty': $(this).val()
                    },
                    type: 'post',
                    success: function (data) {
                        if (data) {
                            let rows = '<option value="">Select Ward</option>';
                            $.each(data, function (i, j) {
                                rows += '<option value="' + j.ward + '">' + j.ward + '</option>';
                            });
                            $('#ward').html(rows);
                        }
                    }
                });
            });
            $('#addFarmer').wizard({
                onInit: function () {
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
                onFinish: function () {
                    $('#formT').submit();
                }
            });
            // Basic
            $('.dropify').dropify();

            try {
                google.maps.event.addDomListener(window, 'load', initialize);
            } catch (e) {
                alert('Failed to initialize maps');
            }
        });
    </script>
@endsection
