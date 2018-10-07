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
                    <h4 class="page-title">Salary</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Salary</li>
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
                                    <form action="{{url('/admin/salaries')}}" method="post" class="form">
                                        {{csrf_field()}}
                                        <div class="row form-group">
                                            <div class="col-md-6 m-t-10">
                                                <label for="employee">Employee</label>
                                                <select name="employee" id="employee" class="form-control">
                                                    <option value="">Select Employee</option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{$employee->id}}">
                                                            {{$employee->sirname}} {{$employee->fistname}} {{$employee->lastname}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 m-t-10">
                                                <label for="idnumber">ID Number</label>
                                                <input type="text" class="form-control" placeholder="ID Number"
                                                       readonly="true" id="idnumber" name="idnumber">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-6 m-t-10">
                                                <label for="jobgroup">Job Group</label>
                                                <select name="jobgroup" id="jobgroup" class="form-control">
                                                    <option value="">Select Job Group</option>
                                                    <option value="A">Group A (KSH 8,910 - 9,420)</option>
                                                    <option value="B">Group B (KSH 9,420 - 9,960)</option>
                                                    <option value="C">Group C (KSH 9,660 - 10,380)</option>
                                                    <option value="D">Group D (KSH 10,380 - 11,370)</option>
                                                    <option value="E">Group E (KSH 11.370 - 13,140)</option>
                                                    <option value="F">Group F (KSH 12,510 - 16,080)</option>
                                                    <option value="G">Group G (KSH 16,692 - 21,304)</option>
                                                    <option value="H">Group H (KSH 19,323 - 24,662)</option>
                                                    <option value="J">Group J (KSH 24,662 - 29,918)</option>
                                                    <option value="K">Group K (KSH 31,020 - 41,590)</option>
                                                    <option value="L">Group L (KSH 35,910 - 45,880)</option>
                                                    <option value="M">Group M (KSH 41,590 - 55,840)</option>
                                                    <option value="N">Group N (KSH 48,190 - 65,290)</option>
                                                    <option value="P">Group P (KSH 77,527 - 103,894)</option>
                                                    <option value="Q">Group Q (KSH 89,748 - 120,270)</option>
                                                    <option value="R">Group R (KSH 109,089 - 144,928)</option>
                                                    <option value="S">Group S (KSH 120,270 - 180,660)</option>
                                                    <option value="T">Group T (KSH 152,060 - 302,980)</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 m-t-10">
                                                <label for="salary">Salary (KSH)</label>
                                                <input type="number" name="salary" id="salary" class="form-control" placeholder="Salary">
                                            </div>
                                        </div>
                                        <div class="row m-t-30 m-b-20">
                                            <button class="btn btn-primary pull-right m-r-30 btn-outline">
                                                <i class="fa fa-check"></i> Save
                                            </button>
                                        </div>
                                    </form>
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
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="{{asset('sys/plugins/bower_components/select2/dist/js/select2.full.js')}}"></script>
    <script>
        var employees=[];
        $(document).ready(function(){
            getEmployees();
            $('#employee').on('change',function(){
                var id=$(this).val();
                $.each(employees,function(i,j){
                    if(id==j.id){
                        $('#idnumber').val(j.idnumber);
                    }
                });
            });
        });

        function getEmployees(){
            $.ajax({
                url:"{{url('/admin/employees')}}",
                type:'get',
                dataType:'json',
                success:function(dbemployees){
                    $.each(dbemployees,function(index,employee){
                        employees.push(
                            {
                                id:employee.id,
                                idnumber:employee.idnumber
                            }
                        )
                    });
                }
            });
        }
    </script>
@endsection
