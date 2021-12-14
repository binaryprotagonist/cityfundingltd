<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\LoginController;


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

Auth::routes();

/**
 * Ajax Route's
 */
Route::post('ajax/user/register', [AjaxController::class, 'userRegister'])->name('ajax.userRegister');
Route::post('ajax/user/login', [AjaxController::class, 'userLogin'])->name('ajax.userLogin');
Route::post('ajax/user/logout', [AjaxController::class, 'userLogout'])->name('ajax.userLogout');
Route::post('ajax/user/update/profile', [AjaxController::class, 'userUpdateProfile'])->name('ajax.userUpdateProfile');
Route::put('/change/password', [AjaxController::class, 'changePassword'])->name('ajax.changePassword');

/**
 * Google Auth Route's
 */
Route::get('/google/login', [LoginController::class, 'googleLogin'])->name('googleLogin');
Route::get('/google/callback', [LoginController::class, 'googleCallback'])->name('googleCallback');

/**
 *  Pages Route's
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/setting', [HomeController::class, 'setting'])->name('setting');

Route::get('/officers/{id}/appointments', [HomeController::class, 'officers'])->name('officers');
Route::get('/company/{id}', [HomeController::class, 'company'])->name('company');
Route::get('/porfolio/export', [HomeController::class, 'exportPorfolio'])->name('exportPorfolio');
Route::get('/company/export/{companyNumber}', [HomeController::class, 'exportCompany'])->name('exportCompany');
Route::get('/officer/export/{officerId}', [HomeController::class, 'exportOfficer'])->name('exportOfficer');

Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');

Route::get('/import/file', [HomeController::class, 'importFile'])->name('importFile');
Route::any('/import/file/store', [HomeController::class, 'importFileStore'])->name('importFileStore');


Route::get('/subscribe/plan', [HomeController::class, 'subscribePlan'])->name('subscribePlan');
Route::get('/gocardless/mandate/success', [HomeController::class, 'mandateSuccess'])->name('mandateSuccess');





