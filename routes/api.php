<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CableController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CableChangeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::middleware(['auth:sanctum', 'cors'])->group(function () {

    Route::get('profile', [AuthController::class, 'profile']);


    Route::get('cables', [CableController::class, 'index']);
    Route::get('cable/{id}', [CableController::class, 'getOne']);
    Route::post('cable/createOrUpdate', [CableController::class, 'storeOrUpdate']);
    Route::delete('/delete/{id}', [CableController::class, 'destroy']);

    Route::get('getCableChanges', [CableChangeController::class, 'getCableChanges']);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin/user')->group(function() {
        Route::put('/update/{id}', [AdminController::class, 'update']);
        Route::delete('/delete/{id}', [AdminController::class, 'destroy']);
    });
});

