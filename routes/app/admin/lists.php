<?php

Route::prefix('administracion/listas')->group(function () {
    Route::get('/','ListAdminController@index')->name('admin.lists.index');
    Route::get('/{id}','ListAdminController@show')->name('admin.lists.show');
    Route::get('/export/{id}','ListAdminController@export')->name('admin.lists.export');
});