<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Authentication\ {
    RegisterController,
    LoginController,
    ChangePasswordController,
    LogoutController,
    RefreshTokenController,
    UploadAvatarController
};

use App\Http\Controllers\Authentication\ForgotPassword\ {
    SendTokenController,
    ResetPasswordController
};

use App\Http\Controllers\File\ {
    UploadFileController
};

use App\Http\Controllers\Vibe\ {
    GetsController as GetsVibeController
};

use App\Http\Controllers\Artistry\ {
    GetsController as GetsArtistryController
};

use App\Http\Controllers\Address\ {
    StoreController as StoreAddressController,
    UpdateController as UpdateAddressController
};

use App\Http\Controllers\User\ExtraData\ {
    UpdateController as UserExtraDataUpdateController
};

use App\Http\Controllers\User\ {
    AssignVibeController,
    AssignArtistryController,
    GetProfileController
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
        Route::post('/change-password', ChangePasswordController::class);
        Route::post('/logout', LogoutController::class);
        Route::post('/refresh', RefreshTokenController::class);
        Route::post('/upload-avatar', UploadAvatarController::class);
    });
});

Route::group([
    'middleware' => 'auth:api'
], function () {
    Route::group([
        'prefix' => 'files'
    ], function () {
        Route::post('/upload', UploadFileController::class);
    });

    Route::group([
        'prefix' => 'vibes'
    ], function () {
        Route::get('/', GetsVibeController::class);
    });

    Route::group([
        'prefix' => 'artistry'
    ], function () {
        Route::get('/', GetsArtistryController::class);
    });

    Route::group([
        'prefix' => 'users'
    ], function () {
        Route::group([
            'prefix' => 'addresses'
        ], function () {
            Route::post('/', StoreAddressController::class);
            Route::patch('/', UpdateAddressController::class);
        });
        Route::group([
            'prefix' => 'extra-data'
        ], function () {
            Route::patch('/', UserExtraDataUpdateController::class);
        });

        Route::post('/assign-vibe', AssignVibeController::class);
        Route::post('/assign-artistry', AssignArtistryController::class);
        Route::get('/get-profile', GetProfileController::class);
    });
});


