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
Route::get('/officers/{id}/appointments', [HomeController::class, 'officers'])->name('officers');
Route::get('/company/{id}', [HomeController::class, 'company'])->name('company');



