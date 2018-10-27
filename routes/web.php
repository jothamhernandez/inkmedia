<?php



Route::get('/', 'WelcomeController@index');

Route::get('/admin/{demopage?}', 'DemoController@demo')->name('demo');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Admin Routes
Route::group(['prefix'=>'admin'], function(){
    
    // Manage Routes
    Route::group(['prefix'=>'manage'], function(){
        Route::get('customers','System\ManageController@customer')->name('manage.customers');
        Route::get('vendors','System\ManageController@vendors')->name('manage.vendors');
    });

    // Manage Routes
    Route::group(['prefix'=>'sales'], function(){
        Route::get('estimates','System\SalesController@estimates')->name('sales.estimates');
        Route::get('invoices','System\SalesController@invoices')->name('sales.invoices');
        Route::get('customer-statements','System\SalesController@customerstatements')->name('sales.customerstatements');
    });

    Route::group(['prefix'=>'purchases'], function(){
        Route::get('bills','System\PurchaseController@bills')->name('purchases.bills');
        Route::get('receipts','System\PurchaseController@receipts')->name('purchases.receipts');
    });

    Route::group(['prefix'=>'accounting'], function(){
        Route::get('transaction','System\AccountingController@transaction')->name('accounting.transaction');
        Route::get('journaltransaction','System\AccountingController@journaltransaction')->name('accounting.journaltransaction');
        Route::get('startingbalance','System\AccountingController@startingbalance')->name('accounting.startingbalance');
    });
});
