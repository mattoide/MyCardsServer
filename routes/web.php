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

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');


Route::get('/addProduct', ['middleware' => 'auth', 'uses' => 'ProductsController@create']);
Route::post('/addProduct', 'ProductsController@store');
Route::post('/removeProduct', 'ProductsController@remove');


//Route::get('/home', ['middleware' => 'auth','uses' => 'ProductsController@index']);
Route::get('/home/my', ['middleware' => 'auth','uses' => 'ProductsController@indexMy']);
Route::get('/home/all', ['middleware' => 'auth','uses' => 'ProductsController@indexAll']);


/*Route::get('/home', ['middleware' => 'auth', function () {
    return view('home');
}]);*/