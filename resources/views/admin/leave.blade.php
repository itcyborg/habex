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
                        <h4 class="page-title">Employee's Leave Status</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
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
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="white-box">
                                        <div class="row">
                                            <div class="col-md-6">

                                            </div>

                                            <div class="col-md-6">
                                                <select name="employee" id="employee" class="form-control">
                                                    <option value="">Find Employee</option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{$employee->id}}">
                                                            {{$employee->sirname}}
                                                            {{$employee->lastname}}
                                                            {{$employee->firstname}} |
                                                            ID: {{$employee->idnumber}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="white-box">
                            <div class="row" id="farmersInfo">
                                <div class="col-sm-12">
                                    <div class="bg-title">
                                        <h3 class="box-title">Employee's  Information</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="control-label"> Name</label>
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
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label">Mobile Number</label>
                                                <input type="text" id="mobilenumber" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label">Days Taken</label>
                                                <input type="text" id="daystaken" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="control-label">Days Remaining</label>
                                                <input type="text" id="daysremaining" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title">ALL EMPLOYEES LEAVE STATUS</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                <tr>
                                                    <th width="70" class="text-center">#</th>
                                                    <th>NAME</th>
                                                    <th>EMAIL</th>
                                                    <th>ID NUMBER</th>
                                                    <th>MOBILE NUMBER</th>
                                                    <th>START</th>
                                                    <th>END</th>
                                                    <th>DAYS</th>
                                                    <th>REQUESTED ON</th>
                                                    <th>STATUS</th>
                                                    @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                                                    <th width="300">ACTIONS</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($leaves as $leave)
                                                        <tr>
                                                            <td class="text-center">{{$leave->id}}</td>
                                                            <td>
                                                                {{$leave->employeeid}}
                                                            </td>
                                                            <td>{{$leave->email}}</td>
                                                            <td>{{$leave->idnumber}}</td>
                                                            <td>{{$leave->mobilenumber}}</td>
                                                            <td>{{$leave->start}}</td>
                                                            <td>{{$leave->end}}</td>
                                                            <td>{{$leave->days}}</td>
                                                            <td>{{$leave->created_at}}</td>
                                                            <td>{{$leave->status}}</td>
                                                            @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                                                            <td>
                                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5">
                                                                    <i class="ti-key"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5">
                                                                    <i class="ti-trash"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5">
                                                                    <i class="ti-pencil-alt"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-20">
                                                                    <i class="ti-upload"></i>
                                                                </button>
                                                            </td>
                                                            @endif
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
    <script>
        $(document).ready(function(){
            $('#employee').on('change',function(){
                if($(this).val()!=="" && $(this).val()!==null) {
                    $.ajax({
                        url: "{{url('admin/leave/')}}/" + $(this).val(),
                        type: 'get',
                        dataType: 'json',
                        success: function (data) {
                            $('#farmerName').val(data.employee.sirname +' '+data.employee.firstname+' '+data.employee.lastname)
                                .prop('disabled',true);
                            $('#mobilenumber').val(data.employee.mobilenumber).prop('disabled',true);
                            $('#idnumber').val(data.employee.idnumber).prop('disabled',true);
                            $('#daystaken').val(data.used).prop('disabled',true);
                            $('#daysremaining').val(data.remaining).prop('disabled',true);
                        }
                    });
                }
            });
        });
    </script>

@endsection
