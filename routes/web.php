<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


// Маршруты аутентификации
Route::middleware('guest')->group(function () {
    Route::get('/register', action: [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', action: [RegisterController::class, 'register']);
    Route::get('/login', action: [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', action: [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Маршруты для авторизованных пользователей
Route::middleware('auth')->group(function () {
    Route::get('/', action: [LoginController::class, 'login']);
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
});

// Маршруты для администратора
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/bookings', [AdminController::class, 'index'])->name('admin.bookings');
    Route::patch('/bookings/{booking}/status', [AdminController::class, 'updateStatus'])
        ->name('admin.bookings.status');
});
