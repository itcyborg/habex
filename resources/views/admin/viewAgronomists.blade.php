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
                                                    <th width="300">ACTIONS</th>
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
                                                            <button type="button" class="btn btn-info btn-outline btn-circle m-r-5"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Reset Password" onclick="resetPassword({{$agronomist->id}})">
                                                                <i class="ti-key"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-outline btn-circle m-r-5" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Agronomist" onclick="deleteAgronomist({{$agronomist->id}})">
                                                                <i class="ti-trash"></i>
                                                            </button>
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
</div>
@endsection
@section('scripts')
    <script type="text/javascript">
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
    </script>
@endsection
