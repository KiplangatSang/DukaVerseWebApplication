<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MpesaController;
use App\Http\Controllers\FcmCloudMessagingController;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\stock\stockController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stk', function () {
    return view('stk');
});

Route::get('/houses', function () {
    return view('houses');
});

Route::post('get-token', [MpesaController::class, 'getAccessToken']);

Route::post('register-Urls', [MpesaController::class, 'registerUrls']);

Route::post('simulate', [MpesaController::class, 'simulateTransaction']);

Route::post('send-fcm-token', [FcmCloudMessagingController::class,'firebaseTokenStorage']);

Route::patch('/fcm-token', [FcmCloudMessagingController::class, 'updateToken'])->name('fcmToken');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//sales
Route::get('/createsales', [SalesController::class, 'showCreateSales']);
Route::get('/updatesales',[SalesController::class, 'update']);
Route::get('/showallsales',[SalesController::class, 'show'] );
Route::get('/salesitemsoncredit', [SalesController::class, 'showSoldItemsOnCredit']);
Route::get('/view-emp-sales',[SalesController::class, 'showEmpSales'] );
Route::get('/deletesales', [SalesController::class, 'delete']);
Route::get('/view-retail-sales', [SalesController::class, 'updateToken']);
Route::get('/soldPaidItems', [SalesController::class, 'showPaidSoldItems']);

//stock
Route::get('/create-stock', [stockController::class, 'create'])->name('createstock');
Route::get('/show-all-stock', [stockController::class, 'index'])->name('showstock');
