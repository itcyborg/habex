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
                        <h4 class="page-title">Payroll</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Payroll</a></li>
                            <li class="active">View Payroll</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- .row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">View Payslips</h3>
                            <div class="row m-t-30 p-20">
                                <div class="table-responsive">
                                    <table class="table table-condensed table-active table-hover">
                                        <thead>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Basic Salary</th>
                                            <th>Total Allowances</th>
                                            <th>Total Deductions</th>
                                            <th>Gross Salary</th>
                                            <th>Net Salary</th>
                                            <th>Month</th>
                                            <th>Year</th>
                                            <th>Status</th>
                                            <th>Updated On</th>
                                            @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                                            <th>Actions</th>
                                            @endif
                                        </thead>
                                        <tbody>
                                            @foreach($payslips as $payslip)
                                                <tr>
                                                    <td>{{$payslip->id}}</td>
                                                    <td>
                                                        {{$payslip->sirname}} {{$payslip->firstname}} {{$payslip->lastname}}
                                                    </td>
                                                    <td>{{$payslip->basicSalary}}</td>
                                                    <td>{{($payslip->totalAllowances + $payslip->totalTaxableAllowances)}}</td>
                                                    <td>{{$payslip->totalDeductions}}</td>
                                                    <td>{{$payslip->grossSalary}}</td>
                                                    <td>{{$payslip->netSalary}}</td>
                                                    <td>{{$payslip->month}}</td>
                                                    <td>{{$payslip->year}}</td>
                                                    <td>
                                                        @if($payslip->status == 0)
                                                            Pending
                                                            @elseif($payslip->status ==1)
                                                            Processed
                                                        @endif
                                                    </td>
                                                    <td>{{$payslip->updated_at}}</td>
                                                    @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                                                    <td>
                                                        <button class="btn btn-circle btn-small btn-info btn-outline m-r-10" data-toggle="tooltip" title="Details" onclick="viewDetails({{$payslip->id}})">
                                                            <i class="fa fa-file"></i>
                                                        </button>
                                                        @if($payslip->status==0)
                                                            <button class="btn btn-circle btn-small btn-danger btn-outline m-r-10" data-toggle="tooltip" title="Delete this record" onclick="deletePayslip({{$payslip->id}})">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        @endif
                                                        @if($payslip->status==0)
                                                            <button class="btn btn-circle btn-small btn-primary btn-outline m-r-10" data-toggle="tooltip" title="Process payslip" onclick="processPayslip({{$payslip->id}})">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        @endif
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
        function viewDetails(id){

        }

        function deletePayslip(id){
            swal({
                title: 'Delete this payslip?',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete',
                type:'warning',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(`/admin/payslip/delete/${id}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    var type='info';
                    if(result.value.status){
                        type='success';
                    }
                    swal({
                        title: result.value.msg,
                        type:type
                    })
                }
            })
        }

        function processPayslip(id) {
            swal({
                title: 'Process Payslip?',
                showCancelButton: true,
                confirmButtonText: 'Yes, Process',
                text:'You are about to process this payslip. This action is irreversible.',
                type:'warning',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(`/admin/payslip/process/${id}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    var type='info';
                    if(result.value.status){
                        type='success';
                    }
                    var title='';
                    if(result.value.code==1001 || result.value.code==1002){
                        title='An Error Occurred';
                    }else if(result.value.code==2000){
                        title='Success';
                    }
                    swal({
                        title: title,
                        type:type,
                        text:result.value.msg
                    })
                }
            })
        }
    </script>
@endsection
