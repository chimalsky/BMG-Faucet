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

Route::get('/', function() {
    return view('funnel');
})->name('funnel');

Route::prefix('preview')->group(function() {
    Route::get('/', 'TaxonomyController@index')->name('home');
    Route::get('/taxonomy/{taxonomy_id}', 'TaxonomyController@show')->name('taxonomy.show');
    Route::get('/organization/{organization_id}', 'OrganizationController@show')->name('organization.show');

    Route::get('/datasync', 'AirtableSyncController@index');
});

