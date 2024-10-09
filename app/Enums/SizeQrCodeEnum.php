<?php

namespace App\Enums;

enum SizeQrCodeEnum: string
{
    /**
     * define the size of qr-code as small.
     */
    case Small = 'small';

    /**
     * define the size of qr-code as medium.
     */
    case Medium = 'medium';

    /**
     * define the size of qr-code as large.
     */
    case Large = 'large';

    /**
     * Get the label for the size qr-code enum.
     */
    public function label(): string
    {
        return match ($this) {
            SizeQrCodeEnum::Small => __('50 x 50 px'),
            SizeQrCodeEnum::Medium => __('150 x 150 px'),
            SizeQrCodeEnum::Large => __('300 x 300 px'),
        };
    }
}
