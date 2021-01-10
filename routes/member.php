<?php


    
    Route::get('/', 'Member\PelayananController@home')->name('pelayanan.home');

    Route::resource('pelayanan', 'Member\PelayananController');
    Route::get('pelayanan/{transaction_id}', 'Member\PelayananController@services')->name('riwayat.pelayanan');


    Route::resource('anggota', 'Member\AnggotaController');

    Route::resource('profilmember', 'Member\ProfilMemberController');

    Route::get('/transaksi/pay/{id}', 'Member\TransaksiController@pay')->name('transaksi.pay');
    Route::get('/transaksi/cetak_pdf', 'Member\TransaksiController@show')->name('transaksi.show');

    Route::resource('transaksi', 'Member\TransaksiController');

    Route::resource('info-tagihan', 'Member\InfoPenagihanController');

    Route::resource('langganan', 'Member\LanggananController');


