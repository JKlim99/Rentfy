<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Login;
use App\Http\Controllers\Register;
use App\Http\Controllers\Property;
use App\Http\Controllers\Service;
use App\Http\Controllers\Profile;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Rental;
use App\Http\Controllers\Invoice;
use App\Http\Controllers\RentedProperty;
use App\Http\Controllers\RepairService;
use App\Http\Controllers\Properties;

use App\Http\Middleware\TenantGuest;
use App\Http\Middleware\TenantLogin;
use App\Http\Middleware\LandlordLogin;

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
    Route::get('/rent/{id}', [Property::class, 'rentPage']);
    Route::post('/rent', [Property::class, 'rent']);
    Route::get('/bills', [Invoice::class, 'billingList']);
    Route::get('/pay/{id}', [Invoice::class, 'payBill']);
    Route::get('/success', [Invoice::class, 'success']);
    Route::get('/cancel', [Invoice::class, 'cancel']);
    Route::get('/rented', [RentedProperty::class, 'rentedList']);
    Route::get('/cancel/rent/{id}', [RentedProperty::class, 'cancelRentRequest']);
    Route::get('/terminate/rent/{id}', [RentedProperty::class, 'terminateRent']);
});

Route::middleware([LandlordLogin::class])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'dashboard']);
    Route::get('/rental', [Rental::class, 'rentalList']);
    Route::get('/rental/{id}', [Rental::class, 'rentalDetails']);
    Route::post('/acceptrental/{id}', [Rental::class, 'acceptRental']);
    Route::get('/rejectrental/{id}', [Rental::class, 'rejectRental']);
    Route::get('/terminaterental/{id}', [Rental::class, 'terminateRental']);
    Route::get('/manage/service', [RepairService::class, 'serviceList']);
    Route::get('/service/{id}', [RepairService::class, 'serviceDetails']);
    Route::post('/service/{id}', [RepairService::class, 'serviceUpdate']);
    Route::get('/create/service', [RepairService::class, 'serviceCreateForm']);
    Route::post('/create/service', [RepairService::class, 'serviceCreate']);
    Route::get('/delete/service/{id}', [RepairService::class, 'serviceDelete']);
    Route::get('/manage/property', [Properties::class, 'propertyList']);
    Route::get('/properties/{id}', [Properties::class, 'propertyDetails']);
    Route::post('/properties/{id}', [Properties::class, 'propertyUpdate']);
    Route::get('/create/price/{id}', [Properties::class, 'createPrice']);
    Route::get('/delete/price/{id}', [Properties::class, 'deletePrice']);
    Route::get('/create/properties', [Properties::class, 'propertyCreateForm']);
    Route::post('/create/properties', [Properties::class, 'propertyCreate']);
});