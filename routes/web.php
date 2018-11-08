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
        Route::get('fiscaldata', 'System\ManageController@fiscal')->name('manage.fiscal');
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
        route::get('bills/create', 'System\PurchaseController@createBill')->name('purchases.bill.create');
        Route::get('receipts','System\PurchaseController@receipts')->name('purchases.receipts');
    });

    Route::group(['prefix'=>'accounting'], function(){
        Route::get('transaction','System\AccountingController@transaction')->name('accounting.transaction');
        Route::get('transaction/add-journal','System\AccountingController@addTransaction')->name('accounting.transaction.add');
        Route::get('journaltransaction','System\AccountingController@journaltransaction')->name('accounting.journaltransaction');
        Route::get('journaltransaction/{id}', 'System\AccountingController@editJournal')->name('accounting.journaltransaction.edit');
        Route::get('startingbalance','System\AccountingController@startingbalance')->name('accounting.startingbalance');
    });

    Route::group(['prefix'=>'report'], function(){
        Route::get('financial', 'System\ReportController@financial')->name('report.financial');
    });
});
