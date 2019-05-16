@extends('layouts.sys')
@section('styles')
    <link href="{{asset('sys/plugins/bower_components/dropify/dist/css/dropify.min.css')}}" rel="stylesheet">
    <link href="{{asset('sys/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
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
                                <h3 class="box-title m-b-0">Map Distribution</h3>
                                    <div>
                                        <hr>
                                        <div id="map" style="height: 600px;"></div>
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
@endsection
@section('scripts')
<script src="{{asset('sys/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
<!-- jQuery file upload -->
<script src="{{asset('sys/plugins/bower_components/dropify/dist/js/dropify.min.js')}}"></script>
<!-- Sweet-Alert  -->
<script src="{{asset('sys/plugins/bower_components/sweetalert2/sweetalert.js')}}"></script>
<script src="{{asset('sys/js/cbpFWTabs.js')}}"></script>
<script src="{{asset('sys/js/compress.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBuogBspOfHKhSzSldN3vYhcCcsHSoShRA&libraries=places"></script>
<script>
    var marker=false;
    $(document).ready(function(){
        google.maps.event.addDomListener(window, 'load', initMap);
    });
    var data=null;
    $.ajax({
        url:'{{url("farm/map/data")}}',
        dataType:'json',
        type:'get',
        success:function(rawdata){
            data=rawdata;
            dropPin();
        }
    });
    var map, infoWindow,pos=null,elevator;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 0.41747677, lng: 35.70556641},
            zoom: 9
        });
        elevator = new google.maps.ElevationService;
        infoWindow = new google.maps.InfoWindow;
    }

    function dropPin(){
        $.each(data,function(k,v){
            pos = {
                lat: Number.parseFloat(v.latitude),
                lng: Number.parseFloat(v.longitude)
            };
            marker=new google.maps.Marker({
                position:pos,
                map:map,
                draggable:true
            });
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>
@endsection
