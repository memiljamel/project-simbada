<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Enums\SizeQrCodeEnum;
use App\Http\Requests\StorePrintRequest;
use App\Models\Asset;
use Illuminate\View\View;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Enums\Orientation;
use Spatie\LaravelPdf\Enums\Unit;
use Spatie\LaravelPdf\PdfBuilder;

use function Spatie\LaravelPdf\Support\pdf;

class PrintController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('role:'.RoleEnum::Administrator->value.'|'.RoleEnum::Custom->value);
        $this->middleware('permission:'.PermissionEnum::CreatePrints->value);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $assets = Asset::select(['id', 'name'])
            ->orderBy('name')
            ->get();

        return view('prints.index', compact('assets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePrintRequest $request): PdfBuilder
    {
        $id = $request->input('asset_id');
        $qty = $request->input('qty');
        $size = $request->input('size');

        $asset = Asset::findOrFail($id);

        $size = match ($size) {
            SizeQrCodeEnum::Small->value => [
                'width' => 50,
                'height' => 50,
            ],
            SizeQrCodeEnum::Medium->value => [
                'width' => 150,
                'height' => 150,
            ],
            SizeQrCodeEnum::Large->value => [
                'width' => 300,
                'height' => 300,
            ],
        };

        return pdf()->view('prints.pdf.main', compact('asset', 'qty', 'size'))
            ->headerView('prints.pdf.header', compact('asset'))
            ->footerView('prints.pdf.footer')
            ->orientation(Orientation::Portrait)
            ->format(Format::A4)
            ->margins(56, 16, 56, 16, Unit::Pixel)
            ->name(time()."- {$asset->name}.pdf");
    }
}
