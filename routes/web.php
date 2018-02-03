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




Route::get('/place',[
  'uses' => 'PlaceController@index',
    'as' => 'admin.place'
]);

Route::post('/place',[
  'uses' => 'PlaceController@placeCreate',
    'as' => 'admin.placeCreate'
]);

Route::get('place/{PlaceEdit_id}/edit',[
  'uses' => 'PlaceController@getUpdatePlace',
    'as' => 'admin.placeEdit'
]);

Route::post('/place/update',[
  'uses' => 'placeController@postUpdatePlace',
    'as' => 'admin.placeupdate'
]);

Route::get('Place/delete/{Placedelete_id}',[
  'uses' => 'PlaceController@destroy',
    'as' => 'admin.placedelete'
]);

// hotel type  -----------------------------------------------------------------

Route::get('/hoteltype',[
  'uses' => 'HotelTypeController@index',
    'as' => 'admin.hotelTypes.hoteltype'
]);

Route::post('/hoteltype',[
  'uses' => 'HotelTypeController@hoteltypeCreate',
    'as' => 'admin.hotelTypes.hoteltypeCreate'
]);

Route::get('hoteltype/{HoteltypeEdit_id}/edit',[
  'uses' => 'HotelTypeController@getUpdateHoteltype',
    'as' => 'admin.hotelTypes.hoteltypeEdit'
]);

Route::post('/hoteltype/update',[
  'uses' => 'HotelTypeController@postUpdateHoteltype',
    'as' => 'admin.hotelTypes.hoteltypeupdate'
]);

Route::get('hoteltype/delete/{Hoteltypedelete_id}',[
  'uses' => 'HotelTypeController@destroy',
    'as' => 'admin.hotelTypes.hoteltypedelete'
]);

// hotel  ----------------------------------------------------------------------

Route::get('/hotel',[
  'uses' => 'HotelController@index',
    'as' => 'admin.hotel.hotel'
]);

Route::post('/hotel',[
  'uses' => 'HotelController@hotelCreate',
    'as' => 'admin.hotel.hotelCreate'
]);

Route::get('hotel/{HotelEdit_id}/edit',[
  'uses' => 'HotelController@getUpdateHotel',
    'as' => 'admin.hotel.hotelEdit'
]);

Route::post('/hotel/update',[
  'uses' => 'HotelController@postUpdateHotel',
    'as' => 'admin.hotel.hotelupdate'
]);

Route::get('hotel/delete/{Hoteldelete_id}',[
  'uses' => 'HotelController@destroy',
    'as' => 'admin.hotel.hoteldelete'
]);

// religion  -------------------------------------------------------------------


  Route::get('/religion',[
    'uses' => 'ReligionController@index',
      'as' => 'admin.religion.religion'
  ]);

  Route::post('/religion',[
    'uses' => 'ReligionController@religionCreate',
      'as' => 'admin.religion.religionCreate'
  ]);

  Route::get('religion/{ReligionEdit_id}/edit',[
    'uses' => 'ReligionController@edit',
      'as' => 'admin.religion.religionEdit'
  ]);

  Route::post('/religion/update',[
    'uses' => 'ReligionController@update',
      'as' => 'admin.religion.religionupdate'
  ]);

  Route::get('religion/delete/{Religiondelete_id}',[
    'uses' => 'ReligionController@destroy',
      'as' => 'admin.religion.religiondelete'
  ]);



//  ----------------------------------------------------------------------------

Route::get('/visit',[
  'uses' => 'VisiInfoController@index',
    'as' => 'visitplace'
]);


  /* -----------------------------    Country    ----------------------------------*/

Route::get('/CountryController/get', 'CountryController@index');
Route::post('/CountryController/countryCreate', 'CountryController@countryCreate');
Route::get('/edit/{CountryEdit_id}', 'CountryController@getUpdateCountry');
Route::post('/post/{CountryEdit_id}', 'CountryController@postUpdateCountry');
Route::get('/CountryDeleted/{CountryDeletet_id}', 'CountryController@destroy');


  /* -----------------------------    Division --------------------------------*/

Route::get('/DivisionController/get', 'DivisionController@index');
Route::post('/DivisionController/divisionCreate', 'DivisionController@divisionCreate');
Route::get('/Division/edit/{DivisionEdit_id}', 'DivisionController@getUpdateDivision');
Route::post('/Division/post/{DivisionEdit_id}', 'DivisionController@postUpdateDivision');
Route::get('/deleteDivision/{Divisiondelete_id}', 'DivisionController@destroy');

/* -----------------------------    District --------------------------------*/

Route::get('/DistrictController/get', 'DistrictController@index');
Route::post('/DistrictController/districtCreate', 'DistrictController@districtCreate');
Route::get('/District/edit/{DistrictEdit_id}', 'DistrictController@getUpdateDistrict');
Route::post('/District/post/{DistrictEdit_id}', 'DistrictController@postUpdateDistruct');
Route::get('/deleteDistrict/{Districtdelete_id}', 'DistrictController@destroy');

/* -----------------------------    Place --------------------------------*/

Route::get('/PlaceController/get', 'PlaceController@index');
Route::post('/PlaceController/placeCreate', 'PlaceController@placeCreate');
Route::get('/Place/edit/{PlaceEdit_id}', 'PlaceController@getUpdatePlace');
Route::post('/Place/post/{PlaceEdit_id}', 'PlaceController@postUpdatePlace');
Route::get('/deletePlace/{Placedelete_id}', 'PlaceController@destroy');

Route::get('/post', function () {
    return view('admin.post');
})->name('post');

/* ----------------------------------   image -------------------------------------*/

Route::post('upload', 'VisiInfoController@upload');
Route::get('showImage', 'VisiInfoController@index');

Route::get('postview', 'VisiInfoController@show')->name('postview');
Route::get('postedit/{postedit_id}', 'VisiInfoController@edit')->name('singlepost');

Route::post('update/post', 'VisiInfoController@update')->name('singlepostupdate');
Route::get('postdelete/{postdelete_id}', 'VisiInfoController@destroy');

Route::get('postshow/{postshow_id}', 'VisiInfoController@singlepostshow')->name('singlepostshow');


/*  ------------------------- catagory show all ------------------------------*/
Route::get('catagoryShow/{cat_id}', 'VisiInfoController@catagoryShow')->name('catagoryShow');

/*  ------------------------- Hotel List ------------------------------*/

Route::get('hotelList/{list_id}', 'HotelController@hotelList')->name('hotelList');

/*  ------------------------- restaurant List ------------------------------*/

Route::get('restaurantList/{list_id}', 'RestaurantController@restaurantList')->name('restaurantList');

/*  ------------------------- restaurant Find ------------------------------*/

Route::get('restaurantFind', 'RestaurantController@restaurantFind')->name('restaurantFind');
/*  ------------------------- Place Find ------------------------------*/


/*  ------------------------- hotel Find ------------------------------*/

Route::get('hotelFind', 'HotelController@hotelFind')->name('hotelFind');

/*  ------------------------- Search show all ------------------------------*/
Route::get('searchGet', 'VisiInfoController@searchGet');

Route::get('RestauantSearchGet', 'RestaurantController@RestauantSearchGet');
Route::post('restauantSearchPost', 'RestaurantController@RestauantSearchPost');


Route::get('HotelSearchGet', 'HotelController@HotelSearchGet');
Route::post('hotelSearchPost', 'HotelController@hotelSearchPost');



Route::get('placeSearchGet', 'VisiInfoController@placeSearchGet');

// Route::get('mainPagePlaceSearch', 'VisiInfoController@showPage')->name('showPage');
Route::get('mainPagePlaceSearch' , 'VisiInfoController@mainPagePlaceSearch')->name('mainPagePlaceSearch');




/* ----------------------------------- */
Route::get('restaurant', 'RestaurantController@index')->name('restaurant');
Route::post('restaurant/post', 'RestaurantController@create')->name('restaurantCreate');
Route::post('restaurant/{status_id}/status', 'RestaurantController@status');


Route::get('restaurant/{restaurant_id}', 'RestaurantController@edit')->name('singleRestaurant');
Route::post('restaurant/update', 'RestaurantController@update')->name('restaurantUpdate');
Route::get('restaurantdelete/{restaurantdelete_id}', 'RestaurantController@destroy');


/*  --------------------------------   Provider --------------------------------- */
Route::get('provider', 'ProviderController@index')->name('provider');
Route::post('provider/post', 'ProviderController@create')->name('providerCreate');
Route::get('providerUpdate/{providert_id}', 'ProviderController@edit')->name('singleProvider');
Route::post('providerEdit/update', 'ProviderController@update')->name('providerUpdate');
Route::get('providerdelete/{providerdelete_id}', 'ProviderController@destroy');

/*  --------------------------------   Service  --------------------------------- */
Route::get('service', 'ServiceContactController@index')->name('service');
Route::post('service/post', 'ServiceContactController@create')->name('serviceCreate');
Route::get('serviceUpdate/{service_id}', 'ServiceContactController@edit')->name('singleService');
Route::post('serviceEdit/update', 'ServiceContactController@update')->name('serviceUpdate');
Route::get('servicedelete/{servicedelete_id}', 'ServiceContactController@destroy');

/*  --------------------------------   Warning  --------------------------------- */
Route::get('warning', 'WarningController@index')->name('warning');
Route::post('warning/post', 'WarningController@create')->name('warningCreate');
Route::get('warningUpdate/{warning_id}', 'WarningController@edit')->name('singleWarning');
Route::post('warningEdit/update', 'WarningController@update')->name('warningUpdate');
Route::get('warningdelete/{warningdelete_id}', 'WarningController@destroy');


/*  --------------------------------   Rating Route  --------------------------------- */

Route::post('/rating', 'RatingController@store');

/*  --------------------------------   Market Route  --------------------------------- */
Route::get('market', 'MarketController@index')->name('market');
Route::post('market/post', 'MarketController@create')->name('marketCreate');
Route::get('marketUpdate/{market_id}', 'MarketController@edit')->name('singleMarket');
Route::post('marketEdit/update', 'MarketController@update')->name('marketUpdate');
Route::get('marketdelete/{marketdelete_id}', 'MarketController@destroy');

/* -----------------------------    Event -----------------------------------*/

Route::get('event', 'EventController@index')->name('event');
Route::post('event/post', 'EventController@create')->name('eventCreate');
Route::post('event/{event_id}/status', 'EventController@status');
Route::get('event/{event_id}', 'EventController@edit')->name('singleEventt');
Route::post('event/update', 'EventController@update')->name('eventUpdate');
Route::get('eventDelete/{eventDelete_id}', 'EventController@destroy');

/* ----------------------------- Social ------------------------------------ */

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');


/* -----------------------------   place type  --====------------------------- */

Route::get('/placetype',[
  'uses' => 'PlaceTypeController@index',
    'as' => 'admin.placetype.placeTypes'
]);

Route::post('/placetype',[
  'uses' => 'PlaceTypeController@store',
    'as' => 'admin.placetype.placetypeCreate'
]);

Route::get('placetype/{PlacetypeEdit_id}/edit',[
  'uses' => 'PlaceTypeController@edit',
    'as' => 'admin.placetype.placetypesEdit'
]);

Route::post('/placetype/update',[
  'uses' => 'PlaceTypeController@update',
    'as' => 'admin.placetype.placetypeupdate'
]);

Route::get('placetype/delete/{Placetypedelete_id}',[
  'uses' => 'PlaceTypeController@destroy',
    'as' => 'admin.placetype.placetypedelete'
]);
/* ----------------------------------   forend  -------------------------------------*/

Route::get('main', 'VisiInfoController@main')->name('indexpage');
Route::get('search', 'VisiInfoController@search')->name('search');
Route::get('singlepage', 'VisiInfoController@singlepage');
Route::get('singlepage/{singlepage_id}', 'VisiInfoController@singlepageView')->name('singlepage');

/* ----------------------------------     -------------------------------------*/

Auth::routes();

Route::get('/addplace', function () {
    return view('admin.indexAdmin');
})->name('addplace');



Route::get('/logout', 'Auth\LoginController@logout')->name('user.logout');
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function() {



  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
