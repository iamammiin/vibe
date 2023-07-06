<?php

namespace App\Constant\Vibe;

class Type
{
    const VIBE = 1;
    const ARTISTRY = 2;

    const AVAILABLE_TYPE = [
        self::VIBE,
        self::ARTISTRY,
    ];

    const TITLE = [
        self::VIBE => 'vibe',
        self::ARTISTRY => 'artistry',
    ];
}
