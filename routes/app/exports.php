<?php

Route::get('/descargar/formulario-rsn-f01', 'ExportsController@downloadFormat1')->name('download.formato1');

Route::get('/cargar/formatos', 'ExportsController@uploadedFiles')->name('upload.signed.format');

Route::post('/cargar/formatos', 'ExportsController@storeUploadedFiles')->name('store.signed.format');

Route::get('/descargar/firmados/{slug}', 'ExportsController@downloadSignedFiles')->name('download.signed.files');

Route::get('/pendiente','ExportsController@drafList')->name('draf.list');

Route::get('/pending-sign', 'ExportsController@downloadFormat1FromSession')->name('drafts.pdf');