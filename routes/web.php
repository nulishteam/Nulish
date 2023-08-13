<?php

use App\Http\Controllers\DashboardController;

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

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return  view('landing.index');})->name('index');
Route::get('/index', function () {return  redirect()->route('index');});
Route::get('/home', function () {return  redirect()->route('index');})->name('home');
Route::get('/author', function () {return view('landing.author');})->name('author');
Route::get('/about', function () {return view('landing.about');})->name('about');
Route::get('/contact', function () {return view('landing.contact');})->name('contact');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
    return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
    return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
    Route::get('billing', function () {
        return view('dashboard.billing');
    })->name('billing');
    Route::get('tables', function () {
        return view('dashboard.tables');
    })->name('tables');
    Route::get('rtl', function () {
        return view('dashboard.rtl');
    })->name('rtl');
    Route::get('virtual-reality', function () {
        return view('dashboard.virtual-reality');
    })->name('virtual-reality');
    Route::get('notifications', function () {
        return view('dashboard.notifications');
    })->name('notifications');
    Route::get('static-sign-in', function () {
        return view('dashboard.static-sign-in');
    })->name('static-sign-in');
    Route::get('static-sign-up', function () {
        return view('dashboard.static-sign-up');
    })->name('static-sign-up');
    Route::get('user-management', function () {
        return view('dashboard.laravel-examples.user-management');
    })->name('user-management');
    Route::get('user-profile', function () {
        return view('dashboard.laravel-examples.user-profile');
    })->name('user-profile');
});
