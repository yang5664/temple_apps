<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/temple', function (Request $request) {
        return $request->user()->select(['id', 'username', 'name'])->find($request->user()->id);
    });

    Route::get('/menus', function (Request $request) {
        $main_menus = $request->user()->roles()->first()->menus()->select('id', 'title', 'icon', 'uri')->orderBy('order')->get();
        $personal_menus = $request->user()->menus()->select(['id', 'title', 'icon', 'uri'])->orderBy('order')->get();
        $result = array_merge(json_decode($main_menus), ['folder' => json_decode($personal_menus)]);
        return json_encode($result);
    });

});