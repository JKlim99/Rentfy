<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Property;
use App\Http\Controllers\Service;

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

Route::get('/', [Home::class, 'home']);
Route::get('/search', [Property::class, 'search']);
Route::get('/service', [Service::class, 'serviceSelect']);
Route::get('/service/provider', [Service::class, 'serviceProviderSelect']);
Route::get('/service/property', [Service::class, 'servicePropertySelect']);
Route::get('/service/type', [Service::class, 'serviceServiceSelect']);
Route::get('/service/form', [Service::class, 'serviceForm']);
Route::post('/service/submit', [Service::class, 'serviceSubmit']);