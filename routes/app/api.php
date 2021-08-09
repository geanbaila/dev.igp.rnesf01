<?php
Route::prefix('api/v1')->group(function () {
    Route::get('/lists/{id}/signatureargs', 'ListsController@signatureArgs')->name('api.v1.lists.askfor.signatureargs');
    Route::put('/lists/{id}', 'ListsController@signatureUpdate')->name('api.v1.lists.askfor.signatureupdate');

    Route::get('/stations/{id}', 'ListsController@showStation')->name('api.v1.stations.show');

});


