<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\Property;
use App\Http\Controllers\Service;
use App\Http\Controllers\Profile;

use App\Http\Middleware\TenantGuest;
use App\Http\Middleware\TenantLogin;

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
Route::get('/property/{id}', [Property::class, 'details']);
Route::get('/service', [Service::class, 'serviceSelect']);
Route::get('/profile/{id}', [Profile::class, 'profilePage']);

Route::middleware([TenantGuest::class])->group(function () {
    Route::get('/login', [Login::class, 'loginPage']);
    Route::post('/login', [Login::class, 'login']);
    Route::get('/register', [Register::class, 'registerPage']);
    Route::post('/register', [Register::class, 'register']);
});

Route::middleware([TenantLogin::class])->group(function () {
    Route::get('/logout', [Login::class, 'logout']);
    Route::get('/editprofile', [Profile::class, 'editProfilePage']);
    Route::post('/editprofile', [Profile::class, 'updateProfile']);
    Route::get('/service/provider', [Service::class, 'serviceProviderSelect']);
    Route::get('/service/property', [Service::class, 'servicePropertySelect']);
    Route::get('/service/type', [Service::class, 'serviceServiceSelect']);
    Route::get('/service/form', [Service::class, 'serviceForm']);
    Route::post('/service/submit', [Service::class, 'serviceSubmit']);
});