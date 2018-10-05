@extends('layouts.sys')
@section('styles')
    <link rel="stylesheet" href="{{asset('sys/plugins/bower_components/select2/dist/css/select2.css')}}">
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
                        <h4 class="page-title">Crop Information</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Crop Information</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- .row -->

                <div class="row white-box">
                    <div class="col-md-6">


                    </div>
                    <div class="col-md-6">
                        <label class="control-label">Search Farmer</label>
                        <select name="" id="farmer" class="form-control">
                            <option value="">Search for Farmer</option>
                            @foreach($farmers as $farmer)
                                <option value="{{$farmer->id}}">{{$farmer->sirname}} {{$farmer->firstname}} {{$farmer->lastname}} (ID: {{$farmer->idnumber}})</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row white-box" id="farmersInfo">
                    <div class="bg-title">
                        <div>Farmer's Information</div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Farmer's Name</label>
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
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Mobile Number</label>
                                <input type="text" id="mobilenumber" class="form-control" placeholder="">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Farmer's Code</label>
                                <input type="text" id="farmerCode" class="form-control" placeholder="">
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->


                </div>

                <div class="row white-box" id="farms">
                    <div class="bg-title">
                        <div>Farms</div>
                    </div>
                    <div class="row">
                        <table class="table table-striped" id="farmsTable">
                            <thead>
                            <th>#</th>
                            <th>County</th>
                            <th>Farm Location</th>
                            <th>Farm Size</th>
                            <th>Seedlings Planted</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                {{--<div class="right-sidebar">--}}
                    {{--<div class="slimscrollright">--}}
                        {{--<div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>--}}
                        {{--<div class="r-panel-body">--}}
                            {{--<ul id="themecolors" class="m-t-20">--}}
                                {{--<li><b>With Light sidebar</b></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="default" class="default-theme">1</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="green" class="green-theme">2</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="gray" class="yellow-theme">3</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="blue" class="blue-theme">4</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="purple" class="purple-theme">5</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="megna" class="megna-theme">6</a></li>--}}
                                {{--<li><b>With Dark sidebar</b></li>--}}
                                {{--<br/>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="default-dark" class="default-dark-theme">7</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="green-dark" class="green-dark-theme">8</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="gray-dark" class="yellow-dark-theme">9</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="blue-dark" class="blue-dark-theme">10</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="purple-dark" class="purple-dark-theme">11</a></li>--}}
                                {{--<li><a href="javascript:void(0)" data-theme="megna-dark" class="megna-dark-theme working">12</a></li>--}}
                            {{--</ul>--}}
                            {{--<ul class="m-t-20 all-demos">--}}
                                {{--<li><b>Choose other demos</b></li>--}}
                            {{--</ul>--}}
                            {{--<ul class="m-t-20 chatonline">--}}
                                {{--<li><b>Chat option</b></li>--}}
                                {{--<li>--}}
                                    {{--<a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Sharon Cherutich <small class="text-success">online</small></span></a>--}}
                                {{--</li>--}}

                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; Habex Agro designed by GTLabs</footer>
        </div>
    <!-- /#page-wrapper -->
</div>
<!--MODAL-->
<div id="addUploads">
    <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Scouting Form</h4> </div>
                <div class="modal-body">
                    <form action="{{url('/admin/farmer/upload')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="text" name="farmerid" id="farmerid1" hidden>





























                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-wrapper collapse in" aria-expanded="true">
                                        <div class="panel-body">
                                            <div class="form-body">
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                                        <div class="white-box">
                                                            <h3 class="box-title">Soil pH</h3>
                                                            <input type="file" id="passport" name="passport" class="dropify" /> </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                                        <div class="white-box">
                                                            <h3 class="box-title">Soil Test Result Form Upload</h3>
                                                            <input type="file" id="contractform" name="contractform" class="dropify" /> </div>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                                        <div class="white-box">
                                                            <h3 class="box-title">ID Scan-Front</h3>
                                                            <input type="file" id="idfront" name="idfront" class="dropify" /> </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-xs-12">
                                                        <div class="white-box">
                                                            <h3 class="box-title">ID Scan-Back</h3>
                                                            <input type="file" id="idback" name="idback" class="dropify" /> </div>
                                                    </div>
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary"><i class="fa fa-save"></i> Upload Documents</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{asset("sys/plugins/bower_components/select2/dist/js/select2.full.js")}}"></script>
    <script src="{{asset("sys/plugins/bower_components/blockUI/jquery.blockUI.js")}}"></script>
    <script>
        $(document).ready(function(){
            $('#farmer').select2(
                {
                    'width':'100%'
                }
            );
            var blocked=$('#farmersInfo,#farms').block({
                message: '<h4>Select a farmer first</h4>',
                css: {
                    border: '1px solid #fff'
                },
            });
            $('#farmer').on('change',function(){
                if($(this).val()!==""){
                    //ajax to get the rest of the data
                    $.ajax({
                        url: '{{url("/admin/farmer/search")}}',
                        type:'get',
                        data:{
                            'farmer':$(this).val(),
                        },
                        dataType:'json',
                        beforeSend:function(){
                            $('#farmersInfo,#farms').block({
                                message: '<h4><img src="{{asset('sys/plugins/images/busy.gif')}}" alt=""> Processing ...</h4>',
                                css: {
                                    border: '1px solid #fff'
                                },
                            });
                        },
                        success:function(data){
                            if(data.farmer){
                                $('#farmersInfo').unblock();
                                $('#farmerName').val(data.farmer.sirname+' '+data.farmer.firstname+' '+data.farmer.lastname).prop('readonly',true);
                                $('#idnumber').val(data.farmer.idnumber).prop('readonly',true);
                                $('#mobilenumber').val(data.farmer.mobilenumber).prop('readonly',true);
                                $('#farmerCode').val(data.farmer.id).prop('readonly',true);
                            }
                            if(data.farms.length>0){
                                var rows='';
                                $.each(data.farms,function(index,farm){
                                    rows+=
                                        '<tr>' +
                                            '<td>'+farm.id+'</td>' +
                                            '<td>'+farm.county+'</td>' +
                                            '<td>'+farm.constituency+'</td>' +
                                            '<td>'+farm.farmSize+'</td>' +
                                            '<td>'+farm.seedlingsPlanted+'</td>' +
                                            '<td>' +
                                                '<button class="btn btn-outline btn-circle" onclick="showmodal()">' +
                                                    '<i class="fa fa-edit"></i>' +
                                                '</button>' +
                                            '</td>' +
                                        '</tr>';
                                });
                                $('#farmsTable').find('tbody').html(rows);
                                $('#farms').unblock();
                            }else{
                                $('#farms').block({
                                    message: '<h4>No Farms Found</h4>',
                                    css: {
                                        border: '1px solid #fff'
                                    },
                                });
                            }
                        },
                        error:function(data){
                            $('#farmersInfo,#farms').block({
                                message: '<h4>An Error Occured. Try again later.</h4>',
                                css: {
                                    border: '1px solid rgb(251, 150, 120)',
                                    backgroundColor: 'rgb(251, 150, 120)'
                                },
                            });
                            console.log(data);
                        }
                    });
                }else{
                    $('#farmersInfo,#farms').block({
                        message: '<h4>No Farmer Selected. Select a farmer first</h4>',
                        css: {
                            border: '1px solid #fff'
                        },
                    });
                }
            });
        });

        function showmodal(){
            $('#addUploads .modal').modal();
        }
    </script>
@endsection
