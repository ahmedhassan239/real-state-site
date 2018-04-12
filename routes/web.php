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
/*
 * admin routs
 */
Route::group(['middleware'=>['web','admin']],function (){
    Route::get('/adminpanel','AdminController@index');
  
    Route::resource('/adminpanel/users','UsersController');
    Route::post('/adminpanel/user/changepassword/','UsersController@updatepassword');
    Route::patch('/adminpanel/users/{id}/update/', 'UsersController@update')->name('update_user');
    Route::get('/adminpanel/users/{id}/delete/', 'UsersController@destroy')->name('delete');
    Route::post('/adminpanel/users/data',[
        'as'=>'adminpanel.users.data',
        'uses'=>'UsersController@anyData'
    ]);

    /*Contacts*/
    Route::resource('/adminpanel/contact', 'ContactsController');
    Route::patch('/adminpanel/contact/{id}/update/', 'ContactsController@update')->name('updated');
    Route::get('/adminpanel/contact/{id}/delete/', 'ContactsController@destroy')->name('delete');
    Route::post('/adminpanel/contact/data',[
        'as'=>'adminpanel.contact.data',
        'uses'=>'ContactsController@anyData'
    ]);
    //Bu
    Route::resource('/adminpanel/bu','BuController');
    Route::patch('/adminpanel/bu/{id}/update/', 'BuController@update')->name('update');
    Route::get('/adminpanel/bu/{id}/delete/', 'BuController@destroy')->name('delete');
    Route::post('/adminpanel/bu/data',[
        'as'=>'adminpanel.bu.data',
        'uses'=>'BuController@anyData'
    ]);
    //Setting site
    Route::get('/adminpanel/sitesetting', 'SiteSettingController@index');
    Route::post('/adminpanel/sitesetting', 'SiteSettingController@store');

});
/*
 * ahmed Branch hear
 */
/*
 *user routs
 */
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/show_all_buildings','BuController@showAllEnable');
Route::get('/for_rent','BuController@for_rent');
Route::get('/for_buy','BuController@for_buy');
Route::get('/type/{type}','BuController@showByType');
Route::get('/search','BuController@search');
Route::get('/single_building/{id}','BuController@showSingle');
Route::get('/ajax/bu/information','BuController@getAjaxInfo');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact');
Route::post('/contact/store', 'ContactsController@store');