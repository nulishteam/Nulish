<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;

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

/*
Contoh Route:
Route::resource('coba', CobaController::class)->except(['update', 'show']);
*/

Route::get('landing.contact', [\App\Http\Controllers\ContactController::class, 'createForm'])->name('contact');
Route::post('landing.contact', [\App\Http\Controllers\ContactController::class, 'ContactForm'])->name('contact.store');
