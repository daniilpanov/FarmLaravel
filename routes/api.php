<?php

use App\Http\Controllers\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/locale/set', function (Request $request) {
    App::setLocale($request->input('lng'));
});*/

Route::post('/cart/add', [CartController::class, 'add']);
Route::patch('/cart/edit', [CartController::class, 'editQuantity']);
Route::delete('/cart/del', [CartController::class, 'deleteItem']);
