<?php

namespace App\Constant\User\ExtraData;

class UserExtraDataDatabaseField
{
    const USER_ID = 'user_id';
    const ROLE = 'role';
    const ABOUT = 'about';
    const LINKS = 'links';
    const DATA = 'data';
    const AVAILABLE_FOR_CREATE_OR_UPDATE = [
        self::USER_ID,
        self::ROLE,
        self::ABOUT,
        self::LINKS,
        self::DATA
    ];
}
