<?php

namespace Database\Factories;

use App\Models\ResponsiblePerson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ResponsiblePerson>
 */
class ResponsiblePersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = ResponsiblePerson::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'position' => fake()->jobTitle(),
            'address' => fake()->address(),
            'telephone' => fake()->phoneNumber(),
            'email' => fake()->email(),
            'description' => fake()->sentence(),
        ];
    }
}
