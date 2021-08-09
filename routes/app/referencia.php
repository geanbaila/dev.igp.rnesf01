<?php

Route::prefix('estaciones-de-referencia')->group(function () {
    Route::get('/', 'ReferenciasController@index')->name('estaciones.referencias.index');
    Route::get('/nuevo', 'ReferenciasController@create')->name('estaciones.referencias.create');
    Route::get('/editar/{id}', 'ReferenciasController@edit')->name('estaciones.referencias.edit');
    Route::post('/', 'ReferenciasController@store')->name('estaciones.referencias.store');
    Route::put('/{id}', 'ReferenciasController@update')->name('estaciones.referencias.update');
    Route::get('/eliminar/{id}', 'ReferenciasController@destroy')->name('estaciones.referencias.destroy');

    Route::post('/previous', 'ReferenciasController@previousAddition')->name('estaciones.referencias.previous');

    Route::get('/previous/remove/{id}', 'ReferenciasController@previousRemove')->name('estaciones.referencias.previous.remove');
});