@extends('layouts.sys')
@section('styles')
    <link rel="stylesheet" href="{{asset('sys/plugins/bower_components/select2/dist/css/select2.css')}}">
    <link href="{{asset('sys/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
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
                                            <input type="number" class="form-control input-sm" id="died" name="died" min="0">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="surviving">Surviving</label>
                                            <input type="number" name="surviving" id="surviving" class="form-control input-sm" min="0">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row m-l-20">
                                            <label for="statusoftrees">Status of Trees</label>
                                            <div class="radio radio-info">
                                                <input type="radio" name="statusoftrees" id="statusoftrees" value="Poor" checked>
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
                                                <input type="radio" name="watering" id="watering" value="Sufficient" checked>
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
                                                <input type="checkbox" name="fertilizer" id="fertilizer" value="Manure" checked>
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
                                                    <input type="radio" name="measurementtype" id="measurementtype" value="KGS" checked>
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
                                        <input type="radio" name="weeding" id="weeding" checked>
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
    <div id="viewscoutings">
        <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Scouting</h4> </div>
                    <div class="modal-body">
                        <div class="table table-responsive table-condensed">
                            <table class="table-striped table-bordered table-hover" id="scoutingsdone">
                                <thead>
                                    <th>#</th>
                                    <th>Surviving</th>
                                    <th>Died</th>
                                    <th>Status of Trees</th>
                                    <th>Watering</th>
                                    <th>Fertilizer/ Chem Appl</th>
                                    <th>Fertilizer Amount Appl</th>
                                    <th>KG/GMS</th>
                                    <th>Pest/Disease</th>
                                    <th>Weeding</th>
                                    <th>Intercroping(metres)</th>
                                    <th>PH</th>
                                    <th>EC</th>
                                    <th>Observation/Notes</th>
                                    <th>Assessment Date</th>
                                    <th>Authorised By</th>
                                    <th>Updated On</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
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
    <script src="{{asset('sys/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset("sys/plugins/bower_components/select2/dist/js/select2.full.js")}}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{asset('sys/plugins/bower_components/sweetalert2/sweetalert.js')}}"></script>
    <script src="{{asset("sys/plugins/bower_components/blockUI/jquery.blockUI.js")}}"></script>
    <script>
        let view = false;
        view = "{{Auth::user()->hasRole(['ROLE_VIEW'])}}";
        var currentRecord=null;
        var stable=null;
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
                                    var action = '';
                                    if (view == false) {
                                        action += '<button class="btn btn-primary btn-circle" onclick="showScoutModal(' + farm.id + ')" data-placement="top" data-toggle="tooltip" title="Fill Scouting Form" data-original-title="Fill Scouting Form">' +
                                            '<i class="fa fa-edit"></i>' +
                                            '</button>';
                                    }
                                    rows+=
                                        '<tr>' +
                                        '<td>'+farm.id+'</td>' +
                                        '<td>'+farm.county+'</td>' +
                                        '<td>'+farm.constituency+'</td>' +
                                        '<td>'+farm.farmSize+'</td>' +
                                        '<td>'+farm.seedlingsPlanted+'</td>' +
                                        '<td>' +
                                        action +
                                        '<button class="btn btn-info btn-circle m-l-10" onclick="scoutings('+farm.id+')" data-placement="top" data-toggle="tooltip" title="View Scoutings" data-original-title="View Scoutings">' +
                                        '<i class="fa fa-list"></i>' +
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

                            $('[data-toggle="tooltip"]').tooltip();
                        },
                        error:function(data){
                            $('#farmersInfo,#farms').block({
                                message: '<h4>An Error Occured. Try again later.</h4>',
                                css: {
                                    border: '1px solid rgb(251, 150, 120)',
                                    backgroundColor: 'rgb(251, 150, 120)'
                                },
                            });
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
            var died=($('#died').val() !== '')? $('#died').val():alertMsg('Please enter a value for the number of died trees');
            var surviving=($('#surviving').val() !=='')? $('#surviving').val() :alertMsg('Please enter a value for the number of surviving trees');
            var statusOfTrees=$('#statusoftrees').val();
            var watering=$('#watering:checked').val();
            var fertilizer=[];
            $('#fertilizer:checked').each(function(i,j){
                fertilizer.push($(j).val());
            });
            var pestDiseases=$('#pestsDisease').val();
            var fertilizerAmount=isDouble($('#amountapplied').val(),'Fertilizer Amount Applied');
            var fertilizerMeasure=$('#measurementtype:checked').val();
            var weeding=$('#weeding:checked').val();
            var intercropping=isDouble($('#intercropping').val(),'Intercropping');
            var observation=$('#observation').val();
            var assessmentDate=($('#date').val()!==null && $('#date').val().trim()!=='')?$('#date').val():alertMsg('Please enter the assessment date');
            var ph=isDouble($('#ph').val(),'PH field');
            var ec=isDouble($('#ec').val(),'EC field');
            $.ajax({
                url:"{{url('/cropinfo/scout')}}",
                type:'post',
                dataType:'json',
                data:{
                    '_token':"{{csrf_token()}}",
                    'farmid': currentRecord,
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
                    if (data.status) {
                        alert(data.msg);
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }

        var srow='';
        function scoutings(id) {
            $.ajax({
                url     :   '/scoutings/'+id,
                type    :   'get',
                dataType:   'json',
                success :   function(data){
                    if(data.scoutings.length>0) {
                        $.each(data.scoutings, function (k, v) {
                            srow+='<tr>' +
                                '<td>'+v.id+'</td>' +
                                '<td>'+v.surviving+'</td>' +
                                '<td>'+v.died+'</td>' +
                                '<td>'+v.statusOfTrees+'</td>' +
                                '<td>'+v.watering+'</td>' +
                                '<td>'+JSON.parse(v.fertilizerChemApp)+'</td>' +
                                '<td>'+v.fertilizerAmountApp+'</td>' +
                                '<td>'+v.fertilizerAppMeasurement+'</td>' +
                                '<td>'+v.pestDisease+'</td>' +
                                '<td>'+v.weeding+'</td>' +
                                '<td>'+v.intercropping+'</td>' +
                                '<td>'+v.PH+'</td>' +
                                '<td>'+v.EC+'</td>' +
                                '<td>'+v.observationsNotes+'</td>' +
                                '<td>'+v.assessmentDate+'</td>' +
                                '<td>'+getAuthorised(v.email)+'</td>' +
                                '<td>'+v.updated_at+'</td>' +
                                '</tr>';
                        });
                        $('#scoutingsdone tbody').html(srow);
                        if(! $.fn.dataTable.isDataTable( '#scoutingsdone' )) {
                            stable = $('#scoutingsdone').dataTable({
                                responsive: true
                            });
                        }else{
                            stable.destroy();
                            stable=null;
                            stable = $('#scoutingsdone').dataTable({
                                responsive: true
                            });
                        }
                        $('#viewscoutings .modal').modal();
                    }else{
                        swal({
                            type:'warning',
                            title:'Error',
                            text:'Cannot find any scoutings done for the farm selected',
                        });
                    }
                }
            });
        }

        function getAuthorised(id){
            if(id===0 || id==null){
                return 'Pending';
            }else{
                return id;
            }
        }
    </script>
@endsection
