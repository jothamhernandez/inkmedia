<?php



Route::get('/', 'WelcomeController@index');



Auth::routes();

Route::get('/home', function(){
    return redirect('admin/dashboard');
})->name('home');

// Route::get('/admin/{demopage?}', 'DemoController@demo')->name('demo');
// Admin Routes
Route::group(['prefix'=>'admin','middleware'=>['auth']], function(){
    
    Route::get('dashboard','System\DashboardController@index');


    // Manage Routes
    Route::group(['prefix'=>'manage'], function(){
        Route::get('customers','System\ManageController@customer')->name('manage.customers');
        Route::get('vendors','System\ManageController@vendors')->name('manage.vendors');
        Route::get('chart-of-accounts','System\ManageController@chartofaccounts')->name('manage.coa');
        Route::get('item-products','System\ManageController@itemproduct')->name('manage.items');
    });

    // Manage Routes
    Route::group(['prefix'=>'sales'], function(){
        Route::get('estimates','System\SalesController@estimates')->name('sales.estimates');
        Route::get('estimates/create', 'System\SalesController@createEstimate')->name('sales.estimate.create');
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
