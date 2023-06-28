<?php

namespace App\Constant\File;

class FileDatabaseField
{
    const NAME = 'name';
    const TYPE = 'type';
    const PATH = 'path';
    const USER_ID = 'user_id';

    const AVAILABLE_FOR_CREATE_OR_UPDATE = [
        self::NAME,
        self::TYPE,
        self::PATH,
        self::USER_ID
    ];
}
