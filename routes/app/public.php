<?php
Route::prefix('/public-site')->group(function () {
    Route::get('/requerimientos/download-signed-requirement/{id}','ListsController@downloadSignable')
        ->name('public.resource.download.signable');
    Route::post('/upload-signed-document','ListsController@storeSignedDocument')
        ->name('public.resource.upload.signed');
});

Route::get('/publicapi/api/v1/rucs/{ruc}', 'HomeController@queryRucs');