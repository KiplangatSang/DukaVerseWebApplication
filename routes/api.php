<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FcmCloudMessagingController;
use App\Http\Controllers\payments\mpesa\MpesaController;
use App\Http\Controllers\Retailer\payments\mpesa\MpesaResponseController;
use App\Http\Controllers\Retails\RetailAPIController;
use App\Http\Controllers\Sales\SaleController;
use App\Http\Controllers\Sales\SaleTransactionController;
use App\Http\Controllers\stock\RequiredItemsController;
use App\Http\Controllers\User\PinController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('validation/{retail_id}', [MpesaResponseController::class, 'validation']);
Route::post('confirmation/{retail_id}', [MpesaResponseController::class, 'confirmation']);
Route::post('simulate', [MpesaResponseController::class, 'validation']);
Route::post('stkpush/{retail_id}/{trans_id}', [MpesaResponseController::class, 'stkPushResponse']);
Route::post('reverse', [MpesaResponseController::class, 'reversal']);

Route::post('/query/result', [MpesaResponseController::class, 'queryResult']);
Route::post('/query/confirmation', [MpesaResponseController::class, 'queryConfirmation']);


Route::post('send-fcm-token', [FcmCloudMessagingController::class, 'firebaseTokenStorage']);
Route::post('get-fcm-token', [FcmCloudMessagingController::class, 'firebaseTokenRetrieve']);
Route::post('make-notification', [FcmCloudMessagingController::class, 'makeNotification']);
Route::get('curl_download', [FcmCloudMessagingController::class, 'curldownload']);
Route::post('make-updateToken', [FcmCloudMessagingController::class, 'updateToken']);
Route::post('sendNotification', [FcmCloudMessagingController::class, 'sendNotification']);
Route::post('delete-Tokendata', [FcmCloudMessagingController::class, 'deleterecords']);

//auth
Route::post('/user/register', [RegisterController::class, 'apiRegister']);
Route::post('/user/login', [LoginController::class, 'apiLogin']);
Route::middleware('auth:api')->post('/user/pin', 'User\PinController@makePin');
Route::middleware('auth:api')->post('/user/updatePin', 'User\PinController@updatePin');

//retail
Route::middleware('auth:api')->get('/retail/index', 'Retails\RetailAPIController@index');
Route::middleware('auth:api')->post('/retail/store', 'Retails\RetailAPIController@store');
Route::middleware('auth:api')->get('/retail/delete/{id}', 'Retails\RetailAPIController@destroy');
Route::middleware('auth:api')->post('/retail/set-session-retail', 'Retails\RetailAPIController@setSessionRetail');
Route::middleware('auth:api')->get('/client/retails/profile/{id}', 'Retails\RetailAPIController@show');
Route::middleware('auth:api')->post('/client/retail/update/{id}', 'Retails\RetailAPIController@update');
Route::middleware('auth:api')->get('/client/payentpreference/preferences/{id}', 'Retails\RetailAPIController@getPaymentPreferences');
Route::middleware('auth:api')->post('/client/retails/profile/payentpreference/update/{id}', 'Retails\RetailAPIController@paymentPreference');
Route::middleware('auth:api')->post('/client/retails/profile/retail-documents/{id}', 'Retails\RetailAPIController@uploadRetailDocuments');
Route::middleware('auth:api')->post('/client/retails/profile/relevant-documents/{id}', 'Retails\RetailAPIController@uploadRelevantDocuments');
Route::middleware('auth:api')->post('/client/retails/profile/update', 'Retails\RetailAPIController@updateRetailProfile');

//home data
Route::middleware('auth:api')->post('/retail/set-retail-data', 'Home\HomeAPIController@index');

//stock
Route::middleware('auth:api')->get('/stock/index', 'Stock\StockApiController@index');
Route::middleware('auth:api')->get('/stock/create', 'Stock\StockApiController@create');
Route::middleware('auth:api')->post('/stock/store', 'Stock\StockApiController@store');
Route::middleware('auth:api')->get('/stock/show/{id}', 'Stock\StockApiController@show');
Route::middleware('auth:api')->get('/stock/item/show/{id}', 'Stock\StockApiController@showItem');


Route::middleware('auth:api')->get('/stock/edit/{id}', 'Stock\StockApiController@edit');
Route::middleware('auth:api')->get('/stock/item/edit/{id}', 'Stock\StockApiController@editItem');

Route::middleware('auth:api')->post('/stock/update/{id}', 'Stock\StockApiController@update');
Route::middleware('auth:api')->post('/stock/item/update/{id}', 'Stock\StockApiController@updateItem');
Route::middleware('auth:api')->post('/stock/item/destroy/{id}', 'Stock\StockApiController@destroy');
Route::middleware('auth:api')->post('/stock/mark-required/{id}', 'Stock\StockApiController@markRequired');

//loans

Route::middleware('auth:api')->get('/user/loans/all-loans', 'User\LoanController@makePin');
Route::middleware('auth:api')->post('/user/loans/loan-item/{id}', 'User\LoanController@updatePin');
Route::middleware('auth:api')->post('/user/loans/loan-item/apply/{id}', 'User\LoanController@updatePin');
Route::middleware('auth:api')->post('/user/loans/loan-item/loan-status/{id}', 'User\LoanController@updatePin');
Route::middleware('auth:api')->post('/user/loans/loan-item/pay-loan/m-pesa/{id}', 'User\LoanController@updatePin');
Route::middleware('auth:api')->post('/user/loans/loan-item/pay-loan/bank/{id}', 'User\LoanController@updatePin');
Route::middleware('auth:api')->get('/user/loans/loan-history', 'User\LoanController@updatePin');
Route::middleware('auth:api')->post('/user/loans/loan-history/loan-item/{id}', 'User\LoanController@updatePin');

//sales
Route::middleware('auth:api')->get('/client/sales/index', 'Sales\SaleAPIController@index');
Route::middleware('auth:api')->get('/client/sales/create', 'Sales\SaleAPIController@create');
Route::middleware('auth:api')->post('/client/sales/show/{id}', 'Sales\SaleAPIController@show');

Route::middleware('auth:api')->get('/client/sales/get-promt-items/{key}', 'Sales\SaleAPIController@getPrompItems');
Route::middleware('auth:api')->get('/client/sales/get-sale-item/{trans_id}/{key}', 'Sales\SaleAPIController@getSalesItems');
Route::middleware('auth:api')->get('/client/sales/makePayment/mpesa/{trans_id}/{number}/{amount}', 'Sales\SaleAPIController@makeMpesaPayment');
Route::middleware('auth:api')->get('/client/sales/makePayment/card/{number}/{amount}', 'Sales\SaleAPIController@makePayment');
Route::middleware('auth:api')->get('/client/sales/makePayment/cash/{trans_id}/{amount}', 'Sales\SaleAPIController@makeCashPayment');
Route::middleware('auth:api')->get('/client/sales/closetransaction/{trans_id}', 'Sales\SaleAPIController@closeTransaction');

//store sales on hold
Route::middleware('auth:api')->get('/client/sales/transactions/hold/store/{trans_id}/{price}/{paid_amount}', 'Sales\SaleTransactionController@storeItemsOnHold');
Route::middleware('auth:api')->get('/client/sales/transactions/hold/retrieve', 'Sales\SaleTransactionController@getItemsOnHold');
Route::middleware('auth:api')->get('/client/sales/transactions/hold/retrieve/{trans_id}', 'Sales\SaleTransactionController@getItemOnHold');
// Route::middleware('auth:api')->get('/client/sales/transactions/complete/store/{trans_id}/{amount}/{balance}', 'Sales\SaleTransactionController@storeCompleteTransaction');
Route::middleware('auth:api')->get('/client/sales/transactions/complete/retrieve', 'Sales\SaleTransactionController@getCompleteTransactionItems');


//not yet done
//required items
Route::middleware('auth:api')->get('/requireditem/create-requireditems', [RequiredItemsController::class, 'create'])->name('createrequireditem');
Route::middleware('auth:api')->get('/client/requireditem/show-all-required-item', [RequiredItemsController::class, 'index'])->name('showrequieditem');
Route::middleware('auth:api')->get('/client/requireditem/requireditem-item/{id}', [RequiredItemsController::class, 'show']);
Route::middleware('auth:api')->get('/requireditem/requireditemoncredit', [RequiredItemsController::class, 'showSoldItemsOnCredit']);
Route::middleware('auth:api')->get('/requireditem/delete/{id}', [RequiredItemsController::class, 'destroy']);
Route::middleware('auth:api')->get('/requireditem/view-retail-sales', [RequiredItemsController::class, 'updateToken']);
Route::middleware('auth:api')->get('/requireditem/requireditem-by-date', [RequiredItemsController::class, 'getSalesByDate']);
Route::middleware('auth:api')->post('/requireditem/requireditem-by-retail/{id}', [RequiredItemsController::class, 'getSalesByDate']);
Route::middleware('auth:api')->post('/client/requireditems/order', [RequiredItemsController::class, 'order']);
Route::middleware('auth:api')->get('/requireditems/editRequiredItems/{id}', [RequiredItemsController::class, 'editRequiredItems']);

//order items
//Orders
Route::middleware('auth:api')->post('/client/orders/store', [OrdersController::class, 'store']);
Route::middleware('auth:api')->get('/client/orders/index', [OrdersController::class, 'index']);
Route::middleware('auth:api')->get('/client/orders/show/{id}', [OrdersController::class, 'show']);
Route::middleware('auth:api')->get('/client/orders/create', [OrdersController::class, 'create']);
Route::middleware('auth:api')->get('/client/orders/delete', [OrdersController::class, 'delete']);

#delivered orders
Route::middleware('auth:api')->post('/client/orders/delivered/store', [DeliveredOrderController::class, 'store']);
Route::middleware('auth:api')->get('/client/orders/delivered/index', [DeliveredOrderController::class, 'index']);
Route::middleware('auth:api')->get('/client/orders/delivered/show/{id}', [DeliveredOrderController::class, 'show']);
Route::middleware('auth:api')->get('/client/orders/delivered/create', [DeliveredOrderController::class, 'create']);
Route::middleware('auth:api')->get('/client/orders/delivered/delete', [DeliveredOrderController::class, 'delete']);

#pending orders
Route::middleware('auth:api')->get('/client/orders/pending/index', [PendingOrderController::class, 'index']);
Route::middleware('auth:api')->get('/client/orders/pending/show/{id}', [OrdersController::class, 'show']);
