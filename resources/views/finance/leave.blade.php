@extends('layouts.sys')
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
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Employee's Leave Status</h4></div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20">
                            <i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Employees</a></li>
                            <li class="active">Leave Status</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- .row -->


                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-4 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-info"><i class="ti-check-box"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                @if($leave)
                                                    {{$leave->used}}
                                                @endif
                                            </h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Days Used</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-danger" role="progressbar"
                                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: {{($leave->all-$leave->remaining)*100/$leave->all}}%">
                                                    <span class="sr-only">{{($leave->all-$leave->remaining)*100/$leave->all}}% Used</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-sm-6 row-in-br  b-r-none">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-success"><i class="ti-time"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                @if($leave)
                                                    {{$leave->remaining}}
                                                @endif
                                            </h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Days Remaining</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-info" role="progressbar"
                                                     aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                     style="width: {{($leave->all-$leave->used)*100/$leave->all}}%">
                                                    <span class="sr-only">{{($leave->all-$leave->used)*100/$leave->all}}% Remaining</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-sm-6 b-0">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-primary"><i
                                                        class=" ti-calendar"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                @if($leave)
                                                    {{$leave->all}}
                                                @endif
                                            </h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Total Days</h4>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title">REQUEST LEAVE</h3>
                            @if(session('status'))
                                @if(session('msg'))
                                    <div class="alert alert-success">{{session('msg')}}</div>
                                @endif
                            @else
                                @if(session('msg'))
                                    <div class="alert alert-danger">{{session('msg')}}</div>
                                @endif
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <form action="{{url('leave/request')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <div class="form-group">
                                                        <label for="type">Type of Leave</label>
                                                        <select name="type" id="type" class="form-control">
                                                            <option value="">Select type of leave</option>
                                                            <option value="Academic">Academic</option>
                                                            <option value="Annual">Annual</option>
                                                            <option value="Maternity/Paternity">Maternity/ Paternity
                                                            </option>
                                                            <option value="Sick">Sick</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="start">Start Date</label>
                                                    <input type="date" name="start" id="start" class="form-control">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12">
                                                    <label for="end">End Date</label>
                                                    <input type="date" name="end" id="end" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <label for="description">Description <i class="text-info">Further
                                                        describe the reason for the leave</i></label>
                                                <textarea name="description" id="description" cols="30" rows="10"
                                                          class="form-control"></textarea>
                                            </div>
                                            <div class="row m-t-10">
                                                <button class="btn btn-1b btn-primary btn-outline pull-right"><i
                                                            class="fa fa-caret-right"></i> Send Request
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->

                <!-- /.row -->

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
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg"
                                                                      alt="user-img" class="img-circle"> <span>Sharon Cherutich <small
                                                    class="text-success">online</small></span></a>
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
