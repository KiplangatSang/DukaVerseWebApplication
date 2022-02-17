<?php

use App\Http\Controllers\Banks\EquityBankController;
use App\Http\Controllers\Bills\BillController;
use App\Http\Controllers\Bills\BillPaymentController;
use App\Http\Controllers\Customers\CustomerController;
use App\Http\Controllers\Customers\CustomerCreditController;
use App\Http\Controllers\Employees\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MpesaController;
use App\Http\Controllers\FcmCloudMessagingController;
use App\Http\Controllers\Loans\LoanPaymentController;
use App\Http\Controllers\Loans\LoansApplicationsController;
use App\Http\Controllers\Loans\LoansController;
use App\Http\Controllers\Payments\CardPayments\CardPaymentsController;
use App\Http\Controllers\payments\CardPayments\StripeController;
use App\Http\Controllers\Retails\RetailsController;
use App\Http\Controllers\Sales\SalesController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\stock\requiredItemsController;
use App\Http\Controllers\stock\StockController;
use App\Http\Controllers\supplies\OrdersController;
use App\Http\Controllers\Supplies\SuppliersController;
use App\Repositories\B2BPayments\ipay;
use App\Repositories\Payments\B2BPayments\ipay as B2BPaymentsIpay;
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
Route::get('/requireditem/create-requireditems', [RequiredItemsController::class, 'create'])->name('createrequireditem');
Route::get('/requireditem/show-all-required-item', [RequiredItemsController::class, 'index'])->name('showrequieditem');
Route::get('/requireditem/requireditem-item/{id}',[RequiredItemsController::class, 'show'] );
Route::get('/requireditem/requireditemoncredit', [RequiredItemsController::class, 'showSoldItemsOnCredit']);
Route::get('/requireditem/delete/{id}', [RequiredItemsController::class, 'destroy']);
Route::get('/requireditem/view-retail-sales', [RequiredItemsController::class, 'updateToken']);
Route::get('/requireditem/requireditem-by-date', [RequiredItemsController::class, 'getSalesByDate']);
Route::post('/requireditem/requireditem-by-retail/{id}', [RequiredItemsController::class, 'getSalesByDate']);
Route::post('/requireditems/order', [RequiredItemsController::class, 'order']);
Route::get('/requireditems/editRequiredItems/{id}', [RequiredItemsController::class, 'editRequiredItems']);


//Orders
Route::post('/orders/confirmOrder/{retail_id}', [OrdersController::class, 'store']);
Route::get('/orders/index', [OrdersController::class, 'index']);
Route::get('/orders/order-item/show/{id}', [OrdersController::class, 'show']);
Route::get('/orders/create', [OrdersController::class, 'create']);
Route::get('/orders/order-item/show/{id}', [OrdersController::class, 'show']);
Route::get('/orders/delete', [OrdersController::class, 'delete']);

//loans
Route::get('/get-available-loans', [LoansController::class, 'index'])->name('loanitems');
Route::get('/loans/show-my-loans', [LoansController::class, 'showAppliedLoans'])->name('getMyLoans');
Route::get('/request-loan/{loan_id}/{amount}', [LoansController::class, 'applyLoan'])->name('LoanApplication');
Route::get('/loans/pay-a-loan/{loanapplication_id}', [LoansApplicationsController::class, 'payLoanRequest'])->name('LoanApplication');
Route::get('/loans/view-applied-loan/{loan_id}/{loanapplication_id}', [LoansApplicationsController::class, 'showAppliedLoanItem']);

//loanpayments
Route::get('/loans/payment/index/{loanapplication_id}',  [LoanPaymentController::class, 'index']);
Route::get('/loans/payment/show/{id}',  [LoanPaymentController::class, 'show']);


//payments
Route::get('/payments/cardpayments', [CardPaymentsController::class, 'index']);

//stripe
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

//MPESA
Route::get('/payments/mpesapayments', [MpesaController::class, 'index']);
Route::post('/payments/mpesapayments/simulatepayments', [MpesaController::class, 'simulateTransaction']);
Route::post('/payments/mpesapayments/stkpush', [MpesaController::class, 'stkPush']);
Route::post('/stkpush', [MpesaController::class, 'stkPushResponse']);

//Equity
Route::get('/payments/equity', [EquityBankController::class, 'index']);

//ipay
Route::get('/ipay/pay/initiate', function () {
    $payment = new B2BPaymentsIpay();
    $payment->initiatorRequest();

});

Route::get('/ipay/pay/mobilemoney', function () {
    $payment = new B2BPaymentsIpay();
    $payment->mobileMoneyTransact();

});

Route::get('/ipay/pay/search', function () {
    $payment = new B2BPaymentsIpay();
    $payment->searchTransaction();

});



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
Route::get('/retails/show',  [RetailsController::class, 'show']);


//register a retail
Route::post('/register/add-retail',  [RetailsController::class, 'addARetail']);


//customers
Route::get('/customers/index',  [CustomerController::class, 'index']);
Route::get('/customers/create',  [CustomerController::class, 'create']);
Route::post('/customers/store',  [CustomerController::class, 'store']);
Route::get('/customers/show/{id}',  [CustomerController::class, 'show']);
Route::get('/customers/edit/{id}',  [CustomerController::class, 'edit']);
Route::post('/customers/update/{id}',  [CustomerController::class, 'update']);
Route::get('/customers/delete/{id}',  [CustomerController::class, 'destroy']);



//customer credit
Route::get('/customers/credit/index/{cust_id}',  [CustomerCreditController::class, 'index']);
Route::get('/customers/credit/show/{id}',  [CustomerCreditController::class, 'show']);
Route::get('/customers/credit/edit/{id}',  [CustomerCreditController::class, 'edit']);
Route::post('/customers/credit/update/{id}',  [CustomerCreditController::class, 'update']);
Route::get('/customers/credit/delete/{id}',  [CustomerCreditController::class, 'destroy']);



//bills
Route::get('/bills/index',  [BillController::class, 'index']);
Route::get('/bills/create',  [BillController::class, 'create']);
Route::post('/bills/store',  [BillController::class, 'store']);
Route::post('/bills/show/{id}',  [BillController::class, 'show']);
Route::get('/bills/edit',  [BillController::class, 'edit']);
Route::post('/bills/update',  [BillController::class, 'update']);

//bill payment
Route::get('/bills/payment/index/{bill_id}',  [BillPaymentController::class, 'index']);
Route::get('/bills/payment/create',  [BillPaymentController::class, 'create']);
Route::post('/bills/payment/update/{id}',  [BillPaymentController::class, 'update']);
Route::get('/bills/payment/show/{id}',  [BillPaymentController::class, 'show']);
Route::get('/bills/payment/delete/{id}',  [BillPaymentController::class, 'delete']);

//bill payment history
Route::get('/bills/payment/history/index',  [BillPaymentHistory::class, 'index']);
Route::get('/bills/payment/history/delete',  [BillPaymentHistory::class, 'delete']);



//suppliers
Route::get('/supplies/suppliers/index',  [SuppliersController::class, 'index']);
Route::get('/supplies/suppliers/create',  [SuppliersController::class, 'create']);
Route::post('/supplies/suppliers/store',  [SuppliersController::class, 'store']);
Route::get('/supplies/suppliers/show/{id}',  [SuppliersController::class, 'show']);
Route::get('/supplies/suppliers/edit/{id}',  [SuppliersController::class, 'edit']);
Route::post('/supplies/suppliers/update',  [SuppliersController::class, 'update']);
Route::post('/supplies/suppliers/delete/{id}',  [SuppliersController::class, 'delete']);

//supplies payment
Route::get('supplies/payments/index',  [SuppliersPaymentController::class, 'index']);


//settings
Route::get('/settings/index',  [SettingsController::class, 'index']);
Route::get('/settings/edit',  [SettingsController::class, 'edit']);
Route::get('/settings/update',  [SettingsController::class, 'update']);
Route::get('/settings/show',  [SettingsController::class, 'show']);
Route::get('/settings/delete',  [SettingsController::class, 'destroy']);

//settings
Route::get('/support',  [SuppliersPaymentController::class, 'index']);
Route::get('/support/edit',  [SuppliersPaymentController::class, 'edit']);
Route::get('/support/update',  [SuppliersPaymentController::class, 'update']);
Route::get('/support/show',  [SuppliersPaymentController::class, 'show']);
Route::get('/support/delete',  [SuppliersPaymentController::class, 'destroy']);
Route::get('/support/index', function () {
    return view('Support.index');
});


