<?php

namespace App\Actions\Authentication\ForgotPassword;

use App\Actions\Action;
use App\Models\PasswordResetToken;

class SendTokenAction extends Action
{
    /**
     * @throws \Exception
     */
    public function __invoke(array $data): void
    {
//        $data['token'] = rand(1111, 9999);
        $data['token'] = 3344;

        PasswordResetToken::where('email', $data['email'])->delete();

        PasswordResetToken::create($this->toDBUsageField($data));

        #todo send token with email or sms
    }
}
