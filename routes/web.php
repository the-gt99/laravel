<?php

use App\Http\Controllers\CurrenciesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
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
    return view('home');
});

//todo
//перенести это в api

Route::get('/productList', [ProductsController::class, 'getAll']);
Route::get('/currenciesList', [CurrenciesController::class, 'getAll']);
Route::get('/currency/{name}', [CurrenciesController::class, 'getInfoByName']);
