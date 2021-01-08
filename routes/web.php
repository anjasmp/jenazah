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
Auth::routes(['verify' => true]);

Route::get('/', 'HomepageController@index');

// Route::get('/product', 'DonationController@create')->name('product.create');
// Route::get('/product/list', 'DonationController@index')->name('product.list');


Route::get('/postlist', 'HomepageController@list_post')->name('post.list');

Route::get('/post/{slug}', 'HomepageController@detail_post')->name('post.detail');

Route::get('/categorylist/{category}', 'HomepageController@list_category')->name('post.category');

Route::get('/tagslist/{tags}', 'HomepageController@list_tags')->name('post.tags');

Route::get('/search', 'HomepageController@search')->name('post.search');



Route::get('/productlist', 'HomepageController@list_product')->name('product.list');

Route::get('/productdetail/{slug}', 'DetailProductController@index')
->name('product.detail');



Route::post('/productcheckout/{id}', 'CheckoutController@process')
->name('product.checkout-process');

Route::get('/productcheckout/{id}', 'CheckoutController@index')
->name('product.checkout');

Route::post('/productcheckout/create/{detail_id}', 'CheckoutController@create')
->name('product.checkout-create');

Route::get('/productcheckout/removefamilies/{detail_id}', 'CheckoutController@remove')
->name('product.checkout-removefamilies');


Route::get('/productcheckoutfamilies/{id}', 'CheckoutController@indexfamilies')
->name('product.checkoutfamilies');


Route::post('/productcheckout/createfamilies/{detail_id}', 'CheckoutController@createfamilies')
->name('product.checkout-createfamilies');







Route::get('/productcheckout/confirm/{id}', 'CheckoutController@success')
->name('product.checkout-success');




Route::get('/lazhaq', 'LazhaqController@index')
->name('lazhaq.index');

Route::get('/qurban', 'QurbanController@index')
->name('qurban.index');



Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::get('/profil/sejarah', 'ProfilController@sejarah')
->name('profil.sejarah');

Route::get('/profil/struktur', 'ProfilController@struktur')
->name('profil.struktur');

Route::get('/profil/proker', 'ProfilController@proker')
->name('profil.proker');

Route::get('/profil/struktur-operasional', 'ProfilController@struktur_opera')
->name('profil.struktur_opera');


Route::get('/result', 'JadwalSholatController@result')->name('result');


Route::resource('upj', 'UpjController');

