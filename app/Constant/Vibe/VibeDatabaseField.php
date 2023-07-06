<?php

namespace App\Constant\Vibe;

class VibeDatabaseField
{
    const NAME = 'name';
    const TYPE = 'type';
    const DESCRIPTION = 'description';
    const IMAGE = 'image';
    const ICON = 'icon';

    const AVAILABLE_FOR_CREATE_OR_UPDATE = [
        self::NAME,
        self::TYPE,
        self::DESCRIPTION,
        self::IMAGE,
        self::ICON
    ];
}
