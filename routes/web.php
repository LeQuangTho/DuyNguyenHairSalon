<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/','Admin\HomeAdminController@index');
// Route::get('/','Admin\LoginController@index')->name('users.index');


Route::get('/','Web\HomeController@index');
Route::get('/Home','Web\HomeController@index');
Route::get('/Book-Now','Web\HomeController@CheckLogin');

Route::get('/Booking','Web\BookingController@index');
Route::post('/completebooking','Web\BookingController@completebooking');

Route::get('/Store','Web\StoreController@index');

Route::get('/collections','Web\CollectionsController@index');

Route::get('search','Web\SearchController@SearchProduct');

Route::get('/product-details','Web\ProductDetailsController@index');
Route::get('/Add-Cart/{id}/{num}','Web\ProductDetailsController@AddCart');
Route::get('/Delete-Item-Cart/{id}','Web\ProductDetailsController@DeleteItemCart');
Route::post('/Add-Product-Buy','Web\ProductDetailsController@AddProductBuy');

Route::get('/Shooping-Cart','Web\ShoopingCartController@index');
Route::post('/Update-Item-Cart/{id}/{quanty}','Web\ShoopingCartController@UpdateCart');
Route::post('/Delete-Item-Shooping-Cart/{id}','Web\ShoopingCartController@DeleteItemShoopingCart');

Route::get('/Checkout','Web\CheckoutController@Checkout');
Route::post('/purchase','Web\CheckoutController@purchase');

Route::get('/Check-User','Web\LoginController@CheckUser');
Route::post('/Login','Web\LoginController@Login');
Route::post('/Add-Account','Web\LoginController@AddAccount')->name('addaccount');

Route::get('/Logout','Web\LoginController@Logout');
Route::get('/History-User','Web\HistoryUser@index');
Route::get('/Blog',function(){
    return view('Web/Blog');
});

//admin
Route::get('/admin','Admin\LoginController@index')->name('login');
Route::post('/Login-Admin','Admin\LoginController@LoginAdmin');

Route::middleware('AdminRole')->group(function(){
    Route::get('/Home-Admin','Admin\HomeAdminController@index');
    Route::get('/Booking-List','Admin\BookingListController@index');
    Route::post('/Booking-Date','Admin\BookingListController@GetBookingDate');
    Route::post('/Booking-Complete','Admin\BookingListController@BookingComplete');
    Route::get('/Details-Task/{id}','Admin\BookingListController@DetailsTask');
});