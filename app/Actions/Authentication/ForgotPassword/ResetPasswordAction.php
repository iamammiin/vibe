<?php

namespace App\Actions\Authentication\ForgotPassword;

use App\Actions\Action;
use App\Constant\User\UserApiField;
use App\Constant\User\UserDatabaseField;
use App\Exceptions\CustomException;
use App\Models\PasswordResetToken;
use App\Models\User;

class ResetPasswordAction extends Action
{
    /**
     * @throws \Exception
     */
    public function __invoke(array $validate): void
    {
        $checkToken = PasswordResetToken::where('email', $validate['email'])
            ->where('token', $validate['token'])
            ->first();

        if (empty($checkToken)) {
            throw new CustomException('Token is invalid', 400);
        }

        User::where('email', $validate['email'])
            ->update([
                UserDatabaseField::PASSWORD => bcrypt($validate[UserDatabaseField::PASSWORD])
            ]);

        PasswordResetToken::where('email', $validate['email'])
            ->where('token', $validate['token'])
            ->delete();
    }
}
