<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\BaseController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cleared";
});

Route::group(
    ['prefix' => "/"],
    function () {

        Route::get('/', [HomeController::class, 'index'])->name('index');

        Route::group(
            ['prefix' => 'user', 'as' => 'user.', 'middleware' => ['web', 'auth', 'checkMail']],
            function () {
                Route::get('/', [BaseController::class, 'home'])->name('home');
                Route::get('dashboard', [BaseController::class, 'index'])->name('index');
                Route::resource('profiles', ProfileController::class);
            }
        );
    }
);

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
