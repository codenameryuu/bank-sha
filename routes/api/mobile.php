<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\MasterData\UserController;

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
| User
|--------------------------------------------------------------------------
*/

Route::group(
    [
        'as' => 'api.user.',
        'middleware' => ['auth:sanctum'],
        'prefix' => 'user',
    ],
    function () {
        Route::get('', [UserController::class, 'index'])
            ->name('index');

        Route::get('show', [UserController::class, 'show'])
            ->name('show');

        Route::post('check-pin', [UserController::class, 'checkPin'])
            ->name('checkPin');

        Route::post('update-profile', [UserController::class, 'updateProfile'])
            ->name('updateProfile');

        Route::post('update-profile', [UserController::class, 'updateProfile'])
            ->name('updateProfile');

        Route::post('update-password', [UserController::class, 'updatePassword'])
            ->name('updatePassword');

        Route::post('update-pin', [UserController::class, 'updatePin'])
            ->name('updatePin');
    }
);
