<?php

use App\Http\Controllers\Admin\Bills\AdminBillController;
use App\Http\Controllers\Admin\Bills\AdminBillsHistoryController;
use App\Http\Controllers\Admin\Bills\AdminBillsPaymentController;
use App\Http\Controllers\Admin\Customers\AdminCustomerController;
use App\Http\Controllers\Admin\Customers\CustomerController as CustomersCustomerController;
use App\Http\Controllers\Admin\Employees\Storm5EmployeeController;
use App\Http\Controllers\Admin\Finance\AdminExpensesController;
use App\Http\Controllers\Admin\Finance\AdminFinanceController;
use App\Http\Controllers\Admin\Finance\AdminProfitController;
use App\Http\Controllers\Admin\Finance\AdminRevenueController;
use App\Http\Controllers\Admin\Finance\AdminSalesController;
use App\Http\Controllers\Admin\Finance\FinanceController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Loans\AdminLoansController;
use App\Http\Controllers\Admin\Loans\ApprovedLoanController;
use App\Http\Controllers\Admin\Loans\LoansController as LoansLoansController;
use App\Http\Controllers\Admin\Loans\LoansProcessingController;
use App\Http\Controllers\Admin\Loans\PaidLoanController;
use App\Http\Controllers\Admin\Locations\AdminLocationsController;
use App\Http\Controllers\Admin\Locations\LocationsController;
use App\Http\Controllers\Admin\Orders\AdminOrderController;
use App\Http\Controllers\Admin\Orders\OrderController;
use App\Http\Controllers\Admin\Payments\BankPayment\AdminBankPaymentController;
use App\Http\Controllers\Admin\Payments\Mpesa\AdminMpesaController;
use App\Http\Controllers\Admin\Profiles\AdminProfileController;
use App\Http\Controllers\Admin\Profiles\ProfileController;
use App\Http\Controllers\Admin\Supplies\AdminSupplierController;
use App\Http\Controllers\Admin\Supplies\SuppliersController as SuppliesSuppliersController;
use App\Http\Controllers\Admin\Support\AdminSupportController;
use App\Http\Controllers\Banks\EquityBankController;
use App\Http\Controllers\Bills\BillController;
use App\Http\Controllers\Bills\BillPaymentController;
use App\Http\Controllers\Customers\CustomerController;
use App\Http\Controllers\Customers\CustomerCreditController;
use App\Http\Controllers\Employees\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MpesaController;
use App\Http\Controllers\FcmCloudMessagingController;
use App\Http\Controllers\Finance\AdminSalesController as FinanceAdminSalesController;
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
use App\Repositories\RoutesRepository;
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

Route::get('/home', function () {
    $routes = new RoutesRepository();

  return redirect($routes->userRedirectRoute());
})->middleware('auth');

Route::get('/admin/home', function () {
    return view('Admin.home');
})->middleware('auth');

Route::get('/user/home', [HomeController::class, 'index'])->middleware('auth');;

Route::get('/', function () {
    return view('LandingPage.landingpage');
});



//+++++++++++++++++++++++ Admin  APi ++++++++++++++++++++++++++++++++

//payments
Route::get('/payments/cardpayments', [CardPaymentsController::class, 'index']);

//stripe
Route::get('/stripe', [StripeController::class, 'stripe']);
Route::get('/stripe/post', [StripeController::class, 'stripePost'])->name('stripe.post');

//MPESA
Route::get('/admin/payments/mpesapayments', [AdminMpesaController::class, 'index']);
Route::post('/admin/payments/mpesapayments/simulatepayments', [AdminMpesaController::class, 'simulateTransaction']);
Route::post('/admin/payments/mpesapayments/stkpush', [AdminMpesaController::class, 'stkPush']);
Route::post('/admin/stkpush', [AdminMpesaController::class, 'stkPushResponse']);

//Banks
Route::get('/admin/payments/equity', [EquityBankController::class, 'index']);
Route::get('/admin/payments/bank/{bank_id}', [AdminBankPaymentController::class, 'index']);


//ipay
Route::get('/admin/ipay/pay/initiate', function () {
    $payment = new B2BPaymentsIpay();
    $payment->initiatorRequest();

});

Route::get('/admin/ipay/pay/mobilemoney', function () {
    $payment = new B2BPaymentsIpay();
    $payment->mobileMoneyTransact();

});

Route::get('/admin/ipay/pay/search', function () {
    $payment = new B2BPaymentsIpay();
    $payment->searchTransaction();

});

#suppliers
Route::post('/admin/suppliers/index', [AdminSupplierController::class, 'index']);

Route::get('/admin/suppliers/create', [AdminCustomerController::class, 'create']);
Route::post('/admin/suppliers/store', [AdminCustomerController::class, 'store']);
Route::post('/admin/suppliers/edit/{id}', [AdminSupplierController::class, 'edit']);
Route::post('/admin/suppliers/update/{id}', [AdminSupplierController::class, 'update']);
Route::post('/admin/suppliers/show/{id}', [AdminSupplierController::class, 'show']);
Route::post('/admin/suppliers/delete/{id}', [AdminSupplierController::class, 'destroy']);

#profile

Route::get('/admin/profile/user/index', [AdminProfileController::class, 'index']);
Route::get('/admin/profile/create', [AdminCustomerController::class, 'create']);
Route::post('/admin/profile/store', [AdminCustomerController::class, 'store']);
Route::get('/admin/profile/user/edit/{id}', [AdminProfileController::class, 'edit']);
Route::post('/admin/profile/user/update/{id}', [AdminProfileController::class, 'update']);
Route::get('/admin/profile/user/show/{id}', [AdminProfileController::class, 'show']);
Route::post('/admin/profile/user/delete/{id}', [AdminProfileController::class, 'destroy']);


#customers
Route::get('/admin/customers/index', [AdminCustomerController::class, 'index']);
Route::get('/admin/customers/create', [AdminCustomerController::class, 'create']);
Route::post('/admin/customers/store', [AdminCustomerController::class, 'store']);
Route::get('/admin/customers/edit/{id}', [AdminCustomerController::class, 'edit']);
Route::post('/admin/customers/update/{id}', [AdminCustomerController::class, 'update']);
Route::get('/admin/customers/show/{id}', [AdminCustomerController::class, 'show']);
Route::post('/admin/customers/delete/{id}', [AdminCustomerController::class, 'destroy']);

#Employees

Route::get('/admin/employees/index', [Storm5EmployeeController::class, 'index']);
Route::get('/admin/employees/create', [Storm5EmployeeController::class, 'create']);
Route::post('/admin/employees/store', [Storm5EmployeeController::class, 'store']);
Route::get('/admin/employees/edit/{id}', [Storm5EmployeeController::class, 'edit']);
Route::post('/admin/employees/update/{id}', [Storm5EmployeeController::class, 'update']);
Route::get('/admin/employees/show/{id}', [Storm5EmployeeController::class, 'show']);
Route::post('/admin/employees/delete/{id}', [Storm5EmployeeController::class, 'destroy']);

#Loans
Route::get('/admin/loans/index', [AdminLoansController::class, 'index']);
Route::get('/admin/loans/create', [AdminLoansController::class, 'create']);
Route::post('/admin/loans/store', [AdminLoansController::class, 'store']);
Route::get('/admin/loans/edit/{id}', [AdminLoansController::class, 'edit']);
Route::post('/admin/loans/update/{id}', [AdminLoansController::class, 'update']);
Route::get('/admin/loans/show/{id}', [AdminLoansController::class, 'show']);
Route::post('/admin/loans/delete/{id}', [AdminLoansController::class, 'destroy']);

//processing loan
Route::get('/admin/loans/appliedloans/index', [LoansProcessingController::class, 'allLoans']);
Route::get('/admin/loans/appliedloans/index/{id}', [LoansProcessingController::class, 'index']);
Route::get('/admin/loans/appliedloans/create', [LoansProcessingController::class, 'create']);
Route::post('/admin/loans/appliedloans/store', [LoansProcessingController::class, 'store']);
Route::get('/admin/loans/appliedloans/edit/{id}', [LoansProcessingController::class, 'edit']);
Route::post('/admin/loans/appliedloans/update/{id}', [LoansProcessingController::class, 'update']);
Route::get('/admin/loans/appliedloans/show/{id}', [LoansProcessingController::class, 'show']);
Route::post('/admin/loans/appliedloans/delete/{id}', [LoansProcessingController::class, 'destroy']);

//approved loans
Route::get('/admin/loans/approved/index', [ApprovedLoanController::class, 'index']);
Route::get('/admin/loans/approved/create', [ApprovedLoanController::class, 'create']);
Route::post('/admin/loans/approved/store', [ApprovedLoanController::class, 'store']);
Route::get('/admin/loans/approved/edit/{id}', [ApprovedLoanController::class, 'edit']);
Route::post('/admin/loans/approved/update/{id}', [ApprovedLoanController::class, 'update']);
Route::get('/admin/loans/approved/show/{id}', [ApprovedLoanController::class, 'show']);
Route::post('/admin/loans/approved/delete/{id}', [ApprovedLoanController::class, 'destroy']);

//paid loans
Route::get('/admin/loans/paid/index', [PaidLoanController::class, 'index']);
Route::get('/admin/loans/paid/create', [PaidLoanController::class, 'create']);
Route::post('/admin/loans/paid/store', [PaidLoanController::class, 'store']);
Route::get('/admin/loans/paid/edit/{id}', [PaidLoanController::class, 'edit']);
Route::post('/admin/loans/paid/update/{id}', [PaidLoanController::class, 'update']);
Route::get('/admin/loans/paid/show/{id}', [PaidLoanController::class, 'show']);
Route::post('/admin/loans/paid/delete/{id}', [PaidLoanController::class, 'destroy']);


#Finance

Route::get('/admin/finance/index', [AdminFinanceController::class, 'index']);
Route::get('/admin/finance/create', [AdminFinanceController::class, 'create']);
Route::post('/admin/finance/store', [AdminFinanceController::class, 'store']);
Route::get('/admin/finance/edit/{id}', [AdminFinanceController::class, 'edit']);
Route::post('/admin/finance/update/{id}', [AdminFinanceController::class, 'update']);
Route::get('/admin/finance/show/{id}', [AdminFinanceController::class, 'show']);
Route::post('/admin/finance/delete/{id}', [AdminFinanceController::class, 'destroy']);

#Profit Finance

Route::get('/admin/finance/profit/index', [AdminProfitController::class, 'index']);
Route::get('/admin/finance/profit/create', [AdminProfitController::class, 'create']);
Route::post('/admin/finance/profit/store', [AdminProfitController::class, 'store']);
Route::get('/admin/finance/profit/edit/{id}', [AdminProfitController::class, 'edit']);
Route::post('/admin/finance/profit/update/{id}', [AdminProfitController::class, 'update']);
Route::get('/admin/finance/profit/show/{id}', [AdminProfitController::class, 'show']);
Route::post('/admin/finance/profit/delete/{id}', [AdminProfitController::class, 'destroy']);

#Sales Finance

Route::get('/admin/finance/sales/index', [AdminSalesController::class, 'index']);
Route::get('/admin/finance/sales/create', [AdminSalesController::class, 'create']);
Route::post('/admin/finance/sales/store', [AdminSalesController::class, 'store']);
Route::get('/admin/finance/sales/edit/{id}', [AdminSalesController::class, 'edit']);
Route::post('/admin/finance/sales/update/{id}', [AdminSalesController::class, 'update']);
Route::get('/admin/finance/sales/show/{id}', [AdminSalesController::class, 'show']);
Route::post('/admin/finance/sales/delete/{id}', [AdminSalesController::class, 'destroy']);

#Revenue Finance

Route::get('/admin/finance/revenue/index', [AdminRevenueController::class, 'index']);
Route::get('/admin/finance/revenue/create', [AdminRevenueController::class, 'create']);
Route::post('/admin/finance/revenue/store', [AdminRevenueController::class, 'store']);
Route::get('/admin/finance/revenue/edit/{id}', [AdminRevenueController::class, 'edit']);
Route::post('/admin/finance/revenue/update/{id}', [AdminRevenueController::class, 'update']);
Route::get('/admin/finance/revenue/show/{id}', [AdminRevenueController::class, 'show']);
Route::post('/admin/finance/revenue/delete/{id}', [AdminRevenueController::class, 'destroy']);
#Expenses Finance

Route::get('/admin/finance/expenses/index', [AdminExpensesController::class, 'index']);
Route::get('/admin/finance/expenses/create', [AdminExpensesController::class, 'create']);
Route::post('/admin/finance/expenses/store', [AdminExpensesController::class, 'store']);
Route::get('/admin/finance/expenses/edit/{id}', [AdminExpensesController::class, 'edit']);
Route::post('/admin/finance/expenses/update/{id}', [AdminExpensesController::class, 'update']);
Route::get('/admin/finance/expenses/show/{id}', [AdminExpensesController::class, 'show']);
Route::post('/admin/finance/expenses/delete/{id}', [AdminExpensesController::class, 'destroy']);


// locations

Route::get('/admin/locations/index', [AdminLocationsController::class, 'index']);

Route::get('/admin/locations/create', [AdminLocationsController::class, 'create']);
Route::post('/admin/locations/store', [AdminLocationsController::class, 'store']);
Route::get('/admin/locations/edit/{id}', [AdminLocationsController::class, 'edit']);
Route::post('/admin/locations/update/{id}', [AdminLocationsController::class, 'update']);
Route::get('/admin/locations/show/{id}', [AdminLocationsController::class, 'show']);
Route::post('/admin/locations/delete/{id}', [AdminLocationsController::class, 'destroy']);

// Orders

Route::get('/admin/orders/index', [AdminOrderController::class, 'index']);

Route::get('/admin/orders/create', [AdminOrderController::class, 'create']);
Route::post('/admin/orders/store', [AdminOrderController::class, 'store']);
Route::get('/admin/orders/edit/{id}', [AdminOrderController::class, 'edit']);
Route::post('/admin/orders/update/{id}', [AdminOrderController::class, 'update']);
Route::get('/admin/orders/show/{id}', [AdminOrderController::class, 'show']);
Route::post('/admin/orders/delete/{id}', [AdminOrderController::class, 'destroy']);

// Support

Route::get('/admin/support/index', [AdminSupportController::class, 'index']);

Route::get('/admin/support/create', [AdminSupportController::class, 'create']);
Route::post('/admin/support/store', [AdminSupportController::class, 'store']);
Route::get('/admin/support/edit/{id}', [AdminSupportController::class, 'edit']);
Route::post('/admin/support/update/{id}', [AdminSupportController::class, 'update']);
Route::get('/admin/support/show/{id}', [AdminSupportController::class, 'show']);
Route::post('/admin/support/delete/{id}', [AdminSupportController::class, 'destroy']);

// Bills

Route::get('/admin/bills/index', [AdminBillController::class, 'index']);

Route::get('/admin/bills/create', [AdminBillController::class, 'create']);
Route::post('/admin/bills/store', [AdminBillController::class, 'store']);
Route::get('/admin/bills/edit/{id}', [AdminBillController::class, 'edit']);
Route::post('/admin/bills/update/{id}', [AdminBillController::class, 'update']);
Route::get('/admin/bills/show/{id}', [AdminBillController::class, 'show']);
Route::post('/admin/bills/delete/{id}', [AdminBillController::class, 'destroy']);

// Bills Payment

//bill payment
Route::get('/admin/bills/payment/index',  [AdminBillsPaymentController::class, 'allBills']);
Route::get('/admin/bills/payment/index/{bill_id}',  [AdminBillsPaymentController::class, 'index']);
Route::get('/admin/bills/payment/create',  [AdminBillsPaymentController::class, 'create']);
Route::post('/admin/bills/payment/update/{id}',  [AdminBillsPaymentController::class, 'update']);
Route::get('/admin/bills/payment/show/{id}/{bill_id}',[AdminBillsPaymentController::class, 'show']);
Route::get('/admin/bills/payment/delete/{id}',  [AdminBillsPaymentController::class, 'delete']);

//bill payment history
Route::get('/admin/bills/payment/history/index',  [AdminBillsHistoryController::class, 'index']);
Route::get('/admin/bills/payment/history/delete',  [AdminBillsHistoryController::class, 'delete']);


#End Admin API



//+++++++++++++++++++++++ Client  APi ++++++++++++++++++++++++++++++++#############################





Route::post('get-token', [MpesaController::class, 'getAccessToken']);

Route::post('register-Urls', [MpesaController::class, 'registerUrls']);

Route::post('simulate', [MpesaController::class, 'simulateTransaction']);

Route::post('send-fcm-token', [FcmCloudMessagingController::class,'firebaseTokenStorage']);

Route::patch('/fcm-token', [FcmCloudMessagingController::class, 'updateToken'])->name('fcmToken');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

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


