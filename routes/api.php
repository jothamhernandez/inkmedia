<?php

use Illuminate\Http\Request;

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


Route::group(['prefix'=>'v1'], function(){
    Route::apiResource('coa','Api\CoaCategory');
    Route::apiResource('vendor', 'Api\VendorController');
    Route::apiResource('customer','Api\CustomerController');
    Route::apiResource('items', 'Api\ItemController');
    Route::apiResource('estimates', 'Api\EstimateController');
    Route::apiResource('transactions','Api\TransactionController');
    Route::apiResource('invoice', 'Api\InvoiceController');
    Route::apiResource('bills', 'Api\BillController');
    Route::apiResource('journal', 'Api\JournalController');
    Route::apiResource('fiscaldata','Api\FiscalDataController');
    Route::get('report','Api\ReportController@profitandloss');
    Route::get('report/financial', 'Api\ReportController@financial');
});