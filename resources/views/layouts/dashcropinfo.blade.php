<style>
    a.dt-button.buttons-print,a.dt-button.buttons-pdf,a.dt-button.buttons-excel{
        background: #fff;
        border:2px solid #13dafe;
        color: black;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        -webkit-transition-duration: 0.4s; /* Safari */
        transition-duration: 0.4s;
    }
    a.dt-button.buttons-print:hover,a.dt-button.buttons-excel:hover,a.dt-button.buttons-pdf:hover{
        background: #13dafe;
        color: #fff;
        border: 2px solid #13dafe;
    }
</style>
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
                        <th>Died Seedlings</th>
                        <th>% Suceess</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>County</th>
                        <th>Registered Farmers</th>
                        <th>Seedlings Issued</th>
                        <th>Surviving Seedlings</th>
                        <th>Died Seedlings</th>
                        <th>% Suceess</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->