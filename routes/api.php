<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\NearEarthController;
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

Route::get('/', [DefaultController::class, 'index']);
Route::get('/neo/hazardous', [NearEarthController::class, 'getHazardous']);
Route::get('/neo/fastest', [NearEarthController::class, 'getFastestHazardous']);
