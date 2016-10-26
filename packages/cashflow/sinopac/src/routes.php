<?php
/**
 * Created by PhpStorm.
 * User: xuanyang
 * Date: 25/10/2016
 * Time: 12:56 PM
 */

Route::get('timezones/{timezone?}', 'SinoPacController@index');


Route::post('/paynotify', 'SinoPacController@payNotify');
Route::post('/authsuccess', 'SinoPacController@authSuccess');
Route::post('/authfail', 'SinoPacController@authFail');

Route::post('/test/paynotify', 'SinoPacController@payNotify');
Route::post('/test/authsuccess', 'SinoPacController@authSuccess');
Route::post('/test/authfail', 'SinoPacController@authFail');

Route::get('/report', 'SinoPacController@report');