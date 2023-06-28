<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Authentication\ {
    RegisterController,
    LoginController,
    GetProfileController,
    ChangePasswordController,
    LogoutController,
    RefreshTokenController,
    UploadAvatarController,
    UpdateController
};

use App\Http\Controllers\Authentication\ForgotPassword\ {
    SendTokenController,
    ResetPasswordController
};

use App\Http\Controllers\File\ {
    UploadFileController
};

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

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('/register', RegisterController::class);
    Route::post('/login', LoginController::class);
    Route::post('/forgot-password', SendTokenController::class);
    Route::post('/reset-password', ResetPasswordController::class);

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('/profile', GetProfileController::class);
        Route::post('/change-password', ChangePasswordController::class);
        Route::post('/logout', LogoutController::class);
        Route::post('/refresh', RefreshTokenController::class);
        Route::post('/upload-avatar', UploadAvatarController::class);
        Route::patch('/update', UpdateController::class);
    });
});

Route::group([
    'prefix' => 'file',
    'middleware' => 'auth:api'
], function () {
    Route::post('/upload', UploadFileController::class);
});
