<?php

namespace App\Constant\Address;

class AddressDatabaseField
{
    const USER_ID = 'user_id';
    const ADDRESS = 'address';
    const LONGITUDE = 'longitude';
    const LATITUDE = 'latitude';
    const CITY = 'city';
    const STATE = 'state';
    const COUNTRY = 'country';
    const POSTAL_CODE = 'postal_code';

    const AVAILABLE_FOR_CREATE_OR_UPDATE = [
        self::USER_ID,
        self::ADDRESS,
        self::LONGITUDE,
        self::LATITUDE,
        self::CITY,
        self::STATE,
        self::COUNTRY,
        self::POSTAL_CODE
    ];
}
