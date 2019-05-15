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

Route::group(['prefix' => 'admin'], function () {


Route::get('/', function () {
  return redirect('/admin/login');
});

  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/dashboard', 'Admin\DashboardController@index');

  Route::get('/user', 'Admin\UserController@index');

  Route::get('/comment', 'Admin\CommentController@index');
  Route::get('/comment/delete/{id}', 'Admin\CommentController@destroy');

  Route::group(['prefix' => 'product'], function() {

    Route::get('/', 'Admin\ProductController@index');
    Route::get('/edit/{id}', 'Admin\ProductController@edit');
    Route::post('/update/{id}', 'Admin\ProductController@update');
    Route::get('/update', 'Admin\ProductController@massive');
    Route::post('/update', 'Admin\ProductController@massiveUpdate');
  	Route::post('/', 'Admin\ProductController@store');
    Route::get('/add', 'Admin\ProductController@create');
  	Route::get('/delete/{id}', 'Admin\ProductController@destroy');

    Route::get('/graph/{id}', 'Admin\ProductController@graph');

    Route::get('/category', 'Admin\CategoryController@index');
    Route::post('/category', 'Admin\CategoryController@store');
    Route::get('/category/delete/{id}', 'Admin\CategoryController@destroy');
    Route::put('/category/', 'Admin\CategoryController@update');



  });

  Route::prefix('store')->group(function(){
    Route::get('/', 'Admin\StoreController@index');
    Route::post('/', 'Admin\StoreController@store');
    Route::post('/update/price', 'Admin\StoreController@updatePrice');
    Route::put('/update/', 'Admin\StoreController@update');

    Route::get('/show/{id}', 'Admin\StoreController@show');
    Route::get('/edit/{id}', 'Admin\StoreController@edit');
    Route::get('/delete/{id}', 'Admin\StoreController@destroy');
  });

  Route::prefix('profile')->group(function(){
    Route::get('/', 'Admin\ProfileController@index');
    Route::post('/info', 'Admin\ProfileController@info');
    Route::post('/username', 'Admin\ProfileController@username');
    Route::post('/password', 'Admin\ProfileController@password');
  });

});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index');
Route::get('/store/view/{id}', 'HomeController@store');

Route::get('/store/{id}', 'User\UserController@store');
Route::get('/comments', 'User\UserController@commentBox');
Route::get('/comments/delete/{id}', 'User\UserController@commentDelete');
Route::post('/comment', 'User\UserController@comment');

Route::prefix('profile')->group(function(){
    Route::get('/', 'User\ProfileController@index');
    Route::post('/info', 'User\ProfileController@info');
    Route::post('/username', 'User\ProfileController@username');
    Route::post('/password', 'User\ProfileController@password');
  });



