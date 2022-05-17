<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;

use App\Http\Controllers\UserController;


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


Route::get('register', [RegistrationController::class, 'create'])->name('register');
Route::post('register', [RegistrationController::class, 'store'])->name('store');


Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login_store');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('password/reset', [ForgotPasswordController::class, 'showForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('users', [UserController::class, 'users'])->name('users.list');
Route::get('user/{id}/status', [UserController::class, 'showChangeStatusForm'])->name('user.change-status');
Route::post('user/update-status', [UserController::class, 'updateStatus'])->name('user.update-status');

Route::get('update-email', [UserController::class, 'showChangeEmailForm'])->name('user.change-email');
Route::post('update-email', [UserController::class, 'updateEmail'])->name('user.update-email');