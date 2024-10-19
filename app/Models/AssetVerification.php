<?php

namespace App\Models;

use App\Enums\AssetConditionEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Vite;

class AssetVerification extends Model
{
    use HasFactory, HasUuids;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'asset_verifications';

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
        'photos',
        'date',
        'condition',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'condition' => AssetConditionEnum::class,
    ];

    /**
     * Interact with the asset's verification photo url.
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
     * Get the asset that owns the asset verification.
     */
    public function asset(): BelongsTo
    {
        return $this->belongsTo(Asset::class, 'asset_id', 'id');
    }
}
