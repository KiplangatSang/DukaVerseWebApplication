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
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Retailer\Banks\EquityBankController;
use App\Http\Controllers\Retailer\Bills\BillController;
use App\Http\Controllers\Retailer\Bills\BillPaymentController;
use App\Http\Controllers\Retailer\Customers\CustomerController;
use App\Http\Controllers\Retailer\Customers\CustomerCreditController;
use App\Http\Controllers\Retailer\DukaVerseController;
use App\Http\Controllers\Retailer\Employees\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Retailer\payments\mpesa\MpesaController;
use App\Http\Controllers\Retailer\FcmCloudMessagingController;
use App\Http\Controllers\Finance\AdminSalesController as FinanceAdminSalesController;
use App\Http\Controllers\Market\MarketController;
use App\Http\Controllers\Retailer\Firebase\FirebaseController;
use App\Http\Controllers\Retailer\Firebase\FirebaseStorageController;
use App\Http\Controllers\Retailer\Loans\AppliedLoansController;
use App\Http\Controllers\Retailer\Loans\LoanPaymentController;
use App\Http\Controllers\Retailer\Loans\LoansApplicationsController;
use App\Http\Controllers\Retailer\Loans\LoansController;
use App\Http\Controllers\Retailer\Orders\DeliveredOrderController;
use App\Http\Controllers\Retailer\Orders\OrdersController;
use App\Http\Controllers\Retailer\Orders\PendingOrderController;
use App\Http\Controllers\Retailer\Payments\CardPayments\CardPaymentsController;
use App\Http\Controllers\Retailer\payments\CardPayments\StripeController;
use App\Http\Controllers\Retailer\Profile\ProfileController as ProfileProfileController;
use App\Http\Controllers\Retailer\Reports\PDFPrinterController;
use App\Http\Controllers\Retailer\RequiredItems\OrderedRequiredItemController;
use App\Http\Controllers\Retailer\RequiredItems\RequiredItemOrderController;
use App\Http\Controllers\Retailer\RequiredItems\RequiredItemController;
use App\Http\Controllers\Retailer\Retails\RetailController;
use App\Http\Controllers\Retailer\Retails\RetailsController;
use App\Http\Controllers\Retailer\Sales\CreditItemController;
use App\Http\Controllers\Retailer\Sales\CreditItemsController;
use App\Http\Controllers\Retailer\Sales\DailySaleController;
use App\Http\Controllers\Retailer\Sales\EmployeeSaleController;
use App\Http\Controllers\Retailer\Sales\MonthlySaleController;
use App\Http\Controllers\Retailer\Sales\PaidItemsController;
use App\Http\Controllers\Retailer\Sales\POSController;
use App\Http\Controllers\Retailer\Sales\SaleController;
use App\Http\Controllers\Retailer\Sales\SalesController;
use App\Http\Controllers\Retailer\Sales\SaleTransactionController;
use App\Http\Controllers\Retailer\Sales\YearlySaleController;
use App\Http\Controllers\Retailer\SendEmailController;
use App\Http\Controllers\Retailer\Settings\SettingsController;
use App\Http\Controllers\Retailer\stock\StockController;
use App\Http\Controllers\Retailer\Subscriptions\SubscriptionController;
use App\Http\Controllers\Retailer\Supplies\SuppliersController;
use App\Http\Controllers\Retailer\Supplies\SuppliesController;
use App\Http\Controllers\Retailer\Transactions\LoanTransactionController;
use App\Http\Controllers\Retailer\Transactions\SaleTransactionController as TransactionsSaleTransactionController;
use App\Http\Controllers\Retailer\Transactions\SupplyTransactionController;
use App\Http\Controllers\Retailer\Transactions\TransactionController;
use App\Http\Controllers\Suppliers\Items\ItemController;
use App\Http\Controllers\Suppliers\Orders\OrderController as OrdersOrderController;
use App\Http\Controllers\Suppliers\Orders\OrderDeliveredController;
use App\Http\Controllers\Suppliers\Retail\RetailController as RetailRetailController;
use App\Jobs\SendEmailJob;
use App\Repositories\B2BPayments\ipay;
use App\Repositories\Payments\B2BPayments\ipay as B2BPaymentsIpay;
use App\Repositories\RoutesRepository;
use App\Retails\Retail;
use App\Supplies\Orders;
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


//dukaverse account
Route::get('/register/accountdescription', [RegisterController::class, 'accountDescription']);
Route::get('/supplier/register', [RegisterController::class, 'supplierCreate'])->name('supplierregister');
Route::get('/client/dukaverse/index', [DukaVerseController::class, 'index']);

Route::get('/home', function () {
    $routes = new RoutesRepository();
    return redirect($routes->userRedirectRoute());
})->middleware('auth');

Route::get('/admin/home', function () {
    return view('admin.home');
})->middleware('auth');

Route::get('/client/subscriptions', [SubscriptionController::class, 'index']);

Route::post('/client/subscriptions/show/{id}', [SubscriptionController::class, 'show']);


Route::get('/user/retail', [HomeController::class, 'retails'])->middleware('auth');
Route::get('/user/supplier', [HomeController::class, 'suppliers'])->middleware('auth');

Route::get('/user/home', [HomeController::class, 'index'])->middleware('auth');
Route::post(' /user/home/retails/show', [HomeController::class, 'show'])->middleware('auth');

Route::get('/', function () {
    return view('landingpage.landingpage');
});

Route::get('/pdf', [PDFPrinterController::class, 'printPDF']);
Route::get('/email-test', function () {

    $details['email'] = 'kiplangatsang425@gmail.com';
    if (dispatch(new SendEmailJob($details))) {
        dd('done');
    } else {
        dd('failed');
    }
});

Route::get('/bluetooth', function () {
    return view('bluetooth');
});

Route::get('/send-email', [SendEmailController::class, 'index']);


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
Route::get('/admin/suppliers/index', [AdminSupplierController::class, 'index']);

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
Route::get('/admin/bills/payment/show/{id}/{bill_id}', [AdminBillsPaymentController::class, 'show']);
Route::get('/admin/bills/payment/delete/{id}',  [AdminBillsPaymentController::class, 'delete']);

//bill payment history
Route::get('/admin/bills/payment/history/index',  [AdminBillsHistoryController::class, 'index']);
Route::get('/admin/bills/payment/history/delete',  [AdminBillsHistoryController::class, 'delete']);


#End Admin API



//+++++++++++++++++++++++ Client  APi ++++++++++++++++++++++++++++++++#############################




Route::get('/transaction-query', [MpesaController::class, 'transactionQuery']);
Route::get('/mpesa-b2c', [MpesaController::class, 'MpesaB2C']);
Route::get('/reverse', [MpesaController::class, 'reverseMpesa']);
Route::post('get-token', [MpesaController::class, 'getAccessToken']);

Route::get('/register-urls', [MpesaController::class, 'registerUrls']);

Route::post('simulate', [MpesaController::class, 'simulateTransaction']);

Route::post('send-fcm-token', [FcmCloudMessagingController::class, 'firebaseTokenStorage']);

Route::patch('/fcm-token', [FcmCloudMessagingController::class, 'updateToken'])->name('fcmToken');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//sales
Route::get('/client/sales/index', [SaleController::class, 'index']);
Route::get('/client/sales/create', [SaleController::class, 'create']);
Route::post('/client/sales/store', [SaleController::class, 'store']);
Route::get('/client/sales/show/{id}', [SaleController::class, 'show']);
Route::get('/client/sales/edit/{id}', [SaleController::class, 'edit']);
Route::post('/client/sales/update/{id}', [SaleController::class, 'update']);
Route::post('/client/sales/delete/{id}', [SaleController::class, 'delete']);
Route::get('/client/sales/get-promt-items/{key}', [SaleController::class, 'getPrompItems']);
Route::get('/client/sales/get-sale-item/{trans_id}/{key}', [SaleController::class, 'getSalesItems']);
Route::get('/client/sales/makePayment/mpesa/{trans_id}/{number}/{amount}', [SaleController::class, 'makeMpesaPayment']);
Route::get('/client/sales/makePayment/card/{number}/{amount}', [SaleController::class, 'makePayment']);
Route::get('/client/sales/makePayment/cash/{trans_id}/{amount}', [SaleController::class, 'makeCashPayment']);
Route::get('/client/sales/closetransaction/{trans_id}', [SaleController::class, 'closeTransaction']);
Route::get('/client/sell', [POSController::class, 'index']);


//store sales on hold
Route::get('/client/sales/transactions/hold/store/{id}/{price}/{paid_amount}', [SaleTransactionController::class, 'storeItemsOnHold']);
Route::get('/client/sales/transactions/hold/retrieve', [SaleTransactionController::class, 'getItemsOnHold']);
Route::get('/client/sales/transactions/hold/retrieve/{id}', [SaleTransactionController::class, 'getItemOnHold']);
Route::get('/client/sales/transactions/complete/store/{id}/{amount}/{balance}', [SaleTransactionController::class, 'storeCompleteTransaction']);
Route::get('/client/sales/transactions/complete/retrieve', [SaleTransactionController::class, 'getCompleteTransactionItems']);




/*
// daily sales
Route::get('/client/sales/daily/index', [DailySaleController::class, 'index']);
Route::get('/client/sales/daily/create', [DailySaleController::class, 'create']);
Route::post('/client/sales/daily/store', [DailySaleController::class, 'store']);
Route::get('/client/sales/daily/show/{id}', [DailySaleController::class, 'show']);
Route::get('/client/sales/daily/edit/{id}', [DailySaleController::class, 'edit']);
Route::post('/client/sales/daily/update/{id}', [DailySaleController::class, 'updte']);
Route::post('/client/sales/daily/delete/{id}', [DailySaleController::class, 'deletes']);

// monthly sales

Route::get('/client/sales/monthly/index', [MonthlySaleController::class, 'index']);
Route::get('/client/sales/monthly/create', [MonthlySaleController::class, 'create']);
Route::post('/client/sales/monthly/store', [MonthlySaleController::class, 'store']);
Route::get('/client/sales/monthly/show/{id}', [MonthlySaleController::class, 'show']);
Route::get('/client/sales/monthly/edit/{id}', [MonthlySaleController::class, 'edit']);
Route::post('/client/sales/monthly/update/{id}', [MonthlySaleController::class, 'updte']);
Route::post('/client/sales/monthly/delete/{id}', [MonthlySaleController::class, 'deletes']);

// yearly sales
Route::get('/client/sales/yearly/index', [YearlySaleController::class, 'index']);
Route::get('/client/sales/yearly/create', [YearlySaleController::class, 'create']);
Route::post('/client/sales/yearly/store', [YearlySaleController::class, 'store']);
Route::get('/client/sales/yearly/show/{id}', [YearlySaleController::class, 'show']);
Route::get('/client/sales/yearly/edit/{id}', [YearlySaleController::class, 'edit']);
Route::post('/client/sales/yearly/update/{id}', [YearlySaleController::class, 'updte']);
Route::post('/client/sales/yearly/delete/{id}', [YearlySaleController::class, 'deletes']);
*/

// employee sales
Route::get('/client/sales/employee/index', [EmployeeSaleController::class, 'index']);
Route::get('/client/sales/employee/create', [EmployeeSaleController::class, 'create']);
Route::post('/client/sales/employee/store', [EmployeeSaleController::class, 'store']);
Route::get('/client/sales/employee/show/{id}', [EmployeeSaleController::class, 'show']);
Route::get('/client/sales/employee/edit/{id}', [EmployeeSaleController::class, 'edit']);
Route::post('/client/sales/employee/update/{id}', [EmployeeSaleController::class, 'updte']);
Route::post('/client/sales/employee/delete/{id}', [EmployeeSaleController::class, 'deletes']);


//items on credit
Route::get('/client/sales/credit/index', [CreditItemController::class, 'index']);

//paid items
Route::get('/client/sales/paiditems/index', [PaidItemsController::class, 'index']);



//stock
Route::get('/client/stock/create', [StockController::class, 'create'])->name('createstock');
Route::get('/client/stock/index', [StockController::class, 'index'])->name('showstock');

Route::get('/client/stock/show/{id}', [StockController::class, 'show']);
Route::get('/client/stock/edit/{id}', [StockController::class, 'edit']);
Route::get('/client/stock/item/edit/{id}', [StockController::class, 'editItem']);

Route::post('/client/stock/update/{id}', [StockController::class, 'update']);
Route::post('/client/stock/item/update/{id}', [StockController::class, 'updateItem']);
Route::get('/client/stock/item/update/required/{id}', [StockController::class, 'markRequired']);
Route::get('/client/stock/item/update/orders/{id}', [StockController::class, 'orderItems']);

Route::post('/client/stock/store', [StockController::class, 'store']);
// Route::get('/stockitemsoncredit', [StockController::class, 'showSoldItemsOnCredit']);
Route::get('/client/stock/delete/{id}', [StockController::class, 'destroy']);
Route::get('/client/stock/item/delete/{id}', [StockController::class, 'destroy']);
Route::get('/view-retail-sales', [StockController::class, 'updateToken']);
Route::get('/stock/stock-by-date', [StockController::class, 'getSalesByDate']);
Route::post('/stock/stock-by-retail/{id}', [StockController::class, 'getSalesByDate']);
#



// required items
Route::get('/client/requireditem/index', [RequiredItemController::class, 'index'])->name('showrequieditem');
Route::post('/client/requireditems/order', [RequiredItemController::class, 'order']);
Route::get('/client/requireditem/ordered/index', [OrderedRequiredItemController::class, 'index'])->name('showrequieditem');


// Route::get('/client/requireditems/editRequiredItems/{id}', [RequiredItemController::class, 'edit']);
// Route::get('/client/requireditem/requireditem-item/{id}', [RequiredItemController::class, 'show']);


//ordered required items
// Route::get('/client/requireditem/placeorder/index', [RequiredItemOrderController::class, 'index']);

//Orders
Route::post('/client/orders/store', [OrdersController::class, 'store']);
Route::get('/client/orders/index', [OrdersController::class, 'index']);
Route::get('/client/orders/show/{id}', [OrdersController::class, 'show']);
Route::get('/client/orders/create', [OrdersController::class, 'create']);

#delivered orders
Route::get('/client/orders/delivered/index', [DeliveredOrderController::class, 'index']);
Route::get('/client/orders/delivered/show/{id}', [DeliveredOrderController::class, 'show']);

#pending orders
Route::get('/client/orders/pending/index', [PendingOrderController::class, 'index']);
Route::get('/client/orders/pending/show/{id}', [OrdersController::class, 'show']);

//loans
Route::get('/client/loans/index', [LoansController::class, 'index'])->name('loanitems');
// Route::get('/loans/show-my-loans', [LoansController::class, 'showAppliedLoans'])->name('getMyLoans');
Route::get('/request-loan/{loan_id}/{amount}', [LoansController::class, 'applyLoan'])->name('LoanApplication');
Route::get('/loans/pay-a-loan/{loanapplication_id}', [LoansApplicationsController::class, 'payLoanRequest'])->name('LoanApplication');

//applied loans
Route::get('/client/loans/applied/index', [AppliedLoansController::class, 'index'])->name('applied-loans');
Route::get('/client/loans/applied/show/{id}', [AppliedLoansController::class, 'show']);

Route::get('/client/loans/index', [LoansController::class, 'index'])->name('listloan');
Route::get('/client/loans/show', [LoansController::class, 'show'])->name('showloan');
Route::get('/request-loan/{loan_id}/{amount}', [LoansController::class, 'applyLoan'])->name('LoanApplication');
Route::get('/loans/view-applied-loan/{loan_id}/{loanapplication_id}', [LoansApplicationsController::class, 'showAppliedLoanItem']);

//loan payments
//pay loan
Route::get('/client/loans/pay/{id}', [LoanPaymentController::class, 'index']);
// Route::get('/loans/pay-a-loan/{loanapplication_id}', [LoansApplicationsController::class, 'payLoanRequest'])->name('LoanApplication');
// Route::get('/loans/payment/index/{loanapplication_id}',  [LoanPaymentController::class, 'index']);
Route::get('/client/loans/payment/show/{id}',  [LoanPaymentController::class, 'show']);

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
Route::get('/client/employee/index', [EmployeeController::class, 'index']);
Route::get('/client/employee/create', [EmployeeController::class, 'create']);
Route::post('/client/employee/store', [EmployeeController::class, 'store']);

Route::get('/client/employee/show/{emp_id}', [EmployeeController::class, 'show']);
Route::get('/client/employee/edit/{emp_id}', [EmployeeController::class, 'edit']);
Route::post('/client/employee/update/{emp_id}', [EmployeeController::class, 'update']);
Route::get('/client/employee/delete/{emp_id}', [EmployeeController::class, 'delete']);

//employee sales
Route::get('/client/sales/employee/show/{id}', [EmployeeSaleController::class, 'show']);

//salaries
Route::get('/client/employee/salaries/show/{emp_id}', [EmployeeController::class, 'delete']);

//terms and conditions
Route::get('/terms_and_conditions', function () {
    return view('termsandconditions');
});
Route::get('/accept/termsandconditions', [Terms_and_conditionsController::class, 'index'])->name("termsandconditions");

// user profile
Route::get('/client/user/profile/edit/{id}',  [ProfileProfileController::class, 'edit']);

# -profilepic
Route::post('/client/userprofile/profile/update/profile_picture/{id}',  [ProfileProfileController::class, 'updateUserProfile']);
#-form
Route::post('/client/userprofile/profile/update/{id}',  [ProfileProfileController::class, 'update']);
# -national_id
Route::post('/client/userprofile/profile/national_id/{id}',  [ProfileProfileController::class, 'uploadUserDocuments']);
#-relevant-documents
Route::post('/client/userprofile/profile/relevant-documents/{id}',  [ProfileProfileController::class, 'uploadRelevantDocuments']);
//retails
Route::get('/client/retails/profile',  [RetailController::class, 'show']);

Route::get('/client/retails/create',  [RetailController::class, 'create']);
Route::get('/client/retails/show',  [RetailController::class, 'show']);
Route::get('/client/retails/profile/edit/{id}',  [RetailController::class, 'edit']);
Route::post('/client/retails/profile/update/{id}',  [RetailController::class, 'update']);
Route::post('/client/retails/profile/payentpreference/update/{id}',  [RetailController::class, 'paymentPreference']);
Route::post('/client/retails/profile/retail-documents',  [RetailController::class, 'uploadRetailDocuments']);
Route::post('/client/retails/profile/relevant-documents',  [RetailController::class, 'uploadRelevantDocuments']);
Route::post('/client/retails/profile/update',  [RetailController::class, 'updateRetailProfile']);

//register a retail
Route::post('/client/retail/register/store',  [RetailController::class, 'store']);


//customers
Route::get('/client/customers/index',  [CustomerController::class, 'index']);
Route::get('/client/customers/create',  [CustomerController::class, 'create']);
Route::post('/client/customers/store',  [CustomerController::class, 'store']);
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
Route::get('/client/bills/index',  [BillController::class, 'index']);
Route::get('/client/bills/create',  [BillController::class, 'create']);
Route::post('/client/bills/store',  [BillController::class, 'store']);
Route::post('/client/bills/show/{id}',  [BillController::class, 'show']);
Route::get('/client/bills/edit',  [BillController::class, 'edit']);
//bill history
Route::get('/client/bills/history/index',  [BillController::class, 'index']);
Route::post('/client/bills/history/show/{id}',  [BillController::class, 'show']);

//bill payment
Route::get('/bills/payment/index/{bill_id}',  [BillPaymentController::class, 'index']);
Route::get('/bills/payment/show/{id}',  [BillPaymentController::class, 'show']);

//bill payment history
Route::get('/bills/payment/history/index',  [BillPaymentHistory::class, 'index']);
Route::get('/bills/payment/history/delete',  [BillPaymentHistory::class, 'delete']);



//suppliers
Route::get('/market', [MarketController::class, 'index']);
Route::get('/market/show/{id}', [MarketController::class, 'show']);
Route::post('/market/store', [MarketController::class, 'store']);
Route::post('/market/delete/{id}', [MarketController::class, 'destroy']);
Route::get('/client/supplies/index',  [SuppliesController::class, 'index']);
Route::get('/client/supplies/create',  [SuppliesController::class, 'create']);
Route::post('/client/supplies/store',  [SuppliesController::class, 'store']);
Route::get('/client/supplies/show/{id}',  [SuppliesController::class, 'show']);
Route::get('/client/supplies/edit/{id}',  [SuppliesController::class, 'edit']);
Route::post('/client/supplies/update/{id}',  [SuppliesController::class, 'update']);

//suppliers
Route::get('/client/supplies/suppliers/index',  [SuppliersController::class, 'index']);
Route::get('/client/supplies/suppliers/create',  [SuppliersController::class, 'create']);
Route::post('/client/supplies/suppliers/store',  [SuppliersController::class, 'store']);
Route::get('/client/supplies/suppliers/show/{id}',  [SuppliersController::class, 'show']);
Route::get('/client/supplies/suppliers/edit/{id}',  [SuppliersController::class, 'edit']);
Route::post('/client/supplies/suppliers/update',  [SuppliersController::class, 'update']);

//supplies o

//supplies payment


//settings
Route::get('/settings/index',  [SettingsController::class, 'index']);
Route::get('/settings/edit',  [SettingsController::class, 'edit']);
Route::get('/settings/update',  [SettingsController::class, 'update']);
Route::get('/settings/show',  [SettingsController::class, 'show']);
Route::get('/settings/delete',  [SettingsController::class, 'destroy']);

//settings
Route::get('/support/index', function () {
    return view('client.Support.index');
});

//finance
//transactions
Route::get('/client/transactions/index', [TransactionController::class, 'index'])->name('transactions');
Route::get('/client/transactions/show/{id}', [TransactionController::class, 'show'])->name('showtransactions');

//sales transactions
Route::get('/client/transactions/sales/index', [TransactionsSaleTransactionController::class, 'index'])->name('salestransactions');

//supply transactions
Route::get('/client/transactions/supply/index', [SupplyTransactionController::class, 'index'])->name('supplytransactions');
//loans transactions
Route::get('/client/transactions/loans/index', [LoanTransactionController::class, 'index'])->name('loantransactions');


//SUPPLIERS THIS IS FOR SUPPLIER ACCOUNT

//stock
Route::get('/supplier/stock/index',  [ItemController::class, 'index']);
Route::get('/supplier/stock/create',  [ItemController::class, 'create']);
Route::post('/supplier/stock/store',  [ItemController::class, 'store']);
Route::get('/supplier/stock/edit/{id}',  [ItemController::class, 'edit']);
Route::get('/supplier/stock/show/{id}',  [ItemController::class, 'show']);
Route::post('/supplier/stock/update/{id}',  [ItemController::class, 'update']);

//stockitems
Route::get('/supplier/stock/item/edit/{id}',  [ItemController::class, 'edit']);
Route::post('/supplier/stock/item/update/{id}',  [ItemController::class, 'updateItem']);

//Orders
Route::get('/supplier/orders/index',  [OrdersOrderController::class, 'index']);
Route::get('/supplier/orders/delivered/index',  [OrderDeliveredController::class, 'index']);
Route::get('/supplier/orders/delivered/show/{id}',  [OrderDeliveredController::class, 'show']);
Route::get('/supplier/orders/pending/index',  [OrderDeliveredController::class, 'index']);
Route::get('/supplier/orders/store',  [OrdersOrderController::class, 'store']);
Route::get('/supplier/orders/show/{id}',  [OrdersOrderController::class, 'show']);

//retails
Route::get('/supplier/retails/index',  [RetailRetailController::class, 'index']);




Route::get('/display-user', [AdminLocationsController::class, 'index']);

Route::get('/location', function () {
    # code...
    return view('location');
});
