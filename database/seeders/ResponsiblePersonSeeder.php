<?php

namespace Database\Seeders;

use App\Models\ResponsiblePerson;
use Illuminate\Database\Seeder;

class ResponsiblePersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ResponsiblePerson::factory()->count(5)
            ->create();
    }
}
