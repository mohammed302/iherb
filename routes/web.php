<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */


Auth::routes();


// front_end

Route::group(['namespace' => 'FrontEnd'], function() {

    //home page
    Route::get('/', 'HomeController@index')->name('front.index');
    //order  requset
    Route::post('order/', 'HomeController@storeOrder')->name('front.order');
     //pay
     Route::get('/pay', 'HomeController@pay')->name('front.pay');
     //pay  store
      Route::post('/pay', 'HomeController@storePayment')->name('front.payment'); 

});

//loging/logout
Route::group(['prefix' => 'admin-cpx'], function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});
//admin route
Route::group(['prefix' => 'admin-cpx', 'namespace' => 'Admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    // change password
    Route::get('/changePassword', 'AdminController@changePassword')->name('admin.changePassword');
    Route::post('/changePass', 'AdminController@ChangePass')->name('admin.changePass');
    //setting
    Route::get('/setting', 'AdminController@setting')->name('admin.setting');
    Route::post('/setting', 'AdminController@updateSetting')->name('admin.setting.update');

    //
    // orders
    Route::get('brorders/', 'AdminController@brorders')->name('subadmins.orders');

    //admins
    Route::get('/admins', 'AdminController@admins')->name('admins.admins');
    Route::get('admins/create', 'AdminController@addAdmin')->name('admins.create');
    Route::post('admins/store', 'AdminController@store')->name('admins.store');
    Route::get('admins/destroy/{admin}', 'AdminController@destroy')->name('admins.destroy');
    Route::get('admins/edit/{admin}', 'AdminController@editAdmin')->name('admins.edit');
    Route::post('admins/update/{admin}', 'AdminController@update')->name('admins.update');


    // orders
    Route::get('orders/', 'OrderController@orders')->name('admin.orders');
    Route::get('orders/destroy/{id}', 'OrderController@destroyOrder')->name('admins.orders.destroy');
    Route::get('orders/destroy', 'OrderController@destroyOrders')->name('admins.allorders.destroy');
    Route::get('orders/update/{id}/{st}', 'OrderController@update')->name('admins.order.update');
    Route::get('orders/{id}', 'OrderController@orders_search')->name('admins.orders.search');
    ///
    Route::get('orders/update/{id}/{st}', 'OrderController@update')->name('admins.order.update');
    Route::get('orders/updateCharge/{id}', 'OrderController@updateCharge')->name('admins.order.updateCharge');
    Route::get('orders/updateOrder/{id}', 'OrderController@updateOrder')->name('admins.order.updateOrder');
    //payments
    Route::get('payments/', 'PaymentController@payments')->name('admin.payments');
    Route::get('payments/destroy/{id}', 'PaymentController@destroy')->name('admins.payments.destroy');
    Route::get('payments/update/{id}/{or}', 'PaymentController@updateOrder')->name('admins.payments.update');
    Route::get('payments/updateCancel/{id}/{or}', 'PaymentController@updateCancel')->name('admins.payments.updateCancel');
    Route::get('payments/{id}', 'PaymentController@payments_search')->name('admin.payments_search');
});



Route::group(['namespace' => 'Admin'], function() {

    Route::resource('admin-cpx/states', 'StateController');
       Route::resource('admin-cpx/banks', 'BankController');
  //  Route::resource('admin-cpx/charges', 'ChargeController');

    //////////////////////////////////////////////////////
});


