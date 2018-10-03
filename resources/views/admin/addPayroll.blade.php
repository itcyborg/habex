@extends('layouts.sys')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
                        <a href="{{url('/admin')}}" class="waves-effect">
                            <i data-icon="7" class="mdi mdi-av-timer fa-fw"></i>
                            <span class="hide-menu">Dashboard </span>
                        </a>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="/" class="mdi mdi-account-multiple"></i><span class="hide-menu"> Farmers<span class="fa arrow"></span><span class="label label-rouded label-purple pull-right"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{url('/admin/farmer/add')}}"><i data-icon=")" class="mdi mdi-account-plus"></i><span class="hide-menu"> New Farmer </span></a></li>
                            <li><a href="{{url('/admin/farmers')}}"><i class="mdi mdi-account-multiple"></i><span class="hide-menu"> Farmers Accounts </span></a></li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="" class="mdi mdi-account-multiple"></i><span class="hide-menu"> Agronomists<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{url('/admin/agronomist/add')}}">
                                    <i data-icon="/" class="mdi mdi-account-plus"></i>
                                    <span class="hide-menu"> New Agronomist </span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/agronomists')}}">
                                    <i data-icon="7" class="mdi mdi-account-multiple"></i>
                                    <span class="hide-menu"> Agronomists Accounts </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{url('/admin/farminfo')}}" class="waves-effect">
                            <i data-icon="" class="mdi mdi-pine-tree"></i>
                            <span class="hide-menu"> Farm Info </span>
                        </a>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="" class="mdi mdi-wallet"></i><span class="hide-menu"> Financials<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{url('/admin/order/add')}}"><i data-icon="/" class="fa fa-edit"></i><span class="hide-menu"> New Order</span></a> </li>
                            <li> <a href="{{url('/admin/orders')}}"><i data-icon="7" class="fa  fa-list"></i><span class="hide-menu"> Orders</span></a> </li>
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="" class="mdi mdi-wallet"></i><span class="hide-menu"> Payroll<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{url('/admin/payroll/add')}}"><i data-icon="/" class="fa fa-edit"></i><span class="hide-menu"> New Payment</span></a> </li>
                            <li> <a href="{{url('/admin/payroll/all')}}"><i data-icon="7" class="fa  fa-list"></i><span class="hide-menu"> Payments</span></a> </li>
                        </ul>
                    </li>
                    <li> <a href="{{url('/admin/leave/all')}}" class="waves-effect">
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
                        <h4 class="page-title">Add Payroll</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Payroll</a></li>
                            <li class="active">Add Payroll</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- .row --> <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="form">
                                <form action="" class="form-bordered form" id="addPayroll">
                                    {{ csrf_field() }}
                                    <div class="row m-b-30">
                                        <div class="pull-right form-inline">
                                            <strong>Current Time: </strong>
                                            <label class="text-info">
                                                <span id="currenttime"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m-b-10 m-t-5 alert">
                                        <span class="text-info" id="statusloading"></span>
                                    </div>
                                    <div class="row m-b-30 m-t-15">
                                        <div class="col-md-4">
                                            <label for="employee">Select Employee</label>
                                            <select name="employee" id="employee" class="form-control">
                                                <option value="">Select Employee</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="idNumber">ID Number</label>
                                            <input type="text" id="idNumber" name="idNumber" class="form-control" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="position">Position</label>
                                            <input type="text" class="form-control" name="position" id="position" readonly>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="month">Month</label>
                                            <select name="month" id="month" class="form-control">
                                                <option value="">Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="year">Year</label>
                                            <input type="number" class="form-control" placeholder="Year" id="year" name="year">
                                        </div>
                                    </div>
                                    <div class="row m-b-30">
                                        <div class="col-md-4">
                                            <label for="jobGroup">Job Group</label>
                                            <input type="text" readonly class="form-control" id="jobGroup" name="jobGroup">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="basicSalary">Basic Salary</label>
                                            <input type="number" readonly class="form-control" id="basicSalary" name="basicSalary">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="zone">Zone</label>
                                            <input type="text" class="form-control" id="zone" name="zone" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m-b-30">
                                        <div class="row-fluid">
                                            <h4>Allowances</h4>
                                        </div>
                                        <div class="row-fluid">
                                            <table class="table table-striped table-condensed" id="tableAllowances">
                                                <thead>
                                                <th width="35%">Type</th>
                                                <th width="10%">% (optional)</th>
                                                <th width="10%">Amount</th>
                                                <th width="20%">Options</th>
                                                <th width="10%">Action</th>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <select name="allowancetype[]" id="allowancetype" class="form-control input-sm allowancetype">
                                                            <option value="">Select type of Allowance</option>
                                                            <option value="Housing">Housing</option>
                                                            <option value="Medical">Medical</option>
                                                            <option value="Travelling">Travelling</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="allowancepct[]" id="allowancepct" class="form-control input-sm" data-toggle="tooltip" title="If number value is entered, amount is calculated automatically and fixed checkbox will be disabled" onchange="calcAllowance(this.parentNode.parentNode)" max="100" min="0">
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control input-sm" name="allowanceamount[]" id="allowanceamount">
                                                    </td>
                                                    <td>
                                                        <span class="m-r-30" data-toggle="tooltip" title="Leave unchecked if it should be calculated as a percentage of the basic salary. If checked, the amount will be added directly to the salary.">
                                                            <input type="checkbox" class="checkbox checkbox-circle checkbox-primary checkbox-inline" name="fixed" id="fixed">
                                                            <label for="fixed">Fixed</label>
                                                        </span>
                                                        <span data-toggle="tooltip" title="Check if the amount should be included as a taxable income; Unchecked if it is not taxable.">
                                                            |<input type="checkbox" class="checkbox checkbox-circle checkbox-primary checkbox-inline m-r-30 m-l-10" name="taxable" id="taxable">
                                                            <label for="taxable">Taxable</label>
                                                        </span>

                                                    </td>
                                                    <td>
                                                        <button class="btn btn-sm btn-danger" data-toggle="tooltip" type="button" title="Remove this entry" onclick="rowdelete(this)">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-success pull-right m-r-40" onclick="newAllowance()"><i class="fa fa-plus">
                                                </i> Add Allowance
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row m-b-30">
                                        <div class="row-fluid">
                                            <h4>Deductions</h4>
                                        </div>
                                        <div class="row-fluid">
                                            <table class="table table-striped table-condensed" id="tableDeductions">
                                                <thead>
                                                <th width="40%">Type</th>
                                                <th width="10%">%</th>
                                                <th width="10%">Amount</th>
                                                <th width="10%">Options</th>
                                                <th width="20%">Action</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="deductiontype" class="form-control input-sm" placeholder="Type of deduction">
                                                        </td>
                                                        <td>
                                                            <input type="number" name="deductionpct[]" id="deductionpct" class="form-control input-sm">
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control input-sm" name="deductionamount[]" id="deductionamount">
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="fixed" id="fixed">
                                                            <label for="fixed">Fixed</label>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-danger" type="button" data-toggle="tooltip" title="Remove this entry" onclick="rowdeletededuction(this)">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <button type="button" class="btn btn-warning pull-right m-r-40" data-toggle="tooltip" title="Add a new deduction" onclick="newDeduction()">
                                                <i class="fa fa-plus"></i> Add Deduction
                                            </button>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row m-b-30 m-l-10 m-t-20 m-r-30">
                                        <button class="btn btn-primary btn-outline pull-right">
                                            <i class="fa fa-check"></i> Save
                                        </button>
                                    </div>
                                </form>
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
    <script src="{{asset('sys/plugins/bower_components/select2/dist/js/select2.full.js')}}"></script>
    <script>
        var r;
        $(document).ready(function(){
            $('#employee').select2();
            $('.deductiontype').each(function(){
                initDedSelect($(this));
            });

            getEmployees();

            $('#employee').on('change',function(){
                if($(this).val()!=''){
                    $.ajax({
                        url:"{{url('admin/employee/salary')}}",
                        type:'get',
                        dataType:'json',
                        data:{
                            'id':$('#employee').val()
                        },
                        beforeSend:function(){
                            $('#statusloading').text('Loading ...');
                        },
                        success:function(data){
                            $('#statusloading').text('');
                            data=data[0];
                            if(data){
                                $('#basicSalary').val(data.basicSalary);
                                $('#zone').val(data.zone);
                                $('#position').val(data.position);
                                $('#jobGroup').val(data.jobGroup);
                                $('#idNumber').val(data.idnumber);
                            }
                        }
                    });
                }
            });

            $('#addPayroll').on('submit',function(e){
                e.preventDefault();
                var employee=$('#employee').val();
                var month=$('#month').val();
                var year=$('#year').val();
                var allowances=[];
                var deductions=[];
                $('#tableAllowances tbody tr').each(function(i,j){
                    var cells = $(this).find('td');
                    var type=cells.eq(0).find('select').val();
                    var percentage=cells.eq(1).find('input').val();
                    var amount=cells.eq(2).find('input').val();
                    var fixed=cells.eq(3).find('[name=fixed]').is(':checked');
                    var taxable=cells.eq(3).find('[name=taxable]').is(':checked');
                    allowances.push({
                        'type':type,
                        'percentage':percentage,
                        'amount':amount,
                        'fixed':fixed,
                        'taxable':taxable
                    });
                });
                $('#tableDeductions tbody tr').each(function(i,j){
                    var cells = $(this).find('td');
                    var type=cells.eq(0).find('input').val();
                    var percentage=cells.eq(1).find('input').val();
                    var amount=cells.eq(2).find('input').val();
                    var fixed=cells.eq(3).find('[name=fixed]').is(':checked');
                    deductions.push({
                        'type':type,
                        'percentage':percentage,
                        'amount':amount,
                        'fixed':fixed
                    });
                });
                $.ajax({
                    url : "{{url('admin/payroll/add')}}",
                    type:'post',
                    data:{
                        '_token':'{{csrf_token()}}',
                        'employeeid':$('#employee').val(),
                        'month':$('#month').val(),
                        'year':$('#year').val(),
                        'allowances':allowances,
                        'deductions':deductions
                    }
                });
            });

            $('#year').val(Number.parseInt(new Date().getFullYear()));
            setInterval(updateCurrentTime,1000);
        });

        function updateCurrentTime(){
            $('#currenttime').text(new Date());
        }

        function calcAllowance(row){
            var cells=$(row).find('td');
            var perc=cells.eq(1).find('input');
            var amount=cells.eq(2).find('input');
            var fixed=cells.eq(3).find('[name=fixed]');
            (perc.val()>100)?perc.val(0) && alert('% should be between 0 and 100'):$(perc).css('border','1px solid #e4e7ea');
            (perc.val()>0)?$(fixed).attr('disabled',true)&& $(amount).prop('disabled',true) :$(fixed).attr('disabled',false)&& $(amount).prop('disabled',false);
        }

        function newAllowance(){
            var row= $('#tableAllowances tbody tr:last').clone(true).appendTo('#tableAllowances tbody');
            var cells=$(row).find('td');
            var options=cells.eq(0).find('select');
            options.trigger('update');
        }

        function newDeduction(){
            var row='<tr>' +
                '<td>' +
                    '<input type="text" name="deductiontype" class="form-control input-sm" placeholder="Type of deduction">'+
                '</td>' +
                '<td><input type="number" name="deductionpct[]" id="deductionpct" class="form-control input-sm"></td>' +
                '<td>' +
                '<input type="number" class="form-control input-sm" name="deductionamount[]" id="deductionamount">' +
                '</td>' +
                '<td><input type="checkbox" name="fixed" id="fixed">' +
                '<label for="fixed">Fixed</label></td>'+
                '<td><button class="btn btn-sm btn-danger" type="button" data-toggle="tooltip" title="Remove this entry" onclick="rowdeletededuction(this)">' +
                '<i class="fa fa-trash"></i>' +
                '</button>' +
                '</td>' +
                '</tr>';
            $('#tableDeductions tbody tr:last').after(row);
            $(row).find('.deductiontype').each(function(){
                $(this).select2();
            });
        }
        function rowdelete(a){
            var row=a.parentNode.parentNode;
            ($('#tableAllowances tbody tr').length>1)?
                row.remove():$('input').val('');
        }

        function initDedSelect(element){
            element.select2(
                {
                    tags:true,
                    placeholder :'Select the type of deduction or type a new one'
                }
            );
        }

        function rowdeletededuction(a){
            var row=a.parentNode.parentNode;
            ($('#tableDeductions tbody tr').length>1)?
                row.remove():$('input').val('');
        }

        function getEmployees(){
            var employees='<option value="">Select Employee</option>';
            $.ajax({
                url:"{{url('admin/employees')}}",
                type:'get',
                dataType:'json',
                success:function(data){
                    $.each(data,function(i,j){
                        employees+='<option value="'+j.id+'">'+j.sirname+' '+j.firstname+' '+j.lastname+' ['+j.idnumber+']</option>';
                        $('#employee').html(employees).trigger('change');
                    });
                }
            });

        }
    </script>
@endsection
