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


#LANDING-FLOW
Route::get('/getApiKey', 'APIControllers\LoginController@getApiKey');

Route::get('/offers/listing','APIControllers\HomeController@offerListing');

 Route::get('/view/all/offers','APIControllers\HomeController@ViewAll');

    Route::get('/offers/listing','APIControllers\HomeController@offerListing');
    Route::post('/offers/search','APIControllers\HomeController@offerSearch');

    Route::get('/directory/listing','APIControllers\HomeController@directoryListing');
    Route::post('/directory/search','APIControllers\HomeController@directorySearch');
    Route::post('/directory/detail','APIControllers\HomeController@directoryDetail');

    Route::post('/offer/detail','APIControllers\HomeController@offerDetail');
    Route::post('/offer/service/price','APIControllers\HomeController@offerServicePrice');

    Route::get('/about/us','APIControllers\ModuleController@aboutUs');
    Route::get('/about','APIControllers\ModuleController@aboutusview');

    Route::get('/terms/servies','APIControllers\ModuleController@termsServices');
    Route::get('/terms/services','APIControllers\ModuleController@terms');

    Route::get('/privacy/policy','APIControllers\ModuleController@privacyPolicy');
    Route::get('/policy','APIControllers\ModuleController@policy');

    Route::get('/cities','APIControllers\ModuleController@citiesListing');

   #Advance-Flow
    Route::get('/home','APIControllers\HomeController@home');

    


Route::group(['middleware' => ['checkApiKey']], function ()
{
    #LOGIN
    Route::post('/login','APIControllers\LoginController@login')->name('login');
    #SOCIAL-LOGIN
    Route::post('/social/login','APIControllers\LoginController@socialLogin')->name('social.login');
    #SIGN-UP
    Route::post('/signup','APIControllers\LoginController@signUp')->name('signup');
    #FORGOT-PASSWORD
    Route::post('/forget/password', 'APIControllers\LoginController@forgetPassword');
   
    Route::post('/single/card','APIControllers\CardController@addSingleCard');
    Route::post('/family/card','APIControllers\CardController@addFamilyCard');
    Route::post('/card/History','APIControllers\CardController@cardHistory');
    
    Route::post('/getin/touch','APIControllers\ModuleController@getinTouch');
    
    
   
    Route::post('/notification/status/change','APIControllers\UserController@notificationStatusChange');
    Route::post('/notification/listing','APIControllers\ModuleController@notificationListing');

    

   

    Route::get('/card/type','APIControllers\ModuleController@cardType');
    Route::get('/document/type','APIControllers\ModuleController@documentType');

    Route::post('/logout','APIControllers\LoginController@logout')->name('logout');
   
});

#checkAccessToken
Route::group(['middleware' => ['checkAccessToken']], function () {

  Route::get('/get/profile','APIControllers\UserController@getProfile');
    Route::post('/update/profile','APIControllers\UserController@updateProfile');
   
});

