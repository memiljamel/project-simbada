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
        Schema::create('assets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('code')->unique();
            $table->string('name');
            $table->foreignUuid('category_id')
                ->constrained('categories', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('serial_number');
            $table->text('photo')->nullable();
            $table->foreignUuid('brand_id')
                ->constrained('brands', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('type');
            $table->string('size');
            $table->string('material');
            $table->integer('purchase_year');
            $table->foreignUuid('distributor_id')
                ->nullable()
                ->constrained('distributors', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('frame_number')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('police_number')->nullable();
            $table->string('bpkb_number')->nullable();
            $table->text('origin');
            $table->bigInteger('unit_price');
            $table->string('status');
            $table->text('notes')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('verified')->default(false);
            $table->text('qr_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
