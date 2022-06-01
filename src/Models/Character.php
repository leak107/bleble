<?php

namespace App\Models;

enum Character: string
{
    case CIRCLE = '⭕';
    case CROSS = '❌';

    public static function getColor(Character $character): string
    {
        return match ($character) {
            self::CIRCLE => 'orange-300',
            self::CROSS => 'lime-300',
        };
    }
}