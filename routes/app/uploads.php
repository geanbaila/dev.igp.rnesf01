<?php

Route::prefix('uploads')->group(function () {
    Route::get('/{slug}', 'UploadsController@show')->name('uploads.show');
    Route::delete('/{id}', 'UploadsController@destroy')->name('uploads.destroy');

});