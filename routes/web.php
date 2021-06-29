<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PreBookingClientController;
use App\Http\Controllers\PreBookingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Example Routes
Route::view('/', 'landing')->middleware("auth");
Route::get('/admin/register', [AuthController::class, 'register'])->name("register")->middleware("guest");
Route::post('/admin/register', [AuthController::class, 'handleRegister']);
Route::get('/admin/login', [AuthController::class, 'login'])->name("login")->middleware("guest");
Route::post('/admin/login', [AuthController::class, 'handleLogin']);
Route::get("/signout", function () {
    Auth::logout();
    return redirect("/admin/login");
});
Route::get('/create', [PreBookingController::class, 'create'])->middleware("auth");
Route::post('/create', [PreBookingController::class, 'store'])->middleware("auth");
Route::get('/bookings', [PreBookingController::class, 'index'])->middleware("auth");
Route::get('/upcomingedit/{booking}', [PreBookingController::class, 'upcomeEdit'])->middleware("auth")->name("upcome");
Route::post('/upcomingedit/{booking}', [PreBookingController::class, 'upcomeUpdate'])->middleware("auth");
Route::get('/liveedit/{booking}', [PreBookingController::class, 'liveEdit'])->middleware("auth")->name("live");
Route::post('/liveedit/{booking}', [PreBookingController::class, 'liveUpdate'])->middleware("auth");
Route::get('/prevedit/{booking}', [PreBookingController::class, 'prevEdit'])->middleware("auth")->name("prev");
Route::get('/delete/{booking}', [PreBookingController::class, 'destroy'])->middleware("auth")->name("delete");
Route::match(['get', 'post'], '/dashboard', function () {
    return view('dashboard');
});
Route::get('/bookings/{booking}', [PreBookingController::class, 'showBooking'])->middleware("auth")->name("booking");

Route::get('/prebooking', [PreBookingClientController::class, 'index'])->middleware("guest");
Route::get('/prebooking/{booking}', [PreBookingClientController::class, 'show'])->middleware("guest")->name("prebooking");
Route::post('/prebooking/{booking}', [PreBookingClientController::class, 'create'])->middleware("guest");
Route::get('/request', [PreBookingClientController::class, 'request'])->middleware("guest");
Route::get('/prebooking/{booking}/verify', [PreBookingClientController::class, 'verify'])->middleware("guest")->name("verify");
Route::post('/prebooking/{booking}/verify', [PreBookingClientController::class, 'verified'])->middleware("guest");
Route::get('/prebooking/{booking}/confirm', [PreBookingClientController::class, 'confirm'])->middleware("guest")->name("confirm");

// Route::get('/prebooking/verify', [PreBookingClientController::class, 'verify'])->name("nexmo")->middleware("guest");
// Route::post('/prebooking/verify', [PreBookingClientController::class, 'verified'])->middleware("guest");

Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
