<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/cart', CartController::class);

Route::get('/catalog', CatalogController::class);

Route::get('/catalog/{alias}', [CatalogController::class, 'category']);

Route::get('/locale/{lng}', function (Request $request, string $lng) {
    App::setLocale($lng);
    return redirect()->back();
});

Route::get('/{page?}', [PageController::class, 'page']);


Route::post('/contacts/send', [MessageController::class, 'sendMsg']);
