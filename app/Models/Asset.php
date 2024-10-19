<?php

namespace App\Models;

use App\Enums\AssetStatusEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Vite;

class Asset extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'assets';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The data type of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'category_id',
        'brand_id',
        'type',
        'manufacturer',
        'serial_number',
        'production_year',
        'description',
        'purchase_date',
        'distributor_id',
        'invoice_number',
        'qty',
        'unit_price',
        'photo',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => AssetStatusEnum::class,
    ];

    /**
     * Interact with the asset's photo url.
     */
    protected function photoUrl(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attrs) {
                if ($attrs['photo'] && Storage::disk('public')->exists($attrs['photo'])) {
                    return Storage::url($attrs['photo']);
                }

                return Vite::asset('resources/images/photo.png');
            }
        );
    }

    /**
     * Interact with the asset's qrcode url.
     */
    protected function qrCodeUrl(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attrs) {
                return Storage::url($attrs['qr_code']);
            },
        );
    }

    /**
     * Scope a query to only include active asset.
     */
    public function scopeActive(Builder $query, bool $active): void
    {
        $query->where('active', $active);
    }

    /**
     * Get the category that owns the asset.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * Get the brand that owns the asset.
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    /**
     * Get the distributor that owns the asset.
     */
    public function distributor(): BelongsTo
    {
        return $this->belongsTo(Distributor::class, 'distributor_id', 'id');
    }

    /**
     * Get the asset attachments for the asset.
     */
    public function assetAttachments(): HasMany
    {
        return $this->hasMany(AssetAttachment::class, 'asset_id', 'id');
    }

    /**
     * Get the asset histories for the asset.
     */
    public function assetHistories(): HasMany
    {
        return $this->hasMany(AssetHistory::class, 'asset_id', 'id');
    }

    /**
     * Get the histories most recent asset.
     */
    public function latestHistory(): HasOne
    {
        return $this->hasOne(AssetHistory::class)->latestOfMany();
    }

    /**
     * Get the asset finances for the asset.
     */
    public function assetFinances(): HasMany
    {
        return $this->hasMany(AssetFinance::class, 'asset_id', 'id');
    }

    /**
     * Get the asset archive associated with the asset.
     */
    public function assetArchive(): HasOne
    {
        return $this->hasOne(AssetArchive::class);
    }

    /**
     * Get the asset verifications for the asset.
     */
    public function assetVerifications(): HasMany
    {
        return $this->hasMany(AssetVerification::class, 'asset_id', 'id');
    }

    /**
     * Get the verification most recent asset.
     */
    public function latestVerification(): HasOne
    {
        return $this->hasOne(AssetVerification::class)->latestOfMany();
    }
}
