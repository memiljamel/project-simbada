<?php

use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ResponsiblePersonController;
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

Route::middleware('guest')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::controller(LoginController::class)->group(function () {
            Route::get('login', 'index')
                ->name('login.index');
            Route::post('login/authenticate', 'authenticate')
                ->name('login.authenticate');
        });

        Route::controller(ForgotController::class)->group(function () {
            Route::get('forgot-password', 'index')
                ->name('forgot.index');
            Route::post('forgot-password/send', 'send')
                ->name('forgot.send');
        });

        Route::controller(ResetController::class)->group(function () {
            Route::get('reset-password', 'index')
                ->name('reset.index');
            Route::post('reset-password/recovery', 'recovery')
                ->name('reset.recovery');
        });
    });
});

Route::middleware(['auth', 'verified', 'auth.session'])->group(function () {
    Route::resources([
        'categories' => CategoryController::class,
        'brands' => BrandController::class,
        'distributors' => DistributorController::class,
        'locations' => LocationController::class,
    ]);

    Route::resource('responsible-persons', ResponsiblePersonController::class)
        ->parameters(['responsible-persons' => 'person']);

    Route::prefix('auth')->group(function () {
        Route::delete('logout', LogoutController::class)
            ->name('logout');
    });
});
