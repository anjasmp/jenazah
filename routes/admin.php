<?php


Route::group(['middleware' => ['role:admin']], function () {

Route::get('/', 'DashboardController@index')->name('dashboard.index');




Route::get('/announcement/show-deletes', 'AnnouncementController@show_deletes')->name('announcement.show-deletes');
Route::get('/announcement/restore/{id}', 'AnnouncementController@restore')->name('announcement.restore');
Route::delete('/announcement/kill/{id}', 'AnnouncementController@kill')->name('announcement.kill');

Route::resource('announcement', 'AnnouncementController');


Route::resource('carousel', 'CarouselController');


Route::get('/post/show-deletes', 'PostController@show_deletes')->name('post.show-deletes');
Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');

Route::resource('/post', 'PostController');



Route::resource('/category', 'CategoryController');


Route::resource('/tag', 'TagController');




Route::get('/transaction/cetak_pdf', 'Admin\TransactionController@cetak_pdf')->name('transaction.cetak_pdf');

Route::get('/transaction/show-deletes', 'Admin\TransactionController@show_deletes')->name('transaction.show-deletes');
Route::get('/transaction/restore/{id}', 'Admin\TransactionController@restore')->name('transaction.restore');
Route::delete('/transaction/kill/{id}', 'Admin\TransactionController@kill')->name('transaction.kill');



Route::resource('transaction', 'Admin\TransactionController');



Route::resource('/user', 'UserController');



Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');


Route::resource('roles', 'RoleController');


Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');


Route::get('/product/show-deletes', 'Admin\ProductController@show_deletes')->name('product.show-deletes');
Route::get('/product/restore/{id}', 'Admin\ProductController@restore')->name('product.restore');
Route::delete('/product/kill/{id}', 'Admin\ProductController@kill')->name('product.kill');

Route::resource('product', 'Admin\ProductController');


Route::get('/service/cetak_pdf', 'Admin\ServiceController@cetak_pdf')->name('service.cetak_pdf');

Route::get('/service/show-deletes', 'Admin\ServiceController@show_deletes')->name('service.show-deletes');
Route::get('/service/restore/{id}', 'Admin\ServiceController@restore')->name('service.restore');
Route::delete('/service/kill/{id}', 'Admin\ServiceController@kill')->name('service.kill');

Route::resource('service', 'Admin\ServiceController');



Route::get('/transaction-product/show-deletes', 'Admin\TransactionProductController@show_deletes')->name('transaction-product.show-deletes');
Route::get('/transaction-product/restore/{id}', 'Admin\TransactionProductController@restore')->name('transaction-product.restore');
Route::delete('/transaction-product/kill/{id}', 'Admin\TransactionProductController@kill')->name('transaction-product.kill');

Route::resource('transaction-product', 'Admin\TransactionProductController');



Route::get('/daftar-anggota/cetak_pdf', 'Admin\MemberController@cetak_pdf')->name('daftar-anggota.cetak_pdf');
Route::get('/daftar-anggota/show-deletes', 'Admin\MemberController@show_deletes')->name('daftar-anggota.show-deletes');
Route::get('/daftar-anggota/restore/{id}', 'Admin\MemberController@restore')->name('daftar-anggota.restore');
Route::delete('/daftar-anggota/kill/{id}', 'Admin\MemberController@kill')->name('daftar-anggota.kill');

Route::resource('daftar-anggota', 'Admin\MemberController');


});




