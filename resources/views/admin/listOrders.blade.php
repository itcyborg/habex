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
                <div class="row bg-title hidden-print">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Financial</a></li>
                            <li class="active">Invoices</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row" id="orderslist">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3>ORDERS</h3>
                            <div class="table-responsive">
                                <table class="table table-condensed table-striped table-active">
                                    <thead>
                                        <th>#</th>
                                        <th>Placed On</th>
                                        <th>Farmer</th>
                                        <th>Description</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{$order->orderNo}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->farmerId}}</td>
                                            <td>{{$order->description}}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm" onclick="getInvoice('{{$order->orderNo}}')"><i class="fa fa-file"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="invoiceView" class="row">
                    <div class="col-md-12">
                        <div class="white-box printableArea">
                            <div class="row hidden-print">
                                <button class="btn btn-outline btn-danger pull-right" onclick="closeInvoice()">
                                    <i class="fa fa-close"></i>
                                </button>
                            </div>
                            <!--<h3><b>INVOICE</b> <span class="pull-right" id="orderNo"></span></h3>-->
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                        <address>
                                            <h3> &nbsp;<b class="text-danger">HABEX AGRO LIMITED</b></h3>
                                            <p class="text-muted m-l-5">Annex Stabex Station,Nairobi Rd,
                                                <br/> P.O.BOX 4689-30100, Eldoret, Kenya.
                                                <br/> Office:0748236616 | Sales:0704614261,</p>
                                        </address>
                                    </div>
                                    <div class="pull-right text-right">
                                        <address>
                                            <h3><b>INVOICE</b> <span class="pull-right" id="orderNo"></span></h3>
                                            <!--<h3>To,</h3>
                                            <h4 class="font-bold"><span id="name"></span></h4>-->
                                            <p class="m-t-30">
                                                <b>Invoice Date :</b>
                                                <i class="fa fa-calendar"></i> <span id="date"></span>
                                            </p>
                                            <p><b>Due Date :</b> <i class="fa fa-calendar"></i> <span id="duedate"></span></p>

                                        </address>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="pull-left text-left">
                                        <h3>To:</h3>
                                        <h4 class="font-bold"><span id="name"></span></h4>
                                        <h5 class="font-bold"><span id="name"></span>Chepkorio, Uasin Gishu</h5>
                                        <h5 class="font-bold"><span id="name">0734568790</span></h5>

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover table-striped table-bordered" id="#">
                                            <thead>
                                            <tr>
                                                <th class="text-center">SALES PERSON</th>
                                                <th class="text-center">MOBILE NUMBER</th>
                                                <th class="text-center">REQUISITIONER</th>
                                                <th class="text-center">MOBILE NUMBER</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span id="salesperson"></span></td>
                                                    <td><span id="salescontact"></span></td>
                                                    <td><span id="farmer"></span></td>
                                                    <td><span id="farmercontact"></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover table-striped table-bordered" id="invoiceTable">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Description</th>
                                                <th class="text-right">Quantity</th>
                                                <th class="text-right">Unit Cost</th>
                                                <th class="text-right">Tax (%)</th>
                                                <th class="text-right">Discount (%)</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <h3>
                                            <b>Total :</b>
                                            <span id="total"></span>
                                        </h3><br>
                                        <h4>
                                            <b>Tax :</b>
                                            <span id="tax"></span>
                                        </h4><br>
                                        <h4>
                                            <b>Discount :</b>
                                            <span id="discount"></span>
                                        </h4>
                                        <hr>
                                        <h2>
                                            <b>Total (Net) :</b>
                                            <span id="net"></span>
                                        </h2>
                                    </div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="text-right hidden-print">
                                        @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                                        <button class="btn btn-danger" type="submit"> Proceed to payment </button>
                                        @endif
                                        <button id="print" class="btn btn-default btn-outline" type="button" onclick="printInvoice()"> <span><i class="fa fa-print"></i> Print</span> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .row -->
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar hidden-print">
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
                                    <a href="javascript:void(0)"><img src="../plugins/images/users/varun.jpg" alt="user-img" class="img-circle"> <span>Varun Dhavan <small class="text-success">online</small></span></a>
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
            $('#invoiceView').hide();
        });

        function closeInvoice(){
            $('#invoiceView').slideUp();
            $('#orderslist').slideDown();
        }

        function printInvoice(){
            window.print();
        }

        function calcTotal(total,tax,discount){
            var tax=total*tax/100;
            var taxed=total+tax;
            var disc=taxed*discount/100;
            var tt=taxed-disc;
            return {
                'tax':tax,
                'taxed':taxed,
                'discount':disc,
                'total':tt
            };
        }

        function numb(data){
            return (data).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,')+'/=';
        }

        function getInvoice(invoiceno){
            getSalesDetails(invoiceno);
            $.ajax({
                url:"{{url('/admin/order/view/')}}/"+invoiceno,
                type:'get',
                success:function(data){
                    if(data.length>0){
                        $('#invoiceView').slideDown();
                        $('#orderslist').slideUp();
                        $('#orderNo').text('#'+invoiceno);
                        let rows='';
                        let total=0;
                        let discount=0;
                        let tt=0;
                        let tax=0;
                        let duedate='',
                            orderDate='',
                            name='';
                        let contact='';
                        $.each(data,function(i,k){
                            rows+='<tr><td>'+(++k.itemNo)+'</td><td>'+k.description+'</td><td>'+k.quantity+'</td><td>'+k.unitCost+'</td><td>'+k.tax+'</td><td>'+k.discount+'</td><td>'+k.total+' (+ VAT: '+calcTotal(k.total,k.tax,k.discount).tax+')</td></tr>';
                            total+=k.total;
                            discount+=calcTotal(k.total,k.tax,k.discount).discount;
                            tt+=calcTotal(k.total,k.tax,k.discount).total;
                            tax+=calcTotal(k.total,k.tax,k.discount).tax;
                            duedate=k.dueDate;
                            orderDate=k.created_at;
                            name=k.sirname+','+ k.firstname+' '+k.lastname;
                            contact=k.mobilenumber;
                        });
                        $('#invoiceTable tbody').html(rows);
                        $('#total').text(numb(total));
                        $('#discount').text(numb(discount));
                        $('#net').text(numb(tt));
                        $('#tax').text(numb(tax));
                        $('#duedate').text(duedate);
                        $('#date').text(orderDate);
                        $('#name,#farmer').text(name);
                        $('#farmercontact').text('0'+contact);
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        }

        function getSalesDetails(invoiceno) {
            $.ajax({
                url: "{{url('/admin/order/viewSales/')}}/" + invoiceno,
                type: 'get',
                success: function (data) {
                    if (data.length > 0) {
                        $.each(data,function(i,j){
                            if(j.firstname!==null) {
                                $('#salescontact').text(j.mobilenumber);
                                $('#salesperson').text(j.sirname + ', ' + j.firstname + ' ' + j.lastname);
                            }
                        });
                    }
                }
            });
        }
    </script>
@endsection
