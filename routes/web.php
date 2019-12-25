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

/* Front-End Routes */
Route::get('/', 'HomeController@home')->name('FrontHome');;
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'HomeController@shop')->name('shop');
Route::get('/categories/{id}', 'HomeController@showCategory');
Route::get('/contact', function (){
    return view('Front.contactpage');
})->name('contactPage');
Route::get('/productdetails/{id}', 'HomeController@productDetails')->name('productDetails');
Route::get('/cart', 'CartController@index')->name('CartIndex');
Route::get('/cart/addItem/{id}', 'CartController@addItem')->name('CartAdd');
Route::put('/cart/update/{id}', 'CartController@update')->name('CartUpdate');
Route::get('/cart/remove/{id}', 'CartController@delete')->name('CartDelete');
Route::get('/profile', 'HomeController@userProfile')->name('userProfile');
Route::post('/profile', 'HomeController@updateUserProfile')->name('updateUserProfile');
Route::get('/wishlist', 'WishlistController@index')->name('WishlistIndex');
Route::get('/wishlist/addItem/{id}', 'WishlistController@add')->name('addToWishlist');
Route::get('/wishlistremove/{id}','WishlistController@removeItem')->name('removeFromWishlist');

/* Back-End Routes */ 
Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' =>['auth', 'admin'] ], function(){
	Route::get('/', function () {
    return view('Admin.index');
})->name('AdminHome');
Route::Resource('products', 'ProductController');
Route::Resource('categories', 'CategoryController');

});