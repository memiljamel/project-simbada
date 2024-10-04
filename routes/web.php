<?php

use App\Http\Controllers\ActiveAssetController;
use App\Http\Controllers\AssetArchiveController;
use App\Http\Controllers\AssetFinanceController;
use App\Http\Controllers\AssetHistoryController;
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\InactiveAssetController;
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
    Route::controller(AssetArchiveController::class)->group(function () {
        Route::get('active-assets/{asset}/archive', 'create')
            ->name('active-assets.archive.create');
        Route::post('active-assets/{asset}/archive/create', 'store')
            ->name('active-assets.archive.store');
        Route::delete('inactive-assets/{asset}/unarchived', 'destroy')
            ->name('inactive-assets.archive.destroy');
    });

    Route::resources([
        'categories' => CategoryController::class,
        'brands' => BrandController::class,
        'distributors' => DistributorController::class,
        'locations' => LocationController::class,
    ]);

    Route::resource('active-assets', ActiveAssetController::class)
        ->parameters(['active-assets' => 'asset']);
    Route::resource('asset-histories', AssetHistoryController::class)
        ->parameters(['asset-histories' => 'history']);
    Route::resource('asset-finances', AssetFinanceController::class)
        ->parameters(['asset-finances' => 'finance']);
    Route::resource('responsible-persons', ResponsiblePersonController::class)
        ->parameters(['responsible-persons' => 'person']);
    Route::resource('inactive-assets', InactiveAssetController::class)
        ->parameters(['inactive-assets' => 'asset'])
        ->only(['index', 'show']);

    Route::prefix('auth')->group(function () {
        Route::delete('logout', LogoutController::class)
            ->name('logout');
    });
});
