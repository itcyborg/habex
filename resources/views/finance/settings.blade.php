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
                        <h4 class="page-title">Settings</h4></div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20">
                            <i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Settings</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

            @include('layouts.settings')

            <!-- /.row -->

                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                        </div>
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
                                <li><a href="javascript:void(0)" data-theme="default-dark"
                                       class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a>
                                </li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a>
                                </li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a>
                                </li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark"
                                       class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark"
                                       class="megna-dark-theme working">12</a></li>
                            </ul>
                            <ul class="m-t-20 all-demos">
                                <li><b>Choose other demos</b></li>
                            </ul>
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img
                                                src="{{asset('sys/plugins/images/users/varun.jpg')}}" alt="user-img"
                                                class="img-circle"> <span>Sharon Cherutich <small class="text-success">online</small></span></a>
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
    <script type="text/javascript">
    </script>
@endsection
