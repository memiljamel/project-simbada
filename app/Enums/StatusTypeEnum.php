<?php

namespace App\Enums;

enum StatusTypeEnum: string
{
    /**
     * define the status type of asset as active.
     */
    case Active = 'active';

    /**
     * define the status type of asset as inactive.
     */
    case Inactive = 'inactive';
}
