<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DistributorController;
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

Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('distributors', DistributorController::class);
Route::resource('responsible-persons', ResponsiblePersonController::class)
    ->parameters(['responsible-persons' => 'person']);
