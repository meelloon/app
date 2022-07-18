<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\PartController;

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

Route::Resource('cars', CarController::class)->except(['show']);
Route::Resource('parts', PartController::class)->except(['show']);

Route::get('/cars/search/{str}', [CarController::class, 'search']);
Route::get('/parts/search/{str}', [PartController::class, 'search']);
