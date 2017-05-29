<?php

//Use Admin Nav Tables
use App\Admin_view;
use App\Admin_nav;
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

//Default HomePage
Route::get('/', 'HomeController@index');

//Home after login
Route::get('/home', 'HomeController@home')->name('home');

//Pricing
Route::resource('plans/', 'PlansController');
Route::get('plans2/{id}', 'PlansController@plans2');

Route::get('pricing', 'PlansController@index');

Route::get('sureplans', 'CompanyController@sureplans');

//Caveats as a resource/implicit
Route::get('caveats/publish/{id}', 'CaveatsController@publish');

Route::get('pdf/{id}', 'CaveatsDisplay@pdf');

Route::get('myplan/{id}', 'CaveatsController@getSubscription');
Route::post('moreinfo/', 'CaveatsController@additional_info');

Route::post('saveinfo/', 'UserController@create');

Route::post('confirmpublish/{id}', 'CaveatsController@confirmpublish');
Route::get('unpublish/{id}', 'CaveatsController@unpublish');
Route::get('republish/{id}', 'CaveatsController@republish');

Route::resource('caveats', 'CaveatsController');
Route::post('sendmail/{id}', ['uses'=>'CompanyController@sendEmail','as'=>'sendmail']);
Route::post('sendmail1', ['uses'=>'CompanyController@sendEmail1','as'=>'sendmail1']);
Route::get('planview', 'CaveatsController@planview');
Route::post('changeplan', 'CaveatsController@changeplan');
Route::get('cedit/{id}', 'CaveatsController@cedit')->middleware('auth');
Route::get('delete/{id}', 'CaveatsController@delete')->middleware('auth');
Route::post('storeedit', 'CaveatsController@storeedit');
Route::get('uploads/{id}', 'CaveatsController@uploads');
Route::post('doUpload', 'CaveatsController@doUpload');

Route::get('loadDefault', 'HomeController@loadDefault');
Route::post('getData/{offset}', 'HomeController@getData');

Route::get('getImg/{img}', function($image = null) {
    $path = storage_path() . '/app/' . $image;
    if (file_exists($path)) {
        return Response::download($path);
    }
});

Route::get('getImg2/{img}', function($image = null) {
    $path = storage_path() . '/app/caveats/' . $image;
    if (file_exists($path)) {
      $img = Image::make($path)->resize(220, 200);

    return $img->response('jpg');
       //  Response::download($path);
       // return Response::download($path);
    }
});



//Caveats as a resource
Route::get('/display/{id}', 'CaveatsDisplay@index');

Route::resource('/nocaveat', 'CaveatsDisplay@nocaveat');
//Subscriptions
Route::resource('subscriptions', 'SubscriptionsController');

//User
Route::resource('/user', 'UserController');

Route::get('/profile', 'UserController@show');

Route::get('/myusers', 'UserController@myusers');

Route::post('/check', 'UserController@check');

Route::post('/edit', 'UserController@edit');
Route::post('/editpass', 'UserController@editpass');

//Admin Routes
Route::get('/admin', 'AdminController@index');

//Admin Home Routes  
$admin_v = Admin_view::getAll();
foreach($admin_v as $v){
	Route::get('/admin/'.lcfirst($v->name), 'AdminController@'.lcfirst($v->name));
}

//Admin Top Nav Routes
$admin_n = Admin_nav::getAll();
foreach($admin_n as $n){

	//Admin Route
	Route::get('/admin/'.$n->alias, 'AdminController@'.$n->alias);

	//Resource Route
	Route::resource($n->alias, ucfirst($n->alias).'Controller');

  //Terms
  if($n->type == 'terms'){
    Route::get($n->alias, 'TermsController@index');
  }
}

//OAuth Routes
Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');

//Email Verification Route
Route::get('register/verify/{token}', 'Auth\RegisterController@verify');

Route::get('verify/{token}', ['as' => 'verify', 'uses' => 'Auth\VerifyController@index']);

//Route::get('register/sendTo/', 'Auth\RegisterController@test');

Route::get('/search', ['as' => 'search', 'uses' => 'SearchController@display'])->name('search');




