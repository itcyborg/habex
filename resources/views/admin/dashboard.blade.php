@extends('layouts.sys')
@section('styles')
    <link href="{{asset('sys/plugins/bower_components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div id="wrapper">
        <!-- Top Navigation -->
        @include('layouts.header')
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        @include('layouts.sidebar')
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4> </div>
                    <!-- /.page title -->
                    <!-- .breadcrumb -->
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>

                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Home</li>
                        </ol>
                    </div>
                    <!-- /.breadcrumb -->
                </div>
                <!--Charts -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">CROP INFO SUMMARY</h3>
                            <div id="cropinfo-donut-chart"></div>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">REGISTERED FARMERS PER COUNTY</h3>
                            <div id="farmerinfo-donut-chart"></div>
                        </div>
                    </div>


                    <div class="col-md-4 col-lg-4 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title text-center">CULTIVATED ACREAGE PER COUNTY</h3>
                            <div id="acreageinfo-donut-chart"></div>
                        </div>
                    </div>

                </div>
                <!-- .row -->


                <!-- .row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Crop Statistics</h3>
                            <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                            <div class="table-responsive">
                                <table id="dashtable" class="display nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>County</th>
                                        <th>Registered Farmers</th>
                                        <th>Seedlings Issued</th>
                                        <th>Surviving Seedlings</th>
                                        <th>Dried Seedlings</th>
                                        <th>Replaced Seedlings</th>
                                        <th>% Suceess</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>County</th>
                                        <th>Registered Farmers</th>
                                        <th>Seedlings Issued</th>
                                        <th>Surviving Seedlings</th>
                                        <th>Dried Seedlings</th>
                                        <th>Replaced Seedlings</th>
                                        <th>% Suceess</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <tr>
                                        <td>Uasin Gishu</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Elgeyo Marakwet</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Trans Nzoia</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Nandi</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    <tr>
                                        <td>Kericho</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>

                                    <tr>
                                        <td>Baringo</td>
                                        <td>12000</td>
                                        <td>1200000</td>
                                        <td>1100000</td>
                                        <td>100000</td>
                                        <td>80000</td>
                                        <td>80%</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                </div>
                <!-- .row -->

                <!-- .row -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service  <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                            <ul class="m-t-20 chatonline">
                                <li><b>Chat option</b></li>
                                <li>
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; Habex Agro designed by GTLabs</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
@endsection

@section('scripts')
    <!--Morris JavaScript -->
    <script src="{{asset('sys/plugins/bower_components/raphael/raphael-min.js')}}"></script>
    <script src="{{asset('sys/plugins/bower_components/morrisjs/morris.js')}}"></script>
    <script src="{{asset('sys/js/morris-data.js')}}"></script>

    <script src="{{asset('sys/plugins/bower_components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#dashtable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>


@endsection


