@extends('layouts.sys')
@section('styles')
    <style>
        .panel{
            margin-bottom:0px;
            padding-bottom:0px;
        }
    </style>
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
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Agronomist</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20">
                            <i class="ti-settings text-white"></i>
                        </button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Agronomist</a></li>
                            <li class="active">Agronomist Accounts</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">

                            <!-- ============================================================== -->
                            <!-- Demo table -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">MANAGE AGRONOMISTS</div>
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table table-condensed">
                                                <thead>
                                                <tr>
                                                    <th width="70" class="text-center">#</th>
                                                    <th>NAME</th>
                                                    <th>EMAIL</th>
                                                    <th>ID NUMBER</th>
                                                    <th>MOBILE NUMBER</th>
                                                    <th>POSITION</th>
                                                    <th>ZONE</th>
                                                    @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                                                    <th width="300">ACTIONS</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($agronomists as $agronomist)
                                                    <tr>
                                                        <td class="text-center">{{$agronomist->id}}</td>
                                                        <td>
                                                             {{$agronomist->sirname}}
                                                             {{$agronomist->firstname}}
                                                             {{$agronomist->lastname}}
                                                        </td>
                                                        <td>{{$agronomist->email}}</td>
                                                        <td>{{$agronomist->idnumber}}</td>
                                                        <td>{{$agronomist->mobilenumber}}</td>
                                                        <td>{{$agronomist->position}}</td>
                                                        <td>{{$agronomist->zone}}</td>
                                                        <td>
                                                            @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                                                            <button type="button" class="btn btn-info btn-outline btn-circle m-r-5"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Reset Password" onclick="resetPassword({{$agronomist->id}})">
                                                                <i class="ti-key"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-info btn-outline btn-circle m-r-5"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Change Permissions" onclick="permissions({{$agronomist->id}})">
                                                                <i class="mdi mdi-account-key"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-outline btn-circle m-r-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Agronomist" onclick="deleteAgronomist({{$agronomist->id}})">
                                                                <i class="ti-trash"></i>
                                                            </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
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
                        <div class="rpanel-title">
                            Service Panel
                            <span>
                                <i class="ti-close right-side-toggle"></i>
                            </span>
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
                                <li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>
                                <li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>
                                <li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme working">12</a></li>
                            </ul>
                            <ul class="m-t-20 all-demos">
                                <li>
                                    <b>Choose other demos</b>
                                </li>
                            </ul>
                            <ul class="m-t-20 chatonline">

                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle">
                                        <span>
                                            Sharon Cherutich
                                            <small class="text-success">online</small>
                                        </span>
                                    </a>
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
    
    <div id="permissions">
        <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Roles & Permissions</h4> 
                    </div>
                    <div class="modal-body">
                        <div class="row" id="loadingStatus"><span></span></div>
                        <form id="roleUserForm">
                            <div class="panel panel-default">
                                <div class="panel-heading">Administrative Roles</div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body m-b-0">
                                        <div class="row">
                                            <div class="p-t-10 radio">
                                                <input type="radio" name="userRole" id="adminRole" value="ROLE_ADMIN">
                                                <label for="adminRole"> System Administrator</label><br>
                                                <small>This role applies to system administrators who are in charge of maintaining the system.</small>
                                            </div>
                                            <div class="m-t-10 p-t-10 radio">
                                                <input type="radio" name="userRole" id="managementRole" value="ROLE_VIEW">
                                                <label for="managementRole"> Management</label><br>
                                                <small>This role applies to the managment. They have access to aspects of the system but cannot modify or add data to the system.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default m-b-0">
                                <div class="panel-heading">Agronomist's Roles</div>
                                <div class="panel-wrapper collapse in m-b-0">
                                    <div class="panel-body m-b-0">
                                        <div class="row">
                                            <div class="col-md-12 form-inline">
                                                <div class="col-md-6">
                                                    <div class="p-t-10 radio">
                                                        <input type="radio" name="userRole" id="leadAgronomistRole" value="ROLE_LEAD_AGRONOMIST">
                                                        <label for="leadAgronomistRole"> Lead Agronomist</label><br>
                                                        <small>This role applies to lead agronomists who are in charge of a region or a specified area.</small>
                                                    </div>
                                                    <hr>
                                                    <div class="p-t-10 radio">
                                                        <input type="radio" name="userRole" id="normalAgronomistRole" value="ROLE_AGRONOMIST">
                                                        <label for="normalAgronomistRole">Agronomist</label><br>
                                                        <small>This role applies to agronomists who feed data to the system.</small>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="p-t-10 radio">
                                                        <input type="radio" name="userRole" id="nurseryAgronomistRole" value="ROLE_NURSERY">
                                                        <label for="nurseryAgronomistRole"> Nursery Agronomist</label><br>
                                                        <small>This role applies to agronomists who are in charge of seedling nurseries.</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default m-b-0">
                            <div class="panel-heading">Finance Roles</div>
                            <div class="panel-wrapper collapse in m-b-0">
                                <div class="panel-body m-b-0">
                                    <div class="row">
                                        <div class="p-t-10 radio">
                                            <input type="radio" name="userRole" id="financeRole" value="ROLE_FINANCE">
                                            <label for="financeRole">Finance Administrator</label><br>
                                            <small>This role applies to those in charge of finance issues such as approving invoices, etc.</small>
                                        </div>      
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary waves-effect text-left" onclick="updateRole()"><i class="fa" id="loadingStatus" hidden></i> Update</button>
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
        var currentUser=null;

        function updateRole(){
            let role=$('[name=userRole]:checked').val();
            $.ajax({
                url: '/admin/role/update',
                type:'post',
                data:{
                    'agronomist_id':currentUser,
                    'role':role,
                    '_token':'{{csrf_token()}}'
                },
                beforeSend:function(){
                    $('#loadingStatus').fadeIn();
                    $('#loadingStatus').addClass('alert alert-warning');
                    $('#loadingStatus span').text('Saving changes. Please wait.');
                },
                success:function(data){
                    $('#loadingStatus').removeClass('alert-warning').addClass('alert alert-success');
                    $('#loadingStatus span').text('Your changes have been updated successfully.');
                    setTimeout(function(){
                        $('#loadingStatus').fadeOut();
                    },3000);
                    console.log(data);
                }
            });
        }

        function resetPassword(id){
            $.ajax({
                url:'{{url('/admin/agronomist/reset/')}}/'+id,
                type:'get',
                success:function(){
                    alert('Success');
                }
            })
        }
        function deleteAgronomist(id){
            if(confirm('Are you sure you want to delete the Agronomist')){
                $.ajax({
                    url:'{{url('/admin/agronomist/delete/')}}/'+id,
                    type:'get',
                    beforeSend:function(){
                    },
                    success:function(){
                        alert('Success');
                    }
                })
            }
        }
        function permissions(id){
            currentUser=id;
            $('#adminRole, #managementRole, #financeRole, #nurseryAgronomistRole, #normalAgronomistRole,#leadAgronomistRole').each(function(i,j){
                $(j).prop('checked',false);
            });
            if(id){
                $.ajax({
                    url :   '/admin/roles/check',
                    data:   {
                        'id':id
                    },
                    type:       'get' ,
                    dataType:   'json',
                    success:function(data){
                        var role=[];
                        if(data.length>0){
                            $.each(data,function(i,v){
                                if(!role.includes(v.name)){
                                    role.push(v.name);
                                }
                            })
                        }
                        if(role.includes('ROLE_ADMIN') && role.includes('ROLE_VIEW')){
                            $('#managementRole').prop('checked',true);
                        } //if the user has managerial roles
                        if(role.length==1 && role.includes('ROLE_ADMIN')){
                            $('#adminRole').prop('checked',true);
                        } //if the user has admin roles
                        if(role.length==1 && role.includes('ROLE_AGRONOMIST')){
                            $('#normalAgronomistRole').prop('checked',true);
                        } //if the user is a normal agronomist
                        if(role.includes('ROLE_AGRONOMIST') && role.includes('ROLE_NURSERY')){
                            $('#nurseryAgronomistRole').prop('checked',true);
                        } //if the user is in charge of the nursery
                        if(role.length==1 && role.includes('ROLE_FINANCE')){
                            $('#financeRole').prop('checked',true);
                        } // if the user in in the finance department
                    }
                });
            }
            $('#permissions .modal').modal();
        }
    </script>
@endsection
