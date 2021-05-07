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

Route::get('/welcome', function(){
  return view('welcome');
});

Route::get('/change/password','AdminControllers\UserController@changePassword')->name('change.password');
Route::post('/change/password','AdminControllers\UserController@password')->name('password');

Route::get('/{id}/download', 'AdminControllers\CardController@download')->name('download');


Route::get('crop-image-before-upload-using-croppie', 'CropImageController@index');
Route::post('crop-image-before-upload-using-croppie', ['as'=>'croppie.upload-image','uses'=>'CropImageController@uploadCropImage']);

#RESET-PASSWORD

Route::get('/user/passwordreset/{email}/{userID}', 'APIControllers\LoginController@forgetview');
Route::post('/user/changePassword', 'APIControllers\LoginController@changePassword');

Route::get('/{id}/downloaddata', 'AdminControllers\CardController@downloaddata')->name('downloaddata');

Route::get('/login', 'AdminControllers\LoginController@login')->name('web.login');
Route::post('/login', 'AdminControllers\LoginController@doLogin')->name('doLogin');
Route::get('/logout','AdminControllers\LoginController@logout')->name('web.logout');


Route::group(['middleware' => ['login']], function () {
    Route::get('/dashboard', 'AdminControllers\DashboardController@dashboard')->name('dashboard');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/listing','AdminControllers\UserController@index')->name('user.index');
        Route::get('/view/{id}','AdminControllers\UserController@view')->name('user.view');
        Route::post('/view/{id}','AdminControllers\UserController@approveCrd');
        Route::get('/change-status','AdminControllers\UserController@changeUserStatus')->name('user.change-status');
    });

    Route::group(['prefix' => 'hospital'], function () {
        Route::get('/listing','AdminControllers\HospitalController@index')->name('hospital.index');
        Route::get('/view/{id}','AdminControllers\HospitalController@view')->name('hospital.view');
        Route::get('/add','AdminControllers\HospitalController@add')->name('hospital.add');
        Route::post('/save','AdminControllers\HospitalController@save')->name('hospital.save');
        Route::get('/edit/{id}','AdminControllers\HospitalController@edit')->name('hospital.edit');
        Route::post('/update/{id}','AdminControllers\HospitalController@update')->name('hospital.update');
        Route::post('/{catid}/image/delete/{id}','AdminControllers\HospitalController@imageDelete')->name('hospital.image');
        Route::post('/delete/{id}','AdminControllers\HospitalController@hospitalDelete')->name('hospital.delete');
        Route::post('/disable/{id}','AdminControllers\HospitalController@hospitalDisable')->name('hospital.disable');
        Route::post('/enable/{id}','AdminControllers\HospitalController@hospitalEnable')->name('hospital.enable');

        Route::get('/service/listing/{hospitalid}','AdminControllers\HospitalController@serviceListing')->name('service.index');
        Route::post('/service/{id}','AdminControllers\HospitalController@serviceDelete')->name('service.delete');

    });

    Route::group(['prefix' => 'card'], function () {

        Route::get('/single/listing','AdminControllers\CardController@singleCardListing')->name('single.card');
        Route::get('/single/view/{id}','AdminControllers\CardController@singleCardView')->name('single.view');
        Route::post('single/view/{id}','AdminControllers\UserController@approveCrd');
        Route::get('/family/vieww/{id}','AdminControllers\CardController@familyCardVieww')->name('family.vieww');
        Route::post('family/vieww/{id}','AdminControllers\UserController@approveCrd');
        Route::get('/family/listing','AdminControllers\CardController@familyCardListing')->name('family.card');
        Route::get('/family/view/{id}','AdminControllers\CardController@familyCardView')->name('family.view');
        Route::get('/request/single','AdminControllers\CardController@requestSingle')->name('request.single');
        Route::get('/request/family','AdminControllers\CardController@requestFamily')->name('request.family');
    });

    Route::group(['prefix' => 'cardtype'], function () {
      Route::get('/listing','AdminControllers\CardTypeController@index')->name('cardtype.index');
      Route::get('/add','AdminControllers\CardTypeController@add')->name('cardtype.add');
      Route::post('/save','AdminControllers\CardTypeController@save')->name('cardtype.save');
      Route::post('/disable/{id}','AdminControllers\CardTypeController@cardTypeDisable')->name('cardtype.disable');
      Route::post('/enable/{id}','AdminControllers\CardTypeController@cardTypeEnable')->name('cardtype.enable');
      Route::get('/edit/{id}','AdminControllers\CardTypeController@edit')->name('cardtype.edit');
      Route::post('/update/{id}','AdminControllers\CardTypeController@update')->name('cardtype.update');
      Route::post('/delete/{id}','AdminControllers\CardTypeController@cardtypeDelete')->name('cardtype.delete');
    });

    Route::group(['prefix' => 'documenttype'], function () {
      Route::get('/listing','AdminControllers\DocumentTypeController@index')->name('documenttype.index');
      Route::get('/add','AdminControllers\DocumentTypeController@add')->name('documenttype.add');
      Route::post('/save','AdminControllers\DocumentTypeController@save')->name('documenttype.save');
      Route::post('/disable/{id}','AdminControllers\DocumentTypeController@DocumentTypeDisable')->name('documenttype.disable');
      Route::post('/enable/{id}','AdminControllers\DocumentTypeController@DocumentTypeEnable')->name('documenttype.enable');
      Route::get('/edit/{id}','AdminControllers\DocumentTypeController@edit')->name('documenttype.edit');
      Route::post('/update/{id}','AdminControllers\DocumentTypeController@update')->name('documenttype.update');
      Route::post('/delete/{id}','AdminControllers\DocumentTypeController@documenttypeDelete')->name('documenttype.delete');
    });

     Route::group(['prefix' => 'offer'], function () {
        Route::get('/listing','AdminControllers\OfferController@index')->name('offer.index');
        Route::get('/add','AdminControllers\OfferController@add')->name('offer.add');
        Route::post('/save','AdminControllers\OfferController@save')->name('offer.save');
        Route::get('/edit/{id}','AdminControllers\OfferController@edit')->name('offer.edit');
        Route::post('/update/{id}','AdminControllers\OfferController@update')->name('offer.update');
        Route::post('/delete/{id}','AdminControllers\OfferController@delete')->name('offer.delete');
        Route::post('/enable/{id}','AdminControllers\OfferController@Enable')->name('offer.enable');
        Route::post('/disable/{id}','AdminControllers\OfferController@Disable')->name('offer.disable');

     });

     Route::group(['prefix' => 'banner'], function () {
      Route::get('/listing','AdminControllers\OfferController@bannerIndex')->name('banner.index');
      Route::get('/add','AdminControllers\OfferController@addBanner')->name('banner.add');
      Route::post('/save','AdminControllers\OfferController@saveBanner')->name('banner.save');
      Route::get('/edit/{id}','AdminControllers\OfferController@editBanner')->name('banner.edit');
      Route::post('/update/{id}','AdminControllers\OfferController@updateBanner')->name('banner.update');
      Route::post('/delete/{id}','AdminControllers\OfferController@deleteBanner')->name('banner.delete');
      
     });

     Route::group(['prefix' => 'getin/touch'], function () {
      Route::get('/listing','AdminControllers\UserController@listing')->name('contact.index');
     }); 


     Route::group(['prefix' => 'notification'], function () {
          Route::get('/listing','AdminControllers\NotificationController@index')->name('notification.index');
          Route::get('/read/status','AdminControllers\NotificationController@readStatus')->name('read.status');
     });


       Route::group(['prefix' => 'aboutus'], function () {
          Route::get('/view','AdminControllers\UserController@aboutus')->name('aboutus.view');
          Route::get('/edit','AdminControllers\UserController@editAboutUs')->name('edit.aboutus');
          Route::post('/update','AdminControllers\UserController@updateAboutUs')->name('update.aboutus');
     });
     
      Route::group(['prefix' => 'policy'], function () {
          Route::get('/view','AdminControllers\UserController@policy')->name('policy.view');
          Route::get('/edit','AdminControllers\UserController@policyEdit')->name('edit.policy');
          Route::post('/update','AdminControllers\UserController@updatePolicy')->name('update.policy');
     });

    Route::group(['prefix' => 'condition'], function () {
          Route::get('/view','AdminControllers\UserController@condition')->name('condition.view');
          Route::get('/edit','AdminControllers\UserController@conditionEdit')->name('condition.edit');
          Route::post('/update','AdminControllers\UserController@conditionUpdate')->name('condition.update');
     });





});
