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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog-home', function () {
    return view('blog-home');
});

Route::get('/blog-single', function () {
    return view('blog-single');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/elements', function () {
    return view('elements');
});

Route::get('/mail', function () {
    return view('mail');
});

Route::get('/portfolio', function () {
    return view('portfolio');
});

Route::get('/price', function () {
    return view('price');
});

Route::get('/services', function () {
    return view('services');
});

Route::resource('/rohs', 'ReachrohsController');

Route::get('rohs/{page}/delete', [
    'as'   => 'rohs.delete',
    'uses' => 'ReachrohsController@destroy',
]);

Route::post('rohs-store', [
    'as'   => 'rohs.store',
    'uses' => 'ReachrohsController@store',
]);

Route::get('login', array(
  'uses' => 'MainController@showLogin'
));

Route::get('rohs-create','ReachrohsController@create');

Route::post('login', array(
    'as' => 'login',
    'uses' => 'MainController@doLogin'
));

Route::get('logout', array(
    'as' => 'logout',
    'uses' => 'MainController@doLogout'
));


