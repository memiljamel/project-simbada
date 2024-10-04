<?php

namespace App\Observers;

use App\Models\Asset;

class AssetObserver
{
    /**
     * Handle the Asset "saving" event.
     */
    public function saving(Asset $asset): void
    {
        $asset->total_price = $asset->qty * $asset->unit_price;
    }
}
