<?php

Route::prefix('estaciones-acelerometricas')->group(function () {
    Route::get('/', 'AcelerometricasController@index')->name('estaciones.acelerometricas.index');

    // Route::post('/filters', 'AcelerometricasController@setFilters')->name('estaciones.acelerometricas.setfilters');

    Route::get('/nuevo', 'AcelerometricasController@create')->name('estaciones.acelerometricas.create');
    Route::get('/editar/{id}', 'AcelerometricasController@edit')->name('estaciones.acelerometricas.edit');
    Route::post('/', 'AcelerometricasController@store')->name('estaciones.acelerometricas.store');
    Route::put('/{id}', 'AcelerometricasController@update')->name('estaciones.acelerometricas.update');
    // Route::get('/preview/{id}', 'AcelerometricasController@preview_pdf')->name('estaciones.acelerometricas.preview.pdf');

    Route::get('/eliminar/{id}', 'AcelerometricasController@destroy')->name('estaciones.acelerometricas.destroy');

    Route::post('/previous', 'AcelerometricasController@previousAddition')->name('estaciones.acelerometricas.previous');

    Route::get('/previous/remove/{id}', 'AcelerometricasController@previousRemove')->name('estaciones.acelerometricas.previous.remove');

});
