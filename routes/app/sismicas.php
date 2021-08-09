<?php

Route::prefix('estaciones-sismicas')->group(function () {
    Route::get('/', 'SismicasController@index')->name('estaciones.sismicas.index');

    // Route::post('/filters', 'SismicasController@setFilters')->name('estaciones.sismicas.setfilters');

    Route::get('/nuevo', 'SismicasController@create')->name('estaciones.sismicas.create');
    Route::get('/editar/{id}', 'SismicasController@edit')->name('estaciones.sismicas.edit');
    Route::post('/', 'SismicasController@store')->name('estaciones.sismicas.store');
    Route::put('/{id}', 'SismicasController@update')->name('estaciones.sismicas.update');
    // Route::get('/preview/{id}', 'SismicasController@preview_pdf')->name('estaciones.sismicas.preview.pdf');

    Route::get('/eliminar/{id}', 'SismicasController@destroy')->name('estaciones.sismicas.destroy');

    Route::post('/previous', 'SismicasController@previousAddition')->name('estaciones.sismicas.previous');

    Route::get('/previous/remove/{id}', 'SismicasController@previousRemove')->name('estaciones.sismicas.previous.remove');

});