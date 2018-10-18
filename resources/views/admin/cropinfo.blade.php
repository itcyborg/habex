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
    <div id="scoutModal">
        <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Scouting Form</h4> </div>
                    <div class="modal-body">
                        <form action="{{url('/cropinfo/scout')}}" method="post" enctype="multipart/form-data" id="scoutingForm" onsubmit="processForm()">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4 pull-right m-b-20">
                                        <label for="date">Assessment Date</label>
                                        <input type="date" name="date" id="date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4 form-inline">
                                        <h3>Number of Trees</h3>
                                        <div class="col-md-6">
                                            <label for="died">Died</label>
                                            <input type="number" class="form-control input-sm" id="died" name="died">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="surviving">Surviving</label>
                                            <input type="number" name="surviving" id="surviving" class="form-control input-sm">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row m-l-20">
                                            <label for="statusoftrees">Status of Trees</label>
                                            <div class="radio radio-info">
                                                <input type="radio" name="statusoftrees" id="statusoftrees" value="Poor">
                                                <label for="statusoftrees"> Poor </label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" name="statusoftrees" id="statusoftrees" value="Good">
                                                <label for="statusoftrees"> Good </label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" name="statusoftrees" id="statusoftrees" value="Excellent">
                                                <label for="statusoftrees"> Excellent </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Watering">Watering</label>
                                        <div class="row m-t-10 m-l-20">
                                            <div class="radio radio-info">
                                                <input type="radio" name="watering" id="watering" value="Sufficient">
                                                <label for="watering"> Sufficient</label>
                                            </div>
                                            <div class="radio radio-info">
                                                <input type="radio" name="watering" id="watering" value="Insufficient">
                                                <label for="watering"> Insufficient</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <h4 class="text-center">Fertilizer & Chem App</h4>
                                        <div class="col-md-6">
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input type="checkbox" name="fertilizer" id="fertilizer" value="Manure">
                                                <label for="fertilizer">Manure</label>
                                            </div>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input type="checkbox" name="fertilizer" id="fertilizer" value="DAP">
                                                <label for="fertilizer">DAP</label>
                                            </div>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input type="checkbox" name="fertilizer" id="fertilizer" value="CAN">
                                                <label for="fertilizer">CAN</label>
                                            </div>
                                            <div class="checkbox checkbox-info checkbox-circle">
                                                <input type="checkbox" name="fertilizer" id="fertilizer" value="NPK">
                                                <label for="fertilizer">NPK</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <label for="amountapplied">Amount Applied</label>
                                                <input type="text" class="form-control input-sm" name="amountapplied" id="amountapplied">
                                            </div>
                                            <div class="row m-t-10 form-inline">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="measurementtype" id="measurementtype" value="KGS">
                                                    <label for="measurementtype">KGS</label>
                                                </div>
                                                <div class="radio radio-info">
                                                    <input type="radio" name="measurementtype" id="measurementtype" value="gms">
                                                    <label for="measurementtype">gms</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pestsDisease">Pests & Disease</label>
                                        <textarea name="pestsDisease" id="pestsDisease" class="form-control" cols="30" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row m-t-20 m-l-20">
                                <div class="col-md-6">
                                    <label for="weeding">Weeding</label>
                                    <div class="radio radio-info">
                                        <input type="radio" name="weeding" id="weeding">
                                        <label for="weeding"> Sufficient</label>
                                    </div>
                                    <div class="radio radio-info">
                                        <input type="radio" name="weeding" id="weeding" value="weeding">
                                        <label for="weeding"> Insufficient</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row p-10">
                                        <label for="intercropping">Intercropping (metres)</label>
                                        <input type="text" class="form-control input-sm" name="intercropping" id="intercropping">
                                    </div>
                                    <div class="row p-10">
                                        <div class="col-md-6">
                                            <label for="ph">PH</label>
                                            <input type="text" name="ph" id="ph" class="form-control input-sm">
                                        </div>
                                        <div class="col-md-6 m-t-5">
                                            <label for="ec">EC</label>
                                            <input type="text" name="ec" id="ec" class="form-control input-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10 p-10">
                                <label for="observation">Observations/Notes</label>
                                <textarea name="observation" id="observation" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary waves-effect text-left" onclick="processForm()"> Save</button>
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
        var currentRecord=null;
        $(document).ready(function(){
            $('#scoutingForm').on('submit',function(e){
                e.preventDefault();
                processForm();
            });
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
                                $('#farmerCode').val(data.farmer.farmerscode).prop('readonly',true);
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
                                        '<button class="btn btn-outline btn-circle" onclick="showScoutModal('+farm.id+')">' +
                                        '<i class="mdi mdi-clipboard-text"></i>' +
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

        function showScoutModal(id){
            currentRecord=id;
            $('#scoutModal .modal').modal();
        }

        function processForm(){
            var died=$('#died').val();
            var surviving=$('#surviving').val();
            var statusOfTrees=$('#statusoftrees:checked').val();
            var watering=$('#watering:checked').val();
            var fertilizer=[];
            $('#fertilizer:checked').each(function(i,j){
                fertilizer.push($(j).val());
            });
            var pestDiseases=$('#pestsDisease').val();
            var fertilizerAmount=$('#amountapplied').val();
            var fertilizerMeasure=$('#measurementtype:checked').val();
            var weeding=$('#weeding:checked').val();
            var intercropping=$('#intercropping').val();
            var observation=$('#observation').val();
            var assessmentDate=$('#date').val();
            var ph=$('#ph').val();
            var ec=$('#ec').val();
            $.ajax({
                url:"{{url('/cropinfo/scout')}}",
                type:'post',
                dataType:'json',
                data:{
                    '_token':"{{csrf_token()}}",
                    'died':died,
                    'surviving':surviving,
                    'statusOfTrees':statusOfTrees,
                    'watering':watering,
                    'ph':ph,
                    'ec':ec,
                    'pestDiseases':pestDiseases,
                    'fertilizerAmount':fertilizerAmount,
                    'fertilizerMeasure':fertilizerMeasure,
                    'weeding':weeding,
                    'intercropping':intercropping,
                    'fertilizer':fertilizer,
                    'assessmentDate':assessmentDate,
                    'observation':observation
                },
                success:function(data){
                    console.log(data);
                }
            });
        }
    </script>
@endsection
