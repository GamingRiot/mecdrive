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
Route::get('/prebooking', [PreBookingClientController::class, 'index'])->middleware("auth");

Route::view('/pages/slick', 'pages.slick');
Route::view('/pages/datatables', 'pages.datatables');
Route::view('/pages/blank', 'pages.blank');
