<?php

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

    Route::get('/clear-cache', function() {
        Artisan::call('optimize:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        return redirect()->back();
    });

    Route::get('/migrate', function() {
        Artisan::call('migrate');
        return redirect()->back();
    });

    Route::group(['middleware' => ['global.password']], function() {
        Auth::routes();
    });

    Route::group(['middleware' => ['auth', 'global.password']], function () { 
    Route::get('/home', 'HomeController@index')->name('home');
    // Users Route
    Route::resource('/users', 'UsersController');
    
    Route::resource('/expenditures', 'ExpendituresController');
    
    Route::get('fees-summary/', 'FeesController@view_summary')->name('view-summary');
    Route::post('/clients/{id}/add-fees/', 'FeesController@add_fees')->name('add-fees');
    Route::get('/clients/{id}/edit-fees/', 'FeesController@edit_fees')->name('edit-fees-ajax');
    Route::post('/clients/{id}/update-fees/', 'FeesController@update_fees')->name('update-fees');
    Route::delete('/clients/{fee}/remove-fees/', 'FeesController@delete_fees')->name('delete-fees');
    
    Route::post('/clients/{misc}/add-misc/', 'MiscController@add_misc')->name('add-misc');
    Route::get('/clients/{misc}/edit-misc/', 'MiscController@edit_misc')->name('edit-misc-ajax');
    Route::post('/clients/{misc}/update-misc/', 'MiscController@update_misc')->name('update-misc');
    Route::delete('/clients/{misc}/remove-misc/', 'MiscController@delete_misc')->name('delete-misc');


    Route::get('/clients/misc', 'ClientsController@misc')->name( 'misc' );
    
    Route::get('/clients/{id}/tax-client', 'ClientsController@get_client_detail')->name('get-income-tax-client');
    Route::get('/clients/income-tax', 'ClientsController@income_tax')->name( 'income-tax' );

    Route::get('/clients/sales-tax', 'ClientsController@sales_tax')->name( 'sales-tax' );
    Route::get('/clients/with-holding-tax', 'ClientsController@with_holding_tax')->name( 'with-holding-tax' );
    Route::get('/clients/sindh-revenue-board', 'ClientsController@sindh_revenue_board')->name( 'sindh-revenue-board' );
    Route::get('/clients/trade-mark', 'ClientsController@trade_mark')->name( 'trade-mark' );
    Route::resource('/clients', 'ClientsController');
    
    Route::get('/activity-logs', 'OptionsController@view_log_table')->name('activity-log-table');
    Route::get('/activity-log/{log}/', 'OptionsController@view_log')->name('activity-log');
    Route::get('/set-password', 'OptionsController@view_global_password')->name('global-password');
    Route::put('/set-password', 'OptionsController@set_global_password')->name('set-global-password');
});

Route::get('/security', 'OptionsController@security')->name('security');
Route::post('/security', 'OptionsController@security_post')->name('security-post');
