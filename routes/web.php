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


Route::get('/agronomist','AgronomistController@index');

Route::get('/agronomist/agronomist/add','AgronomistController@agronomistForm');
Route::post('/agronomist/agronomist/add','AgronomistController@agronomistForm');
Route::get('/agronomist/agronomists','AgronomistController@viewAgronomists');


Route::get('/agronomist/farmer/add','AgronomistController@farmerForm');
Route::get('/agronomist/farmers','AgronomistController@viewFarmers');

Route::get('/agronomist/order/add','AgronomistController@orderForm');
Route::get('/agronomist/orders','AgronomistController@viewOrders');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
