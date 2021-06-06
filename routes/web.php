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



Route::get('/', 'HomeController@index')->name('welcome');
Route::get('/speaker/{id}','HomeController@speaker');

Auth::routes(['register' => false]);
Route::get('/admin/dashboard', 'Admin\HomeController@index')->middleware(['auth','auth.admin'])->name('admin.dashboard');
Route::get('/user/dashboard', 'User\HomeController@index')->middleware(['auth'])->name('user.dashboard');
Route::post('/checkout', 'CheckoutController@checkout')->name('checkout');
Route::post('/contact', 'ContactController@sendMessage')->name('contact.send');
Route::post('/subscriber', 'SubscriberController@subscriber')->name('subscribe');





Route::namespace('Admin')->prefix('admin')->middleware(['auth','auth.admin'])->name('admin.')->group(function(){
    Route::resource('/users','UserController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/speakers','SpeakersController');
    Route::resource('/roles','RolesController');
    Route::resource('/sponsors','SponsorsController');
    Route::resource('/faqs','FaqsController');
    Route::resource('/galleries','GalleriesController');
    Route::resource('/hotels','HotelsController');
    Route::resource('/schedules','SchedulesController');
    Route::resource('/settings','SettingsController');
    Route::resource('/amenities','AmenitiesController');
    Route::resource('/tickets','TicketsController');
    Route::get('checkouts', 'CheckoutController@index')->name('checkouts.index');
    Route::delete('checkouts/{id}', 'CheckoutController@destroy')->name('checkouts.destroy');  
    Route::get('contacts', 'ContactController@index')->name('contacts.index');
    Route::get('contacts/{id}','ContactController@show')->name('contacts.show');
    Route::delete('contacts/{id}', 'ContactController@destroy')->name('contacts.destroy');
    Route::get('subscribers', 'SubscriberController@index')->name('subscribers.index');
    Route::delete('subscribers/{id}', 'SubscriberController@destroy')->name('subscribers.destroy');
});


