<?php

namespace Database\Factories;

use App\Enums\AssetStatusEnum;
use App\Models\Asset;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Distributor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => fake()->unique()->numerify('#/INV/####'),
            'name' => fake()->word(),
            'category_id' => Category::factory(),
            'serial_number' => fake()->unique()->numerify('SN-####'),
            'brand_id' => Brand::factory(),
            'type' => fake()->catchPhrase(),
            'size' => fake()->numerify('### CC'),
            'material' => fake()->word(),
            'purchase_year' => fake()->year(),
            'distributor_id' => Distributor::factory(),
            'frame_number' => fake()->numerify('RNG-#####'),
            'engine_number' => fake()->numerify('MSN-#####'),
            'police_number' => fake()->numerify('BM #### EA'),
            'bpkb_number' => fake()->numerify('BPKB-#####'),
            'origin' => fake()->text(50),
            'unit_price' => fake()->randomNumber(7, true),
            'photo' => UploadedFile::fake()
                ->image('photo.png')
                ->hashName(),
            'qr_code' => UploadedFile::fake()
                ->image('qr-code.png')
                ->hashName(),
            'status' => fake()->randomElement(AssetStatusEnum::class),
            'notes' => fake()->optional()->paragraph(),
        ];
    }
}
