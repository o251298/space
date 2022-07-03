<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NearEarthController;
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
    return view('welcome');
});
Route::get('get-hazardous-for-nasa', [NearEarthController::class, 'getHazardousForNasa'])->name('get_hazardous_for_nasa');
