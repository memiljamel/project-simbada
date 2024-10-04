<?php

namespace Database\Seeders;

use App\Models\AssetAttachment;
use Illuminate\Database\Seeder;

class AssetAttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssetAttachment::factory()->count(25)
            ->create();
    }
}
