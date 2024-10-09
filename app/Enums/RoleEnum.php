<?php

namespace App\Enums;

enum RoleEnum: string
{
    /**
     * define the role as administrator.
     */
    case Administrator = 'administrator';

    /**
     * define the role as custom.
     */
    case Custom = 'custom';

    /**
     * Get the label for the role enum.
     */
    public function label(): string
    {
        return match ($this) {
            RoleEnum::Administrator => __('Administrator'),
            RoleEnum::Custom => __('Custom'),
        };
    }
}
