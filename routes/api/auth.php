<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'as' => 'api.login.',
    ],
    function () {
        Route::post('login', [LoginController::class, 'index'])
            ->name('index');

        Route::post('logout', [LoginController::class, 'logout'])
            ->middleware(['auth:sanctum'])
            ->name('logout');
    }
);

/*
|--------------------------------------------------------------------------
| Register
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'as' => 'api.register.',
        'prefix' => 'register',
    ],
    function () {
        Route::post('', [RegisterController::class, 'index'])
            ->name('index');

        Route::post('check-username', [RegisterController::class, 'checkUsername'])
            ->name('checkUsername');

        Route::post('check-email', [RegisterController::class, 'checkEmail'])
            ->name('checkEmail');

        Route::get('get-default-profile', [RegisterController::class, 'getDefaultProfile'])
            ->name('getDefaultProfile');

        Route::get('get-default-identity-card', [RegisterController::class, 'getDefaultIdentityCard'])
            ->name('getDefaultIdentityCard');
    }
);
