<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asset_verifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('asset_id')
                ->constrained('assets', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('photo')->nullable();
            $table->date('date');
            $table->string('condition');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_verifications');
    }
};
