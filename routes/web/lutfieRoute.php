<?php

use App\Http\Controllers\PracticeController;
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

/*
Contoh Route:
Route::resource('coba', CobaController::class)->except(['update', 'show']);
*/
Route::prefix('user-area')->middleware('auth')->group(function () {
    Route::get('practice', [PracticeController::class, 'index'])->name('practice');
});
