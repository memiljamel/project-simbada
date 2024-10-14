<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\View\View;

class AssetDetailController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Asset $asset): View
    {
        return view('asset-details.index', compact('asset'));
    }
}
