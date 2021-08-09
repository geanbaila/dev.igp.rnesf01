<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/registered', function (){
    return view('registered');
} );

Auth::routes();

Route::get('/account/verify/{token}', 'Auth\RegisterController@verifyUser')->name('account.verify');

require_once ('app/public.php');

Route::group(['middleware'=>['auth']], function(){
    Route::get('/', 'HomeController@index')->name('home');

    require_once ('app/uploads.php');
    require_once ('app/sismicas.php');
    require_once ('app/acelerometricas.php');
    require_once ('app/referencia.php');
    require_once ('app/exports.php');

    require_once ('app/admin/users.php');

    require_once ('app/api.php');

    require_once ('app/lists.php');
    require_once ('app/admin/lists.php');

    Route::post('/stations/setfilters', 'Controller@setFilters')->name('stations.setfilters');

    // preview pdf
    Route::get('/preview', 'HomeController@preview')->name('preview.pdf');

});
