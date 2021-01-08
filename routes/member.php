<?php

Route::get('/', 'Member\PelayananController@home')->name('pelayanan.home');

Route::resource('pelayanan', 'Member\PelayananController');


Route::resource('anggota', 'Member\AnggotaController');

Route::resource('profilmember', 'Member\ProfilMemberController');

Route::get('/transaksi/pay/{id}', 'Member\TransaksiController@pay')->name('transaksi.pay');
Route::get('/transaksi/cetak_pdf', 'Member\TransaksiController@cetak_pdf')->name('transaksi.cetak_pdf');

Route::resource('transaksi', 'Member\TransaksiController');



Route::resource('info-tagihan', 'Member\InfoPenagihanController');

Route::resource('langganan', 'Member\LanggananController');