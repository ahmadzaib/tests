<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::get('/role',
//     [App\Http\Controllers\Admin\DashboardController::class, 'registered']);

Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::post('store', 'App\Http\Controllers\HomeController@store');
Route::get('update/{id}', 'App\Http\Controllers\HomeController@update');
Route::post('delete/{id}', 'App\Http\Controllers\HomeControllerr@deleted');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
