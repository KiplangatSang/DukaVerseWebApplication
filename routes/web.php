<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MpesaController;
use App\Http\Controllers\FcmCloudMessagingController;
use App\Http\Controllers\Loans\LoansController;
use App\Http\Controllers\Retails\RetailsController;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\stock\requiredItemsController;
use App\Http\Controllers\stock\stockController;
use App\Retails\Retail;
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
Route::post('/create-sales-item', [SalesController::class, 'create']);
Route::get('/updatesales',[SalesController::class, 'update']);
Route::get('/showallsales',[SalesController::class, 'index'] );
Route::get('/sales-item/{id}',[SalesController::class, 'show'] );
Route::get('/salesitemsoncredit', [SalesController::class, 'showSoldItemsOnCredit']);
Route::get('/view-emp-sales',[SalesController::class, 'showEmpSales'] );
Route::get('/deletesales{id}', [SalesController::class, 'delete']);
Route::get('/view-retail-sales', [SalesController::class, 'updateToken']);
Route::get('/soldPaidItems', [SalesController::class, 'showPaidSoldItems']);
Route::post('/sales-by-date', [SalesController::class, 'getSalesByDate']);



//stock
Route::get('/create-stock', [stockController::class, 'create'])->name('createstock');
Route::get('/show-all-stock', [stockController::class, 'index'])->name('showstock');


// required items
Route::get('/create-requireditems', [requiredItemsController::class, 'create'])->name('createrequireditem');
Route::get('/show-all-required-item', [requiredItemsController::class, 'index'])->name('showrequieditem');


//loans
Route::get('/get-available-loans', [LoansController::class, 'index'])->name('loanitems');
Route::get('/loans/show-my-loans', [LoansController::class, 'showAppliedLoans'])->name('getMyLoans');
Route::get('/request-loan/{loan_id}/{amount}', [LoansController::class, 'applyLoan'])->name('LoanApplication');

// let form = document.getElementById("loanForm").action = action;


// 				                        let el = document.createElement("input");
// 				                        el.className = "integr_elements";


//                                         el.name ="amount";
//                                         el.value = inputValue;


// 				                        form.appendChild(el);

//                                         form.action = action;

// 				                        form.submit();






//terms and conditions
Route::get('/terms_and_conditions', function () {
    return view('termsandconditions');
});


// Route::put('/post/{post}', function (Post $post) {
//     // The current user may update the post...
// })->middleware('can:update,post'); ->middleware('can:registerRetail,post');


//retails
Route::get('/retails/addretail', function (Retail $retail) {
    // The current user may update the post...

return view('Retailers.addretail');

});

//register a retail
Route::post('/register/add-retail',  [RetailsController::class, 'create']);

