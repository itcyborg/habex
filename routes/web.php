<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    use App\Farm;
    use App\Farmers;
    use Illuminate\Support\Facades\Artisan;
    use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

Auth::routes();
//Route::get('/pay',function (){
//    $pass='habexagro2018';
//    dd(Hash::make($pass));
//});
Route::get('/',function(){
    if(!Auth::check()){
        return redirect('login');
    }else{
        return redirect('home');
    }
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin','AdminController@index');
Route::post('/admin/farm/add','AdminController@addFarm');
Route::post('/agronomist/farm/add','AgronomistController@addFarm');

Route::get("/admin/updateinfo",'AdminController@updateInfo');
Route::post("/admin/updateInfo",'AdminController@updateDetails');

Route::get('/admin/agronomist/add','AdminController@agronomistForm');
Route::post('/admin/agronomist/add','AdminController@add');
Route::get('/admin/agronomists','AdminController@viewAgronomists');

Route::get('/admin/farmer/add','AdminController@farmerForm');
Route::get('/admin/farmers','AdminController@viewFarmers');
Route::post('/admin/farmer/add','FarmersController@add');

Route::get('/admin/order/add','AdminController@orderForm');
Route::get('/admin/orders','AdminController@viewOrders');
Route::post('/admin/order/add','OrderController@newOrder');
Route::get('/admin/order/view/{id}','OrderController@view');
Route::get('/admin/order/viewSales/{id}','OrderController@getSalesInfo');

Route::get('/admin/farminfo','AdminController@cropInfo');
Route::get('/admin/farmer/search','AdminController@search');

Route::post('/admin/farmer/upload','FarmersController@upload');
Route::get('/admin/farmer/delete/{id}','AdminController@deleteFarmer');

Route::get('/admin/agronomist/reset/{id}','AdminController@reset');
Route::get('/admin/agronomist/delete/{id}','AdminController@deleteAgronomist');

Route::get('/agronomist','AgronomistController@index');
Route::post('/agronomist/farmer/upload','FarmersController@upload');

Route::get('/agronomist/agronomist/add','AgronomistController@agronomistForm');
Route::post('/agronomist/agronomist/add','AgronomistController@agronomistForm');
Route::get('/agronomist/agronomists','AgronomistController@viewAgronomists');
Route::get('/agronomist/farminfo','AgronomistController@cropInfo');

Route::get('/agronomist/farmer/add','AgronomistController@farmerForm');
Route::get('/agronomist/farmers','AgronomistController@viewFarmers');
Route::post('/agronomist/farmer/add','FarmersController@add');

Route::get('/agronomist/order/add','AgronomistController@orderForm');
Route::get('/agronomist/orders','AgronomistController@viewOrders');
Route::get('/agronomist/farmer/search','AgronomistController@search');

Route::get('/admin/payroll/add',function(){
    return view('admin.addPayroll');
});

Route::middleware(['auth','role:ROLE_ADMIN'])->group(function(){
    Route::get('/admin/salaries','SalaryController@index');
    Route::post('/admin/salaries','SalaryController@save');
});

Route::get('/admin/payroll/all','PayrollController@all');

Route::get('/admin/leave/all','AdminController@leave');
Route::get('/agronomist/leave/all','AgronomistController@leave');

Route::post('/leave/request','LeaveController@request');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings','SettingsController@index');

// items routes
Route::get('/admin/order/addItem','ItemsController@addItem');
Route::post('/admin/order/addItem','ItemsController@storeItem');
Route::get('/admin/order/listItems','ItemsController@listItems');

//Ajax Calls

Route::get('/counties','HomeController@counties');
Route::post('/counties/ward','HomeController@wards');
Route::get('/admin/leave/{id}','AdminController@leaveSearch');
Route::post('admin/payroll/add','PayrollController@add')->middleware('role:ROLE_ADMIN');;
Route::get('admin/employees','AdminController@employees')->middleware('role:ROLE_ADMIN');
Route::get('admin/employee/salary','AdminController@employeesSalaries')->middleware('role:ROLE_ADMIN');
Route::get('items/list','ItemsController@getItems');
Route::get('/admin/payslip/delete/{id}','PayrollController@delete')->middleware(['auth','role:ROLE_ADMIN']);
Route::get('/admin/payslip/process/{id}','PayrollController@process')->middleware(['auth','role:ROLE_ADMIN']);
Route::post('/cropinfo/scout','ScoutingController@add');

Route::post('/password/change','SettingsController@changePass');

Route::middleware(['auth'])->group(function(){
    Route::get('/farmer/view/{id}', 'FarmersController@view');
    Route::post('/farmer/update/account','FarmersController@updateAccount');
    Route::get('/scoutings/{id}','ScoutingController@getScouting');
//    Route::get('/scoutings/authorizers/{id}','ScoutingController@authorizers');
});

# statistics
Route::get('/statistics/farmers','StatisticsController@farmersPerCounty');
Route::get('/statistics/acreage','StatisticsController@acreageByCounty');
Route::get("/statistics/cropInfo",'StatisticsController@cropInfoChart');
Route::get("/statistics/cropStats",'StatisticsController@cropInfoStats');


//Route::get('/import',function(){
//    $handle=fopen($_SERVER['DOCUMENT_ROOT'].'/new habex 26th.csv','r');
//    ini_set('max_execution_time', 300);
//    for($i=0;$i<706;$i++)
//    {
//        $line=fgetcsv($handle);
//        if($i>0) {
//            $farmercode = $line[1];
//            $farmername = explode(' ', $line[2]);
//            $id = $line[3];
//            $contact = $line[4];
//            $seedlings = $line[5];
//            $acres = (isset($line[6])) ?
//                (($line[6]) !== '')
//                    ? $line[6] : 0 : 0;
//            $ward = $line[7];
//            $location = $line[8];
//            $county=strtoupper($line[9]);
//            $farmer = new Farmers;
//            $farmer->firstname = $farmername[0];
//            $farmer->lastname = $farmername[1];
//            $farmer->sirname = (isset($farmername[2])) ? $farmername[2] : ' ';
//            $farmer->idnumber = $id;
//            $farmer->mobilenumber = $contact;
//            $farmer->farmerscode = $farmercode;
//            if ($farmer->save()) {
//                $farm = new Farm;
//                $farm->county = $county;
//                $farm->farmer_id = $farmer->id;
//                $farm->ward = $ward;
//                $farm->location = $location;
//                $farm->farmSize = $acres;
//                $farm->seedlingsPlanted = $seedlings;
//                if ($farm->save()) {
//                    echo "Record $i saved <br>";
//                }
//            }
////            echo $i.'.'.$county.'<br>';
//        }
//    }
//});
//Route::get('/fiximport',function(){
//    $farmers=Farm::all();
//    foreach ($farmers as $farmer){
//        $farmer->county=strtoupper($farmer->county);
//        $farmer->save();
//    }
//});