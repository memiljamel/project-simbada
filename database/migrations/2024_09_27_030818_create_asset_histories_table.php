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
        Schema::create('asset_histories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('asset_id')
                ->constrained('assets', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->date('date_from');
            $table->foreignUuid('responsible_person_id')
                ->constrained('responsible_persons', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignUuid('location_id')
                ->constrained('locations', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('qty');
            $table->integer('condition_percentage');
            $table->integer('completeness_percentage');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_histories');
    }
};
