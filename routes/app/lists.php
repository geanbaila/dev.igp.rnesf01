<?php

Route::prefix('listas')->group(function () {
    Route::get('/enviados','ListsController@index')->name('lists.index');
    Route::get('/enviados/{id}/download', 'ListsController@download')->name('lists.sent.download');
});