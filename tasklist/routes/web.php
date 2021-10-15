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
Route::get('/', function () {
    return view('welcome');
});

/*Route::group(['middleware'=>['auth']],function(){

    Route::get('/','Companycontroller@choice');
    Route::resource('company','CompanyController');
    Route::put('belongCompany','CompanyComtroller@belong')->name('belong.company');
}*/