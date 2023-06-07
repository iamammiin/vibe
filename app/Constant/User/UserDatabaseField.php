<?php

namespace App\Constant\User;

class UserDatabaseField
{
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const PHONE = 'phone';
    const TYPE = 'type';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const AVATAR = 'avatar';
    const AVAILABLE_FOR_CREATE_OR_UPDATE = [
        self::FIRST_NAME,
        self::LAST_NAME,
        self::PHONE,
        self::TYPE,
        self::EMAIL,
        self::PASSWORD,
        self::AVATAR
    ];
}
