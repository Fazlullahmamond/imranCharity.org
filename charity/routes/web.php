<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DonateBoxController;
use App\Http\Controllers\DonateController;
use App\Http\Controllers\DonationSubTypeController;
use App\Http\Controllers\DonationTypeController;
use App\Http\Controllers\DonatorController;
use App\Http\Controllers\FamilyMemberController;
use App\Http\Controllers\NeedyPeopleController;
use App\Http\Controllers\PersonTypeController;
use App\Http\Controllers\RelationshipController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonthlySponsorsController;
use App\Http\Controllers\CauseController;
use App\Http\Controllers\checkAuthController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SponsorController;
use Illuminate\Support\Facades\Hash;
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


// Route::get('/extra', function () {
//     return view('admin.extra.addExtra');
// });


//---------------------------CHECK LOGIN CONTROLLERS---------------------------//
// Route::resource('/checkAuth', checkAuthController::class);
Route::get('/checkAuth', checkAuthController::class)->name('checkAuth');

//---------------------------ADMIN LOGIN CONTROLLERS---------------------------//
Route::resource('/admin', AdminController::class);
Route::resource('/donator', DonatorController::class);
Route::resource('/user', UserController::class);
Route::resource('/needy', NeedyPeopleController::class);
Route::resource('/blog', BlogController::class);
Route::resource('/donationType', DonationTypeController::class);
// Route::resource('/donationSubType', DonationSubTypeController::class);     controller/column deleted from database
Route::resource('/donateBox', DonateBoxController::class);
Route::resource('/donate', DonateController::class);
Route::resource('/personType', PersonTypeController::class);
Route::resource('/relationship', RelationshipController::class);
Route::resource('/family', FamilyMemberController::class);
Route::resource('/monthly_sponsors', MonthlySponsorsController::class);
Route::resource('/contract', ContractController::class);
Route::resource('/causes', CauseController::class);


//---------------------------DONATOR LOGIN CONTROLLERS---------------------------//
Route::resource('/sponsor', SponsorController::class);
Route::post('/sponsor/update_password', [SponsorController::class, 'update_password'])->name('change.password');

//------------------------------WEBSITE CONTROLLERS------------------------------//
Route::get('/', [AdminController::class, 'index']);