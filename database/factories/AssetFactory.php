<?php

namespace Database\Factories;

use App\Models\Asset;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Distributor;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'name' => fake()->word(),
            'code' => fake()->unique()->numerify('#/INV/####'),
            'category_id' => Category::factory(),
            'brand_id' => Brand::factory(),
            'type' => fake()->catchPhrase(),
            'manufacturer' => fake()->company(),
            'serial_number' => fake()->unique()->numerify('SN-####'),
            'production_year' => fake()->year(),
            'description' => fake()->optional()->sentence(),
            'purchase_date' => fake()->date(),
            'distributor_id' => Distributor::factory(),
            'invoice_number' => fake()->numerify('INV-####'),
            'qty' => fake()->randomDigitNotNull(),
            'unit_price' => fake()->randomNumber(7, true),
            'photo' => fake()->imageUrl(),
            'qr_code' => fake()->imageUrl(),
            'notes' => fake()->optional()->paragraph(),
        ];
    }
}
