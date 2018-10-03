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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

Auth::routes();
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

Route::get('/admin/payroll/all',function(){
    return view('admin.viewPayroll');
});


Route::get('/admin/leave/all','AdminController@leave');
Route::get('/agronomist/leave/all','AgronomistController@leave');

Route::post('/leave/request','LeaveController@request');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/settings','SettingsController@index');

//Ajax Calls

Route::get('/counties','HomeController@counties');
Route::post('/counties/ward','HomeController@wards');
Route::get('/admin/leave/{id}','AdminController@leaveSearch');
Route::post('admin/payroll/add','PayrollController@add')->middleware('role:ROLE_ADMIN');;
Route::get('admin/employees','AdminController@employees')->middleware('role:ROLE_ADMIN');
Route::get('admin/employee/salary','AdminController@employeesSalaries')->middleware('role:ROLE_ADMIN');;
