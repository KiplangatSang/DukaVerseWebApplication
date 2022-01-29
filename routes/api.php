<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FcmCloudMessagingController;
use App\Http\Controllers\payments\mpesa\MpesaController;
use App\Http\Controllers\payments\mpesa\MpesaResponseController;

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

Route::post('validation', [MpesaResponseController::class,'validation']);
Route::post('confirmation', [MpesaResponseController::class,'confirmation']);
Route::post('simulate', [MpesaResponseController::class,'validation']);
Route::post('stkpush', [MpesaController::class,'stkPushResponse']);

Route::post('send-fcm-token', [FcmCloudMessagingController::class,'firebaseTokenStorage']);
Route::post('get-fcm-token', [FcmCloudMessagingController::class,'firebaseTokenRetrieve']);
Route::post('make-notification', [FcmCloudMessagingController::class,'makeNotification']);
Route::get('curl_download', [FcmCloudMessagingController::class,'curldownload']);
Route::post('make-updateToken', [FcmCloudMessagingController::class,'updateToken']);
Route::post('sendNotification', [FcmCloudMessagingController::class,'sendNotification']);
Route::post('delete-Tokendata', [FcmCloudMessagingController::class,'deleterecords']);
