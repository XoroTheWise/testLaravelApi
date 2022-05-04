<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class TypeMaskEnum extends Enum
{
    const MASK_ONE = 1;
    const MASK_TWO = 2;
    const MASK_THREE = 3;

    const MASKS = [
        self::MASK_ONE => '/\b[0-9A-Z]{2}[A-Z]{5}[0-9A-Z]{1}[A-Z]{2}\b/',
        self::MASK_TWO => '/\b[0-9]{1}[0-9A-Z]{2}[A-Z]{2}[0-9A-Z]{1}[-_@]{1}[0-9A-Z]{1}[a-z]{2}\b/',
        self::MASK_THREE => '/\b[0-9]{1}[0-9A-Z]{2}[A-Z]{2}[0-9A-Z]{1}[-_@]{1}[0-9A-Z]{3}\b/',
    ];

    public static array $maskItems = self::MASKS;
}
