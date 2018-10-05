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
                        <h4 class="page-title">New Order</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Financials</a></li>
                            <li class="active">New Order</li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="white-box">
                            <h3 class="box-title">New Order</h3>
                            <form action="{{url('/admin/order/add')}}" method="post" id="orderForm">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="farmer">Farmer</label>
                                            <select name="farmer" id="farmer" class="form-control">
                                                <option value="">Select Farmer</option>
                                                @foreach($farmers as $farmer)
                                                    <option value="{{$farmer->id}}">{{$farmer->firstname}} {{$farmer->sirname}} (ID: {{$farmer->idnumber}})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dueDate">Due Date</label>
                                            <input type="date" name="dueDate" id="dueDate" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group table-responsive">
                                        <table class="table table-condensed table-hover table-striped" id="itemsTable">
                                            <thead>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Unit Cost</th>
                                            <th>Quantity</th>
                                            <th>Tax (%)</th>
                                            <th>Discount (%)</th>
                                            <th>Total</th>
                                            <th></th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <select name="description[]" id="description" class="form-control description" onchange="getDetails(this)">
                                                        <option value="">Select Item</option>
                                                    </select>
                                                </td>
                                                <td><span></span></td>
                                                <td>
                                                    <input type="number" name="quantity[]" id="quantity" class="form-control input-sm" onchange="calcTotal(this)">
                                                </td>
                                                <td><span></span></td>
                                                <td>
                                                    <input type="number" name="discount[]" id="discount" class="form-control input-sm" onchange="calcTotal(this)">
                                                </td>
                                                <td>
                                                    <span id="total"></span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn-outline btn-sm" type="button" onclick="removeItem(this)">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-danger btn-sm btn-outline" type="button" onclick="removeAll()"><i class="fa fa-minus"></i> Remove All</button>
                                    <button class="btn btn-primary btn-sm btn-outline" type="button" onclick="addItem()"><i class="fa fa-plus"></i> Add Item</button>
                                    <button class="btn btn-success pull-right"><i class="fa fa-save"></i> &nbsp;Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
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
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" />
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
    <script>
        let total=0;
        let rows=0;
        var items=[];

        $(document).ready(function(){
            getItems();
            $('#orderForm').submit(function(e){
                e.preventDefault();
                let data=[];
                $('#itemsTable tbody').find('tr').each(function(i,k) {
                    let item = null,
                        quantity = 0,
                        discount = 0,
                        unitCost=0,
                        tax=0;
                    var cells = $(this).find('td');
                    item = cells.eq(1).find('[name="description[]"]').val();
                    quantity = cells.eq(3).find('[name="quantity[]"]').val();
                    discount = cells.eq(5).find('[name="discount[]"]').val();
                    unitCost=cells.eq(2).find('span').text();
                    tax=cells.eq(4).find('span').text();
                    if(item!==null || item!=='') {
                        data.push(
                            {
                                'item': item,
                                'quantity': quantity,
                                'discount': discount,
                                'unitCost': unitCost,
                                'tax': tax
                            }
                        );
                    }
                });
                let farmer=$('#farmer').val();
                let duedate=$('#dueDate').val();
                if(duedate===null || duedate ==='' || farmer==='null' || farmer===null || data.length===0){
                    alert('Please fill all the details first');
                    return;
                }
                $.ajax(
                    {
                        url:"{{url('/admin/order/add')}}",
                        type:'post',
                        dataType:'json',
                        data:{
                            '_token':'{{csrf_token()}}',
                            'farmer':farmer,
                            'duedate':duedate,
                            'items':data
                        },
                        success:function(data){
                            if(data.status==200){
                                alert('Order successfully saved');
                                window.location.reload();
                            }else if(data.status==500){
                                alert(data.msg);
                            }
                        }
                    }
                )
            });
        });

        rows=$('#itemsTable tbody tr').length;
        function addItem(){
            rows=$('#itemsTable tbody tr').length;
            var options='<option value="">Select Item</option>';
            $.each(items,function(i,j){
                options+='<option value="'+j.item+'">'+j.item+'</option>';
            });
            var tr='<tr>' +
                '<td>'+(++rows)+'</td>' +
                '<td>' +
                '<select name="description[]" id="description" class="form-control description" onchange="getDetails(this)">' +
                    options +
                '</select>' +
                '</td>' +
                '<td><span></span></td>' +
                '<td>' +
                '<input type="number" name="quantity[]" id="quantity" class="form-control input-sm" onchange="calcTotal(this)">' +
                '</td>' +
                '<td><span></span></td>' +
                '<td>' +
                '<input type="number" name="discount[]" id="discount" class="form-control input-sm" onchange="calcTotal(this)">' +
                '</td>' +
                '<td>' +
                '<span id="total">0</span>' +
                '</td>' +
                '<td>' +
                '<button class="btn btn-danger btn-outline btn-sm" type="button" onclick="removeItem(this)">' +
                '<i class="fa fa-trash"></i>' +
                '</button>' +
                '</td>' +
                '</tr>';
            $('#itemsTable tbody tr:last').after(tr);
        }

        function removeItem(row){
            if($('#itemsTable tbody tr').length>1) {
                row.parentElement.parentElement.remove();
            }
        }

        function removeAll(){
            if($('#itemsTable tbody tr').length>1){
                $('#itemsTable tbody tr').each(function(i,v){
                    if($('#itemsTable tbody tr').length>1) {
                        v.remove();
                    }
                });
            }
        }

        function getItems() {
            $.ajax({
                url:"{{url('items/list')}}",
                type:'get',
                dataType:'json',
                success:function(data){
                    if(Object.keys(data).length>0){
                        items=data;
                        populateItems();
                    }
                }
            });
        }
        
        function populateItems() {
            var options='<option value="">Select Item</option>';
            $.each(items,function(i,j){
                options+='<option value="'+j.item+'" data-toggle="tooltip" title="'+j.description+'">'+j.item+'</option>';
            });
            $('.description').html(options);
        }

        function getDetails(el){
            var cells=$(el.parentNode.parentNode).find('td');
            var item=cells.eq(1).find('select').val();
            var tax=cells.eq(4).find('span');
            var unitCost=cells.eq(2).find('span');
            $.each(items,function (i,j) {
                if(j.item===item){
                    $(tax).text(j.tax);
                    $(unitCost).text(j.unitcost);
                }
            });
        }

        function calcTotal(el){
            var cells=$(el.parentNode.parentNode).find('td');
            var quantity=cells.eq(3).find('input').val();
            var discount=cells.eq(5).find('input').val();
            var item=cells.eq(1).find('select').val();
            var total=0;
            var tot=cells.eq(6).find('span');
            $.each(items,function (i,j) {
                if(j.item===item){
                    total=j.unitcost*quantity;
                    total=total-(total*discount)/100;
                }
            });
            $(tot).text(total);
        }
    </script>
@endsection
