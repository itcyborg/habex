<!-- .row -->
<div class="row white-box">
    <div class="col-sm-12 col">
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row form-group">
                                <h3 class="box-title">Password</h3>
                                <div class="col-md-3">
                                    <input type="password" class="form-control form-control-line" id="password" name="password" placeholder="New Password">
                                </div>
                                <div class="col-md-3">
                                    <input type="password" class="form-control form-control-line" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm Password">
                                </div>
                                <div class="col-md-3">
                                    <input type="password" name="currentPassword" id="currentPassword" class="form-control form-control-line" placeholder="Current Password">
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-primary btn-outline btn-rounded" type="button" onclick="Password.change({{Auth::user()->id}})">Update Password</button>
                                </div>
                            </div>
                            <div class="row p-t-30 m-t-30">
                                <h3 class="box-title">Leave History</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--./row-->
    </div>
</div>
<!-- /.row -->
<script>
    var token="{{csrf_token()}}";
</script>