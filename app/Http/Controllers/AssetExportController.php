<?php

namespace App\Http\Controllers;

use alhimik1986\PhpExcelTemplator\params\ExcelParam;
use alhimik1986\PhpExcelTemplator\PhpExcelTemplator;
use alhimik1986\PhpExcelTemplator\setters\CellSetterArrayValueSpecial;
use alhimik1986\PhpExcelTemplator\setters\CellSetterStringValue;
use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Enums\StatusTypeEnum;
use App\Models\Asset;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Number;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AssetExportController extends Controller
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
     * Export data from database to xlsx.
     */
    public function xlsx(Request $request, StatusTypeEnum $status): BinaryFileResponse
    {
        $search = $request->query('search');

        $assets = Asset::active($status->value === StatusTypeEnum::Active->value)
            ->with(['category', 'brand', 'latestHistory', 'assetArchive'])
            ->when($search, function (Builder $query, ?string $search) {
                $query->where('code', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('type', 'LIKE', "%{$search}%")
                    ->orWhere('purchase_year', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('brand', function (Builder $query) use ($search) {
                        $query->where('name', 'LIKE', "%{$search}%");
                    })
                    ->orWhereHas('latestHistory', function (Builder $query) use ($search) {
                        $query->where('date_from', 'LIKE', "%{$search}%")
                            ->orWhereHas('responsiblePerson', function (Builder $query) use ($search) {
                                $query->where('name', 'LIKE', "%{$search}%");
                            })
                            ->orWhereHas('location', function (Builder $query) use ($search) {
                                $query->where('name', 'LIKE', "%{$search}%");
                            });
                    })
                    ->orWhereHas('assetArchive', function (Builder $query) use ($search) {
                        $query->where('inactive_date', 'LIKE', "%{$search}%")
                            ->orWhere('reason', 'LIKE', "%{$search}%");
                    });
            })
            ->latest()
            ->get();

        $filename = $status->value === StatusTypeEnum::Active->value
            ? time().'_Aset Aktif.xlsx'
            : time().'_Aset Non-Aktif.xlsx';

        PhpExcelTemplator::outputToFile(
            resource_path('templates/spreadsheet.xlsx'),
            storage_path("app/public/$filename"),
            [
                '[no]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->count() > 0
                        ? range(1, $assets->count())
                        : [],
                ),
                '[asset_code]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('code')->toArray(),
                ),
                '[asset_name_category]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->map(fn (Asset $asset) => "{$asset->name} / {$asset->category?->name}")->toArray(),
                ),
                '[asset_serial_number]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('serial_number')->toArray(),
                ),
                '[asset_brand_type]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->map(fn (Asset $asset) => "{$asset->brand?->name} / {$asset->type}")->toArray(),
                ),
                '[asset_size]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('size')->toArray(),
                ),
                '[asset_material]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('material')->toArray(),
                ),
                '[asset_purchase_year]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('purchase_year')->toArray(),
                ),
                '[asset_distributor]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->map(fn (Asset $asset) => $asset->distributor?->name)->toArray(),
                ),
                '[asset_frame_number]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('frame_number')->toArray(),
                ),
                '[asset_engine_number]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('engine_number')->toArray(),
                ),
                '[asset_police_number]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('police_number')->toArray(),
                ),
                '[asset_bpkb_number]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('bpkb_number')->toArray(),
                ),
                '[asset_origin]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('origin')->toArray(),
                ),
                '[asset_unit_price]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->map(fn (Asset $asset) => Number::format($asset->unit_price, precision: 2))->toArray(),
                ),
                '[asset_notes]' => new ExcelParam(
                    CellSetterArrayValueSpecial::class,
                    $assets->pluck('notes')->toArray(),
                ),
                '{asset_total_price}' => new ExcelParam(
                    CellSetterStringValue::class,
                    $assets->pluck('unit_price')->sum() > 0
                        ? Number::format($assets->pluck('unit_price')->sum(), precision: 2)
                        : null,
                ),
                '{date}' => new ExcelParam(
                    CellSetterStringValue::class,
                    now()->translatedFormat('d F Y'),
                ),
            ],
        );

        return response()->download(storage_path("app/public/$filename"))
            ->deleteFileAfterSend();
    }
}
