<?php

namespace App\Console\Commands;

use App\Models\Asset;
use Illuminate\Console\Command;

class ResetAssetVerification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asset:reset-verification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset asset verification status to false';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Asset::query()->update([
            'verified' => false,
        ]);

        $this->info('Asset verification status has been reset.');
    }
}
