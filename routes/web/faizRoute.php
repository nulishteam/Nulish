<?php

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

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaizCobaController;

// Route coba hanya untuk percobaan.
Route::resource('faizCoba', FaizCobaController::class)->except(['update', 'show']);
