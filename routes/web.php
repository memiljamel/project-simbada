<?php

use App\Http\Controllers\AssetActiveController;
use App\Http\Controllers\AssetArchiveController;
use App\Http\Controllers\AssetDetailController;
use App\Http\Controllers\AssetFinanceController;
use App\Http\Controllers\AssetHistoryController;
use App\Http\Controllers\AssetInactiveController;
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponsiblePersonController;
use App\Http\Controllers\UserController;
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

Route::view('/', 'home.index')->name('home.index');

Route::get('assets/{asset}/scans', AssetDetailController::class)
    ->name('asset-details.scans');

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
    Route::prefix('assets')->group(function () {
        Route::controller(ExportController::class)->group(function () {
            Route::get('export/{status}/pdf', 'pdf')
                ->name('asset-export.pdf');
            Route::get('export/{status}/docx', 'docx')
                ->name('asset-export.docx');
            Route::get('export/{status}/xlsx', 'xlsx')
                ->name('asset-export.xlsx');
        });

        Route::controller(AssetArchiveController::class)->group(function () {
            Route::get('{asset}/archives/create', 'create')
                ->name('asset-active.archives.create');
            Route::post('{asset}/archives', 'store')
                ->name('asset-active.archives.store');
            Route::delete('{asset}/archives', 'destroy')
                ->name('asset-inactive.archives.destroy');
        });

        Route::controller(AssetInactiveController::class)->group(function () {
            Route::get('inactive', 'index')
                ->name('asset-inactive.index');
            Route::get('{asset}/inactive', 'show')
                ->name('asset-inactive.show');
            Route::delete('{asset}/inactive', 'destroy')
                ->name('asset-inactive.destroy');
        });

        Route::resource('histories', AssetHistoryController::class)
            ->names('asset-histories');
        Route::resource('finances', AssetFinanceController::class)
            ->names('asset-finances');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('profile', 'edit')
            ->name('profile.edit');
        Route::put('profile/current', 'update')
            ->name('profile.update');
    });

    Route::controller(PrintController::class)->group(function () {
        Route::get('prints', 'index')
            ->name('prints.index');
        Route::post('prints', 'store')
            ->name('prints.store');
    });

    Route::resource('assets', AssetActiveController::class)
        ->names('asset-active');
    Route::resource('responsible-persons', ResponsiblePersonController::class)
        ->parameters(['responsible-persons' => 'person']);

    Route::resources([
        'categories' => CategoryController::class,
        'brands' => BrandController::class,
        'distributors' => DistributorController::class,
        'locations' => LocationController::class,
        'users' => UserController::class,
    ]);

    Route::prefix('auth')->group(function () {
        Route::delete('logout', LogoutController::class)
            ->name('logout');
    });
});
