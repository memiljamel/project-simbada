<?php

namespace App\Enums;

enum ReasonEnum: string
{
    /**
     * define the reason as sold.
     */
    case Sold = 'sold';

    /**
     * define the reason as donated.
     */
    case Donated = 'donated';

    /**
     * define the reason as discarded.
     */
    case Discarded = 'discarded';

    /**
     * define the reason as lost.
     */
    case Lost = 'lost';

    /**
     * define the reason as completely damaged.
     */
    case CompletelyDamaged = 'completely_damaged';

    /**
     * define the reason as others.
     */
    case Others = 'others';

    /**
     * Get the label for the reason enum.
     */
    public function label(): string
    {
        return match ($this) {
            ReasonEnum::Sold => __('Terjual'),
            ReasonEnum::Donated => __('Didonasikan'),
            ReasonEnum::Discarded => __('Dibuang'),
            ReasonEnum::Lost => __('Hilang'),
            ReasonEnum::CompletelyDamaged => __('Rusak Total'),
            ReasonEnum::Others => __('Lainnya'),
        };
    }
}
