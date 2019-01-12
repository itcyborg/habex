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
                    <h4 class="page-title">Settings</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Settings</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- .row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <!--.row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="row table-responsive">
                                    <table class="table table-striped table-hover table-condensed">
                                        <thead>
                                            <th>#</th>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Tax (%)</th>
                                            <th>Created On</th>
                                            <th>Updated On</th>
                                            @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                                            <th>Actions</th>
                                            @endif
                                        </thead>
                                        <tbody>
                                            @foreach($items as $item)
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->item}}</td>
                                                    <td>{{$item->description}}</td>
                                                    <td>{{$item->tax}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>{{$item->updated_at}}</td>
                                                    <td>
                                                        @if(Auth::user()->hasRole(['ROLE_ADMIN']) && !Auth::user()->hasRole(['ROLE_VIEW']))
                                                            <button class="btn btn-info btn-circle btn-outline-inverse m-r-10"
                                                                    onclick="Item.edit({{$item->id}})">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                            <button class="btn btn-danger btn-circle btn-outline-inverse m-r-10"
                                                                    onclick="Item.delete({{$item->id}})">
                                                            <i class="fa fa-trash-o"></i>
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
                        <!--./row-->
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
                                <a href="javascript:void(0)"><img src="{{asset('sys/plugins/images/users/varun.jpg')}}" alt="user-img" class="img-circle"> <span>Sharon Cherutich <small class="text-success">online</small></span></a>
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
<div id="editItem">
    <div class="modal fade bs-example-modal-lg in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Item</h4>
                </div>
                <div class="modal-body">
                    <div class="row" id="loadingStatus"><span></span></div>
                    <form id="editItemForm">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Edit Item <br>
                                <small class="text text-info">All Fields are required</small>
                            </div>
                            <div class="panel-wrapper collapse in">
                                <div class="panel-body m-b-0">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label for="id">Item ID</label>
                                            <input type="text" class="form-control" id="id" name="id" readonly>
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="name">Item Name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="unitCost">Unit Cost</label>
                                            <input type="number" name="unitCost" id="unitCost" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tax">Tax (%)</label>
                                            <input type="text" name="tax" id="tax" class="form-control" value="0">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description"
                                                      class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect text-left"
                            onclick="Item.update(currentItem)"><i class="fa" id="loadingStatus" hidden></i> Update
                    </button>
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
@endsection
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="{{asset('sys/plugins/bower_components/select2/dist/js/select2.full.js')}}"></script>
    <script>
        let currentItem = null;
        Item = {
            edit: function (id) {
                currentItem = id;
                $('#id').val(currentItem);
                $.ajax({
                    url: '/item/list/' + currentItem,
                    type: 'get',
                    dataType: 'json',
                    beforeSend: function () {
                        $('#loadingStatus').fadeIn();
                        $('#loadingStatus').addClass('alert alert-warning');
                        $('#loadingStatus span').text('Loading. Please wait.');
                    },
                    success: function (data) {
                        $('#loadingStatus').removeClass('alert-warning').addClass('alert alert-success');
                        $('#loadingStatus span').text('Success');
                        setTimeout(function () {
                            $('#loadingStatus').fadeOut();
                        }, 3000);
                        $('#name').val(data.item);
                        $('#unitCost').val(data.unitcost);
                        $('#description').val(data.description);
                        $('#tax').val(data.tax);
                    }
                });
                $('#editItem .modal').modal();
            },
            update: function (id) {
                $.ajax({
                    url: '/item/list/' + currentItem,
                    type: 'post',
                    dataType: 'json',
                    data: {
                        '_token': '{{csrf_token()}}',
                        'item': $('#name').val(),
                        'unitcost': $('#unitCost').val(),
                        'tax': $('#tax').val(),
                        'description': $('#description').val()
                    },
                    beforeSend: function () {
                        $('#loadingStatus').fadeIn();
                        $('#loadingStatus').addClass('alert alert-warning');
                        $('#loadingStatus span').text('Saving changes. Please wait.');
                    },
                    success: function (data) {
                        if (data.status) {
                            $('#loadingStatus').removeClass('alert-warning').addClass('alert alert-success');
                            $('#loadingStatus span').text('Success. Your changes have been saved successfully.');
                            setTimeout(function () {
                                $('#loadingStatus').fadeOut();
                            }, 3000);
                        } else {
                            $('#loadingStatus').removeClass('alert-warning').addClass('alert alert-danger');
                            $('#loadingStatus span').text(data.error);
                        }
                    }
                });
            },
            delete: function (id) {
                if (confirm('You are about to delete item no: ' + id + '. Are you sure you want to continue?') === true) {
                    $.ajax({
                        url: '/item/delete/' + id,
                        type: 'get',
                        success: function (data) {
                            alert(data);
                        }
                    });
                }
            }
        }
    </script>
@endsection
