<?php

namespace App\Enums;

enum CabinCategoryTypeEnum: string
{
    case INSIDE = 'Inside';
    case OCEAN_VIEW = 'Ocean view';
    case BALCONY = 'Balcony';
    case SUITE = 'Suite';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
