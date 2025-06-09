<?php

namespace App;

enum UserTypeEnum: string
{
    case ADMIN = 'admin_user';
    case CLIENT = 'client_user';
    
    // add this method to get the list of values
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
