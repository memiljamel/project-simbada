<?php

namespace App\Http\Controllers;

use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValue;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Enums\StatusTypeEnum;
use App\Models\Asset;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Spatie\LaravelPdf\Enums\Format;
use Spatie\LaravelPdf\Enums\Orientation;
use Spatie\LaravelPdf\Enums\Unit;
use Spatie\LaravelPdf\PdfBuilder;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use function Spatie\LaravelPdf\Support\pdf;

class ExportController extends Controller
{
    /**
     * Instantiate a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('role:'.RoleEnum::Administrator->value.'|'.RoleEnum::Custom->value);
        $this->middleware('permission:'.PermissionEnum::DownloadAssets->value);
    }

    /**
     * Export data from database to pdf.
     */
    public function pdf(Request $request, StatusTypeEnum $status): PdfBuilder
    {
        $assets = Asset::active($status->value === StatusTypeEnum::Active->value)
            ->with(['category', 'brand', 'latestHistory', 'assetArchive'])
            ->get();

        $filename = $status->value === StatusTypeEnum::Active->value
            ? time().'_Asset Active.pdf'
            : time().'_Asset Inactive.pdf';

        return pdf()->view('asset-exports.pdf.main', compact('assets', 'status'))
            ->headerView('asset-exports.pdf.header', compact('status'))
            ->footerView('asset-exports.pdf.footer')
            ->orientation(Orientation::Landscape)
            ->format(Format::Tabloid)
            ->margins(128, 16, 56, 16, Unit::Pixel)
            ->name($filename)
            ->download();
    }

    /**
     * Export data from database to xlsx.
     */
    public function xlsx(Request $request, StatusTypeEnum $status): BinaryFileResponse
    {
        $assets = Asset::active($status->value === StatusTypeEnum::Active->value)
            ->with(['category', 'brand', 'latestHistory', 'assetArchive'])
            ->get();

        $template = $status->value === StatusTypeEnum::Active->value
            ? 'excel-active.xlsx'
            : 'excel-inactive.xlsx';

        $filename = $status->value === StatusTypeEnum::Active->value
            ? time().'_Asset Active.xlsx'
            : time().'_Asset Inactive.xlsx';

        PhpExcelTemplator::outputToFile(
            resource_path("templates/$template"),
            storage_path("app/public/$filename"),
            [
                '{date}' => new ExcelParam(
                    CellSetterStringValue::class,
                    now()->toDateString(),
                ),
                '[no]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    range(1, $assets->count()),
                ),
                '[asset_code]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('code')->toArray(),
                ),
                '[asset_name]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('name')->toArray(),
                ),
                '[asset_category]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->category?->name)->toArray(),
                ),
                '[asset_brand]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->brand?->name)->toArray(),
                ),
                '[asset_type]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('type')->toArray(),
                ),
                '[asset_manufacturer]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('manufacturer')->toArray(),
                ),
                '[asset_serial_number]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('serial_number')->toArray(),
                ),
                '[asset_production_year]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('production_year')->toArray(),
                ),
                '[asset_description]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('description')->toArray(),
                ),
                '[asset_purchase_date]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('purchase_date')->toArray(),
                ),
                '[asset_distributor]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->distributor?->name)->toArray(),
                ),
                '[asset_invoice_number]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('invoice_number')->toArray(),
                ),
                '[asset_qty]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('qty')->toArray(),
                ),
                '[asset_unit_price]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('unit_price')->toArray(),
                ),
                '[asset_total_price]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('total_price')->toArray(),
                ),
                '[archive_inactive_date]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->assetArchive?->inactive_date)->toArray(),
                ),
                '[archive_reason]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->assetArchive?->reason->label())->toArray(),
                ),
                '[archive_notes]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->assetArchive?->notes)->toArray(),
                ),
                '[history_date_from]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->latestHistory?->date_from)->toArray(),
                ),
                '[history_responsible_person]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->latestHistory?->responsiblePerson?->name)->toArray(),
                ),
                '[history_location]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->latestHistory?->location?->name)->toArray(),
                ),
                '[history_qty]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->latestHistory?->qty)->toArray(),
                ),
                '[history_condition]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->latestHistory?->condition_percentage)->toArray(),
                ),
                '[history_completeness]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->latestHistory?->completeness_percentage)->toArray(),
                ),
                '[history_notes]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->map(fn (Asset $asset) => $asset->latestHistory?->notes)->toArray(),
                ),
                '[asset_notes]' => new ExcelParam(
                    CellSetterArrayValue::class,
                    $assets->pluck('notes')->toArray(),
                ),
            ],
        );

        return response()->download(storage_path("app/public/$filename"))
            ->deleteFileAfterSend();
    }

    /**
     * Export data from database to docx.
     */
    public function docx(Request $request, StatusTypeEnum $status): BinaryFileResponse
    {
        $assets = Asset::active($status->value === StatusTypeEnum::Active->value)
            ->with(['category', 'brand', 'latestHistory', 'assetArchive'])
            ->get();

        $template = $status->value === StatusTypeEnum::Active->value
            ? 'word-active.docx'
            : 'word-inactive.docx';

        $filename = $status->value === StatusTypeEnum::Active->value
            ? time().'_Asset Active.docx'
            : time().'_Asset Inactive.docx';

        $phpWord = new TemplateProcessor(resource_path("templates/$template"));
        $phpWord->setValue('date', now()->toDateString());
        $phpWord->cloneRowAndSetValues('asset_code', $assets->map(fn (Asset $asset, int $key) => [
            'no' => $key + 1,
            'asset_code' => $asset->code,
            'asset_name' => $asset->name,
            'asset_category' => $asset->category?->name,
            'asset_brand' => $asset->brand?->name,
            'asset_type' => $asset->type,
            'asset_manufacturer' => $asset->manufacturer,
            'asset_serial_number' => $asset->serial_number,
            'asset_production_year' => $asset->production_year,
            'asset_description' => $asset->description,
            'asset_purchase_date' => $asset->purchase_date,
            'asset_distributor' => $asset->distributor?->name,
            'asset_invoice_number' => $asset->invoice_number,
            'asset_qty' => $asset->qty,
            'asset_unit_price' => $asset->unit_price,
            'asset_total_price' => $asset->total_price,
            'archive_inactive_date' => $asset->assetArchive?->inactive_date,
            'archive_reason' => $asset->assetArchive?->reason->label(),
            'archive_notes' => $asset->assetArchive?->notes,
            'history_date_from' => $asset->latestHistory?->date_from,
            'history_responsible_person' => $asset->latestHistory?->responsiblePerson?->name,
            'history_location' => $asset->latestHistory?->location?->name,
            'history_qty' => $asset->latestHistory?->qty,
            'history_condition' => $asset->latestHistory?->condition_percentage,
            'history_completeness' => $asset->latestHistory?->completeness_percentage,
            'history_notes' => $asset->latestHistory?->notes,
            'asset_notes' => $asset->notes,
        ])->toArray());

        $phpWord->saveAs(storage_path("app/public/$filename"));

        return response()->download(storage_path("app/public/$filename"))
            ->deleteFileAfterSend();
    }
}
