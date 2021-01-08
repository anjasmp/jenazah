<?php

//MIDDLEWARE DASHBOARD
Route::group(['middleware' => ['role_or_permission:admin|DASHBOARD (WAJIB)']], function () {

    Route::get('/', 'DashboardController@index')->name('dashboard.index');

});


//MIDDLEWARE ANNOUNCEMENT
Route::group(['middleware' => ['role_or_permission:admin|index announcement']], function () {

    Route::resource('announcement', 'AnnouncementController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create announcement']], function () {

    Route::resource('announcement', 'AnnouncementController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit announcement']], function () {

    Route::resource('announcement', 'AnnouncementController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete announcement']], function () {

    Route::resource('announcement', 'AnnouncementController')->only([
        'destroy'
    ]);

    Route::get('/announcement/show-deletes', 'AnnouncementController@show_deletes')->name('announcement.show-deletes');
    Route::get('/announcement/restore/{id}', 'AnnouncementController@restore')->name('announcement.restore');
    Route::delete('/announcement/kill/{id}', 'AnnouncementController@kill')->name('announcement.kill');

});


//MIDDLEWARE CAROUSEL
Route::group(['middleware' => ['role_or_permission:admin|index carousel']], function () {

    Route::resource('carousel', 'CarouselController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create carousel']], function () {

    Route::resource('carousel', 'CarouselController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit carousel']], function () {

    Route::resource('carousel', 'CarouselController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete carousel']], function () {

    Route::resource('carousel', 'CarouselController')->only([
        'destroy'
    ]);

});


//MIDDLEWARE POST
Route::group(['middleware' => ['role_or_permission:admin|index post']], function () {

    Route::resource('/post', 'PostController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create post']], function () {

    Route::resource('/post', 'PostController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit post']], function () {

    Route::resource('/post', 'PostController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete post']], function () {

    Route::resource('/post', 'PostController')->only([
        'destroy'
    ]);

    Route::get('/post/show-deletes', 'PostController@show_deletes')->name('post.show-deletes');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');

});


//MIDDLEWARE CATEGORY
Route::group(['middleware' => ['role_or_permission:admin|index category']], function () {

    Route::resource('/category', 'CategoryController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create category']], function () {

    Route::resource('/category', 'CategoryController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit category']], function () {

    Route::resource('/category', 'CategoryController')->only([
        'edit'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete category']], function () {

    Route::resource('/category', 'CategoryController')->only([
        'destroy', 'update'
    ]);

});


//MIDDLEWARE TAG
Route::group(['middleware' => ['role_or_permission:admin|index tag']], function () {

    Route::resource('/tag', 'TagController')->only([
        'index', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create tag']], function () {

    Route::resource('/tag', 'TagController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit tag']], function () {

    Route::resource('/tag', 'TagController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete tag']], function () {

    Route::resource('/tag', 'TagController')->only([
        'destroy'
    ]);

});


//MIDDLEWARE DONATION PACKAGE
Route::group(['middleware' => ['role_or_permission:admin|index donation package']], function () {

    Route::resource('donation-package', 'Admin\DonationPackageController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create donation package']], function () {

    Route::resource('donation-package', 'Admin\DonationPackageController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit donation package']], function () {

    Route::resource('donation-package', 'Admin\DonationPackageController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete donation package']], function () {

    Route::resource('donation-package', 'Admin\DonationPackageController')->only([
        'destroy'
    ]);

    Route::get('/donation-package/show-deletes', 'Admin\DonationPackageController@show_deletes')->name('donation-package.show-deletes');
    Route::get('/donation-package/restore/{id}', 'Admin\DonationPackageController@restore')->name('donation-package.restore');
    Route::delete('/donation-package/kill/{id}', 'Admin\DonationPackageController@kill')->name('donation-package.kill');

});


//MIDDLEWARE GALLERY DONATION PACKAGE
Route::group(['middleware' => ['role_or_permission:admin|index gallery donation']], function () {

    Route::resource('gallery', 'Admin\GalleryController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create gallery donation']], function () {

    Route::resource('gallery', 'Admin\GalleryController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit gallery donation']], function () {

    Route::resource('gallery', 'Admin\GalleryController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete gallery donation']], function () {

    Route::resource('gallery', 'Admin\GalleryController')->only([
        'destroy'
    ]);

});

Route::get('/transaction/cetak_pdf', 'Admin\TransactionController@cetak_pdf')->name('transaction.cetak_pdf');
//MIDDLEWARE TRANSACTION
Route::group(['middleware' => ['role_or_permission:admin|recycle bin transaction']], function () {

    Route::get('/transaction/show-deletes', 'Admin\TransactionController@show_deletes')->name('transaction.show-deletes');
    Route::get('/transaction/restore/{id}', 'Admin\TransactionController@restore')->name('transaction.restore');
    Route::delete('/transaction/kill/{id}', 'Admin\TransactionController@kill')->name('transaction.kill');
    

});



Route::group(['middleware' => ['role_or_permission:admin|index transaction']], function () {

    Route::resource('transaction', 'Admin\TransactionController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|show transaction']], function () {

    Route::resource('transaction', 'Admin\TransactionController')->only([
        'show'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit transaction']], function () {

    Route::resource('transaction', 'Admin\TransactionController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete transaction']], function () {

    Route::resource('transaction', 'Admin\TransactionController')->only([
        'destroy'
    ]);

});



//MIDDLEWARE LAZHAQ RECEIPT
Route::group(['middleware' => ['role_or_permission:admin|index lazhaq receipt']], function () {

    Route::resource('penerimaan-lazhaq', 'PenerimaanLazhaqController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create lazhaq receipt']], function () {

    Route::resource('penerimaan-lazhaq', 'PenerimaanLazhaqController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit lazhaq receipt']], function () {

    Route::resource('penerimaan-lazhaq', 'PenerimaanLazhaqController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete lazhaq receipt']], function () {

    Route::resource('penerimaan-lazhaq', 'PenerimaanLazhaqController')->only([
        'destroy'
    ]);

});



//MIDDLEWARE LAZHAQ DISTRIBUTION
Route::group(['middleware' => ['role_or_permission:admin|index lazhaq distribution']], function () {

    Route::resource('penyaluran-lazhaq', 'PenyaluranLazhaqController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create lazhaq distribution']], function () {

    Route::resource('penyaluran-lazhaq', 'PenyaluranLazhaqController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit lazhaq distribution']], function () {

    Route::resource('penyaluran-lazhaq', 'PenyaluranLazhaqController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete lazhaq distribution']], function () {

    Route::resource('penyaluran-lazhaq', 'PenyaluranLazhaqController')->only([
        'destroy'
    ]);

});


//MIDDLEWARE QURBAN RECEIPT
Route::group(['middleware' => ['role_or_permission:admin|index qurban receipt']], function () {

    Route::resource('penerimaan-qurban', 'PenerimaanQurbanController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create qurban receipt']], function () {

    Route::resource('penerimaan-qurban', 'PenerimaanQurbanController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit qurban receipt']], function () {

    Route::resource('penerimaan-qurban', 'PenerimaanQurbanController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete qurban receipt']], function () {

    Route::resource('penerimaan-qurban', 'PenerimaanQurbanController')->only([
        'destroy'
    ]);

});


//MIDDLEWARE QURBAN DISTRIBUTION
Route::group(['middleware' => ['role_or_permission:admin|index qurban distribution']], function () {

    Route::resource('penyaluran-qurban', 'PenyaluranQurbanController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create qurban distribution']], function () {

    Route::resource('penyaluran-qurban', 'PenyaluranQurbanController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit qurban distribution']], function () {

    Route::resource('penyaluran-qurban', 'PenyaluranQurbanController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete qurban distribution']], function () {

    Route::resource('penyaluran-qurban', 'PenyaluranQurbanController')->only([
        'destroy'
    ]);

});


//MIDDLEWARE QURBAN DISTRIBUTION GALLERY
Route::group(['middleware' => ['role_or_permission:admin|index qurban distribution gallery']], function () {

    Route::resource('gallery-qurban', 'GalleryQurbanController')->only([
        'index'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|create qurban distribution gallery']], function () {

    Route::resource('gallery-qurban', 'GalleryQurbanController')->only([
        'create', 'store'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|edit qurban distribution gallery']], function () {

    Route::resource('gallery-qurban', 'GalleryQurbanController')->only([
        'edit', 'update'
    ]);

});

Route::group(['middleware' => ['role_or_permission:admin|delete qurban distribution gallery']], function () {

    Route::resource('gallery-qurban', 'GalleryQurbanController')->only([
        'destroy'
    ]);

});


Route::resource('/user', 'UserController');
//MIDDLEWARE USER
// Route::group(['middleware' => ['role_or_permission:admin|index users']], function () {

//     Route::resource('/user', 'UserController')->only([
//         'index'
//     ]);

// });

// Route::group(['middleware' => ['role_or_permission:admin|create users']], function () {

//     Route::resource('/user', 'UserController')->only([
//         'create', 'store'
//     ]);

// });

// Route::group(['middleware' => ['role_or_permission:admin|edit users']], function () {

//     Route::resource('/user', 'UserController')->only([
//         'edit', 'update'
//     ]);

// });

// Route::group(['middleware' => ['role_or_permission:admin|delete users']], function () {

//     Route::resource('/user', 'UserController')->only([
//         'destroy'
//     ]);

// });


Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
    Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
    Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');
// //MIDDLEWARE CHECK PERMISSIONS
// Route::group(['middleware' => ['role:admin']], function () {

//     Route::post('/users/permission', 'UserController@addPermission')->name('users.add_permission');
//     Route::get('/users/role-permission', 'UserController@rolePermission')->name('users.roles_permission');
//     Route::put('/users/permission/{role}', 'UserController@setRolePermission')->name('users.setRolePermission');

// });

Route::resource('roles', 'RoleController');

    Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
    Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');
//MIDDLEWARE EDIT ROLE
// Route::group(['middleware' => ['role_or_permission:admin|edit role']], function () {

//     Route::resource('roles', 'RoleController');

//     Route::get('/users/roles/{id}', 'UserController@roles')->name('users.roles');
//     Route::put('/users/roles/{id}', 'UserController@setRole')->name('users.set_role');

// });


//MIDDLEWARE JADWAL SHOLAT
Route::group(['middleware' => ['role_or_permission:admin|setting prayer schedule']], function () {

    Route::get('/jadwal-sholat', 'JadwalSholatController@index')->name('jadwal-sholat.index');
});



// Product
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


