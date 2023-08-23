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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HomeItemController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {return  view('landing.index');})->name('index');
// Route::get('/index', function () {return  redirect()->route('index');});
// Route::get('/home', function () {return  redirect()->route('index');})->name('home');
// Route::get('/author', function () {return view('landing.author');})->name('author');
// Route::get('/about', function () {return view('landing.about');})->name('about');
// Route::get('/contact', function () {return view('landing.contact');})->name('contact');

Route::prefix('')->group(function () {
    Route::get('', function () {
        return view('landing.index');
    })->name('index');

    Route::get('index', function () {
        return  redirect()->route('index');
    });

    Route::get('home', function () {
        return  redirect()->route('index');
    })->name('home');

    Route::get('author', function () {
        return view('landing.author');
    })->name('author');

    Route::get('contact', function () {
        return view('landing.contact');
    })->name('contact');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('question-master', QuestionController::class)->except(['update', 'show']);
    Route::resource('level-master', LevelController::class)->except(['update', 'show']);
    Route::resource('type-master', TypeController::class)->except(['update', 'show']);
    Route::resource('user-master', UserController::class);
    Route::resource('feedback-master', FeedbackController::class)->only(['index', 'create', 'show']);
    Route::resource('home-item-master', HomeItemController::class);
});

Route::prefix('user-area')->middleware('auth')->group(function () {
    Route::get('', [DashboardController::class, 'index'])->name('user-area');
    Route::post('sign-out', [SessionsController::class, 'destroy'])->name('logout');
    Route::get('profile', [ProfileController::class, 'create'])->name('profile');
    Route::post('user-profile', [ProfileController::class, 'update']);
    Route::get('billing', function () {
        return view('user-area.billing');
    })->name('billing');
    Route::get('tables', function () {
        return view('user-area.tables');
    })->name('tables');
    Route::get('rtl', function () {
        return view('user-area.rtl');
    })->name('rtl');
    Route::get('virtual-reality', function () {
        return view('user-area.virtual-reality');
    })->name('virtual-reality');
    Route::get('notifications', function () {
        return view('user-area.notifications');
    })->name('notifications');
    Route::get('static-sign-in', function () {
        return view('user-area.static-sign-in');
    })->name('static-sign-in');
    Route::get('static-sign-up', function () {
        return view('user-area.static-sign-up');
    })->name('static-sign-up');
    Route::get('user-management', function () {
        return view('user-area.laravel-examples.user-management');
    })->name('user-management');
    Route::get('user-profile', function () {
        return view('user-area.laravel-examples.user-profile');
    })->name('user-profile');
});

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


Route::group(['middleware' => 'auth'], function () {
});
