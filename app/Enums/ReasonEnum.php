<?php

namespace App\Enums;

enum ReasonEnum: string
{
    /**
     * define the reason as sold.
     */
    case SOLD = 'sold';

    /**
     * define the reason as donated.
     */
    case DONATED = 'donated';

    /**
     * define the reason as discarded.
     */
    case DISCARDED = 'discarded';

    /**
     * define the reason as lost.
     */
    case LOST = 'lost';

    /**
     * define the reason as completely demaged.
     */
    case COMPLETELY_DAMAGED = 'completely_damaged';

    /**
     * define the reason as others.
     */
    case OTHERS = 'others';

    /**
     * Get the label for the reason enum.
     */
    public function label(): string
    {
        return match ($this) {
            ReasonEnum::SOLD => __('Sold'),
            ReasonEnum::DONATED => __('Donated'),
            ReasonEnum::DISCARDED => __('Discarded'),
            ReasonEnum::LOST => __('Lost'),
            ReasonEnum::COMPLETELY_DAMAGED => __('Completely Damaged'),
            ReasonEnum::OTHERS => __('Others'),
        };
    }
}
