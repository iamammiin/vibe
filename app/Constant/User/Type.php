<?php

namespace App\Constant\User;

class Type
{
    const VENUE = 1;
    const ARTIST = 2;
    const FAN = 3;

    const AVAILABLE_TYPE = [
        self::VENUE,
        self::ARTIST,
        self::FAN
    ];

    const TITLE = [
        self::VENUE => 'Venue',
        self::ARTIST => 'Artist',
        self::FAN => 'Fan'
    ];
}
