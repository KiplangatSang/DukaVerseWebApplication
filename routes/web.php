<?php

use App\Http\Controllers\Employees\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MpesaController;
use App\Http\Controllers\FcmCloudMessagingController;
use App\Http\Controllers\Loans\LoansApplicationsController;
use App\Http\Controllers\Loans\LoansController;
use App\Http\Controllers\Payments\CardPayments\CardPaymentsController;
use App\Http\Controllers\Retails\RetailsController;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\stock\requiredItemsController;
use App\Http\Controllers\stock\StockController;
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
Route::get('/sales/delete/{id}', [SalesController::class, 'delete']);
Route::get('/view-retail-sales', [SalesController::class, 'updateToken']);
Route::get('/soldPaidItems', [SalesController::class, 'showPaidSoldItems']);
Route::get('/sales/sales-by-date', [SalesController::class, 'getSalesByDate']);
Route::post('/sales/sales-by-retail/{id}', [SalesController::class, 'getSalesByDate']);



//stock
Route::get('/create-stock', [StockController::class, 'create'])->name('createstock');
Route::get('/show-all-stock', [StockController::class, 'index'])->name('showstock');
Route::get('/stock-item/{id}',[StockController::class, 'show'] );
Route::get('/stockitemsoncredit', [StockController::class, 'showSoldItemsOnCredit']);
Route::get('/stock/delete/{id}', [StockController::class, 'destroy']);
Route::get('/view-retail-sales', [StockController::class, 'updateToken']);
Route::get('/stock/stock-by-date', [StockController::class, 'getSalesByDate']);
Route::post('/stock/stock-by-retail/{id}', [StockController::class, 'getSalesByDate']);



// required items
Route::get('/create-requireditems', [requiredItemsController::class, 'create'])->name('createrequireditem');
Route::get('/show-all-required-item', [requiredItemsController::class, 'index'])->name('showrequieditem');


//loans
Route::get('/get-available-loans', [LoansController::class, 'index'])->name('loanitems');
Route::get('/loans/show-my-loans', [LoansController::class, 'showAppliedLoans'])->name('getMyLoans');
Route::get('/request-loan/{loan_id}/{amount}', [LoansController::class, 'applyLoan'])->name('LoanApplication');
Route::get('/loans/pay-a-loan/{loanapplication_id}', [LoansApplicationsController::class, 'payLoanRequest'])->name('LoanApplication');
Route::get('/loans/view-applied-loan/{loan_id}/{loanapplication_id}', [LoansApplicationsController::class, 'showAppliedLoanItem']);


//payments
Route::get('/payments/cardpayments', [CardPaymentsController::class, 'index']);
Route::get('/payments/mpesapayments', [MpesaController::class, 'index']);
Route::post('/payments/mpesapayments/simulatepayments', [MpesaController::class, 'simulateTransaction']);
Route::post('/payments/mpesapayments/stkpush', [MpesaController::class, 'stkPush']);

Route::post('/stkpush', [MpesaController::class, 'stkPushResponse']);


//employees
Route::get('/employees/showemployees', [EmployeeController::class, 'index']);
Route::get('/employees/addemployee', [EmployeeController::class, 'create']);
Route::post('/employees/create-new-emp', [EmployeeController::class, 'newEmployee']);

Route::get('/employee/viewEmployee/{emp_id}', [EmployeeController::class, 'show']);
Route::get('/employee/updateEmployee/{emp_id}', [EmployeeController::class, 'update']);
Route::post('/employee/updateEmployeeData/{emp_id}', [EmployeeController::class, 'updateEmployee']);
Route::get('/employee/viewEmployee/salaries', [EmployeeController::class, 'Salaries']);
Route::get('/employee/viewEmployee/sales/{emp_id}', [EmployeeController::class, 'Sales']);
Route::get('/employee/delete/{emp_id}', [EmployeeController::class, 'delete']);















//terms and conditions
Route::get('/terms_and_conditions', function () {
    return view('termsandconditions');
});


// Route::put('/post/{post}', function (Post $post) {
//     // The current user may update the post...
// })->middleware('can:update,post'); ->middleware('can:registerRetail,post');


//retails
Route::get('/retails/retails-list',  [RetailsController::class, 'create']);
Route::get('/retails/addretail',  [RetailsController::class, 'create']);

//register a retail
Route::post('/register/add-retail',  [RetailsController::class, 'addARetail']);

