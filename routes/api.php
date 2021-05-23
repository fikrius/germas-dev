<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

Route::get('/test', function(){
    // return ['status' => 'hello'];
    $pemilih = DB::table('pemilihs')->limit(4)->get();
    return $pemilih;
});

Route::get('/v1/pemilih', 'ApiPemilih@getAll');
Route::get('/v1/pemilih/{id}', 'ApiPemilih@getSingle');
Route::post('/v1/pemilih' ,'ApiPemilih@create');
Route::put('/v1/pemilih/{id}', 'ApiPemilih@update');
Route::delete('/v1/pemilih/{id}', 'ApiPemilih@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
