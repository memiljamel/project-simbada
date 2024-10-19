<?php

namespace App\Enums;

enum AssetStatusEnum: string
{
    /**
     * define the status of asset as disputed.
     */
    case Disputed = 'disputed';

    /**
     * define the status of asset as not disputed.
     */
    case NotDisputed = 'not-disputed';

    /**
     * Get the label for the role enum.
     */
    public function label(): string
    {
        return match ($this) {
            AssetStatusEnum::Disputed => __('Sengketa'),
            AssetStatusEnum::NotDisputed => __('Tidak Sengketa'),
        };
    }
}
