<?php

namespace App\Constant\File;

class Type
{
    const IMAGE = 1;
    const VIDEO = 2;
    const AUDIO = 3;

    const AVAILABLE_TYPE = [
        self::IMAGE,
        self::VIDEO,
        self::AUDIO
    ];

    const TITLE = [
        self::IMAGE => 'image',
        self::VIDEO => 'video',
        self::AUDIO => 'audio'
    ];
}
