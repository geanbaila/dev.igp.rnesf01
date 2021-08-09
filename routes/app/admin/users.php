<?php

Route::prefix('usuarios')->group(function () {
    Route::get('/', 'UsersController@index')->name('users.index');

    // Route::post('/filters', 'UsersController@setFilters')->name('.users.setfilters');

    Route::get('/nuevo', 'UsersController@create')->name('users.create');
    Route::get('/editar/{id}', 'UsersController@edit')->name('users.edit');
    Route::post('/', 'UsersController@store')->name('users.store');
    Route::put('/{id}', 'UsersController@update')->name('users.update');
    // Route::get('/preview/{id}', 'UsersController@preview_pdf')->name('users.preview.pdf');
    Route::get('/eliminar/{id}', 'UsersController@destroy')->name('users.destroy');

});
