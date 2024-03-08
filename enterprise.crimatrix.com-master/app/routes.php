<?php
//auth not need
Route::get('/', function()
{
	return Redirect::to('hotel');
});

Route::get('hotel', 'HomeController@homePage');
Route::get('hotel/about', 'HomeController@aboutPage');
Route::get('hotel/contact', 'HomeController@contactPage');

Route::get('hotel/reset/{token}', 'HomeController@getReset');
//auth need
Route::get('hotel/guestlist', 'HomeController@getGuestlist');
Route::get('hotel/profile', 'HomeController@getProfile');
Route::get('hotel/subcribe', 'HomeController@getSubcribe');
Route::get('hotel/invoice', 'HomeController@getInvoice');
Route::get('hotel/faq', 'HomeController@getFaq');
Route::post('hotel/makepayment', 'HomeController@getMakepayment');
Route::post('hotel/paymentresponse', 'HomeController@getPaymentresponse');
Route::post('hotel/txnstatus', 'HomeController@getTxnstatus');
//Route::get('hotel/printinvoice', 'HomeController@getPrintinvoice');

//controllers (auth functions)
Route::controller('hotel/users', 'UsersController');
Route::controller('hotel/guest', 'GuestController');
Route::controller('hotel/admin', 'AdminController');
Route::controller('hotel/payments', 'PaymentController');
Route::controller('hotel/support', 'SupportController');
Route::get('hotel/payments/paymentdetails', 'PaymentController@getPaymentdetails');
Route::get('hotel/payments/printinvoice', 'PaymentController@getPrintinvoice');
Route::get('hotel/payments/requestcollection', 'PaymentController@getRequestcollection');


//api
Route::controller('hotel/police', 'PoliceController');
Route::controller('hotel/cron', 'CronController');
