<?php

namespace App\Enum;

enum RoleEnum: string
{
    case ADMIN = 'admin';
    case TEAM_LEAD = 'team_lead';
    case BAYER = 'bayer';

    public static function getRoles(): array
    {
        return [
            self::ADMIN,
            self::TEAM_LEAD,
            self::BAYER,
        ];
    }
}
