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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//RESTAPIs
Route::post('register', [App\Http\Controllers\RESTAPIs\AuthRestApiController::class, 'register'])->name('api.register');
Route::post('login', [App\Http\Controllers\RESTAPIs\AuthRestApiController::class, 'login'])->name('api.login');
Route::post('logout', [App\Http\Controllers\RESTAPIs\AuthRestApiController::class, 'logout'])->name('api.logout');
