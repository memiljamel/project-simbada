<?php

namespace App\Enums;

enum AssetConditionEnum: string
{
    /**
     * define the condition of asset as good.
     */
    case Good = 'good';

    /**
     * define the condition of asset as minor-damage.
     */
    case MinorDamage = 'minor-damage';

    /**
     * define the condition of asset as major-damage.
     */
    case MajorDamage = 'major-damage';

    /**
     * define the condition of asset as found.
     */
    case Found = 'found';

    /**
     * define the condition of asset as not found.
     */
    case NotFound = 'not-found';

    /**
     * Get the label for the size qr-code enum.
     */
    public function label(): string
    {
        return match ($this) {
            AssetConditionEnum::Good => __('Baik'),
            AssetConditionEnum::MinorDamage => __('Rusak Ringan'),
            AssetConditionEnum::MajorDamage => __('Rusak Berat'),
            AssetConditionEnum::Found => __('Ditemukan'),
            AssetConditionEnum::NotFound => __('Tidak Ditemukan'),
        };
    }
}
